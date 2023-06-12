<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];

    public function tests(){
        return $this->hasMany(Test::class);
    }

    public function carts(){
        return $this->hasMany(Cart::class);
    }

    public function cartUser(){
        return $this->belongsToMany(User::class, 'cart')
            ->withPivot('is_active')
            ->withTimestamps();
    }
}
