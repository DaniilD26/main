<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Menu;
use App\Models\MenuCategory;
use App\Generators\StringGenerator;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $string = app('string.generator')->generate();
        $menu = Menu::all();
        $menuCategories = MenuCategory::all();
        return view('menu.index', compact('menu','menuCategories'));
    }

    public function create()
    {
        $menuCategories = MenuCategory::all();
        return view('menu.create', compact('menuCategories') );
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'name' => 'required|string|max:255|unique:menu',
            'description' => 'required|string|max:255',
            'price' => 'integer',
            'id_menu_category' => 'integer'

        ]);

        Menu::create($data);
        return redirect()->route('menu.index');
    }
    
    public function show(Menu $menu)
    {
        // return view('users.show', ['user' => $user->id]);
        return view('menu.show', compact('menu'));
    }

    public function edit(Menu $menu)
    {
        // return view('users.show', ['user' => $user->id]);
        return view('menu.edit', compact('menu'));
    }
    public function upadte(Menu $menu){
        $data = request()->validate([
            'login' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8',
            'id_role' => 'integer'

        ]);
        $post->update($data);
        return redirect()->route('users.show', $user->id);
        // dd($data);
    }

    public function destroy(Menu $menu){
        $user->delete();
        return redirect()->route('menu.index', $menu->id);
    }
}
