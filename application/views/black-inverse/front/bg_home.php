<div id="content-center"><div id="bg-welcome">
<h1>Selamat Datang di <?php echo $GLOBALS['site_title']; ?></h1>
<div class="cleaner_h0"></div>
<h3><?php echo $GLOBALS['site_quotes']; ?></h3>
<div class="cleaner_h5"></div>
<div class="line_dotted"></div>
<div class="cleaner_h5"></div>
<?php echo $GLOBALS['site_welcome']; ?>
</div>

<div class="cleaner_h10"></div>


<div id="title-news">BERITA TERBARU</div>


<?php
$w = $this->db->select("*")->join("dlmbg_kategori","dlmbg_kategori.id_kategori=dlmbg_berita.id_kategori")->get("dlmbg_berita",5,0);

	foreach($w->result() as $h)
	{
		echo '<div id="news-list">
		<h4>Kategori : '.$h->nama_kategori.'</h4><h1><a href="'.base_url().'web/berita/detail/'.$h->id_berita.'">'.$h->judul.'</a></h1>'.strip_tags(substr($h->isi,0,250)).'
		<div class="cleaner_h5"></div>
		<a href="'.base_url().'web/berita/detail/'.$h->id_berita.'">Baca Selengkapnya</a>
		</div>';
	}
?>

<div class="index-button">INDEXS BERITA</div>

<div class="cleaner_h30"></div>

</div>