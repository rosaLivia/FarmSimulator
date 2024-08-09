<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
#Testando
class Product extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'codigo',
        'marca',
        'description',
        'price',
        'recomendation',
        'instruction',
        'stock',
    ];
}