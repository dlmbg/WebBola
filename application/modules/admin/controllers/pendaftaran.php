<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pendaftaran extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$d['data_retrieve'] = $this->app_global_admin_model->generate_index_pendaftaran($GLOBALS['site_limit_small'],$uri);
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("pendaftaran/bg_home");
 			$this->load->view("bg_footer");
		}
		else
		{
			redirect(base_url());
		}
   }
 
   public function edit($id_param)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$where['id_pendaftaran'] = $id_param;
			$get = $this->db->get_where("dlmbg_pendaftaran",$where)->row();
			
			$d['nama_team'] = $get->nama_team;
			$d['tanggal'] = $get->tanggal;
			$d['promotor'] = $get->promotor;
			$d['keterangan'] = $get->keterangan;
			$d['alamat'] = $get->alamat;
			
			$d['id_param'] = $get->id_pendaftaran;
			$d['tipe'] = "edit";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("pendaftaran/bg_input");
 			$this->load->view("bg_footer");
		}
		else
		{
			redirect(base_url());
		}
   }
 
   public function simpan()
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$tipe = $this->input->post("tipe");
			$id['id_pendaftaran'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
				$in['nama_team'] = $this->input->post("nama_team");
				$in['tanggal'] = $this->input->post("tanggal");
				$in['alamat'] = $this->input->post("alamat");
				$in['promotor'] = $this->input->post("promotor");
				$in['keterangan'] = $this->input->post("keterangan");
				
				$this->db->insert("dlmbg_pendaftaran",$in);
			}
			else if($tipe=="edit")
			{
				$in['nama_team'] = $this->input->post("nama_team");
				$in['tanggal'] = $this->input->post("tanggal");
				$in['alamat'] = $this->input->post("alamat");
				$in['promotor'] = $this->input->post("promotor");
				$in['keterangan'] = $this->input->post("keterangan");
					$this->db->update("dlmbg_pendaftaran",$in,$id);
			}
			
			redirect("admin/pendaftaran");
		}
		else
		{
			redirect(base_url());
		}
   }
 
	public function hapus($id_param)
	{
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$where['id_pendaftaran'] = $id_param;
			$this->db->delete("dlmbg_pendaftaran",$where);
			redirect("admin/pendaftaran");
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superadmin.php */
