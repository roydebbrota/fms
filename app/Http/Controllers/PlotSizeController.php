<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PlotSize;

class PlotSizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allPlotsize = Plotsize::all();
       return view('dashboard.plotsize.create-plotsize',compact('allPlotsize'));
         
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'plot_size' => 'required|unique:plot_sizes,name|max:255',
            ],
            [
                'plot_size.required'=>'Plot Size Required',
            ]);
        $new_Plot_size = new PlotSize;
        $new_Plot_size->name = $request->plot_size;
        $new_Plot_size->save();
        return back()->with('message','Plot Size Add Successfuly');   
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
        //
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
        $validatedData = $request->validate(
            [
                'eplot_size' => 'required|unique:plot_sizes,name|max:255',
            ],
            [
                'eplot_size.required'=>'Plot Size Required',
            ]);
        $new_Plot_size = PlotSize::find($id);
        $new_Plot_size->name = $request->eplot_size;
        $new_Plot_size->update();
        return back()->with('message','Plot Size Update Successfuly');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $nameById = PlotSize::find($id);
       $nameById->delete();
       return back()->with('message','Plot Size Delete Successfuly');
    }
}
