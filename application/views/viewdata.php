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
	<script type="text/javascript" charset="utf-8">
		$(document).ready(function(){
			$('#datatables').dataTable({
				"sPaginationType":"full_numbers",
				"aaSorting":[[2, "desc"]],
				"bJQueryUI":true
			});
		})

	</script>
	<script type="text/javascript" charset="utf-8">
		$(document).ready(function(){
			$('#datatables2').dataTable({
				"sPaginationType":"full_numbers",
				"aaSorting":[[2, "desc"]],
				"bJQueryUI":true
			});
		})

	</script>
	<style type="text/css">
	.marginbutton {
		margin-top: 10px;
		margin-bottom: 10px;
	}
</style>
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
				<?php if ($this->session->flashdata('success')) { ?>
				<div class="alert alert-success" role="alert">
					<strong>Sukses!</strong> <?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php } ?>
				<?php if ($this->session->flashdata('error')) { ?>
				<div class="alert alert-warning" role="alert">
					<strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>
				</div>
				<?php } ?>
				<a class="btn btn-primary marginbutton" href="<?php echo base_url() ?>index.php/app/add">Tambah Data Lokasi Kerja </a>
				<table id="datatables" class="display">

					<thead>
						<th>No</th>
						<th>Lokasi Kerja</th>
						<th>#</th>

					</thead>
					<?php 
					$no = 1;
					foreach ($dataLokasi as $d) { ?>
					<tr>
						<td><?php echo $no ?></td>
						<td><?php echo $d->lokasi_kerja_nama ?></td>
						<td><a href="<?php echo base_url() ?>index.php/app/edit/<?php echo $d->lokasi_kerja_id ?>">Edit</a> | <a href="<?php echo base_url() ?>index.php/app/delete/<?php echo $d->lokasi_kerja_id ?>" onClick="return confirm('Apakah anda akan menghapus data ini?');">Delete</a></td>
					</tr>
					<?php $no++; } ?>
				</table>

				<a class="btn btn-primary marginbutton" href="<?php echo base_url() ?>index.php/app/add_unit">Tambah Data Unit Kerja</a>
				<table id="datatables2" class="display">

					<thead>
						<th>No</th>
						<th>Unit Kerja</th>
						<th>Lokasi Kerja</th>
						<th>#</th>

					</thead>
					<?php 
					$no = 1;                   
					$query = $this->db->query("SELECT m_unit_kerja.lokasi_kerja_id AS unitLokasiKerjaId,
						m_unit_kerja.unit_kerja_id AS unit_kerja_id,
						m_unit_kerja.unit_kerja_nama AS unit_kerja_nama,
						m_lokasi_kerja.lokasi_kerja_id AS lokasiKerjaId,	
						m_lokasi_kerja.lokasi_kerja_nama AS lokasi_kerja_nama
						FROM 
						m_unit_kerja
						LEFT JOIN m_lokasi_kerja ON m_unit_kerja.lokasi_kerja_id = m_lokasi_kerja.lokasi_kerja_id");
						foreach ($query->result() as $row){    ?>
						<tr>
							<td><?php echo $no ?></td>
							<td><?php echo $row->unit_kerja_nama ?></td>
							<td><?php echo $row->lokasi_kerja_nama ?></td>
							<td><a href="<?php echo base_url() ?>index.php/app/edit_unit/<?php echo $row->unit_kerja_id ?>">Edit</a> | <a href="<?php echo base_url() ?>index.php/app/delete_unit/<?php echo $row->unit_kerja_id ?>" onClick="return confirm('Apakah anda akan menghapus data ini?');">Delete</a></td>
						</tr>
						<?php $no++; } ?>
					</table>

				</div><!--/.col-xs-12.col-sm-9-->


			</div><!--/.container-->
		</body>
		</html>