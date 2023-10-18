<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
    ];

    public function sessions()
    {
        return $this->hasMany(Session::class);
    }

    function teacher() {
        return $this->belongsTo(Teacher::class);
    }
}
