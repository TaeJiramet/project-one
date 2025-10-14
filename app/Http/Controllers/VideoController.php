<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Program;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videos = Video::with('program')->paginate(10);
        return view('admin.videos.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $programs = Program::all();
        return view('admin.videos.create', compact('programs'));
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
            'url' => 'required|url',
            'description_th' => 'nullable|string',
            'description_en' => 'nullable|string',
        ]);

        Video::create($request->all());

        return redirect()->route('admin.videos.index')->with('success', 'เพิ่มวิดีโอเรียบร้อยแล้ว');
    }

    /**
     * Display the specified resource.
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Video $video)
    {
        $programs = Program::all();
        return view('admin.videos.edit', compact('video', 'programs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Video $video)
    {
        $request->validate([
            'program_id' => 'required|exists:programs,program_id',
            'title_th' => 'required|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'url' => 'required|url',
            'description_th' => 'nullable|string',
            'description_en' => 'nullable|string',
        ]);

        $video->update($request->all());

        return redirect()->route('admin.videos.index')->with('success', 'แก้ไขข้อมูลวิดีโอเรียบร้อยแล้ว');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Video $video)
    {
        $video->delete();

        return redirect()->route('admin.videos.index')->with('success', 'ลบวิดีโอเรียบร้อยแล้ว');
    }
}
