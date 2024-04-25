<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table="users";

    // public function role(){
    //     return $this->belongsTo(User::class,'id_role');
    // }
    // public function status(){
    //     return $this->belongsTo(User::class,'id_status');
    // }
    public function status()
    {
        return $this->belongsTo(Status::class, 'id_status');
    }
    public function role()
    {
        return $this->belongsTo(Role::class, 'id_role');
    }
    public function isAdmin()
    {
        return $this->id_role === 1;
    }




    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'login',
        'name',
        'lastname',
        'id_status',
        'avatar',
        'age',
        'work_experience',
        'phone',
        'password',
        'id_role'
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
}
