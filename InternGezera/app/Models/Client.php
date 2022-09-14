<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable=['name','phone','tax_number'];


    public function logs()
    {
        return $this->morphMany('App\Models\ActivityLog', 'recordable');
    }
}
