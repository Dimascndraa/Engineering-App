<?php

namespace App\Http\Controllers\AppController;

use App\Http\Controllers\Controller;

class IntelController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }
    public function intel_analytics_dashboard()
    {
        return view('pages.default-menu.intel.intel_analytics_dashboard');
    }
    public function intel_marketing_dashboard()
    {
        return view('pages.default-menu.intel.intel_marketing_dashboard');
    }
    public function intel_introduction()
    {
        return view('pages.default-menu.intel.intel_introduction');
    }
    public function intel_privacy()
    {
        return view('pages.default-menu.intel.intel_privacy');
    }
    public function intel_build_notes()
    {
        return view('pages.default-menu.intel.intel_build_notes');
    }
}
