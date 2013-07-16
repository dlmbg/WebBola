<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class web extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 

	function index()
	{
 		$this->load->view($GLOBALS['site_theme']."/front/bg_header");
 		$this->load->view($GLOBALS['site_theme']."/front/bg_left");
 		$this->load->view($GLOBALS['site_theme']."/front/bg_home");
 		$this->load->view($GLOBALS['site_theme']."/front/bg_right");
 		$this->load->view($GLOBALS['site_theme']."/front/bg_footer");
	}
 

	function pages($id_param=0)
	{
		$where['id_menu'] = $id_param;
		$get_data = $this->db->get_where("dlmbg_menu",$where);
		if($get_data->num_rows()>0)
		{
			$h = $get_data->row();
			if($h->url_route=="")
			{
				$d['judul'] = $h->menu;
				$d['content'] = $h->content;

		 		$this->load->view($GLOBALS['site_theme']."/front/bg_header",$d);
		 		$this->load->view($GLOBALS['site_theme']."/front/bg_left");
		 		$this->load->view($GLOBALS['site_theme']."/front/bg_pages");
		 		$this->load->view($GLOBALS['site_theme']."/front/bg_right");
		 		$this->load->view($GLOBALS['site_theme']."/front/bg_footer");
			}
      		else
      		{
				redirect($h->url_route);
      		}
		}
		else
		{
			redirect(base_url());
		}
	}
}
