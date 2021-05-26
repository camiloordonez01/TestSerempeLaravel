<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Clients;
use DB;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients =DB::table('client')->
                    join('cities', 'client.cities_id', '=', 'cities.id')->
                    select('client.*', 'cities.name as city')->get();
        $cities = DB::table('cities')->get();
        return view('panel.clients.index', ['clients' => $clients, 'cities' => $cities]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = DB::table('cities')->get();
        return view('panel.clients.create', ['cities' => $cities]);
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
            $client = new Clients;
            $client->cod = $request->get('cod');
            $client->name = $request->get('name');
            $client->cities_id = $request->get('cities_id');
            $client->save();

            return Redirect::to('clients')->withSuccess('Client created successfully');
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
        $client = Clients::findOrFail($id);
        $cities = DB::table('cities')->get();
        return view('panel.clients.show', ['client' => $client, 'cities' => $cities]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Clients::findOrFail($id);
        $cities = DB::table('cities')->get();
        return view('panel.clients.edit', ['client' => $client, 'cities' => $cities]);
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
            $client = Clients::findOrFail($id);
            $client->cod = $request->get('cod');
            $client->name = $request->get('name');
            $client->cities_id = $request->get('cities_id');
            $client->update();

            return Redirect::to('clients')->withSuccess('Client updated successfully');
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
        $client = Clients::findOrFail($id);
        $client->delete();

        return Redirect::to('clients')->withSuccess('Client deleted successfully');
    }
}
