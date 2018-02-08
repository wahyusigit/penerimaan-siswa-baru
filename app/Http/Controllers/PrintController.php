<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\CalonSiswa;
use App\Pembayaran;
use App\TesSeleksi;
use App\QR;

use CodeItNow\BarcodeBundle\Utils\QrCode;
use Image;
use Faker;

class PrintController extends Controller
{
	public $jenis;
	public $no_qr;
	public $no_pendf;

    public function index($jenis, $id){
    	$this->jenis = $jenis;
    	if ($this->jenis == 'pembayaran') {
    		$pembayaran = Pembayaran::find($id);
    		$this->no_pendf = $pembayaran->no_pendf;
    		$img_qr = $this->QrCode();
    		$no_qr = $this->no_qr;
			return view('pages.print.pembayaran', compact('no_qr','img_qr','pembayaran'));
    	} else if ($this->jenis == 'tesseleksi') {
    		$tesseleksi = TesSeleksi::find($id);
    		$this->no_pendf = $tesseleksi->no_pendf;
    		$img_qr = $this->QrCode();
    		$no_qr = $this->no_qr;
			return view('pages.print.tesseleksi', compact('no_qr','img_qr','tesseleksi'));
    	}
    }

	public function generateUUID(){
		$faker = Faker\Factory::create('id_ID');
		return $faker->uuid;
	}

	public function QrCode(){
    	$qrCode = new QrCode();
		$this->no_qr = $this->generateUUID();
		$qrCode->setText($this->no_qr)
				    ->setSize(400)
				    ->setPadding(10)
				    ->setErrorCorrection('high')
				    ->setForegroundColor(array('r' => 0, 'g' => 0, 'b' => 0, 'a' => 0))
				    ->setBackgroundColor(array('r' => 255, 'g' => 255, 'b' => 255, 'a' => 0))
				    ->setLabel($this->no_qr)
				    ->setLabelFontSize(15)
				    ->setImageType(QrCode::IMAGE_TYPE_PNG);

		// Save image base64 to PNG
		$png_url = $this->no_qr . ".png";
		$path = 'img/qrcode/' . $png_url;
		
		$img_save = Image::make($qrCode->generate())->save($path);

		$image_data = 'data:' . $qrCode->getContentType() . ';base64,' . $qrCode->generate();

		$qr = new QR();
		$qr->qr_code = $this->no_qr;
		$qr->qr_code_image = $path;
		$qr->jenis = $this->jenis;
		$qr->no_pendf = $this->no_pendf;
		$qr->save();

		return $image_data;
    }
}
