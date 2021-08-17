<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Country::query()->get();
        return response($response);
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
    public function store(Request $request): \Illuminate\Http\Response
    {
//        dd($request->all());
        $item = new \App\Models\Country;
//        dd($item);
        $item->fill($request->all());
//        $item->name_fa=$request->name_fa;
//        $item->name_en=$request->name_en;
        $item->save();
        return response($item->toArray());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $item = \App\Models\Country::query()->findOrFail($id);
        return response($item);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $item = \App\Models\Country::query()->findOrFail($id);
        $item->fill($request->all());

        $item->save();
        return response($item->toArray());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $item = \App\Models\Country::query()->findOrFail($id);
//        dd($item);
        $item->delete();
        return response($item->toArray());
    }
}
