<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $table = 'products';
    protected $fillable = [
        'name',
        'slug',
        'type',
        'description',
        'price',
        'qty'
    ];

    public function galleries(){
        return $this->hasMany(ProductGallery::class, 'product_id');
    }
}
