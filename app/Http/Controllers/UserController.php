<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {  
        $id=Auth::user()->id;
        $user=User::where('id',$id)->get();
        return view('user.show',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {  
         $id=Auth::user()->id;
         $user=User::where('id',$id)->get();
        return view('user.edituser',['user'=>$user]);
    }
    public function update(Request $request)
    {   
        $id=Auth::user()->id;
       $user = User::find($id);
        $validator=Validator::make($request->all(),
          [
            'name' => 'required|alpha',
            'password' => 'required|string|min:7',
            'email' => ['required',Rule::unique('users', 'email')->ignore($user->email, 'email')]]);
         if($validator->fails())
           {
            return $validator->errors();
           }
       $data=[
       'name'=> $request->name,
        'password' => $request->password,
       'email' =>$request->email ];
       
        User::where('id',$id)->update($data);
         return redirect()->route('home');
    }
  
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
}
