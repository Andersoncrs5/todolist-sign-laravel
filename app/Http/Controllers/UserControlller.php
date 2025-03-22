<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\UserModel;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserControlller extends Controller
{
    function register() : View | RedirectResponse
    {
        try {
            return view("register");
        } catch (\Exception $e) {
            return redirect()->route('index')->with('error', 'Error');
        }
    }

    function deleteUser() : RedirectResponse
    {
        try {
            DB::beginTransaction();

            $user = UserModel::find(session("id"));

            $user->delete();

            DB::commit();
            return $this->logout();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('home')->with('error', 'Error');
        }
    }

    function login() : View | RedirectResponse
    {
        try {

            return view("login");
        } catch (\Exception $e) {
            return redirect()->route('index')->with('error', 'Error');
        }
    }

    function getUser(): View | RedirectResponse
    {
        try {

            $user = UserModel::find(session("id"));

            return view("users.getUser", compact("user"));

        } catch (\Exception $e) {
            return redirect()->route('index')->with('error', 'Error');
        }
    }

    function logining(LoginRequest $r): RedirectResponse
    {
        try {

            $data = $r->all();

            $email = trim($data['email']);
            $password = trim($data['password']);

            $user = UserModel::where("email", $email)->first();

            if (!$user) {
                return redirect()->route('login')->with('error', 'login invalid');
            }

            if (!Hash::check($password, $user->password)){
                return redirect()->route('login')->with('error', 'login invalid');
            }

            session()->put("active", true);
            session()->put("id", $user->id);
            session()->put("email", $email);

            return redirect()->route('home')->with('success', 'welcome again');
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Error');
        }
    }

    function registering(RegisterRequest $r): RedirectResponse
    {
        try {
            DB::beginTransaction();

            $data = $r->all();

            $data['email'] = trim($data['email']);
            $data['password'] = trim($data['password']);

            $user = UserModel::where("email", $data['email'])->first();

            if ($user) {
                return redirect()->back()->with('warning', 'User already exists with this email!');
            }

            $data['password'] = Hash::make($data['password']);

            UserModel::create($data);

            $userSave = UserModel::where("email", $data['email'])->first();

            session()->put("active", true);
            session()->put("id", $userSave->id);
            session()->put("email", $userSave->email);

            DB::commit();
            return redirect()->route('home')->with('success', 'welcome');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('index')->with('error', 'Error');
        }
    }

    function updateUser(): View | RedirectResponse
    {
        try {
            $user = UserModel::find(session("id"));

            return view("users.updateUser", compact('user'));
        } catch (\Exception $e) {
            return redirect()->route('index')->with('error', 'Error');
        }
    }

    function updatingUser(UpdateUserRequest $r) : RedirectResponse
    {
        try {
            DB::beginTransaction();
            $data = $r->all();

            $data['password'] = Hash::make($data['password']);

            $user = UserModel::find(session("id"));

            $user->update($data);

            DB::commit();
            return redirect()->route('home')->with('success', 'User updated!!!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('home')->with('error', 'Error the update');
        }
    }

    public function logout() : RedirectResponse
    {
        try {
            session()->flush();
            return redirect()->route('index')->with('msg', 'Logged out successfully!');
        } catch (\Exception $e) {
            return redirect()->route('index')->with('error', 'An error occurred during logout!');
        }
    }

}


