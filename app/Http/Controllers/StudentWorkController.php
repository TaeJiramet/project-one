<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentWork;
use App\Models\Program;

class StudentWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $studentWorks = StudentWork::with('program')->paginate(10);
        return view('admin.student-works.index', compact('studentWorks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $programs = Program::all();
        return view('admin.student-works.create', compact('programs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'program_id' => 'required|exists:programs,program_id',
            'title_th' => 'required|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'description_th' => 'nullable|string',
            'description_en' => 'nullable|string',
            'image_path' => 'nullable|url',
        ]);

        StudentWork::create($request->all());

        return redirect()->route('admin.student-works.index')->with('success', 'เพิ่มผลงานนักศึกษาเรียบร้อยแล้ว');
    }

    /**
     * Display the specified resource.
     */
    public function show(StudentWork $student_work)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentWork $student_work)
    {
        $programs = Program::all();
        return view('admin.student-works.edit', compact('student_work', 'programs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudentWork $student_work)
    {
        $request->validate([
            'program_id' => 'required|exists:programs,program_id',
            'title_th' => 'required|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'description_th' => 'nullable|string',
            'description_en' => 'nullable|string',
            'image_path' => 'nullable|url',
        ]);

        $student_work->update($request->all());

        return redirect()->route('admin.student-works.index')->with('success', 'แก้ไขข้อมูลผลงานนักศึกษาเรียบร้อยแล้ว');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentWork $student_work)
    {
        $student_work->delete();

        return redirect()->route('admin.student-works.index')->with('success', 'ลบข้อมูลผลงานนักศึกษาเรียบร้อยแล้ว');
    }
}
