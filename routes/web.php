<?php

use App\Models\pasien;
use App\Models\Pegawai;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PegawaiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {

    $jumlahPasien = pasien::count();
    $jumlahPegawai = Pegawai::count();

    return view('welcome', compact('jumlahPasien', 'jumlahPegawai'));
})->middleware('auth');
//pasien
Route::get('/pasien', [PasienController::class, 'index'])->name('pasien')->middleware('auth');

Route::get('/tambahPasien', [PasienController::class, 'tambahPasien'])->name('tambahPasien')->middleware('auth');
Route::post('/insertdata', [PasienController::class, 'insertdata'])->name('insertdata')->middleware('auth');

Route::get('/tampilkandata/{id}', [PasienController::class, 'tampilkandata'])->name('tampilkandata')->middleware('auth');
Route::post('/updatedata/{id}', [PasienController::class, 'updatedata'])->name('updatedata')->middleware('auth');

Route::get('/delete/{id}', [PasienController::class, 'delete'])->name('delete')->middleware('auth');

//pegawai
Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai')->middleware('auth');

Route::get('/tambahPegawai', [PegawaiController::class, 'tambahPegawai'])->name('tambahPegawai')->middleware('auth');
Route::post('/insertdataPegawai', [PegawaiController::class, 'insertdataPegawai'])->name('insertdataPegawai')->middleware('auth');

Route::get('/tampilkandataPegawai/{id}', [PegawaiController::class, 'tampilkandataPegawai'])->name('tampilkandataPegawai')->middleware('auth');
Route::post('/updatedataPegawai/{id}', [PegawaiController::class, 'updatedataPegawai'])->name('updatedataPegawai')->middleware('auth');

Route::get('/deletePegawai/{id}', [PegawaiController::class, 'delete'])->name('delete')->middleware('auth');


Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/loginproses', [LoginController::class, 'loginproses'])->name('loginproses');

Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/registerUser', [LoginController::class, 'registerUser'])->name('registerUser');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');