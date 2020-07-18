<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductGallery extends Model
{
    use SoftDeletes;
    protected $table = 'product_galleries';
    protected $fillable = [
        'product_id',
        'photo',
        'is_default'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    // accessor
    public function getPhotoAttribute($value)
    {
        return url('storage/' . $value);
    }
}
