<?php

use App\Http\Controllers\Auth\LoginController;
use App\Models\User;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('login', [LoginController::class, 'create'])->name('login');
Route::post('login', [LoginController::class, 'store']);

Route::middleware('auth')->group(function (){
    Route::get('/', function () {
        return Inertia::render("Home");
    });

    Route::get('/users', function () {
        return Inertia::render("Users/Index", [
            'users' => User::query()
                ->when(Request::input('search'), function ($query,$search){
                    $query->where('name', 'like','%' . $search . '%');
                })
                ->paginate(10)
                ->withQueryString()
                ->through(fn($user)=>[
                    'id' => $user->id,
                    'name' => $user->name
                ]),
            'filters' => Request::only(['search'])
        ]);
    });

    Route::get('/settings', function () {
        return Inertia::render("Settings");
    });

    Route::get('/users/create', function (){
        return Inertia::render('Users/Create');
    });
    Route::post('/users', function (){

        sleep(3);
        $user_data = Request::validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        User::create($user_data);

        return redirect('/users');
    });

    Route::post('/logout', function () {
        dd('loggin the user out');
    });
});
