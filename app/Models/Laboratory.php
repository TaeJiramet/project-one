<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laboratory extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'lab_id';
    
    protected $fillable = [
        'program_id',
        'name_th',
        'name_en',
        'description_th',
        'description_en',
        'image_path'
    ];
    
    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }
}
