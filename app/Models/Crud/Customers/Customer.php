<?php

namespace App\Models\Crud\Customers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'ms_customers';
    protected $primaryKey = 'id_customer';
    protected $fillable = [
        'customer_name',
        'gender',
        'telp',
        'address',
        'image',
        'flag',
    ];
}
