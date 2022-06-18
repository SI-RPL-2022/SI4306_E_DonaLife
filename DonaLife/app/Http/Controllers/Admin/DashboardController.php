<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BarangCampaign;
use App\Models\Paket;
use App\Models\UangCampaign;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('pages.admin.dashboard.main',compact('user','barangCampaign','uangCampaign','paket'));
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
