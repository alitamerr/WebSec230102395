<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/even', function () {
    return view('even');
});
Route::get('/prime', function () {
    return view('prime');
});
Route::get('/multable/{number?}', function ($number = null) {
    $j = $number ?? 2;
    return view('multable', compact('j'));
});
Route::get('/multiquiz', function () {
    return view('multiquiz');
});

Route::get('/minitest', function () {
    $bill = [
        ['item' => 'Apple', 'quantity' => 2, 'price' => 1.50],
        ['item' => 'Bread', 'quantity' => 1, 'price' => 2.00],
        ['item' => 'Milk', 'quantity' => 1, 'price' => 1.80],
        ['item' => 'Eggs', 'quantity' => 12, 'price' => 3.50],
    ];

    return view('minitest', ['bill' => $bill]);
});
