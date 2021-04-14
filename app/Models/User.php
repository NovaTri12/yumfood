<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\ClientRepository;
use Laravel\Passport\HasApiTokens;
use Laravel\Passport\Token;
use Laravel\Passport\TokenRepository;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
	 * Get personal access token for user.
	 *
	 * @return \Laravel\Passport\Token|null
	 */
    public function getToken(): ? Token 
    {
		return app(TokenRepository::class)->findValidToken(
			$this, app(ClientRepository::class)->personalAccessClient()
		);
	}

    public function orders()
    {
        return $this->belongsToMany('App\Models\Order', 'order_histories', 'user_id', 'order_id');
    }

    protected $with = [
        'orders'
    ];

}
