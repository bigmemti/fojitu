<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];


    public function mimes(){
        return $this->hasMany(Mime::class);
    }

    public function homeworks(){
        return $this->belongsToMany(HomeWork::class);
    }

    public function isDeletable(){
        return $this->mimes()->count() === 0 && $this->homeworks()->count() === 0;
    }
}
