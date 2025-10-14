<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    
    // Using 'video_id' as the primary key as defined in the migration
    protected $primaryKey = 'video_id';
    
    protected $fillable = [
        'program_id',
        'title_th',
        'title_en',
        'url',
        'description_th',
        'description_en'
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
        return 'video_id';
    }
}
