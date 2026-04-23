<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Order') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6  font-semibold text-xl text-gray-900 leading-tight">
                    {{ __("Edit Order") }}
                   div class="p-6 bg-white border-b border-gray-200">
                        <form action="{{ route('order.update', $order->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label class="block text-gray-700">Menu</label>
                                <select name="menu_id" class="form-control" required>
                                    @foreach ($menus as $menu)
                                        <option value="{{ $menu->id }}" {{ $order->menu_id == $menu->id ? 'selected' : '' }}>
                                            {{ $menu->Rice_name }} - ${{ $menu->Price }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700">Quantity</label>
                                <input type="number" name="quantity" class="form-control" value="{{ $order->quantity }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Order</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
