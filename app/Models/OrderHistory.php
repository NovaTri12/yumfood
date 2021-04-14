<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\ClientRepository;
use Laravel\Passport\HasApiTokens;
use Laravel\Passport\Token;
use Laravel\Passport\TokenRepository;

use Request;

class OrderHistory extends Model
{
    use HasApiTokens, Notifiable;

    public $timestamps = false;
    public $incrementing = false;
    
    protected $fillable = [
        'order_id',
        'user_id',
        'created_at'
    ];
}
