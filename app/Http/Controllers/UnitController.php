<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Unit;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $units = Unit::all(); 
        return view('gudang.unit.index', ['units'=>$units]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create(){
        
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        
        $this->validate($request, [
            'nama_unit' => 'required',
        ]);

        $units = new Unit;
        $units->id_unit   = $request->id_unit;
        $units->nama_unit = $request->nama_unit;
        $units->save();
        // dd('kesini');

        return redirect('unit')->with('pesan', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
        
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_unit){
        
        $units = Unit::find($id_unit);
        return view('gudang/unit/edit', compact('units'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_unit){

        $this->validate($request, [
            'nama_unit' => 'required',
        ]);

        $units = Unit::find($id_unit);
        $units->nama_unit = $request->nama_unit;
        $units->save();
        return redirect('unit')->with('pesan', 'Data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request){
        
        // dd($request->id_unit);
        $units = Unit::find($request->id_unit);
        $units->delete();
        return back()->with('pesan', 'Data berhasil dihapus');
    }
}
