<?php
session_start();
if(!isset($_SESSION['login'])){
	header('location:login.php');
}
include "koneksi.php";

// jika ada get act
if(isset($_GET['act'])){

	//proses simpan data
	if($_GET['act']=='insert'){
		//variabel dari elemen form
		$part_no 	= $_POST['part_no'];
		$part_name 	= $_POST['part_name'];
		$category  = $_POST['category'];
		$tanggal	= $_POST['tanggal'];
		$no_invoice = $_POST['no_invoice'];
		$qty_plan	= $_POST['qty_plan'];
		
		if($part_no=='' || $part_name=='' || $category=='' || $tanggal=='' || $no_invoice=='' || $qty_plan==''){
			header('location:data_part.php?view=tambah');
		}else{		
			$sql ="INSERT INTO packing_list SET part_no='$part_no',part_name='$part_name',category='$category',tanggal='$tanggal',no_invoice='$no_invoice',qty_plan='$qty_plan'";
				
			//proses simpan data admin
			$simpan = sqlsrv_query($konek, $sql);
			
			if($simpan){
				// BUAT QRCODE
				// tampung data kiriman
				$nomor = $no_invoice;
			
				// include file qrlib.php
				include "phpqrcode/qrlib.php";
			
				//Nama Folder file QR Code kita nantinya akan disimpan
				$tempdir = "temp/";
			
				//jika folder belum ada, buat folder 
				if (!file_exists($tempdir)){
					mkdir($tempdir);
				}
			
				#parameter inputan
				$isi_teks = $no_invoice;
				$namafile = $part_no.".png";
				$quality = 'H'; //ada 4 pilihan, L (Low), M(Medium), Q(Good), H(High)
				$ukuran = 5; //batasan 1 paling kecil, 10 paling besar
				$padding = 2;
			
				QRCode::png($isi_teks,$tempdir.$namafile,$quality,$ukuran,$padding);

				header('location:data_part.php');
			}else{
				header('location:data_part.php');
			}
		}
	} // akhir proses simpan data

	else{
		header('location:data_part.php');
	}

} // akhir get act

else{
	header('location:data_part.php');
}
?>