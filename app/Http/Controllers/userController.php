<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class userController extends Controller
{

    public function dashboard(Request $request){
        return view("dashboard", ["message"=>"landing page"]);
    }
    public function register(Request $request){
        $user_registration = $request->validate([
            "name"=> ["required", Rule::unique("users", "name")],
            "email"=> ["required", Rule::unique("users", "email")],
            "password"=> "required",
        ]);

        $user_registration["name"] = strip_tags($user_registration["name"]);
        $user_registration["email"] = strip_tags($user_registration["email"]);
        $user_registration["password"] = strip_tags($user_registration["password"]);

        $user_registration["password"] = bcrypt($user_registration["password"]);
        $user = User::create($user_registration);
        auth()->login($user);

        return view("dashboard", ["user"=>$user_registration, "message"=> "Account is created successfully. Login below."]);
    }



    public function login(Request $request){
        $user_login = $request->validate([
            "login_email"=> ["required"],
            "login_password"=> ["required"],
        ]);
        if(auth()->attempt(["email"=>$user_login["login_email"], "password"=>$user_login["login_password"]])){
            $request->session()->regenerate();
        }
        return redirect("/dashboard")->with("message", "logged in");
    }

    public function logout(Request $request){
        auth()->logout();
        return redirect("/dashboard")->with('message', "logged out.");
    }


}
