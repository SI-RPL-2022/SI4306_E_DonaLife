<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\UangCampaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BeritaCampaignUangController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax() ){
            $totalDonasi = "";
            $keywords = $request->keywords;
            $collection = Berita::where('deskripsi','like','%'.$keywords.'%')->where('campaign_uang_id','!=',null)->paginate(10);
            $data = Berita::with('campaignUangId:id')->where('campaign_uang_id','!=',null)->get();
            if($data != null){
                foreach($data as $item){
                    $totalDonasi = DB::table('uang_donasi')->where('campaign_uang_id',$item->campaignUangId->id)->sum('nominal');
                }
            }
            return view('pages.admin.beritacampaignUang.list',['collection'=>$collection, 'totalDonasi'=>$totalDonasi]);
        }        
        return view('pages.admin.beritacampaignUang.main');
    }

    public function create()
    {
        $campaign = UangCampaign::get();
        return view('pages.admin.beritacampaignUang.input',['data' => new Berita, 'campaign' => $campaign]);   
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
        $berita_campaignUang = new Berita;
        $berita_campaignUang->campaign_uang_id = $request->campaign;
        $file = request()->file('foto')->store("beritaUangCampaign");
        $berita_campaignUang->foto = $file;
        $berita_campaignUang->deskripsi = $request->deskripsi;
        $berita_campaignUang->tanggal_mulai_campaign = $request->tanggal_mulai;
        $berita_campaignUang->tanggal_selesai_campaign = $request->tanggal_selesai;
        $berita_campaignUang->created_at = now();
        $berita_campaignUang->updated_at = now();
        $berita_campaignUang->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Berita Tersimpan',
        ]);
    }

    public function show(Berita $berita_campaignUang)
    {
        //
    }

    public function edit(Berita $berita_campaignUang)
    {
        $campaign = UangCampaign::get();
        return view('pages.admin.beritacampaignUang.input',['data' => $berita_campaignUang, 'campaign' => $campaign]);   
    }

    public function update(Request $request, Berita $berita_campaignUang)
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
        $berita_campaignUang->campaign_uang_id = $request->campaign;
        if(request()->file('foto')){
            Storage::delete($berita_campaignUang->foto);
            $file = request()->file('foto')->store("beritaUangCampaign");
            $berita_campaignUang->foto = $file;
        }
        $berita_campaignUang->deskripsi = $request->deskripsi;
        $berita_campaignUang->tanggal_mulai_campaign = $request->tanggal_mulai;
        $berita_campaignUang->tanggal_selesai_campaign = $request->tanggal_selesai;
        $berita_campaignUang->updated_at = now();
        $berita_campaignUang->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Berita Terubah',
        ]);
    }

    public function destroy(Berita $berita_campaignUang)
    {
        $berita_campaignUang->delete();
        Storage::delete($berita_campaignUang->foto);
        return response()->json([
            'alert' => 'success',
            'message' => 'Berita Terhapus',
        ]);
    }
}
