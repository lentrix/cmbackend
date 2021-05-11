<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $fillable = ['name','proprietor','address','phone'];

    public function sellers() {
        return $this->hasMany('App\Models\Seller');
    }
}
