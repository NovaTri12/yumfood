<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dishes extends Model
{
    protected $fillable = [
        'vendor_id',
        'name',
        'photo',
        'price'
    ];

    public function vendors()
    {
        return $this->belongsTo('App\Models\Vendor');
    }
}
