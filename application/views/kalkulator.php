<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Test Solmit</title>

	<link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/css/offcanvas.css" rel="stylesheet">
	<script src="<?php echo base_url() ?>assets/js/ie-emulation-modes-warning.js"></script>
	<link href="<?php echo base_url() ?>assets/media/css/demo_table_jui.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/media/themes/ui-lightness/jquery-ui-1.8.4.custom.css" rel="stylesheet">
	<script src="<?php echo base_url() ?>assets/media/js/jquery.js" type="text/javascript"></script>
	<script src="<?php echo base_url() ?>assets/media/js/jquery.dataTables.js" type="text/javascript"></script>
</head>

<body>
	<nav class="navbar navbar-fixed-top navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php echo base_url() ?>">Test Solmit</a>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li><a href="<?php echo base_url() ?>">Data Lokasi Kerja dan Unit Kerja</a></li>
					<li><a href="<?php echo base_url() ?>index.php/calculator">Kalkulator</a></li>
				</ul>
			</div><!-- /.nav-collapse -->
		</div><!-- /.container -->
	</nav><!-- /.navbar -->

	<div class="container">
		<div class="row row-offcanvas row-offcanvas-right">

			<div class="col-xs-12">
				<p class="pull-right visible-xs">
					<button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
				</p>
				<script>
					function validateForm() {
						var x = document.forms["validasiForm"]["bil2"].value;
						if (x == 0) {
							alert("Tidak boleh dibagi 0!");
							return false;
						}
					}
				</script>
				<table class="table">
					<form name="validasiForm" action="<?php echo base_url()?>index.php/calculator/hitung" onsubmit="return validateForm()" method="POST">
						<tr>
							<td>Bilangan 1</td>
							<td>:</td>
							<td><input type="number" name="bil1" required="" class="form-control"></td>
						</tr>
						<tr>
							<td>Bilangan 2</td>
							<td>:</td>
							<td><input type="number" name="bil2" name="bil2" required="" class="form-control"></td>
						</tr>
						<tr>
							<td>Hitung</td>
							<td>:</td>
							<td><select name="operasi" class="form-control">
								<option value="tambah">Tambah</option>
								<option value="kurang">Kurang</option>
								<option value="kali">Kali</option>
								<option value="bagi">Bagi</option>
							</select>
						</td>
					</tr>
					<tr>
						<td><input type="submit" name="hitung" value="Hitung" class="btn btn-primary"></td>
						<td></td>
						<td></td>
					</tr>
				</form>
				<?php if ($this->session->flashdata('success') || $this->session->flashdata('warning') || $this->session->flashdata('error')) { ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php } ?>
			</table>
		</div><!--/.col-xs-12.col-sm-9-->


	</div><!--/.container-->
</body>
</html>