<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Menu') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl">
                <div class="p-8">
                    <div class="mb-6 flex items-center gap-3">
                        <div class="w-1 h-8 bg-amber-500 rounded-full"></div>
                        <h3 class="text-lg font-semibold text-gray-800">Edit Menu Item</h3>
                    </div>

                    @if ($errors->any())
                        <div class="mb-6 bg-red-50 border border-red-200 text-red-700 rounded-lg px-4 py-3 text-sm">
                            <ul class="list-disc list-inside space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('menu.update', $menu->id) }}" method="POST" class="space-y-5">
                        @csrf
                        @method('PUT')

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Rice Name</label>
                            <input
                                type="text"
                                name="Rice_name"
                                value="{{ old('Rice_name', $menu->Rice_name) }}"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-transparent transition"
                                required
                            >
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Price ($)</label>
                            <input
                                type="number"
                                name="Price"
                                value="{{ old('Price', $menu->Price) }}"
                                step="0.01"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-transparent transition"
                                required
                            >
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Image</label>
                            @if($menu->image)
                                <div class="mb-3">
                                    <img src="{{ asset('images/' . $menu->image) }}" alt="{{ $menu->Rice_name }}" class="w-20 h-20 object-cover rounded-lg border border-gray-200">
                                    <p class="text-xs text-gray-400 mt-1">Current image</p>
                                </div>
                            @endif
                            <select
                                name="image"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-transparent transition bg-white"
                            >
                                <option value="">— No image —</option>
                                <option value="jasmine.jpeg" {{ (old('image', $menu->image) == 'jasmine.jpeg') ? 'selected' : '' }}>Jasmine</option>
                                <option value="jillian.jpeg" {{ (old('image', $menu->image) == 'jillian.jpeg') ? 'selected' : '' }}>Jillian</option>
                                <option value="kohaku.png" {{ (old('image', $menu->image) == 'kohaku.png') ? 'selected' : '' }}>Kohaku</option>
                            </select>
                        </div>

                        <div class="flex items-center gap-3 pt-2">
                            <button
                                type="submit"
                                class="bg-amber-500 hover:bg-amber-600 text-white px-6 py-2.5 rounded-lg text-sm font-medium transition"
                            >
                                Update Menu
                            </button>
                            <a
                                href="{{ route('menu.index') }}"
                                class="text-sm text-gray-500 hover:text-gray-700 transition"
                            >
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>