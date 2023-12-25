<?php

namespace App\Http\Controllers\AppController;

use App\Http\Controllers\Controller;

class FormpluginsController extends Controller
{
    public function form_plugins_colorpicker()
    {
        return view('pages.default-menu.formplugins.form_plugins_colorpicker');
    }
    public function form_plugins_datepicker()
    {
        return view('pages.default-menu.formplugins.form_plugins_datepicker');
    }
    public function form_plugins_daterange_picker()
    {
        return view('pages.default-menu.formplugins.form_plugins_daterange_picker');
    }
    public function form_plugins_dropzone()
    {
        return view('pages.default-menu.formplugins.form_plugins_dropzone');
    }
    public function form_plugins_ionrangeslider()
    {
        return view('pages.default-menu.formplugins.form_plugins_ionrangeslider');
    }
    public function form_plugins_inputmask()
    {
        return view('pages.default-menu.formplugins.form_plugins_inputmask');
    }
    public function form_plugin_imagecropper()
    {
        return view('pages.default-menu.formplugins.form_plugin_imagecropper');
    }
    public function form_plugin_select2()
    {
        return view('pages.default-menu.formplugins.form_plugin_select2');
    }
    public function form_plugin_summernote()
    {
        return view('pages.default-menu.formplugins.form_plugin_summernote');
    }
}
