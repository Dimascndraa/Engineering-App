<?php

namespace App\Http\Controllers\AppController;

use App\Http\Controllers\Controller;

class MiscellaneousController extends Controller
{
    public function miscellaneous_fullcalendar()
    {
        return view('pages.default-menu.miscellaneous.miscellaneous_fullcalendar');
    }
    public function miscellaneous_lightgallery()
    {
        return view('pages.default-menu.miscellaneous.miscellaneous_lightgallery');
    }
}
