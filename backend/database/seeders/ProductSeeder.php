<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Laptop Gaming ASUS ROG',
                'description' => 'Laptop gaming dengan spesifikasi tinggi untuk bermain game AAA',
                'price' => 25000000,
                'stock' => 10,
                'image_url' => 'https://images.unsplash.com/photo-1603302576837-37561b2e2302?w=400'
            ],
            [
                'name' => 'iPhone 15 Pro Max',
                'description' => 'Smartphone flagship Apple dengan chip A17 Pro',
                'price' => 22000000,
                'stock' => 15,
                'image_url' => 'https://images.unsplash.com/photo-1592286927505-4d86d3d8e4ff?w=400'
            ],
            [
                'name' => 'Sony WH-1000XM5',
                'description' => 'Headphone wireless dengan noise cancelling terbaik',
                'price' => 5500000,
                'stock' => 25,
                'image_url' => 'https://images.unsplash.com/photo-1618366712010-f4ae9c647dcb?w=400'
            ],
            [
                'name' => 'MacBook Pro M4',
                'description' => 'Laptop profesional dengan chip M4 untuk creative work',
                'price' => 35000000,
                'stock' => 8,
                'image_url' => 'https://images.unsplash.com/photo-1517336714731-489689fd1ca8?w=400'
            ],
            [
                'name' => 'Samsung Galaxy S24 Ultra',
                'description' => 'Smartphone Android flagship dengan S Pen',
                'price' => 18000000,
                'stock' => 20,
                'image_url' => 'https://images.unsplash.com/photo-1610945415295-d9bbf067e59c?w=400'
            ],
            [
                'name' => 'iPad Pro 12.9 inch',
                'description' => 'Tablet premium untuk productivity dan creative',
                'price' => 16000000,
                'stock' => 12,
                'image_url' => 'https://images.unsplash.com/photo-1544244015-0df4b3ffc6b0?w=400'
            ],
            [
                'name' => 'Logitech MX Master 3S',
                'description' => 'Mouse wireless ergonomis untuk productivity',
                'price' => 1500000,
                'stock' => 30,
                'image_url' => 'https://images.unsplash.com/photo-1527864550417-7fd91fc51a46?w=400'
            ],
            [
                'name' => 'Mechanical Keyboard Keychron K8',
                'description' => 'Keyboard mechanical wireless dengan hot-swappable switch',
                'price' => 1800000,
                'stock' => 18,
                'image_url' => 'https://images.unsplash.com/photo-1595225476474-87563907a212?w=400'
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}