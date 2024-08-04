<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'id_cliente',
        'dt', #data da compra
        'id_payment_method',
        'id_recipe',
        'id_entrega',

    ];
}
