<?php

namespace App\Http\Controllers\AppController;

use App\Http\Controllers\Controller;

class InfoappController extends Controller
{
    public function info_app_docs()
    {
        return view('pages.default-menu.infoapp.info_app_docs');
    }
    public function info_app_licensing()
    {
        return view('pages.default-menu.infoapp.info_app_licensing');
    }
    public function info_app_flavors()
    {
        return view('pages.default-menu.infoapp.info_app_flavors');
    }
}
