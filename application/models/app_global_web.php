<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_global_web extends CI_Model {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
	 
	 
	public function generate_index_menu($posisi="")
	{
		$hasil="";
		$where['posisi'] = $posisi;
		$w = $this->db->get_where("dlmbg_menu",$where);
		
		$hasil .= "<ul>";
		foreach($w->result() as $h)
		{
			$hasil .= '<li><a href="'.base_url().'web/pages/'.$h->id_menu.'/'.url_title($h->menu,'-',TRUE).'">'.$h->menu.'</a></li>';
		}
		$hasil .= '</ul>';
		return $hasil;
	}
	 
	 
	public function generate_index_galeri($limit,$offset)
	{
		$i = $offset+1;
		$tot_hal = $this->db->get("dlmbg_galeri");

		$config['base_url'] = base_url() . 'web/galeri/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);
		
		$w = $this->db->get("dlmbg_galeri",$limit,$offset);
		
		$hasil = "";
				
		$i = 0;
		foreach($w->result() as $h)
		{
			$hasil .= "<div style='float:left; width:130px; height:80px; padding:10px;'><a href='".base_url()."asset/galeri/".$h->gambar."'  rel='galeri' title='".$h->judul."'>
			<img src='".base_url()."asset/galeri/".$h->gambar."' style='float:left; width:130px; height:80px;'></a></div>";
		}
		$hasil .= "<div class='cleaner_h10'></div>";
		
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	 
	public function generate_index_buku_tamu($limit,$offset)
	{
		$i = $offset+1;
		$where['st'] = 1;
		$tot_hal = $this->db->get_where("dlmbg_buku_tamu");

		$config['base_url'] = base_url() . 'web/buku_tamu/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);
		
		$w = $this->db->get_where("dlmbg_buku_tamu",$where,$limit,$offset);
		
		$hasil = "";
				
		$i = 0;
		foreach($w->result() as $h)
		{
			$hasil .= '
						<table border="0" cellpadding="5" cellspacing="0">
								<tr>
									<td width="100">Nama</td>
									<td width="20">:</td>
									<td>'.$h->nama.'</td>
								</tr>
								<tr>
									<td width="100">Email</td>
									<td width="20">:</td>
									<td>'.$h->email.'</td>
								</tr>
								<tr>
								<tr valign="top">
									<td width="100">Pesan</td>
									<td width="20">:</td>
									<td>'.$h->pesan.'</td>
								</tr>
								<tr valign="top" height="30">
									<td width="100"></td>
									<td width="20"></td>
									<td></td>
								</tr>

							</table>
			';
		}
		$hasil .= "<div class='cleaner_h10'></div>";
		
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	 
	public function generate_index_berita($limit,$offset)
	{
		$i = $offset+1;
		$tot_hal = $this->db->select("*")->join("dlmbg_kategori","dlmbg_kategori.id_kategori=dlmbg_berita.id_kategori")->get("dlmbg_berita");

		$config['base_url'] = base_url() . 'web/berita/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);
		
		$w = $this->db->select("*")->join("dlmbg_kategori","dlmbg_kategori.id_kategori=dlmbg_berita.id_kategori")->get("dlmbg_berita",$limit,$offset);
		
		$hasil = "";
				
		$i = 0;
		foreach($w->result() as $h)
		{
			$hasil .= '<div id="news-list">
		<h4>Kategori : '.$h->nama_kategori.'</h4><h1><a href="'.base_url().'web/berita/detail/'.$h->id_berita.'">'.$h->judul.'</a></h1>'.strip_tags(substr($h->isi,0,250)).'
		<div class="cleaner_h5"></div>
		<a href="'.base_url().'web/berita/detail/'.$h->id_berita.'">Baca Selengkapnya</a>
		</div>
			';
		}
		$hasil .= "<div class='cleaner_h10'></div>";
		
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	 
	public function generate_index_pengumuman($limit,$offset)
	{
		$i = $offset+1;
		$tot_hal = $this->db->get("dlmbg_pengumuman");

		$config['base_url'] = base_url() . 'web/pengumuman/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);
		
		$w = $this->db->get("dlmbg_pengumuman",$limit,$offset);
		
		$hasil = "";
				
		$i = 0;
		foreach($w->result() as $h)
		{
			$hasil .= '<div id="news-list"><h1><a href="'.base_url().'web/pengumuman/detail/'.$h->id_pengumuman.'">'.$h->judul.'</a></h1>'.strip_tags(substr($h->isi,0,250)).'
		<div class="cleaner_h5"></div>
		<a href="'.base_url().'web/pengumuman/detail/'.$h->id_pengumuman.'">Baca Selengkapnya</a>
		</div>
			';
		}
		$hasil .= "<div class='cleaner_h10'></div>";
		
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_pemain($limit,$offset,$filter=array())
	{
		$hasil="";
		$tot_hal = $this->db->get("dlmbg_pemain");

		$config['base_url'] = base_url() . 'web/pemain/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->select("dlmbg_team.nama as nama_team, dlmbg_pemain.nama as nama_pemain, id_pemain")->join("dlmbg_team", "dlmbg_team.id_team=dlmbg_pemain.id_team")->get("dlmbg_pemain",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed' cellpadding=5 border=1 cellspacing=0 width=100%>
					<thead>
					<tr>
					<th>No.</th>
					<th>Nama</th>
					<th>Team</th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->nama_pemain."</td>
					<td>".$h->nama_team."</td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_team($limit,$offset,$filter=array())
	{
		$hasil="";
		$tot_hal = $this->db->get("dlmbg_team");

		$config['base_url'] = base_url() . 'web/team/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->select("*")->join("dlmbg_kabupaten", "dlmbg_kabupaten.id_kabupaten=dlmbg_team.id_kabupaten")->get("dlmbg_team",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed' cellpadding=5 border=1 cellspacing=0 width=100%>
					<thead>
					<tr>
					<th>No.</th>
					<th>Nama</th>
					<th>Kabupaten</th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->nama."</td>
					<td>".$h->nama_kabupaten."</td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_wasit($limit,$offset,$filter=array())
	{
		$hasil="";
		$tot_hal = $this->db->get("dlmbg_wasit");

		$config['base_url'] = base_url() . 'web/wasit/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->get("dlmbg_wasit",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed' cellpadding=5 border=1 cellspacing=0 width=100%>
					<thead>
					<tr>
					<th>No.</th>
					<th>Nama</th></tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->nama."</td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_klasemen($limit,$offset,$filter=array())
	{
		$hasil="";
		$tot_hal = $this->db->get("dlmbg_klasemen");

		$config['base_url'] = base_url() . 'admin/klasemen/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->select("dlmbg_team.nama as nama_team, dlmbg_klasemen.nama as nama_klasemen, win, draw, lose, gol, kms, poin, id_klasemen")->join("dlmbg_team", "dlmbg_team.id_team=dlmbg_klasemen.id_team")->order_by("win","DESC")->get("dlmbg_klasemen",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed' cellpadding=5 border=1 cellspacing=0 width=100%>
					<thead>
					<tr>
					<th>No.</th>
					<th>Nama Klasemen</th>
					<th>Nama Team</th>
					<th>Win</th>
					<th>Draw</th>
					<th>Lose</th>
					<th>Gol</th>
					<th>Kms</th>
					<th>Poin</th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->nama_klasemen."</td>
					<td>".$h->nama_team."</td>
					<td>".$h->win."</td>
					<td>".$h->draw."</td>
					<td>".$h->lose."</td>
					<td>".$h->gol."</td>
					<td>".$h->kms."</td>
					<td>".$h->poin."</td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_jadwal($limit,$offset,$filter=array())
	{
		$hasil="";
		$tot_hal = $this->db->get("dlmbg_jadwal");

		$config['base_url'] = base_url() . 'web/jadwal/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->select("id_jadwal, k.nama_lapangan, tanggal, k.alamat_lapangan, a.nama as team1, b.nama as team2, dlmbg_wasit.nama as wasit")->join("dlmbg_team a", "a.id_team=x.id_team_1")->join("dlmbg_team b", "b.id_team=x.id_team_2")->join("dlmbg_wasit", "dlmbg_wasit.id_wasit=x.id_wasit")->join("dlmbg_lapangan k", "k.id_lapangan=x.lapangan")->get("dlmbg_jadwal x",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed' cellpadding=5 border=1 cellspacing=0 width=100%>
					<thead>
					<tr>
					<th>No.</th>
					<th>Nama Team 1</th>
					<th>Nama Team 2</th>
					<th>Tanggal</th>
					<th>Lapangan</th>
					<th>Wasit</th>
					<th>Alamat Lapangan</th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->team1."</td>
					<td>".$h->team2."</td>
					<td>".$h->tanggal."</td>
					<td>".$h->nama_lapangan."</td>
					<td>".$h->wasit."</td>
					<td>".$h->alamat_lapangan."</td></tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}

}
