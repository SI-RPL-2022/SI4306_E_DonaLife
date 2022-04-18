<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BeritaDonasiController extends Controller
{
    public function index()
    {
        $beritaUang = Berita::where('campaign_uang_id','!=',null)->get();
        $beritaBarang = Berita::where('campaign_barang_id','!=',null)->get();
        $data1 = Berita::with('campaignBarangId:id')->where('campaign_barang_id','!=',null)->get();
        if($data1 != null){
            foreach($data1 as $item){
                $paketDonasi = DB::table('paket_donasi')->where('campaign_barang_id',$item->campaignBarangId->id)->count();
            }
        }
        $data2 = Berita::with('campaignUangId:id')->where('campaign_uang_id','!=',null)->get();
        if($data2 != null){
            foreach($data2 as $item){
                $nominalDonasi = DB::table('uang_donasi')->where('campaign_uang_id',$item->campaignUangId->id)->sum('nominal');
            }
        }
        return view('pages.donatur.beritaDonasi.index',compact('beritaUang','beritaBarang','paketDonasi','nominalDonasi'));
    }
}
