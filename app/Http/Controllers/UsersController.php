<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\User;
use DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('panel.users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.users.create');
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
            $this->validate($request, [
                'password' => 'required|min:8',
            ]);
            $user = new User;
            $user->email = $request->get('email');
            $user->name = $request->get('name');
            $user->password = bcrypt($request->get('password'));
            $user->created_at = date("Y-m-d H:i:s");
            $user->updated_at = date("Y-m-d H:i:s");
            $user->save();

            return Redirect::to('users')->withSuccess('User created successfully');
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
        $user = User::findOrFail($id);
        return view('panel.users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('panel.users.edit', ['user' => $user]);
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
            $this->validate($request, [
                'password' => 'required|min:8',
            ]);
            $user = User::findOrFail($id);
            $user->email = $request->get('email');
            $user->name = $request->get('name');
            $user->password = bcrypt($request->get('password'));
            $user->updated_at = date("Y-m-d H:i:s");
            $user->update();

            return Redirect::to('users')->withSuccess('User updated successfully');
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
        $user = User::findOrFail($id);
        $user->delete();

        return Redirect::to('users')->withSuccess('User deleted successfully');
    }
}
