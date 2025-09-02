<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;

class PublicController extends Controller
{
    public function index()
    {
        $program = Program::first();

        return view('index', compact('program'));
        //return view('index');
    }
}
