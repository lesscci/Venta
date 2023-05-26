<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-bold">Crear productos</h1>
    </x-slot>

    <div class="py-6 px-4 sm:px-6 lg:px-8">
        <form action="/products" method="POST">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text" id="name" name="name" tabindex="1" class="form-input">
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Descripción</label>
                <input type="text" id="description" name="description" tabindex="2" class="form-input">
            </div>

            <div class="mb-4">
                <label for="stock" class="block text-sm font-medium text-gray-700">Precio</label>
                <input type="number" id="precio" name="precio" tabindex="3" class="form-input">
            </div>

            <div class="mb-4">
                <label for="stock" class="block text-sm font-medium text-gray-700">ID Proveedor</label>
                <input type="number" id="proveedor_id" name="proveedor_id" tabindex="4" class="form-input">
            </div>

            <div class="flex justify-between">
                <a href="/products" class="btn btn-secondary" tabindex="4">Cancelar</a>
                <button type="submit" class="btn btn-primary" tabindex="5">Guardar</button>
            </div>
        </form>
    </div>
</x-app-layout>
