<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserDeactivationController extends Controller
{
    public function edit($id){

        $userPost = User::findOrFail($id);

        $userPost->is_deleted ='YES';
        $userPost->save();

        return redirect('/user');

    }
}
