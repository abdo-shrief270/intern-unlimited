<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManagerPermission extends Model
{
    use HasFactory;
    protected $fillable=['admin_id','manager_id'];

}
