<?php

namespace App\Http\Controllers\AppController;

use App\Http\Controllers\Controller;

class PluginController extends Controller
{
    public function plugin_faq()
    {
        return view('pages.default-menu.plugin.plugin_faq');
    }
    public function plugin_waves()
    {
        return view('pages.default-menu.plugin.plugin_waves');
    }
    public function plugin_pacejs()
    {
        return view('pages.default-menu.plugin.plugin_pacejs');
    }
    public function plugin_smartpanels()
    {
        return view('pages.default-menu.plugin.plugin_smartpanels');
    }
    public function plugin_bootbox()
    {
        return view('pages.default-menu.plugin.plugin_bootbox');
    }
    public function plugin_slimscroll()
    {
        return view('pages.default-menu.plugin.plugin_slimscroll');
    }
    public function plugin_throttle()
    {
        return view('pages.default-menu.plugin.plugin_throttle');
    }
    public function plugin_navigation()
    {
        return view('pages.default-menu.plugin.plugin_navigation');
    }
    public function plugin_i18next()
    {
        return view('pages.default-menu.plugin.plugin_i18next');
    }
    public function plugin_appcore()
    {
        return view('pages.default-menu.plugin.plugin_appcore');
    }
}
