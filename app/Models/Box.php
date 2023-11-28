<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id"
    ];

    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function tickets()
    {

    }

    public function messages(Ticket $ticket) : Attribute
    {
        return Attribute::make(
            get : fn() => null
        );
    }

    public function organizations()
    {

    }
}
