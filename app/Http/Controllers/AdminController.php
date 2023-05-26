<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Barang;
use Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if($request->has('search')){
            $data = Barang::where('nama','LIKE','%' .$request->search.'%')->paginate(5);
        }
        else{
    	   $data = Barang::paginate(5);
        }
    	return view('admin/pegawai/datapegawai',compact('data'));
        
    }

    public function tambahpegawai()
    {
    	return view('admin/pegawai/tambahdata');
    }

    public function insertdata(Request $request)
    {
    	//dd($request->all());
    	$data = Barang::create($request->all());
    	if($request->hasFile('foto')){
    		$request->file('foto')->move('fotopegawai/', $request->file('foto')->getClientOriginalName());
    		$data->foto = $request->file('foto')->getClientOriginalName();
    		$data->save();
    	}
    	return redirect()->route('admin')->with('success','Data Berhasil Di Tambahkan');
    }

    public function tampilkandata($id)
    {
    	$data = Barang::find($id);
    	return view('admin/pegawai/tampildata', compact('data'));
    }

    public function updatedata(Request $request, $id)
    {
    	$data = Barang::find($id);
    	$data->update($request->all());
    	return redirect()->route('admin')->with('success','Data Berhasil Di Update');
    }

    public function delete($id)
    {
    	$data = Barang::find($id);
    	$data->delete();
    	return redirect()->route('admin')->with('success','Data Berhasil Di Hapus');
    }

}
