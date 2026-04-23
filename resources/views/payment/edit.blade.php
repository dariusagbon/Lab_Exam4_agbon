<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Payment') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl">
                <div class="p-8">
                    <div class="mb-6 flex items-center gap-3">
                        <div class="w-1 h-8 bg-green-500 rounded-full"></div>
                        <h3 class="text-lg font-semibold text-gray-800">Edit Payment</h3>
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

                    <form action="{{ route('payment.update', $payment->id) }}" method="POST" class="space-y-5">
                        @csrf
                        @method('PUT')

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Order</label>
                            <select
                                name="order_id"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-transparent transition bg-white"
                                required
                            >
                                <option value="">— Select an order —</option>
                                @foreach ($orders as $order)
                                    <option value="{{ $order->id }}" {{ (old('order_id', $payment->order_id) == $order->id) ? 'selected' : '' }}>
                                        {{ $order->menu->Rice_name }} (Qty: {{ $order->quantity }}) — ${{ number_format($order->menu->Price * $order->quantity, 2) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Amount ($)</label>
                            <input
                                type="number"
                                name="amount"
                                value="{{ old('amount', $payment->amount) }}"
                                step="0.01"
                                min="0"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-transparent transition"
                                required
                            >
                        </div>

                        <div class="flex items-center gap-3 pt-2">
                            <button
                                type="submit"
                                class="bg-green-500 hover:bg-green-600 text-white px-6 py-2.5 rounded-lg text-sm font-medium transition"
                            >
                                Update Payment
                            </button>
                            <a
                                href="{{ route('payment.index') }}"
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