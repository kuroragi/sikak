<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'MainController@index')->name('login')->middleware('guest');
Route::get('/loginuum', 'MainController@login')->name('login')->middleware('guest');
Route::get('/dashboard', 'MainController@dashboard')->middleware('auth');
Route::post('/login', 'MainController@authenticate')->middleware('guest');
Route::get('/logout', 'MainController@logout')->middleware('auth');

Route::middleware(['auth','hasrole:admin'])->group(function () {
    //Master Data
    Route::resource('/rpjmd', 'PerioderpjmdController');
    Route::resource('/periode', 'PeriodeController');
    Route::resource('/satuan', 'SatuanController');
    Route::resource('/kebe', 'KelompokbelanjaController');
    Route::resource('/kecamatan', 'KecamatanController');
    Route::resource('/kelurahan', 'KelurahanController');
    Route::resource('/lokasi', 'LokasiController');
    Route::resource('/role', 'RoleController');

    //Master Perencanaan
    Route::resource('/urusan', 'UrusanController');
    Route::resource('/bidurus', 'BidurusController');
    Route::resource('/progbid', 'ProgbidController');
    Route::resource('/kegprog', 'KegprogController');
    Route::resource('/subkeg', 'SubkegController');
    Route::resource('/indikator', 'IndikatorController');

    //Master Standar Harga
    Route::resource('/ssh', 'SshController');
    Route::get('/updatekebssh', 'SshController@updatekebssh');
    Route::resource('/sbu', 'SbuController');
    Route::get('/updatekebsbu', 'SbuController@updatekebssh');

    //Master Kegiatan
    Route::resource('/personil', 'PersonilController');
    Route::resource('/instrumen', 'InstrumenController');
    Route::resource('/datakeg', 'DatakegController');

    //SKPD
    Route::resource('/skpd', 'SKPDController');
    Route::resource('/pemekaran', 'PemekaranskpdController');
    
    Route::post('/imskpd', 'SKPDController@import');
});

Route::middleware(['auth', 'hasrole:admin||kaskpd'])->group(function () {
    Route::resource('/user', 'UserController');
    Route::resource('/subunit', 'SubUnitController');
    Route::post('/imsubunit', 'SubUnitController@import');
    Route::resource('/sksu', 'SksuController');
});

Route::middleware(['auth', 'hasrole:admin||kaskpd||askpd||pengampu'])->group(function () {
    Route::get('/changepassword', 'UserController@edit');
    Route::resource('/bidangskpd', 'BidangSkpdController');
    Route::resource('/subunit', 'SubUnitController');
    Route::resource('/sksu', 'SksuController');

    //KAK
    Route::get('/skpdprog', 'SKPDProgController@index');
    Route::get('/skpdprogp', 'SKPDProgController@indexprogbid');
    Route::get('/skpdprogk', 'SKPDProgController@indexkegprog');
    Route::get('/skpdprogs', 'SKPDProgController@indexsubkeg');
    Route::get('/skpdprogkak', 'SKPDProgController@indexkak');
    Route::get('/skpdprog_d', 'SKPDProgController@detail');
    Route::resource('/kak', 'KakController');
    Route::resource('/tahap', 'TahapKakController');
    Route::resource('/aktivitas', 'AktivitasKakController');
    Route::resource('/personalakt', 'PersonalaktController');
    Route::resource('/instruakt', 'InstruaktController');
    Route::resource('/dataakt', 'DataaktController');
    Route::resource('/kebutuhanakt', 'KebutuhanaktController');
});
//Laporan
Route::get('/laporan_skpd', 'LaporanController@skpd');
Route::get('/allusulan', 'LaporanController@usulanskpd');
Route::get('/laporan_lokasi', 'LaporanController@lokasi');
Route::get('/laporan_lokasiskpd', 'LaporanController@lokasiSkpd');
Route::get('/laporan_program', 'LaporanController@program');
Route::get('/laporan_kegiatan', 'LaporanController@kegiatan');
Route::get('/laporan_subkeg', 'LaporanController@subkeg');
Route::get('/laporan_kak', 'LaporanController@kak');
Route::get('/ceklaporan', 'LaporanController@cek');
Route::post('/cetaklaporan', 'LaporanController@cetak');
Route::post('/cetaksubkeg', 'LaporanController@cetakSubkeg');
Route::post('/cetakusulan', 'LaporanController@cetakusulan');
Route::post('/cetaklokasi', 'LaporanController@cetaklokasi');

//Other Function
Route::post('/user-edit', 'UserController@editmember');
Route::get('/getdataedit', 'OtherFunctionController@getDataEdit');
Route::get('/getdataedit2', 'OtherFunctionController@getDataEdit2');
Route::get('/getdatawith', 'OtherFunctionController@getDataWith');
Route::get('/getdatawiths', 'OtherFunctionController@getDataWiths');
Route::get('/getdata', 'OtherFunctionController@getData');
Route::get('/getdata_all', 'OtherFunctionController@getDataAll');
Route::get('/getdata_like', 'OtherFunctionController@getDataLike');
Route::get('/getslug', 'OtherFunctionController@getSlug');
Route::get('/getitemedit', 'OtherFunctionController@getItemEdit');
Route::get('/getitemkeb', 'OtherFunctionController@getItemKeb');
Route::get('/getusulankeb', 'OtherFunctionController@getUsulanKeb');
Route::get('/getsbukeb', 'OtherFunctionController@getSbuKeb');
Route::get('/getusulansbu', 'OtherFunctionController@getUsulanSbu');
Route::get('/editsesi', 'PeriodeController@editsesi');
Route::get('/editproses', 'PeriodeController@editproses');
Route::get('/getprpjmd', 'OtherFunctionController@getPrpjmd');
