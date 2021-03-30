<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AllUser extends Controller
{
    public function alluser(){
        
        return view('admin.allUser');
    }
}
