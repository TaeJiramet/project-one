<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;

class PublicController extends Controller
{
    public function index()
    {
    $program = Program::first();
    $updatedAt = $program?->updated_at;

    return view('index', compact('program', 'updatedAt'));
        //return view('index');
    }
}
