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

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'programs' => Program::count(),
            'activities' => Activity::count(),
            'faculty' => FacultyMember::count(),
            'careers' => CareerOpportunity::count(),
            'laboratories' => Laboratory::count(),
            'studentWorks' => StudentWork::count(),
            'videos' => Video::count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
