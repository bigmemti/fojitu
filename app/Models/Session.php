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

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
