<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function list(Request $request)
    {
        $result = City::where('province_id','=',$request->param)->get();
        echo json_encode($result);
    }
    public function get_list(Request $request)
    {
        $result = City::where('province_id','=',$request->id_province)->get();
        $list = "<option>Pilih Kota</option>";
        foreach($result as $row){
            $list.="<option value='$row->id'>$row->name</option>";
        }
        echo $list;
    }
}
