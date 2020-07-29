<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionDetail extends Model
{
    use SoftDeletes;
    protected $table = 'transaction_details';
    protected $fillable = [
        'transaction_id',
        'product_id'
    ];

    // relasinya
    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id', 'id');
    }

    public function product()
    {
        return $this->BelongsTo(Product::class, 'product_id', 'id');
    }
}
