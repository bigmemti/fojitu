<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'member_id',
        'session_id'
    ];

    const statuses = ['Present', 'Absent', 'Excused'];

    public function session(){
        return $this->belongsTo(Session::class);
    }
}
