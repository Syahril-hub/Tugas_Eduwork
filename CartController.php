<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    // Menampilkan halaman keranjang
    public function index()
    {
        $cart = session('cart', []);
        return view('cart.index', compact('cart'));
    }

    // Menambahkan produk ke keranjang
    public function add(Request $request)
    {
        $cart = session('cart', []);
        $id = $request->id;

        if (!isset($cart[$id])) {
            $cart[$id] = [
                'id' => $id,
                'name' => $request->name,
                'price' => $request->price,
                'image' => $request->image,
                'quantity' => 1
            ];
        } else {
            $cart[$id]['quantity']++;
        }

        session(['cart' => $cart]);
        return redirect()->route('cart.index')->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    // Menghapus produk dari keranjang
    public function remove($id)
    {
        $cart = session('cart', []);
        unset($cart[$id]);
        session(['cart' => $cart]);

        return redirect()->route('cart.index')->with('success', 'Produk dihapus dari keranjang!');
    }
}
