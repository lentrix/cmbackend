<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;

    protected $fillable =['user_id', 'store_id', 'designation'];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function store() {
        return $this->belongsTo('App\Models\Store');
    }
}
