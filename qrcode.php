<?php 
	include "koneksi.php";
	include "phpqrcode/qrlib.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Part No</title>
	<link rel="icon" href="./assets/img/logo.png">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<style type="text/css">
		body{
			font-family: Arial;
		}

		@media print{
			.no-print{
				display: none;
			}
		}

		table{
			border-collapse: collapse;
		}
	</style>
</head>
<body>
	<div class="container">
		<?php
		$sql=sqlsrv_query($konek, "SELECT * FROM TableCreateLabelQR WHERE PartNo='$_POST[part_no]'");
		$d=sqlsrv_fetch_array($sql);


    	//Nama Folder file QR Code kita nantinya akan disimpan
	    $tempdir = "temp/";

	    //jika folder belum ada, buat folder 
	    if (!file_exists($tempdir)){
	        mkdir($tempdir);
	    }

	    #buar qrcodenya
	    $isi_teks = $d['CodeQR1'];
	    $namafile = $d['PartNo'].".png";
	    $quality = 'H'; //ada 4 pilihan, L (Low), M(Medium), Q(Good), H(High)
	    $ukuran = 5; //batasan 1 paling kecil, 10 paling besar
	    $padding = 2;
	    QRCode::png($isi_teks,$tempdir.$namafile,$quality,$ukuran,$padding);

		for ($i=0; $i < $_POST['jumlah']; $i++) {
		?>

		<div class="col-md-6">
			<table border="1" width="100%">
				<td>Nama Part</td>
				<td><?php echo $d['PartName']; ?></td>
				<td><img src="temp/<?php echo $namafile; ?>"><br><?php echo $d['CodeQR1']; ?></td>
			</table>
			
		</div>
	<?php } ?>
	</div>
<center><a href="#" class="no-print" onclick="window.print();">Cetak/Print</a></center>
<center><a href="form_qrcode.php" class="btn btn-warning">Kembali</a></center>
</body>
</html>

