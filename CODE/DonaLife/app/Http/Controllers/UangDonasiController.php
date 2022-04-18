<?php

namespace App\Http\Controllers;

use App\Models\UangCampaign;
use App\Models\UangDonasi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UangDonasiController extends Controller
{
  
    public function index(Request $request)
    {
    }

    public function create(UangCampaign $campaign)
    {
        $inisiator = $campaign->inisiator;
        return view('pages.donatur.uangDonasi.input', ['data'=> new UangDonasi,'inisiator'=>$inisiator, 'campaign'=>$campaign]);
    }

    public function store(Request $request, UangCampaign $campaign)
    {
        $validator = Validator::make($request->all(), [
            'photo' => 'required',
            'nominal' => 'required',
            'pesan' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('photo')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('photo'),
                ]);
            }elseif ($errors->has('nominal')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nominal'),
                ]);
            }elseif ($errors->has('pesan')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('pesan'),
                ]);
            }
        }
        $uangDonasi = new UangDonasi;
        $uangDonasi->user_id = Auth::user()->id;
        $uangDonasi->campaign_uang_id = $campaign->id;
        $file = request()->file('photo')->store("donasiUangCampaign");
        $uangDonasi->photo = $file;
        $uangDonasi->nominal = Str::of($request->nominal)->replace(',', '') ?: 0;
        $uangDonasi->pesan = $request->pesan;
        $uangDonasi->created_at = now();
        $uangDonasi->updated_at = now();
        $uangDonasi->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Terimakasih! Donasi Berhasil Tersimpan',
            'redirect' => route('home'),
        ]);
    }

    public function show(UangDonasi $uangDonasi)
    {
        //
    }

    public function edit(UangDonasi $uangDonasi)
    {
        //
    }

    public function update(Request $request, UangDonasi $uangDonasi)
    {
        //
    }

    public function destroy(UangDonasi $uangDonasi)
    {
        //
    }
}
