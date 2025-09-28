<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'alumnus_id';
    
    protected $fillable = [
        'program_id',
        'name_th',
        'name_en',
        'position_th',
        'position_en',
        'company_th',
        'company_en',
        'biography_th',
        'biography_en'
    ];
    
    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }
}
