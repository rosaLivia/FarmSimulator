<?php

/*
Descrição:
Esse arquivo tem por finalidade a criação de rotas para aplicações web, ou seja, caso front e back seja
tudo junto.
*/

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
