<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laboratory;
use App\Models\Program;

class LaboratoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $laboratories = Laboratory::with('program')->paginate(10);
        return view('admin.laboratories.index', compact('laboratories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $programs = Program::all();
        return view('admin.laboratories.create', compact('programs'));
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
            'description_th' => 'nullable|string',
            'description_en' => 'nullable|string',
            'image_path' => 'nullable|url',
        ]);

        Laboratory::create($request->all());

        return redirect()->route('admin.laboratories.index')->with('success', 'เพิ่มข้อมูลห้องปฏิบัติการเรียบร้อยแล้ว');
    }

    /**
     * Display the specified resource.
     */
    public function show(Laboratory $laboratory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Laboratory $laboratory)
    {
        $programs = Program::all();
        return view('admin.laboratories.edit', compact('laboratory', 'programs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Laboratory $laboratory)
    {
        $request->validate([
            'program_id' => 'required|exists:programs,program_id',
            'name_th' => 'required|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'description_th' => 'nullable|string',
            'description_en' => 'nullable|string',
            'image_path' => 'nullable|url',
        ]);

        $laboratory->update($request->all());

        return redirect()->route('admin.laboratories.index')->with('success', 'แก้ไขข้อมูลห้องปฏิบัติการเรียบร้อยแล้ว');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Laboratory $laboratory)
    {
        $laboratory->delete();

        return redirect()->route('admin.laboratories.index')->with('success', 'ลบข้อมูลห้องปฏิบัติการเรียบร้อยแล้ว');
    }
}
