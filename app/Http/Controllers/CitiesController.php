<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Cities;
use DB;

class CitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = Cities::paginate(10);
        return view('panel.cities.index', ['cities' => $cities]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.cities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $city = new Cities;
            $city->cod = $request->get('cod');
            $city->name = $request->get('name');
            $city->save();

            return Redirect::to('cities')->withSuccess('City created successfully');
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            return Redirect::back()->withErrors($e->errorInfo[2]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $city = Cities::findOrFail($id);
        return view('panel.cities.show', ['city' => $city]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city = Cities::findOrFail($id);
        return view('panel.cities.edit', ['city' => $city]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $city = Cities::findOrFail($id);
            $city->cod = $request->get('cod');
            $city->name = $request->get('name');
            $city->update();

            return Redirect::to('cities')->withSuccess('City updated successfully');
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            return Redirect::back()->withErrors($e->errorInfo[2]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = Cities::findOrFail($id);
        $city->delete();

        return Redirect::to('cities')->withSuccess('City deleted successfully');
    }
}
