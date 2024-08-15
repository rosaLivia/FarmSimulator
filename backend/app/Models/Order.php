<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', #ID da compra
        'id_cliente',
        'dt', #data da compra
        'id_payment_method',
        'id_recipe',
        'id_entrega',

    ];
    public function user(){
        return $this->belongsTo(User::class, 'id_cliente'); // 'user_id' é a chave estrangeira na tabela 'orders
    }
}
