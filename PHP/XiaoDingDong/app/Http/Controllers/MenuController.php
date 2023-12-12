<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request) {
        $category = $request->category ?? 'Main Course';
        $menus = Menu::where('category', $category)->simplePaginate(6);
        return view('menu.index', compact('menus', 'category'));
    }

    public function search(Request $request) {
        $name = $request->search ?? '';
        $categories = $request->filter ?? [];
        $result = Menu::where('name', 'like', "%$name%");
        if (count($categories) != 0) {
            $result = $result->whereIn('category', $categories);
        }
        $result = $result->simplePaginate(6);
        return view('menu.search', compact('result', 'categories', 'name'));
    }

    public function show(Menu $menu) {
        return view('menu.details', compact('menu'));
    }

    public function add() {
        return view('menu.create');
    }

    public function update(Menu $menu) {
        return view('menu.update', compact('menu'));
    }

    public function create(Request $request) {
        $validated_data = $request->validate([
            'image' => 'required|mimes:jpg,png,jpeg|file',
            'brief' => 'required|max:100',
            'description' => 'required|max:255',
            'price' => 'required|gt:0|numeric',
            'name' => 'required|min:5',
        ]);

        $filename = $request->image->getClientOriginalName();
        $request->image->move('assets/menu/', $filename);

        Menu::create([
            'img_path' => str_replace(' ', '%20', $filename),
            'brief' => $request->brief,
            'description' => $request->description,
            'price' => $request->price,
            'name' => $request->name,
            'category' => $request->category
        ]);

        return redirect('/home')->with('info', 'Menu added successfully.');
    }

    public function patch(Request $request) {
        $validated_data = $request->validate([
            'image' => 'required|mimes:jpg,png,jpeg|file',
            'brief' => 'required|max:100',
            'description' => 'required|max:255',
            'price' => 'required|gt:0|numeric',
            'name' => 'required|min:5',
        ]);
        
        $filename = $request->image->getClientOriginalName();
        $request->image->move('assets/menu/', $filename);

        Menu::where('id', $request->id)->update([
            'img_path' => str_replace(' ', '%20', $filename),
            'brief' => $request->brief,
            'description' => $request->description,
            'price' => $request->price,
            'name' => $request->name,
            'category' => $request->category
        ]);

        return redirect('/home')->with('info', 'Successfully updated the menu.');
    }

    public function delete(Request $request) {
        Menu::where('id', $request->id)->delete();
        return redirect()->back()->with('info', 'Successfully deleted the menu.');
    }
}
