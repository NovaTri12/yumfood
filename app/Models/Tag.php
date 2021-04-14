<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\ClientRepository;
use Laravel\Passport\HasApiTokens;
use Laravel\Passport\Token;
use Laravel\Passport\TokenRepository;

use Request;

class Tag extends Model
{
    use HasApiTokens, Notifiable;

    public function vendors()
    {
        return $this->belongsToMany('App\Models\Vendor', 'taggables', 'tag_id', 'taggable_id');
    }

    protected $fillable = [
        'name',
        'created_at'
    ];

    public function scopePagination($query, array $queryParams)
    {
        // Filter based on name
        if (isset($queryParams['name']) && $queryParams['name'] != '') {
            $query = $query->where('name', 'LIKE', '%' . $queryParams['name'] . '%');
        }

        if (isset($queryParams['sortByName'])) {
            $query = $query->orderBy('name', $queryParams['sortByName']);
        } else {
            $query = $query->orderBy('created_at', 'desc');
        }

        if (isset($queryParams['perPage'])) {
            return $query->paginate($queryParams['perPage'])->appends(Request::except('page'));
        } else {
            return $query->paginate(40)->appends(Request::except('page'));
        }
    }

}
