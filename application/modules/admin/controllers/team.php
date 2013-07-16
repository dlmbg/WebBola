<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class team extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$d['data_retrieve'] = $this->app_global_admin_model->generate_index_team($GLOBALS['site_limit_small'],$uri);
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("team/bg_home");
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
			$d['nama'] = "";
			$d['id_kabupaten'] = "";
			$d['kabupaten'] = $this->db->get("dlmbg_kabupaten");
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("team/bg_input");
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
			$where['id_team'] = $id_param;
			$get = $this->db->get_where("dlmbg_team",$where)->row();
			
			$d['nama'] = $get->nama;
			$d['id_kabupaten'] = $get->id_kabupaten;
			$d['kabupaten'] = $this->db->get("dlmbg_kabupaten");
			
			$d['id_param'] = $get->id_team;
			$d['tipe'] = "edit";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("team/bg_input");
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
			$id['id_team'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
				$in['nama'] = $this->input->post("nama");
				$in['id_kabupaten'] = $this->input->post("id_kabupaten");
				
				$this->db->insert("dlmbg_team",$in);
			}
			else if($tipe=="edit")
			{
					$in['nama'] = $this->input->post("nama");
					$in['id_kabupaten'] = $this->input->post("id_kabupaten");
					$this->db->update("dlmbg_team",$in,$id);
			}
			
			redirect("admin/team");
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
			$where['id_team'] = $id_param;
			$this->db->delete("dlmbg_team",$where);
			redirect("admin/team");
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superadmin.php */
