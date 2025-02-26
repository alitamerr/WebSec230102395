<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GpaSimulatorController;

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

Route::get('/transcript', function () {
    $transcript = [
        ['course' => 'Mathematics', 'grade' => 'A', 'credits' => 3],
        ['course' => 'Computer Science', 'grade' => 'B+', 'credits' => 4],
        ['course' => 'Physics', 'grade' => 'A-', 'credits' => 3],
        ['course' => 'Cyber Security', 'grade' => 'A', 'credits' => 3],
        ['course' => 'Database Systems', 'grade' => 'B', 'credits' => 3],
    ];

    return view('transcript', ['transcript' => $transcript]);
});

Route::get('/products', function () {
    $products = [
        [
            'name' => 'Laptop',
            'image' => 'https://via.placeholder.com/150',
            'price' => 1200,
            'description' => 'High-performance laptop with 16GB RAM and 512GB SSD.',
        ],
        [
            'name' => 'Smartphone',
            'image' => 'https://via.placeholder.com/150',
            'price' => 800,
            'description' => 'Latest smartphone with 5G support and 128GB storage.',
        ],
        [
            'name' => 'Headphones',
            'image' => 'https://via.placeholder.com/150',
            'price' => 150,
            'description' => 'Wireless noise-canceling headphones with deep bass.',
        ],
        [
            'name' => 'Smartwatch',
            'image' => 'https://via.placeholder.com/150',
            'price' => 200,
            'description' => 'Water-resistant smartwatch with heart rate monitoring.',
        ],
    ];

    return view('products', ['products' => $products]);
});

Route::get('/calculator', function () {
    return view('calculator');
});

Route::get('/gpa-simulator', [GpaSimulatorController::class, 'index']);

