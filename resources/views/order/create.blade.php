<x-app-layout>
    <x-slot>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Order') }}
        </h2>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form action="{{ route('order.store') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label class="block text-gray-700">Menu</label>
                                <select name="menu_id" class="form-control" required>
                                    @foreach ($menus as $menu)
                                        <option value="{{ $menu->id }}">{{ $menu->Rice_name }} - ${{ $menu->Price }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700">Quantity</label>
                                <input type="number" name="quantity" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Create Order</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>
