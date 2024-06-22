<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MenuController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/login/create', [UserController::class, 'createLogin'])->name('login.create');//Создание формы авторизации
Route::post('/login', [UserController::class, 'login'])->name('login.store');//Авторизация пользователя

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');//Создание формы регистрации
Route::post('/users', [UserController::class, 'store'])->name('users.store');//Регистрация пользователя
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::patch('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');// Выход из системы

Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
Route::get('/menu/create', [MenuController::class, 'create'])->name('menu.create');//Создание формы регистрации
Route::post('/menu', [MenuController::class, 'store'])->name('menu.store');//Регистрация пользователя
Route::get('/menu/{menu}', [MenuController::class, 'show'])->name('menu.show');
Route::get('/menu/{menu}/edit', [MenuController::class, 'edit'])->name('menu.edit');
Route::patch('/menu/{menu}', [MenuController::class, 'update'])->name('menu.update');
Route::delete('/menu/{menu}', [MenuController::class, 'destroy'])->name('menu.destroy');


Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');//Создание формы регистрации
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');//Регистрация пользователя
Route::get('/order/{order}', [OrderController::class, 'show'])->name('orders.show');
Route::get('/orders/{order}/edit', [OrderController::class, 'edit'])->name('orders.edit');
Route::patch('/orders/{order}', [OrderController::class, 'update'])->name('orders.update');
Route::delete('/orders/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');

//Вход в административную панель
Route::middleware(['auth','isAdmin'])->group(function () {
    Route::get('/admin',[UserController::class,'admin'])->name('admin');
});
//Вход в личный кабинет
Route::middleware(['auth'])->group(function () {
    Route::get('/profile',[UserController::class,'login'])->name('profile');
});


////Маршрут, который вызывает метод проверки подлинности (аутентификацию)

// Вход в административную панель
// Route::middleware(['auth','isAdmin'])->group(function () {
//     Route::get('/category',[MenuCategoryController::class, 'index']);
//     Route::get('/shift',[ShiftController::class, 'index']);;
//     Route::get('/addDish',[ MenuCategoryController::class,'addDishForm'])->name('addDish.create');
//     Route::get('/addShift',[ UserController::class,'addShiftForm'])->name('shift.create');

//     Route::post('/addDish',[MenuController::class,'store'])->name('addDish.store');
//     Route::post('/createShift',[ShiftController::class,'store'])->name('createShift.store');
//     Route::get('/createShift',[ShiftController::class,'addShift'])->name('createShift.create');
//     Route::get('/admin',[UserController::class,'admin'])->name('admin');
  
//     Route::get('/menu',[MenuController::class,'index'])->name('menu.index');
//     Route::get('/menu/{dish}',[MenuController::class,'show'])->name('show_id');
// });

// // Вход в личный кабинет
// Route::middleware(['auth'])->group(function () {
//     Route::get('/profile',[UserController::class,'profile'])->name('profile');
//     Route::get('/menu',[MenuController::class,'index'])->name('menu.index');
//     Route::get('/menu/{dish}',[MenuController::class,'show'])->name('show_id');

// });

