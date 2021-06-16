<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserPost;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class UserPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('is_deleted', 'NO')
                      ->where('id', "!=", Auth::user()->id)->get();
        // dd($activeUser);
        return view('admin.user.index', ['users'=> $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserPost $request)
    {
        $request->validated();

        $addUser = new User();

        $addUser->first_name=$request->input('first_name');
        $addUser->last_name=$request->input('last_name');
        $addUser->name=$request->input('name');
        $addUser->email=$request->input('email');
        $addUser->company_name=$request->input('company_name');
        $addUser->phone_number=$request->input('phone_number');
        $addUser->address=$request->input('address');
        $addUser->tax_reg_no=$request->input('tax_reg_no');
        $addUser->bank_account_type=$request->input('bank_account_type');
        $addUser->web_site=$request->input('web_site');
        if ($request->role_id == 2) {
          $addUser->is_admin="NO";
        }elseif ($request->role_id == 1) {
          $addUser->is_admin="YES";
        }
        $addUser->is_active="YES";
        $addUser->created_by = Auth::user()->id;
        $addUser->password= Hash::make($request['password']);


        $addUser->save();
        $addUser->attachRole($request->role_id);

        return redirect('/user');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        if ($user->created_by == NULL) {
          $created_byname= NULL;

        }
        elseif ($user->created_by != NULL) {
          $created_by = User::findOrFail($user->created_by);
          $created_byname= $created_by->name;

        }


        if ($user->modified_by == NULL) {
          $modified_byname = NULL;
          $modified_at = NULL;
        }
        elseif ($user->modified_by != NULL) {
          $modified_by = User::where('id',$user->modified_by)->get();
          $modified_byname =$modified_by->name;
          $modified_atSTR = $user->updated_at;
          $modified_at =  Carbon::parse($modified_atSTR)->format('M d,Y ,h:i A');
        }
      //   dd($user->modified_by);

        //dd($modified_by);
        //dd($user->id,$created_by->id,$modified_by->id);
        return view('admin.user.show',['users'=> $user,'created_by'=>$created_byname,'modified_by'=>$modified_byname,'modified_at'=>$modified_at]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userPost = User::findOrFail($id);

      // dd($userPost);
        return view('admin.user.edit',['userPost'=>$userPost]);
      //  return view('admin.user.edit',['userPost'=>$userPost]);
      //  redirect(route('user.update', $userPost->id));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $userPost = User::findOrFail($id);

        $request->validate([

            'first_name' =>'required|string',
            'last_name' =>'required|string',
            'name' =>'required|string',
            'company_name' =>'required|string',
            'phone_number' =>'required|numeric',
            'address' =>'required|string',
            'bank_account_type' =>'required|string',
            'web_site' =>'required',
            'tax_reg_no' =>'required|numeric',
            'is_admin' =>'required',
            'is_active' =>'required',
           'email' => 'required|string|max:255|email|unique:users,email,'.$userPost->id

        ]);

        //dd($request->all());

        $userPost->first_name=$request->input('first_name');
        $userPost->last_name=$request->input('last_name');
        $userPost->name=$request->input('name');
        $userPost->email=$request->input('email');
        $userPost->company_name=$request->input('company_name');
        $userPost->phone_number=$request->input('phone_number');
        $userPost->address=$request->input('address');
        $userPost->bank_account_type=$request->input('bank_account_type');
        $userPost->web_site=$request->input('web_site');
        $userPost->tax_reg_no=$request->input('tax_reg_no');
        $userPost->is_admin=$request->input('is_admin');
        $userPost->modified_by=Auth::user()->id;
        $userPost->updated_at = Carbon::now();
//updating role of user
        if ($userPost->is_admin == "YES") {

          if ($userPost->hasRole('admin') == true) {
            $userPost->detachRole('admin');
          }elseif ($userPost->hasRole('user') == true) {
            $userPost->detachRole('user');
          }
          $userPost->attachRole('admin');
        }elseif ($userPost->is_admin == "NO") {
          if ($userPost->hasRole('admin') == true) {
            $userPost->detachRole('admin');
          }elseif ($userPost->hasRole('user') == true) {
            $userPost->detachRole('user');
          }
          $userPost->attachRole('user');
        }
        $userPost->is_active=$request->input('is_active');
        //$userPost->secret= Hash::make($request['secret']);

        $userPost->save();

        return redirect(route('user.show',$userPost->id));
      //  return redirect('/user');
    }

}
