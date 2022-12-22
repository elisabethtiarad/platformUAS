<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PegawaiController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data = Pegawai::where('nama', 'LIKE', '%' . $request->search . '%')->paginate(3);
            Session::put('halaman_url', request()->fullUrl());
        } else {
            $data = Pegawai::paginate(3);
            Session::put('halaman_url', request()->fullUrl());
        }
        return view('datapegawai', compact('data'));
    }
    public function tambahPegawai()
    {
        return view('tambahdatapegawai');
    }
    public function insertdataPegawai(Request $request)
    {
        //dd($request->all());
        $data = Pegawai::create($request->all());
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('fotopegawai/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        if (Session('halaman_url')) {
            return Redirect(Session('halaman_url'))->with('success', 'Data Berhasil Di Tambahkan');
        }
        return redirect()->route('pegawai')->with('success', 'Data Berhasil di Tambahkan');
    }
    public function tampilkandataPegawai($id)
    {
        $data = Pegawai::find($id);
        return view('tampildataPegawai', compact('data'));
    }

    public function updatedataPegawai(Request $request, $id)
    {
        $data = Pegawai::find($id);
        $data->update($request->all());

        if ($request->hasFile('foto')) {
            $request->file('foto')->move('fotopegawai/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        if (Session('halaman_url')) {
            return Redirect(Session('halaman_url'))->with('success', 'Data Berhasil Di Edit');
        }
        return redirect()->route('pegawai')->with('success', 'Data Berhasil Di Edit');
    }
    public function delete($id)
    {
        $data = Pegawai::find($id);
        $data->delete();
        if (Session('halaman_url')) {
            return Redirect(Session('halaman_url'))->with('success', 'Data Berhasil Di Hapus');
        }
        return redirect()->route('pegawai')->with('success', 'Data Berhasil Di Hapus');
    }
}