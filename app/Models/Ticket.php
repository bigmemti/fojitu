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

    const statuses = ['Created', 'Seen', 'Not Seen', 'Closed'];

    public function box()
    {
        return $this->belongsTo(Box::class);
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
