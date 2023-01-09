<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\TransportsUsers;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use App\Models\{UserTypes, Transport};
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

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

	protected function password(): Attribute
	{
		return new Attribute(
			//get: fn($value) => "",
			set: fn ($value) => Hash::make($value)
		);
	}
}
