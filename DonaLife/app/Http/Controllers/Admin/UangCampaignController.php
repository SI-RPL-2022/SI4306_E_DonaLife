<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BarangCampaign;
use App\Models\UangCampaign;
use App\Models\UangDonasi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class UangCampaignController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->except('show');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $keywords = $request->keywords;
            $collection = UangCampaign::where('judul','like','%'.$keywords.'%')->paginate(10);
            return view('pages.admin.campaignUang.list',compact('collection'));
        }   
        return view('pages.admin.campaignUang.main');
    }

    public function create()
    {
        $user = User::where('role','!=','admin')
        ->where('role','!=','admin')
        ->where('nik','!=', null)
        ->where('ktp_photo','!=',null)
        ->where('selfie_photo','!=',null)
        ->where('alamat','!=',null)
        ->where('province_id','!=',null)
        ->where('city_id','!=',null)
        ->where('subdistrict_id','!=',null)
        ->where('postcode','!=',null)
        ->where('rekening','!=',null)
        ->where('nama_bank','!=',null)
        ->get();
        return view('pages.admin.campaignUang.input',['user' => $user, 'data'=> new UangCampaign]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'inisiator' => 'required',
            'judul' => 'required',
            'gambar' => 'required',
            'deskripsi' => 'required',
            'target_nominal' => 'required',
            'tanggal_selesai' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('inisiator')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('inisiator'),
                ]);
            }elseif ($errors->has('judul')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('judul'),
                ]);
            }elseif ($errors->has('gambar')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('gambar'),
                ]);
            }elseif ($errors->has('deskripsi')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('deskripsi'),
                ]);
            }elseif ($errors->has('target_nominal')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('target_nominal'),
                ]);
            }elseif ($errors->has('tanggal_selesai')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('tanggal_selesai'),
                ]);
            }
        }
        $uangCampaign = new UangCampaign;
        $uangCampaign->user_id = $request->inisiator;
        $uangCampaign->judul = $request->judul;
        $file = request()->file('gambar')->store("uangCampaign");
        $uangCampaign->gambar = $file;
        $uangCampaign->target_nominal = Str::of($request->target_nominal)->replace(',', '') ?: 0;
        $uangCampaign->deskripsi = $request->deskripsi;
        $uangCampaign->tanggal_selesai = $request->tanggal_selesai;
        $uangCampaign->status = "pengecekan";
        $uangCampaign->created_at = now();
        $uangCampaign->updated_at = now();
        $uangCampaign->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Campaign '. $request->judul . ' Tersimpan',
        ]);
    }

    public function show(UangCampaign $uangCampaign)
    {
        $totalDonasi = DB::table('uang_donasi')->where('campaign_uang_id',$uangCampaign->id)->sum('nominal');
        $donator = UangDonasi::where('campaign_uang_id',$uangCampaign->id)->orderBy('created_at','desc')->get();
        $allUangCampaign = UangCampaign::where('id','!=',$uangCampaign->id)->where('status','!=','pengecekan')->get();
        return view('pages.donatur.campaignUang.show',compact('uangCampaign','totalDonasi','allUangCampaign','donator'));
    }

    public function edit(UangCampaign $uangCampaign)
    {
        $user = User::where('role','!=','admin')
        ->where('role','!=','admin')
        ->where('nik','!=', null)
        ->where('ktp_photo','!=',null)
        ->where('selfie_photo','!=',null)
        ->where('alamat','!=',null)
        ->where('province_id','!=',null)
        ->where('city_id','!=',null)
        ->where('subdistrict_id','!=',null)
        ->where('postcode','!=',null)
        ->where('rekening','!=',null)
        ->where('nama_bank','!=',null)
        ->get();
        return view('pages.admin.campaignUang.input',['user' => $user, 'data'=> $uangCampaign]);
    }

    public function update(Request $request, UangCampaign $uangCampaign)
    {
        $validator = Validator::make($request->all(), [
            'inisiator' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required',
            'target_nominal' => 'required',
            'tanggal_selesai' => 'required',
            'status' => 'required',

        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('inisiator')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('inisiator'),
                ]);
            }elseif ($errors->has('judul')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('judul'),
                ]);
            }elseif ($errors->has('gambar')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('gambar'),
                ]);
            }elseif ($errors->has('deskripsi')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('deskripsi'),
                ]);
            }elseif ($errors->has('target_nominal')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('target_nominal'),
                ]);
            }elseif ($errors->has('tanggal_selesai')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('tanggal_selesai'),
                ]);
            }
        }

        $uangCampaign->user_id = $request->inisiator;
        if (request()->file('gambar')) {
            Storage::delete($uangCampaign->gambar);
            $file = request()->file('gambar')->store("uangCampaign");
            $uangCampaign->gambar = $file;
        }
        $uangCampaign->judul = $request->judul;
        $uangCampaign->status = $request->status;
        $uangCampaign->target_nominal = Str::of($request->target_nominal)->replace(',', '') ?: 0;
        $uangCampaign->deskripsi = $request->deskripsi;
        $uangCampaign->tanggal_selesai = $request->tanggal_selesai;
        $uangCampaign->updated_at = now();
        $uangCampaign->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Campaign '. $uangCampaign->judul . ' Tersimpan',
        ]);
    }

    public function destroy(UangCampaign $uangCampaign)
    {
        $uangCampaign->delete();
        Storage::delete($uangCampaign->gambar);
        return response()->json([
            'alert' => 'success',
            'message' => 'Campaign '. $uangCampaign->judul . ' Terhapus',
        ]);
    }
}
