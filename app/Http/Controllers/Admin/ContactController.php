<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contacts()
    {
        $contacts = Contact::all();
        return view('dashboard.admin.contact.all', compact('contacts'));
    }
}
