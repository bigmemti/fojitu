<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    use HasFactory;

    protected $fillable = [
        'answer',
        'home_work_id',
        'member_id'
    ];

    public function member(){
        return $this->belongsTo(Member::class);
    }

    public function homework(){
        return $this->belongsTo(HomeWork::class,'home_work_id');
    }

    public function files(){
        return $this->morphToMany(File::class,'fileable',Fileable::class)->withPivot(['id']);
    }
}
