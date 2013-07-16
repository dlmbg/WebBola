<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class klasemen extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$d['data_retrieve'] = $this->app_global_admin_model->generate_index_klasemen($GLOBALS['site_limit_small'],$uri);
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("klasemen/bg_home");
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
			$d['win'] = "";
			$d['draw'] = "";
			$d['lose'] = "";
			$d['gol'] = "";
			$d['kms'] = "";
			$d['poin'] = "";

			$d['team'] = $this->db->get("dlmbg_team");
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("klasemen/bg_input");
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
			$where['id_klasemen'] = $id_param;
			$get = $this->db->get_where("dlmbg_klasemen",$where)->row();
			
			$d['nama'] = $get->nama;
			$d['id_team'] = $get->id_team;
			$d['win'] = $get->win;
			$d['draw'] = $get->draw;
			$d['lose'] = $get->lose;
			$d['gol'] = $get->gol;
			$d['kms'] = $get->kms;
			$d['poin'] = $get->poin;
			
			$d['team'] = $this->db->get("dlmbg_team");
			
			$d['id_param'] = $get->id_klasemen;
			$d['tipe'] = "edit";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("klasemen/bg_input");
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
			$id['id_klasemen'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
				$in['nama'] = $this->input->post("nama");
				$in['id_team'] = $this->input->post("id_team");
				$in['win'] = $this->input->post("win");
				$in['draw'] = $this->input->post("draw");
				$in['lose'] = $this->input->post("lose");
				$in['gol'] = $this->input->post("gol");
				$in['kms'] = $this->input->post("kms");
				$in['poin'] = $this->input->post("poin");
				
				$this->db->insert("dlmbg_klasemen",$in);
			}
			else if($tipe=="edit")
			{
				$in['nama'] = $this->input->post("nama");
				$in['id_team'] = $this->input->post("id_team");
				$in['win'] = $this->input->post("win");
				$in['draw'] = $this->input->post("draw");
				$in['lose'] = $this->input->post("lose");
				$in['gol'] = $this->input->post("gol");
				$in['kms'] = $this->input->post("kms");
				$in['poin'] = $this->input->post("poin");
					$this->db->update("dlmbg_klasemen",$in,$id);
			}
			
			redirect("admin/klasemen");
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
			$where['id_klasemen'] = $id_param;
			$this->db->delete("dlmbg_klasemen",$where);
			redirect("admin/klasemen");
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superadmin.php */
