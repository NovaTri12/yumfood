<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'order_histories', 'order_id', 'user_id');
    }

    public function dishes()
    {
        return $this->belongsTo('App\Models\Dishes');
    }

    protected $fillable = [
        'dishes_id',
        'special_request',
        'quantity'
    ];

    protected $with = [
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

        if (isset($queryParams['dishes'])) {
            $query = $query->whereHas('dishes', function($q) use ($queryParams) {
                $q->where('name', 'LIKE', '%' . $queryParams['dishes'] . '%');
            });
        }

        if (isset($queryParams['perPage'])) {
            return $query->paginate($queryParams['perPage'])->appends(Request::except('page'));
        } else {
            return $query->paginate(40)->appends(Request::except('page'));
        }
    }

}
