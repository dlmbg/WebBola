	<section class="container">
	
		<!-- Headings
			================================================== -->
		<section class="row-fluid">
			<h1 class="box-header"><span class="icon-eject"></span> Klasemen | <?php echo $GLOBALS['site_title']; ?></h1>
			<div class="box">
				<div class="well">
					<?php echo form_open_multipart("admin/jadwal/simpan"); ?>
				
				<label for="menu">Team 1</label>
				<div class="cleaner_h5"></div>
				<select name="id_team_1">
				<?php
					foreach($team->result_array() as $k)
					{
						if($id_team_1==$k['id_team'])
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
				
				<label for="menu">Team 2</label>
				<div class="cleaner_h5"></div>
				<select name="id_team_2">
				<?php
					foreach($team->result_array() as $k)
					{
						if($id_team_2==$k['id_team'])
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
				
				<label for="menu">tanggal</label>
				<div class="cleaner_h5"></div>
				<input type="date" style="width:90%;" id="tanggal" name="tanggal" placeholder="tanggal" value="<?php echo $tanggal; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">lapangan</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="lapangan" name="lapangan" placeholder="lapangan" value="<?php echo $lapangan; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">Wasit</label>
				<div class="cleaner_h5"></div>
				<select name="id_wasit">
				<?php
					foreach($wasit->result_array() as $k)
					{
						if($id_wasit==$k['id_wasit'])
						{
							echo "<option value='".$k['id_wasit']."' selected>".$k['nama']."</option>";
						}
						else
						{
							echo "<option value='".$k['id_wasit']."'>".$k['nama']."</option>";
						}
					}
				?>
				</select>
				<div class="cleaner_h10"></div>
				
				<label for="menu">Alamat Lapangan</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="alamat_lapangan" name="alamat_lapangan" placeholder="alamat_lapangan" value="<?php echo $alamat_lapangan; ?>" />
				<div class="cleaner_h10"></div>
				
				<input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />
				<input type="hidden" name="tipe" value="<?php echo $tipe; ?>" />
				<div class="cleaner_h10"></div>
				<input type="submit" class="btn btn-info" value="SIMPAN" />
				<?php echo form_close(); ?>
				</div>
			</div>
		</section>