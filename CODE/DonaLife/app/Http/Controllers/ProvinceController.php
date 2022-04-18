<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Province;

class ProvinceController extends Controller
{
    public function list(Request $request)
    {
        $result = Province::get();
        echo json_encode($result);
    }
}
