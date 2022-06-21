<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BarangCampaign;
use App\Models\Paket;
use App\Models\UangCampaign;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DashboardController extends Controller
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

    public function index()
    {
        $user = User::where('role','!=','admin')->count();
        $barangCampaign = BarangCampaign::count();
        $uangCampaign = UangCampaign::count();
        $paket = Paket::count();
        $data = UangCampaign::select('id','created_at')->get()->groupBy(function($data){
            return Carbon::parse($data->created_at)->format('M');
        });

        $months = [];
        $monthcount = [];
        foreach($data as $month => $values){
            $months[]=$month;
            $monthcount[]=count($values);
        }
        $data2 = BarangCampaign::select('id','created_at')->get()->groupBy(function($data2){
            return Carbon::parse($data2->created_at)->format('M');
        });

        $months2 = [];
        $monthcount2 = [];
        foreach($data2 as $month2 => $values2){
            $months2[]=$month2;
            $monthcount2[]=count($values2);
        }

        $data3 = User::select('id','created_at')->get()->groupBy(function($data3){
            return Carbon::parse($data3->created_at)->format('M');
        });

        $months3 = [];
        $monthcount3 = [];
        foreach($data3 as $month3 => $values3){
            $months3[]=$month3;
            $monthcount3[]=count($values3);
        }
        return view('pages.admin.dashboard.main',['data'=>$data, 'data2'=> $data2, 'data3'=> $data3,'months'=>json_encode($months),'months2'=>json_encode($months2),'months3'=>json_encode($months3),'monthcount'=>json_encode($monthcount),'monthcount2'=>json_encode($monthcount2),'monthcount3'=>json_encode($monthcount3)],compact('user','barangCampaign','uangCampaign','paket'));
    }

    public function user(Request $request)
    {
        if ($request->ajax()) {
            $keywords = $request->keywords;
            $collection = User::where('role', '!=','admin')->where('nama','like','%'.$keywords.'%')->paginate(10);
            return view('pages.admin.user.list', compact('collection'));
        }   
        return view('pages.admin.user.main');
    }
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
