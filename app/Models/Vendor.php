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
use Storage;

class Vendor extends Model
{
    use HasApiTokens, Notifiable;


    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'taggables', 'taggable_id', 'tag_id');
    }

    public function dishes()
    {
        return $this->hasOne('App\Models\Dishes');
    }

    protected $fillable = [
        'name',
        'logo',
        'created_at',
    ];
    
    protected $with = [
        'tags',
        'dishes'
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

        if (isset($queryParams['tags'])) {
            $query = $query->whereHas('tags', function($q) use ($queryParams) {
                $q->where('name', 'LIKE', '%' . $queryParams['tags'] . '%');
            });
        }

        if (isset($queryParams['perPage'])) {
            return $query->paginate($queryParams['perPage'])->appends(Request::except('page'));
        } else {
            return $query->paginate(40)->appends(Request::except('page'));
        }
    }
}
