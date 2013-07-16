<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pemain extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$d['data_retrieve'] = $this->app_global_admin_model->generate_index_pemain($GLOBALS['site_limit_small'],$uri);
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("pemain/bg_home");
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
			$d['id_team'] = "";
			$d['keterangan'] = "";
			$d['team'] = $this->db->get("dlmbg_team");
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("pemain/bg_input");
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
			$where['id_pemain'] = $id_param;
			$get = $this->db->get_where("dlmbg_pemain",$where)->row();
			
			$d['nama'] = $get->nama;
			$d['id_team'] = $get->id_team;
			$d['keterangan'] = $get->keterangan;
			$d['team'] = $this->db->get("dlmbg_team");
			
			$d['id_param'] = $get->id_pemain;
			$d['tipe'] = "edit";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("pemain/bg_input");
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
			$id['id_pemain'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
				$in['nama'] = $this->input->post("nama");
				$in['id_team'] = $this->input->post("id_team");
				$in['keterangan'] = $this->input->post("keterangan");
				
				$this->db->insert("dlmbg_pemain",$in);
			}
			else if($tipe=="edit")
			{
				$in['nama'] = $this->input->post("nama");
				$in['id_team'] = $this->input->post("id_team");
				$in['keterangan'] = $this->input->post("keterangan");
					$this->db->update("dlmbg_pemain",$in,$id);
			}
			
			redirect("admin/pemain");
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
			$where['id_pemain'] = $id_param;
			$this->db->delete("dlmbg_pemain",$where);
			redirect("admin/pemain");
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superadmin.php */
