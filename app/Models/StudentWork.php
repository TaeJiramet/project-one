<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentWork extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'work_id';
    
    protected $fillable = [
        'program_id',
        'title_th',
        'title_en',
        'description_th',
        'description_en',
        'image_path'
    ];
    
    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }
}
