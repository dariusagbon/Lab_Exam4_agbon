<x-app-layout>
    <x-slot>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Menu') }}
        </h2>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form action="{{ route('menu.update', $menu->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label class="block text-gray-700">Rice Name</label>
                                <input type="text" name="Rice_name" value="{{ $menu->Rice_name }}" class="w-full px-3 py-2 border border-gray-300 rounded" required>
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700">Price</label>
                                <input type="number" name="Price" value="{{ $menu->Price }}" class="w-full px-3 py-2 border border-gray-300 rounded" required>
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700">Image</label>
                                <select name="image" class="w-full px-3 py-2 border border-gray-300 rounded">
                                    <option value="">Select Image</option>
                                    <option value="jasmine.jpeg" {{ $menu->image == 'jasmine.jpeg' ? 'selected' : '' }}>Jasmine</option>
                                    <option value="jillian.jpeg" {{ $menu->image == 'jillian.jpeg' ? 'selected' : '' }}>Jillian</option>
                                    <option value="kohaku.png" {{ $menu->image == 'kohaku.png' ? 'selected' : '' }}>Kohaku</option>
                                </select>
                            </div>
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update Menu</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>
