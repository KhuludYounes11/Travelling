<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Hotel;
use App\Models\Customer;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings= Booking::all();
        return view('booking.index',['bookings'=>$bookings]);
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
        $tickets= Ticket::all();
      
        return view('booking.create',['hotels'=>$hotels,'customers'=>$customers,'tickets'=>$tickets]);
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
            'ticket_id.exists'=>'ticket_id  not found',
            'hotel_id.exists'=>'hotel_id not found ',
            'customer_id.exists'=>'customer_id not found ',
        ];
          $validator=Validator::make($request->all(),
          [
            'date' => 'required|date',
            'ticket_id' =>'required|integer|exists:tickets,id',
            'hotel_id' =>'required|integer|exists:hotels,id',
            'customer_id' =>'required|integer|exists:customers,id'],$message);
           if($validator->fails())
           {
            return $validator->errors();
           }
           Booking::create($request->all());
            return redirect()->route('booking.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message=['id.exists' => 'id not exists'];
        $validator=Validator::make(['id' => $id],
        ['id' => 'required|integer|exists:bookings,id'],$message);
        if ($validator->fails())
        {
            return $validator->errors();
        }
        $booking=Booking::where('id',$id)->get();
        return view('booking.show',['booking'=>$booking]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $message=['id.exists' => 'id not exists'];
        $validator=Validator::make(['id' => $id],
        ['id' => 'required|integer|exists:bookings,id'],$message);
        if ($validator->fails())
        {
            return $validator->errors();
        }
        $hotels= Hotel::all(); 
        $customers= Customer::all();
        $tickets= Ticket::all();
        $booking=Booking::where('id',$id)->get();
        return view('booking.edit',['booking'=>$booking,'hotels'=>$hotels,'customers'=>$customers,'tickets'=>$tickets]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $message=[
            'ticket_id.exists'=>'ticket_id  not found',
            'hotel_id.exists'=>'hotel_id not found ',
            'customer_id.exists'=>'customer_id not found ',
        ];
          $validator=Validator::make($request->all(),
          [
            'date' => 'required|date',
            'ticket_id' =>'required|integer|exists:tickets,id',
            'hotel_id' =>'required|integer|exists:hotels,id',
            'customer_id' =>'required|integer|exists:customers,id'],$message);
           if($validator->fails())
           {
            return $validator->errors();
           }
           $data=[
            'date' => $request->date,
            'hotel_id' => $request->hotel_id,
            'customer_id' => $request->customer_id,
            'ticket_id' => $request->ticket_id,
           ];
           Booking::where('id',$id)->update($data);
           return redirect()->route('booking.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message=['id.exists' => 'id not exists'];
        $validator=Validator::make(['id' => $id],
        ['id' => 'required|integer|exists:bookings,id'],$message);
        if ($validator->fails())
        {
            return $validator->errors();
        }
        Booking::where('id',$id)->delete();
        return redirect()->back();
    }
    public function search(Request $request)
    {
       $search=$request->search;
       $bookings=Booking::where(function($query) use ($search)
       {
        $query->where('ticket_id','like',"%$search%");})
        ->orwhereHas('customer',function($query) use ($search){
            $query->where('name','like',"%$search%");
        })
        ->orwhereHas('hotel',function($query) use ($search){
            $query->where('name','like',"%$search%");
        })->get();
        return view('booking.index',['bookings'=>$bookings]);
        
       }

    
    }