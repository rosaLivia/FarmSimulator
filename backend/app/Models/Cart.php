<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    protected $fillable = [
        'id_buy',
        'id_drug',
        'quant',
        'price',
        'preco_unitario'  
    ];
}
