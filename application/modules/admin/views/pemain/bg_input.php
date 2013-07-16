	<section class="container">
	
		<!-- Headings
			================================================== -->
		<section class="row-fluid">
			<h1 class="box-header"><span class="icon-eject"></span> Pemain | <?php echo $GLOBALS['site_title']; ?></h1>
			<div class="box">
				<div class="well">
					<?php echo form_open_multipart("admin/pemain/simpan"); ?>
				
				<label for="menu">Nama</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="nama" name="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">Team</label>
				<div class="cleaner_h5"></div>
				<select name="id_team">
				<?php
					foreach($team->result_array() as $k)
					{
						if($id_team==$k['id_team'])
						{
							echo "<option value='".$k['id_team']."' selected>".$k['nama']."</option>";
						}
						else
						{
							echo "<option value='".$k['id_team']."'>".$k['nama']."</option>";
						}
					}
				?>
				</select>
				<div class="cleaner_h10"></div>
				
				<label for="menu">Keterangan</label>
				<div class="cleaner_h5"></div>
				<textarea name="keterangan" id="ckeditor" class="ckeditor"><?php echo $keterangan; ?></textarea>
				<div class="cleaner_h10"></div>
				
				<input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />
				<input type="hidden" name="tipe" value="<?php echo $tipe; ?>" />
				<div class="cleaner_h10"></div>
				<input type="submit" class="btn btn-info" value="SIMPAN" />
				<?php echo form_close(); ?>
				</div>
			</div>
		</section>