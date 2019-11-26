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

						<a href="<?php echo site_url('admin/surat/') ?>"><i class="fas fa-arrow-left"></i>
							Back</a>
					</div>
					<div class="card-body">
						<h3>Lembar Pertama</h3>

						<form action="<?php base_url(" admin/surat/edit") ?>" method="post"
							enctype="multipart/form-data" >

							<input type="hidden" name="id_surat" value="<?php echo $surat->id_surat?>" />

							<div class="form-group">
								<label for="name">Nomor Surat*</label>
								<input class="form-control <?php echo form_error('no_surat') ? 'is-invalid':'' ?>"
								 type="text" name="no_surat" placeholder="Masukan periode" value="B.0051/Un.05/III.7/PP.00.9/<?php echo date('m');?>/<?php  echo date("Y");?>" readonly/>
								<div class="invalid-feedback">
									<?php echo form_error('no_surat') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Pejabat Pemberi Perintah*</label>
								<select class="form-control  <?php echo form_error('kode_pejabat') ? 'is-invalid':'' ?>"  name="kode_pejabat" >	
								<?php foreach ($pejabat as $pejabat): ?>	
								<option value="<?php echo $pejabat->kode_pejabat;?>"><?php echo $pejabat->nama;?></option>
								<?php endforeach; ?>
								</select>
								<div class="invalid-feedback">
									<?php echo form_error('kode_pejabat') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Pegawai 1 Yang Diperitah*</label>
								<select class="form-control  <?php echo form_error('nip') ? 'is-invalid':'' ?>"  name="nip" >
								<?php foreach ($pegawai as $pegawai_pertama): ?>	
								<option value="<?php echo $pegawai_pertama->NIP;?>"><?php echo $pegawai_pertama->Nama;?></option>
								<?php endforeach; ?> 
							
								</select>
								<div class="invalid-feedback">
									<?php echo form_error('nip') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Pegawai 2 Yang Diperitah*</label>
								<select class="form-control  <?php echo form_error('pegawai_kedua') ? 'is-invalid':'' ?>"  name="pegawai_kedua" >	
								<?php foreach ($pegawai as $pegawai_kedua): ?>	
								<option value="<?php echo $pegawai_kedua->NIP;?>"><?php echo $pegawai_kedua->Nama;?></option>
								<?php endforeach; ?> 
							
								</select>
								<div class="invalid-feedback">
									<?php echo form_error('pegawai_kedua') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Pegawai PPNPN 1 Yang Diperitah*</label>
								<select class="form-control  <?php echo form_error('ppnpn_pertama') ? 'is-invalid':'' ?>"  name="ppnpn_pertama" >								<?php foreach ($pegawaippnpn as $ppnpn_pertama): ?>	
								<option value="<?php echo $ppnpn_pertama->id;?>"><?php echo $ppnpn_pertama->nama;?></option>
								<?php endforeach; ?> 
							
								</select>
								<div class="invalid-feedback">
									<?php echo form_error('ppnpn_pertama') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Pegawai PPNPN 2 Yang Diperitah*</label>
								<select class="form-control  <?php echo form_error('ppnpn_kedua') ? 'is-invalid':'' ?>"  name="ppnpn_kedua" >
								<?php foreach ($pegawaippnpn as $ppnpn_kedua): ?>	
								<option value="<?php echo $ppnpn_kedua->id;?>"><?php echo $ppnpn_kedua->nama;?></option>
								<?php endforeach; ?> 
							
								</select>
								<div class="invalid-feedback">
									<?php echo form_error('ppnpn_kedua') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Alasan*</label>
								<input class="form-control <?php echo form_error('alasan') ? 'is-invalid':'' ?>"
								 type="text" name="alasan" placeholder="Masukan Alasan" value="<?php echo $surat->alasan?>" />
								<div class="invalid-feedback">
									<?php echo form_error('alasan') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Dasar Surat 2*</label>
								<input class="form-control <?php echo form_error('dasar_kedua') ? 'is-invalid':'' ?>"
								 type="text" name="dasar_kedua" placeholder="Masukan Dasar Surat" />
								<div class="invalid-feedback">
									<?php echo form_error('dasar_kedua') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Dasar Surat 3*</label>
								<input class="form-control <?php echo form_error('dasar_ketiga') ? 'is-invalid':'' ?>"
								 type="text" name="dasar_ketiga" placeholder="Masukan Dasar Surat" />
								<div class="invalid-feedback">
									<?php echo form_error('dasar_ketiga') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Dasar Surat 4*</label>
								<input class="form-control <?php echo form_error('dasar_keempat') ? 'is-invalid':'' ?>"
								 type="text" name="dasar_keempat" placeholder="Masukan Dasar Surat" />
								<div class="invalid-feedback">
									<?php echo form_error('dasar_keempat') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Periode*</label>
								<input class="form-control <?php echo form_error('periode') ? 'is-invalid':'' ?>"
								 type="text" name="periode" placeholder="Masukan periode" />
								<div class="invalid-feedback">
									<?php echo form_error('periode') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Tanggal Surat*</label>
								<input class="form-control <?php echo form_error('tangga_surat') ? 'is-invalid':'' ?>"
								 type="date" name="tanggal_surat" placeholder="Tanggal Surat" value="<?php echo date("m/d/Y")?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('tanggal_surat') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="name">Semester*</label>
								<select class="form-control  <?php echo form_error('semester') ? 'is-invalid':'' ?>"  name="semester" >
								<option>Pilih Semester</option>	
								<option value="ganjil">Ganjil</option>
								<option value="genap">Genap</option>
								</select>
								<div class="invalid-feedback">
									<?php echo form_error('semester') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Batas SAP*</label>
								<input class="form-control <?php echo form_error('tangga_sap') ? 'is-invalid':'' ?>"
								 type="date" name="tanggal_sap" placeholder="Batas SAP" />
								<div class="invalid-feedback">
									<?php echo form_error('tanggal_sap') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Tanggal Berangkat*</label>
								<input class="form-control <?php echo form_error('tangga_mulai') ? 'is-invalid':'' ?>"
								 type="date" name="tanggal_mulai" placeholder="Tanggal Mulai" />
								<div class="invalid-feedback">
									<?php echo form_error('tanggal_mulai') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Tanggal Kembali*</label>
								<input class="form-control <?php echo form_error('tangga_selesai') ? 'is-invalid':'' ?>"
								 type="date" name="tanggal_selesai" placeholder="Tanggal Selesai" />
								<div class="invalid-feedback">
									<?php echo form_error('tanggal_selesai') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Desa*</label>
								<input class="form-control <?php echo form_error('desa') ? 'is-invalid':'' ?>"
								 type="text" name="desa" placeholder="Masukan Desa" />
								<div class="invalid-feedback">
									<?php echo form_error('desa') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Kecamatan*</label>
								<input class="form-control <?php echo form_error('kecamatan') ? 'is-invalid':'' ?>"
								 type="text" name="kecamatan" placeholder="Masukan Kecamatan" />
								<div class="invalid-feedback">
									<?php echo form_error('kecamatan') ?>
								</div>
							</div>

							<hr style="border-bottom: 1px solid black">

							<h3>Lembar Kedua</h3>

							<div class="form-group">
								<label for="name">Lembar Ke*</label>
								<input class="form-control <?php echo form_error('lembar_ke') ? 'is-invalid':'' ?>"
								 type="text" name="lembar_ke" placeholder="Lembar Ke" />
								<div class="invalid-feedback">
									<?php echo form_error('lembar_ke') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Kode No*</label>
								<input class="form-control <?php echo form_error('kode_no') ? 'is-invalid':'' ?>"
								 type="text" name="kode_no" placeholder="Kode No" />
								<div class="invalid-feedback">
									<?php echo form_error('kode_no') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Nomor*</label>
								<input class="form-control <?php echo form_error('nomor') ? 'is-invalid':'' ?>"
								 type="text" name="nomor" placeholder="Nomor" />
								<div class="invalid-feedback">
									<?php echo form_error('nomor') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Tingkat Biaya Perjalanan Dinas*</label>
								<input class="form-control <?php echo form_error('tingkat_biaya') ? 'is-invalid':'' ?>"
								 type="text" name="tingkat_biaya" placeholder="Tingkat Biaya Perjalanan" />
								<div class="invalid-feedback">
									<?php echo form_error('tingkat_biaya') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Kendaraan*</label>
								<input class="form-control <?php echo form_error('kendaraan') ? 'is-invalid':'' ?>"
								 type="text" name="kendaraan" placeholder="Kendaraan" />
								<div class="invalid-feedback">
									<?php echo form_error('kendaraan') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Tempat Berangkat*</label>
								<input class="form-control <?php echo form_error('berangkat') ? 'is-invalid':'' ?>"
								 type="text" name="berangkat" placeholder="Tempat Berangkat" />
								<div class="invalid-feedback">
									<?php echo form_error('berangkat') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Tempat Tujuan*</label>
								<input class="form-control <?php echo form_error('tujuan') ? 'is-invalid':'' ?>"
								 type="text" name="tujuan" placeholder="Tempat Tujuan" />
								<div class="invalid-feedback">
									<?php echo form_error('tujuan') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Pengikut 1 (Perhatikan Format)*</label>
								<input class="form-control <?php echo form_error('pengikut1') ? 'is-invalid':'' ?>"
								 type="text" name="pengikut1" placeholder="*Format: Nama,TanggalLahir,Keterangan" />
								<div class="invalid-feedback">
									<?php echo form_error('pengikut1') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Pengikut 2 (Perhatikan Format)*</label>
								<input class="form-control <?php echo form_error('pengikut2') ? 'is-invalid':'' ?>"
								 type="text" name="pengikut2" placeholder="*Format: Nama,TanggalLahir,Keterangan" />
								<div class="invalid-feedback">
									<?php echo form_error('pengikut2') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Pengikut 3 (Perhatikan Format)*</label>
								<input class="form-control <?php echo form_error('pengikut3') ? 'is-invalid':'' ?>"
								 type="text" name="pengikut3" placeholder="*Format: Nama,TanggalLahir,Keterangan" />
								<div class="invalid-feedback">
									<?php echo form_error('pengikut3') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Pengikut 4 (Perhatikan Format)*</label>
								<input class="form-control <?php echo form_error('pengikut4') ? 'is-invalid':'' ?>"
								 type="text" name="pengikut4" placeholder="*Format: Nama,TanggalLahir,Keterangan" />
								<div class="invalid-feedback">
									<?php echo form_error('pengikut4') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Pengikut 5 (Perhatikan Format)*</label>
								<input class="form-control <?php echo form_error('pengikut5') ? 'is-invalid':'' ?>"
								 type="text" name="pengikut5" placeholder="*Format: Nama,TanggalLahir,Keterangan" />
								<div class="invalid-feedback">
									<?php echo form_error('pengikut5') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Pembebanan Anggaran (Instansi)*</label>
								<input class="form-control <?php echo form_error('instansi') ? 'is-invalid':'' ?>"
								 type="text" name="instansi" placeholder="Nama Instansi" />
								<div class="invalid-feedback">
									<?php echo form_error('instansi') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Pembebanan Anggaran (Akun)*</label>
								<input class="form-control <?php echo form_error('akun') ? 'is-invalid':'' ?>"
								 type="text" name="akun" placeholder="Nama Akun" />
								<div class="invalid-feedback">
									<?php echo form_error('akun') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Keterangan Lain*</label>
								<input class="form-control <?php echo form_error('keterangan') ? 'is-invalid':'' ?>"
								 type="text" name="keterangan" placeholder="Nama Keterangan" />
								<div class="invalid-feedback">
									<?php echo form_error('keterangan') ?>
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
