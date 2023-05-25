<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-bold">Lista de productos</h1>
    </x-slot>

    <div class="py-6 px-4 sm:px-6 lg:px-8">
        <a href="product/create" class="btn btn-primary">CREAR</a>

        <table class="table thead-dark" style="table-layout: fixed; width: 100%;">
            <thead>
                <tr>
                    <th scope="col" style="width: 5%;" class="text-center">ID</th>
                    <th scope="col" style="width: 20%;" class="text-center">Nombre</th>
                    <th scope="col" style="width: 25%;" class="text-center">Descripción</th>
                    <th scope="col" style="width: 10%;" class="text-center">Cantidad</th>
                    <th scope="col" style="width: 10%;" class="text-center">Estado</th>
                    <th scope="col" style="width: 10%;" class="text-center">ID Vendedor</th>
                    <th scope="col" style="width: 20%;" class="text-center">Acciones</th>
                </tr>
            </thead>

            <tbody class="table-group-divider">
                @foreach($data as $item)
                <tr>
                    <td class="text-center">{{ $item['id'] }}</td>
                    <td class="text-center">{{ $item['name'] }}</td>
                    <td class="text-justify" style="word-wrap: break-word;">{{ $item['description'] }}</td>
                    <td class="text-center">{{ $item['quantity'] }}</td>
                    <td class="text-center">{{ $item['status'] }}</td>
                    <td class="text-center">{{ $item['seller_id'] }}</td>
                    <td class="text-center"><a class="btn btn-info">Editar </a></td>
                    <td class="text-center"><button class="btn btn-info">Borrar </button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
