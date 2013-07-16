	<section class="container">
	
		<!-- Headings
			================================================== -->
		<section class="row-fluid">
			<h1 class="box-header"><span class="icon-eject"></span> Klasemen | <?php echo $GLOBALS['site_title']; ?></h1>
			<div class="box">
				<div class="well">
					<?php echo form_open_multipart("admin/klasemen/simpan"); ?>
				
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
				
				<label for="menu">Win</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="win" name="win" placeholder="win" value="<?php echo $win; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">draw</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="draw" name="draw" placeholder="draw" value="<?php echo $draw; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">lose</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="lose" name="lose" placeholder="lose" value="<?php echo $lose; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">gol</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="gol" name="gol" placeholder="gol" value="<?php echo $gol; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">kms</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="kms" name="kms" placeholder="kms" value="<?php echo $kms; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">poin</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="poin" name="poin" placeholder="poin" value="<?php echo $poin; ?>" />
				<div class="cleaner_h10"></div>
				
				<input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />
				<input type="hidden" name="tipe" value="<?php echo $tipe; ?>" />
				<div class="cleaner_h10"></div>
				<input type="submit" class="btn btn-info" value="SIMPAN" />
				<?php echo form_close(); ?>
				</div>
			</div>
		</section>