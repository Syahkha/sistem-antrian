<?php

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

Route::get('/', ['as'=>'/','uses'=>'Auth\LoginController@showLoginForm']);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Akun
Route::get('akun','admin\akun@akun');
Route::post('up-akun','admin\akun@upakun');
Route::get('data-akun','admin\akun@dataA');
Route::post('simpan-akun','admin\akun@simpanA');
Route::get('hapus-akun/{ids}','admin\akun@hapusA');
Route::POST('update-akun','admin\akun@updateA');

//Loket
Route::get('loket','loket\loket@getLoket');
Route::post('tambah-loket','loket\loket@tambahLoket');
Route::post('update-loket','loket\loket@upLoket');
Route::get('hapus-loket/{id}','loket\loket@hapusLoket');
Route::post('edit-Adminloket','loket\loket@edit');

//antrian
Route::get('antrian','antrian\antrian@antrian');
Route::get('restart-antrian','antrian\antrian@restart');
Route::post('atur-antrian','antrian\antrian@upantrian');
//session antrian
Route::post('buat-antrian','antrian\antrian@buat');
Route::get('antrian/tampil','antrian\antrian@tampilkanSession');
Route::get('antrian/hapus','antrian\antrian@hapusSession');
//pemanggilan
Route::get('pemanggilan','pemanggilan\pemanggilan@pemanggilan');   
Route::post('panggil','pemanggilan\pemanggilan@panggil');
//display
Route::get('display','display\display@display');
//setting
Route::get('setting','setting\setting@GetSetting');
Route::post('up-setting','setting\setting@UpSetting');



//Departement
Route::get('departement','departement\departement@showdepartement');
Route::post('up-departement','departement\departement@updepartement');
Route::post('tambah-departement','departement\departement@tambahdepartement');
Route::get('hapus-departement/{id}','departement\departement@hapusdepartement');
