<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pengumuman extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 

	function index($uri=0)
	{
		$d['dt'] = $this->app_global_web->generate_index_pengumuman($GLOBALS['site_limit_small'],$uri);
 		$this->load->view($GLOBALS['site_theme']."/front/bg_header",$d);
 		$this->load->view($GLOBALS['site_theme']."/front/bg_left");
 		$this->load->view($GLOBALS['site_theme']."/front/pengumuman/bg_home");
 		$this->load->view($GLOBALS['site_theme']."/front/bg_right");
 		$this->load->view($GLOBALS['site_theme']."/front/bg_footer");
	}

	function detail($id_param=0)
	{
		$get = $this->db->get_where("dlmbg_pengumuman",array("id_pengumuman"=>$id_param))->row();
		
		$d['judul'] = $get->judul;
		$d['isi'] = $get->isi;

 		$this->load->view($GLOBALS['site_theme']."/front/bg_header",$d);
 		$this->load->view($GLOBALS['site_theme']."/front/bg_left");
 		$this->load->view($GLOBALS['site_theme']."/front/pengumuman/bg_detail");
 		$this->load->view($GLOBALS['site_theme']."/front/bg_right");
 		$this->load->view($GLOBALS['site_theme']."/front/bg_footer");
	}
}
