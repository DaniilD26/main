<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function index()
    {
        // $users = User::all();
        $users = User::paginate(10); // Пагинация с 10 элементами на страницу
        return view('users.index', compact('users'));
    }
    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles') );
    }
    public function createLogin()
    {
        return view('auth.login');
    }
    public function store(Request $request)
    {
        $data = request()->validate([
            'login' => 'required|min:5|string|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed|regex:/[a-zA-Z]/',
            'id_role' => 'integer'
        ]);

        // Хешируем пароль
        $data['password'] = Hash::make($data['password']);

        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/', $imageName);
            $data['avatar'] = $imageName; // Сохраняем путь к изображению в базе данных
        }else {
            // Если файл не загружен, используем 'default.png'
            $data['avatar'] = 'defaultAvatar.jpg';
        }
        // Создаём нового пользователя
        User::create($data);

        return redirect()->route('login.create');
    }





    public function show(User $user)
    {
        // $status = $user->status; // Получить статус пользователя
        return view('users.show', compact('user')); // Передать статус в представление
    }

    public function edit(User $user)
    {
        $statuses = Status::all();
        return view('users.edit', compact('user', 'statuses'));
    }

    public function update(User $user, Request $request){
        $data = request()->validate([
            'login' => '',
            'id_status' => '',
            'name' => '',
            'lastname' => '',
            'phone' => '',
            'age' => '',
            'avatar' => '',
            'work_experience' => ''


        ]);

        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/', $imageName);
            $data['avatar'] = $imageName; // Сохраняем путь к изображению в базе данных
        }else {
            // Если файл не загружен, используем 'default.png'
            $data['avatar'] = 'defaultAvatar.jpg';
        }
        $user->update($data);

        return redirect()->route('users.show', $user->id);
    }

    public function destroy($id){
        $user = User::findOrFail($id); // Находим пользователя по id 
        $user->delete();
        return redirect()->route('users.index');
    }
    public function admin(){
        return view('admin');
    }


    public function profile()
    {
        // Получаем текущего пользователя (аутентифицированного)
        $user = Auth::user();

        // Проверяем, что пользователь не пуст 
        if ($user) {
            // Отображаем страницу профиля
            return view('profile', compact('user'));
        } else {
            // Если пользователь не авторизован, перенаправляем его на страницу входа
            return redirect()->route('login.create'); 
        }
    }

    public function login(Request $request)
    {
        $credentials = $request->only('login', 'password');
    
        if (Auth::attempt($credentials)) {
            // Аутентификация прошла успешно
            $user = Auth::user();
    
            if ($user->id_role == 1) {
                return redirect('/admin');
            } elseif ($user->id_role == 2 || $user->id_role == 3) {
                return redirect('/profile');
            } else {
                // Роль неопределена или что-то еще
                return redirect('/'); // Или другая обработка по умолчанию
            }
        }
    
        // Аутентификация не удалась
        return back()->withErrors([
            'login' => 'Login or password incorrect'
        ]);
    }

    public function logout()
     {
         Auth::logout();
         return redirect('/');
     }
}
