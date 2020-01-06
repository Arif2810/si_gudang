<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Purchase;
use App\Product;

class PurchaseController extends Controller{

    public function index(){

        $purchases = Purchase::all()->where('status', '0');

        $products  = Product::all();
        $data = array(
            'products'   => $products,
        );
        return view('gudang.purchase.index', ['purchases'=>$purchases], $data);
    }


    public function store(Request $request){

        Purchase::create($request->all());
        return redirect('purchase')->with('pesan', 'Data berhasil ditambahkan');
    }


    public function destroy($id_purchase){

        $purchases = Purchase::find($id_purchase);
        $purchases->delete();
        return redirect('purchase')->with('pesan', 'pengambilan dibatalkan!');
    }


    public function update(){
        
        $purchases = Purchase::where('status', '0');
        $purchases->update(['status'=>'1']);
        return back()->with('pesan', 'Data dikirim ke laporan');
    }
    

    public function report(){

        
    }
}
