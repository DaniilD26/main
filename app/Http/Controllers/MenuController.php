<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\MenuCategory;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
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
    // Валидация входных данных
    $data = $request->validate([
        'name' => 'required|string|max:255|unique:menu',
        'description' => 'required|string|max:255',
        'price' => 'integer',
        'id_menu_category' => 'integer',
        'card' => 'image|mimes:jpeg,png,jpg,gif,webp', // Проверка на изображение
    ]);

    // Обработка загрузки изображения, если оно присутствует в запросе
    // if ($request->hasFile('card')) {
    //     $image = $request->file('card');
      
    //     $path = $image->store('public/images'); // Сохранение изображения в хранилище
    //     // $path = $image->store('/images'); // Сохранение изображения в хранилище
        
    //     $data['card'] = $path; // Сохраняем путь к изображению в базе данных
    // }

    if ($request->hasFile('card')) {
        $image = $request->file('card');
    
        // Сохранение изображения в `storage/app/public/images`
        $path = $image->store('public'); 
    
        $data['card'] = $path; // Сохраняем путь к изображению в базе данных
    }

    // Создание записи о блюде в базе данных
    Menu::create($data);

    // Перенаправление пользователя на страницу с блюдами
    return redirect()->route('menu.index');
}



//     public function store(Request $request)
// {

//     $data = $request->validate([
//         'name' => 'required|string|max:255|unique:menu',
//         'description' => 'required|string|max:255',
//         'price' => 'integer',
//         'id_menu_category' => 'integer',
//         'card' => '',
//     ]);

//     // if ($request->hasFile('image')) {
//     //     $image = $request->file('image');

//     //     // Сохранить изображение в хранилище
//     //     $path = $image->store('public/images');

//     //     // Получить URL-адрес изображения
//     //     $url = asset('storage/' . $path);

//     //     $data['card'] = $url;
//     // }
//     // $path = $request->file('card')->store('public/images', 'public');
//     // $data['card'] = asset('storage/app/' . $path);

//     if ($request->hasFile('card')) {
//         $image = $request->file('card');
//         $path = $image->store('public/images', 'public'); // Сохранение изображения в хранилище
//         $data['card'] = asset('storage/' . $path); // Получение URL изображения
//     }

//     Menu::create($data);

//     return redirect()->route('menu.index');
// }
    
    public function show(Menu $menu)
    {
        // return view('users.show', ['user' => $user->id]);
        return view('menu.show', compact('menu'));
    }

    public function edit(Menu $menu)
    {
        $menuCategories = MenuCategory::all();
        // return view('users.show', ['user' => $user->id]);
        return view('menu.edit', compact('menu','menuCategories'));
    }
    public function update(Menu $menu){
        $data = request()->validate([
            'name' => '',
            'description' => '',
            'price' => '',
            'id_menu_category' => '',
            'card' => '',


            // 'login' => 'required|string|max:255|unique:users',
            // 'password' => 'required|string|min:8',
            // 'id_role' => 'integer'

        ]);
        $menu->update($data);
        return redirect()->route('menu.show', $menu->id);
        // dd($data);
    }

    public function destroy(Menu $menu){
        $user->delete();
        return redirect()->route('menu.index', $menu->id);
    }
}
