<?php

use Illuminate\Database\Seeder;

use App\Role;
use App\User;
use App\JadwalPendaftaran;
use App\Panitia;
use App\CalonSiswa;
use App\Jurusan;
use App\Kelas;
use App\TahunAjaran;
use App\JenisPertanyaan;
use App\Pertanyaan;
use App\PilihanJawaban;

use Carbon\Carbon;

class FullSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$role = new Role();
    	$role->name = "admin";
    	$role->description = "admin";
    	$role->save();

    	$role = new Role();
    	$role->name = "siswa";
    	$role->description = "siswa";
    	$role->save();

    	$user = new User();
    	$user->email = "panitia1@panitia1.com";
    	$user->password = bcrypt("panitia1");
    	$user->id_role = Role::where('name','admin')->first()->id_role;
    	$user->save();

    	$panitia = new Panitia();
		$panitia->nip = "12345";
		$panitia->id_user = $user->id_user;
		$panitia->nm_panitia = "Panitia 1";
		$panitia->jns_kelamin = "l";
		$panitia->agama = "islam";
		$panitia->alamat = "Jl. Haji Gedad Gang Kijon No.14 Paninggilan Utara, Ciledug";
		$panitia->no_hp = "081519120000";
		$panitia->save();

		$user = new User();
    	$user->email = "panitia2@panitia2.com";
    	$user->password = bcrypt("panitia2");
    	$user->id_role = Role::where('name','admin')->first()->id_role;
    	$user->save();

		$panitia = new Panitia();
		$panitia->nip = "67890";
		$panitia->id_user = $user->id_user;
		$panitia->nm_panitia = "Panitia 2";
		$panitia->jns_kelamin = "l";
		$panitia->agama = "islam";
		$panitia->alamat = "Jl. Haji Gedad Gang Kijon No.14 Paninggilan Utara, Ciledug";
		$panitia->no_hp = "085773020052";
		$panitia->save();


    	$id_role_siswa = Role::where('name','siswa')->first()->id_role;

    	$data_tahun_ajaran = [
    							['th_ajaran'=>'2017/2018'],
								['th_ajaran'=>'2018/2019'],
								['th_ajaran'=>'2019/2020'],
								['th_ajaran'=>'2020/2021']
    						];
    	foreach ($data_tahun_ajaran as $i=>$data) {
    		$tahunajaran = new TahunAjaran();
    		$tahunajaran -> th_ajaran = $data['th_ajaran'];
    		$tahunajaran -> created_at = '2018-01-20 20:30:0' . $i;
    		$tahunajaran -> save();
    	}

    	$jadwal_pendaftaran = new JadwalPendaftaran();
		$jadwal_pendaftaran->nm_jadwal = "Gelombang 1";
		$jadwal_pendaftaran->id_th_ajaran = 1;
		$jadwal_pendaftaran->tgl_mulai_pendf = "2017-01-1";
		$jadwal_pendaftaran->tgl_akhir_pendf = "2017-01-6";
		$jadwal_pendaftaran->tgl_mulai_tes = "2017-01-8";
		$jadwal_pendaftaran->tgl_akhir_tes = "2017-01-11";
		$jadwal_pendaftaran->tgl_hasil_seleksi = "2017-01-13";
    	$jadwal_pendaftaran->save();

    	$jadwal_pendaftaran = new JadwalPendaftaran();
		$jadwal_pendaftaran->nm_jadwal = "Gelombang 2";
		$jadwal_pendaftaran->id_th_ajaran = 1;
		$jadwal_pendaftaran->tgl_mulai_pendf = "2017-01-15";
		$jadwal_pendaftaran->tgl_akhir_pendf = "2017-01-27";
		$jadwal_pendaftaran->tgl_mulai_tes = "2017-01-18";
		$jadwal_pendaftaran->tgl_akhir_tes = "2017-01-19";
		$jadwal_pendaftaran->tgl_hasil_seleksi = "2017-01-20";
    	$jadwal_pendaftaran->save();

    	$jadwal_pendaftaran = new JadwalPendaftaran();
		$jadwal_pendaftaran->nm_jadwal = "Gelombang 1";
		$jadwal_pendaftaran->id_th_ajaran = 2;
		$jadwal_pendaftaran->tgl_mulai_pendf = "2018-02-08";
		$jadwal_pendaftaran->tgl_akhir_pendf = "2018-02-11";
		$jadwal_pendaftaran->tgl_mulai_tes = "2018-02-12";
		$jadwal_pendaftaran->tgl_akhir_tes = "2018-02-14";
		$jadwal_pendaftaran->tgl_hasil_seleksi = "2018-02-15";
    	$jadwal_pendaftaran->save();

    	$data_jurusan = [
							[	'kd_jurusan' => 'ANM',
								'nm_jurusan' => 'Animasi'
							],
							[	'kd_jurusan' => 'TKJ',
								'nm_jurusan' => 'Teknik Komputer'
							],
							[	'kd_jurusan' => 'TKR',
								'nm_jurusan' => 'Teknik Kendaraan Ringan'
							],
							[	'kd_jurusan' => 'TPL',
								'nm_jurusan' => 'Teknik Pengecoran Logam'
							],
							[	'kd_jurusan' => 'TGB',
								'nm_jurusan' => 'Teknik Gambar Bangunan'
							],
							[	'kd_jurusan' => 'TAV',
								'nm_jurusan' => 'Teknik Audio Video'
							]
    					];        
        foreach ($data_jurusan as $data) {
        	$jurusan = new Jurusan();
			$jurusan->kd_jurusan = $data['kd_jurusan'];
			$jurusan->nm_jurusan = $data['nm_jurusan'];
			$jurusan->save();
        }


        $data_kelas = [
							[	'kd_jurusan' => 'ANM',
								'kd_kelas' => 'ANM1',
								'nm_kelas' => 'Animasi 1',
								'id_th_ajaran' => 1
        					],
        					[	'kd_jurusan' => 'ANM',
								'kd_kelas' => 'ANM2',
								'nm_kelas' => 'Animasi 2',
								'id_th_ajaran' => 1
        					],
        					[	'kd_jurusan' => 'TKJ',
								'kd_kelas' => 'TKJ1',
								'nm_kelas' => 'Teknik Komputer dan Jaringan 1',
								'id_th_ajaran' => 1
        					],
        					[	'kd_jurusan' => 'TKJ',
								'kd_kelas' => 'TKJ2',
								'nm_kelas' => 'Teknik Komputer dan Jaringan 2',
								'id_th_ajaran' => 1
        					],
        					[	'kd_jurusan' => 'TKJ',
								'kd_kelas' => 'TKJ3',
								'nm_kelas' => 'Teknik Komputer dan Jaringan 3',
								'id_th_ajaran' => 1
        					],
        					[	'kd_jurusan' => 'TKR',
								'kd_kelas' => 'TKR1',
								'nm_kelas' => 'Teknik Kendaraan Ringan 1',
								'id_th_ajaran' => 1
        					],
        					[	'kd_jurusan' => 'TPL',
								'kd_kelas' => 'TPL1',
								'nm_kelas' => 'Teknik Pengecoran Logam 1',
								'id_th_ajaran' => 1
        					],
        					[	'kd_jurusan' => 'TGB',
								'kd_kelas' => 'TGB1',
								'nm_kelas' => 'Teknik Gambar Bangunan 1',
								'id_th_ajaran' => 1
        					],
        					[	'kd_jurusan' => 'TAV',
								'kd_kelas' => 'TAV1',
								'nm_kelas' => 'Teknik Audio Video 1',
								'id_th_ajaran' => 1
        					]
        ];

        // Faker Data Pendftaran    // Faker Data Pendftaran   // Faker Data Pendftaran    
		$faker = Faker\Factory::create('id_ID');

		$range_limit = array(31,32,33,34,35);

        foreach ($data_kelas as $data) {
        	$kelas = new Kelas();
			$kelas->kd_jurusan = $data['kd_jurusan'];
			$kelas->kd_kelas = $data['kd_kelas'];
			$kelas->nm_kelas = $data['nm_kelas'];
			$kelas->id_th_ajaran = $data['id_th_ajaran'];
			$kelas->save();

			$randomIndex = array_rand($range_limit);
			$limit = $range_limit[$randomIndex];

		    for ($i = 1; $i < $limit; $i++) {
				$count_pendaftaran = CalonSiswa::count();
		        $no_pendaftaran = "DF" . date("y-") . (sprintf('%05d', $count_pendaftaran + 1));

		        $user = new User();
		        $email = $faker->email;
		        $user->email = $email;
		        $user->password = bcrypt($email);
		        $user->id_role = $id_role_siswa;
		        $user->save();

		        $calon_siswa = new CalonSiswa();
				$calon_siswa->no_pendf = $no_pendaftaran;
				$calon_siswa->id_user = $user->id_user;
				$calon_siswa->kd_jurusan = $kelas->kd_jurusan;
				$calon_siswa->kd_kelas = $kelas->kd_kelas;
				$calon_siswa->id_jadwal = $faker->randomElement($array = array (1,2));
				$calon_siswa->nm_cln_siswa = $faker->lastName;
				$calon_siswa->nisn = $faker->numberBetween($min = 100000, $max = 99999);
				$calon_siswa->jns_kelamin = $faker->randomElement($array = array ('l','p'));
				$calon_siswa->tmp_lahir = $faker->randomElement($array = array ('Klaten','Jogja','Solo','Semarang','Jakarta'));
				$calon_siswa->tgl_lahir = Carbon::now();
				$calon_siswa->agama = $faker->randomElement($array = array ('islam','kristen','katolik','hindu','budha'));
				$calon_siswa->alamat = $faker->streetAddress;
				$calon_siswa->nm_ortu = $faker->lastName;
				$calon_siswa->pkrj_ortu = $faker->randomElement($array = array ('PNS','Wiraswasta','TNI/POLRI','Lainnya'));
				$calon_siswa->gaji_ortu = $faker->randomElement($array = array (4000000,5000000,6000000,7000000,8000000,9000000,10000000));
				$calon_siswa->sklh_asal = $faker->randomElement($array = array ('SMA N 1 JAKARTA','SMA N 2 JAKARTA','SMA N 3 JAKARTA','SMA N 4 JAKARTA'));
				$calon_siswa->status_tes = "sudah";
				$calon_siswa->status_pembayaran = "sudah";
				$calon_siswa->status_penerimaan = "diterima";
				$calon_siswa->save();
	        }
        }

        $data_kelas = [
							[	'kd_jurusan' => 'ANM',
								'kd_kelas' => 'ANM3',
								'nm_kelas' => 'Animasi 1',
								'id_th_ajaran' => 2
        					],
        					[	'kd_jurusan' => 'ANM',
								'kd_kelas' => 'ANM4',
								'nm_kelas' => 'Animasi 2',
								'id_th_ajaran' => 2
        					],
        					[	'kd_jurusan' => 'TKJ',
								'kd_kelas' => 'TKJ4',
								'nm_kelas' => 'Teknik Komputer dan Jaringan 1',
								'id_th_ajaran' => 2
        					],
        					[	'kd_jurusan' => 'TKJ',
								'kd_kelas' => 'TKJ5',
								'nm_kelas' => 'Teknik Komputer dan Jaringan 2',
								'id_th_ajaran' => 2
        					],
        					[	'kd_jurusan' => 'TKJ',
								'kd_kelas' => 'TKJ6',
								'nm_kelas' => 'Teknik Komputer dan Jaringan 3',
								'id_th_ajaran' => 2
        					],
        					[	'kd_jurusan' => 'TKR',
								'kd_kelas' => 'TKR2',
								'nm_kelas' => 'Teknik Kendaraan Ringan 1',
								'id_th_ajaran' => 2
        					],
        					[	'kd_jurusan' => 'TPL',
								'kd_kelas' => 'TPL2',
								'nm_kelas' => 'Teknik Pengecoran Logam 1',
								'id_th_ajaran' => 2
        					],
        					[	'kd_jurusan' => 'TGB',
								'kd_kelas' => 'TGB2',
								'nm_kelas' => 'Teknik Gambar Bangunan 1',
								'id_th_ajaran' => 2
        					],
        					[	'kd_jurusan' => 'TAV',
								'kd_kelas' => 'TAV2',
								'nm_kelas' => 'Teknik Audio Video 1',
								'id_th_ajaran' => 2
        					]
        ];

        // Untuk Tahun Ajaran 2018/2019
        foreach ($data_kelas as $data) {
        	$kelas = new Kelas();
			$kelas->kd_jurusan = $data['kd_jurusan'];
			$kelas->kd_kelas = $data['kd_kelas'];
			$kelas->nm_kelas = $data['nm_kelas'];
			$kelas->id_th_ajaran = 2;
			$kelas->save();
		}

		

	    
        // Backup foreach calon siswa pendaftaran
	 //    for ($i = 1; $i < $limit; $i++) {
		//     $count_pendaftaran = CalonSiswa::count();
	 //        $no_pendaftaran = "DF" . date("y-") . (sprintf('%05d', $count_pendaftaran + 1));

	 //        $user = new User();
	 //        $email = $faker->email;
	 //        $user->email = $email;
	 //        $user->password = bcrypt($email);
	 //        $user->id_role = $id_role_siswa;
	 //        $user->save();

	 //        $calon_siswa = new CalonSiswa();
		// 	$calon_siswa->no_pendf = $no_pendaftaran;
		// 	$calon_siswa->id_user = $user->id_user;
		// 	$calon_siswa->kd_jurusan = $faker->randomElement($array = array ('TPL','TGB','TAV','ANM','TKJ','TKR'));
		// 	$calon_siswa->id_jadwal = $faker->randomElement($array = array (1,2));
		// 	$calon_siswa->nm_cln_siswa = $faker->lastName;
		// 	$calon_siswa->nisn = $faker->numberBetween($min = 100000, $max = 99999);
		// 	$calon_siswa->jns_kelamin = $faker->randomElement($array = array ('l','p'));
		// 	$calon_siswa->tmp_lahir = $faker->randomElement($array = array ('Klaten','Jogja','Solo','Semarang','Jakarta'));
		// 	$calon_siswa->tgl_lahir = Carbon::now();
		// 	$calon_siswa->agama = $faker->randomElement($array = array ('islam','kristen','katolik','hindu','budha'));
		// 	$calon_siswa->alamat = $faker->streetAddress;
		// 	$calon_siswa->nm_ortu = $faker->lastName;
		// 	$calon_siswa->pkrj_ortu = $faker->randomElement($array = array ('PNS','Wiraswasta','TNI/POLRI','Lainnya'));
		// 	$calon_siswa->gaji_ortu = $faker->randomElement($array = array (4000000,5000000,6000000,7000000,8000000,9000000,10000000));
		// 	$calon_siswa->sklh_asal = $faker->randomElement($array = array ('SMA N 1 JAKARTA','SMA N 2 JAKARTA','SMA N 3 JAKARTA','SMA N 4 JAKARTA'));
		// 	$calon_siswa->status_tes = "sudah";
		// 	$calon_siswa->status_pembayaran = "sudah";
		// 	$calon_siswa->status_penerimaan = "diterima";
		// 	$calon_siswa->save();
		// }

		// for ($i = 1; $i < $limit; $i++) {
		//     $count_pendaftaran = CalonSiswa::count();
	 //        $no_pendaftaran = "DF" . date("y-") . (sprintf('%05d', $count_pendaftaran + 1));

	 //        $user = new User();
	 //        $email = $faker->email;
	 //        $user->email = $email;
	 //        $user->password = bcrypt($email);
	 //        $user->id_role = $id_role_siswa;
	 //        $user->save();

	 //        $calon_siswa = new CalonSiswa();
		// 	$calon_siswa->no_pendf = $no_pendaftaran;
		// 	$calon_siswa->id_user = $user->id_user;
		// 	$calon_siswa->kd_jurusan = "TPL";
		// 	// $calon_siswa->kd_jurusan = $faker->randomElement($array = array ('TPL','TGB','TAV','ANM','TKJ','TKR'));
		// 	$calon_siswa->id_jadwal = $faker->randomElement($array = array (1,2));
		// 	$calon_siswa->nm_cln_siswa = $faker->lastName;
		// 	$calon_siswa->nisn = $faker->numberBetween($min = 100000, $max = 99999);
		// 	$calon_siswa->jns_kelamin = $faker->randomElement($array = array ('l','p'));
		// 	$calon_siswa->tmp_lahir = $faker->randomElement($array = array ('Klaten','Jogja','Solo','Semarang','Jakarta'));
		// 	$calon_siswa->tgl_lahir = Carbon::now();
		// 	$calon_siswa->agama = $faker->randomElement($array = array ('islam','kristen','katolik','hindu','budha'));
		// 	$calon_siswa->alamat = $faker->streetAddress;
		// 	$calon_siswa->nm_ortu = $faker->lastName;
		// 	$calon_siswa->pkrj_ortu = $faker->randomElement($array = array ('PNS','Wiraswasta','TNI/POLRI','Lainnya'));
		// 	$calon_siswa->gaji_ortu = $faker->randomElement($array = array (4000000,5000000,6000000,7000000,8000000,9000000,10000000));
		// 	$calon_siswa->sklh_asal = $faker->randomElement($array = array ('SMA N 1 JAKARTA','SMA N 2 JAKARTA','SMA N 3 JAKARTA','SMA N 4 JAKARTA'));
		// 	$calon_siswa->status_tes = "sudah";
		// 	$calon_siswa->status_pembayaran = "sudah";
		// 	$calon_siswa->status_penerimaan = "diterima";
		// 	$calon_siswa->save();
		// }


		$jenis_pertanyaans = array(
									  array(
									  			'id_jenis_pertanyaan' => '1',
									  			'nama_jenis' => 'Bagian 1 : Padanan Kata ( Sinonim)','desk_jenis' => 'Petunjuk : Carilah padanan kata (sinonim) yang tepat dari kata berikut ini',
												'created_at' => '2018-01-29 23:04:52',
												'updated_at' => '2018-01-29 23:04:52'),
									  array(
									  			'id_jenis_pertanyaan' => '2',
									  			'nama_jenis' => 'Bagian 2 : Lawan Kata (Antonim)',
									  			'desk_jenis' => 'Petunjuk : Carilah kebalikan arti atau yang memiliki arti yang berlawanan dari kata-kata berikut:',
									  			'created_at' => '2018-01-29 23:05:17','updated_at' => '2018-01-29 23:05:17'),
									  array(
									  			'id_jenis_pertanyaan' => '3',
									  			'nama_jenis' => 'Bagian 3 : Padanan atau Hubungan Kata (Analogi)',
									  			'desk_jenis' => NULL,
									  			'created_at' => '2018-01-29 23:05:30',
									  			'updated_at' => '2018-01-29 23:05:30'),
									  array(
									  			'id_jenis_pertanyaan' => '4',
									  			'nama_jenis' => 'Bagian 4 : Pemahaman wacana',
									  			'desk_jenis' => NULL,
									  			'created_at' => '2018-01-29 23:05:55',
									  			'updated_at' => '2018-01-29 23:05:55'),
									  array(
									  			'id_jenis_pertanyaan' => '5',
									  			'nama_jenis' => 'Bagian 5 : Test Deret Seri',
									  			'desk_jenis' => NULL,
									  			'created_at' => '2018-01-29 23:06:06',
									  			'updated_at' => '2018-01-29 23:06:06'),
									  array(
									  			'id_jenis_pertanyaan' => '6',
									  			'nama_jenis' => 'Bagian 6 : Test Aritmatika',
									  			'desk_jenis' => NULL,
									  			'created_at' => '2018-01-29 23:06:26',
									  			'updated_at' => '2018-01-29 23:06:26'),
									  array(
									  			'id_jenis_pertanyaan' => '7',
									  			'nama_jenis' => 'Bagian 7 : Subtes Geometri dan Aritmatika',
									  			'desk_jenis' => NULL,
									  			'created_at' => '2018-01-29 23:06:36',
									  			'updated_at' => '2018-01-29 23:06:36'),
									  array(
									  			'id_jenis_pertanyaan' => '8',
									  			'nama_jenis' => 'Bagian 8 : Tes penalaran logis',
									  			'desk_jenis' => NULL,
									  			'created_at' => '2018-01-29 23:06:46',
									  			'updated_at' => '2018-01-29 23:06:46'),
									  array(
									  			'id_jenis_pertanyaan' => '9',
									  			'nama_jenis' => 'Bagian 9 : Tes Penalaran Analitis',
									  			'desk_jenis' => NULL,
									  			'created_at' => '2018-01-29 23:06:57',
									  			'updated_at' => '2018-01-29 23:06:57')
									);

		foreach ($jenis_pertanyaans as $key => $value) {
			$jenis_pertanyaan = new JenisPertanyaan();
			$jenis_pertanyaan -> nama_jenis = $value['nama_jenis'];
			$jenis_pertanyaan -> desk_jenis = $value['desk_jenis'];
			$jenis_pertanyaan -> save();
		}

		$bagian1 = [
					'Virtual' => [
									'Maya'=>'salah',
									'Impian'=>'salah',
									'Nyata'=>'salah',
									'Virgin'=>'salah',
									'Hiponema'=>'benar'
								],
					'Semiotika' => [
									'Ilmu tentang tanda'=>'salah',
									'Ilmu seni'=>'salah',
									'Ilmu bahasa'=>'salah',
									'Bahasa simbol'=>'salah',
									'Ungkapan kata'=>'benar'
								],
					'Friksi' => [
									'Membelah'=>'salah',
									'Melepaskan'=>'salah',
									'Perpecahan'=>'salah',
									'Putus Asa'=>'salah',
									'Penggabungan'=>'benar'
								],
					'Renovasi' => [
									'Pemagaran'=>'salah',
									'Pemugaran'=>'salah',
									'Pembongkaran'=>'salah',
									'Peningkatan'=>'salah',
									'Pemekaran'=>'benar'
								],
					'Rancu' => [
									'Canggung'=>'salah',
									'Jorok'=>'salah',
									'Kacau'=>'salah',
									'Tidak wajar'=>'salah',
									'Semu'=>'benar'
								]
					];

		foreach ($bagian1 as $key => $value) {
			$pertanyaan = new Pertanyaan();
			$pertanyaan -> id_jenis_pertanyaan = 7;
			$pertanyaan -> isi_pertanyaan = $key;
			$pertanyaan -> save();

			foreach ($value as $k => $v) {
				$pilihan_jawaban = new PilihanJawaban();
				$pilihan_jawaban -> id_pertanyaan = $pertanyaan->id_pertanyaan;
				$pilihan_jawaban -> isi_jawaban = $k;
				$pilihan_jawaban -> status_jawaban = $v;
				$pilihan_jawaban -> save();
			}
		}

		$bagian2 = [
					'Absurd' => [
									'Omong kosong'=>'salah',
									'Istilah terkini'=>'salah',
									'Mustahil'=>'salah',
									'Tak terpakai'=>'salah',
									'Masuk akal'=>'benar'
								],
					'Prominen' => [
									'Konsisten'=>'salah',
									'Biasa'=>'salah',
									'Tak setuju'=>'salah',
									'Konsekuen'=>'salah',
									'Perintis'=>'benar'
								],
					'Apriori' => [
									'Unggulan'=>'salah',
									'Tidak Istimewa'=>'salah',
									'Proporsi'=>'salah',
									'Prioritas'=>'salah',
									'Aposteriori'=>'benar'
								],
					'Utopis' => [
									'Komunis'=>'salah',
									'Realistis'=>'salah',
									'Agamis'=>'salah',
									'Sosialis'=>'salah',
									'Demokratis'=>'benar'
								],
					'Paradoksal' => [
									'Berseberangan'=>'salah',
									'Sejalan'=>'salah',
									'Kesempatan'=>'salah',
									'Perumpamaan'=>'salah',
									'Hubungan'=>'benar'
								]
		];

		foreach ($bagian2 as $key => $value) {
			$pertanyaan = new Pertanyaan();
			$pertanyaan -> id_jenis_pertanyaan = 7;
			$pertanyaan -> isi_pertanyaan = $key;
			$pertanyaan -> save();

			foreach ($value as $k => $v) {
				$pilihan_jawaban = new PilihanJawaban();
				$pilihan_jawaban -> id_pertanyaan = $pertanyaan->id_pertanyaan;
				$pilihan_jawaban -> isi_jawaban = $k;
				$pilihan_jawaban -> status_jawaban = $v;
				$pilihan_jawaban -> save();
			}
		}

		$bagian3 = [
					'Hewan : Senapan : Berburu = ... : ... : ...' => [
									'Tanah : petani : sawah'=>'salah',
									'Nasi : sendok : makan'=>'salah',
									'Meja : kursi : duduk'=>'salah',
									'Halaman : ibu : masak'=>'salah',
									'Beras : nasi : jemur'=>'benar'
								],
					'Hujan : Kekeringan = ... : ... : ...' => [
									'Api : kebakaran'=>'salah',
									'Penuh : sesak'=>'salah',
									'Panas : api'=>'salah',
									'ampu : gelap'=>'salah',
									'Angin : dingin'=>'benar'
								],
					'Rekan : Rival = … :...' => [
									'Pendukung : penghambat'=>'salah',
									'Dermawan : serakah'=>'salah',
									'Dokter : pasien'=>'salah',
									'Adat : istiadat'=>'salah',
									'Tradisonal : kontemporer'=>'benar'
								],
					'Pakaian : Lemari = … : …' => [
									'Gelap : lampu'=>'salah',
									'Kepala : rambut'=>'salah',
									'Rumah : atap'=>'salah',
									'Air : ember'=>'salah',
									'Api : panas'=>'benar'
								],
					'Air : Es = Uap : …' => [
									'Salju'=>'salah',
									'Es'=>'salah',
									'Air'=>'salah',
									'Hujan'=>'salah',
									'Embun'=>'benar'
								]
		];

		foreach ($bagian3 as $key => $value) {
			$pertanyaan = new Pertanyaan();
			$pertanyaan -> id_jenis_pertanyaan = 7;
			$pertanyaan -> isi_pertanyaan = $key;
			$pertanyaan -> save();

			foreach ($value as $k => $v) {
				$pilihan_jawaban = new PilihanJawaban();
				$pilihan_jawaban -> id_pertanyaan = $pertanyaan->id_pertanyaan;
				$pilihan_jawaban -> isi_jawaban = $k;
				$pilihan_jawaban -> status_jawaban = $v;
				$pilihan_jawaban -> save();
			}
		}

		$bagian4 = [
					'Green House, sebuah tempat tinggal di kawasan hijau Jakarta. Kawasan ini memiliki daya tarik khusus bagi penggemar seni. Mereka yang menyukai kehidupan alami dan seni, inilah tempatnya. Banyak seniman yang tampak di rumah mereka menggelar kemampuan seni seperti melukis, latihan drama di kebun, bahkan menari di panggung rumah. Justru inilah daya tarik yang muncul. Setiap orang ingin melihat keunikan ini.<br>Unsur intrinsik yang menonjol dalam penggalan cerpen ini adalah....' => [
									'Penolakan'=>'salah',
									'Alur'=>'salah',
									'Tema'=>'salah',
									'Latar'=>'salah',
									'Uraian'=>'benar'
								],
					'Dengan tambahan medali emas dari Taufik, Indonesia untuk sementara mengoleksi dua emas. Bahkan emas Taufik mungkin emas terakhir kontingen RI di Asian Games kali ini. Dari tahun ke tahun atau dari waktu ke waktu prestasi olah raga di Indonesia di berbagai kejuaraan seperti Asian Games tetap berada di urutan kelas kambing. Tidak sebanding dengan jumlah penduduk yang berjumlah lebih dari 200 juta jiwa.<br>Kalimat kritikan untuk ilustrasi di atas adalah ....' => [
									'Minimnya perolehan emas yang terjadi di Asian Games karena atlet-atlet Indonesia kurang disiplin dalam latihan'=>'salah',
									'Mungkin hubungan atara atlet, pelatih, dan official kurang harmonis'=>'salah',
									'Setelah mereka pulang dari Qatar, panitia harus menahan rasa malu.'=>'salah',
									'Alhamdulillah, taufik merupakan penghibur masyarakat yang kecewa.'=>'salah',
									'Kontingen	Indonesia	berusaha	untuk melakukan yang terbaik lagi.'=>'benar'
								],
					'Metode penelitian merupakan cara ilmiah yang digunakan untuk mendapatkan data dengan tujuan tertentu. Cara ilmiah berarti kegiatan itu dilandasi oleh metode keilmuan. Menurut Jujun S Suria- sumantri, metode keilmuan ini merupakan gabungan antara pendekatan rasional dan empiris. Pendekatan rasional memberikan kerangka berpikir yang koheren dan logis. Pendekatan empiris memberikan kerangka pengujian dalam memastikan suatu kebenaran. Dengan cara yang ilmiah, diharapakan data yang akan diperoleh data yang objektif, valid, dan reliabel. Objektf berarti semua orang akan memberikan penafsiran yang sama; valid berarti adanya ketepatan antara data yang terkumpul oleh peneliti dengan data yang trejadi pada objek yang sesungguhnya; dan reliabel berarti adanya ketepatan atau konsistensi data yang diambil dari waktu ke waktu.<br>Hal yang tidak sesuai dengan bacaan di atas adalah ...' => [
									'Cara ilmiah untuk mendapatkan data dengan tujuan tertentu disebut metode penelitian'=>'salah',
									'Kegiatan yang dilandasi metode keilmuan disebut cara ilmiah'=>'salah',
									'Pendekatan rasional memberikan kerangka pikir pengujian suatu kebenaran'=>'salah',
									'Valid berarti tepat, sesuai antara data yang terkumpul dengan data yang ada'=>'salah',
									'Reliabel bermakna ketepatan data dari waktu ke waktu'=>'benar'
								],
					'Metode penelitian merupakan cara ilmiah yang digunakan untuk mendapatkan data dengan tujuan tertentu. Cara ilmiah berarti kegiatan itu dilandasi oleh metode keilmuan. Menurut Jujun S Suria- sumantri, metode keilmuan ini merupakan gabungan antara pendekatan rasional dan empiris. Pendekatan rasional memberikan kerangka berpikir yang koheren dan logis. Pendekatan empiris memberikan kerangka pengujian dalam memastikan suatu kebenaran. Dengan cara yang ilmiah, diharapakan data yang akan diperoleh data yang objektif, valid, dan reliabel. Objektf berarti semua orang akan memberikan penafsiran yang sama; valid berarti adanya ketepatan antara data yang terkumpul oleh peneliti dengan data yang trejadi pada objek yang sesungguhnya; dan reliabel berarti adanya ketepatan atau konsistensi data yang diambil dari waktu ke waktu.<br>Topik yang mendasari alinea pertama adalah ...' => [
									'Cara ilmiah dalam metode penelitian'=>'salah',
									'Landasan metode keilmuan'=>'salah',
									'Pendekatan dalam penelitian'=>'salah',
									'Metode keilmuan'=>'salah',
									'Gabungan	pendekatan	rasional	dan empiris'=>'benar'
								],
					'Ketua Pusat Studi Lingkungan (PSL) Univer-sitas Haheoleo, Kendari Ir. Abdul Manan, M. Sc. mengatakan dalam setiap program pengelolaan dan penyehatan lingkungan perlu ditanamkan pendidikan lingkungan sejak dini. ”Baik pendidikan formal maupun nonformal sangat berpengaruh besar dalam pengelolaan lingku- ngan karena hanya dengan masyarakat ter- pelajar, masalah lingkungan dapat dipecahkan dengan masyarakat terpelajar, masalah lingku- ngan dapat dipecahkan dengan bijaksana.” katanya kepada Antara di Kendari.<br> Gagasan pokok paragraf di atas adalah ...' => [
									'Program pengelolaan lingkungan'=>'salah',
									'Perlunya pengelolaan dan penyehatan lingkungan'=>'salah',
									'Pentingnya	penanaman	pendidikan lingkungan'=>'salah',
									'Peran	pendidikan	dalam	pengelolaan lingkungan'=>'salah',
									'Pemecahan persoalan lingkungan'=>'benar'
								]
		];

		foreach ($bagian4 as $key => $value) {
			$pertanyaan = new Pertanyaan();
			$pertanyaan -> id_jenis_pertanyaan = 7;
			$pertanyaan -> isi_pertanyaan = $key;
			$pertanyaan -> save();

			foreach ($value as $k => $v) {
				$pilihan_jawaban = new PilihanJawaban();
				$pilihan_jawaban -> id_pertanyaan = $pertanyaan->id_pertanyaan;
				$pilihan_jawaban -> isi_jawaban = $k;
				$pilihan_jawaban -> status_jawaban = $v;
				$pilihan_jawaban -> save();
			}
		}

		$bagian5 = [
					'Seri bilangan 31 – 55 – 61 – 34 – 56 – 59 – 37 – 57 – 57 – 40 – 58 – ….' => [
									'53'=>'salah',
									'55'=>'salah',
									'57'=>'salah',
									'58'=>'salah',
									'60'=>'benar'
								],
					'Seri bilangan 25 – 13 – 21 – 20 – 18 – 32 – 31 – 23 – 27 – 26 – 28 –….' => [
									'43'=>'salah',
									'42'=>'salah',
									'40'=>'salah',
									'39'=>'salah',
									'38'=>'benar'
								],
					'Seri bilangan 90 – 84 – 82 – 84 – 78 – 76 – 78 ….' => [
									'68'=>'salah',
									'58'=>'salah',
									'76'=>'salah',
									'72'=>'salah',
									'60'=>'benar'
								],
					'Seri bilangan 7007 – 7106 – 7105 – 7205 – 7204 – 7305 – 7304 – ….' => [
									'7306'=>'salah',
									'7405'=>'salah',
									'7406'=>'salah',
									'7408'=>'salah',
									'7506'=>'benar'
								],
					'Seri bilangan 5 – 10 – 8 – 24 – 21 – 84 ….' => [
									'80'=>'salah',
									'81'=>'salah',
									'168'=>'salah',
									'252'=>'salah',
									'336'=>'benar'
								]
		];

		foreach ($bagian5 as $key => $value) {
			$pertanyaan = new Pertanyaan();
			$pertanyaan -> id_jenis_pertanyaan = 7;
			$pertanyaan -> isi_pertanyaan = $key;
			$pertanyaan -> save();

			foreach ($value as $k => $v) {
				$pilihan_jawaban = new PilihanJawaban();
				$pilihan_jawaban -> id_pertanyaan = $pertanyaan->id_pertanyaan;
				$pilihan_jawaban -> isi_jawaban = $k;
				$pilihan_jawaban -> status_jawaban = $v;
				$pilihan_jawaban -> save();
			}
		}

		$bagian6 = [
					'Jika x = 156788 – 156788/2, dan y = 156788/2, maka…' => [
									'x > y'=>'salah',
									'x < y'=>'salah',
									'x = y'=>'salah',
									'x dan y tidak bisa ditentukan'=>'salah',
									'2x > 2y'=>'benar'
								],
					'Jika angka 3 dalam bilangan 453689 bernilai 3.10x, dan y = 5x/25, maka…' => [
									'x > y'=>'salah',
									'x < y'=>'salah',
									'x = y'=>'salah',
									'x dan y tidak bisa ditentukan'=>'salah',
									'2x > 2y'=>'benar'
								],
					'Jika x3 – 43 = 300, dan y + 5x = 42, maka…' => [
									'x > y'=>'salah',
									'x < y'=>'salah',
									'x = y'=>'salah',
									'x dan y tidak bisa ditentukan'=>'salah',
									'2x > 2y'=>'benar'
								],
					'Jika x = -(66), dan y = (-6)6, maka....' => [
									'x > y'=>'salah',
									'x < y'=>'salah',
									'x = y'=>'salah',
									'x dan y tidak bisa ditentukan'=>'salah',
									'2x > 2y'=>'benar'
								],
					'Jika x = p.1.1, dan y = p+1+1, (p = bilangan positif), maka...' => [
									'x > y'=>'salah',
									'x < y'=>'salah',
									'x = y'=>'salah',
									'x dan y tidak bisa ditentukan'=>'salah',
									'2x > 2y'=>'benar'
								]
		];

		foreach ($bagian6 as $key => $value) {
			$pertanyaan = new Pertanyaan();
			$pertanyaan -> id_jenis_pertanyaan = 7;
			$pertanyaan -> isi_pertanyaan = $key;
			$pertanyaan -> save();

			foreach ($value as $k => $v) {
				$pilihan_jawaban = new PilihanJawaban();
				$pilihan_jawaban -> id_pertanyaan = $pertanyaan->id_pertanyaan;
				$pilihan_jawaban -> isi_jawaban = $k;
				$pilihan_jawaban -> status_jawaban = $v;
				$pilihan_jawaban -> save();
			}
		}

		$bagian7 = [
					'Sebuah buku disewakan dengan harga Rp.1.000 untuk 3 hari pertama dan untuk selanjutnya Rp. 600 setiap hari. Jika penyewa buku tersebut membayar Rp. 11.800 untuk sebuah buku, berapa harikah buku tersebut disewanya ?' => [
									'15'=>'salah',
									'18'=>'salah',
									'20'=>'salah',
									'21'=>'salah',
									'24'=>'benar'
								],
					'Nadia hendak membeli sepatu dan gaun dengan membawa uang sebesar Rp 363.000,-. Harga sepatu di toko A adalah Rp. 210.000,- dengan diskon 35 % dan harga celana adalah Rp. 85.000,- dengan diskon 15 %. Uang sisa pembelian sepatu dan celana adalah ...' => [
									'Rp. 145.750,-'=>'salah',
									'Rp. 154.250,-'=>'salah',
									'Rp. 155.750,-'=>'salah',
									'Rp. 144.250,-'=>'salah',
									'Rp. 145.250,-'=>'benar'
								],
					'Panjang lantai sebuah kamar mandi adalah 73 kaki dan lebarnya 6 kaki. Lantai tersebut dipasang ubin yg berbentuk bujursangkar yang panjang sisinya 4 inci (1 kaki = 12 inci). Banyaknya ubin yang dibutuhkan untuk menutupi seluruh lantai adalah ...' => [
									'45'=>'salah',
									'138'=>'salah',
									'207'=>'salah',
									'414'=>'salah',
									'620'=>'benar'
								],
					'Sebuah lonceng jam berbunyi setiap 35 menit sekali. Lonceng tersebut berbunyi untuk pertama kali pada tengah malam. Pada malam yang sama, berapa menit lagikah lonceng tersebut akan berbunyi setelah pukul 04.12 ?' => [
									'7'=>'salah',
									'9'=>'salah',
									'14'=>'salah',
									'19'=>'salah',
									'28'=>'benar'
								],
					'Sebuah sepeda memiliki roda berjari-jari 21 cm. Jika roda berputar sebanyak 2.500 kali, maka panjang lintasan lurus yang dilaluinya adalah ...' => [
									'1,65 Km'=>'salah',
									'3,3 Km'=>'salah',
									'33 Km'=>'salah',
									'330 Km'=>'salah',
									'16,5 Km'=>'benar'
								],
					'Seekor burung berkicau setiap 14 menit dan sebuah bell berdering setiap 12 menit. Jika burung dan bell berbunyi bersama-sama pada pukul 12 siang maka pukul berapakah mereka pertama kali berbunyi setelah pukul 12 siang tadi?' => [
									'14.48'=>'salah',
									'14.24'=>'salah',
									'13.54'=>'salah',
									'13.24'=>'salah',
									'12.42'=>'benar'
								],
					'Sebuah balok kayu berukuran 15 dm  30 cm  12 dm dipotong menjadi kubus dengan ukuran terbesar yang dapat dibuat. Berapakah banyak- nya kubus yang dapat dibuat?' => [
									'6'=>'salah',
									'9'=>'salah',
									'12'=>'salah',
									'15'=>'salah',
									'20'=>'benar'
								],
					'Sebuah persegi panjang memiliki luas 588 cm² dengan panjang : lebar = 4 : 3. Jika sebuah tabung dengan tinggi 7 cm mempunyai jari-jari yang sama dengan lebar persegi panjang tersebut, maka volume tabung adalah…' => [
									'1178 cm³'=>'salah',
									'4312 cm³'=>'salah',
									'9702 cm³'=>'salah',
									'1078 cm³'=>'salah',
									'269,5 cm³'=>'salah'
								],
					'Nilai rata-rata ulangan matematika 13 siswa SMA adalah 7,4. Jika ada 3 orang siswa yang ikut ulangan susulan dengan nilai 6,9 ; 7,8 dan 9,1 maka nilai rata-rata ulangan matematika yang sekarang adalah ...' => [
									'7,50'=>'salah',
									'7,97'=>'salah',
									'8,00'=>'salah',
									'8,03'=>'salah',
									'8,33'=>'benar'
								],
					'Tidak ada dua perhiasan berlian yang mempu- nyai kilau yang sama. Cincin X dan Y terbuat dari berlian.<br>Kesimpulan:' => [
									'hanya cincin X dan Y yang berbeda kilaunya'=>'salah',
									'Cincin berlian X dan Y mempunyai kilau yang berbeda.'=>'salah',
									'Semua cincin berlian memiliki kilau yang berbeda dengan cincin X dan Y'=>'salah',
									'Ada cincin berlian selain cincin X dan Y yang memiliki kilau.'=>'salah',
									'Semua perhiasan yang sama bentuk dengan cincin X dan Y pasti berkilau.'=>'benar'
								]
				];

		foreach ($bagian7 as $key => $value) {
			$pertanyaan = new Pertanyaan();
			$pertanyaan -> id_jenis_pertanyaan = 7;
			$pertanyaan -> isi_pertanyaan = $key;
			$pertanyaan -> save();

			foreach ($value as $k => $v) {
				$pilihan_jawaban = new PilihanJawaban();
				$pilihan_jawaban -> id_pertanyaan = $pertanyaan->id_pertanyaan;
				$pilihan_jawaban -> isi_jawaban = $k;
				$pilihan_jawaban -> status_jawaban = $v;
				$pilihan_jawaban -> save();
			}
		}


		
    }
} 
