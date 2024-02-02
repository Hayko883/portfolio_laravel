<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

	const ROLE_SUPERADMIN = 1;
	const ROLE_ADMIN = 2;
	const ROLE_USER = 3;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded =[];

    public function language(){
        return $this->belongsToMany(Language::class,'user_languages')->withPivot('percent');
    }

    public function skill(){
        return $this->belongsToMany(Skill::class,'user_skills')->withPivot('percent');
    }
	
	public function education(){
		return $this->hasMany(Education::class);
	}
	
	public function works()
	{
		return $this->hasMany(Works::class);
	}

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
        'password' => 'hashed',
    ];
}
