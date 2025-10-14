<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\Program;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activities = Activity::with('program')->paginate(10);
        return view('admin.activities.index', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $programs = Program::all();
        return view('admin.activities.create', compact('programs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'program_id' => 'required|exists:programs,program_id',
            'title_th' => 'required|string|max:255',
            'description_th' => 'nullable|string',
            'activity_date' => 'required|date',
            'image_path' => 'nullable|url',
        ]);

        Activity::create($request->all());

        return redirect()->route('admin.activities.index')->with('success', 'เพิ่มกิจกรรมเรียบร้อยแล้ว');
    }

    /**
     * Display the specified resource.
     */
    public function show(Activity $activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Activity $activity)
    {
        $programs = Program::all();
        return view('admin.activities.edit', compact('activity', 'programs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Activity $activity)
    {
        $request->validate([
            'program_id' => 'required|exists:programs,program_id',
            'title_th' => 'required|string|max:255',
            'description_th' => 'nullable|string',
            'activity_date' => 'required|date',
            'image_path' => 'nullable|url',
        ]);

        $activity->update($request->all());

        return redirect()->route('admin.activities.index')->with('success', 'แก้ไขข้อมูลกิจกรรมเรียบร้อยแล้ว');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Activity $activity)
    {
        $activity->delete();

        return redirect()->route('admin.activities.index')->with('success', 'ลบข้อมูลกิจกรรมเรียบร้อยแล้ว');
    }
}
