	<section class="container">
	
		<!-- Headings
			================================================== -->
		<section class="row-fluid">
			<h1 class="box-header"><span class="icon-eject"></span> Pendaftaran | <?php echo $GLOBALS['site_title']; ?></h1>
			<div class="box">
				<div class="well">
					<?php echo form_open_multipart("admin/pendaftaran/simpan"); ?>
				
				<label for="menu">Nama</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="nama" name="nama_team" placeholder="Nama" value="<?php echo $nama_team; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">Tanggal</label>
				<div class="cleaner_h5"></div>
				<input type="date" style="width:90%;" id="nama" name="tanggal" placeholder="tanggal" value="<?php echo $tanggal; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">Alamat</label>
				<div class="cleaner_h5"></div>
				<textarea name="alamat" class="ckeditor" id="ckeditor"><?php echo $alamat; ?></textarea>
				<div class="cleaner_h10"></div>
				
				<label for="menu">Promotor</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="promotor" name="promotor" placeholder="promotor" value="<?php echo $promotor; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">Keterangan</label>
				<div class="cleaner_h5"></div>
				<textarea name="keterangan" class="ckeditor" id="ckeditor"><?php echo $keterangan; ?></textarea>
				<div class="cleaner_h10"></div>
				
				<input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />
				<input type="hidden" name="tipe" value="<?php echo $tipe; ?>" />
				<div class="cleaner_h10"></div>
				<input type="submit" class="btn btn-info" value="SIMPAN" />
				<?php echo form_close(); ?>
				</div>
			</div>
		</section>