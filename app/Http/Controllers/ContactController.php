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

    public function edit($id)
    {
        $contact = auth()->user()->contacts()->findOrFail($id);
        return Inertia::render('Contact/Edit', [
            'contact' => $contact,
        ]);
    }
    public function update(Request $request, $id)
    {
        $contact = auth()->user()->contacts()->findOrFail($id);
        $contact->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'desc' => $request->desc,
        ]);
        return inertia()->location(route('contact.show', $contact->id));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'desc' => 'nullable|string',
        ]);

        // Assuming you have a Contact model associated with the contacts table
        $contact = new Contact([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'desc' => $request->desc,
            'user_id' => auth()->id(),
        ]);

        $contact->save();

        return back();
    }


    public function show($id)
    {
        $contact = auth()->user()->contacts()->findOrFail($id);
        return Inertia::render('Contact/Show', [
            'contact' => $contact,
        ]);
    }

    public function destroy($id)
    {
        $contact = auth()->user()->contacts()->findOrFail($id);
        $contact->delete();
        return inertia()->location(route('dashboard'));
    }
}
