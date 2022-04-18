<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BarangCampaign;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BeritaCampaignBarangController extends Controller
{

    public function index(Request $request)
    {
        if($request->ajax() ){
            $totalDonasi = "";
            $keywords = $request->keywords;
            $collection = Berita::where('deskripsi','like','%'.$keywords.'%')->where('campaign_barang_id','!=',null)->paginate(10);
            $data = Berita::with('campaignBarangId:id')->where('campaign_barang_id','!=',null)->get();
            if($data != null){
                foreach($data as $item){
                    $totalDonasi = DB::table('paket_donasi')->where('campaign_barang_id',$item->campaignBarangId->id)->count();
                }
            }
            return view('pages.admin.beritacampaignBarang.list',compact('collection','totalDonasi'));
        }        
        return view('pages.admin.beritacampaignBarang.main');
    }

    public function create()
    {
        $campaign = BarangCampaign::get();
        return view('pages.admin.beritacampaignBarang.input',['data' => new Berita, 'campaign' => $campaign]);   
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'campaign' => 'required',
            'foto' => 'required',
            'deskripsi' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('campaign')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('campaign'),
                ]);
            }elseif ($errors->has('foto')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('foto'),
                ]);
            }elseif ($errors->has('deskripsi')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('deskripsi'),
                ]);
            }elseif ($errors->has('tanggal_mulai')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('tanggal_mulai'),
                ]);
            }elseif ($errors->has('tanggal_selesai')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('tanggal_selesai'),
                ]);
            }
        }
        $berita_campaignBarang = new Berita;
        $berita_campaignBarang->campaign_barang_id = $request->campaign;
        $file = request()->file('foto')->store("beritaBarangampaign");
        $berita_campaignBarang->foto = $file;
        $berita_campaignBarang->deskripsi = $request->deskripsi;
        $berita_campaignBarang->tanggal_mulai_campaign = $request->tanggal_mulai;
        $berita_campaignBarang->tanggal_selesai_campaign = $request->tanggal_selesai;
        $berita_campaignBarang->created_at = now();
        $berita_campaignBarang->updated_at = now();
        $berita_campaignBarang->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Berita Tersimpan',
        ]);
    }

    public function show(Berita $berita_campaignBarang)
    {
        //
    }

    public function edit(Berita $berita_campaignBarang)
    {
        $campaign = BarangCampaign::get();
        return view('pages.admin.beritacampaignBarang.input',['data' => $berita_campaignBarang, 'campaign' => $campaign]);   
    }

    public function update(Request $request, Berita $berita_campaignBarang)
    {
        $validator = Validator::make($request->all(), [
            'campaign' => 'required',
            'deskripsi' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('campaign')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('campaign'),
                ]);
            }elseif ($errors->has('foto')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('foto'),
                ]);
            }elseif ($errors->has('deskripsi')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('deskripsi'),
                ]);
            }elseif ($errors->has('tanggal_mulai')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('tanggal_mulai'),
                ]);
            }elseif ($errors->has('tanggal_selesai')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('tanggal_selesai'),
                ]);
            }
        }
        $berita_campaignBarang->campaign_barang_id = $request->campaign;
        if(request()->file('foto')){
            Storage::delete($berita_campaignBarang->foto);
            $file = request()->file('foto')->store("beritaBarangCampaign");
            $berita_campaignBarang->foto = $file;
        }
        $berita_campaignBarang->deskripsi = $request->deskripsi;
        $berita_campaignBarang->tanggal_mulai_campaign = $request->tanggal_mulai;
        $berita_campaignBarang->tanggal_selesai_campaign = $request->tanggal_selesai;
        $berita_campaignBarang->updated_at = now();
        $berita_campaignBarang->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Berita Terubah',
        ]);
    }

    public function destroy(Berita $berita_campaignBarang)
    {
        $berita_campaignBarang->delete();
        Storage::delete($berita_campaignBarang->foto);
        return response()->json([
            'alert' => 'success',
            'message' => 'Berita Terhapus',
        ]);
    }
}
