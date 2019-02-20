<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    //

    public function index()
    {
    	$users = User::all();
    	return view('users.index', compact('users'));
    }

    public function create()
    {
    	return view('users.create');
    }

    public function store(Request $request)
    {

    }

    public function show($id)
    {

    }

    public function edit($id)
    {
    	$user = User::find($id);
    	return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
    	$user = User::find($id);
    	$user->name = $request->get('name');
    	$user->email = $request->get('email');
    	$user->password = $request->get('password');
    	$user->save();

    	return redirect('/user')->with('success', 'Has been updated');
    }

    public function destroy($id)
    {

    }
}
