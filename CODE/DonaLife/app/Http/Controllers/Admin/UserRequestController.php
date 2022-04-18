<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserRequestController extends Controller
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
            $collection = UserRequest::where('judul','like','%'.$keywords.'%')->paginate(10);
            return view('pages.admin.userRequest.list',compact('collection'));
        }
        return view('pages.admin.userRequest.main');
    }

    public function dec(Request $request,UserRequest $userRequest)
    {
        $userRequest->status = 'decline';
        $userRequest->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Permintaan Berhasil Ditolak',
        ]);
    }

    public function acc(Request $request,UserRequest $userRequest)
    {
        $userRequest->status = 'accept';
        $userRequest->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Permintaan Berhasil Diterima',
        ]);
    }

    public function destroy(UserRequest $userRequest)
    {
        $userRequest->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Permintaan Berhasil Dihapus',
        ]);
    }
}
