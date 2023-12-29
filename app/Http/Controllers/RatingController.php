<?php

namespace App\Http\Controllers;
use App\Models\Rating;
use App\Models\Hotel;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ratings= Rating::all();
        return view('rating.index',['ratings'=>$ratings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hotels= Hotel::all(); 
        $customers= Customer::all();
        return view('rating.create',['hotels'=>$hotels],['customers'=>$customers]);
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
            'star'=>'the star must between 0,5',
            'hotel_id.exists'=>'hotel_id not found ',
            'customer_id.exists'=>'customer_id not found ',
        ];
          $validator=Validator::make($request->all(),
          [
            'comment' => 'required|alpha',
            'star' => 'required|integer|min:1|max:5',
            'hotel_id' =>'required|integer|exists:hotels,id',
            'customer_id' =>'required|integer|exists:customers,id'],$message);
           if($validator->fails())
           {
            return $validator->errors();
           }
            Rating::create($request->all());
            return redirect()->route('rating.index');
           
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { 
        $message=['id.exists' => 'id not exists'];
        $validator=Validator::make(['id' => $id],
        ['id' => 'required|integer|exists:ratings,id'],$message);
        if ($validator->fails())
        {
            return $validator->errors();
        }
        $rating=Rating::where('id',$id)->get();
        return view('rating.show',['rating'=>$rating]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $message=['id.exists' => 'id not exists'];
        $validator=Validator::make(['id' => $id],
        ['id' => 'required|integer|exists:ratings,id'],$message);
        if ($validator->fails())
        {
            return $validator->errors();
        }
        $hotels= Hotel::all(); 
        $customers= Customer::all();
        $rating=Rating::where('id',$id)->get();
        return view('rating.edit',['rating'=>$rating],['hotels'=>$hotels],['customers'=>$customers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $message=[
        'star'=>'the star must between 0,5',
        'hotel_id.exists'=>'hotel_id not found ',
        'customer_id.exists'=>'customer_id not found '];
      
         $validator=Validator::make($request->all(),
          [
            'comment' => 'required|alpha',
            'star' => 'required|integer|min:1|max:5',
            'hotel_id' =>'required|integer|exists:hotels,id',
            'customer_id' =>'required|integer|exists:customers,id'],$message);
           if($validator->fails())
           {
            return $validator->errors();
           }
           $data=[
            'comment' =>$request->name,
            'star' =>$request->star,
            'hotel_id' => $request->hotel_id,
            'customer_id' => $request->customer_id,
           ];
         Rating::where('id',$id)->update($data);
         return redirect()->route('rating.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message=['id.exists' => 'id not exists'];
        $validator=Validator::make(['id' => $id],
        ['id' => 'required|integer|exists:ratings,id'],$message);
        if ($validator->fails())
        {
            return $validator->errors();
        }
      Rating::where('id',$id)->delete();
      return redirect()->route('rating.index');
    }
    public function search(Request $request)
    {
       $search=$request->search;
       $ratings=Rating::where(function($query) use ($search)
       {
        $query->where('star','like',"%$search%");})
        ->orwhereHas('customer',function($query) use ($search){
            $query->where('name','like',"%$search%");
        })
        ->orwhereHas('hotel',function($query) use ($search){
            $query->where('name','like',"%$search%");
        })->get();
        return view('rating.index',['ratings'=>$ratings]);
        
       }
}
