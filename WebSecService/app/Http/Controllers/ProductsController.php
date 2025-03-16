<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
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
    }
}
