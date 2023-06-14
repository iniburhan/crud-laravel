<?php

namespace App\Models\Crud\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'id_product';
    protected $fillable = [
        'kd_product',
        'product_name',
        'price',
        'image',
        'flag',
    ];
}
