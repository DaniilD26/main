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
    if ($request->hasFile('card')) {
        $image = $request->file('card');
    
        // Генерируем уникальное имя файла
        $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
    
        // Сохраняем изображение в `storage/app/public/images`
        $path = $image->storeAs('public/', $imageName);
    
        // Сохраняем только имя файла в базу данных
        $data['card'] = $imageName; 
    
        // ... (Сохранение данных в базу данных)
    }else {
        // Если файл не загружен, используем 'default.png'
        $data['card'] = 'default.png';
    }


    // Создание записи о блюде в базе данных
    Menu::create($data);

    // Перенаправление пользователя на страницу с блюдами
    return redirect()->route('menu.index');


   


}
    
    public function show(Menu $menu)
    {
        return view('menu.show', compact('menu'));
    }

    public function edit(Menu $menu)
    {
        $menuCategories = MenuCategory::all();
        return view('menu.edit', compact('menu','menuCategories'));
    }
    public function update(Menu $menu, Request $request){
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

        if ($request->hasFile('card')) {
            $image = $request->file('card');
        
            // Генерируем уникальное имя файла
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
        
            // Сохраняем изображение в `storage/app/public/images`
            $path = $image->storeAs('public/', $imageName);
        
            // Сохраняем только имя файла в базу данных
            $data['card'] = $imageName; 
        
            // ... (Сохранение данных в базу данных)
        }else {
            // Если файл не загружен, используем 'default.png'
            $data['card'] = 'default.png';
        }
        $menu->update($data);
        return redirect()->route('menu.show', $menu->id);
        // dd($data);
    }

    // public function destroy($id){
    //     $menu->delete();
    //     return redirect()->route('menu.index');
    // }
    
public function destroy($id){
    $menu = Menu::findOrFail($id); // Находим меню по id 
    $menu->delete();
    return redirect()->route('menu.index');
}
}
