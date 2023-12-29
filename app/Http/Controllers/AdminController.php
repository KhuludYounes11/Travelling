<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\User;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users= User::all();
        return view('user.index',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
     public function edit($id)
     {   
         $message=['id.exists'=>'id not found'];
         $validator=Validator::make(['id'=>$id],
         ['id'=>'required|integer|exists:users,id'],$message);
         if($validator->fails())
          { return $validator->errors();}
         $user=User::where('id',$id)->get();
         return view('user.edit',['user'=>$user]);
     }
 
     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     
     public function update(Request $request ,$id)
     { 
         $user =User::find($id);
 
         $validator=Validator::make($request->all(),
           [
             'name' => 'required|alpha',
             'password' => 'required|string|min:7',
             'email' => ['required',Rule::unique('users','email')->ignore($user->email,'email'),'email'],
             'role'=>'integer|min:0|max:1']);
            if($validator->fails())
            {
             return $validator->errors();
            }
         $data=[
         'name'=> $request->name,
         'password' => $request->password,
         'email' =>$request->email ,
         'role'=>$request->role];
          $user->update($data);
          return redirect()->route('user.index');
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $validator=Validator::make(['id'=>$id],
      ['id'=>'required|integer|exists:users,id']);
      if($validator->fails())
       { return $validator->errors();}

       User::where('id',$id)->delete();
       return redirect()->route('user.index');
    }

    public function search(Request $request)
    {
        $search=$request->search;
        $users=User::where(function($query) use ($search)
        {
            $query->where('name','like',"%$search%")
            ->orwhere('role','like',"%$search%");})->get();
            return view('user.index',['users'=>$users]);
            
           }
       }

