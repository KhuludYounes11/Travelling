<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $city = City::all();
        return view('city.index', ['city' => $city]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('city.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|string',
            'country' => 'required|string',
        ]);
        if ($validate->fails()) {
            return ($validate->errors());
        } else {
            City::create([
                'name' => $request->name,
                'country' => $request->country,
            ]);
            return redirect()->route('city.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message = ['id.exists' => 'id not exists'];
        $validator = Validator::make(
            ['id' => $id],
            ['id' => 'required|integer|exists:cities,id'],
            $message
        );
        if ($validator->fails()) {
            return $validator->errors();
        }
        $city = City::find($id);
        return view('city.show', ['city' => $city]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $message = ['id.exists' => 'id not exists'];
        $validator = Validator::make(
            ['id' => $id],
            ['id' => 'required|integer|exists:cities,id'],
            $message
        );
        if ($validator->fails()) {
            return $validator->errors();
        } else {
            $city = City::find($id);
            return view('city/edit', ['city' => $city]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, City $city)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|string',
            'country' => 'required|string',
        ]);
        if ($validate->fails()) {
            return ($validate->errors());
        } else {
            $date = [
                'name' => $request->name,
                'country' => $request->country
            ];
            $city = City::find($id);
            $city->update($date);
            return redirect()->route('city.index');
        }
    }
    public function search(Request $request)
    {
        $search = $request->search;
        $city = City::where(function ($query) use ($search) {
            $query->where('name', 'like', "%$search%")
                ->orwhere('country', 'like', "%$search%");
        })->get();
        return view('city.index', ['city' => $city]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, City $city)
    {
        $message = ['id.exists' => 'id not exists'];
        $validator = Validator::make(
            ['id' => $id],
            ['id' => 'required|integer|exists:cities,id'],
            $message
        );
        if ($validator->fails()) {
            return $validator->errors();
        }
        City::where('id', $id)->delete();
        return redirect()->back();
    }
}
