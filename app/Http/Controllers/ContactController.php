<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ContactController extends Controller
{
    public function create()
    {
        return Inertia::render('Contact/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'phone' => ['required'],
        ]);


        return back()->with('success', 'Contact created.');
    }

    public function show($id)
    {
        $contact = auth()->user()->contacts()->findOrFail($id);
        return Inertia::render('Contact/Show', [
            'contact' => $contact,
        ]);
    }
}
