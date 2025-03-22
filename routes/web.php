<?php

use App\Http\Controllers\TaskControlller;
use App\Http\Controllers\UserControlller;
use App\Http\Middleware\checkIsLogged;
use App\Http\Middleware\checkIsNotLogged;
use Illuminate\Support\Facades\Route;

Route::middleware(checkIsNotLogged::class)->group(function () {
    Route::get('/', function () {
        return view("index");
    })->name("index");

    Route::get('/login', [UserControlller::class, 'login'])->name('login');
    Route::post('/logining', [UserControlller::class, 'logining'])->name("logining");

    Route::get('/register', [UserControlller::class, 'register'])->name('register');
    Route::post('/registering', [UserControlller::class, 'registering'])->name("registering");
});

Route::middleware([checkIsLogged::class])->group(function () {
    Route::get('/logout', [UserControlller::class, 'logout'])->name('logout');

    Route::get('/updateUser', [UserControlller::class, 'updateUser'])->name("updateUser");
    Route::post('/updatingUser', [UserControlller::class, 'updatingUser'])->name("updatingUser");

    Route::get('/get-user', [UserControlller::class, 'getUser'])->name('getUser');

    Route::get('/delete-user', [UserControlller::class, 'deleteUser'])->name('deleteUser');

    // Rotas
    Route::get('/home', [TaskControlller::class, 'home'])->name("home");

    Route::get('/create-task', [TaskControlller::class, 'createTask'])->name("createTask");
    Route::post('/creating-task', [TaskControlller::class, 'creatingTask'])->name("creatingTask");

    Route::get('/update-task/{id}', [TaskControlller::class, 'updateTask'])->name("updateTask");
    Route::post('/updating-task/{id}', [TaskControlller::class, 'updatingTask'])->name("updatingTask");

    Route::get('/delete-task/{id}', [TaskControlller::class, 'deleteTask'])->name("deleteTask");

    Route::get('/change-status/{id}', [TaskControlller::class, 'changeStatus'])->name("changeStatus");
});

Route::fallback(function () {
    return redirect()->route('index')->with('error', 'This route does not exist!');
});
