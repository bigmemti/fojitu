<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        "box_id",
        "organization_id",
        "title"
    ];

    public function box()
    {
        return $this->belongsTo(Box::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}