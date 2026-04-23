<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Order;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with('order.menu')->get();
        return view('payment.index', compact('payments'));
    }

    public function create()
    {
        $orders = Order::with('menu')->get();
        return view('payment.create', compact('orders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'amount' => 'required|numeric|min:0',
        ]);

        Payment::create($request->all());

        return redirect()->route('payment.index')
            ->with('success', 'Payment created successfully.');
    }

    public function edit($id)
    {
        $payment = Payment::findOrFail($id);
        $orders = Order::with('menu')->get();
        return view('payment.edit', compact('payment', 'orders'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'amount' => 'required|numeric|min:0',
        ]);

        $payment = Payment::findOrFail($id);
        $payment->update($validated);

        return redirect()->route('payment.index')
            ->with('success', 'Payment updated successfully.');
    }

    public function delete($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();

        return redirect()->route('payment.index')
            ->with('success', 'Payment deleted successfully.');
    }
}
