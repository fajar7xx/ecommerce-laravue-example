<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;
    protected $table = 'transactions';
    protected $fillable = [
        'uuid',
        'name',
        'email',
        'number',
        'address',
        'total',
        'status'
    ];
    protected $hidden = [];

    public function details()
    {
        return $this->hasMany(TransactionDetail::class, 'transaction_id');
    }
}
