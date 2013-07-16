<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pendaftaran extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 

	function index($uri=0)
	{
 		$this->load->view($GLOBALS['site_theme']."/front/bg_header");
 		$this->load->view($GLOBALS['site_theme']."/front/bg_left");
 		$this->load->view($GLOBALS['site_theme']."/front/pendaftaran/bg_home");
 		$this->load->view($GLOBALS['site_theme']."/front/bg_right");
 		$this->load->view($GLOBALS['site_theme']."/front/bg_footer");
	}

	function simpan()
	{
		$in['nama_team'] = $this->input->post("nama_team");
		$in['tanggal'] = $this->input->post("tanggal");
		$in['alamat'] = $this->input->post("alamat");
		$in['promotor'] = $this->input->post("promotor");
		$in['keterangan'] = $this->input->post("keterangan");
		
		$this->db->insert("dlmbg_pendaftaran",$in);

		$this->session->set_flashdata("hasil","Data anda telah terkirim, dan akan kami moderisasi terlebih dahulu. Terima Kasih.");
		redirect("web/pendaftaran");
	}
}
