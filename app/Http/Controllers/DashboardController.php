<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $contacts = auth()->user()->contacts()->latest()->get();
        return Inertia::render('Dashboard/Index', [
            'contacts' => $contacts,
        ]);
    }
}
