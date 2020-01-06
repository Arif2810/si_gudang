<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use App\Http\Requests;
use App\Product;
use App\Category;
use App\Unit;
use App\Supplier;
use File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id_produk', 'DESC')->get();
        return view('gudang.product.index', ['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $units = Unit::all();
        $suppliers = Supplier::all();

        return view('gudang.product.create', compact('categories', 'units', 'suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

      $this->validate($request, [
          'image' => 'required|image|mimes:jpg,jpeg,png,JPG,JPEG,PNG|max:2000',
      ]);

      $products = new Product;
      $products->id_produk   = $request->id_produk;
      $products->kode_produk = $request->kode_produk;
      $products->nama_produk = $request->nama_produk;
      $products->id_kategori = $request->id_kategori;
      $products->id_supplier = $request->id_supplier;
      $products->stok_produk = $request->stok_produk;
      $products->id_unit     = $request->id_unit;
      $products->lokasi      = $request->lokasi;
      $products->ket_produk  = $request->ket_produk;

      if($request->hasFile('image')){
        $file = $request->file('image');
        $fileName = time().'.'.$file->getClientOriginalExtension();
        $destinationPath = public_path('/image');
        $file->move($destinationPath, $fileName);
        $products->image = $fileName;
      }

      $products->save();
      // dd('kesini');

      return redirect('product')->with('pesan', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_produk)
    {
        $products = Product::findOrFail($id_produk);
        return view('gudang.product.show', ['products' => $products]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_produk)
    {
        $products = Product::findOrFail($id_produk);
        return view('gudang/product/edit', compact('products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_produk)
    {
        $products = Product::find($id_produk);
        $products->kode_produk = $request->kode_produk;
        $products->nama_produk = $request->nama_produk;
        $products->id_kategori = $request->id_kategori;
        $products->id_supplier = $request->id_supplier;
        $products->stok_produk = $request->stok_produk;
        $products->id_unit     = $request->id_unit;
        $products->lokasi      = $request->lokasi;
        $products->ket_produk  = $request->ket_produk;

        if($request->hasFile('image')){
            $file = $request->file('image');
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('/image');
            $file->move($destinationPath, $fileName);
            $products->image = $fileName;
        }

        $products->save();
        return redirect('product')->with('pesan', 'Data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      $products = Product::find($request->id_produk);
      File::delete('image/'.$products->image);
      $products->delete();

      return back()->with('pesan', 'Data berhasil dihapus');
    }
}
