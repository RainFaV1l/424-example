<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function loginPage() {
        return view('pages.login');
    }

    public function registerPage() {
        return view('pages.register');
    }

    public function register(StoreRequest $request) {

        $data = $request->validated();

        $user = User::query()->create($data);

        auth()->login($user);

//        Auth::login($user);

        return redirect()->route('index.index');

    }

    public function login(Request $request) {

        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'min:5', 'max:255', 'exists:users,email'],
            'password' => ['required', 'string', 'min:6', 'max:255'],
        ]);

        $user = $validator->validate();

        if(!auth()->attempt($user)) {

            return back()->withErrors([
                'invalid_password' => 'Неверный логин или пароль'
            ])->withInput($request->all());

        }

        return redirect()->route('index.index');

    }

    public function logout() {

        auth()->logout();

        return redirect()->route('user.login');

//        Auth::logout();

    }
}
