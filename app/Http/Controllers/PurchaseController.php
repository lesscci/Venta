<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  // PurchaseController.php
  public function index()
  {
      $response = Http::withOptions(['verify' => false])->get('https://quirky-mahavira.217-76-154-49.plesk.page/api/purcharses');
      $dataPurchase = $response->json();
      
      $response = Http::withOptions(['verify' => false])->get('https://quirky-mahavira.217-76-154-49.plesk.page/api/productos');
      $dataProducto = $response->json();
  
   

      $productsDict = [];
      foreach ($dataProducto as $producto) {
          $productsDict[$producto['id']] = $producto['precio'];
      }
      
      $total = 0;
foreach ($dataPurchase as $purchase) {
    $productId = $purchase['productos_id']; 
    $quantity = 1; 

    if (isset($productsDict[$productId])) {
        $price = $productsDict[$productId];
        $total += $price * $quantity;
    }


}
      
  
      return view('purchases.index', compact('dataPurchase', 'total'));
  }
  

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        $response = Http::withOptions(['verify' => false])->post('https://quirky-mahavira.217-76-154-49.plesk.page/api/purchase', [
            'product_id' => $productId,
            'quantity' => $quantity,
        ]);

        if ($response->ok()) {
            return redirect()->route('cart.index')->with('success', 'Compra realizada con éxito.');
        } else {
            return redirect()->back()->with('error', 'Error al realizar la compra. Por favor, inténtalo de nuevo.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
