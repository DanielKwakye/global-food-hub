<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function rank($id){
        $data = [
            'rank' => $id
        ];
        return view('admin.rank')->with($data);
    }

    public function clients(){
        return view('admin.clients');
    }

    public function search(Request $request){
        return view('admin.search');
    }
}
