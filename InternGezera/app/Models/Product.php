<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function logs()
    {
        return $this->morphMany('App\Models\ActivityLog', 'recordable');
    }

    public function getImageAttribute($value)
    {
        return 'storage/Images/PRODUCTS/'.$value;
    }
}
