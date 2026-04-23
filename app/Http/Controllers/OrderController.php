<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Menu;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('menu')->get();
        return view('order.index', compact('orders'));
    }

    public function create()
    {
        $menus = Menu::all();
        return view('order.create', compact('menus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'quantity' => 'required|integer|min:1',
        ]);

        Order::create($request->all());

        return redirect()->route('order.index')
            ->with('success', 'Order created successfully.');
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $menus = Menu::all();
        return view('order.edit', compact('order', 'menus'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $order = Order::findOrFail($id);
        $order->update($validated);

        return redirect()->route('order.index')
            ->with('success', 'Order updated successfully.');
    }

    public function delete($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('order.index')
            ->with('success', 'Order deleted successfully.');
    }
}
