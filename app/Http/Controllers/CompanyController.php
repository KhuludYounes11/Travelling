<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Company::all();
        return view('company/index', ['company' => $company]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company/create');
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
            'name' => 'required|string|notregex:/[0-9]/',
            'phone' => 'required|regex:/(0)[0-9]/|notregex:/[a-z]/|min:10|unique:hotels,phone',
        ]);
        if ($validate->fails()) {
            return ($validate->errors());
        } else {
            Company::create([
                'name' => $request->name,
                'phone' => $request->phone,
            ]);
            return redirect()->route('company.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show($id, Company $company)
    {
        $message = ['id.exists' => 'id not exists'];
        $validator = Validator::make(
            ['id' => $id],
            ['id' => 'required|integer|exists:companies,id'],
            $message
        );
        if ($validator->fails()) {
            return $validator->errors();
        } else {
            return view('company.show', ['company' => $company->find($id)]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Company $company)
    {
        $message = ['id.exists' => 'id not exists'];
        $validator = Validator::make(
            ['id' => $id],
            ['id' => 'required|integer|exists:companies,id'],
            $message
        );
        if ($validator->fails()) {
            return $validator->errors();
        } else {
            return view('company.edit', ['company' => $company->find($id)]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, Company $company)
    {
        $company = $company->find($id);
        $validate = Validator::make($request->all(), [
            'name' => 'required|string',
            'phone' => ['required', 'regex:/(0)[0-9]/', 'notregex:/[a-z]/', 'min:10', Rule::unique('companies', 'phone')->ignore($company->phone, 'phone')],
        ]);
        if ($validate->fails()) {
            return ($validate->errors());
        } else {
            $date = [
                'name' => $request->name,
                'phone' => $request->phone,
            ];
            $company->update($date);
            return redirect()->route('company.index');
        }
    }
    public function search(Request $request)
    {
        $search = $request->search;
        $company = Company::where(function ($query) use ($search) {
            $query->where('name', 'like', "%$search%")
                ->orwhere('phone', 'like', "%$search%");
        })->get();
        return view('company.index', ['company' => $company]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Company $company)
    {
        $message = ['id.exists' => 'id not exists'];
        $validator = Validator::make(
            ['id' => $id],
            ['id' => 'required|integer|exists:companies,id'],
            $message
        );
        if ($validator->fails()) {
            return $validator->errors();
        }
        $company->where('id', $id)->delete();
        return redirect()->back();
    }
}
