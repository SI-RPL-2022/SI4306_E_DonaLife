<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{

    public function __construct(){
        $this->middleware(function ($request,$next) {
            $role = Auth::user()->role;
            if($role != 'admin'){
                abort(403);
            }
            return $next($request);
        });
    }

    public function index()
    {
        return view('pages.admin.profile.main');
    }
    
    public function cpassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password_lama' => 'required|min:8',
            'password_baru' => 'required|min:8',
            'kpassword_baru' => 'same:password_baru|min:8',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
           if ($errors->has('password_baru')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('password_baru'),
                ]);
            } elseif ($errors->has('kpassword_baru')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('kpassword_baru'),
                ]);
            }
        }
        $profile = User::where('id',Auth::user()->id)->first();
        $profile->password = Hash::make($request->password_baru);
        $profile->update();
        Auth::logout($profile);
        return response()->json([
            'alert' => 'success',
            'message' => 'Password Berhasil diubah',
        ]);
    }
}
