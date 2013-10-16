<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_global_admin_model extends CI_Model {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
	 
	public function generate_index_user($limit,$offset,$filter=array())
	{
		$hasil="";
		$tot_hal = $this->db->get("dlmbg_user");

		$config['base_url'] = base_url() . 'admin/user/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->get("dlmbg_user",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Superadmin Name</th>
					<th>Username</th>
					<th width='160'><a href='".base_url()."admin/user/tambah' class='btn btn-small btn-success'><i class='icon-plus-sign'></i> Tambah Data</a></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->nama_user."</td>
					<td>".$h->username."</td>
					<td>";
			$hasil .= "<a href='".base_url()."admin/user/edit/".$h->kode_user."' class='btn btn-small btn-inverse'><i class='icon-edit'></i> Edit</a> ";
			$hasil .= "<a href='".base_url()."admin/user/hapus/".$h->kode_user."' onClick=\"return confirm('Are you sure?');\" class='btn btn-small btn-danger'><i class='icon-trash'></i> Hapus</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_kabupaten($limit,$offset)
	{
		$hasil="";
		$tot_hal = $this->db->get("dlmbg_kabupaten");

		$config['base_url'] = base_url() . 'admin/kabupaten/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->get("dlmbg_kabupaten",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Nama Kecamatan</th>
					<th width='160'><a href='".base_url()."admin/kabupaten/tambah' class='btn btn-small btn-success'><i class='icon-plus-sign'></i> Tambah Data</a></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->nama_kabupaten."</td>
					<td>";
			$hasil .= "<a href='".base_url()."admin/kabupaten/edit/".$h->id_kabupaten."' class='btn btn-small btn-inverse'><i class='icon-edit'></i> Edit</a> ";
			$hasil .= "<a href='".base_url()."admin/kabupaten/hapus/".$h->id_kabupaten."' onClick=\"return confirm('Are you sure?');\" class='btn btn-small btn-danger'><i class='icon-trash'></i> Hapus</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_sistem($limit,$offset)
	{
		$hasil="";
		$tot_hal = $this->db->get("dlmbg_setting");

		$config['base_url'] = base_url() . 'admin/sistem/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->get("dlmbg_setting",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Setting System</th>
					<th>Type</th>
					<th></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->title."</td>
					<td>".$h->tipe."</td>
					<td>";
			$hasil .= "<a href='".base_url()."admin/sistem/edit/".$h->id_setting."' class='btn btn-small btn-inverse'><i class='icon-edit'></i> Edit</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}

	public function generate_menu($limit,$offset)
	{
		$i = $offset+1;
		$tot_hal = $this->db->get("dlmbg_menu");

		$config['base_url'] = base_url() . 'admin/routing_pages/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);
		
		$w = $this->db->get("dlmbg_menu",$limit,$offset);
		
		$hasil = "";
		$hasil .= "<table class='table table-striped table-condensed'>
				<thead>
				<tr class='warning'>
				<td width='30'><b>No.</b></td>
				<td><b>Menu</b></td>
				<td><b>URL Route</b></td>
				<td><b>Posisi</b></td>
				<td width='150'><a href='".base_url()."admin/routing_pages/tambah' class='btn btn-success btn-small'><i class='icon-plus-sign'></i> Tambah Data</a></td>
				</tr>
				</thead>";
				
		foreach($w->result() as $h)
		{
			$hasil .= "<tr><td>".$i." </td><td>".$h->menu." </td><td>".$h->url_route." </td><td>".$h->posisi." </td>
			<td><a href='".base_url()."admin/routing_pages/edit/".$h->id_menu."' class='btn btn-inverse btn-small'>
			<i class='icon-edit'></i> Edit</a>
			<a href='".base_url()."admin/routing_pages/hapus/".$h->id_menu."' class='btn btn-danger btn-small' onClick=\"return confirm('Are you sure?');\" >
			<i class='icon-trash'></i> Hapus</a>";
			
			$hasil .= "</td></tr>";
			$i++;
		}
		
		$hasil .= "</table>";
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}

	public function generate_index_buku_tamu($limit,$offset)
	{
		$i = $offset+1;
		$tot_hal = $this->db->get("dlmbg_buku_tamu");

		$config['base_url'] = base_url() . 'admin/data_buku_tamu/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);
		
		$w = $this->db->get("dlmbg_buku_tamu",$limit,$offset);
		
		$hasil = "";
		$hasil .= "<table class='table table-striped table-condensed'>
				<thead>
				<tr>
				<th width='30'>No.</th>
				<th>Nama</th>
				<th>Email</th>
				<th width='230'></th>
				</tr>
				</thead>";
				
		foreach($w->result() as $h)
		{
			$st = 0;
			$st_text = "Unapprove";
			if($h->st==0)
			{
				$st = 1;
				$st_text = "Approve";
			}
			$hasil .= "<tr><td>".$i." </td><td>".$h->nama." </td><td>".$h->email." </td>
			<td><a href='".base_url()."admin/data_buku_tamu/approve/".$h->id_buku_tamu."/".$st."' class='btn btn-primary btn-small'>
			<i class='icon-share'></i> ".$st_text."</a>
			<a href='".base_url()."admin/data_buku_tamu/edit/".$h->id_buku_tamu."' class='btn btn-inverse btn-small'>
			<i class='icon-edit'></i> Edit</a>
			<a href='".base_url()."admin/data_buku_tamu/hapus/".$h->id_buku_tamu."' class='btn btn-danger btn-small' onClick=\"return confirm('Are you sure?');\" >
			<i class='icon-trash'></i> Hapus</a>";
			
			$hasil .= "</td></tr>";
			$i++;
		}
		
		$hasil .= "</table>";
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}

	public function generate_index_contact($limit,$offset)
	{
		$i = $offset+1;
		$tot_hal = $this->db->get("dlmbg_contact");

		$config['base_url'] = base_url() . 'admin/data_contact/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);
		
		$w = $this->db->get("dlmbg_contact",$limit,$offset);
		
		$hasil = "";
		$hasil .= "<table class='table table-striped table-condensed'>
				<thead>
				<tr>
				<th width='30'>No.</th>
				<th>Nama</th>
				<th>Telepon</th>
				<th>Email</th>
				<th width='230'></th>
				</tr>
				</thead>";
				
		foreach($w->result() as $h)
		{
			$hasil .= "<tr><td>".$i." </td><td>".$h->nama." </td><td>".$h->telepon." </td><td>".$h->email." </td>
			<td><a href='".base_url()."admin/data_contact/edit/".$h->id_contact."' class='btn btn-inverse btn-small'>
			<i class='icon-edit'></i> Edit</a>
			<a href='".base_url()."admin/data_contact/hapus/".$h->id_contact."' class='btn btn-danger btn-small' onClick=\"return confirm('Are you sure?');\" >
			<i class='icon-trash'></i> Hapus</a>";
			
			$hasil .= "</td></tr>";
			$i++;
		}
		
		$hasil .= "</table>";
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}

	public function generate_index_galeri($limit,$offset)
	{
		$i = $offset+1;
		$tot_hal = $this->db->get("dlmbg_galeri");

		$config['base_url'] = base_url() . 'admin/data_galeri/index/';
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
		
		$hasil = "<p><a href='".base_url()."admin/data_galeri/tambah' class='btn btn-success btn-small'><i class='icon-plus-sign'></i> Tambah Data</a></p>
		<div class='row-fluid'>";
				
		$i = 0;
		foreach($w->result() as $h)
		{
			if($i==0)
			{
				$hasil .= '</ul>';
				$hasil .= '<ul class="thumbnails m-media-container">';
			}
			$hasil .= "<li class='span2'><a href='#' class='thumbnail'>
			<img src='".base_url()."asset/galeri/".$h->gambar."'></a>
			<div class='m-media-action'>
			<a href='".base_url()."admin/data_galeri/edit/".$h->id_galeri."' class='btn btn-inverse btn-small'>
			<i class='icon-edit'></i></a>
			<a href='".base_url()."admin/data_galeri/hapus/".$h->id_galeri."/".$h->gambar."' class='btn btn-danger btn-small' onClick=\"return confirm('Are you sure?');\" >
			<i class='icon-trash'></i></a></div></li>";
			
			$i++;
			if($i>5)
			{
				$i=0;
			}
		}
		
		$hasil .= '</div>';
		
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_wasit($limit,$offset,$filter=array())
	{
		$hasil="";
		$tot_hal = $this->db->get("dlmbg_wasit");

		$config['base_url'] = base_url() . 'admin/wasit/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->get("dlmbg_wasit",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Nama</th>
					<th width='160'><a href='".base_url()."admin/wasit/tambah' class='btn btn-small btn-success'><i class='icon-plus-sign'></i> Tambah Data</a></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->nama."</td>
					<td>";
			$hasil .= "<a href='".base_url()."admin/wasit/edit/".$h->id_wasit."' class='btn btn-small btn-inverse'><i class='icon-edit'></i> Edit</a> ";
			$hasil .= "<a href='".base_url()."admin/wasit/hapus/".$h->id_wasit."' onClick=\"return confirm('Are you sure?');\" class='btn btn-small btn-danger'><i class='icon-trash'></i> Hapus</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_lapangan($limit,$offset,$filter=array())
	{
		$hasil="";
		$tot_hal = $this->db->get("dlmbg_lapangan");

		$config['base_url'] = base_url() . 'admin/lapangan/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->get("dlmbg_lapangan",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Nama Lapangan</th>
					<th>Alamat Lapangan</th>
					<th width='160'><a href='".base_url()."admin/lapangan/tambah' class='btn btn-small btn-success'><i class='icon-plus-sign'></i> Tambah Data</a></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->nama_lapangan."</td>
					<td>".$h->alamat_lapangan."</td>
					<td>";
			$hasil .= "<a href='".base_url()."admin/lapangan/edit/".$h->id_lapangan."' class='btn btn-small btn-inverse'><i class='icon-edit'></i> Edit</a> ";
			$hasil .= "<a href='".base_url()."admin/lapangan/hapus/".$h->id_lapangan."' onClick=\"return confirm('Are you sure?');\" class='btn btn-small btn-danger'><i class='icon-trash'></i> Hapus</a></td>
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

		$config['base_url'] = base_url() . 'admin/team/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->select("*")->join("dlmbg_kabupaten", "dlmbg_kabupaten.id_kabupaten=dlmbg_team.id_kabupaten")->get("dlmbg_team",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Nama</th>
					<th>Kabupaten</th>
					<th width='160'><a href='".base_url()."admin/team/tambah' class='btn btn-small btn-success'><i class='icon-plus-sign'></i> Tambah Data</a></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->nama."</td>
					<td>".$h->nama_kabupaten."</td>
					<td>";
			$hasil .= "<a href='".base_url()."admin/team/edit/".$h->id_team."' class='btn btn-small btn-inverse'><i class='icon-edit'></i> Edit</a> ";
			$hasil .= "<a href='".base_url()."admin/team/hapus/".$h->id_team."' onClick=\"return confirm('Are you sure?');\" class='btn btn-small btn-danger'><i class='icon-trash'></i> Hapus</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_pemain($limit,$offset,$filter=array())
	{
		$hasil="";
		$tot_hal = $this->db->get("dlmbg_pemain");

		$config['base_url'] = base_url() . 'admin/pemain/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->select("dlmbg_team.nama as nama_team, dlmbg_pemain.nama as nama_pemain, id_pemain")->join("dlmbg_team", "dlmbg_team.id_team=dlmbg_pemain.id_team")->get("dlmbg_pemain",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Nama</th>
					<th>Team</th>
					<th width='160'><a href='".base_url()."admin/pemain/tambah' class='btn btn-small btn-success'><i class='icon-plus-sign'></i> Tambah Data</a></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->nama_pemain."</td>
					<td>".$h->nama_team."</td>
					<td>";
			$hasil .= "<a href='".base_url()."admin/pemain/edit/".$h->id_pemain."' class='btn btn-small btn-inverse'><i class='icon-edit'></i> Edit</a> ";
			$hasil .= "<a href='".base_url()."admin/pemain/hapus/".$h->id_pemain."' onClick=\"return confirm('Are you sure?');\" class='btn btn-small btn-danger'><i class='icon-trash'></i> Hapus</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_kategori($limit,$offset,$filter=array())
	{
		$hasil="";
		$tot_hal = $this->db->get("dlmbg_kategori");

		$config['base_url'] = base_url() . 'admin/kategori/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->get("dlmbg_kategori",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Nama</th>
					<th width='160'><a href='".base_url()."admin/kategori/tambah' class='btn btn-small btn-success'><i class='icon-plus-sign'></i> Tambah Data</a></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->nama_kategori."</td>
					<td>";
			$hasil .= "<a href='".base_url()."admin/kategori/edit/".$h->id_kategori."' class='btn btn-small btn-inverse'><i class='icon-edit'></i> Edit</a> ";
			$hasil .= "<a href='".base_url()."admin/kategori/hapus/".$h->id_kategori."' onClick=\"return confirm('Are you sure?');\" class='btn btn-small btn-danger'><i class='icon-trash'></i> Hapus</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_pendaftaran($limit,$offset,$filter=array())
	{
		$hasil="";
		$tot_hal = $this->db->get("dlmbg_pendaftaran");

		$config['base_url'] = base_url() . 'admin/pendaftaran/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->get("dlmbg_pendaftaran",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Nama</th>
					<th>Tanggal</th>
					<th>Alamat</th>
					<th>Promotor</th>
					<th width='160'></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->nama_team."</td>
					<td>".$h->tanggal."</td>
					<td>".$h->alamat."</td>
					<td>".$h->promotor."</td>
					<td>";
			$hasil .= "<a href='".base_url()."admin/pendaftaran/edit/".$h->id_pendaftaran."' class='btn btn-small btn-inverse'><i class='icon-edit'></i> Edit</a> ";
			$hasil .= "<a href='".base_url()."admin/pendaftaran/hapus/".$h->id_pendaftaran."' onClick=\"return confirm('Are you sure?');\" class='btn btn-small btn-danger'><i class='icon-trash'></i> Hapus</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_pengumuman($limit,$offset,$filter=array())
	{
		$hasil="";
		$tot_hal = $this->db->get("dlmbg_pengumuman");

		$config['base_url'] = base_url() . 'admin/pengumuman/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->get("dlmbg_pengumuman",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Judul</th>
					<th width='160'><a href='".base_url()."admin/pengumuman/tambah' class='btn btn-small btn-success'><i class='icon-plus-sign'></i> Tambah Data</a></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->judul."</td>
					<td>";
			$hasil .= "<a href='".base_url()."admin/pengumuman/edit/".$h->id_pengumuman."' class='btn btn-small btn-inverse'><i class='icon-edit'></i> Edit</a> ";
			$hasil .= "<a href='".base_url()."admin/pengumuman/hapus/".$h->id_pengumuman."' onClick=\"return confirm('Are you sure?');\" class='btn btn-small btn-danger'><i class='icon-trash'></i> Hapus</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_berita($limit,$offset,$filter=array())
	{
		$hasil="";
		$tot_hal = $this->db->get("dlmbg_berita");

		$config['base_url'] = base_url() . 'admin/berita/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->select("*")->join("dlmbg_kategori","dlmbg_kategori.id_kategori=dlmbg_berita.id_kategori")->get("dlmbg_berita",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Judul</th>
					<th>Kategori</th>
					<th width='160'><a href='".base_url()."admin/berita/tambah' class='btn btn-small btn-success'><i class='icon-plus-sign'></i> Tambah Data</a></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->judul."</td>
					<td>".$h->nama_kategori."</td>
					<td>";
			$hasil .= "<a href='".base_url()."admin/berita/edit/".$h->id_berita."' class='btn btn-small btn-inverse'><i class='icon-edit'></i> Edit</a> ";
			$hasil .= "<a href='".base_url()."admin/berita/hapus/".$h->id_berita."' onClick=\"return confirm('Are you sure?');\" class='btn btn-small btn-danger'><i class='icon-trash'></i> Hapus</a></td>
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
		
		$hasil .= "<table class='table table-striped table-condensed'>
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
					<th width='160'><a href='".base_url()."admin/klasemen/tambah' class='btn btn-small btn-success'><i class='icon-plus-sign'></i> Tambah Data</a></th>
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
					<td>";
			$hasil .= "<a href='".base_url()."admin/klasemen/edit/".$h->id_klasemen."' class='btn btn-small btn-inverse'><i class='icon-edit'></i> Edit</a> ";
			$hasil .= "<a href='".base_url()."admin/klasemen/hapus/".$h->id_klasemen."' onClick=\"return confirm('Are you sure?');\" class='btn btn-small btn-danger'><i class='icon-trash'></i> Hapus</a></td>
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

		$config['base_url'] = base_url() . 'admin/jadwal/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->select("id_jadwal, k.nama_lapangan, tanggal, k.alamat_lapangan, a.nama as team1, b.nama as team2, dlmbg_wasit.nama as wasit")->join("dlmbg_team a", "a.id_team=x.id_team_1")->join("dlmbg_team b", "b.id_team=x.id_team_2")->join("dlmbg_wasit", "dlmbg_wasit.id_wasit=x.id_wasit")->join("dlmbg_lapangan k", "k.id_lapangan=x.lapangan")->get("dlmbg_jadwal x",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Nama Team 1</th>
					<th>Nama Team 2</th>
					<th>Tanggal</th>
					<th>Lapangan</th>
					<th>Wasit</th>
					<th>Alamat Lapangan</th>
					<th width='160'><a href='".base_url()."admin/jadwal/tambah' class='btn btn-small btn-success'><i class='icon-plus-sign'></i> Tambah Data</a></th>
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
					<td>".$h->alamat_lapangan."</td>
					<td>";
			$hasil .= "<a href='".base_url()."admin/jadwal/edit/".$h->id_jadwal."' class='btn btn-small btn-inverse'><i class='icon-edit'></i> Edit</a> ";
			$hasil .= "<a href='".base_url()."admin/jadwal/hapus/".$h->id_jadwal."' onClick=\"return confirm('Are you sure?');\" class='btn btn-small btn-danger'><i class='icon-trash'></i> Hapus</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
}
