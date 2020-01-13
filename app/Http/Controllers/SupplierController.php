<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Supplier;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $suppliers = Supplier::orderBy('id_supplier', 'DESC')->get();
        return view('gudang.supplier.index', ['suppliers'=>$suppliers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

      return view('gudang.supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        
      $suppliers = new Supplier;
      $suppliers->id_supplier     = $request->id_supplier;
      $suppliers->nama_supplier   = $request->nama_supplier;
      $suppliers->save();
      // dd('kesini');

      return redirect('supplier')->with('pesan', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id_supplier){

    //   return view('gudang.supplier.show', ['suppliers' => Supplier::findOrFail($id_supplier)]);
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_supplier){

      $suppliers = Supplier::findOrFail($id_supplier);
      return view('gudang/supplier/edit', compact('suppliers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_supplier){

      $suppliers = Supplier::find($id_supplier);
      $suppliers->nama_supplier   = $request->nama_supplier;
      $suppliers->save();
      return redirect('supplier')->with('pesan', 'Data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request){

      $suppliers = Supplier::find($request->id_supplier);
      $suppliers->delete();
      return back()->with('pesan', 'Data berhasil dihapus');
    }
}
