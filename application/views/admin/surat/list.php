<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("admin/_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("admin/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/surat/add') ?>"><i class="fas fa-plus"></i> Add New</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Nomor Surat</th>
										<th>Pejabat</th>
										<th>Tanggal</th>
										<th>Periode</th>
										<th>Semester</th>
										<th>Tanggal Mulai</th>
										<th>Tanggal Selesai</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($surat as $surat): ?>
									<tr>
										<td width="150">
											<?php echo $surat->no_surat ?>
										</td>
										<td>
											<?php echo $surat->nama_pejabat ?>
										</td>
										<td>
											<?php echo $surat->tanggal_surat ?>
										</td>
										<td>
											<?php echo $surat->periode ?>
										</td>
										
										<td>
											<?php echo $surat->semester ?>
										</td>
										<td>
											<?php echo $surat->tanggal_mulai ?>
										</td>
										<td>
											<?php echo $surat->tanggal_selesai ?>
										</td>
										<td width="250">
											<a onclick="deleteConfirm('<?php echo site_url('admin/surat/delete/'.$surat->id_surat) ?>')"
											 href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
											<a href="<?php echo site_url('admin/surat/print/'.$surat->id_surat) ?>"
											 class="btn btn-small text-warning" target="_blank"><i class="fas fa-print"></i> Cetak</a>
											</td>
									</tr>
									<?php endforeach; ?>

								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div>
			<!-- /.container-fluid -->

			<!-- Sticky Footer -->
			<?php $this->load->view("admin/_partials/footer.php") ?>

		</div>
		<!-- /.content-wrapper -->

	</div>
	<!-- /#wrapper -->


	<?php $this->load->view("admin/_partials/scrolltop.php") ?>
	<?php $this->load->view("admin/_partials/modal.php") ?>

	<?php $this->load->view("admin/_partials/js.php") ?>

	<script>
	function deleteConfirm(url){
		$('#btn-delete').attr('href', url);
		$('#deleteModal').modal();
	}
	</script>
</body>

</html>
