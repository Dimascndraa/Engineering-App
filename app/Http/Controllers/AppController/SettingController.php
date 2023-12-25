<?php

namespace App\Http\Controllers\AppController;

use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function settings_how_it_works()
    {
        return view('pages.default-menu.settings.settings_how_it_works');
    }
    public function settings_layout_options()
    {
        return view('pages.default-menu.settings.settings_layout_options');
    }
    public function settings_theme_modes()
    {
        return view('pages.default-menu.settings.settings_theme_modes');
    }
    public function settings_skin_options()
    {
        return view('pages.default-menu.settings.settings_skin_options');
    }
    public function settings_saving_db()
    {
        return view('pages.default-menu.settings.settings_saving_db');
    }
}
