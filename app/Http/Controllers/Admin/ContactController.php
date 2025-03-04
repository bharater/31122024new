<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactSubmission;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',  // Added validation for phone
            'message' => 'required|string',
        ]);

        ContactSubmission::create($request->all());

        return redirect()->back()->with('success', 'Your message has been sent successfully.');
    }

    public function index()
    {
        $submissions = ContactSubmission::all();

        return view('admin.contact.index', compact('submissions'));
    }
}
