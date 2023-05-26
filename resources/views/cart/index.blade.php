<x-app-layout>
    <x-slot name="header">
        <div class="sub">
            <h1 class="text-2xl font-bold">Carrito</h1>
        </div>
    </x-slot>
    <div class="py-6 px-4 sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 shadow overflow-hidden sm:rounded-lg">
            @if (empty($cartItems))
            <p>No hay productos en el carrito.</p>
            @else
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Producto</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cantidad</th>
                      
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>  
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($cartItems as $productId => $quantity)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $productId }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $quantity }}</td>
                        <td>
                            <form action="{{ route('cart.remove', $productId) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
            <table class="min-w-full divide-y divide-gray-200 ">
                <thead class="bg-gray-50 dark:bg-gray-700" >
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                </thead>

               
                <tbody class="bg-white divide-y divide-gray-200">
                    <td class="px-6 py-4 whitespace-nowrap"></td>
                </tbody>

            </table>
        
            @endif
            <form action="{{ route('purchase.store') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $productId }}">
                <input type="hidden" name="quantity" value="{{ $quantity }}">
                <button type="submit" class="btn btn-primary">Comprar</button>
            </form>
        </div>
</x-app-layout>