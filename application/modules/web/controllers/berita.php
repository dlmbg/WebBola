<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class berita extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 

	function index($uri=0)
	{
		$d['dt'] = $this->app_global_web->generate_index_berita($GLOBALS['site_limit_small'],$uri);
 		$this->load->view($GLOBALS['site_theme']."/front/bg_header",$d);
 		$this->load->view($GLOBALS['site_theme']."/front/bg_left");
 		$this->load->view($GLOBALS['site_theme']."/front/berita/bg_home");
 		$this->load->view($GLOBALS['site_theme']."/front/bg_right");
 		$this->load->view($GLOBALS['site_theme']."/front/bg_footer");
	}

	function detail($id_param=0)
	{
		$get = $this->db->select("*")->join("dlmbg_kategori","dlmbg_kategori.id_kategori=dlmbg_berita.id_kategori")->get("dlmbg_berita",array("id_berita"=>$id_param))->row();
		$d['kategori'] = $get->nama_kategori;
		$d['judul'] = $get->judul;
		$d['isi'] = $get->isi;
 		$this->load->view($GLOBALS['site_theme']."/front/bg_header",$d);
 		$this->load->view($GLOBALS['site_theme']."/front/bg_left");
 		$this->load->view($GLOBALS['site_theme']."/front/berita/bg_detail");
 		$this->load->view($GLOBALS['site_theme']."/front/bg_right");
 		$this->load->view($GLOBALS['site_theme']."/front/bg_footer");
	}
}
