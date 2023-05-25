<x-app-layout>
    <x-slot name="header" class="sub">
        <div class="sub">
            <h1 class="text-2xl font-bold">Productos</h1>
            <a href="{{ route('cart.index') }}" class="text-blue-500 hover:text-blue-700">Ver Carrito</a>
        </div>
    </x-slot>

    <div class="py-6 px-4 sm:px-6 lg:px-8">
    @if (session('success'))
            <div class="bg-green-200 p-4 mb-4">
                {{ session('success') }}
            </div>
        @endif
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4" style="display: flex; flex-wrap: wrap; justify-content: space-between;">
            @foreach($data as $item)
            <div href="" class="text-black" style="text-decoration: none;">
                <div class="pr bg-white dark:bg-gray-800 shadow rounded-lg p-4 flex-grow-1" style="width: 200px;  height: 200px">

                    <h2 class="text-xl font-bold">{{ $item['nombre'] }}</h2>
                    <p class="text-gray-500">{{ $item['descripcion'] }}</p>
                    <p class="text-gray-700 font-bold mt-2">Stock: {{ $item['precio'] }}</p>
                    <div class="mt-4 flex justify-between items-center">
                       
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $item['id'] }}">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Agregar al carrito
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>