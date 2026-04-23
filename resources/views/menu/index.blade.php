<x-app-layout>
    <x-slot>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Menu') }}
        </h2>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <a href="{{ route('menu.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-3 inline-block">Add Menu</a>
                        <table class="w-full table-auto border-collapse border border-gray-300">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border border-gray-300 px-4 py-2">Image</th>
                                    <th class="border border-gray-300 px-4 py-2">Name</th>
                                    <th class="border border-gray-300 px-4 py-2">Price</th>
                                    <th class="border border-gray-300 px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($menus as $menu)
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2">
                                            @if($menu->image)
                                                <a href="{{ route('menu.edit', $menu->id) }}">
                                                    <img src="{{ asset('images/' . $menu->image) }}" alt="{{ $menu->Rice_name }}" class="w-16 h-16 object-cover">
                                                </a>
                                            @endif
                                        </td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $menu->Rice_name }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $menu->Price }}</td>
                                        <td class="border border-gray-300 px-4 py-2">
                                            <a href="{{ route('menu.edit', $menu->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded text-sm mr-2">Edit</a>
                                            <form action="{{ route('menu.delete', $menu->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded text-sm">Delete</button>
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
    </x-slot>
</x-app-layout>