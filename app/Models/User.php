<?php

namespace App\Models;

use App\Services\AuthorizeService;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    protected function isAdmin(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => $attributes['type'] == self::ADMIN_TYPE,
        );
    }

    const ADMIN_TYPE = 0;
    const USER_TYPE = 1;

    public function teacher()
    {
        return $this->hasOne(Teacher::class);
    }

    public function teacher_request()
    {
        return $this->hasOne(TeacherRequest::class);
    }

    public function student()
    {
        return $this->hasOne(Student::class);
    }

    public function isMemberOf(Course $course) : bool{
        return self::where('id', $this->id)->whereRelation('student.courses','courses.id',$course->id)->count() !== 0;
    }

    public function hasPermission(string $permission_name){
        return  AuthorizeService::exists($permission_name, $this);
    }

    public function roles(){
        return $this->belongsToMany(Role::class);
    }
}
