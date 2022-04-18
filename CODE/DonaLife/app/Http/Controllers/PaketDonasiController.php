<?php

namespace App\Http\Controllers;

use App\Models\BarangCampaign;
use App\Models\Paket;
use App\Models\PaketDonasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class PaketDonasiController extends Controller
{
    
    public function index()
    {
        //
    }


    public function create(BarangCampaign $campaign)
    {
        $inisiator = $campaign->inisiator;
        return view('pages.donatur.paketDonasi.input', ['data'=> new PaketDonasi,'inisiator'=>$inisiator, 'campaign'=>$campaign]);
    }

    
    public function store(Request $request, BarangCampaign $campaign)
    {
        $validator = Validator::make($request->all(), [
            'paket.*.' => 'required',
            'photo_paket' => 'required',
            'photo_resi' => 'required',
            'pesan' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('paket')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('paket'),
                ]);
            }elseif ($errors->has('photo_paket')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('photo_paket'),
                ]);
            }elseif ($errors->has('photo_resi')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('photo_resi'),
                ]);
            }elseif ($errors->has('pesan')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('pesan'),
                ]);
            }
        }
        
        foreach($request->paket as $paket){
            $paketDonasi = new PaketDonasi;
            $paketDonasi->user_id = Auth::user()->id;
            $paketDonasi->campaign_barang_id = $campaign->id;
            $file = request()->file('photo_paket')->store("donasiPaketCampaign");
            $resi = request()->file('photo_resi')->store("donasiPaketCampaignResi");
            $paketDonasi->photo_paket = $file;
            $paketDonasi->photo_resi = $resi;
            $paketDonasi->pesan = $request->pesan;
            $paketDonasi->paket_id = $paket;
            $jumlahPaket = Paket::where('campaign_id',$campaign->id)->where('id', $paket)->get();
            foreach($jumlahPaket as $jumlah){
                $jumlah->qty -= 1;
                $jumlah->update();
            }
            $paketDonasi->created_at = now();
            $paketDonasi->updated_at = now();
            $paketDonasi->save();
        }
        return response()->json([
            'alert' => 'success',
            'message' => 'Terimakasih! Donasi Berhasil Tersimpan',
            'redirect' => route('home'),
        ]);
    }

   
    public function show(PaketDonasi $paketDonasi)
    {
        //
    }

   
    public function edit(PaketDonasi $paketDonasi)
    {
        //
    }

  
    public function update(Request $request, PaketDonasi $paketDonasi)
    {
        //
    }

   
    public function destroy(PaketDonasi $paketDonasi)
    {
        //
    }
}
