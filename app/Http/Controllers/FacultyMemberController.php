<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FacultyMember;
use App\Models\Program;

class FacultyMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $facultyMembers = FacultyMember::with('program')->paginate(10);
        $programs = Program::all();
        return view('admin.faculty.index', compact('facultyMembers', 'programs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $programs = Program::all();
        return view('admin.faculty.create', compact('programs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'program_id' => 'required|exists:programs,program_id',
            'name_th' => 'required|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'position_th' => 'required|string|max:255',
            'position_en' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'image_path' => 'nullable|url|exclude_if:file_path,""',
            'file_path' => 'nullable|file|max:10240', // Max 10MB
            'biography_th' => 'nullable|string',
            'biography_en' => 'nullable|string',
        ]);

        // Ensure only one image field is used
        if ($request->filled('image_path') && $request->hasFile('file_path')) {
            return redirect()->back()->withErrors(['error' => 'กรุณาใช้เพียงวิธีเดียวในการเพิ่มรูปภาพ (ลิงก์ หรือ แนบไฟล์)'])->withInput();
        }

        $data = $request->except('file_path');

        // Handle file upload if present
        if ($request->hasFile('file_path')) {
            $file = $request->file('file_path');
            $path = $file->store('faculty/images', 'public');
            $data['file_path'] = $path;
            // Clear image_path if file is uploaded
            if (isset($data['image_path'])) {
                unset($data['image_path']);
            }
        }

        FacultyMember::create($data);

        return redirect()->route('admin.faculty.index')->with('success', 'เพิ่มข้อมูลอาจารย์เรียบร้อยแล้ว');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $faculty_id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $faculty_id)
    {
        $facultyMember = FacultyMember::findOrFail($faculty_id);
        $programs = Program::all();
        return view('admin.faculty.edit', compact('facultyMember', 'programs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $faculty_id)
    {
        $request->validate([
            'program_id' => 'required|exists:programs,program_id',
            'name_th' => 'required|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'position_th' => 'required|string|max:255',
            'position_en' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'image_path' => 'nullable|url|exclude_if:file_path,""',
            'file_path' => 'nullable|file|max:10240', // Max 10MB
            'biography_th' => 'nullable|string',
            'biography_en' => 'nullable|string',
        ]);

        // Ensure only one image field is used
        if ($request->filled('image_path') && $request->hasFile('file_path')) {
            return redirect()->back()->withErrors(['error' => 'กรุณาใช้เพียงวิธีเดียวในการเพิ่มรูปภาพ (ลิงก์ หรือ แนบไฟล์)'])->withInput();
        }

        $facultyMember = FacultyMember::findOrFail($faculty_id);
        $data = $request->except('file_path');

        // Handle file upload if present
        if ($request->hasFile('file_path')) {
            // Delete old file if exists
            if ($facultyMember->file_path) {
                \Storage::disk('public')->delete($facultyMember->file_path);
            }
            
            $file = $request->file('file_path');
            $path = $file->store('faculty/images', 'public');
            $data['file_path'] = $path;
            // Clear image_path if file is uploaded
            if (isset($data['image_path'])) {
                unset($data['image_path']);
            }
        }

        $facultyMember->update($data);

        return redirect()->route('admin.faculty.index')->with('success', 'แก้ไขข้อมูลอาจารย์เรียบร้อยแล้ว');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $faculty_id)
    {
        $facultyMember = FacultyMember::findOrFail($faculty_id);
        $facultyMember->delete();

        return redirect()->route('admin.faculty.index')->with('success', 'ลบข้อมูลอาจารย์เรียบร้อยแล้ว');
    }
}

