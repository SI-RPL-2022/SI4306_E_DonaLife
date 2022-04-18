<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BarangCampaign;
use App\Models\Paket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PaketController extends Controller
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
  
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $keywords = $request->keywords;
            $collection = Paket::where('nama_paket','like','%'.$keywords.'%')->paginate(10);
            return view('pages.admin.paket.list',compact('collection'));
        }   
        return view('pages.admin.paket.main');
    }


    public function create()
    {
        $campaign = BarangCampaign::get();
        return view('pages.admin.paket.input', ['data' => new Paket,'campaign' => $campaign]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_paket' => 'required',
            'deskripsi' => 'required',
            'campaign' => 'required',
            'paket_foto' => 'required',
            'qty' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('nama_paket')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nama_paket'),
                ]);
            }elseif ($errors->has('deskripsi')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('deskripsi'),
                ]);
            }
            elseif ($errors->has('campaign')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('campaign'),
                ]);
            }elseif ($errors->has('qty')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('qty'),
                ]);
            }elseif ($errors->has('paket_foto')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('paket_foto'),
                ]);
            }
        }

        $paket = new Paket;
        $paket->nama_paket = $request->nama_paket;
        $paket->qty = $request->qty;
        $paket->campaign_id = $request->campaign;
        $file = request()->file('paket_foto')->store("paket");
        $paket->paket_foto = $file;
        $paket->deskripsi = nl2br($request->deskripsi);
        $paket->created_at = now();
        $paket->updated_at = now();
        $paket->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Paket '. $request->nama_paket . ' tersimpan',
        ]);
    }


    public function show(Paket $paket)
    {
        //
    }


    public function edit(Paket $paket)
    {
        $campaign = BarangCampaign::get();
        return view('pages.admin.paket.input', ['data' => $paket, 'campaign' => $campaign]);
    }

  
    public function update(Request $request, Paket $paket)
    {
        $validator = Validator::make($request->all(), [
            'nama_paket' => 'required',
            'deskripsi' => 'required',
            'campaign' => 'required',
            'qty' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('nama_paket')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nama_paket'),
                ]);
            }elseif ($errors->has('deskripsi')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('deskripsi'),
                ]);
            }
            elseif ($errors->has('campaign')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('campaign'),
                ]);
            }elseif ($errors->has('qty')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('qty'),
                ]);
            }
        }
        $paket->nama_paket = $request->nama_paket;
        $paket->qty = $request->qty;
        $paket->campaign_id = $request->campaign;
        if (request()->file('paket_foto')) {
            Storage::delete($paket->paket_foto);
            $file = request()->file('paket_foto')->store("paket");
            $paket->paket_foto = $file;
        }
        $paket->deskripsi = nl2br($request->deskripsi);
        $paket->updated_at = now();
        $paket->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Paket '. $request->nama_paket . ' tersimpan',
        ]);
    }

    public function destroy(Paket $paket)
    {
        $paket->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Paket terhapus',
        ]);
    }
}
