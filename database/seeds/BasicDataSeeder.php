<?php

use Illuminate\Database\Seeder;

use App\Role;
use App\User;
use App\JadwalPendaftaran;
use App\CalonSiswa;
use App\Jurusan;
use App\Kelas;
use App\TahunAjaran;

use Carbon\Carbon;

class BasicDataSeeder extends Seeder
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
    	$user->email = "admin123@admin123.com";
    	$user->password = bcrypt("admin123");
    	$user->id_role = Role::where('name','admin')->first()->id_role;
    	$user->save();

    	$user = new User();
    	$user->email = "siswa123@siswa123.com";
    	$user->password = bcrypt("siswa123");
    	$user->id_role = Role::where('name','siswa')->first()->id_role;
    	$user->save();

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
    	foreach ($data_tahun_ajaran as $data) {
    		$tahunajaran = new TahunAjaran();
    		$tahunajaran -> th_ajaran = $data['th_ajaran'];
    		$tahunajaran -> save();
    	}
    }
}
