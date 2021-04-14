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

class Taggable extends Model
{
    use HasApiTokens, Notifiable;

    public $timestamps = false;
    public $incrementing = false;
    
    protected $fillable = [
        'tag_id',
        'taggable_id',
        'taggable_type',
        'created_at'
    ];
}
