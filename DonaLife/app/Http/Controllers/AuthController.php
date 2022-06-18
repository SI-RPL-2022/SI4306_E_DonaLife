<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:web')->except('do_logout');
    }
    public function index()
    {
        return view('pages.donatur.auth.main');
    }
    public function do_login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'password' => 'required|min:8',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('email')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('email'),
                ]);
            }else{
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('password'),
                ]);
            }
        }
        if(Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password, 'role' => 'donatur']))
        {
            return response()->json([
                'alert' => 'success',
                'message' => 'Welcome back '. Auth::guard('web')->user()->name,
                'callback' => 'reload',
            ]);
        }else{
            return response()->json([
                'alert' => 'error',
                'message' => 'Maaf, sepertinya email atau password salah.',
            ]);
        }
    }

    public function do_register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required|unique:users|max:255',
            'telepon' => 'required|unique:users|min:9|max:15',
            'password' => 'required|min:8|max:12',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('nama')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nama'),
                ]);
            } elseif ($errors->has('email')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('email'),
                ]);
            } elseif ($errors->has('telepon')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('telepon'),
                ]);
            } elseif ($errors->has('password')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('password'),
                ]);
            }
        }
        $user = new User;
        $user->nama = Str::title($request->nama);
        $user->role = 'donatur';
        $user->email = $request->email;
        $user->telepon = $request->telepon;
        $user->password = Hash::make($request->password);
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Selamat Bergabung ' . $request->name,
        ]);
    }

    public function do_logout()
    {
        $user = Auth::guard('web')->user();
        Auth::logout($user);
        return redirect('auth');
    }
}
