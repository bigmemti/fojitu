<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    use HasFactory;

    protected $fillable = [
        'institution_id',
        'major_id'
    ];

    public function institution(){
        return $this->belongsTo(Institution::class);
    }

    public function major(){
        return $this->belongsTo(Major::class);
    }

    public function courses(){
        return $this->hasMany(Course::class);
    }
}
