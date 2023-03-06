<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Illuminate\Http\Request;
use App\Http\Requests\Item;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('trashed')) {
            $items = Items::onlyTrashed()->get();
        } else {
            $items = Items::all();
        }
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
    public function store(Item $request)
    {
        $validatedData = $request->validated();
        $item = new Items();
        $item->name =$request->get('name');
        $item->quantity = $request->get('quantity');
        $item->rate = $request->get('rate');
        $item->save();
        return redirect()->route('items.index')->with('success', 'Item has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        try {
            $item = Items::findOrFail($id);
        } catch(ModelNotFoundException $exception) {
            return redirect()->route('items.index')->with('missingitem', 'The item does not exists');
        }
        return view('items.view', ['item' => $item]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function edit($id = "")
    {
        //
        try {
            $item = Items::findOrFail($id);
        } catch(ModelNotFoundException $exeption) {
            return redirect()->route('items.index')->with('missingitem', 'The item does not exists');
        }
        return view('items.edit', ['item' => $item]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function update(Item $request, $id)
    { 
        //
        $validatedData = $request->validated();
        try {
            $item = Items::findOrFail($id);
        } catch(ModelNotFoundException $exeption) {
            return redirect()->route('items.index')->with('missingitem', 'The item does not exists');
        }
        $item->name = $request->name;
        $item->quantity = $request->quantity;
        $item->rate = $request->rate;
        $item->save();
        return redirect()->route('items.index')->with('update', 'Item has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function destroy($id = "")
    {
        //
        try {
            $delete = Items::findOrFail($id);
        } catch(ModelNotFoundException $exeption) {
            return redirect()->route('items.index')->with('missingitem', 'The item does not exists');
        }
        $delete->delete();
        return redirect()->back()->with('delete', 'Item has been deleted successfully');
    }

    /**
     * restore specific post
     *
     * @return void
     */
    public function restore($id)
    {
        Items::withTrashed()->find($id)->restore();
        return redirect()->back()->with('itemrestore', 'Item has been restored succesfully');
    }  
  
    /**
     * restore all post
     *
     * @return response()
     */
    public function restoreAll()
    {
        Items::onlyTrashed()->restore();
        return redirect()->back()->with('itemrestoreall', 'All the deleted items have been restored succesfully');;
    }
}