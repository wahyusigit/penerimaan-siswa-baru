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
// Route Test Area
// Route::get('test2', function(){
// 	$data = array(
// 									  array(
// 									  			'id_jenis_pertanyaan' => '1',
// 									  			'nama_jenis' => 'Bagian 1 : Padanan Kata ( Sinonim)','desk_jenis' => 'Petunjuk : Carilah padanan kata (sinonim) yang tepat dari kata berikut ini',
// 												'created_at' => '2018-01-29 23:04:52',
// 												'updated_at' => '2018-01-29 23:04:52'),
// 									  array(
// 									  			'id_jenis_pertanyaan' => '2',
// 									  			'nama_jenis' => 'Bagian 2 : Lawan Kata (Antonim)',
// 									  			'desk_jenis' => 'Petunjuk : Carilah kebalikan arti atau yang memiliki arti yang berlawanan dari kata-kata berikut:',
// 									  			'created_at' => '2018-01-29 23:05:17','updated_at' => '2018-01-29 23:05:17'),
// 									  array(
// 									  			'id_jenis_pertanyaan' => '3',
// 									  			'nama_jenis' => 'Bagian 3 : Padanan atau Hubungan Kata (Analogi)',
// 									  			'desk_jenis' => NULL,
// 									  			'created_at' => '2018-01-29 23:05:30',
// 									  			'updated_at' => '2018-01-29 23:05:30'),
// 									  array(
// 									  			'id_jenis_pertanyaan' => '4',
// 									  			'nama_jenis' => 'Bagian 4 : Pemahaman wacana',
// 									  			'desk_jenis' => NULL,
// 									  			'created_at' => '2018-01-29 23:05:55',
// 									  			'updated_at' => '2018-01-29 23:05:55'),
// 									  array(
// 									  			'id_jenis_pertanyaan' => '5',
// 									  			'nama_jenis' => 'Bagian 5 : Test Deret Seri',
// 									  			'desk_jenis' => NULL,
// 									  			'created_at' => '2018-01-29 23:06:06',
// 									  			'updated_at' => '2018-01-29 23:06:06'),
// 									  array(
// 									  			'id_jenis_pertanyaan' => '6',
// 									  			'nama_jenis' => 'Bagian 6 : Test Aritmatika',
// 									  			'desk_jenis' => NULL,
// 									  			'created_at' => '2018-01-29 23:06:26',
// 									  			'updated_at' => '2018-01-29 23:06:26'),
// 									  array(
// 									  			'id_jenis_pertanyaan' => '7',
// 									  			'nama_jenis' => 'Bagian 7 : Subtes Geometri dan Aritmatika',
// 									  			'desk_jenis' => NULL,
// 									  			'created_at' => '2018-01-29 23:06:36',
// 									  			'updated_at' => '2018-01-29 23:06:36'),
// 									  array(
// 									  			'id_jenis_pertanyaan' => '8',
// 									  			'nama_jenis' => 'Bagian 8 : Tes penalaran logis',
// 									  			'desk_jenis' => NULL,
// 									  			'created_at' => '2018-01-29 23:06:46',
// 									  			'updated_at' => '2018-01-29 23:06:46'),
// 									  array(
// 									  			'id_jenis_pertanyaan' => '9',
// 									  			'nama_jenis' => 'Bagian 9 : Tes Penalaran Analitis',
// 									  			'desk_jenis' => NULL,
// 									  			'created_at' => '2018-01-29 23:06:57',
// 									  			'updated_at' => '2018-01-29 23:06:57')
// 									);
// 	foreach ($data as $key => $value) {
// 		dd($data);
// 		foreach ($value as $k => $v) {
// 			dd($v);
// 		}
// 	}
// });

// Route::group(['prefix' => 'qrcode'], function () {
// 	Route::get('/{code}','BarcodeController@index')->name('indexBarcode');
// });

Route::group(['prefix' => 'print','middleware' => ['auth','role:siswa']], function () {
	Route::get('/{jenis}/{id}','PrintController@index')->name('printBukti');
});


// End Route Test

// Start Ajax Route
Route::prefix('ajax')->group(function(){
	Route::post('/sekolah-asal','AjaxController@ajaxDataSekolahAsal')->name('ajaxDataSekolahAsal');
	Route::post('/tahun-ajaran','AjaxController@ajaxTahunAjaran')->name('ajaxTahunAjaran');
});
// End Ajax Route
Route::get('/', 'LandingController@index')->name('indexHomepage');
Route::get('/panduan-pendaftaran','LandingController@panduanPendaftaran')->name('panduanPendaftaranHomepage');
Route::get('/jadwal','LandingController@jadwal')->name('jadwalHomepage');
Route::get('/pendaftaran', 'LandingController@pendaftaran')->name('pendaftaranHomepage');
Route::post('/pendaftaran', 'LandingController@postPendaftaran')->name('postPendaftaranHomepage');

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});

