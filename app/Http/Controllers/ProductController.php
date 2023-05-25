<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = Http::withOptions(['verify' => false])->get
        ('https://quirky-mahavira.217-76-154-49.plesk.page/api/productos');
        $data = $response->json();
        return view('product.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("product.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        {
    $response = Http::withOptions(['verify' => false])->post('https://quirky-mahavira.217-76-154-49.plesk.page/api/products', [
        'name' => $request->input('name'),
        'description' => $request->input('description'),
        'stock' => $request->input('stock'),
    ]);

    if ($response->successful()) {
        return redirect()->route('products.index')->with('success', 'Producto creado exitosamente.');
    } else {
        return back()->withInput()->with('error', 'Error al crear el producto. Inténtalo de nuevo más tarde.');
    }
}}

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
        $response = Http::withOptions(['verify' => false])->delete("https://quirky-mahavira.217-76-154-49.plesk.page/api/products/{$id}");

            if ($response->successful()) {
                $previousUrl = url()->previous();
                return redirect($previousUrl)->with('success', 'Producto eliminado correctamente');
            } else {
                return back()->with('error', 'Error al eliminar el producto. Inténtalo de nuevo más tarde.');
            }
        }
}
