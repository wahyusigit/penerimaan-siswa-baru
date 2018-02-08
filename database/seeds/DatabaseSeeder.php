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

use Carbon\Carbon;

class DatabaseSeeder extends Seeder
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
    	$user->email = "panitia@panitia.com";
    	$user->password = bcrypt("panitia");
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

    	// $user = new User();
    	// $user->email = "siswa123@siswa123.com";
    	// $user->password = bcrypt("siswa123");
    	// $user->id_role = Role::where('name','siswa')->first()->id_role;
    	// $user->save();

    	$id_role_siswa = Role::where('name','siswa')->first()->id_role;

    	$data_tahun_ajaran = [
								['th_ajaran'=>'2018/2019'],
								['th_ajaran'=>'2019/2020'],
								['th_ajaran'=>'2020/2021'],
								['th_ajaran'=>'2021/2022'],
								['th_ajaran'=>'2022/2023'],
								['th_ajaran'=>'2023/2024'],
								['th_ajaran'=>'2024/2025'],
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
		$jadwal_pendaftaran->tgl_mulai_pendf = "2018-01-15";
		$jadwal_pendaftaran->tgl_akhir_pendf = "2018-01-22";
		$jadwal_pendaftaran->tgl_mulai_tes = "2018-01-23";
		$jadwal_pendaftaran->tgl_akhir_tes = "2018-01-30";
		$jadwal_pendaftaran->tgl_hasil_seleksi = "2018-01-31";
    	$jadwal_pendaftaran->save();

  //   	$jadwal_pendaftaran = new JadwalPendaftaran();
		// $jadwal_pendaftaran->nm_jadwal = "Gelombang 2";
		// $jadwal_pendaftaran->id_th_ajaran = 2;
		// $jadwal_pendaftaran->tgl_mulai_pendf = "2018-02-5";
		// $jadwal_pendaftaran->tgl_akhir_pendf = "2018-02-10";
		// $jadwal_pendaftaran->tgl_mulai_tes = "2018-02-11";
		// $jadwal_pendaftaran->tgl_akhir_tes = "2018-02-17";
		// $jadwal_pendaftaran->tgl_hasil_seleksi = "2018-02-19";
  //   	$jadwal_pendaftaran->save();


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
        foreach ($data_kelas as $data) {
        	$jurusan = new Kelas();
			$jurusan->kd_jurusan = $data['kd_jurusan'];
			$jurusan->kd_kelas = $data['kd_kelas'];
			$jurusan->nm_kelas = $data['nm_kelas'];
			$jurusan->id_th_ajaran = $data['id_th_ajaran'];
			$jurusan->save();
        }

		// $data_master = 	[
		// 					["SMP Negeri 1","Jl. Cikini Raya No. 87, Cikini Menteng","Kresno Puji Astuti","31922417","A"],
		// 					["SMP Negeri 10","Jl. Sumur Batu, Sumur Batu Kemayoran","MOCH. SOLEH, M.M.","214241406","A"],
		// 					["SMP Negeri 100","Jl. Obsidian No. 1, Kapuk Cengkareng","Tisno, Drs., MM","0216195170","A"],
		// 					["SMP Negeri 101","Jl. Palmerah Utara II/210 C, Palmerah Palmerah","Sri Ambar Kosasih S.Pd","215481510","A"],
		// 					["SMP Negeri 102","Jl. Sederhana Raya Cijantung II, Gedong Pasar Rebo","Susanto Marto Suwarno,S.Pd","8401794","A"],
		// 					["SMP Negeri 103","Jl. RA. Fadilah Cijantung, Cijantung Pasar Rebo","Drs. H. Ismail","8400005","A"],
		// 					["SMP Negeri 104","Jl. Mampang Prapatan XIII, Tegal Parang Mampang Prapatan","Safarudin Harahap, S.Pd, MM","7990565","A"],
		// 					["SMP Negeri 105","Jl. Raya Kembangan Selatan No. 54, Kembangan Selatan Kembangan","Drs. Suwondo. M.M","2158901059","A"],
		// 					["SMP Negeri 106","Jl. H. Baping No. 28, Ciracas Ciracas","Hari Mulyadi","8412710","A"],
		// 					["SMP Negeri 107","Jl. Raya Pejaten barat, Pejaten Barat Pasar Minggu","H. PONIRAN, S.Pd","7990977","A"],
		// 					["SMP Negeri 108","Jl. Flamboyan No. 53, Cengkareng Barat Cengkareng","","5550754","A"],
		// 					["SMP Negeri 109","Jl. Kesehatan No.105, Cipinang Melayu Makasar","BAMBANG SUPRIYADI, S,Pd","86601017","A"],
		// 					["SMP Negeri 11","Jl. Kerinci VII, Blok E, Gunung Kebayoran Baru","Drs. M. ZAMANUDDIN","217221665","A"],
		// 					["SMP Negeri 110","Jl. Kemajuan, Pesanggrahan Pesanggrahan","Drs. Wahyudin, MM","217342288","A"],
		// 					["SMP Negeri 111","Jl. Bhakti VII/2, Kemanggisan Palmerah","YURIANTO","215482423","A"],
		// 					["SMP Negeri 112","Jl. Al Teluk Gong Pejagalan, Pejagalan Penjaringan","Dra. Sri Murtini","6630332","A"],
		// 					["SMP Negeri 113","Jl. Kampung Bandan, Ancol Pademangan","Drs.MUHAMAD ASYARI.H.MM","6909030","A"],
		// 					["SMP Negeri 114","Jl. H.M. Darpi No. 2 Plumpang Semper, Tugu Utara K o j a","RAMLI","2143936225","A"],
		// 					["SMP Negeri 115","Jl. Tebet Utara III/K.H Abdullah Syafe'i, Tebet Timur T e b e t","H.HAMAMI,MM","218297511","A"],
		// 					["SMP Negeri 116","Jl.Sunter Permai Raya Sunter Agung, Sunter Agung Tanjung Priok","Drs Syarief Hidayat","6408125","A"],
		// 					["SMP Negeri 117","Jl. Pahlawan Revolusi, Pondok Bambu Duren Sawit","DRS. TUMPAK SINAGA, M.M","8610050","A"],
		// 					["SMP Negeri 118","JL. PRAMUKASARI I NO. 19, Rawasari Cempaka Putih","Drs. SURYANA, M.Si.","4245169","A"],
		// 					["SMP Negeri 119","Jl. Harapan Jaya IX, No. 5, Cempaka Baru Kemayoran","Drs. Hanom Iskandar, MM","4245304","A"],
		// 					["SMP Negeri 12","Jl. Wijaya IX / 50, Melawai Kebayoran Baru","H.Sujaelani,M.Pd","217208095","A"],
		// 					["SMP Negeri 120","Jl. Kamal Muara Raya No. 9, Kamal Muara Penjaringan","Suhail Effendey, M.Pd.","5557952","A"],
		// 					["SMP Negeri 121","Jl. Plumpang Semper No.20, Tugu Selatan K o j a","EDY WARSIH, M.Pd","2143930682","A"],
		// 					["SMP Negeri 122","Jl. SMP 122 No. 26, Kapuk Muara Penjaringan","Drs.PURWANTO","70288122","A"],
		// 					["SMP Negeri 123","Jl. Kelapa Gading I Komplek PT. HII, Kelapa Gading Timur Kelapa Gading","RAMLI,S.Pd","4525929","A"],
		// 					["SMP Negeri 124","Jl. Kemang Timur I/5, Bangka Mampang Prapatan","Mardhanius Supardiyono","7988101","A"],
		// 					["SMP Negeri 125","Jl. Utan Jati, Pegadungan Kalideres","Suryana, M.Pd","5417532","A"],
		// 					["SMP Negeri 126","Jl. SMP 126, Batu Ampar Kramat Jati","Drs.SUHARTONO","8094151","A"],
		// 					["SMP Negeri 127","Jl. Raya Kebon Jeruk No. 126A, Kebon Jeruk Kebon Jeruk","Supriheni, S.Pd.MM","5480114","A"],
		// 					["SMP Negeri 128","Jl. Herkules Komplek Skadron, Halim Perdana Kusumah Makasar","ACHMAD SOBARI","218009861","A"],
		// 					["SMP Negeri 129","Jl. Warakas VI, Papanggo Tanjung Priok","","43935165","A"],
		// 					["SMP Negeri 13","Jl. Tirtayasa Raya Blok O/1, Melawai Kebayoran Baru","Drs. H. Jaanan, M.Pd","217262939","A"],
		// 					["SMP Negeri 130","Jl. KS. Tubun I Kota Bambu Utara, Kota Bambu Utara Palmerah","Kusnadi","2156979384","A"],
		// 					["SMP Negeri 131","Jl. R.M. Kahfi I No. 50, Cipedak Jagakarsa","Drs. MARLAN KASNI","7270218","A"],
		// 					["SMP Negeri 131 Terbuka","Jl. R.M. Kahfi I No. 50, Cipedak Jagakarsa","Drs. DJOKO TOWO HADI BIROWO","7270218","-"],
		// 					["SMP Negeri 132","Jl. Tawangmangu No.2, Kedaung Kali Angke Cengkareng","RUSWAN EFFENDI","216198897","A"],
		// 					["SMP Negeri 133","Pulau Pramuka, Pulau Panggang Kepulauan Seribu Utara","MAJID","2134228517","B"],
		// 					["SMP Negeri 134","Jl. Taman Maruya Ilir Blok A No. 18, Meruya Utara Kembangan","Suryanti, M.Pd","5842449","A"],
		// 					["SMP Negeri 135","Jl. Teluk Palu No. 35, Pondok Bambu Duren Sawit","Janjang Hanaris, S.Pd.","218617871","A"],
		// 					["SMP Negeri 136","Jl. Bendungan Melayu No. 80, Tugu Selatan K o j a","Afrida Hanum Siregar, S.Pd","43911114","A"],
		// 					["SMP Negeri 137","Jl. Cemp. Putih Barat No. 15/26, Cempaka Putih Barat Cempaka Putih","Drs. SUHERMAN, M.Pd","4244612","A"],
		// 					["SMP Negeri 138","Jl. Pahlawan Komarudin Cakung Jak-tim, Pulo Gebang Cakung","Hj. Herniwati, S.Pd, M.M","4608257","A"],
		// 					["SMP Negeri 138 Terbuka","Jl. Pahlawan Komaruddin, Pulo Gebang Cakung","Hj. Siti Istuti, S.Pd, MM","4608257","-"],
		// 					["SMP Negeri 139","Jl. Bunga Rampai X, Malaka Jaya Duren Sawit","Drs. Muhammad Dimyati, MM","8622390","A"],
		// 					["SMP Negeri 14","Jl. Matrman Raya No. 177, Bali Mester Jatinegara","Drs. Dwi Santosa","218195507","A"],
		// 					["SMP Negeri 140","Jl. Komp. Sekneg Blok A., Sunter Agung Tanjung Priok","Drs. Elman Sihombing","6459389","A"],
		// 					["SMP Negeri 141","Jl. Pondok Jaya VIII/15 B, Pela Mampang Mampang Prapatan","Drs, Setiabudi, M.Pd","7192868","A"],
		// 					["SMP Negeri 141 Terbuka","Jl. Pondok Jaya VIII/15B, Pela Mampang Mampang Prapatan","Drs, Setiabudi, M.Pd","7192868","-"],
		// 					["SMP Negeri 142","Jl. Joglo Raya Kembangan, Joglo Kembangan","Jehu Sinaga","5844666","A"],
		// 					["SMP Negeri 143","Jl. Cilincing Bakti IX, Cilincing Cilincing","PRIYANTO","4402004","A"],
		// 					["SMP Negeri 144","Jl. Raya Bekasi Km. 23 Cakung, Cakung Barat Cakung","Drs. AGUS SUMARNO, MM","214617313","A"],
		// 					["SMP Negeri 145","Jl. Menteng Pulo Ujung, Menteng Atas Setia Budi","Ahmad, S.Pd, M.Si","218298205","A"],
		// 					["SMP Negeri 146","Jl. Balai Rakyat, Ujung Menteng Cakung","Drs.H.Nasrudin.MA.Pd","4612295","A"],
		// 					["SMP Negeri 147","Jl. Jambore Cibubur, Cibubur Ciracas","TIAR MARBUN, M.Pd","8719292","A"],
		// 					["SMP Negeri 148","Jl. BB. I. Cipinang Muara, Cipinang Muara Jatinegara","ROSNANI, S.Pd. M.Si.","8199585","A"],
		// 					["SMP Negeri 149","Jl. Cipinang Besar Selatan, Cipinang Besar Selatan Jatinegara","Drs.H.ISMONO","8506210","A"],
		// 					["SMP Negeri 15","Jl. Prof. Supomo Menteng, Menteng Dalam T e b e t","Dra. Nunuk Astutiningtyas, M.P","8312669","B"],
		// 					["SMP Negeri 150","Jl. Batu Tumbuh VII, Kramat Jati Kramat Jati","LANGAS SIANTURI,Drs,MM","218093810","A"],
		// 					["SMP Negeri 151","Jl. Kepil No.1 . Perumpel II, Rawa Badak Selatan K o j a","Drs. SUJARWO, M.Si","4303682","A"],
		// 					["SMP Negeri 152","Jl. Sunter Jaya IV, Sunter Jaya Tanjung Priok","Drs. Gunawan MS","6507186","A"],
		// 					["SMP Negeri 153","Jl. Panjang Cidodol No. 1, Grogol Selatan Kebayoran Lama","Dra.RR. KUS PRIHATININGRUM, M.","7394260","A"],
		// 					["SMP Negeri 154","Jl. Pengadengan Brt XIII No. 46, Pengadegan Pancoran","Suryoto","7991643","A"],
		// 					["SMP Negeri 155","Jl. Cikoko Barat IV, Cikoko Pancoran","SUPRIYONO, M.Pd.","7987400","A"],
		// 					["SMP Negeri 156","Jl. Kramat Pulo Gundul III, No. 4, Johar Baru Johar Baru","","214214306","A"],
		// 					["SMP Negeri 157","Jl. Al Baidho, Lubang Buaya Cipayung","Drs. Humisar Sihite, MM","8404810","A"],
		// 					["SMP Negeri 158","Jl. TB.Badarudin, Jatinegara Kaum Pulo Gadung","Drs. LUMBA SIANIPAR","4721772","A"],
		// 					["SMP Negeri 158 Terbuka","Jl. TB. Badaruddin, Jatinegara Kaum Pulo Gadung","","214721772","-"],
		// 					["SMP Negeri 159","Jl. Jembatan Besi Raya No. 24, Jembatan Besi Tambora","H. ABDUL RIVAI H. S.Pd.,M.Si","216302655","B"],
		// 					["SMP Negeri 16","Jl. Palmerah Barat 59, Grogol Utara Kebayoran Lama","Drs. H. Agus Susila","5483415","A"],
		// 					["SMP Negeri 160","Jl. SMP 160 TMII, Ceger Cipayung","Drs. H. Zainal Alimin","8441330","A"],
		// 					["SMP Negeri 161","Jl. Delman Utama I, Kebayoran Lama Utara Kebayoran Lama","H. Nana Sujana, S.Pd.,M.M.","7247127","A"],
		// 					["SMP Negeri 162","Jl. Marunda Baru IV No. 1, Marunda Cilincing","Sus Indah Eko Mustikoweni, M.P","44851009","A"],
		// 					["SMP Negeri 162 Terbuka","Jl. Marunda Baru IV No. 1, Marunda Cilincing","SUS INDAH EKO MUSTIKOWENI","2144851009","-"],
		// 					["SMP Negeri 163","Jl. Empang III, Pejaten Timur Pasar Minggu","Dra. Dewi Riandari, M.Pd.","7994079","A"],
		// 					["SMP Negeri 164","Jl. Darma Putra Raya No. 10, Kebayoran Lama Selatan Kebayoran Lama","TRI PADMA PUJIANTARA,MM.","7260333","A"],
		// 					["SMP Negeri 165","Jl. Balai Rakyat III No.16, Pondok Bambu Duren Sawit","Dra. Ekasari Kartikaningtyas,","8614106","A"],
		// 					["SMP Negeri 166","Jl. Kedondong, Jagakarsa Jagakarsa","MUHAMAD ERMAWAN, S.Pd","217270219","A"],
		// 					["SMP Negeri 167","Jl. Lingkar Duren Sawit, Duren Sawit Duren Sawit","H. TAUFIK, S.Pd. MM","8620641","A"],
		// 					["SMP Negeri 168","Jl. P. Komarudin Buaran Cakung, Cakung Barat Cakung","Drs.Suhendi, M. Pd","4610680","A"],
		// 					["SMP Negeri 169","Jl. Peta Utara Pegadungan, Pegadungan Kalideres","AGUS KAHARUDIN, M.Pd","216194489","A"],
		// 					["SMP Negeri 17","Jl. Karang Anyar 9 - 14, Karang Anyar Sawah Besar","Drs. Tri Puji Hartono. M.Pd.","216390329","A"],
		// 					["SMP Negeri 170","Jl. Kepu Pegangsaan Dua No. 17, Pegangsaan Dua Kelapa Gading","DIAH WAYANTI, M.Si","4602817","A"],
		// 					["SMP Negeri 171","Jl. H. Baping, Rambutan Ciracas","MARINTANG GAJA","218414989","B"],
		// 					["SMP Negeri 172","Jl. Stasiun Cakung, Pulo Gebang Cakung","Sapari, S.Pd., MM.","4805079","A"],
		// 					["SMP Negeri 173","Jl. Alur Laut No. 57, Rawa Badak Utara K o j a","Drs. Hartono, M.Pd","4303610","A"],
		// 					["SMP Negeri 174","Jl. H. Baping, Susukan Ciracas","Dra.Hj.Suparmini,M.Pd","218411005","A"],
		// 					["SMP Negeri 175","Jl. Kebagusan Wates, Jagakarsa Jagakarsa","Drs. Agus Isnadi, M.Pd.","7811978","A"],
		// 					["SMP Negeri 176","Jl. Raya Duri Kosambi, Duri Kosambi Cengkareng","Dra. OOM KOMALASARI","215415850","A"],
		// 					["SMP Negeri 177","Jl. Raya Kodam Bintaro, Pesanggrahan Pesanggrahan","Yoyo Sutaryo, M.Pd.","217355975","A"],
		// 					["SMP Negeri 178","Jl. Mawar No. 6 Bintaro, Bintaro Pesanggrahan","Drs. SUSMULYADI, M.Pd.","2173883370","A"],
		// 					["SMP Negeri 179","Jl. Kalisari, Kalisari Pasar Rebo","Dra.Florentina Wartinem MM","8711073","A"],
		// 					["SMP Negeri 179 Terbuka","Jl. Kalisari, Kalisari Pasar Rebo","","8711073","-"],
		// 					["SMP Negeri 18","Jl. Menteng No. 3, Kebon Sirih Menteng","","3193556","A"],
		// 					["SMP Negeri 180","Jl. Bambu Wulung, Bambu Apus Cipayung","SUPROJO","8441501","A"],
		// 					["SMP Negeri 181","Jl. Masjid I No.5, Karet Tengsin Tanah Abang","Drs.Bambang Tajudin,M.Pd","5738060","B"],
		// 					["SMP Negeri 182","Jl. Kalibata Timur I, Kalibata Pancoran","Dra. Rini Indri Hastuti, M.Pd","7994641","A"],
		// 					["SMP Negeri 183","Jl. Cempaka Baru VII, No. 47, Cempaka Baru Kemayoran","Drs. SLAMET SUPRIYANTO","4245884","B"],
		// 					["SMP Negeri 184","Jl. Lapan, Pekayon Pasar Rebo","Drs. Komar","218711341","A"],
		// 					["SMP Negeri 185","Jl. Kemandoran I Grogol Utara, Grogol Utara Kebayoran Lama","Drs. Iwan Purwanto","5307631","B"],
		// 					["SMP Negeri 186","Jl. Peta Barat Kalideres, Kalideres Kalideres","Drs. Juhedi, M.Pd.","5412241","A"],
		// 					["SMP Negeri 187","Jl. Gaga Utama, Semanan Kalideres","Drs. Sunardi","215455859","A"],
		// 					["SMP Negeri 188","Jl. Tanah Merdeka, Rambutan Ciracas","Drs. ABDUL ROJAK, M.Pd","218403136","A"],
		// 					["SMP Negeri 189","Jl. H. Rausin No.89, Kelapa Dua Kebon Jeruk","Drs. ROHMANI, MM.","5300625","A"],
		// 					["SMP Negeri 19","Jl. Bumi Blok E No. 21, Gunung Kebayoran Baru","Drs.H.Joko Suramto,M.Pd","217250219","A"],
		// 					["SMP Negeri 190","Jl. Prepedan Kamal, Kamal Kalideres","Drs. MARSAMTO, M.Pd.","215552419","A"],
		// 					["SMP Negeri 190 Terbuka","Jl. Prepedan Kamal, Kamal Kalideres","Drs. Marsamto, M.Pd","215552419","-"],
		// 					["SMP Negeri 191","Jl. Duta Raya No. 2, Duri Kepa Kebon Jeruk","ASMUNI, MM","215659736","A"],
		// 					["SMP Negeri 192","Jl. Kramat IV No.100, Lubang Buaya Cipayung","BUDI SUSETIO, S.Pd","8467464","B"],
		// 					["SMP Negeri 193","Jl. Irigasi, Ujung Menteng Cakung","Drs. Karyoto, M.Pd","214612775","A"],
		// 					["SMP Negeri 194","Jl. Pendidikan Komp. IKIP IX, Duren Sawit Duren Sawit","Dra. DEWI ARIESTIN HASTUTI","218628255","A"],
		// 					["SMP Negeri 195","Jl. Sawah Barat Duren Sawit 48, Duren Sawit Duren Sawit","Herniwati","218614104","A"],
		// 					["SMP Negeri 196","Jl. Mabes TNI, Pondok Ranggon Cipayung","Drs. Imam Santoso, M.M","8441985","A"],
		// 					["SMP Negeri 197","Jl. Raya Kedoya Utara No.100, Kedoya Utara Kebon Jeruk","IDRIS, S.Pd","5801793","A"],
		// 					["SMP Negeri 198","Jl. Pertanian Klender, Klender Duren Sawit","RITA HERLINDA, M.Pd.","8616425","A"],
		// 					["SMP Negeri 199","Jl. Arabika VIII Blok AC3, Pondok Kopi Duren Sawit","Bambang Sugianto, S.Pd","218624937","A"],
		// 					["SMP Negeri 2","Jl. Mardani Raya, Johar Baru Johar Baru","Drs. Budiantoro, M.Si.","4243788","A"],
		// 					["SMP Negeri 20","Jl. Komp. Bulak Rantai, Kramat Jati Kramat Jati","","70912033","A"],
		// 					["SMP Negeri 20 Terbuka","Jl. Rantai Mas KPAD Bulak Rantai, Kampung Tengah Kramat Jati","Drs.Dedy Suryadi, M.MPd","70912033","-"],
		// 					["SMP Negeri 200","Jl. Rorotan IX No. 2, Rorotan Cilincing","Sapto Winarni S. Pd","44850643","A"],
		// 					["SMP Negeri 201","Jl. Kayu Besar, Cengkareng Timur Cengkareng","Yayah Rohayah, S.Pd","215553675","A"],
		// 					["SMP Negeri 202","Jl. Buluh Perindu IV/I, Duren Sawit Duren Sawit","SUDARNO, S.Pd","8612292","B"],
		// 					["SMP Negeri 203","Jl. Raya Kalisari - LAPAN, Kalisari Pasar Rebo","Drs. ASROFI, MM","8707228","A"],
		// 					["SMP Negeri 204","Jl. Peta Utara Pegadungan, Pegadungan Kalideres","Drs.Mokh. Fatkhuri Makrus,M.Pd","5450436","A"],
		// 					["SMP Negeri 205","Jl. Semanan Raya No. 2, Semanan Kalideres","Moh. Hidayat S. Pd","215446287","A"],
		// 					["SMP Negeri 206","Jl. Meruya Selatan, Meruya Selatan Kembangan","Drs. Nana Sutrisna, M.Pd","5850137","A"],
		// 					["SMP Negeri 207","Jl. Raya Maruya Utara Rt.07/02, Meruya Srengseng Kembangan","SUBADRI","215846707","A"],
		// 					["SMP Negeri 208","Jl. Raya Centex, Ciracas Ciracas","Drs.H.Safari Budiharjo, M.Pd","8411088","A"],
		// 					["SMP Negeri 209","Jl. Pelita, Kampung Tengah Kramat Jati","Dinas, S.Pd","8009013","A"],
		// 					["SMP Negeri 21","Jl. Bandengan Utara 80, Penjaringan Penjaringan","Drs. HARDIWAN, M. Si.","6691850","A"],
		// 					["SMP Negeri 210","Jl. Raya Centex, Ciracas Ciracas","H. FATHULLOH, M. Pd","8411183","A"],
		// 					["SMP Negeri 211","Jl. Srengseng Sawah, Srengseng Sawah Jagakarsa","Minik, M.Pd.","7270204","A"],
		// 					["SMP Negeri 212","Jl. Benda Atas Cilandak timur, Pejaten Timur Pasar Minggu","Drs. Nuryamin, M.Pd","7800417","A"],
		// 					["SMP Negeri 213","Jl. Malaka I Perlum. Klender, Malaka Sari Duren Sawit","Dra. Hj. Libertina, MPd.","8621548","A"],
		// 					["SMP Negeri 214","Jl. Rajawali, Halim Perdana Kusumah Makasar","BAMBANG DWI PURWANTO, S.Pd","218096021","A"],
		// 					["SMP Negeri 215","Jl. Melati Taman Maruya Ilir Blok B, Meruya Utara Kembangan","Dra. Mardiana","5850391","A"],
		// 					["SMP Negeri 216","Jl. Salemba Raya No. 18, Kenari S e n e n","Wahyudi","31931857","A"],
		// 					["SMP Negeri 216 Terbuka","Jl. Salemba Raya No. 18, Kenari S e n e n","Wahyudi","31931857","-"],
		// 					["SMP Negeri 217","Jl. Gongseng Raya, Baru Pasar Rebo","Suyanto, Drs.M.M","8401389","A"],
		// 					["SMP Negeri 218","Jl. Manara Jati Padang, Jati Padang Pasar Minggu","WAHYU HARIYADI, Drs. MM","7807305","A"],
		// 					["SMP Negeri 219","Jl. Raya Joglo Komp.Pemadam Kebakaran, Joglo Kembangan","Asep Pujarsono, S.Pd","215853326","A"],
		// 					["SMP Negeri 22","Jl. Jembatan Batu No. 74, Pinangsia Taman Sari","Ngudi Nor, S.Pd, MM","6269841","B"],
		// 					["SMP Negeri 220","Jl. Mangga I, Duri Kepa Kebon Jeruk","Subroto, S.Pd","5687919","A"],
		// 					["SMP Negeri 221","Jl. Sunter Karya Selatan, Sunter Agung Tanjung Priok","Dra Endang Titi Prihati","216458213","A"],
		// 					["SMP Negeri 222","Jl. Raya Ceger TMII, Ceger Cipayung","Saheri, S.Pd","218445662","A"],
		// 					["SMP Negeri 223","Jl. Surilang No. 6, Gedong Pasar Rebo","Drs. Abdul Azis","8403316","A"],
		// 					["SMP Negeri 224","Jl. SMPN 224 Kebon Duaratus, Kamal Kalideres","Drs. TUJU WIDODO","5560202","A"],
		// 					["SMP Negeri 225","Jl. Warung Gantung Kp. Kojan Kalideres, Kalideres Kalideres","","215409941","A"],
		// 					["SMP Negeri 226","Jl. Kayu Kapur No. 2, Pondok Labu Cilandak","Drs. Moh. Khotim, M.Pd","7501270","A"],
		// 					["SMP Negeri 227","Jl. Mesjid Al Fajri, Pejaten Barat Pasar Minggu","Uyat Supriyatna","7971338","A"],
		// 					["SMP Negeri 228","Jl. Sumur Batu Raya No. 6, Sumur Batu Kemayoran","Drs. H. Sukandi, M Si","4202430","A"],
		// 					["SMP Negeri 229","Jl. Raya Kebon Jeruk NO. 39, Kebon Jeruk Kebon Jeruk","DR. Tabhita Sri Hartini., S.Si","5303652","A"],
		// 					["SMP Negeri 23","Jl. Pademangan Timur VI, Pademangan Timur Pademangan","Drs. IMAM SANTOSO, MM","64715503","A"],
		// 					["SMP Negeri 230","Jl. TPU - Pondok Ranggon, Pondok Ranggon Cipayung","Mimin Sukmini, S.Pd.","218440283","B"],
		// 					["SMP Negeri 231","Jl. Raya Tugu Semper, Semper Barat Cilincing","Nimrod Lumban Tobing, Drs","4400643","A"],
		// 					["SMP Negeri 232","Jl. Gading Raya No. 16, Pisangan Timur Pulo Gadung","SUKANDAR, S.Pd","4712538","A"],
		// 					["SMP Negeri 233","Jl. H. Abdur Rachman No. 68, Cibubur Ciracas","Etin Rohaetin, M.Pd.","8705357","A"],
		// 					["SMP Negeri 234","Jl. Kayu Tinggi Cakung Timur, Cempaka IV, Cakung Timur Cakung","UJANG DULHADI, S.Pd.","4611559","A"],
		// 					["SMP Negeri 234 Terbuka","Jl. Raya Kayu Tinggi, Cakung Timur Cakung","UJANG DULHADI, S.Pd.","4611559","A"],
		// 					["SMP Negeri 235","Jl. Pesanggrahan Raya No.101, Pesanggrahan Pesanggrahan","Dra. MARTINI, MM","217340973","A"],
		// 					["SMP Negeri 236","Jl. Raya Penggilingan Komp. PIK, Penggilingan Cakung","Drs. HERI WIHARTO, M. Pd","4604272","A"],
		// 					["SMP Negeri 237","Jl. Bambu Petung, Bambu Apus Cipayung","Kirwanta,S.Pd","8448460","A"],
		// 					["SMP Negeri 238","Jl. Kalibata VI No. 2, Duren Tiga Pancoran","ITA NURWATI, S.Pd, M.Si","7991565","A"],
		// 					["SMP Negeri 239","Jl. Nangka 58, Tanjung Barat Jagakarsa","Sugianto, M.Pd.","7818319","A"],
		// 					["SMP Negeri 24","Jl. Dukuh V, Dukuh Kramat Jati","Endang Sudirman, S.Pd","8404434","A"],
		// 					["SMP Negeri 240","Jl. H. Raya No. 16 B, Gandaria Utara Kebayoran Baru","Dra. Lily Handasah","217204711","A"],
		// 					["SMP Negeri 241","Pulau Tidung, Pulau Tidung Kepulauan Seribu Selatan","JARWOTO, S.Pd","2133111241","A"],
		// 					["SMP Negeri 242","Jl. Lenteng Agung, Lenteng Agung Jagakarsa","Dra Stephanes Sri Wuryanti MPd","217869935","A"],
		// 					["SMP Negeri 243","Jl. Cipinang Jaya II, Cipinang Besar Utara Jatinegara","","8199916","B"],
		// 					["SMP Negeri 244","Jl. Cilincing Bakti VI No.28, Cilincing Cilincing","Drs. Ujang Kusuma, M.Si.","4400872","A"],
		// 					["SMP Negeri 244 Terbuka","Jl. Cilincing Bakti VI, Cilincing Cilincing","","214400872","A"],
		// 					["SMP Negeri 245","Jl. H. Muchtar Raya, Petukangan Utara Pesanggrahan","Hj. FARIDAH","215849265","A"],
		// 					["SMP Negeri 246","Jl. SPG 7, Lubang Buaya Cipayung","Drs. Johan Supriyadi, M.Pd","8404491","B"],
		// 					["SMP Negeri 247","Jl. Mampang Prapatan XIII, Tegal Parang Mampang Prapatan","Drs. ROKHIL SISWANTO","217943835","A"],
		// 					["SMP Negeri 248","Jl. Kamal Raya, Cengkareng Timur Cengkareng","Drs. SOENARYADI","215451352","A"],
		// 					["SMP Negeri 249","Jl. Jaya 25 No.41, Cengkareng Barat Cengkareng","Sriyono, M.Pd","5550245","A"],
		// 					["SMP Negeri 25","Jl. BB. I. Cipinang Muara, Cipinang Muara Jatinegara","Dra. Indarwanti, M.Pd","8195679","A"],
		// 					["SMP Negeri 250","Jl. KHM. Na'im III, Cipete Utara Kebayoran Baru","BAMBANG SUTEJO, M.Pd","7200396","A"],
		// 					["SMP Negeri 251","Jl. Mawar Kamp. Asem, Cijantung Pasar Rebo","Yuliarko, S.Pd.","218711079","A"],
		// 					["SMP Negeri 252","Jl. H. Naman Pondok Kelapa, Pondok Kelapa Duren Sawit","Drs. Dradjat Firdaus, M.Pd","8640755","A"],
		// 					["SMP Negeri 252 Terbuka","Jl. H. Naman Pondok Kelapa, Duren Sawit Duren Sawit","Drs. Bambang Gandana, MM","8640755","A"],
		// 					["SMP Negeri 253","Jl. Antariksa Kp. Alang-alang, Cipedak Jagakarsa","Drs. WAWANG DHARMAWAN, M.Pd","2178645","A"],
		// 					["SMP Negeri 254","Jl. Gandaria V, Jagakarsa - Jaksel, Jagakarsa Jagakarsa","Sri Sukanti","7270842","A"],
		// 					["SMP Negeri 255","Jl. Radin Inten II Duren Sawit, Duren Sawit Duren Sawit","Janjang Hanaris,S.Pd","8601993","A"],
		// 					["SMP Negeri 256","Jl. Balai Rakyat Cakung Timur, Cakung Timur Cakung","Drs. Gatot Hadiprayogo, M.Pd.","4603753","A"],
		// 					["SMP Negeri 257","Jl. Kelurahan Rambutan, Rambutan Ciracas","Drs.Tri Januari Purwanto,M. Pd","8404160","A"],
		// 					["SMP Negeri 257 Terbuka","Jl. Kelurahan Rambutan, Rambutan Ciracas","Drs.Tri Januari Purwanto, M.Pd","8404160","A"],
		// 					["SMP Negeri 258","Jl. Cibubur II Blok Duku, Cibubur Ciracas","UNTORO WIDODO, S.Pd","218705669","A"],
		// 					["SMP Negeri 259","Jl. Laksmana VIII Komplek Karyawan TMII, Bambu Apus Cipayung","Dra. Hj. Sri Yanti, M.Pd","218467855","A"],
		// 					["SMP Negeri 26","Jl. Kebon Pala I, Kampung Melayu Jatinegara","Drs. Sapto Riyadi, M.Pd","8196643","A"],
		// 					["SMP Negeri 260","Pulau Harapan, Pulau Harapan Kepulauan Seribu Utara","Drs. M.MASUDI, MM","87786214548","A"],
		// 					["SMP Negeri 261","Jl. Muara Angke Pluit, Pluit Penjaringan","Drs. Yuswadhi Permana","6682126","A"],
		// 					["SMP Negeri 261 Terbuka","Jl. Muara Angke, Pluit Penjaringan","Drs. YUSWADHI PERMANA","6682126","-"],
		// 					["SMP Negeri 262","Jl. Kayu Tinggi Cakung Timur, Cakung Timur Cakung","IR.H.AHMAD BADRUL HURAEZ,M.MPd","4612276","A"],
		// 					["SMP Negeri 262 Terbuka","Jl. Kayu Tinggi Cakung, Cakung Timur Cakung","SANUSI, S.Pd, M.MPd","4612276","-"],
		// 					["SMP Negeri 263","Jl. Dukuh IV, Dukuh Kramat Jati","Hj. Tri Supriani, M.MPd","8413638","A"],
		// 					["SMP Negeri 264","Jl. Barkah I, Rawa Buaya Cengkareng","Ngudi Nor, S.Pd, MM","2158107","A"],
		// 					["SMP Negeri 264 Terbuka","Jl. Barkah I 001/03 Rawabuaya, Rawa Buaya Cengkareng","Ngudi Nor, S.Pd,MM","2158107","A"],
		// 					["SMP Negeri 265","Jl. Asem Baris II/10, Kebon Baru T e b e t","H. Taufik, S.Pd, M.M","218302935","A"],
		// 					["SMP Negeri 266","Jl. Cilincing Bakti VI, Cilincing Cilincing","Drs. Sumarno, MM","214402745","A"],
		// 					["SMP Negeri 267","Jl. Mairin Swadarma Raya, Ulujami, Pesanggrahan Pesanggrahan","Drs.H.EH.Darmawijaya,SH,M.Si","215852291","A"],
		// 					["SMP Negeri 268","Jl. SD Inpres, Kebon Pala Makasar","Drs. WASIDI","218007517","A"],
		// 					["SMP Negeri 269","Jl. Harapan Mulia, Harapan Mulia Kemayoran","SURURI","214212795","A"],
		// 					["SMP Negeri 27","Jl. LINGKAR KOMP.PTB Duren Sawit, Duren Sawit Duren Sawit","Helia Askarina,S.Si","8615189","A"],
		// 					["SMP Negeri 270","Jl. Kompi Udin, Pegangsaan Dua Kelapa Gading","Drs. SOLICHIN","4529223","A"],
		// 					["SMP Negeri 271","Jl. Pahlawan Sukabumi Sel.VI/F1, Sukabumi Selatan Kebon Jeruk","WARYANTO, S.AB, MM","215330627","A"],
		// 					["SMP Negeri 272","JL. AL BAIDHO 1, Lubang Buaya Cipayung","Dra. Hj. UMIYATI AS, M.Pd.","2187791857","A"],
		// 					["SMP Negeri 273","Jl. Kampung Bali 24/I, Kampung Bali Tanah Abang","H. Sarbini, S.Pd, MM","3143012","A"],
		// 					["SMP Negeri 274","Jl. Empang Bahagia Raya 4B, Jelambar Grogol Petamburan","Drs. Sumitra","5684386","A"],
		// 					["SMP Negeri 275","Jl. Jengki Cipinang Asem, Kebon Pala Makasar","SUBAGIYANA, S.Pd","8004083","A"],
		// 					["SMP Negeri 276","Jl. Srengseng Sawah, Srengseng Sawah Jagakarsa","Drs. Sumantri","7866427","A"],
		// 					["SMP Negeri 277","Jl. Sindang Terusan No. 34 A, Rawa Badak Utara K o j a","Drs. SUPRIYO, M.Pd","43934526","B"],
		// 					["SMP Negeri 278","Jl. Kamal Benda Raya No. 16, Kamal Kalideres","SANUSI","215557944","B"],
		// 					["SMP Negeri 279","Jl. Mahoni No. 44, Lagoa K o j a","NURHASAN RAIS","43935194","A"],
		// 					["SMP Negeri 28","Jl. Mardani No.17, Johar Baru Johar Baru","SURACHMAN, S.Pd","4246165","A"],
		// 					["SMP Negeri 28 Terbuka","Jl. Mardani No. 17, Johar Baru Johar Baru","Surachman, S.Pd","4246165","-"],
		// 					["SMP Negeri 280","Jl. Cilacap No. 5, Menteng Menteng","Yayuk Sri Widayanti, M.Pd","213155527","A"],
		// 					["SMP Negeri 281","Jl. Kerja Bakti No. 1, Kramat Jati Kramat Jati","Drs. H. Sugiyanto, M.Si","8091021","A"],
		// 					["SMP Negeri 282","Jl. Taman Nyiur (BI), Sunter Agung Tanjung Priok","Drs. SUJIYONO","216505777","B"],
		// 					["SMP Negeri 283","Jl. Bambu Hitam, Bambu Apus Cipayung","Sulaksono, S.Pd","2184598876","A"],
		// 					["SMP Negeri 284","Jl. Raya Rawa Bebek, Pulo Gebang Cakung","ROMUALDUS LADO, SH, MM","4806031","B"],
		// 					["SMP Negeri 285","Jln. Pulau Edam, Pulau Untung Jawa Kepulauan Seribu Selatan","H. MANSUR, M.Pd.","2132403951","A"],
		// 					["SMP Negeri 286","JL.RAWA KEPA VIII, Tomang Grogol Petamburan","IIS ABDUL MUIS, S.PD","215637038","B"],
		// 					["SMP Negeri 287","Jl. Sarbini I, Pinang Ranti Makasar","Drs.JOHAN SUPRIYADI, M.Pd","218012287","A"],
		// 					["SMP Negeri 288","PULAU LANCANG, Pulau Tidung Kepulauan Seribu Selatan","H. MANSUR, M.Pd","0","A"],
		// 					["SMP Negeri 289","Jl. Tipar Cakung, Suka Pura Cilincing","M. YUSUP CORUA","214408312","-"],
		// 					["SMP Negeri 29","Jl. Bumi Blok E, Gunung Kebayoran Baru","Dra. Siti Hairunisa, M.Pd","7247493","A"],
		// 					["SMP Negeri 3","Jl. Manggarai Utara IV/6, Manggarai T e b e t","Subarno, S.Pd. M.M.","8303844","A"],
		// 					["SMP Negeri 30","Jl. Anggrek No. 4 Koja, Rawa Badak Utara K o j a","Drs Mulyana","","A"],
		// 					["SMP Negeri 31","Jl. Peninggaran Barat III, Kebayoran Lama Utara Kebayoran Lama","Dra.Erni Sasmita","217239730","A"],
		// 					["SMP Negeri 32","Jl. Pejagalan No. 51, Pekojan Tambora","TISNO","216917188","A"],
		// 					["SMP Negeri 33","Jl. Menara Air I, Manggarai T e b e t","Drs. WARNO, M.Si","8304489","A"],
		// 					["SMP Negeri 34","Jl. Pademangan Timur VII, Pademangan Timur Pademangan","Drs. Nana Suryana, M.Pd","","A"],
		// 					["SMP Negeri 35","Jl.Kayu Manis Gg.Kh.Raiman 71B Condet, Bale Kembang Kramat Jati","Dra. Wasyati,M.Pd","8004945","A"],
		// 					["SMP Negeri 36","Jl. Pedati, Cipinang Cempedak Jatinegara","H. Mohammad Entong, S.Pd","8197363","A"],
		// 					["SMP Negeri 37","Jl. Taman Wijaya Kusuma Raya, Pondok Labu Cilandak","Drs.Rusdi.M.Pd","217695272","A"],
		// 					["SMP Negeri 38","Jl. Karet Pasar Baru Barat I No.14, Karet Tengsin Tanah Abang","Luki Viverini","2157851740","A"],
		// 					["SMP Negeri 39","Jl. Gajah Mada No. 3 - 5, Petojo Utara Gambir","Drs. Misto","2163851721","A"],
		// 					["SMP Negeri 4","Jl. Perwira No. 10 Pasar Baru, Pasar Baru Sawah Besar","Drs. ACHMAD JAZULI, M.Pd.","213844414","A"],
		// 					["SMP Negeri 40 SSN","Jl. Danau Limboto Pejompongan, Bendungan Hilir Tanah Abang","Bambang Kulup Karnoto","5737815","A"],
		// 					["SMP Negeri 41","Jl. Harsono RM. Ragunan Pasarminggu, Ragunan Pasar Minggu","Drs. Afrisyaf Amir M.Pd","78838475","A"],
		// 					["SMP Negeri 41 Terbuka","Jl. Harsono RM. Ragunan Pasarminggu, Ragunan Pasar Minggu","Drs. Afrisyaf Amir M.Pd","7814294","-"],
		// 					["SMP Negeri 42","Jl. Pademangan III, Pademangan Timur Pademangan","Drs. Subardi, M.Pd","6400355","A"],
		// 					["SMP Negeri 43","Jl. Kapten P. Tendean No. 11, Mampang Prapatan Mampang Prapatan","Dra. Endang Amirah, MM","7988023","A"],
		// 					["SMP Negeri 44","JL. GADING RAYA VII, Pisangan Timur Pulo Gadung","EDY PURWANTO, DRS., S.Pd.","4891725","A"],
		// 					["SMP Negeri 45","Jl. Utama Raya No. 45, Cengkareng Barat Cengkareng","LIDIA REFILAWATI, Hj,Dra,M.Pd.","216191705","A"],
		// 					["SMP Negeri 46","Jl. Rukun Pejaten Timur, Pejaten Timur Pasar Minggu","RUSTAM, S.Pd","217988153","B"],
		// 					["SMP Negeri 47","Jl. Rawasari Timur, Cempaka Putih Timur Cempaka Putih","SUTRISNO, M. Pd","4200349","A"],
		// 					["SMP Negeri 48","Jl. Raya Keb. Lama No. 192, Cipulir Kebayoran Lama","FARID MAKRUP, S.Pd","7396648","A"],
		// 					["SMP Negeri 48 Terbuka","Jl. Raya Keb. Lama No. 192, Cipulir Kebayoran Lama","FARID MAKRUP, S.Pd","7396648","A"],
		// 					["SMP Negeri 49","Jl. Raya Bogor Km. 20, Kramat Jati Kramat Jati","Dra. Sri Sulastri, MM.","218090200","A"],
		// 					["SMP Negeri 5","Jl. DR. Sutomo No. 5 Pasar Baru, Pasar Baru Sawah Besar","Drs.Destoro, MM","213844986","A"],
		// 					["SMP Negeri 50","Jl. Nusa I, Kramat Jati Kramat Jati","Dra.Tri Hastuti, MM","8091734","A"],
		// 					["SMP Negeri 51","Jl. Kejaksaan Kav. Pd. Bambu, Pondok Bambu Duren Sawit","KWATRIN ASKARINI","218617042","A"],
		// 					["SMP Negeri 51 Terbuka","Jl. Kejaksaan Kavling, Pondok Bambu Duren Sawit","KWATRIN ASKARINI","218617042","A"],
		// 					["SMP Negeri 52","Jl. Cipinang Elok, Cipinang Muara Jatinegara","SUDARTO","8196452","A"],
		// 					["SMP Negeri 53","Jl. Tanah Merdeka 33, Kalibaru Cilincing","MUDJIONO","4403082","A"],
		// 					["SMP Negeri 54","Jl. Balndongan No.37, Glodok Taman Sari","Bambang Supriyadi, S.Pd","6398734","A"],
		// 					["SMP Negeri 55","Jl. Bahari IV A.11, Tanjung Priok Tanjung Priok","SINDUNG ERNAWATI","214373413","A"],
		// 					["SMP Negeri 55 Terbuka","Jl. Bahari IV A.11 Tanjung Priok, Tanjung Priok Tanjung Priok","DRS. NURYAMIN, M.Pd","214373413","A"],
		// 					["SMP Negeri 56","Jl. Jeruk Purut 1, Cilandak Timur Pasar Minggu","Hj. R. Sri Hartami, S.Pd","217803516","A"],
		// 					["SMP Negeri 57","Jl. Halimun No. 2B, Guntur Setia Budi","Dra. Siti Aisyah, MM.","8280960","A"],
		// 					["SMP Negeri 58","Jl. Setiabudi Barat 8K, Setia Budi Setia Budi","Raden Sapta Nurrochman","5224233","A"],
		// 					["SMP Negeri 59","Jl. Bendungan Jago No. 40, Serdang Kemayoran","Marjono, S.Pd. M.Si.","4254310","A"],
		// 					["SMP Negeri 6","Jl. Bulak Timur I/7 Klender Duren Sawit, Klender Duren Sawit","Djumakir, S.Pd","218614103","B"],
		// 					["SMP Negeri 60","Jl. Sangihe No. 26, Cideng Gambir","Tri Lestari","63863113","A"],
		// 					["SMP Negeri 61","Jl. Z.Slipi Dalam, Slipi Palmerah","Djumadi Subiantoro","215485067","A"],
		// 					["SMP Negeri 61 Terbuka","Jl. Slipi Dalam, Slipi Palmerah","Drs. M. Supardiyono, S.Pd","215485067","-"],
		// 					["SMP Negeri 62","Jl. Jatinegara Timur IV, Rawa Bunga Jatinegara","Drs. SUYANTA, MM","8195366","A"],
		// 					["SMP Negeri 62 Terbuka","Jl. Jatinegara Timur IV, Rawa Bunga Jatinegara","SUHARTONO, SPd","8195366","A"],
		// 					["SMP Negeri 63","Jl. Perniagaan No. 31, Tambora Tambora","H. M. JAMIL, S.Pd","2169046","B"],
		// 					["SMP Negeri 64","Jl. Karang Anyar 11 - 12, Karang Anyar Sawah Besar","Drs. Budiyanto","216289762","B"],
		// 					["SMP Negeri 65","Jl. Metro Kencana Raya Sunter, Tanjung Priok Tanjung Priok","Drs. Pua Magharani, M.Pd","6503746","A"],
		// 					["SMP Negeri 66","Jl. Masjid Annur Kb. Lama, Grogol Selatan Kebayoran Lama","Brotoyudo, S.Pd","7262921","A"],
		// 					["SMP Negeri 67","Jl. Minangkabau Dalam No.3, Menteng Atas Setia Budi","Drs. Sukari Suryaningrat","8291525","B"],
		// 					["SMP Negeri 67 Terbuka","Jl. Mingkabau Dalam No. 3, Menteng Atas Setia Budi","Drs. Pachrur, MM.","218291525","B"],
		// 					["SMP Negeri 68","Jl. Cipete III No. 4, Cipete Selatan Cilandak","Drs. SUGENG, M.Si","7695722","A"],
		// 					["SMP Negeri 69","Jl. Tanjung Duren Timur No. 16, Tanjung Duren Selatan Grogol Petamburan","SURYANTORO","5656602","A"],
		// 					["SMP Negeri 7","Jl. Balai Rayat Utan Kayu Utara, Utan Kayu Utara Matraman","Drs.AGUS KURNIA.M.Pd.","8583817","A"],
		// 					["SMP Negeri 7 Terbuka","Jl. Balai Rayat Utan Kayu Utara, Utan Kayu Utara Matraman","Drs.Agus Kurnia,M.Pd","8583817","A"],
		// 					["SMP Negeri 70","Jl. H. Awaludin IV, Kebon Melati Tanah Abang","BAHRUDIN, S.Pd.MM.","3102278","A"],
		// 					["SMP Negeri 71","Jl. Rawasari Timur Komplek Perkantoran No.12, Cempaka Putih Timur Cempaka Putih","ABDUL RASYID,M.Pd","4213554","A"],
		// 					["SMP Negeri 72","Jl. Petojo Binatu No. 2, Petojo Utara Gambir","Drs.HENDRA SUKMANA","216327871","B"],
		// 					["SMP Negeri 73","Jl. Tebet Timur IIA No. 1, Tebet Timur T e b e t","Drs H Sukirman.M.Pd","8295378","A"],
		// 					["SMP Negeri 74","Jl. Pemuda No.6 dan Jl.Mustika Jaya, Rawamangun Pulo Gadung","Juhana, S.Pd, MM.Pd","4892521","A"],
		// 					["SMP Negeri 75 SSN","Jl. Raya Kebon Jeruk No.19, Kebon Jeruk Kebon Jeruk","Drs. Mas'ud Jamaluddin, MM","215483496","A"],
		// 					["SMP Negeri 76","Jl. Percetakan Negara II, Johar Baru Johar Baru","Drs. Darma Maha, M.Si","4248479","A"],
		// 					["SMP Negeri 77","Jl. Cemp. Putih Tengah XVIII, Cempaka Putih Timur Cempaka Putih","CHELLY IMAN SETIANE","4245377","A"],
		// 					["SMP Negeri 78","Jl. Perunggu No. 56, Harapan Mulia Kemayoran","TRI AKAD SANTOSA, S.Pd.","62214240289","A"],
		// 					["SMP Negeri 79","Jl. Dakota Raya Kemayoran Gempol Galindra, Kebon Kosong Kemayoran","Drs. SAYUTI","214208740","B"],
		// 					["SMP Negeri 79 Terbuka","Jl. Dakota Raya, Kebon Kosong Kemayoran","Drs. SAYUTI","214208740","-"],
		// 					["SMP Negeri 8","Jl. Pegangsaan Barat No. 1, Menteng Menteng","Azril Rusdi","3145570","A"],
		// 					["SMP Negeri 80","Jl. Kayatun Kayatun Trikora Halim. P, Halim Perdana Kusumah Makasar","Drs. H. SOEHAR YATMO, MM","8090092","A"],
		// 					["SMP Negeri 81","Jl. Monumen Pancasila, Lubang Buaya Cipayung","Drs. H. Ahmad Sanusi, M.Si","8408656","A"],
		// 					["SMP Negeri 82","Jl. Komp. BDN Pesing, Wijaya Kusuma Grogol Petamburan","Sugandi, SE.,M.Pd.","5667126","A"],
		// 					["SMP Negeri 83","Jl. Empang Bahagia, Jelambar Grogol Petamburan","SURATNO","5672648","A"],
		// 					["SMP Negeri 84","Jl. Kramat Jaya Blok R Gang VIII No.60, Lagoa K o j a","SUKIRNO, S.Pd, MM.Pd","2144830557","A"],
		// 					["SMP Negeri 84 Terbuka","Jl. Semangka No.1, Lagoa K o j a","SUKIRNO, S.Pd, M.MPd","2143930708","B"],
		// 					["SMP Negeri 85","Jl. Margasatwa No. 8, Pondok Labu Cilandak","DRA. YULMA, M.PD","7657652","A"],
		// 					["SMP Negeri 86","Jl. RS. Fatmawati Komp. BNI, Cilandak Barat Cilandak","SUMARDI, S.Pd, MM","7513818","A"],
		// 					["SMP Negeri 86 Terbuka","Jl. RS. Fatmawati Komp. BNI, Cilandak Barat Cilandak","Hj. Sulastri, M.Pd","7513818","A"],
		// 					["SMP Negeri 87","Jl. Ciputat Raya Pond. Pinang, Pondok Pinang Kebayoran Lama","Hj. Neneng Junaisih, S.Pd","7657687","A"],
		// 					["SMP Negeri 88","Jl. Anggrek Garuda Slipi, Kemanggisan Palmerah","Drs. Yusron, M.Pd.","5480779","A"],
		// 					["SMP Negeri 89","Jl. Tanjung Duren Barat IV, Tanjung Duren Utara Grogol Petamburan","Dra.Nurul Huda,M.Si","5672531","A"],
		// 					["SMP Negeri 9","Jl. Usman No.6 Kelapa Dua Wetan, Kelapa Dua Wetan Ciracas","Pudji Rahayu, M. Pd","8719966","A"],
		// 					["SMP Negeri 90","Jl. Raya Bekasi Km. 18, Jatinegara Cakung","Agus Mulyono, S.Pd","4603764","B"],
		// 					["SMP Negeri 91","Jl. Raya Bogor Km. 28 Pekayon, Pekayon Pasar Rebo","H. Imam Rosidi, S.Pd, M.Pd","8718877","A"],
		// 					["SMP Negeri 92","Jl. Perhubungan XII Rawamangun, Jati Pulo Gadung","Drs. BAMBANG PRIAWAN","4713051","A"],
		// 					["SMP Negeri 93","Jl. Gunung Sahari Raya No. 81, Gunung Sahari Selatan Kemayoran","Drs. Tua Sitanggang","4247349","A"],
		// 					["SMP Negeri 94","Jl. Tanah Abang V/29, Petojo Selatan Gambir","Dra. Hj. Latifah, M.Pd.","3805680","A"],
		// 					["SMP Negeri 95","Jl. Ganggeng III No. 3, Sungai Bambu Tanjung Priok","Drs.MOCH.YUSUP EFFENDI","4353273","A"],
		// 					["SMP Negeri 95 Terbuka","Jl. Ganggeng III No. 3, Sungai Bambu Tanjung Priok","ROMUALDUS LADO,SH.MM","4353273","A"],
		// 					["SMP Negeri 96","Jl. Margasatwa Komplek Timah Pondok Labu, Pondok Labu Cilandak","BUDI PURNOMO","217658121","A"],
		// 					["SMP Negeri 97","Jl. Galur Sari Raya, Utan Kayu Selatan Matraman","TRIYONO BHAKTI","218196209","A"],
		// 					["SMP Negeri 98","Jl. Raya Depok Lenteng Agung, Lenteng Agung Jagakarsa","Hj.Hartini Ramlan,S.Pd","7867633","A"],
		// 					["SMP Negeri 99","Jl. Sirap, Kayu Putih Pulo Gadung","SUMARDIJANTO, Drs, M.Pd","214891456","A"],
		// 					["SMP Negeri OR","Komplek Gelora Ragunan, Ragunan Pasar Minggu","Drs. Rasmadi","217801662","B"]
		// 		        ];

		// foreach ($data_master as $data) {
		// 	$data_sekolah_asal = new DataSekolahAsal();
		// 	$data_sekolah_asal->nama_sekolah = $data[0];
		// 	$data_sekolah_asal->alamat = $data[1];
		// 	$data_sekolah_asal->kepala_sekolah = $data[2];
		// 	$data_sekolah_asal->telepon = $data[3];
		// 	$data_sekolah_asal->akreditasi = $data[4];
		// 	$data_sekolah_asal->save();
		// }    


		// Faker Data Pendftaran    // Faker Data Pendftaran   // Faker Data Pendftaran    
		$faker = Faker\Factory::create('id_ID');

	    $limit = 2000;

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
			$calon_siswa->kd_jurusan = $faker->randomElement($array = array ('TPL','TGB','TAV','ANM','TKJ','TKR'));
			$calon_siswa->id_jadwal = 1;
			// $calon_siswa->id_jadwal = $faker->randomElement($array = array (1,2));
			$calon_siswa->nm_cln_siswa = $faker->firstName;
			$calon_siswa->nisn = $faker->numberBetween($min = 100000, $max = 99999);
			$calon_siswa->jns_kelamin = $faker->randomElement($array = array ('l','p'));
			$calon_siswa->tmp_lahir = $faker->randomElement($array = array ('Klaten','Jogja','Solo','Semarang','Jakarta'));
			$calon_siswa->tgl_lahir = Carbon::now();
			$calon_siswa->agama = $faker->randomElement($array = array ('islam','kristen','katolik','hindu','budha'));
			$calon_siswa->alamat = $faker->streetAddress;
			$calon_siswa->nm_ortu = $faker->firstName;
			$calon_siswa->pkrj_ortu = $faker->randomElement($array = array ('PNS','Wiraswasta','TNI/POLRI','Lainnya'));
			$calon_siswa->gaji_ortu = $faker->randomElement($array = array (4000000,5000000,6000000,7000000,8000000,9000000,10000000));
			$calon_siswa->sklh_asal = $faker->randomElement($array = array ('SMA N 1 JAKARTA','SMA N 2 JAKARTA','SMA N 3 JAKARTA','SMA N 4 JAKARTA'));
			$calon_siswa->save();

		 //    $pendaftaran = new Pendaftaran();
		 //    $pendaftaran->id_user = $user->id;
		 //    $pendaftaran->no_pendaftaran = $no_pendaftaran;
		 //    $pendaftaran->id_jadwal_pendaftaran = 1;
			// $pendaftaran->nama_pendaftar = $faker->name;
			// $pendaftaran->pil_jurusan_1 = $faker->randomElement($array = array ('TPL','TGB','TAV'));
			// $pendaftaran->pil_jurusan_2 = $faker->randomElement($array = array ('ANM','TKJ','TKR'));
			// $pendaftaran->tanggal_pendf = Carbon::now();
			// $pendaftaran->status_pemb_reg = "belum";
			// $pendaftaran->status_pemb_daf_ul = "belum";
			// $pendaftaran->status_tes_akademik = "belum";
			// $pendaftaran->status_diterima = "";
			// $pendaftaran->pas_foto = $faker->randomElement($array = array ('/img/avatar/1.png','/img/avatar/2.png','/img/avatar/3.png','/img/avatar/4.png','/img/avatar/5.png','/img/avatar/6.png','/img/avatar/7.png','/img/avatar/8.png','/img/avatar/9.png','/img/avatar/10.png','/img/avatar/11.png','/img/avatar/12.png','/img/avatar/13.png','/img/avatar/14.png','/img/avatar/15.png'));
			// $pendaftaran->save();


			// $data_pribadi = new DataPribadi();
			// $data_pribadi->no_pendaftaran = $pendaftaran->no_pendaftaran;
			// $data_pribadi->nisn = $faker->numberBetween($min = 1000000000000000, $max = 9999999999999999);
			// $data_pribadi->jenis_kelamin = $faker->randomElement($array = array ('l','p'));
			// $data_pribadi->tempat_lahir = $faker->city;
			// $data_pribadi->tanggal_lahir = Carbon::now();
			// $data_pribadi->agama = $faker->randomElement($array = array ('islam','kristen','katolik','hindu','budha'));
			// $data_pribadi->alamat = $faker->streetAddress;
			// $data_pribadi->kelurahan = $faker->streetName;
			// $data_pribadi->kecamatan = $faker->streetName;
			// $data_pribadi->kabupaten = $faker->streetName;
			// $data_pribadi->propinsi = $faker->streetName;
			// $data_pribadi->tinggi_badan = $faker->numberBetween($min = 140, $max = 165);
			// $data_pribadi->berat_badan = $faker->numberBetween($min = 35, $max = 55);
			// $data_pribadi->no_hp = $faker->numberBetween($min = 100000000000, $max = 999999999999);
			// $data_pribadi->save();

			// $data_orangtua_wali = new DataOrangTuaWali();
			// $data_orangtua_wali->no_pendaftaran = $pendaftaran->no_pendaftaran;
			// $data_orangtua_wali->nama_ortu = $faker->name;
			// $data_orangtua_wali->pekerjaan_ortu = $faker->randomElement($array = array ('PNS','Wiraswasta','TNI/POLRI','Lainnya'));
			// $data_orangtua_wali->penghasilan_ortu = $faker->randomElement($array = array ('4000000','5000000','6000000','7000000','8000000','9000000','10000000'));
			// $data_orangtua_wali->no_hp_ortu = $faker->numberBetween($min = 100000000000, $max = 999999999999);
			// $data_orangtua_wali->save();

			// $data_sekolah_asal = new DataPendidikan();
			// $data_sekolah_asal->no_pendaftaran = $pendaftaran->no_pendaftaran;
			// $data_sekolah_asal->id_sekolah_asal = $faker->numberBetween($min = 1, $max = 318);
			// $data_sekolah_asal->nilai_matematika = $faker->numberBetween($min = 6, $max = 10);
			// $data_sekolah_asal->nilai_bhs_inggris = $faker->numberBetween($min = 6, $max = 10);
			// $data_sekolah_asal->nilai_ipa = $faker->numberBetween($min = 6, $max = 10);
			// $data_sekolah_asal->save();
		}

		// for ($i = 1; $i < $limit; $i++) {
		//     $count_pendaftaran = Pendaftaran::count();
	 //        $no_pendaftaran = "DFT" . date("y-md") . ($count_pendaftaran + 1);

	 //        $user = new User();
	 //        $user->email = $faker->email;
	 //        $user->password = bcrypt($faker->email);
	 //        $user->id_role = $id_role_siswa;
	 //        $user->save();

		//     $pendaftaran = new Pendaftaran();
		//     $pendaftaran->id_user = $user->id;
		//     $pendaftaran->no_pendaftaran = $no_pendaftaran;
		//     $pendaftaran->id_jadwal_pendaftaran = 2;
		// 	$pendaftaran->nama_pendaftar = $faker->name;
		// 	$pendaftaran->pil_jurusan_1 = $faker->randomElement($array = array ('TPL','TGB','TAV'));
		// 	$pendaftaran->pil_jurusan_2 = $faker->randomElement($array = array ('ANM','TKJ','TKR'));
		// 	$pendaftaran->tanggal_pendf = Carbon::now();
		// 	$pendaftaran->status_pemb_reg = "belum";
		// 	$pendaftaran->status_pemb_daf_ul = "belum";
		// 	$pendaftaran->status_tes_akademik = "belum";
		// 	$pendaftaran->status_diterima = "";
		// 	$pendaftaran->pas_foto = $faker->randomElement($array = array ('/img/avatar/1.png','/img/avatar/2.png','/img/avatar/3.png','/img/avatar/4.png','/img/avatar/5.png','/img/avatar/6.png','/img/avatar/7.png','/img/avatar/8.png','/img/avatar/9.png','/img/avatar/10.png','/img/avatar/11.png','/img/avatar/12.png','/img/avatar/13.png','/img/avatar/14.png','/img/avatar/15.png'));
		// 	$pendaftaran->save();


		// 	$data_pribadi = new DataPribadi();
		// 	$data_pribadi->no_pendaftaran = $pendaftaran->no_pendaftaran;
		// 	$data_pribadi->nisn = $faker->numberBetween($min = 1000000000000000, $max = 9999999999999999);
		// 	$data_pribadi->jenis_kelamin = $faker->randomElement($array = array ('l','p'));
		// 	$data_pribadi->tempat_lahir = $faker->city;
		// 	$data_pribadi->tanggal_lahir = Carbon::now();
		// 	$data_pribadi->agama = $faker->randomElement($array = array ('islam','kristen','katolik','hindu','budha'));
		// 	$data_pribadi->alamat = $faker->streetAddress;
		// 	$data_pribadi->kelurahan = $faker->streetName;
		// 	$data_pribadi->kecamatan = $faker->streetName;
		// 	$data_pribadi->kabupaten = $faker->streetName;
		// 	$data_pribadi->propinsi = $faker->streetName;
		// 	$data_pribadi->tinggi_badan = $faker->numberBetween($min = 140, $max = 165);
		// 	$data_pribadi->berat_badan = $faker->numberBetween($min = 35, $max = 55);
		// 	$data_pribadi->no_hp = $faker->numberBetween($min = 100000000000, $max = 999999999999);
		// 	$data_pribadi->save();

		// 	$data_orangtua_wali = new DataOrangTuaWali();
		// 	$data_orangtua_wali->no_pendaftaran = $pendaftaran->no_pendaftaran;
		// 	$data_orangtua_wali->nama_ortu = $faker->name;
		// 	$data_orangtua_wali->pekerjaan_ortu = $faker->randomElement($array = array ('PNS','Wiraswasta','TNI/POLRI','Lainnya'));
		// 	$data_orangtua_wali->penghasilan_ortu = $faker->randomElement($array = array ('4000000','5000000','6000000','7000000','8000000','9000000','10000000'));
		// 	$data_orangtua_wali->no_hp_ortu = $faker->numberBetween($min = 100000000000, $max = 999999999999);
		// 	$data_orangtua_wali->save();

		// 	$data_sekolah_asal = new DataPendidikan();
		// 	$data_sekolah_asal->no_pendaftaran = $pendaftaran->no_pendaftaran;
		// 	$data_sekolah_asal->id_sekolah_asal = $faker->numberBetween($min = 1, $max = 318);
		// 	$data_sekolah_asal->nilai_matematika = $faker->numberBetween($min = 6, $max = 10);
		// 	$data_sekolah_asal->nilai_bhs_inggris = $faker->numberBetween($min = 6, $max = 10);
		// 	$data_sekolah_asal->nilai_ipa = $faker->numberBetween($min = 6, $max = 10);
		// 	$data_sekolah_asal->save();
		// }

		
    }
}
