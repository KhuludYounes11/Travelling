<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotel=Hotel::all();
        return view('hotel/index',['hotel' => $hotel]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $city=City::all();
        return view('hotel/create',['city'=>$city]);
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
            'city_id.exists'=>'city_id  not found',
        ];
        $validator=Validator::make($request->all(),[
            'name' => 'required',
            'phone' => 'required|unique:hotels,phone',
            'city_id' => 'required|exists:cities,id|integer',
        ],$message);
        if ($validator->fails()) {
            return( $validator->errors());
        }
        else
        {
            Hotel::create([
                'name' => $request->name,
                'city_id' => $request->city_id,
                'phone' => $request->phone
            ]);
            return redirect(route('hotel.index'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message=['id.exists' => 'id not exists'];
        $validator=Validator::make(['id' => $id],
        ['id' => 'required|integer|exists:hotels,id'],$message);
        if ($validator->fails())
        {
            return $validator->errors();
        }
        else
        {   
            $hotel=Hotel::find($id);
            return view('hotel/show',['hotel'=>$hotel]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $message=['id.exists' => 'id not exists'];
        $validator=Validator::make(['id' => $id],
        ['id' => 'required|integer|exists:hotels,id'],$message);
        if ($validator->fails())
        {
            return $validator->errors();
        }
        $hotel=Hotel::find($id);
        $city=City::all();
        return view('hotel/edit',[
            'hotel' => $hotel,
            'city'=>$city
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $hotel=Hotel::find($id);
        $message=[
            'city_id.exists'=>'city_id  not found',
        ];
          $validator=Validator::make($request->all(),
          [
            'name' => 'required',
            'phone' => ['required',Rule::unique('hotels','phone')->ignore($hotel->phone,'phone')],
            'city_id' => 'required|exists:cities,id|integer',
        ],$message);
           if($validator->fails())
           {
            return $validator->errors();
           }
           $data=[
            'name' => $request->name,
            'phone' => $request->phone,
            'city_id' => $request->city_id,
           ];
           $hotel->update($data);
           return redirect()->route('hotel.index');
    }
    public function search(Request $request)
    {
        if($request->table=='city')
        {
            $city=City::where('name',$request->search)->first();
            $hotel=$city->hotels;
            return view('hotel.search',['hotel'=>$hotel]);
        }
        else
        {
            $hotel=Hotel::where($request->table,$request->search)->get();
            return view('hotel.search',['hotel'=>$hotel]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message=['id.exists' => 'id not exists'];
        $validator=Validator::make(['id' => $id],
        ['id' => 'required|integer|exists:hotels,id'],$message);
        if ($validator->fails())
        {
            return $validator->errors();
        }
        Hotel::where('id',$id)->delete();
        return redirect()->back();
    }
}
