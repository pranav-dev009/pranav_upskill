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
        $saved = $item->save();
        if(!$saved) {
            return redirect()->route('items.index')->with('failure', 'Item could not be added');    
        }
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
        $saved = $item->save();
        if(!$saved) {
            return redirect()->route('items.index')->with('updatefailure', 'Item could not be updated');    
        }
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
        $deleted = $delete->delete();
        if(!$deleted) {
            return redirect()->back()->with('deletefailure', 'Item could not be deleted');    
        }
        return redirect()->back()->with('delete', 'Item has been deleted successfully');
    }

    /**
     * get all deleted items
     *
     * @return response()
     */
    public function retrive() {
        $items = Items::onlyTrashed()->get();
        return view('items.trash', ['items' => $items]);
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
        return redirect()->route('items.index')->with('itemrestoreall', 'All the deleted items have been restored succesfully');
    }

    public function createAPI(Item $request) {
        $validatedData = $request->validated();
        $item = new Items();
        $item->name =$request->get('name');
        $item->quantity = $request->get('quantity');
        $item->rate = $request->get('rate');
        $saved = $item->save();
        if(!$saved) {
            return ['Failure' => 'Item could not be added'];    
        }
        return ['Success' => 'Item has been added successfully'];
    }

    public function deleteAPI(Request $request) {
        $id = $request->get('id');
        try {
            $delete = Items::findOrFail($id);
        } catch(ModelNotFoundException $exeption) {
            return ['Failure' => 'Item doesn\'t exists'];
        }
        $deleted = $delete->delete();
        if(!$deleted) {
            return ['Failure' => 'Item could not be deleted'];    
        }
        return ['Success' => 'Item has been deleted successfully'];
    }

    public function updateAPI(Item $request) {
        $validatedData = $request->validated();
        try {
            $item = Items::findOrFail($request->get('id'));
        } catch(ModelNotFoundException $exeption) {
            return ['Failure' => 'Item doesn\'t exists'];
        }
        $item->name = $request->get('name');
        $item->quantity = $request->get('quantity');
        $item->rate = $request->get('rate');
        $saved = $item->save();
        if(!$saved) {
            return ['Failure' => 'Item could not be updated'];    
        }
        return ['Success' => 'Item has been updated successfully'];
    }

    public function readAPI(Request $request) {
        if($request->has('id')) {
            $id = $request->get('id');
            try {
                $items = Items::findOrFail($id);
            } catch(ModelNotFoundException $exeption) {
                return ['Failure' => 'Item doesn\'t exists'];
            }
        }
        else {
            $items = Items::all();
        }
        return ['Success' => $items];
    }
}