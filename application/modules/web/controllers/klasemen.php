<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class klasemen extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 

	function index($uri=0)
	{
		$d['dt'] = $this->app_global_web->generate_index_klasemen($GLOBALS['site_limit_medium'],$uri);
 		$this->load->view($GLOBALS['site_theme']."/front/bg_header",$d);
 		$this->load->view($GLOBALS['site_theme']."/front/bg_left");
 		$this->load->view($GLOBALS['site_theme']."/front/klasemen/bg_home");
 		$this->load->view($GLOBALS['site_theme']."/front/bg_right");
 		$this->load->view($GLOBALS['site_theme']."/front/bg_footer");
	}
}
