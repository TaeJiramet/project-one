<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;

class ProgramController extends Controller
{
    /** Show edit form for the single program (create if none exists) */
    public function edit()
    {
        $program = Program::first();
        if (! $program) {
            $program = new Program();
        }

        return view('programs.edit', compact('program'));
    }

    /** Create or update the single program */
    public function update(Request $request)
    {
        $data = $request->validate([
            'program_name_th' => ['required','string','max:255'],
            'program_name_en' => ['nullable','string','max:255'],
            'degree_th' => ['nullable','string','max:255'],
            'degree_en' => ['nullable','string','max:255'],
            'credits_required' => ['nullable','integer','min:0'],
            'language_th' => ['nullable','string','max:255'],
            'tuition_fee' => ['nullable','string','max:255'],
            'curriculum_year' => ['nullable','string','max:50'],
        ]);

        $program = Program::first();
        if (! $program) {
            $program = Program::create($data);
        } else {
            $program->update($data);
        }

        // update timestamp already handled by Eloquent
        return redirect()->route('program.edit')->with('success', 'Program saved');
    }
}
