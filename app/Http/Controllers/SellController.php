<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Sell;
use App\Employee;
use App\Product;

class SellController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $sells = Sell::all();
        $sells = DB::table('sells')
                        ->join('products', 'sells.id_produk', '=', 'products.id_produk')
                        ->join('employees', 'sells.id_karyawan', '=', 'employees.id_karyawan')
                        ->select('sells.*', 'products.*', 'employees.*')
                        ->where('status','=', '0')
                        ->get();

        $employees = Employee::all();
        $products  = Product::all();
        $data = array(
            'employees'  => $employees,
            'products'   => $products,
        );
        return view('gudang.sell.index', ['sells'=>$sells], $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        Sell::create($request->all());
        return redirect('sell')->with('pesan', 'Data berhasil ditambahkan');
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_sell){

        $sells = Sell::find($id_sell);
        $sells->delete();
        return redirect('sell')->with('pesan', 'pengambilan dibatalkan!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(){
        
        $sells = Sell::where('status', '0');
        $sells->update(['status'=>'1']);
        return back()->with('pesan', 'Data dikirim ke laporan');
    }
    

    public function report(){

        
    }
}
