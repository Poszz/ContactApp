<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ContactController extends Controller
{
    public function index()
    {
        // $people = [
        //     'Taylor Otwell',
        //     'Dayle Rees',
        //     'Eric Barnes',
        // ];
        // return Inertia::render('Contact/Dashboard', [
        //     'people' => $people,

        // ]);
    }
    // public function store()
    // {
    //     return Inertia::render('Contact/Index');
    // }
    // public function update()
    // {
    //     return Inertia::render('Contact/Index');
    // }
    // public function destroy()
    // {
    //     return Inertia::render('Contact/Index');
    // }
    // public function show()
    // {
    //     return Inertia::render('Contact/Index');
    // }
    // public function edit()
    // {
    //     return Inertia::render('Contact/Index');
    // }
    public function create()
    {
        return Inertia::render('Contact/Create');
    }
}
