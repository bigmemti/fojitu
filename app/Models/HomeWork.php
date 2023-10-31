<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Morilog\Jalali\Jalalian;

class HomeWork extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'title',
        'body',
        'deadline',
    ] ;

    public function types(){
        return $this->belongsToMany(Type::class);
    }

    public function deadline() : Attribute{
        return Attribute::make(get: fn($value) => Jalalian::fromCarbon(Carbon::parse($value))->format('Y/m/d H:i:s'));
    }

    public function hasTimeLeft() : bool{
        return $this->deadline >= Jalalian::fromCarbon(Carbon::parse(now()))->format('Y/m/d H:i:s');
    }

    public function session(){
        return $this->belongsTo(Session::class);
    }

    public function members(){
        return $this->belongsToMany(Member::class, Submission::class)->withPivot(['id']);
    }

    public function submissions(){
        return $this->hasMany(Submission::class);
    }
}
