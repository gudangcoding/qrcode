<?php include "header.php"; ?>

<div class="container">

<?php
$view = isset($_GET['view']) ? $_GET['view'] : null;

switch($view){
	default:
	?>
	<div class="row">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Data Pengecekan Barang</h3>
			</div>
			<div class="panel-body">
				<a class="btn btn-primary" style="margin-bottom: 10px" href="data_part.php?view=tambah">Tambah Data</a>
				<table class="table table-bordered table-striped">
					<tr>
						<th>No</th>
						<th>LabelNoBag</th>
						<th>LabelNoBox</th>
						<th>PartNo</th>
						<th>PartName</th>
						<th>StandarPackingBox</th>
						<th>StandarPackingBag</th>
						<th>SerialBoxNo</th>
						<th>Balance</th>
						<th>Aksi</th>
					</tr>
					<?php
					$sql=sqlsrv_query($konek, "SELECT * FROM TableCreateLabelQR");
					$no=1;
					while($d=sqlsrv_fetch_array($sql)){
						echo "<tr>
							<td width='40px' align='center'>$no</td>
							<td>$d[LabelNoBag]</td>
							<td>$d[LabelNoBox]</td>
							<td>$d[PartNo]</td>
							<td>$d[PartName]</td>
							<td>$d[StandarPackingBox]</td>
							<td>$d[StandarPackingBag]</td>
							<td>$d[SerialBoxNo]</td>
							<td>0</td>
							<td width='180px' align='center'>
								<a class='btn btn-danger btn-sm' href='buatQRCode.php?npm=$d[PartNo]&nomor=$d[LabelNoBag]'>Buat Kode QR</a>
								<a class='btn btn-success btn-sm' href='form_qrcode.php?id=$d[PartNo]' target='_blank'>Cetak</a>
							</td>
						</tr>";
						$no++;
					}
					?>
				</table>
			</div>
		</div>
	</div>

<?php
	break;
	case "tambah":

?>
	<div class="row">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Tambah Data Part</h3>
			</div>
			<div class="panel-body">
				
				<form method="post" action="aksi.php?act=insert">
					<table class="table">
						<tr>
							<td width="160">Part No</td>
							<td>
								<div class="col-md-4"><input class="form-control" type="text" name="part_no" required /></div>
							</td>
						</tr>
						<tr>
							<td>Part Name</td>
							<td><div class="col-md-6"><input class="form-control" type="text" name="part_name" required /></div></td>
						</tr>
						<tr>
							<td>Category</td>
							<td>
								<div class="col-md-6">
									<select name="category" class="form-control">
									<option value="Thompshon">Thompshon</option>
									<option value="Export">Export</option>
									<option value="Local">Local</option>
									</select>
								</div>
							</td>
						</tr>
						<tr>
							<td>Tanggal</td>
							<td><div class="col-md-4"><input class="form-control" type="date" name="tanggal" required /></div></td>
						</tr>
						<tr>
							<td>No. Invoice</td>
							<td><div class="col-md-6"><input class="form-control" type="text" name="no_invoice" required /></div></td>
						</tr>
						<tr>
							<td>Qty Plan</td>
							<td><div class="col-md-2"><input class="form-control" type="number" step="0.01" name="qty_plan" required /></div></td>
						</tr>
						<tr>
							<td></td>
							<td>
							<div class="col-md-6">
								<input class="btn btn-primary" type="submit" value="Simpan" />
								<a class="btn btn-danger" href="data_part.php">Kembali</a>
								</div>
							</td>
						</tr>
					</table>
				</form>

			</div>
		</div>
	</div>

<?php
	break;
}
?>

</div>

<?php include "footer.php"; ?>