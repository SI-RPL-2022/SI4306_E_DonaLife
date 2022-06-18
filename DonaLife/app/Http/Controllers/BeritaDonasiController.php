<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BeritaDonasiController extends Controller
{
    public function index()
    {
        return view('pages.donatur.beritaDonasi.index');
    }
}
