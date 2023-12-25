<?php

use Illuminate\Support\Facades\Request;

function toHijriah($tanggal)
{
    $array_month = array("Muharram", "Safar", "Rabiul Awwal", "Rabiul Akhir", "Jumadil Awwal", "Jumadil Akhir", "Rajab", "Sya'ban", "Ramadhan", "Syawwal", "Zulqaidah", "Zulhijjah");

    $date = intval(substr($tanggal, 8, 2));
    $month = intval(substr($tanggal, 5, 2));
    $year = intval(substr($tanggal, 0, 4));

    if (($year > 1582) || (($year == "1582") && ($month > 10)) || (($year == "1582") && ($month == "10") && ($date > 14))) {
        $jd = intval((1461 * ($year + 4800 + intval(($month - 14) / 12))) / 4) +
            intval((367 * ($month - 2 - 12 * (intval(($month - 14) / 12)))) / 12) -
            intval((3 * (intval(($year + 4900 + intval(($month - 14) / 12)) / 100))) / 4) +
            $date - 32075;
    } else {
        $jd = 367 * $year - intval((7 * ($year + 5001 + intval(($month - 9) / 7))) / 4) +
            intval((275 * $month) / 9) + $date + 1729777;
    }

    $wd = $jd % 7;
    $l  = $jd - 1948440 + 10632;
    $n  = intval(($l - 1) / 10631);
    $l  = $l - 10631 * $n + 354;
    $z  = (intval((10985 - $l) / 5316)) * (intval((50 * $l) / 17719)) + (intval($l / 5670)) * (intval((43 * $l) / 15238));
    $l  = $l - (intval((30 - $z) / 15)) * (intval((17719 * $z) / 50)) - (intval($z / 16)) * (intval((15238 * $z) / 43)) + 29;
    $m  = intval((24 * $l) / 709);
    $d  = $l - intval((709 * $m) / 24);
    $y  = 30 * $n + $z - 30;
    $g  = $m - 1;

    $hijriah = "$d $array_month[$g] $y H";

    return $hijriah;
}

function set_active($uri, $output = 'active')
{
    if (is_array($uri)) {
        foreach ($uri as $u) {
            if (Request::is($u)) {
                return $output;
            }
        }
    } else {
        if (Request::is($uri)) {
            return $output;
        }
    }
}

function set_active_mainmenu($uri, $output = 'active open')
{
    if (is_array($uri)) {
        foreach ($uri as $u) {
            if (Request::is($u)) {
                return $output;
            }
        }
    } else {
        if (Request::is($uri)) {
            return $output;
        }
    }
}

if (!function_exists('tgl')) {
    function tgl($tanggal)
    {
        $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);

        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun

        return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
    }
}

if (!function_exists('neraca')) {
    function neraca($kriteria, $periode, $tanggal_awal, $tanggal_akhir, $bulan, $item, $saldo = 0, $penyesuaian = 0)
    {
        switch ($kriteria) {
            case 'periode':
                switch ($periode) {
                    case '1-bulan-terakhir':
                        foreach ($item->jurnal_umum as $jurnal_umum) {
                            if (date('Y-m', strtotime($jurnal_umum->tanggal)) == date('Y-m')) {
                                $saldo = saldo($jurnal_umum, $saldo);
                            }
                        }

                        foreach ($item->jurnal_penyesuaian as $jurnal_penyesuaian) {
                            if (date('Y-m', strtotime($jurnal_penyesuaian->tanggal)) == date('Y-m')) {
                                $penyesuaian += $jurnal_penyesuaian->nilai;
                            }
                        }

                        break;

                    case '1-minggu-terakhir':
                        foreach ($item->jurnal_umum->whereBetween('tanggal', [date('Y-m-d', strtotime('-7 day')), date('Y-m-d')]) as $jurnal_umum) {
                            $saldo = saldo($jurnal_umum, $saldo);
                        }

                        foreach ($item->jurnal_penyesuaian->whereBetween('tanggal', [date('Y-m-d', strtotime('-7 day')), date('Y-m-d')]) as $jurnal_penyesuaian) {
                            $penyesuaian += $jurnal_penyesuaian->nilai;
                        }

                        break;
                }
                break;

            case 'rentang-waktu':
                foreach ($item->jurnal_umum->whereBetween('tanggal', [$tanggal_awal, $tanggal_akhir]) as $jurnal_umum) {
                    $saldo = saldo($jurnal_umum, $saldo);
                }

                foreach ($item->jurnal_penyesuaian->whereBetween('tanggal', [$tanggal_awal, $tanggal_akhir]) as $jurnal_penyesuaian) {
                    $penyesuaian += $jurnal_penyesuaian->nilai;
                }

                break;

            case 'bulan':
                foreach ($item->jurnal_umum as $jurnal_umum) {
                    if (date('Y-m', strtotime($jurnal_umum->tanggal)) == date('Y-m', strtotime($bulan))) {
                        $saldo = saldo($jurnal_umum, $saldo);
                    }
                }

                foreach ($item->jurnal_penyesuaian as $jurnal_penyesuaian) {
                    if (date('Y-m', strtotime($jurnal_penyesuaian->tanggal)) == date('Y-m', strtotime($bulan))) {
                        $penyesuaian += $jurnal_penyesuaian->nilai;
                    }
                }

                break;

            default:
                foreach ($item->jurnal_umum as $jurnal_umum) {
                    $saldo = saldo($jurnal_umum, $saldo);
                }

                foreach ($item->jurnal_penyesuaian as $jurnal_penyesuaian) {
                    $penyesuaian += $jurnal_penyesuaian->nilai;
                }

                break;
        }

        if ($item->post_saldo == $item->post_penyesuaian) {
            $disesuaikan = $saldo + $penyesuaian;
        } else {
            $disesuaikan = $saldo - $penyesuaian;
        }

        return [
            'saldo'         => $saldo,
            'penyesuaian'   => $penyesuaian,
            'disesuaikan'   => $disesuaikan
        ];
    }
}

