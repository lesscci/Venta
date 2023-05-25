<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-bold">Editar Proveedor</h1>
    </x-slot>

    <div class="py-6 px-4 sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 shadow overflow-hidden sm:rounded-lg">
            <form action="/proveedores/{{ $proveedor['id'] }}" method="POST" class="p-6">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" value="{{ isset($proveedor['nombre']) ? $proveedor['nombre'] : '' }}" class="border rounded-md px-4 py-2 w-full" required>
                </div>

                <div class="mb-4">
                    <label for="direccion" class="block text-gray-700 text-sm font-bold mb-2">Dirección:</label>
                    <input type="text" name="direccion" id="direccion" value="{{ isset($proveedor['direccion']) ? $proveedor['direccion'] : '' }}" class="border rounded-md px-4 py-2 w-full" required>
                </div>

                <div class="mb-4">
                    <label for="telefono" class="block text-gray-700 text-sm font-bold mb-2">Teléfono:</label>
                    <input type="text" name="telefono" id="telefono" value="{{ isset($proveedor['telefono']) ? $proveedor['telefono'] : '' }}" class="border rounded-md px-4 py-2 w-full" required>
                </div>

                <div class="flex justify-end mt-6">
                    <a href="{{ route('proveedores.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded mr-2">Cancelar</a>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
