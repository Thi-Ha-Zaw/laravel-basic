<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view("auth.register");
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|min:4",
            "email" => "required|email|unique:students,email",
            "password" => "required|min:8",
            "password_confirmation" => "same:password"
        ]);

        $verify_code = rand(100000,999999);
        logger("The email veriy code is". $verify_code);

        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->password = Hash::make($request->password);
        $student->verified_code = $verify_code;
        $student->user_token = md5($verify_code);
        $student->save();
        return redirect()->route("auth.login");
    }

    public function login()
    {
        return view("auth.login");
    }

    public function check(Request $request)
    {
        $request->validate([
            "email" => "required|email|exists:students,email",
            "password" => "required|min:8"
        ], [
            "email.exists" => " email or password wrong"
        ]);

        $student = Student::where("email", $request->email)->first();
        if (!Hash::check($request->password, $student->password)) {
            return redirect()->route("auth.login")->withErrors(["email" => "email or password wrong"]);
        }

        session(["auth" => $student]);
        return redirect()->route("dashboard.home");
    }

    public function logout()
    {
        session()->forget("auth");
        return redirect()->route("auth.login");
    }

    public function changePassword()
    {
        return view("auth.changePassword");
    }

    public function savePassword(Request $request)
    {

        $request->validate([
            "current_password" => "required|min:8",
            "password" => "required|min:8|confirmed",
        ]);

        if(!Hash::check($request->current_password,session('auth')->password)){
            return redirect()->back()->withErrors(["current_password" => "password does not match"]);
        }

        $student = Student::find(session('auth')->id);
        $student->password = Hash::make($request->password);
        $student->update();

        session()->forget('auth');
        return redirect()->route("auth.login");
    }

    public function verifyEmail()
    {
        return view("auth.verifyEmail");
    }

    public function saveVerifyEmail(Request $request)
    {

        $request->validate([
            "verify_code" => "required|numeric"
        ]);

        if($request->verify_code != session('auth')->verified_code){
            return redirect()->back()->withErrors(["verify_code" => "something went wrong"]);
        }

        $student = Student::find(session('auth')->id);
        $student->email_verified_at = now();
        session(['auth' => $student]);

        return redirect()->route("dashboard.home");
    }

    public function forgot(){
        return view("auth.forgot-password");
    }

    public function checkEmail(Request $request){
        $request->validate([
            "email" => "required|exists:students,email"
        ]);

        $student = Student::where("email",$request->email)->first();
        $link = route("auth.newPassword",["user_token" => $student->user_token]);
        logger("Your new password link is ". $link);

        return redirect()->route("auth.login")->with(["message"=>"your new password link have been send"]);
    }


    public function newPassword(){
        $token = request()->user_token;
        $student = Student::where("user_token",$token)->first();
        if(is_null($student)){
            return abort(403,"You are not Allowed");
        }
        return view("auth.new-password",["user_token" => $token]);
    }

    public function resetPassword(Request $request){
        $request->validate([
            "user_token" => "required|exists:students,user_token",
            "password" => "required|confirmed|min:8"
        ],[
            "user_token.exists" => "something went wrong"
        ]);

        $student = Student::where("user_token",$request->user_token)->first();
        $student->password = Hash::make($request->password);
        $student->user_token = md5(rand(100000,999999));
        $student->update();

        return redirect()->route("auth.login")->with("message","password reset");

    }
}
