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
}
