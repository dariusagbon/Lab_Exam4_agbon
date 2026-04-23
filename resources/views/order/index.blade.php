<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Orders') }}
        </h2>
        <div></div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Orders content goes here -->
                    <a href="{{ route('order.create') }}" class="btn btn-primary mb-3">Add Order</a>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Menu</th>
                                <th>Quantity</th>
                                <th>Actions</th>    
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->menu->Rice_name }} - ${{ $order->menu->Price }}</td>
                                    <td>{{ $order->quantity }}</td>
                                    <td>
                                        <a href="{{ route('order.edit', $order->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('order.destroy', $order->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>