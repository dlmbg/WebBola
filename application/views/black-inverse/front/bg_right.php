<div id="content-right">

<div id="bg-sidebar">
<div id="head-sidebar">PENGUMUMAN TERBARU</div>
<div id="content-sidebar">
<ul>
	<?php
	$w = $this->db->get("dlmbg_pengumuman",5,0);

	foreach($w->result() as $h)
	{
		echo '<li><a href="'.base_url().'web/pengumuman/detail/'.$h->id_pengumuman.'">'.$h->judul.'</a></li>';
	}
?>
</ul>
</div>
</div>
<div id="bottom-sidebar"></div>

<div class="cleaner_h20"></div>

<div id="bg-sidebar">
<div id="head-sidebar">DATA PEMAIN ACAK</div>
<div id="content-sidebar">
<ul>
	<?php
	$w = $this->db->select("dlmbg_team.nama as nama_team, dlmbg_pemain.nama as nama_pemain, id_pemain")->join("dlmbg_team", "dlmbg_team.id_team=dlmbg_pemain.id_team")->order_by("id_pemain","random")->get("dlmbg_pemain",10,0);
	foreach($w->result() as $h)
	{
		echo '<li>'.$h->nama_pemain.' - '.$h->nama_team.'</li>';
	}
	?>
</ul>
</div>
</div>
<div id="bottom-sidebar"></div>

<div class="cleaner_h20"></div>

<div id="bg-sidebar">
<div id="head-sidebar">DATA WASIT ACAK</div>
<div id="content-sidebar">
<ul>
	<?php
	$w = $this->db->get("dlmbg_wasit",10,0);
	foreach($w->result() as $h)
	{
		echo '<li>'.$h->nama.'</li>';
	}
	?>
</ul>
</div>
</div>
<div id="bottom-sidebar"></div>

</div>

<div class="cleaner_h0"></div>

</div>