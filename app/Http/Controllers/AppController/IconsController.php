<?php

namespace App\Http\Controllers\AppController;

use App\Http\Controllers\Controller;

class IconsController extends Controller
{
    public function icons_fontawesome_light()
    {
        return view('pages.default-menu.icons.icons_fontawesome_light');
    }
    public function icons_fontawesome_regular()
    {
        return view('pages.default-menu.icons.icons_fontawesome_regular');
    }
    public function icons_fontawesome_solid()
    {
        return view('pages.default-menu.icons.icons_fontawesome_solid');
    }
    public function icons_fontawesome_brand()
    {
        return view('pages.default-menu.icons.icons_fontawesome_brand');
    }
    public function icons_nextgen_general()
    {
        return view('pages.default-menu.icons.icons_nextgen_general');
    }
    public function icons_nextgen_base()
    {
        return view('pages.default-menu.icons.icons_nextgen_base');
    }
    public function icons_stack_showcase()
    {
        return view('pages.default-menu.icons.icons_stack_showcase');
    }
    public function icons_stack_generate()
    {
        return view('pages.default-menu.icons.icons_stack_generate');
    }
}
