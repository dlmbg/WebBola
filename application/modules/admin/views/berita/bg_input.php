	<section class="container">
	
		<!-- Headings
			================================================== -->
		<section class="row-fluid">
			<h1 class="box-header"><span class="icon-eject"></span> Berita | <?php echo $GLOBALS['site_title']; ?></h1>
			<div class="box">
				<div class="well">
					<?php echo form_open_multipart("admin/berita/simpan"); ?>
				
				<label for="menu">Judul</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="judul" name="judul" placeholder="judul" value="<?php echo $judul; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">Kategori</label>
				<div class="cleaner_h5"></div>
				<select name="id_kategori">
				<?php
					foreach($kategori->result_array() as $k)
					{
						if($id_kategori==$k['id_kategori'])
						{
							echo "<option value='".$k['id_kategori']."' selected>".$k['nama_kategori']."</option>";
						}
						else
						{
							echo "<option value='".$k['id_kategori']."'>".$k['nama_kategori']."</option>";
						}
					}
				?>
				</select>
				<div class="cleaner_h10"></div>
				
				<label for="menu">isi</label>
				<div class="cleaner_h5"></div>
				<textarea name="isi" id="ckeditor" class="ckeditor"><?php echo $isi; ?></textarea>
				<div class="cleaner_h10"></div>
				
				<input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />
				<input type="hidden" name="tipe" value="<?php echo $tipe; ?>" />
				<div class="cleaner_h10"></div>
				<input type="submit" class="btn btn-info" value="SIMPAN" />
				<?php echo form_close(); ?>
				</div>
			</div>
		</section>