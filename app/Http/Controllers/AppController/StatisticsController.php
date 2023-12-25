<?php

namespace App\Http\Controllers\AppController;

use App\Http\Controllers\Controller;

class StatisticsController extends Controller
{
    public function statistics_flot()
    {
        return view('pages.default-menu.statistics.statistics_flot');
    }
    public function statistics_chartjs()
    {
        return view('pages.default-menu.statistics.statistics_chartjs');
    }
    public function statistics_chartist()
    {
        return view('pages.default-menu.statistics.statistics_chartist');
    }
    public function statistics_c3()
    {
        return view('pages.default-menu.statistics.statistics_c3');
    }
    public function statistics_peity()
    {
        return view('pages.default-menu.statistics.statistics_peity');
    }
    public function statistics_sparkline()
    {
        return view('pages.default-menu.statistics.statistics_sparkline');
    }
    public function statistics_easypiechart()
    {
        return view('pages.default-menu.statistics.statistics_easypiechart');
    }
    public function statistics_dygraph()
    {
        return view('pages.default-menu.statistics.statistics_dygraph');
    }
}
