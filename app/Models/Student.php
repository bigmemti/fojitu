<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'curriculum_id',
        'student_id'
    ];

    public function curriculum(){
        return $this->belongsTo(Curriculum::class);
    }


    public function courses(){
        return $this->belongsToMany(Course::class,Member::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function members(){
        return $this->hasMany(Member::class);
    }
}
