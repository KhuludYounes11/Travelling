<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Company;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ticket=Ticket::all();
        return view('ticket/index',['ticket'=>$ticket]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company=Company::all();
        $city=City::all();
        return view('ticket/create',['company'=>$company, 'city'=>$city]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* dd($request->all()); */
        $message=[
            'city_id.exists'=>'city_id  not found',
            'country_id.exists'=>'country_id  not found'
        ];
        $validate=Validator::make($request->all(),[
             'company_id'=> 'required|exists:companies,id|integer',
            'city_id' => 'required|exists:cities,id|integer',
            'date_e' => 'required|date',
            'date_s' => 'required|date',
        ],$message);
        if ($validate->fails()) {
            return( $validate->errors());
        }
        else
        {
            Ticket::create([
                'company_id' => $request->company_id,
                'city_id' => $request->city_id,
                'date_s' => $request->date_s,
                'date_e' => $request->date_e,
            ]);
            return redirect()->route('ticket.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message=['id.exists' => 'id not exists'];
        $validator=Validator::make(['id' => $id],
        ['id' => 'required|integer|exists:tickets,id'],$message);
        if ($validator->fails())
        {
            return $validator->errors();
        }
        $ticket=Ticket::find($id);
        return view('ticket.show',['ticket' => $ticket]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $message=['id.exists' => 'id not exists'];
        $validator=Validator::make(['id' => $id],
        ['id' => 'required|integer|exists:tickets,id'],$message);
        if ($validator->fails())
        {
            return $validator->errors();
        }
        $ticket=Ticket::find($id);
        $company=Company::all();
        $city=City::all();
        return view('ticket/edit',[
            'ticket' => $ticket,
            'company' => $company,
            'city' => $city
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $message=[
            'city_id.exists'=>'city_id  not found',
            'country_id.exists'=>'country_id  not found',
        ];
        $validatoruser=Validator::make($request->all(),[
            'company_id'=>'required|exists:companies,id'|'integer',
            'city_id' => 'required|exists:cities,id|integer',
            'date_s' => 'required|date',
            'date_e ' => 'required|date',
        ],$message);
        if ($validatoruser->fails()) {
            return( $validatoruser->errors());
        }
        else
        {
            $date=[
                'company_id' => $request->company_id,
                'city_id' => $request->city_id,
                'date_s' => $request->date_s,
                'date_e' => $request->date_e,
            ];
            $ticket=Ticket::find($id);
            $ticket->update($date);
            return redirect()->route('ticket.index');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
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
        Ticket::where('id',$id)->delete();
        return redirect()->back();

    }
}
