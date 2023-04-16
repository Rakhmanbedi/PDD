<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable=['img', 'name', 'mobile', 'email', 'social', 'information'];

    use HasFactory;
}
