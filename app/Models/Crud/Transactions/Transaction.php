<?php

namespace App\Models\Crud\Transactions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'trx_transactions';
    protected $primaryKey = 'id_transaction';
    protected $fillable = [
        'id_customer',
        'date',
        'keterangan',
        'total',
        'flag',
    ];
}
