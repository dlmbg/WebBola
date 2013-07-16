
<div id="content-center">

<div id="title-news">Pendaftaran</div>


<div>
<div class="cleaner_h20"></div>
	<?php echo $this->session->flashdata("hasil"); ?>
	
					<?php echo form_open_multipart("web/pendaftaran/simpan"); ?>
				
				<label for="menu">Nama</label>
				<div class="cleaner_h5"></div>
				<input type="text" style="width:90%;" id="nama" name="nama_team" placeholder="Nama" required />
				<div class="cleaner_h10"></div>
				
				<label for="menu">Tanggal</label>
				<div class="cleaner_h5"></div>
				<input type="date" style="width:90%;" id="nama" name="tanggal" placeholder="tanggal" required />
				<div class="cleaner_h10"></div>
				
				<label for="menu">Alamat</label>
				<div class="cleaner_h5"></div>
				<textarea name="alamat" class="ckeditor" id="ckeditor" cols="50" rows="6" required></textarea>
				<div class="cleaner_h10"></div>
				
				<label for="menu">Promotor</label>
				<div class="cleaner_h5"></div>
				<input type="text" style="width:90%;" id="promotor" name="promotor" placeholder="promotor" required />
				<div class="cleaner_h10"></div>
				
				<label for="menu">Keterangan</label>
				<div class="cleaner_h5"></div>
				<textarea name="keterangan" class="ckeditor" id="ckeditor" cols="50" rows="6" required></textarea>
				<div class="cleaner_h10"></div>
				
				<div class="cleaner_h10"></div>
				<input type="submit" class="btn btn-info" value="SIMPAN" />
				<?php echo form_close(); ?>
</div>

<div class="cleaner_h30"></div>

</div>