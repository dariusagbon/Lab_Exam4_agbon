<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    //
    public function index()
    {
        $menus = Menu::all();
        return view('menu.index', compact('menus'));
    }

    public function create()
    {
        $menus = Menu::all();
        return view('menu.create', compact('menus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Rice_name' => 'required|string|max:50',
            'Price' => 'required|numeric',
            'image' => 'nullable|string',
        ]);

        Menu::create($request->all());

        return redirect()->route('menu.index')
            ->with('success', 'Menu created successfully.');
    }

    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        return view('menu.edit', compact('menu'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'Rice_name' => 'required|string|max:50',
            'Price' => 'required|numeric',
            'image' => 'nullable|string',
        ]);

        $menu = Menu::findOrFail($id);
        $menu->update($validated);

        return redirect()->route('menu.index')
            ->with('success', 'Menu updated successfully.');
    }

 public function delete($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();

        return redirect()->route('menu.index')
            ->with('success', 'Menu deleted successfully.');
    }
}
