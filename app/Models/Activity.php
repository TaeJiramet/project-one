<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    
    // Using 'activity_id' as the primary key as defined in the migration
    protected $primaryKey = 'activity_id';
    
    protected $fillable = [
        'program_id',
        'title_th',
        'description_th',
        'activity_date',
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
        return 'activity_id';
    }
}
