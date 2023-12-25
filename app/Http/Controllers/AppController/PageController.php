<?php

namespace App\Http\Controllers\AppController;

use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function page_chat()
    {
        return view('pages.default-menu.page.page_chat');
    }
    public function page_contacts()
    {
        return view('pages.default-menu.page.page_contacts');
    }
    public function page_invoice()
    {
        return view('pages.default-menu.page.page_invoice');
    }
    public function page_profile()
    {
        return view('pages.default-menu.page.page_profile');
    }
    public function page_search()
    {
        return view('pages.default-menu.page.page_search');
    }
    public function blank()
    {
        return view('pages.default-menu.page.blank');
    }

    public function page_forum_list()
    {
        return view('pages.default-menu.page.forum.page_forum_list');
    }
    public function page_forum_threads()
    {
        return view('pages.default-menu.page.forum.page_forum_threads');
    }
    public function page_forum_discussion()
    {
        return view('pages.default-menu.page.forum.page_forum_discussion');
    }

    public function page_inbox_general()
    {
        return view('pages.default-menu.page.inbox.page_inbox_general');
    }
    public function page_inbox_read()
    {
        return view('pages.default-menu.page.inbox.page_inbox_read');
    }
    public function page_inbox_write()
    {
        return view('pages.default-menu.page.inbox.page_inbox_write');
    }

    public function page_error()
    {
        return view('pages.default-menu.page.error.page_error');
    }
    public function page_error_404()
    {
        return view('pages.default-menu.page.error.page_error_404');
    }
    public function page_error_announced()
    {
        return view('pages.default-menu.page.error.page_error_announced');
    }

    public function page_forget()
    {
        return view('pages.default-menu.page.autent.page_forget');
    }
    public function page_locked()
    {
        return view('pages.default-menu.page.autent.page_locked');
    }
    public function page_login()
    {
        return view('pages.default-menu.page.autent.page_login');
    }
    public function page_login_alt()
    {
        return view('pages.default-menu.page.autent.page_login_alt');
    }
    public function page_register()
    {
        return view('pages.default-menu.page.autent.page_register');
    }
    public function page_confirmation()
    {
        return view('pages.default-menu.page.autent.page_confirmation');
    }
}
