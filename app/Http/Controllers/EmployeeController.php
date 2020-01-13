<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $employees = Employee::orderBy('id_karyawan', 'DESC')->get();
        return view('gudang.employee.index', ['employees'=>$employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

        return view('gudang.employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

      $employees = new Employee;
      $employees->id_karyawan   = $request->id_karyawan;
      $employees->sap         = $request->sap;
      $employees->nama_karyawan = $request->nama_karyawan;
      $employees->tgl_daftar  = $request->tgl_daftar;
      $employees->telp        = $request->telp;
      $employees->save();
      // dd('kesini');

      return redirect('employee')->with('pesan', 'Data berhasil ditambahkan');
  }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_karyawan){

        // dd($id_karyawan);
        // $employees = Employee::find($id_karyawan);
        return view('gudang.employee.show', ['employees' => Employee::findOrFail($id_karyawan)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_karyawan){

        // dd($id_karyawan);
        $employees = Employee::findOrFail($id_karyawan);
        return view('gudang/employee/edit', compact('employees'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_karyawan){

        // $this->validate($request, [
        //     'nip' => 'required',
        //     'nama_pasien' => 'required',
        //     'jk' => 'required',
        //     'tgl_lahir' => 'required',
        //     'tgl_daftar' => 'required',
        //     'agama' => 'required',
        //     'alamat' => 'required',
        // ]);

        $employees = Employee::find($id_karyawan);
        $employees->sap           = $request->sap;
        $employees->nama_karyawan = $request->nama_karyawan;
        $employees->tgl_daftar    = $request->tgl_daftar;
        $employees->telp          = $request->telp;
        $employees->save();
        return redirect('employee')->with('pesan', 'Data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request){

        $employees = Employee::find($request->id_karyawan);
        $employees->delete();
        return back()->with('pesan', 'Data berhasil dihapus');
    }
}
