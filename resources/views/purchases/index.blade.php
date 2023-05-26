<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Historial de Ventas
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    @if (count($dataPurchase) > 0)
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Número de Orden
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Fecha
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Total
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($dataPurchase as $purchase)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $purchase['id'] }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $purchase['productos_id'] }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $purchase['created_at'] }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                        
                                            {{ $total }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No hay ventas registradas.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
