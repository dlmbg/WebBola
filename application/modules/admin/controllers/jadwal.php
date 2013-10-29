<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class jadwal extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$d['data_retrieve'] = $this->app_global_admin_model->generate_index_jadwal($GLOBALS['site_limit_small'],$uri);
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("jadwal/bg_home");
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
			$d['id_team_1'] = "";
			$d['id_team_2'] = "";
			$d['tanggal'] = "";
			$d['lapangan'] = "";
			$d['id_wasit'] = "";
			$d['alamat_lapangan'] = "";
			$d['id_team_menang'] = "";
			$d['score_team1'] = "";
			$d['score_team2'] = "";

			$d['team'] = $this->db->get("dlmbg_team");
			$d['wasit'] = $this->db->get("dlmbg_wasit");
			$d['lapangan'] = $this->db->get("dlmbg_lapangan");
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("jadwal/bg_input");
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
			$where['id_jadwal'] = $id_param;
			$get = $this->db->get_where("dlmbg_jadwal",$where)->row();
			
			$d['id_team_1'] = $get->id_team_1;
			$d['id_team_2'] = $get->id_team_2;
			$d['tanggal'] = $get->tanggal;
			$d['lapangan'] = $get->lapangan;
			$d['id_wasit'] = $get->id_wasit;
			$d['alamat_lapangan'] = $get->alamat_lapangan;
			$d['id_team_menang'] = $get->id_team_menang;
			$d['score_team1'] = $get->score_team1;
			$d['score_team2'] = $get->score_team2;
			
			$d['team'] = $this->db->get("dlmbg_team");
			$d['wasit'] = $this->db->get("dlmbg_wasit");
			$d['lapangan'] = $this->db->get("dlmbg_lapangan");
			
			$d['id_param'] = $get->id_jadwal;
			$d['tipe'] = "edit";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("jadwal/bg_input");
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
			$id['id_jadwal'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
				$in['id_team_1'] = $this->input->post("id_team_1");
				$in['id_team_2'] = $this->input->post("id_team_2");
				$in['tanggal'] = $this->input->post("tanggal");
				$in['lapangan'] = $this->input->post("lapangan");
				$in['id_wasit'] = $this->input->post("id_wasit");
				$in['alamat_lapangan'] = $this->input->post("alamat_lapangan");
				$in['id_team_menang'] = $this->input->post("id_team_menang");
				$in['score_team1'] = $this->input->post("score_team1");
				$in['score_team2'] = $this->input->post("score_team2");

				$this->db->insert("dlmbg_jadwal",$in);

				$tim_kalah = "";
				//update nilai win
				$this->db->query("update dlmbg_klasemen set win=win+1 where id_team='".$in['id_team_menang']."' ");

				if($in['id_team_menang']==$in['id_team_1'])
				{
					$tim_kalah = $in['id_team_2'];
				}
				else
				{
					$tim_kalah = $in['id_team_1'];
				}

				//update nilai lose
				$this->db->query("update dlmbg_klasemen set lose=lose+1 where id_team='".$tim_kalah."' ");

				//update nilai team 1
				$this->db->query("update dlmbg_klasemen set gol=gol+".$in['score_team1']." where id_team='".$in['id_team_1']."' ");

				//update nilai team 2
				$this->db->query("update dlmbg_klasemen set gol=gol+".$in['score_team2']." where id_team='".$in['id_team_2']."' ");
			}
			else if($tipe=="edit")
			{
				$in['id_team_1'] = $this->input->post("id_team_1");
				$in['id_team_2'] = $this->input->post("id_team_2");
				$in['tanggal'] = $this->input->post("tanggal");
				$in['lapangan'] = $this->input->post("lapangan");
				$in['id_wasit'] = $this->input->post("id_wasit");
				$in['alamat_lapangan'] = $this->input->post("alamat_lapangan");
				$in['id_team_menang'] = $this->input->post("id_team_menang");
				$in['score_team1'] = $this->input->post("score_team1");
				$in['score_team2'] = $this->input->post("score_team2");
				$this->db->update("dlmbg_jadwal",$in,$id);

				$tim_kalah = "";
				//update nilai win
				$this->db->query("update dlmbg_klasemen set win=win+1 where id_team='".$in['id_team_menang']."' ");

				if($in['id_team_menang']==$in['id_team_1'])
				{
					$tim_kalah = $in['id_team_2'];
				}
				else
				{
					$tim_kalah = $in['id_team_1'];
				}

				//update nilai lose
				$this->db->query("update dlmbg_klasemen set lose=lose+1 where id_team='".$tim_kalah."' ");

				//update nilai team 1
				$this->db->query("update dlmbg_klasemen set gol=gol+".$in['score_team1']." where id_team='".$in['id_team_1']."' ");

				//update nilai team 2
				$this->db->query("update dlmbg_klasemen set gol=gol+".$in['score_team2']." where id_team='".$in['id_team_2']."' ");
			}
			
			redirect("admin/jadwal");
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
			$where['id_jadwal'] = $id_param;
			$this->db->delete("dlmbg_jadwal",$where);
			redirect("admin/jadwal");
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superadmin.php */
