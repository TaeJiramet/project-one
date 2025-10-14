<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CareerOpportunity;
use App\Models\Program;

class CareerOpportunityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $careerOpportunities = CareerOpportunity::with('program')->paginate(10);
        return view('admin.careers.index', compact('careerOpportunities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $programs = Program::all();
        return view('admin.careers.create', compact('programs'));
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
        ]);

        CareerOpportunity::create($request->all());

        return redirect()->route('admin.careers.index')->with('success', 'เพิ่มข้อมูลโอกาสทางอาชีพเรียบร้อยแล้ว');
    }

    /**
     * Display the specified resource.
     */
    public function show(CareerOpportunity $career)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CareerOpportunity $career)
    {
        $programs = Program::all();
        return view('admin.careers.edit', compact('career', 'programs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CareerOpportunity $career)
    {
        $request->validate([
            'program_id' => 'required|exists:programs,program_id',
            'title_th' => 'required|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'description_th' => 'nullable|string',
            'description_en' => 'nullable|string',
        ]);

        $career->update($request->all());

        return redirect()->route('admin.careers.index')->with('success', 'แก้ไขข้อมูลโอกาสทางอาชีพเรียบร้อยแล้ว');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CareerOpportunity $career)
    {
        $career->delete();

        return redirect()->route('admin.careers.index')->with('success', 'ลบข้อมูลโอกาสทางอาชีพเรียบร้อยแล้ว');
    }
}
