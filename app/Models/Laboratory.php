<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laboratory extends Model
{
    use HasFactory;
    
    // Using 'lab_id' as the primary key as defined in the migration
    protected $primaryKey = 'lab_id';
    
    protected $fillable = [
        'program_id',
        'name_th',
        'name_en',
        'description_th',
        'description_en',
        'image_path',
        'file_path'
    ];
    
    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }
    
    /**
     * Get the route key for binding.
     */
    public function getRouteKeyName()
    {
        return 'lab_id';
    }
}
