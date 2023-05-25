<x-app-layout>
    <x-slot name="header" class="sub">
        <div class="sub">
            <h1 class="text-2xl font-bold">Carrito</h1>
        </div>
    </x-slot>

    <div class="py-6 px-4 sm:px-6 lg:px-8">
        @if (empty($cartItems))
            <p>No hay productos en el carrito.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cartItems as $productId => $quantity)
                        <tr>
                            <td>{{ $productId }}</td>
                            <td>{{ $quantity }}</td>
                            <td>
                                <form action="{{ route('cart.remove', $productId) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</x-app-layout>
