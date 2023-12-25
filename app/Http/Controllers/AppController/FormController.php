<?php

namespace App\Http\Controllers\AppController;

use App\Http\Controllers\Controller;

class FormController extends Controller
{
    public function form_basic_inputs()
    {
        return view('pages.default-menu.form.form_basic_inputs');
    }
    public function form_checkbox_radio()
    {
        return view('pages.default-menu.form.form_checkbox_radio');
    }
    public function form_input_groups()
    {
        return view('pages.default-menu.form.form_input_groups');
    }
    public function form_validation()
    {
        return view('pages.default-menu.form.form_validation');
    }
    public function form_elements()
    {
        return view('pages.default-menu.form.form_elements');
    }
    public function form_samples()
    {
        return view('pages.default-menu.form.form_samples');
    }
}
