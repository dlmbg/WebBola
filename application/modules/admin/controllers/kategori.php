<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class kategori extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$d['data_retrieve'] = $this->app_global_admin_model->generate_index_kategori($GLOBALS['site_limit_small'],$uri);
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("kategori/bg_home");
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
			$d['nama_kategori'] = "";
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("kategori/bg_input");
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
			$where['id_kategori'] = $id_param;
			$get = $this->db->get_where("dlmbg_kategori",$where)->row();
			
			$d['nama_kategori'] = $get->nama_kategori;
			
			$d['id_param'] = $get->id_kategori;
			$d['tipe'] = "edit";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("kategori/bg_input");
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
			$id['id_kategori'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
				$in['nama_kategori'] = $this->input->post("nama_kategori");
				
				$this->db->insert("dlmbg_kategori",$in);
			}
			else if($tipe=="edit")
			{
					$in['nama_kategori'] = $this->input->post("nama_kategori");
					$this->db->update("dlmbg_kategori",$in,$id);
			}
			
			redirect("admin/kategori");
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
			$where['id_kategori'] = $id_param;
			$this->db->delete("dlmbg_kategori",$where);
			redirect("admin/kategori");
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superadmin.php */
