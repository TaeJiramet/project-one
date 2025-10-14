<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;

class AdminProgramController extends Controller
{
    /**
     * Display the program for editing.
     */
    public function index()
    {
        $program = Program::first();
        if (!$program) {
            $program = new Program();
        }
        return view('admin.programs.index', compact('program'));
    }

    /**
     * Show the form for editing the program.
     */
    public function edit()
    {
        $program = Program::first();
        if (!$program) {
            $program = new Program();
        }
        return view('admin.programs.edit', compact('program'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'program_name_th' => 'required|string|max:255',
            'program_name_en' => 'nullable|string|max:255',
            'degree_th' => 'nullable|string|max:255',
            'degree_en' => 'nullable|string|max:255',
            'credits_required' => 'nullable|integer',
            'language_th' => 'nullable|string|max:255',
            'tuition_fee' => 'nullable|numeric',
            'curriculum_year' => 'nullable|integer',
        ]);

        $program = Program::first();
        if ($program) {
            $program->update($request->all());
        } else {
            Program::create($request->all());
        }

        return redirect()->route('admin.programs.index')->with('success', 'อัปเดตข้อมูลหลักสูตรเรียบร้อยแล้ว');
    }
}
