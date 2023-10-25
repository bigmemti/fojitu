<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Session extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
    ];

    public function topics()
    {
        return $this->hasMany(Topic::class);
    }

    public function homeworks()
    {
        return $this->hasMany(HomeWork::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function members(){
        return $this->belongsToMany(Member::class, Attendance::class)->withPivot(['id','status']);
    }
}
