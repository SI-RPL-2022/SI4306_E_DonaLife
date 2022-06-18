<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BarangCampaign;
use App\Models\PaketDonasi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class BarangCampaignController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except('show');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $keywords = $request->keywords;
            $collection = BarangCampaign::where('judul','like','%'.$keywords.'%')->paginate(10);
            return view('pages.admin.campaignBarang.list',compact('collection'));
        }   
        return view('pages.admin.campaignBarang.main');
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
        return view('pages.admin.campaignBarang.input',['user' => $user, 'data'=> new BarangCampaign]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'inisiator' => 'required',
            'judul' => 'required',
            'gambar' => 'required',
            'deskripsi' => 'required',
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
            }elseif ($errors->has('tanggal_selesai')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('tanggal_selesai'),
                ]);
            }
        }
        $barangCampaign = new BarangCampaign;
        $barangCampaign->user_id = $request->inisiator;
        $barangCampaign->judul = $request->judul;
        $file = request()->file('gambar')->store("barangCampaign");
        $barangCampaign->gambar = $file;
        $barangCampaign->deskripsi = $request->deskripsi;
        $barangCampaign->tanggal_selesai = $request->tanggal_selesai;
        $barangCampaign->status = "pengecekan";
        $barangCampaign->created_at = now();
        $barangCampaign->updated_at = now();
        $barangCampaign->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Campaign '. $request->judul . ' Tersimpan',
        ]);
    }

    public function show(BarangCampaign $barangCampaign)
    {
        $donator = PaketDonasi::where('campaign_barang_id',$barangCampaign->id)->orderBy('created_at','desc')->get();
        $allBarangCampaign = BarangCampaign::where('id','!=',$barangCampaign->id)->where('status','!=','pengecekan')->get();
        return view('pages.donatur.campaignBarang.show',compact('barangCampaign','allBarangCampaign','donator'));
    }

    public function edit(BarangCampaign $barangCampaign)
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
        return view('pages.admin.campaignBarang.input',['user' => $user, 'data'=> $barangCampaign]);
    }

    public function update(Request $request, BarangCampaign $barangCampaign)
    {
        $validator = Validator::make($request->all(), [
            'inisiator' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required',
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
            }elseif ($errors->has('tanggal_selesai')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('tanggal_selesai'),
                ]);
            }
        }

        $barangCampaign->user_id = $request->inisiator;
        if (request()->file('gambar')) {
            Storage::delete($barangCampaign->gambar);
            $file = request()->file('gambar')->store("barangCampaign");
            $barangCampaign->gambar = $file;
        }
        $barangCampaign->judul = $request->judul;
        $barangCampaign->status = $request->status;
        $barangCampaign->deskripsi = $request->deskripsi;
        $barangCampaign->tanggal_selesai = $request->tanggal_selesai;
        $barangCampaign->updated_at = now();
        $barangCampaign->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Campaign '. $barangCampaign->judul . ' Tersimpan',
        ]);
    }

    public function destroy(BarangCampaign $barangCampaign)
    {
        $barangCampaign->delete();
        Storage::delete($barangCampaign->gambar);
        return response()->json([
            'alert' => 'success',
            'message' => 'Campaign '. $barangCampaign->judul . ' Terhapus',
        ]);
    }
}