Route::get('test', function(){
	dd(bcrypt('(*#&42#4(*&))'));
});

Route::group(['prefix'=>'admin', 'middleware' => ['auth','role:admin']], function(){
	Route::prefix('profile')->group(function(){
		Route::get('/','Admin\ProfilController@index')->name('indexProfileAdmin');
		Route::get('edit','Admin\ProfilController@edit')->name('editProfileAdmin');
		Route::post('update','Admin\ProfilController@update')->name('updateProfileAdmin');
	});

	Route::prefix('tahunajaran')->group(function(){
		Route::get('/','Admin\TahunAjaranController@index')->name('indexTahunAjaranAdmin');
		Route::get('add','Admin\TahunAjaranController@add')->name('addTahunAjaranAdmin');
		Route::post('add','Admin\TahunAjaranController@postAdd')->name('postAddTahunAjaranAdmin');
		Route::get('delete/{id}','Admin\TahunAjaranController@delete')->name('deleteTahunAjaranAdmin');
		Route::get('/search/{id}','Admin\TahunAjaranController@search')->name('searchTahunAjaranAdmin');
		// Route::get('detail','Admin\TahunAjaranControllern@index')->name('detailTahunAjaranAdmin');
	});
	Route::get('/','Admin\AdminController@index')->name('indexAdmin');

	Route::prefix('pendaftaran')->group(function(){
		Route::get('/{id_jadwal?}','Admin\PendaftaranController@index')->name('indexPendaftaranAdmin');
		Route::post('/','Admin\PendaftaranController@postIndex')->name('postIndexPendaftaranAdmin');
		Route::get('add','Admin\PendaftaranController@add')->name('addPendaftaranAdmin');
		Route::post('add','Admin\PendaftaranController@postAdd')->name('postAddPendaftaranAdmin');
		Route::get('edit/{id?}','Admin\PendaftaranController@edit')->name('editPendaftaranAdmin');
		Route::post('update/{id}','Admin\PendaftaranController@update')->name('updatePendaftaranAdmin');
		Route::get('delete/{id?}','Admin\PendaftaranController@delete')->name('deletePendaftaranAdmin');
		Route::get('detail/{id?}','Admin\PendaftaranController@detail')->name('detailPendaftaranAdmin');
		
		Route::post('ajax/search','Admin\PendaftaranController@ajaxSearch')->name('ajaxSearchPendaftaranAdmin');
		Route::post('search','Admin\PendaftaranController@search')->name('searchAdvancePendaftaranAdmin');
		
		Route::post('ajax/show','Admin\PendaftaranController@ajaxShow')->name('ajaxShowPendaftaranAdmin');
		Route::post('search/{id_jadwal?}/{q?}','Admin\PendaftaranController@postSearch')->name('postSearchPendaftaranAdmin');
		// Route::get('detail','Admin\TahunAjaranControllern@index')->name('detailTahunAjaranAdmin');
	});

	Route::prefix('pembayaran')->group(function(){
		Route::get('/','Admin\PembayaranController@index')->name('indexPembayaranAdmin');
		Route::get('add','Admin\PembayaranController@add')->name('addPembayaranAdmin');
		Route::post('add','Admin\PembayaranController@postAdd')->name('postAddPembayaranAdmin');
		Route::get('edit/{id}','Admin\PembayaranController@edit')->name('editPembayaranAdmin');
		Route::post('update/{id}','Admin\PembayaranController@update')->name('updatePembayaranAdmin');
		Route::get('delete/{id}','Admin\PembayaranController@delete')->name('deletePembayaranAdmin');
		Route::get('detail/{id}','Admin\PembayaranController@detail')->name('detailPembayaranAdmin');
		Route::post('verifikasi','Admin\PembayaranController@postVerifikasi')->name('postVerifikasiPembayaranAdmin');
	});

	Route::prefix('jadwal')->group(function(){
		Route::get('/','Admin\JadwalController@index')->name('indexJadwalAdmin');
		Route::get('add','Admin\JadwalController@add')->name('addJadwalAdmin');
		Route::post('add','Admin\JadwalController@postAdd')->name('postAddJadwalAdmin');
		Route::get('edit/{id}','Admin\JadwalController@edit')->name('editJadwalAdmin');
		Route::post('update','Admin\JadwalController@update')->name('updateJadwalAdmin');
		Route::get('detail/{id}','Admin\JadwalController@detail')->name('detailJadwalAdmin');
		Route::post('delete','Admin\JadwalController@delete')->name('postDeleteJadwalAdmin');
	});

	Route::prefix('jurusankelas')->group(function(){
		Route::get('/','Admin\JurusanKelasController@index')->name('indexJurusanKelasAdmin');
		Route::get('/kelas/{kd_kelas}','Admin\JurusanKelasController@indexKelas')->name('indexKelasAdmin');
		Route::post('/','Admin\JurusanKelasController@postIndex')->name('postIndexJurusanKelasAdmin');
		// Route::get('add','Admin\JurusanKelasController@add')->name('addJurusanKelasAdmin');
		Route::post('addJurusan','Admin\JurusanKelasController@postAddJurusan')->name('postAddJurusanAdmin');
		Route::post('addKelas','Admin\JurusanKelasController@postAddKelas')->name('postAddKelasAdmin');
		Route::post('showData','Admin\JurusanKelasController@showData')->name('showDataKelasAdmin');
		Route::post('updateJurusan','Admin\JurusanKelasController@postUpdateJurusan')->name('postUpdateJurusanAdmin');
		Route::post('updateKelas','Admin\JurusanKelasController@postUpdateKelas')->name('postUpdateKelasAdmin');
		// Route::get('deleteJurusan/{id}','Admin\JurusanKelasController@deleteJurusan')->name('deleteJurusanAdmin');
		// Route::get('deleteKelas/{id}','Admin\JurusanKelasController@deleteKelas')->name('deleteKelasAdmin');
		Route::post('deleteJurusan','Admin\JurusanKelasController@deleteJurusan')->name('postDeleteJurusanAdmin');
		Route::post('deleteKelas','Admin\JurusanKelasController@deleteKelas')->name('postDeleteKelasAdmin');
		Route::get('detail/{id}','Admin\JurusanKelasController@detail')->name('detailJurusanKelasAdmin');
		Route::get('siswa/{no_pendf}','Admin\JurusanKelasController@detailSiswa')->name('detailSiswaKelasAdmin');
		Route::get('siswa/edit/{no_pendf}','Admin\JurusanKelasController@editSiswa')->name('editSiswaKelasAdmin');
		Route::post('siswa/update/{no_pendf}','Admin\JurusanKelasController@updateSiswa')->name('updateSiswaKelasAdmin');
	});

	Route::prefix('tesseleksi')->group(function(){
		Route::get('/','Admin\TesSeleksiAkademikController@index')->name('indexTesSeleksiAkademikAdmin');
		Route::post('/','Admin\TesSeleksiAkademikController@postIndex')->name('postIndexTesSeleksiAkademikAdmin');
		Route::post('/nilai','Admin\TesSeleksiAkademikController@postNilai')->name('postNilaiTesSeleksiAkademikAdmin');
		Route::post('/updateNilai','Admin\TesSeleksiAkademikController@updateNilai')->name('updateNilaiTesSeleksiAkademikAdmin');
		Route::post('ajax/search','Admin\TesSeleksiAkademikController@ajaxSearch')->name('ajaxSearchTesSeleksiAkademikAdmin');
		Route::get('paginate/index/{id}/{status}','Admin\TesSeleksiAkademikController@paginatePostIndex')->name('paginatePostIndexTesSeleksiAkademikAdmin');
		// Route::get('add','Admin\JurusanKelasController@add')->name('addJurusanKelasAdmin');
		// Route::post('add','Admin\JurusanKelasController@postAdd')->name('postAddJurusanKelasAdmin');
		// Route::get('edit/{id}','Admin\JurusanKelasController@edit')->name('editJurusanKelasAdmin');
		// Route::post('update/{id}','Admin\JurusanKelasController@update')->name('updateJurusanKelasAdmin');
		// Route::get('delete/{id}','Admin\JurusanKelasController@delete')->name('deleteJurusanKelasAdmin');
		// Route::get('detail/{id}','Admin\JurusanKelasController@detail')->name('detailJurusanKelasAdmin');
			Route::prefix('soal')->group(function(){
				Route::get('/','Admin\SoalController@index')->name('indexSoalAdmin');
				Route::get('/add','Admin\SoalController@add')->name('addSoalAdmin');
				Route::post('/add','Admin\SoalController@postAdd')->name('postAddSoalAdmin');
				Route::get('/edit/{id_pertanyaan}','Admin\SoalController@edit')->name('editSoalAdmin');
				Route::post('/update/{id_pertanyaan}','Admin\SoalController@update')->name('updateSoalAdmin');
				Route::get('/detail/{id_pertanyaan}','Admin\SoalController@detail')->name('detailSoalAdmin');
				Route::get('/delete/{id_pertanyaan}','Admin\SoalController@delete')->name('deleteSoalAdmin');

				Route::post('/jenis/add','Admin\SoalController@postAddJenisPertanyaan')->name('postAddJenisPertanyaanAdmin');
			});

	});

	Route::prefix('seleksipenerimaan')->group(function(){
		Route::get('/','Admin\SeleksiPenerimaanController@index')->name('indexSeleksiPenerimaanAdmin');
		Route::post('/penerimaan','Admin\SeleksiPenerimaanController@postPenerimaan')->name('postPenerimaanAdmin');
		
	});

	Route::prefix('siswa')->group(function(){
		Route::get('/','Admin\SiswaController@index')->name('indexSiswaAdmin');
		Route::post('/','Admin\SiswaController@postIndex')->name('postIndexSiswaAdmin');
		// Route::get('add','Admin\SiswaController@add')->name('addSiswaAdmin');
		// Route::post('add','Admin\SiswaController@postAdd')->name('postSiswaranAdmin');
		// Route::get('delete/{id}','Admin\SiswaController@delete')->name('deleteSiswaAdmin');
		// Route::get('/search/{id}','Admin\SiswaController@search')->name('searchSiswaAdmin');
	});
});


