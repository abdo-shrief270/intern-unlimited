<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manager extends Authenticatable
{
    use HasFactory;
    protected $fillable=['name','email','password','email_verified_at'];

}
