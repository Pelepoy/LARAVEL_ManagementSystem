<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\Rule;
use function Laravel\Prompts\table;

class UserController extends Controller
{
//  public function index()
//  {
//    return 'Hello from User Controller';
//  }
//
//  public function ragnar()
//  {
//    $names = ['Bjorn', 'Ube', 'Hvitserk', 'Sigurd', 'Ivar'];
//
//    foreach ($names as $name) {
//      echo $name . '<br>';
//    }
//  }
//
//  public function show($id)
//  {
//    return $id;
//  }
//
//  public function showData($id)
//  {
//    $data = [
//      "id" => $id,
//      "name" => "Ragnar Lothbrok",
//      "age" => 24,
//      "email" => "ragnar@valhalla.com",
//    ];
//    return view('user', $data);
//  }
//
//  // ? Another Way of passing
//  public function showData2($id)
//  {
//    $data = ["data" => "(data from database)"];
//    return view('user2')
//            ->with("data", $data)
//            ->with("name", "Ivar \"The Boneless\" Lothbroke")
//            ->with("email", "welcome2@valhalla.odin")
//            ->with("age", 25)
//            ->with("id", $id);
//  }
//
//  public function login()
//  {
//    $auth = [
//      "username" => "Pelep",
//      "password" => "Riverside"
//    ];
//    return view('login', $auth);
//  }
    public function register()
    {
        return view('user.register');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => ['required', 'min:2'],
            "email" => ['required', 'email', Rule::unique('users', 'email')],
            "password" => 'required|confirmed|min:6',
        ]);

        $validated['password'] = bcrypt($validated['password']);

        $user = User::create($validated);
        // can supply email verification, payment and etc.
        $user->timestamps = true;
        $user->remember_token = csrf_token();
        $user->email_verified_at = now();
        $user->save();

        auth()->login($user);
    }

    public function login()
    {
        if (View::exists('user.login')) {
            return view('user.login');
        } else {
            //  return abort(404);
            return response()->view('errors.404');
        }
    }

    public function process(Request $request)
    {
        $validated = $request->validate([
            "email" => ['required', 'email'],
            "password" => 'required'
        ]);

        if (auth()->attempt($validated)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'Welcome Back');
        }

        return back()->withErrors(['email' => 'Login Failed Check your Email and Password'])->onlyInput('email');

    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('message', 'Logout Successfully!');
    }
}






























