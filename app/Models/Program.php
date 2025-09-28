<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $primaryKey = 'program_id';

    protected $fillable = [
        'program_name_th',
        'program_name_en',
        'degree_th',
        'degree_en',
        'credits_required',
        'language_th',
        'tuition_fee',
        'curriculum_year',
    ];
    
    public function activities()
    {
        return $this->hasMany(Activity::class, 'program_id');
    }
    
    public function facultyMembers()
    {
        return $this->hasMany(FacultyMember::class, 'program_id');
    }
    
    public function careerOpportunities()
    {
        return $this->hasMany(CareerOpportunity::class, 'program_id');
    }
    
    public function laboratories()
    {
        return $this->hasMany(Laboratory::class, 'program_id');
    }
    
    public function studentWorks()
    {
        return $this->hasMany(StudentWork::class, 'program_id');
    }
    
    public function videos()
    {
        return $this->hasMany(Video::class, 'program_id');
    }
}
