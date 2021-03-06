<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class lapangan extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$d['data_retrieve'] = $this->app_global_admin_model->generate_index_lapangan($GLOBALS['site_limit_small'],$uri);
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("lapangan/bg_home");
 			$this->load->view("bg_footer");
		}
		else
		{
			redirect(base_url());
		}
   }
 
   public function tambah()
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$d['nama_lapangan'] = "";
			$d['alamat_lapangan'] = "";
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("lapangan/bg_input");
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
			$where['id_lapangan'] = $id_param;
			$get = $this->db->get_where("dlmbg_lapangan",$where)->row();
			
			$d['nama_lapangan'] = $get->nama_lapangan;
			$d['alamat_lapangan'] = $get->alamat_lapangan;
			
			$d['id_param'] = $get->id_lapangan;
			$d['tipe'] = "edit";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("lapangan/bg_input");
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
			$id['id_lapangan'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
				$in['nama_lapangan'] = $this->input->post("nama_lapangan");
				$in['alamat_lapangan'] = $this->input->post("alamat_lapangan");
				
				$this->db->insert("dlmbg_lapangan",$in);
			}
			else if($tipe=="edit")
			{
					$in['nama_lapangan'] = $this->input->post("nama_lapangan");
					$in['alamat_lapangan'] = $this->input->post("alamat_lapangan");
					$this->db->update("dlmbg_lapangan",$in,$id);
			}
			
			redirect("admin/lapangan");
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
			$where['id_lapangan'] = $id_param;
			$this->db->delete("dlmbg_lapangan",$where);
			redirect("admin/lapangan");
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superadmin.php */
