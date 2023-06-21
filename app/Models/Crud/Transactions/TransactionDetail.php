<?php

namespace App\Models\Crud\Transactions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;

    protected $table = 'trx_transaction_details';
    protected $primaryKey = 'id_transaction_detail';
    protected $fillable = [
        'id_transaction',
        'id_product',
        'qty',
        'flag',
    ];
}
