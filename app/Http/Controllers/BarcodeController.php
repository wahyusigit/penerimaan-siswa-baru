<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\QR;
use App\CalonSiswa;

use CodeItNow\BarcodeBundle\Utils\QrCode;
use Image;
use Faker;

class BarcodeController extends Controller
{
	public function index($qr_code){
		$qr = QR::find($qr_code);
		$calonsiswa = $qr->calonsiswa;
		return view('pages.qrcode.pembayaran', compact('qr','calonsiswa'));
		// dd($calonsiswa);

		// $this->jenis = $jenis;
  //   	if ($this->jenis == 'pembayaran') {
  //   		$pembayaran = Pembayaran::find($id);
  //   		$this->no_pendf = $pembayaran->no_pendf;
  //   		$img_qr = $this->QrCode();
  //   		$no_qr = $this->no_qr;
		// 	return view('pages.print.pembayaran', compact('no_qr','img_qr','pembayaran'));
  //   	}
		// $barcode = $this->generateBarcode();
		// return view('pages.qrcode.index', compact('barcode'));
	}

	public function generateUUID(){
		$faker = Faker\Factory::create('id_ID');
		return $faker->uuid;
	}

	public function generateBarcode(){
    	$qrCode = new QrCode();
		$uuid = $this->generateUUID();
		$qrCode->setText($uuid)
				    ->setSize(400)
				    ->setPadding(10)
				    ->setErrorCorrection('high')
				    ->setForegroundColor(array('r' => 0, 'g' => 0, 'b' => 0, 'a' => 0))
				    ->setBackgroundColor(array('r' => 255, 'g' => 255, 'b' => 255, 'a' => 0))
				    ->setLabel($uuid)
				    ->setLabelFontSize(15)
				    ->setImageType(QrCode::IMAGE_TYPE_PNG);

		// Save image base64 to PNG
		$png_url = $uuid . ".png";
		$path = 'img/barcode/' . $png_url;
		Image::make($qrCode->generate())->save($path);     

		$image_data = 'data:' . $qrCode->getContentType() . ';base64,' . $qrCode->generate();
		return $image_data;
    }
}
