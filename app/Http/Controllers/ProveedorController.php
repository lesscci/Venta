<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = Http::withOptions(['verify' => false])->get
        ('https://quirky-mahavira.217-76-154-49.plesk.page/api/proveedores');
        $data = $response->json();
        return view('proveedores.index', compact('data'));
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
        //
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
    public function edit($id)
    {
        $response = Http::withOptions(['verify' => false])->get("https://quirky-mahavira.217-76-154-49.plesk.page/api/proveedores/{$id}");
            $proveedor = $response->json();
        
            return view('proveedores.edit', compact('proveedor'));
    }

    public function update(Request $request, $id)
    {

       
        $response = Http::withOptions(['verify' => false])->put("https://quirky-mahavira.217-76-154-49.plesk.page/api/proveedores/{$id}", [
           
            'nombre' => $request->input('nombre'),
            'direccion' => $request->input('direccion'),
            'telefono' => $request->input('telefono')
        ]);

        if ($response->successful()) {
            return redirect()->route('proveedores.index')->with('success', 'Proveedor actualizado exitosamente');
        } else {
            return back()->with('error', 'Error al actualizar el proveedor. Inténtalo de nuevo más tarde.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $response = Http::withOptions(['verify' => false])->delete("https://quirky-mahavira.217-76-154-49.plesk.page/api/proveedores/{$id}");

            if ($response->successful()) {
                $previousUrl = url()->previous();
                return redirect($previousUrl)->with('success', 'Proveedor eliminado correctamente');
            } else {
                return back()->with('error', 'Error al eliminar el producto. Inténtalo de nuevo más tarde.');
            }
    }
}
