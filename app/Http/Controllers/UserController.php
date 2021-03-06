<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function login(Request $req){
        if($req->input('action') == "login"){
            $req->validate([
                'email'=>'required',
                'password'=>'required',
            ]);

            $credential = $req->only('email', 'password');
            $user = User::where(['email'=>$req->email])->first();

            if(Auth::attempt($credential)){
                $req->session()->put('user', $user);
                Auth::login($user);
                return redirect('/');
            }
            return redirect()->back()->withErrors([
                'email' => "Wrong Email or Password"
            ]);
        }
        else{
            $user = User::where(['email'=>$req->email])->first();
            if($user == null){
                return redirect()->back()->with(['error' => 'Email tidak ditemukan']);
            }
            $user->password = Hash::make('rapat123');
            $this->sendEmail($user);
            $user->save();
            return redirect()->back()->with(['success' => 'Password anda telah dikirim melalui email yang terdaftar, jika tidak ada di inbox harap check spam!']);
        }
    }
    public function getUser(){
        $users = User::all();
        return  view('master.register', compact('users'));
    }
    public function jsonUser(){
        $users = User::all();
        return response()->json($users);
    }

    public function register(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'role' => 'required',
        ]);
        $user = new User();
        $user->fullname = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make('12345678');
        $user->permission_id = $request->role;
        $user->save();
        return redirect()->back()->with('success', 'User added successfully');
    }

    public function deleteUser(Request $request){
        $user = User::find($request->id);
        $user->delete();
        return redirect()->back()->with('success', 'User deleted successfully');
    }

    public function updateUser(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
        ]);
        $user = User::find($request->id);
        $user->fullname = $request->name;
        $user->email = $request->email;
        $user->permissions = $request->role;
        $user->save();
        return redirect()->back()->with('success', 'User updated successfully');
    }

    public function updatePassword(Request $request){
        $user = Auth::user();
        $request->validate([
            'password' => ['required', function ($attribute, $value, $fail) use ($user) {
                if (!Hash::check($value, $user->password)) {
                    return redirect()->back()->withErrors([
                        'password' => "Wrong Password"
                    ]);
                }
            }],
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password',
        ]);
        $user = User::find(Auth::user()->id);
        $user->password = Hash::make($request->new_password);
        $user->save();
        return redirect()->back()->with('success', 'Password updated successfully');
    }


    public function sendEmail($user){
        Mail::send(
            'email.forgot',
            ['user' => $user],
            function ($message) use ($user) {
                $message->to($user->email);
                $message->subject('Password Baru - Manajemen Akun');
            }
        );
    }

}
