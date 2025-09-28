<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Activity;
use App\Models\FacultyMember;
use App\Models\CareerOpportunity;
use App\Models\Laboratory;
use App\Models\StudentWork;
use App\Models\Video;

class PublicController extends Controller
{
    public function index()
    {
        $program = Program::first();
        $updatedAt = $program?->updated_at;
        
        // Get related data for public view
        $activities = $program ? Activity::where('program_id', $program->program_id)->get() : collect();
        $facultyMembers = $program ? FacultyMember::where('program_id', $program->program_id)->get() : collect();
        $careerOpportunities = $program ? CareerOpportunity::where('program_id', $program->program_id)->limit(3)->get() : collect();
        $laboratories = $program ? Laboratory::where('program_id', $program->program_id)->whereNotNull('image_path')->get() : collect();
        $studentWorks = $program ? StudentWork::where('program_id', $program->program_id)->whereNotNull('image_path')->get() : collect();
        $videos = $program ? Video::where('program_id', $program->program_id)->limit(3)->get() : collect();

        return view('index', compact(
            'program', 
            'updatedAt',
            'activities',
            'facultyMembers',
            'careerOpportunities',
            'laboratories',
            'studentWorks',
            'videos'
        ));
    }
}
