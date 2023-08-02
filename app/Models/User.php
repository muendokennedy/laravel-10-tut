<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar'
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
    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn($value) => Str::upper($value),
        );
    }
    protected function isAdmin(): Attribute
    {
        $admins = ['kennedymunyao1fx@gmail.com'];
        return Attribute::make(
            get: fn() => in_array($this->email,$admins),
        );
    }

	/**
	 * The attributes that should be cast.
	 *
	 * @return array<string, string>
	 */
	public function getCasts() {
		return $this->casts;
	}

	/**
	 * The attributes that should be cast.
	 *
	 * @param array<string, string> $casts The attributes that should be cast.
	 * @return self
	 */
	public function setCasts($casts): self {
		$this->casts = $casts;
		return $this;
	}
}
