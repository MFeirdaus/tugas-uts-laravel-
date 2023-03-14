<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MahasantriController;
use App\Http\Controllers\PegawaiController;



// ============================================

use App\Http\Controllers\PengarangController; 
use App\Http\Controllers\PenerbitController; 
use App\Http\Controllers\KategoriController; 
use App\Http\Controllers\BukuController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//route salam
Route::get('/salam',function(){
    return "Assalammu'alaikum Selamat Pagi Dunia";
});

// route dengan parameter
Route::get('/pegawai/{nama}/{divisi}', function ($nama,$divisi){
    return "Nama Pegawai : ".$nama."<br/>Departemen : ".$divisi;
});

//route dengan redirect page views
Route::get('/kabar',function(){
    return view ('kondisi');
});

//Route /mahasantri
Route::get('/mahasantri',[MahasantriController::class, 'dataMahasantri']
);


//Route Hello
Route::get('/hello',function(){
    return view('hello',['name' => 'Inaya']);
});


//Route Nilai
Route::get('/nilai', function () {
    return view('nilai');
});
    

//Tambahkan route baru di routes/web.php
Route::get('/daftarnilai', function () {
    return view('latihan.daftar_nilai');
});

//Tambahkan route baru di routes/web.php
Route::get('/phpframework', function (){ 
    return view('layouts.index');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



//Tambahkan route baru di routes/web.php
Route::resource('pegawai', PegawaiController::class);


//Tambahkan route baru di routes/web.php
// Route::get('/pegawai',[PegawaiController::class, 'index']);

//Tambahkan route baru di routes/web.php
Route::resource('pegawai', PegawaiController::class);


// ==================================================================================
//perpustakaan


Route::resource('pengarang', PengarangController::class); 
Route::resource('penerbit', PenerbitController::class); 
Route::resource('kategori', KategoriController::class); 
Route::resource('buku', BukuController::class);

// MAHASANTRI
Route::get('/jurusan', [MahasantriController::class, 'jurusan']);
Route::get('/mahasantri', [MahasantriController::class, 'index']);
Route::resource('mahasantri', MahasantriController::class);