<?php

namespace App\Http\Controllers;

use App\Models\PaketDonasi;
use App\Models\Province;
use App\Models\UangDonasi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function profile(Request $request)
    {
        if ($request->ajax()) {
            $uangDonasi = UangDonasi::where('user_id', Auth::user()->id)
                ->orderBy('created_at', 'DESC')
                ->get();
            $paketDonasi = PaketDonasi::where('user_id', Auth::user()->id)
                ->orderBy('created_at', 'DESC')
                ->paginate();
                return view('pages.donatur.profile.list',compact('uangDonasi', 'paketDonasi'));
        }
        return view('pages.donatur.profile.main');
    }   

    public function edit_profile(User $user)
    {
        $provinsi= Province::get();
        return view('pages.donatur.profile.edit', compact('user','provinsi'));
    }
    public function update_profile(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|max:255|unique:users,email,'.Auth::user()->id.',id',
            'phone' => 'required|min:9|max:15|unique:users,telepon,'.Auth::user()->id.',id',
            'address' => 'required',
            'province' => 'required',
            'nik' => 'required|unique:users,nik,'.Auth::user()->id.',id',
            'city' => 'required',
            'subdistrict' => 'required',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('name')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('name'),
                ]);
            } elseif ($errors->has('email')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('email'),
                ]);
            } elseif ($errors->has('phone')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('phone'),
                ]);
            } elseif ($errors->has('address')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('address'),
                ]);
            }
             elseif ($errors->has('province')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('province'),
                ]);
            } elseif ($errors->has('city')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('city'),
                ]);
            } elseif ($errors->has('subdistrict')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('subdistrict'),
                ]);
            }
        }
        $user->nama = Str::title($request->name);
        $user->email = $request->email;
        $user->telepon = $request->phone;
        $user->alamat = $request->address;
        $user->province_id = $request->province;
        $user->city_id = $request->city;
        $user->subdistrict_id = $request->subdistrict;
        $user->postcode = $request->postcode;
        $user->updated_at = now();
        if($request->nik){
            $user->nik = $request->nik;
            $user->rekening = $request->rekening;
            $user->nama_bank = $request->nama_bank;
        }
        if (request()->file('selfie_photo')){
            Storage::delete($user->selfie_photo);
            $selfie_photo = request()->file('selfie_photo')->store("selfie_photo");
            $user->selfie_photo = $selfie_photo;
        }
        if (request()->file('ktp_photo')){
            Storage::delete($user->ktp_photo);
            $ktp_photo = request()->file('ktp_photo')->store("ktp_photo");
            $user->ktp_photo = $ktp_photo;
        }
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Profile Terubah',
        ]);
    }
}
