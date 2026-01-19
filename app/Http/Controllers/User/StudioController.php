<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Studio;

class StudioController extends Controller
{
    public function index()
    {
        $studio = Studio::all();
        return view('users.studio.index', compact('studio'));
    }
    public function show($id)
    {
        $studio = Studio::findOrFail($id);
        return view('users.studio.show', compact('studio'));
    }
}
