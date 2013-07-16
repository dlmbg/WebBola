<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class kabupaten extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$d['data_retrieve'] = $this->app_global_admin_model->generate_index_kabupaten($GLOBALS['site_limit_small'],$uri);
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("kabupaten/bg_home");
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
			$where['id_kabupaten'] = $id_param;
			$get = $this->db->get_where("dlmbg_kabupaten",$where)->row();
			
			$d['nama_kabupaten'] = $get->nama_kabupaten;
			$d['id_param'] = $get->id_kabupaten;

			$d['tipe'] = "edit";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("kabupaten/bg_input");
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
			$d['nama_kabupaten'] = "";
			$d['id_param'] = "";

			$d['tipe'] = "tambah";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("kabupaten/bg_input");
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
			$id['id_kabupaten'] = $this->input->post("id_param");
			if($tipe=="edit")
			{
				$in['nama_kabupaten'] = $this->input->post("nama_kabupaten");
				$this->db->update("dlmbg_kabupaten",$in,$id);
			}
			else if($tipe=="tambah")
			{
				$in['nama_kabupaten'] = $this->input->post("nama_kabupaten");
				$this->db->insert("dlmbg_kabupaten",$in);
			}
			redirect("admin/kabupaten");
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
			$where['id_kabupaten'] = $id_param;
			$this->db->delete("dlmbg_kabupaten",$where);
			redirect("admin/kabupaten");
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superadmin.php */
