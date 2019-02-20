<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Share;

class ShareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shares = Share::all();
        return view('shares.index', compact('shares'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shares.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        	'title'=>'required',
        	'description'=>'required',
        	'photo'=>'required',
        	'price'=>'required|integer'
        ]);
        $share = new Share([
        	'title'=> $request->get('title'),
        	'description'=> $request->get('description'),
        	'photo'=> $request->get('photo'),
        	'price'=> $request->get('price')
        ]);
        $share->save();
        return redirect('/shares')->with('success', 'Stock has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $share = Share::find($id);
        return view('shares.edit', compact('share'));
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
        $request->validate([
        'title'=>'required',
        'description' => 'required',
        'photo' => 'required',
        'price' => 'required|integer',
      ]);

      $share = Share::find($id);
      $share->title = $request->get('title');
      $share->description = $request->get('description');
      $share->photo = $request->get('photo');
      $share->price = $request->get('price');
      $share->save();

      return redirect('/shares')->with('success', 'Stock has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $share = Share::find($id);
        $share->delete();
        return redirect('/shares')->with('success', 'Stock has been deleted Successfully');
    }
}
