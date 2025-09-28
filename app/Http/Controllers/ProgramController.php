<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;

class ProgramController extends Controller
{
    /** Show view for the single program (read-only) */
    public function edit()
    {
        $program = Program::first();
        if (! $program) {
            $program = new Program();
        }

        return view('programs.show', compact('program'));
    }

    /**
     * Update method that redirects to homepage
     * This prevents unauthorized updates since we removed authentication
     */
    public function update(Request $request)
    {
        // Redirect to home page since updates are not allowed for public users
        return redirect()->route('home')->with('error', 'การอัปเดตข้อมูลต้องได้รับอนุญาตจากผู้ดูแลระบบ');
    }
}
