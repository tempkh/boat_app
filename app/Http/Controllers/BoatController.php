<?php

namespace App\Http\Controllers;

use App\Boat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class BoatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $boatByPage = Config::get('boats.boat_by_page');

        $boats = Boat::latest()->paginate($boatByPage);
  
        return view('boats.index',compact('boats'))
            ->with('i', (request()->input('page', 1) - 1) * $boatByPage);
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('boats.create');
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
            'name' => 'required',
            'description' => 'required',
        ]);
  
        Boat::create($request->all());
   
        return redirect()->route('boats.index')
                        ->with('success','Boat created successfully.');
    }
   
    /**
     * Display the specified resource.
     *
     * @param  \App\Boat  $boat
     * @return \Illuminate\Http\Response
     */
    public function show(Boat $boat)
    {
        return view('boats.show',compact('boat'));
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Boat  $boat
     * @return \Illuminate\Http\Response
     */
    public function edit(Boat $boat)
    {
        return view('boats.edit',compact('boat'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Boat  $boat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Boat $boat)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
  
        $boat->update($request->all());
  
        return redirect()->route('boats.index')
                        ->with('success','Boat updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Boat  $boat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Boat $boat)
    {
        $boat->delete();
  
        return redirect()->route('boats.index')
                        ->with('success','Boat deleted successfully');
    }
}
