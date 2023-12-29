<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers= Customer::all();
       
        return view('customer.index',['customers'=>$customers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message=[
            'gender.in'=>'must choose male or fmale ',
           ];
          $validator=Validator::make($request->all(),
          [
            'name' => 'required|alpha',
            'gender' => 'required|in:male,fmale',
            'phone' => 'required|min:10|regex:/^([0-9\s\-\+\(\)]*)$/',
            'email' => 'required|string|email',$message]);
           if($validator->fails())
           {
            return $validator->errors();
           }
            Customer::create($request->all());
            return redirect()->route('customer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message=['id.exists' => 'id not exists'];
        $validator=Validator::make(['id' => $id],
        ['id' => 'required|integer|exists:customers,id'],$message);
        if ($validator->fails())
        {
            return $validator->errors();
        }
        $customer=Customer::where('id',$id)->get();
       // $info=Customer::with('bookings','ratings');
        return view('customer.show',['customer'=>$customer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $message=['id.exists' => 'id not exists'];
        $validator=Validator::make(['id' => $id],
        ['id' => 'required|integer|exists:customers,id'],$message);
        if ($validator->fails())
        {
            return $validator->errors();
        }
        $customer=Customer::where('id',$id)->get();
        return view('customer.edit',['customer'=>$customer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $customer =Customer::find($id);
        //dd($customer->phone);
        $message=[
            'gender.in'=>'choose male or fmale ',
               ];
          
             $validator=Validator::make($request->all(),
              [
                'name' => 'required|alpha',
                'gender' => 'required|in:male,fmale',
                'phone' => ['required',Rule::unique('customers','phone')->ignore($customer->phone,'phone'),'min:10','regex:/^([0-9\s\-\+\(\)]*)$/'],
                'email' => ['required',Rule::unique('customers','email')->ignore($customer->email,'email'),'email'],
                 $message]);
               if($validator->fails())
               {
                return $validator->errors();
               }
               $data=[
                'name' =>$request->name,
                'gender' =>$request->gender,
                'phone' => $request->phone,
                'email' => $request->email,
               ];
               $customer->update($data);
             return redirect()->route('customer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $validator=Validator::make(['id'=>$id],
        ['id'=>'required|integer|exists:customers,id']);
        if($validator->fails())
         { return $validator->errors();}
  
         User::where('id',$id)->delete();
         return redirect()->route('customer.index');
    }
    public function search(Request $request)
    {
        $search=$request->search;
        $customers=Customer::where(function($query) use ($search)
        {
            $query->where('name','like',"%$search%")
            ->orwhere('phone','like',"%$search%")
            ->orwhere('gender','like',"%$search%");})->get();
            return view('customer.index',['customers'=>$customers,'search']);
            
           }
}
