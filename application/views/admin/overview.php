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

        <!-- 
        karena ini halaman overview (home), kita matikan partial breadcrumb.
        Jika anda ingin mengampilkan breadcrumb di halaman overview,
        silahkan hilangkan komentar (//) di tag PHP di bawah.
        -->
		<?php //$this->load->view("admin/_partials/breadcrumb.php") ?>

		<!-- Icon Cards-->
		<div class="row">
			<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-primary o-hidden h-100">
				<div class="card-body">
				<div class="card-body-icon">
					<i class="fas fa-fw fa-envelope-open"></i>
				</div>
				<div class="mr-5">
					<?php $query = $this->db->query('SELECT * FROM surat');
					echo $query->num_rows(); ?> Surat</div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href="<?php echo site_url('admin/surat') ?>">
				<span class="float-left">Lihat Detail</span>
				<span class="float-right">
					<i class="fas fa-angle-right"></i>
				</span>
				</a>
			</div>
			</div>
			<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-warning o-hidden h-100">
				<div class="card-body">
				<div class="card-body-icon">
					<i class="fas fa-fw fa-users"></i>
				</div>
				<div class="mr-5"><?php $query = $this->db->query('SELECT * FROM pegawai');
					echo $query->num_rows(); ?> Pegawai</div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href="<?php echo site_url('admin/pegawai') ?>">
				<span class="float-left">Lihat Detail</span>
				<span class="float-right">
					<i class="fas fa-angle-right"></i>
				</span>
				</a>
			</div>
			</div>
			
		</div>

		<!-- Area Chart Example-->
		<div class="container">
			<div class="row">
				<div class="card m-3 col" >
					<div class="card-header">
					<i class="fas fa-envelope-open"></i>
					Surat Baru Cepat</div>
					<div class="card-body">

					<form action="<?php base_url('') ?>" method="post" enctype="multipart/form-data" >

							<div class="text-center">
								<a href="<?php echo site_url('admin/surat/add/') ?>"class="btn btn-primary btn-lg mt-4">Surat Baru</a>
											
							</div>
					</form>
			
					</div>
					<div class="card-footer small text-muted">Pintasan untuk membuat surat tugas dosen baru</div>
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
    
</body>
</html>
