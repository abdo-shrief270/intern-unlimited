<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=['name','description','price','main_image'];

    public function getMainImageAttribute($value)
    {
        return 'storage/images/products/'.$value;
    }

    public function logs()
    {
        return $this->hasMany(ProductLog::class);
    }
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
}
