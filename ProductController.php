<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
   public function index(Request $request)
    {
        $products = [
            ['id' => 1, 'name' => 'Laptop', 'price' => 15000000, 'image' => 'images/laptop.jpg', 'description' => 'Laptop powerful untuk pekerjaan dan gaming.'],
            ['id' => 2, 'name' => 'Smartphone', 'price' => 7000000, 'image' => 'images/smartphone.jpg', 'description' => 'Smartphone dengan kamera berkualitas dan baterai tahan lama.'],
            ['id' => 3, 'name' => 'Headphones', 'price' => 1200000, 'image' => 'images/headphones.jpg', 'description' => 'Headphone nyaman dengan suara jernih dan bass kuat.'],
            ['id' => 4, 'name' => 'Tablet', 'price' => 5000000, 'image' => 'images/tablet.jpg', 'description' => 'Tablet ringan untuk konsumsi media dan produktivitas.'],
            ['id' => 5, 'name' => 'Smartwatch', 'price' => 2500000, 'image' => 'images/smartwatch.jpg', 'description' => 'Smartwatch dengan fitur kebugaran dan notifikasi pintar.'],
            ['id' => 6, 'name' => 'Keyboard', 'price' => 800000, 'image' => 'images/keyboard.jpg', 'description' => 'Keyboard ergonomis dengan respons cepat.'],
            ['id' => 7, 'name' => 'Mouse', 'price' => 400000, 'image' => 'images/mouse.jpg', 'description' => 'Mouse nyaman dengan presisi tinggi.'],
            ['id' => 8, 'name' => 'Monitor', 'price' => 3500000, 'image' => 'images/monitor.jpg', 'description' => 'Monitor resolusi tinggi untuk kerja dan gaming.'],
            ['id' => 9, 'name' => 'Printer', 'price' => 2200000, 'image' => 'images/printer.jpg', 'description' => 'Printer cepat dengan kualitas cetak baik.'],
            ['id' => 10, 'name' => 'Speaker', 'price' => 950000, 'image' => 'images/speaker.jpg', 'description' => 'Speaker portable dengan suara yang kaya.'],
        ];

        $products = collect($products);

        // 🔍 Filter berdasarkan pencarian nama
        if ($request->filled('search')) {
            $products = $products->filter(fn($p) => stripos($p['name'], $request->search) !== false);
        }

        // 💰 Filter berdasarkan rentang harga
        if ($request->filled('min_price')) {
            $products = $products->where('price', '>=', $request->min_price);
        }
        if ($request->filled('max_price')) {
            $products = $products->where('price', '<=', $request->max_price);
        }

        return view('home', ['products' => $products->values()]);
    }

    public function show($id)
    {
        $products = [
            ['id' => 1, 'name' => 'Laptop', 'price' => 15000000, 'image' => 'images/laptop.jpg', 'description' => 'Laptop powerful untuk pekerjaan dan gaming.'],
            ['id' => 2, 'name' => 'Smartphone', 'price' => 7000000, 'image' => 'images/smartphone.jpg', 'description' => 'Smartphone dengan kamera berkualitas dan baterai tahan lama.'],
            ['id' => 3, 'name' => 'Headphones', 'price' => 1200000, 'image' => 'images/headphones.jpg', 'description' => 'Headphone nyaman dengan suara jernih dan bass kuat.'],
            ['id' => 4, 'name' => 'Tablet', 'price' => 5000000, 'image' => 'images/tablet.jpg', 'description' => 'Tablet ringan untuk konsumsi media dan produktivitas.'],
            ['id' => 5, 'name' => 'Smartwatch', 'price' => 2500000, 'image' => 'images/smartwatch.jpg', 'description' => 'Smartwatch dengan fitur kebugaran dan notifikasi pintar.'],
            ['id' => 6, 'name' => 'Keyboard', 'price' => 800000, 'image' => 'images/keyboard.jpg', 'description' => 'Keyboard ergonomis dengan respons cepat.'],
            ['id' => 7, 'name' => 'Mouse', 'price' => 400000, 'image' => 'images/mouse.jpg', 'description' => 'Mouse nyaman dengan presisi tinggi.'],
            ['id' => 8, 'name' => 'Monitor', 'price' => 3500000, 'image' => 'images/monitor.jpg', 'description' => 'Monitor resolusi tinggi untuk kerja dan gaming.'],
            ['id' => 9, 'name' => 'Printer', 'price' => 2200000, 'image' => 'images/printer.jpg', 'description' => 'Printer cepat dengan kualitas cetak baik.'],
            ['id' => 10, 'name' => 'Speaker', 'price' => 950000, 'image' => 'images/speaker.jpg', 'description' => ']Speaker portable dengan suara yang kaya.'],
        ];

         $product = collect($products)->firstWhere('id', $id);

        return view('products.detail', compact('product'));
    }
}