// Route::prefix('/siswa')->group(function(){
Route::group(['prefix'=>'siswa', 'middleware' => ['auth','role:siswa']], function(){
	// Route::get('/','Siswa\SiswaController@index')->name('indexSiswa');

	Route::prefix('pendaftaran')->group(function(){
		Route::get('/','Siswa\PendaftaranController@index')->name('indexPendaftaranSiswa');
		Route::get('edit','Siswa\PendaftaranController@edit')->name('editPendaftaranSiswa');
		Route::post('update','Siswa\PendaftaranController@update')->name('updatePendaftaranSiswa');
	});

	Route::prefix('pembayaran')->group(function(){
		Route::get('/','Siswa\PembayaranController@index')->name('indexPembayaranSiswa');
		Route::post('/konfirmasiPembayaran','Siswa\PembayaranController@konfirmasiPembayaran')->name('konfirmasiPembayaranSiswa');
	});

	Route::prefix('tesseleksi')->group(function(){
		Route::get('/','Siswa\TesSeleksiAkademikController@index')->name('indexTesSeleksiAkademikSiswa');
		Route::get('hasil','Siswa\TesSeleksiAkademikController@hasil')->name('hasilTesSeleksiAkademikSiswa');
		Route::get('detail','Siswa\TesSeleksiAkademikController@detail')->name('detailTesSeleksiAkademikSiswa');
		
		Route::prefix('quiz')->group(function(){
			Route::get('/','Siswa\TesSeleksiAkademikController@quiz')->name('indexQuizTesSeleksiAkademikSiswa');
			Route::post('/post','Siswa\TesSeleksiAkademikController@postQuiz')->name('postQuizTesSeleksiAkademikSiswa');
			Route::get('start','Siswa\TesSeleksiAkademikController@startQuiz')->name('startQuizTesSeleksiAkademikSiswa');
			// Route::post('ajax','Siswa\TesSeleksiAkademikController@quiz')->name('ajaxQuizTesSeleksiAkademikSiswa');
			// Route::post('q','Siswa\TesSeleksiAkademikController@quiz')->name('pertanyaanQuizTesSeleksiAkademikSiswa');
			// Route::post('a','Siswa\TesSeleksiAkademikController@quiz')->name('pilihanJawabanQuizTesSeleksiAkademikSiswa');
		});
	});

	Route::prefix('hasilpenerimaan')->group(function(){
		Route::get('/','Siswa\HasilPenerimaanController@index')->name('indexHasilPenerimaanSiswa');
	});

	Route::prefix('daftarulang')->group(function(){
		Route::get('/','Siswa\DaftarUlangController@index')->name('indexDaftarUlangSiswa');
		Route::post('/','Siswa\DaftarUlangController@postIndex')->name('postIndexDaftarUlangSiswa');
		Route::post('/ajax','Siswa\DaftarUlangController@ajax')->name('ajaxDaftarUlangSiswa');
	});
});


// Route::prefix('/siswa')->group(function(){
// 	Route::get('/','SiswaController@index')->name('indexSiswa');
// });




Route::get('logout', function(){
	Auth::logout();
	return redirect(route('login'));
});
Route::match(['get', 'post'], 'register', function(){
    return redirect('/login');
});
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();