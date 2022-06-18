<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class CampaignRequestController extends Controller
{
    
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $keywords = $request->keywords;
            $collection = UserRequest::where('user_id', Auth::user()->id)->paginate(10);
            return view('pages.donatur.campaignRequest.list',compact('collection'));
        }
        return view('pages.donatur.campaignRequest.main');
    }
    
    public function create()
    {
        if(Auth::user()->nik == null ){
            return view('pages.donatur.profile.main',[
                'errorMessage' => 'Harap Lengkapi Profile Anda Terlebih Dahulu',
            ]);
        }
        return view('pages.donatur.campaignRequest.input', ['data' => new UserRequest]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'gambar' => 'required',
            'deskripsi' => 'required',
            'jenis' => 'required',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('judul')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('judul'),
                ]);
            } elseif ($errors->has('gambar')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('gambar'),
                ]);
            } elseif ($errors->has('deskripsi')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('deskripsi'),
                ]);
            } elseif ($errors->has('jenis')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('jenis'),
                ]);
            }
        }
       $userRequest = new UserRequest;
       $userRequest->user_id = $request->id;
       $userRequest->judul = Str::title($request->judul);
       $gambar = request()->file('gambar')->store("userRequestCampaign");
       $userRequest->gambar = $gambar;
       $userRequest->deskripsi = $request->deskripsi;
       $userRequest->jenis = $request->jenis;
       $userRequest->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Permintaan Terkirim!',
        ]);
    }

    public function show(UserRequest $userRequest)
    {
        //
    }

    public function edit(UserRequest $userRequest)
    {
        //
    }

    public function update(Request $request, UserRequest $userRequest)
    {
        //
    }

    public function destroy(UserRequest $userRequest)
    {
        //
    }
}
