<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Items::all();
        return view('items.list', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.create');
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
            'name'=>'required',
            'quantity'=> 'required',
            'rate' => 'required'
        ]);
 
        $item = new Items([
            'name' => $request->get('name'),
            'quantity'=> $request->get('quantity'),
            'rate'=> $request->get('rate')
        ]);
 
        $item->save();
        return redirect('/items')->with('success', 'Item has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Items::findOrFail($id);
        return view('items.view', ['item' => $item]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Items::find($id);
        return view('items.edit', ['item' => $item]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'quantity'=> 'required',
            'rate' => 'required'
        ]);
 
        $item = Items::find($id);
        $item->name = $request->name;
        $item->quantity = $request->quantity;
        $item->rate = $request->rate;
 
        $item->save();
 
        // return redirect('/items');
        return redirect()->route('items.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $delete = Items::find($id);
        $delete->delete();
        return redirect()->back();
    }    
}


