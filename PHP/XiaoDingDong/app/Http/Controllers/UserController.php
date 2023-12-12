<?php

namespace App\Http\Controllers;

use App\Models\CartHeader;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Console\Input\Input;

class UserController extends Controller
{
    public function store(Request $request) {
        $validated_data = $request->validate([
            'username' => 'required|min:5|max:50',
            'email' => 'required|unique:users|email|ends_with:@gmail.com',
            'password' => 'required|min:5|Max:255|confirmed',
        ]);

        $new_user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'is_admin' => 0,
        ]);

        $new_cart = CartHeader::create([
            'user_id' => $new_user->id,
        ]);

        Auth::login($new_user, true);

        return redirect('home')->with('info', 'register_success');
    }

    public function patch(Request $request) {
        $validated_data = $request->validate([
            'username' => 'required|min:5|max:50',
            'email' => 'nullable|ends_with:@gmail.com|unique:users',
            'phone_number' => 'nullable|numeric|digits:12',
            'address' => 'nullable|max:255',
            'current_password' => 'required',
            'password' => 'nullable|alpha_num|min:5|max:255|confirmed', //The .docx is inconsistent, in register
                                                                        //alpha_numeric is not needed, but in update, it is.
            'image' => 'nullable|mimes:jpg,png,jpeg|file',
        ]);

        if (Hash::check($request->current_password, Auth::user()->password)) {
            $update = array_filter($request->all());

            if ($request->image) {
                $filename = $request->image->getClientOriginalName();
                $request->image->move('assets/profile/', $filename);
                unset($update['image']);
                $update['img_path'] = str_replace(' ', '%20', $filename);
            }

            if ($request->password) {
                $update['password'] = bcrypt($update['password']);
            }

            unset($update['current_password'], $update['_token'], $update['password_confirmation']);
            User::where('id', Auth::user()->id)->update($update);

            return redirect()->back()->with('info', 'Profile updated successfully.');
        }

        return back()->withErrors([
            'password' => 'Password given do not match our records.'
        ]);;
    }

    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email|ends_with:@gmail.com',
            'password' => 'required|min:5|max:255'
        ]);

        $remember_user = $request->remember_me;

        if (Auth::attempt($credentials, $remember_user)) {
            $request->session()->regenerate();
            return redirect()->intended('home');
        }
        else {
            return back()->withErrors([
                'password' => 'Email and password provided do not match our records.'
            ])->onlyInput('email');
        }
    }

    public function update() {
        return view('users.update');
    }

    public function register() {
        return view('users.register');
    }

    public function login() {
        return view('users.login');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/home');
    }
}
