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

				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<!-- Card  -->
				<div class="card mb-3">
					<div class="card-header">

						<a href="<?php echo site_url('admin/dosen/') ?>"><i class="fas fa-arrow-left"></i>
							Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url(" admin/pegawai/edit") ?>" method="post"
							enctype="multipart/form-data" >

							<div class="form-group">
								<label for="name">NIP*</label>
								<input class="form-control <?php echo form_error('NIP') ? 'is-invalid':'' ?>"
								 type="number" name="nip" placeholder="NIP" value="<?php echo $pegawai->NIP ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('NIP') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="nama">Nama Pegawai*</label>
								<input class="form-control <?php echo form_error('Nama') ? 'is-invalid':'' ?>"
								 type="text" name="nama" placeholder="Nama dosen" value="<?php echo $pegawai->Nama ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('Nama') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="nama">Golongan*</label>
								<input class="form-control <?php echo form_error('Golongan') ? 'is-invalid':'' ?>"
								 type="text" name="golongan" placeholder="Golongan" value="<?php echo $pegawai->Golongan ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('Golongan') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="nama">Jabatan*</label>
								<input class="form-control <?php echo form_error('Jabatan') ? 'is-invalid':'' ?>"
								 type="text" name="jabatan" placeholder="Jabatan" value="<?php echo $pegawai->Jabatan ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('Jabatan') ?>
								</div>
							</div>

							<input class="btn btn-success" type="submit" name="btn" value="Save" />
						</form>

					</div>

					<div class="card-footer small text-muted">
						* required fields
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

		<?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>
