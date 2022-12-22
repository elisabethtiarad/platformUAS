<?php

namespace App\Http\Controllers;

use App\Models\pasien;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;


class PasienController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data = pasien::where('nama', 'LIKE', '%' . $request->search . '%')->paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        } else {
            $data = pasien::paginate(3);
            Session::put('halaman_url', request()->fullUrl());
        }
        return view('datapasien', compact('data'));
    }

    public function tambahPasien()
    {
        return view('tambahdata');
    }
    public function insertdata(Request $request)
    {

        //dd($request->all());
        pasien::create($request->all());
        if (Session('halaman_url')) {
            return Redirect(Session('halaman_url'))->with('success', 'Data Berhasil Di Tambahkan');
        }
        return redirect()->route('pasien')->with('success', 'Data Berhasil di Tambahkan');
    }
    public function tampilkandata($id)
    {
        $data = pasien::find($id);
        return view('tampildata', compact('data'));
    }

    public function updatedata(Request $request, $id)
    {
        $data = pasien::find($id);
        $data->update($request->all());
        if (Session('halaman_url')) {
            return Redirect(Session('halaman_url'))->with('success', 'Data Berhasil Di Edit');
        }
        return redirect()->route('pasien')->with('success', 'Data Berhasil Di Edit');
    }
    public function delete($id)
    {
        $data = pasien::find($id);
        $data->delete();
        if (Session('halaman_url')) {
            return Redirect(Session('halaman_url'))->with('success', 'Data Berhasil Di Hapus');
        }
        return redirect()->route('pasien')->with('success', 'Data Berhasil Di Hapus');
    }
}
