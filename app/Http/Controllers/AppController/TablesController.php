<?php

namespace App\Http\Controllers\AppController;

use App\Http\Controllers\Controller;

class TablesController extends Controller
{
    public function tables_basic()
    {
        return view('pages.default-menu.tables.tables_basic');
    }
    public function tables_generate_style()
    {
        return view('pages.default-menu.tables.tables_generate_style');
    }
}
