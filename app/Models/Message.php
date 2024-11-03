<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable=[
        "ticket_id",
        "box_id",
        "message"
    ];

    public function box()
    {
        return $this->belongsTo(Box::class);
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function files()
    {
        return $this->morphToMany(File::class , "fileable" , Fileable::class);
    }
}