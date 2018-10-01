<?php

namespace App\Http\Controllers\Admin;

use App\Models\ContactPage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function edit()
    {
        $page = ContactPage::get()->first();

        return view('admin.contacts.form', compact('page'));
    }

    public function update(Request $request)
    {
        $page = ContactPage::get()->first();
        $page->update($request->all());

        return view('admin.contacts.form', compact('page'));
    }
}
