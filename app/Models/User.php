<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\{UserTypes, Transport};

class User extends Authenticatable
{
	use HasApiTokens, HasFactory, Notifiable;


	protected $fillable = [
		'name',
		'email',
		'password',
	];

	protected $hidden = [
		'password',
		'remember_token',
	];

	protected $casts = [
		'email_verified_at' => 'datetime',
	];

	public function types()
	{
		return $this->belongsToMany(
			UserTypes::class,
			'user_types_users',
			'user_id',
			'user_types_id'
		);
	}

	public function transports()
	{
		return $this->belongsToMany(
			Transport::class,
			'transports_users',
			'user_id',
			'transports_id'
		);
	}
}
