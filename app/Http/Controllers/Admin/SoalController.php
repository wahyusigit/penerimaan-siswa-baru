<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Pertanyaan;
use App\JenisPertanyaan;
use App\PilihanJawaban;

class SoalController extends Controller
{
	public function plainText($text){
		$html = new \Html2Text\Html2Text();
		return $html->convert($text);
	}

    public function index(){
    	$get_soals = Pertanyaan::all()->toArray();
        if (empty($get_soals)) {
            $soals = null;
        } else {
            foreach ($get_soals as $key => $value) {
                $soals[$key]['id_pertanyaan'] = $value['id_pertanyaan'];
                $soals[$key]['isi_pertanyaan'] = $this->plainText($value['isi_pertanyaan']);
            }
        }
    	return view('pages.admin.tesseleksi.soal.index', compact('soals'));
    }

    public function add(){
        $jenispertanyaans = JenisPertanyaan::all();
    	return view('pages.admin.tesseleksi.soal.add', compact('jenispertanyaans'));	
    }

    public function postAdd(Request $req){
        $pertanyaan = new Pertanyaan();
        if (is_null($req->id_jenis_pertanyaan) === false || empty($req->id_jenis_pertanyaan) === false) {
            $pertanyaan->id_jenis_pertanyaan = $req->id_jenis_pertanyaan;
        }
    	
    	$pertanyaan->isi_pertanyaan = $req->isi_pertanyaan;
    	$pertanyaan->save();

    	foreach ($req->pilihan_jawabans as $key => $isi_jawaban) {
    		$pilihan_jawaban = new PilihanJawaban();
			$pilihan_jawaban->id_pertanyaan = $pertanyaan->id_pertanyaan;
			$pilihan_jawaban->isi_jawaban = $isi_jawaban;

			if ($req->benar == $key) {
				$pilihan_jawaban->status_jawaban = 'benar';
			} else {
				$pilihan_jawaban->status_jawaban = 'salah';
			}
			
			$pilihan_jawaban->save();
    	}

    	return redirect(route('indexSoalAdmin'));
    }

    public function edit($id_pertanyaan){
        $soal = Pertanyaan::find($id_pertanyaan);
        return view('pages.admin.tesseleksi.soal.edit', compact('soal'));
    }

    public function update(Request $req, $id_pertanyaan){
        
        $pertanyaan = Pertanyaan::find($id_pertanyaan);
        $pertanyaan->isi_pertanyaan = $req->isi_pertanyaan;
        $pertanyaan->save();

        foreach ($req->data as $key => $val) {
            $pilihan_jawaban = PilihanJawaban::find($val['id_pilihan_jawaban']);
            $pilihan_jawaban->id_pertanyaan = $pertanyaan->id_pertanyaan;
            $pilihan_jawaban->isi_jawaban = $val['isi_jawaban'];

            if ($req->benar == $val['id_pilihan_jawaban']) {
                $pilihan_jawaban->status_jawaban = 'benar';
            } else {
                $pilihan_jawaban->status_jawaban = 'salah';
            }
            
            $pilihan_jawaban->save();
        }

        return redirect(route('indexSoalAdmin'));
    }

    public function detail($id_pertanyaan){
        $soal = Pertanyaan::find($id_pertanyaan);
        return view('pages.admin.tesseleksi.soal.detail', compact('soal'));
    }

    public function delete($id_pertanyaan){
        $soal = Pertanyaan::find($id_pertanyaan)->delete();
        return redirect(route('indexSoalAdmin'));
    }

    public function postAddJenisPertanyaan(Request $req){
        $jenispertanyaan = new JenisPertanyaan();
        $jenispertanyaan->nama_jenis = $req->nama_jenis;
        $jenispertanyaan->desk_jenis = $req->desk_jenis;
        $jenispertanyaan->save();

        return redirect(route('addSoalAdmin'));
    }
}
