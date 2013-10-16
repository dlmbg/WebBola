<div id="content">


<div id="content-left">

<div id="bg-sidebar">
<div id="head-sidebar">JADWAL PERTANDINGAN</div>
<div id="content-sidebar">
	<?php
	$w = $this->db->select("id_jadwal, k.nama_lapangan, tanggal, k.alamat_lapangan, a.nama as team1, b.nama as team2, dlmbg_wasit.nama as wasit")->join("dlmbg_team a", "a.id_team=x.id_team_1")->join("dlmbg_team b", "b.id_team=x.id_team_2")->join("dlmbg_wasit", "dlmbg_wasit.id_wasit=x.id_wasit")->join("dlmbg_lapangan k", "k.id_lapangan=x.lapangan")->get("dlmbg_jadwal x");

	foreach($w->result() as $h)
	{
		echo "<table border=1 cellpadding=5 cellspacing=0 style='font-size:11px; width:100%;'><tr valign=top><td>".$h->team1."</td><td> vs </td><td>".$h->team2."</td></tr>
				<tr valign=top><td>Tanggal</td><td>:</td><td>".$h->tanggal."</td></tr>
				<tr valign=top><td>Lapangan</td><td>:</td><td>".$h->nama_lapangan."</td></tr>
				<tr valign=top><td>Wasit</td><td>:</td><td>".$h->wasit."</td></tr>
				<tr valign=top><td>Alamat</td><td>:</td><td>".$h->alamat_lapangan."</td></tr></table>";
				echo '<div class="cleaner_h10"></div>';
	}
	?>
</div>
</div>
<div id="bottom-sidebar"></div>

<div class="cleaner_h20"></div>

<div id="bg-sidebar">
<div id="head-sidebar">KLASEMEN SEMENTARA</div>
<div id="content-sidebar">
<ol>
	<?php
	$w = $this->db->select("dlmbg_team.nama as nama_team, dlmbg_klasemen.nama as nama_klasemen, win, draw, lose, gol, kms, poin, id_klasemen")->join("dlmbg_team", "dlmbg_team.id_team=dlmbg_klasemen.id_team")->order_by("poin","DESC")->get("dlmbg_klasemen",10,0);

	foreach($w->result() as $h)
	{
		echo '<li>'.$h->nama_team.' - '.$h->poin.'</li>';
	}
	?>
</ol>
</div>
</div>
<div id="bottom-sidebar"></div>

<div class="cleaner_h20"></div>

<div id="bg-sidebar">
<div id="head-sidebar">DATA TEAM ACAK</div>
<div id="content-sidebar">
<ul>
	<?php
	$w = $this->db->order_by("id_team", "random")->get("dlmbg_team",10,0);

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