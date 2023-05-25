<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = session('cart', []);
        $products = [];

        foreach ($cartItems as $productId => $quantity) {
            $response = Http::withOptions(['verify' => false])->get('https://quirky-mahavira.217-76-154-49.plesk.page/api/productos/' . $productId);

            if ($response->successful()) {
                $product = $response->json();
                dd($product);
                $products[] = [
                    'name' => $product['nombre'],
                    'description' => $product['descripcion'],
                    'price' => $product['precio'],
                    'quantity' => $quantity,
                ];
            }
        }
        return view('cart.index', compact('cartItems'));

    }

    public function clearCart()
    {
        session(['cart' => []]);
        return redirect()->route('cart.index')->with('success', 'Carrito eliminado correctamente');
    }

    public function addToCart(Request $request)
    {
        $productId = $request->input('product_id');
    
        $cartItems = session('cart', []);
    
        // Agregar el nuevo producto al carrito
        $cartItems[$productId] = $cartItems[$productId] ?? 0;
        $cartItems[$productId]++;
    
        session(['cart' => $cartItems]);
        session()->flash('success', 'Producto agregado al catálogo correctamente');

        return redirect()->route('dashboard')->with('success', 'Producto agregado al carrito correctamente');
    }
    

     public function removeFromCart($productId)
    {
        $cartItems = session('cart', []);
        if (isset($cartItems[$productId])) {
            unset($cartItems[$productId]);
            session(['cart' => $cartItems]);
        }

        return redirect()->route('cart.index')->with('success', 'Producto eliminado del carrito correctamente');
    }
}
