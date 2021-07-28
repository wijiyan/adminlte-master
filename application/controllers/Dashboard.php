<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_Admin');
		$this->load->model('M_Dashboard');
	}
	
	public function index() {
		$data['userdata'] 		= $this->userdata;
		//$data['total_isoman']  	= $this->M_Dashboard->total_isoman();

		$data['page'] 				= "Dashboard";
		$data['judul'] 				= "Dashboard";
		$this->template->views('dashboard', $data);
	}

	public function sasaran() {
		$data['userdata'] 	= $this->userdata;

		$data['page'] 				= "Pelaporan";
		$data['judul'] 				= "Riwayat Pelaporan";

		$data['modal_tambah_pelaporan'] = show_my_modal('modals/modal_tambah_pelaporan', 'tambah-pelaporan', $data);

		$this->template->views('Pelaporan/pelaporan', $data);
	}

	public function riwayat_swab() {
		$data['userdata'] 	= $this->userdata;
		$data['data'] = $this->M_Dashboard->riwayat_swab($this->userdata->username);

		$data['page'] 				= "Riwayat_swab";
		$data['judul'] 				= "Riwayat Swab";

		$data['modal_tambah_pelaporan'] = show_my_modal('modals/modal_tambah_pelaporan', 'tambah-pelaporan', $data);

		$this->template->views('Pelaporan/riwayat_swab', $data);
	}

	public function informasi() {
		$data['userdata'] 	= $this->userdata;

		$data['page'] 				= "Informasi";
		$data['judul'] 				= "Informasi Terkini";
		$this->template->views('Informasi/informasi', $data);
	}

}
