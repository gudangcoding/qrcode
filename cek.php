<?php 
include "koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Hasil Validasi Ijazah</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="./assets/img/logo.png">
	<!-- Bootstrap core CSS -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="./">Validasi Ijazah dengan QR Code</a>
        </div>
    </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Hasil Validasi Packing List</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">                                
                        <tr>
                            <td colspan="3">
                                <center>
                                <img src="assets/img/logo.png" width="90px">
                                <h1>PT Nesinak Industries</h1>
                                <p>Jl. Akasia 3 CIkarang Selatan</p>
                                <hr>
                            </td>
                        </tr>
                    </table>
                    <?php
                    $sql=sqlsrv_query($konek, "SELECT * FROM packing_list WHERE no_invoice='$_POST[no_invoice]'");
                    $d=sqlsrv_fetch_array($sql);

                    if(sqlsrv_num_rows($sql) < 1){
                        ?>
                        <div class="alert alert-danger">
                            <center>
                            <strong>Maaf, Data tidak ditemukan..!</strong><br>
                            <i>Silahkan menghubungi Perguruan Tinggi terkait untuk menanyakan masalah ini</i>
                            </center>
                        </div>
                        <?php
                    }else{
                    ?>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Part No</th>
                            <th>Part Name</th>
                            <th>Kategori</th>
                            <th>Tanggal</th>
                            <th>Nomor Invoice</th>
                            <th>QTY Plan</th>
                            <th>QTY Check</th>
                        </tr>
                        <tr>
                            <td><?php echo $d['part_no']; ?></td>
                            <td><?php echo $d['part_name']; ?></td>
                            <td><?php echo $d['category']; ?></td>
                            <td><?php echo $d['tanggal']; ?></td>
                            <td><?php echo $d['no_invoice']; ?></td>
                            <td><?php echo $d['qty_plan']; ?></td>
                            <td><?php echo $d['qty_check']; ?></td>
                        </tr>
                    </table>
                    <?php } ?>
                </div>
                <div class="panel-footer">
                    <center><a class="btn btn-danger" href="./validasi-ijazah">Kembali</a></center>
                </div>
            </div>
        </div>
    </div>
</body>
</html>