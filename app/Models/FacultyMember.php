<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacultyMember extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'faculty_id';
    
    protected $fillable = [
        'program_id',
        'name_th',
        'name_en',
        'position_th',
        'position_en',
        'email',
        'phone',
        'image_path',
        'biography_th',
        'biography_en'
    ];
    
    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }
}
