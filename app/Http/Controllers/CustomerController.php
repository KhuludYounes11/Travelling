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
        //
        $customers = Customer::all();

        return view('customer/index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('customer/create');
       

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
        $message = [
            'name.required' => 'name is required',
            'phone.required' => 'phone is required',
            'phone.unique' => 'phone is already exists',
            'email.required' => 'email is required',
            'email.unique' => 'email is already exists',
            'gender.required' => 'gender is required',
        ];

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            //'phone' => 'required|unique:customers,phone',
            'phone' => 'required|min:10|regex:/^([0-9\s\-\+\(\)]*)$/,phone',

            'email' => ['required', 'string', 'email', Rule::unique('customers,email')],
            'gender' => 'required|string|in:male,female',
        ], $message);

   

        if ($validator->fails()) {
            return $validator->errors();       
         }
       

        $customer = Customer::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'gender' => $request->gender,
        ]);

        return redirect()->route('customer/show');
    }

    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        //
  

        $message = ['id.exists' => 'id not exists'];
        $validator = Validator::make(
            ['id' => $id],
            ['id' => 'required|integer|exists:customers,id'],
            $message
        );

        
        if ($validator->fails()) {
            return $validator->errors();
        }

        $customer = Customer::findOrFail($id);
        //$customer=Customer::where('id',$id)->get();

        return view('customer/show', ['customer' => $customer]);
    }
  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */


    public function edit($id)
{
    $message = ['id.exists' => 'id not exists'];
    $validator = Validator::make(
        ['id' => $id],
        ['id' => 'required|integer|exists:customers,id'],
        $message
    );

    if ($validator->fails()) {
        return $validator->errors();
    }

    $customer = Customer::find($id);


    return view('customer/edit', [
        'customer' => $customer
  
    ]);
}


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $customer = Customer::find($id);

        $message = [
            'name.required' => 'name is required',
            'phone.required' => 'phone is required',
            'gender.required' => 'gender is required',
            'email.required' => 'email is required',
            'phone.unique' => 'phone is already exists',
            'email.unique' => 'email is already exists',
        ];
        
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|max:255',
                'phone' => ['required', Rule::unique('customers', 'phone')->ignore($customer->phone, 'phone')],
                'gender' => 'required|string|in:male,female',
                'email' => ['required', 'string', 'email', Rule::unique('customers', 'email')->ignore($customer->email, 'email')],
            ],
            $message
        );

        if ($validator->fails()) {
            return $validator->errors();
        }
        
        $data = [
            'name' => $request->name,
            'phone' => $request->phone,
            'gender' => $request->gender,
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
    public function destroy($id)
    {
        //
        $message = [
            'id.exists' => 'id not exists',
        ];
        
        $validator = Validator::make(
            ['id' => $id],
            ['id' => 'required|integer|exists:customers,id'],
            $message
        );

         
       
        Customer::where('id', $id)->delete();
        return redirect()->back();

        
    }

    public function search(Request $request)
    {
        $search=$request->search;
        $customers=Customer::where(function($query) use ($search)
        {
            $query->where('name','like',"%$search%")
            ->orwhere('phone','like',"%$search%")
            ->orwhere('gender','like',"%$search%");})->get();
            return view('customer/index',['customers'=>$customers,'search']);
            
           }
}

