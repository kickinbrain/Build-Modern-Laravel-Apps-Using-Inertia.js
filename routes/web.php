<?php

use App\Models\User;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

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
