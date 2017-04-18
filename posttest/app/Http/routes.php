<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use Illuminate\Http\Request;

Route::get('tess', function (){
	echo Form::open(['url'=>'/']).
			Form::label('nama').
			Form::text('nama',null).
			Form::submit('kirim').
		 Form::close();
});
Route::post('tess',function (Request $request)
{
	echo "Hasil dari form adalah : ". $request->nama;
});


Route::get('tess1',function (Illuminate\Http\Request $request)
{
	echo "ini adalah request ". $request->nama;
});


Route::get('/', function(){
	return view('master');
});


Route::get('tes', function()
	{
		return\App\dosen_matakuliah::whereHas('dosen', function($query){
			$query->where('nama', 'like', '%u%');
		})->with('dosen')->groupBy('dosen_id')->get();
	});

Route::get('tes1', function()
{
	return\App\dosen_matakuliah::whereWas('dosen', function($query)
	{
		$query->where('nama', 'like', '%u%');
	})

	->orWhereHas('matakuliah',function($kueri)
	{
		$kueri->where('title','like','%b%');
	})
	->with('dosen','matakuliah')
	->groupBy('dosen_id')
	->get();
});


Route::get('ujiHas', 'RelationshipRebornController@ujiHas');

Route::get('ujiDoesntHave', 'RelationshipRebornController@ujiDoesntHave');

Route::get('/public', function(){
	return view('public');
});

Route::get('pengguna', 'PenggunaController@awal');
Route::get('pengguna/tambah', 'PenggunaController@tambah');
Route::get('pengguna/{pengguna}','PenggunaController@lihat');
Route::post('pengguna/simpan','PenggunaController@simpan');
Route::get('pengguna/edit/{pengguna}','PenggunaController@edit');
Route::post('pengguna/edit/{pengguna}','PenggunaController@update');
Route::get('pengguna/hapus/{pengguna}','PenggunaController@hapus');


Route::get('dosen', 'DosenController@awal');
Route::get('dosen/tambah', 'DosenController@tambah');
Route::get('dosen/{dosen}', 'DosenController@lihat');
Route::post('dosen/simpan', 'DosenController@simpan');
Route::get('dosen/edit/{dosen}', 'DosenController@edit');
Route::post('dosen/edit/{dosen}', 'DosenController@update');
Route::get('dosen/hapus/{dosen}', 'DosenController@hapus');

Route::get('mahasiswa', 'MahasiswaController@awal');
Route::get('mahasiswa/tambah', 'MahasiswaController@tambah');
Route::get('mahasiswa/{mahasiswa}', 'MahasiswaController@lihat');
Route::post('mahasiswa/simpan', 'MahasiswaController@simpan');
Route::get('mahasiswa/edit/{mahasiswa}', 'MahasiswaController@edit');
Route::post('mahasiswa/edit/{mahasiswa}', 'MahasiswaController@update');
Route::get('mahasiswa/hapus/{mahasiswa}', 'MahasiswaController@hapus');

Route::get('matakuliah', 'MatakuliahController@awal');
Route::get('matakuliah/tambah', 'MatakuliahController@tambah');
Route::get('matakuliah/{matakuliah}', 'MatakuliahController@lihat');
Route::post('matakuliah/simpan', 'MatakuliahController@simpan');
Route::get('matakuliah/edit/{matakuliah}', 'MatakuliahController@edit');
Route::post('matakuliah/edit/{matakuliah}', 'MatakuliahController@update');
Route::get('matakuliah/hapus/{matakuliah}', 'MatakuliahController@hapus');

Route::get('ruangan', 'RuanganController@awal');
Route::get('ruangan/tambah', 'RuanganController@tambah');
Route::get('ruangan/{ruangan}', 'RuanganController@lihat');
Route::post('ruangan/simpan', 'RuanganController@simpan');
Route::get('ruangan/edit/{ruangan}', 'RuanganController@edit');
Route::post('ruangan/edit/{ruangan}', 'RuanganController@update');
Route::get('ruangan/hapus/{ruangan}', 'RuanganController@hapus');


Route::get('dosen_matakuliah', 'Dosen_MatakuliahController@awal');
Route::get('dosen_matakuliah/tambah', 'Dosen_MatakuliahController@tambah');
Route::get('dosen_matakuliah/lihat/{dosen_matakuliah}', 'Dosen_MatakuliahController@lihat');
Route::post('dosen_matakuliah/simpan', 'Dosen_MatakuliahController@simpan');
Route::get('dosen_matakuliah/edit/{dosen_matakuliah}', 'Dosen_MatakuliahController@edit');
Route::post('dosen_matakuliah/edit/{dosen_matakuliah}', 'Dosen_MatakuliahController@update');
Route::get('dosen_matakuliah/hapus/{dosen_matakuliah}', 'Dosen_MatakuliahController@hapus');


Route::get('jadwal_matakuliah', 'JadwaMatakuliahController@awal');
Route::get('jadwal_matakuliah/tambah', 'JadwaMatakuliahController@tambah');
Route::get('jadwal_matakuliah/{jadwamatakuliah}', 'jadwaMatakuliahController@lihat');
Route::post('jadwal_matakuliah/simpan', 'jadwaMatakuliahController@simpan');
Route::get('jadwal_matakuliah/edit/{jadwamatakuliah}', 'jadwaMatakuliahController@edit');
Route::post('jadwal_matakuliah/edit/{jadwamatakuliah}', 'jadwaMatakuliahController@update');
Route::get('jadwal_matakuliah/hapus/{jadwamatakuliah}', 'jadwaMatakuliahController@hapus');