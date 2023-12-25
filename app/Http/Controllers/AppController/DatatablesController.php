<?php

namespace App\Http\Controllers\AppController;

use App\Http\Controllers\Controller;

class DatatablesController extends Controller
{
    public function datatables_basic()
    {
        return view('pages.default-menu.datatables.datatables_basic');
    }
    public function datatables_autofill()
    {
        return view('pages.default-menu.datatables.datatables_autofill');
    }
    public function datatables_buttons()
    {
        return view('pages.default-menu.datatables.datatables_buttons');
    }
    public function datatables_export()
    {
        return view('pages.default-menu.datatables.datatables_export');
    }
    public function datatables_colreorder()
    {
        return view('pages.default-menu.datatables.datatables_colreorder');
    }
    public function datatables_columnfilter()
    {
        return view('pages.default-menu.datatables.datatables_columnfilter');
    }
    public function datatables_fixedcolumns()
    {
        return view('pages.default-menu.datatables.datatables_fixedcolumns');
    }
    public function datatables_fixedheader()
    {
        return view('pages.default-menu.datatables.datatables_fixedheader');
    }
    public function datatables_keytable()
    {
        return view('pages.default-menu.datatables.datatables_keytable');
    }
    public function datatables_responsive()
    {
        return view('pages.default-menu.datatables.datatables_responsive');
    }
    public function datatables_responsive_alt()
    {
        return view('pages.default-menu.datatables.datatables_responsive_alt');
    }
    public function datatables_rowgroup()
    {
        return view('pages.default-menu.datatables.datatables_rowgroup');
    }
    public function datatables_rowreorder()
    {
        return view('pages.default-menu.datatables.datatables_rowreorder');
    }
    public function datatables_scroller()
    {
        return view('pages.default-menu.datatables.datatables_scroller');
    }
    public function datatables_select()
    {
        return view('pages.default-menu.datatables.datatables_select');
    }
    public function datatables_alteditor()
    {
        return view('pages.default-menu.datatables.datatables_alteditor');
    }
}
