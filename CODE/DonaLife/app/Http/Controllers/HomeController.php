<?php

namespace App\Http\Controllers;

use App\Models\BarangCampaign;
use App\Models\UangCampaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $barangCampaign = BarangCampaign::where('status','!=','pengecekan')->paginate(5);
        $uangCampaign = UangCampaign::where('status','!=','pengecekan')->paginate(5); 
        return view('pages.donatur.home.home', compact('barangCampaign','uangCampaign'));
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
