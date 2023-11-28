<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        "box_id",
        "title"
    ]

    public function box()
    {
        $this->belongsTo(Box::class);
    }


}