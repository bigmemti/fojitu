<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    use HasFactory;

    protected $fillable = [
        'university_id',
        'major_id'
    ];

    public function university(){
        return $this->belongsTo(University::class);
    }

    public function major(){
        return $this->belongsTo(Major::class);
    }

    public function courses(){
        return $this->hasMany(Course::class);
    }
}
