<?php 
	
	include "koneksi.php";
	
?>




<!DOCTYPE html>
<html>
<head>
	<title>Form Cetak Qrcode</title>
	<link rel="icon" href="./assets/img/logo.png">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

</head>
<body>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Form Qrcode</h3>
			</div>
			<div class="panel-body">
				<form method="post" action="qrcode.php">
				<table class="table">
					<tr>
						<td>Part No</td>
						<td><input type="text" class="form-control" name="part_no" value="<?=$_GET['id'] ?>"></td>
					</tr>
					<tr>
						<td>Jumlah Qrcode</td>
						<td><input type="text" class="form-control" name="jumlah"></td>
					</tr>
					<tr>
						<td><input type="submit" value="Buat Qrcode" class="btn btn-warning"></td>
						<td></td>
					</tr>
				</table>
				</form>
			</div>
		</div>
	</div>
</body>
</html>

