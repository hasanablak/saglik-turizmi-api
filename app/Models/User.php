<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use App\Models\{UserTypes, Transport, TransportsUsers};
use Illuminate\Database\Eloquent\Builder;
use App\Filters\TravellerFilters\TravellerFilters;

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
			'transports_users',
			'user_id',
			'user_types_id'
		);
	}
	public function transports()
	{
		/*
		return $this->belongsToMany(
			Transport::class,
			'transports_users',
			'user_id',
			'transports_id'
		)->withPivot('user_types_id');
		*/
		return $this->belongsToMany(
			Transport::class,
			'transports_users',
			'user_id',
			'transports_id'
		)
			->withPivot('user_types_id')
			->using(TransportsUsers::class);
	}

	protected function password(): Attribute
	{
		return new Attribute(
			//get: fn($value) => "",
			set: fn ($value) => Hash::make($value)
		);
	}

	public function scopeFilter(Builder $builder)
	{
		return (new TravellerFilters(request()))->filter($builder);
	}
}
