<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deliveries extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'arrived_date',  #previsao de entrega
        'codigo',   #codigo de rastreio

    ];
}
