<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Practice extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'answer'
    ];

    public function topic(){
        return $this->belongsTo(Topic::class);
    }
}
