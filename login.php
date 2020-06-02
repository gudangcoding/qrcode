<!DOCTIPE html>
<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/img/icon.png">

    <title>Validasi QR Code</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/style.css" rel="stylesheet">

</head>
<body>
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="./">Aplikasi Validasi dengan QR Code</a>
    </div>
  </div>
</nav>

<div class="container">
	<div class="col-md-4 col-md-offset-4">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span> LOGIN ADMIN</h3>
			</div>
			<div class="panel-body">
				<?php 
				if($_SERVER['REQUEST_METHOD']=='POST'){
					$user	= $_POST['username'];
					$pass	= $_POST['password'];
					if($user=='' || $pass==''){
						?>
						<div class="alert alert-warning alert-dismissible" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						  <?php
						  echo "<strong>Error!</strong> Form Belum Lengkap!!";
						  ?>
						</div>
						<?php
					}else{
						include "koneksi.php";
						$sql = "SELECT * FROM TableUserQR WHERE UserName='$user' AND Password='$pass'";
						//echo $sql;
						$sqlLogin = sqlsrv_query($konek, $sql);
						$jml=sqlsrv_has_rows($sqlLogin);
						$d=sqlsrv_fetch_array($sqlLogin);
						echo $jml;
						if($jml > 0){
							session_start();
							$_SESSION['login']		= TRUE;
							$_SESSION['id']			= $d['UserID'];
							$_SESSION['username']	= $d['UserName'];
							
							header('Location:./index.php');
						}else{
						?>
							<div class="alert alert-danger alert-dismissible" role="alert">
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							  <?php
							  echo "<strong>Error!</strong> Username dan Password anda Salah!!!";
							  ?>
							</div>
						<?php
						}
						
					}
				}
				?>

				
				<form method="post" action="" role="form">
					<div class="form-group">
						<input type="text" class="form-control" name="username" placeholder="Username" />
					</div>
					<div class="form-group">
						<input type="password" class="form-control" name="password" placeholder="Password" />
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-lg btn-primary btn-block" value="Login" />
					</div>
				</form>
				
			</div>

		</div> <!-- //panel -->
		</div>

		<!-- <div class="col-md-4 col-md-offset-4">
			<div class="panel panel-danger">
				<div class="panel-heading">
					<h3 class="panel-title">Cek Validasi Ijazah</h3>
				</div>
				<div class="panel-body">
					<p>Untuk melakukan pengecekan Ijazah, pastikan anda menggunakan perangkat yang memiliki kamera seperti laptop/smartphone.</p>
					<a href="./validasi-ijazah" class="btn btn-danger">Cek Validasi Ijazah dengan QR Code</a>
				</div>
			</div>
		</div> -->
</div>


	<footer class="footer">
      <div class="container">
        <p class="text-muted"><a href="https://luruilmu.com" target="_blank">LPK Naura Kursus Komputer</a> Tahun 2020</p>
      </div>
    </footer>

<!-- Bootstrap core JavaScript -->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>