if (!function_exists('neraca_akun')) {
    function neraca_akun($kriteria, $periode, $tanggal_awal, $tanggal_akhir, $bulan, $akun)
    {
        $saldo = 0;
        $penyesuaian = 0;
        $disesuaikan = 0;
        $data = null;
        foreach ($akun as $item) {
            $data = neraca($kriteria, $periode, $tanggal_awal, $tanggal_akhir, $bulan, $item, $saldo, $penyesuaian);
            $saldo = $data['saldo'];
            $penyesuaian = $data['penyesuaian'];
        }
        if ($data) {
            $disesuaikan = $data['disesuaikan'];
        }
        return $disesuaikan;
    }
}

if (!function_exists('saldo')) {
    function saldo($jurnal_umum, $saldo = 0)
    {
        if ($jurnal_umum->debit_atau_kredit == $jurnal_umum->akun->post_saldo) {
            $saldo += $jurnal_umum->nilai;
        } else {
            $saldo -= $jurnal_umum->nilai;
        }
        return $saldo;
    }
}

if (!function_exists('tgl')) {
    function tgl($tanggal)
    {
        $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);

        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun

        return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
    }
}

if (!function_exists('neraca')) {
    function neraca($kriteria, $periode, $tanggal_awal, $tanggal_akhir, $bulan, $item, $saldo = 0, $penyesuaian = 0)
    {
        switch ($kriteria) {
            case 'periode':
                switch ($periode) {
                    case '1-bulan-terakhir':
                        foreach ($item->jurnal_umum as $jurnal_umum) {
                            if (date('Y-m', strtotime($jurnal_umum->tanggal)) == date('Y-m')) {
                                $saldo = saldo($jurnal_umum, $saldo);
                            }
                        }

                        foreach ($item->jurnal_penyesuaian as $jurnal_penyesuaian) {
                            if (date('Y-m', strtotime($jurnal_penyesuaian->tanggal)) == date('Y-m')) {
                                $penyesuaian += $jurnal_penyesuaian->nilai;
                            }
                        }

                        break;

                    case '1-minggu-terakhir':
                        foreach ($item->jurnal_umum->whereBetween('tanggal', [date('Y-m-d', strtotime('-7 day')), date('Y-m-d')]) as $jurnal_umum) {
                            $saldo = saldo($jurnal_umum, $saldo);
                        }

                        foreach ($item->jurnal_penyesuaian->whereBetween('tanggal', [date('Y-m-d', strtotime('-7 day')), date('Y-m-d')]) as $jurnal_penyesuaian) {
                            $penyesuaian += $jurnal_penyesuaian->nilai;
                        }

                        break;
                }
                break;

            case 'rentang-waktu':
                foreach ($item->jurnal_umum->whereBetween('tanggal', [$tanggal_awal, $tanggal_akhir]) as $jurnal_umum) {
                    $saldo = saldo($jurnal_umum, $saldo);
                }

                foreach ($item->jurnal_penyesuaian->whereBetween('tanggal', [$tanggal_awal, $tanggal_akhir]) as $jurnal_penyesuaian) {
                    $penyesuaian += $jurnal_penyesuaian->nilai;
                }

                break;

            case 'bulan':
                foreach ($item->jurnal_umum as $jurnal_umum) {
                    if (date('Y-m', strtotime($jurnal_umum->tanggal)) == date('Y-m', strtotime($bulan))) {
                        $saldo = saldo($jurnal_umum, $saldo);
                    }
                }

                foreach ($item->jurnal_penyesuaian as $jurnal_penyesuaian) {
                    if (date('Y-m', strtotime($jurnal_penyesuaian->tanggal)) == date('Y-m', strtotime($bulan))) {
                        $penyesuaian += $jurnal_penyesuaian->nilai;
                    }
                }

                break;

            default:
                foreach ($item->jurnal_umum as $jurnal_umum) {
                    $saldo = saldo($jurnal_umum, $saldo);
                }

                foreach ($item->jurnal_penyesuaian as $jurnal_penyesuaian) {
                    $penyesuaian += $jurnal_penyesuaian->nilai;
                }

                break;
        }

        if ($item->post_saldo == $item->post_penyesuaian) {
            $disesuaikan = $saldo + $penyesuaian;
        } else {
            $disesuaikan = $saldo - $penyesuaian;
        }

        return [
            'saldo'         => $saldo,
            'penyesuaian'   => $penyesuaian,
            'disesuaikan'   => $disesuaikan
        ];
    }
}

if (!function_exists('neraca_akun')) {
    function neraca_akun($kriteria, $periode, $tanggal_awal, $tanggal_akhir, $bulan, $akun)
    {
        $saldo = 0;
        $penyesuaian = 0;
        $disesuaikan = 0;
        $data = null;
        foreach ($akun as $item) {
            $data = neraca($kriteria, $periode, $tanggal_awal, $tanggal_akhir, $bulan, $item, $saldo, $penyesuaian);
            $saldo = $data['saldo'];
            $penyesuaian = $data['penyesuaian'];
        }
        if ($data) {
            $disesuaikan = $data['disesuaikan'];
        }
        return $disesuaikan;
    }
}

if (!function_exists('saldo')) {
    function saldo($jurnal_umum, $saldo = 0)
    {
        if ($jurnal_umum->debit_atau_kredit == $jurnal_umum->akun->post_saldo) {
            $saldo += $jurnal_umum->nilai;
        } else {
            $saldo -= $jurnal_umum->nilai;
        }
        return $saldo;
    }
}
