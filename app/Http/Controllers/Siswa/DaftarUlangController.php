<?php

namespace App\Http\Controllers\Siswa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\CalonSiswa;
use App\DaftarUlang;

use Auth;
use Image;

class DaftarUlangController extends Controller
{
	private $siswa;
	// private $carbon;

	public function __construct(){
		$this->middleware(function ($request, $next) {
	        $this->siswa = Auth::user()->calonSiswa;

	        return $next($request);
	    });

	    // $this->carbon = Carbon::now();
	}

	public function saveImage($file_image, $type){
		$image = new Image();
		$no_pendf = $this->siswa->no_pendf;

		// $file_image = $req->file('image_prod');

	    $image_path = 'img/scan/' . $no_pendf . '_' . $type . '_' . str_replace(' ', '', $file_image->getClientOriginalName());
	    
	    // Fit untuk mengecilkan / membesarkan 
	    $image = Image::make($file_image->getRealPath());
	    
	    // resize the image to a width of 300 and constrain aspect ratio (auto height)
	    $image->resize(1000, null, function ($constraint) {
	        $constraint->aspectRatio();
	    })->save($image_path);

	    return $image_path;
	}

    public function index(){
    	$daftarulang = $this->siswa->daftarulang;
    	return view('pages.siswa.daftarulang.index', compact('daftarulang'));
    }

    public function postIndex(Request $req){
    	if (is_null($this->siswa->daftarUlang)) {
    		$daftarulang = new DaftarUlang();
    		$daftarulang->no_pendf = $this->siswa->no_pendf;
    	} else {
    		$daftarulang = DaftarUlang::find($this->siswa->daftarUlang->no_daftar_ulang);
    	}
		
		if ($req->scan_foto_3x4 != null || $req->scan_foto_3x4 != '') {
			$daftarulang->scan_foto_3x4 = $this->saveImage($req->scan_foto_3x4,'scan_foto_3x4');	
		}
		if ($req->scan_nisn != null || $req->scan_nisn != '') {
			$daftarulang->scan_nisn = $this->saveImage($req->scan_nisn,'scan_nisn');	
		}
		if ($req->scan_kartu_keluarga != null || $req->scan_kartu_keluarga != '') {
			$daftarulang->scan_kartu_keluarga = $this->saveImage($req->scan_kartu_keluarga,'scan_kartu_keluarga');	
		}
		if ($req->scan_akta != null || $req->scan_akta != '') {
			$daftarulang->scan_akta = $this->saveImage($req->scan_akta,'scan_akta');
		}
		if ($req->scan_ktp_ortu != null || $req->scan_ktp_ortu != '') {
			$daftarulang->scan_ktp_ortu = $this->saveImage($req->scan_ktp_ortu,'scan_ktp_ortu');
		}
		if ($req->scan_skhu != null || $req->scan_skhu != '') {
			$daftarulang->scan_skhu = $this->saveImage($req->scan_skhu,'scan_skhu');
		}
		$daftarulang->save();

		return redirect(route('indexDaftarUlangSiswa'));
    }

    public function ajax(Request $req){
    	
		if ($req->type == 'scan_foto_3x4') {
			return asset($this->siswa->daftarUlang->scan_foto_3x4);
		} elseif ($req->type == 'scan_nisn') {
			return asset($this->siswa->daftarUlang->scan_nisn);
		} elseif ($req->type == 'scan_kartu_keluarga') {
			return asset($this->siswa->daftarUlang->scan_kartu_keluarga);
		} elseif ($req->type == 'scan_akta') {
			return asset($this->siswa->daftarUlang->scan_akta);
		} elseif ($req->type == 'scan_ktp_ortu') {
			return asset($this->siswa->daftarUlang->scan_ktp_ortu);
		} elseif ($req->type == 'scan_skhu') {
			return asset($this->siswa->daftarUlang->scan_skhu);
		} else  {

		}
	}

    public function postAdd(Request $req){
    	
    }

    public function edit($id){
    	
    }

    public function update(Request $req, $id){
    	
    }

    public function delete($id){
    	
    }

    public function detail($id){
    	
    }
}
