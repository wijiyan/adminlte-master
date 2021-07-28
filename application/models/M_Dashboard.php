<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Dashboard extends CI_Model {

	public function counter($table) {
		$data = $this->db->get($table);
		return $data->num_rows();
	}

	public function hari_ini() {
		$this->db->where('tgl_kunjungan', date('Y-m-d'));
		$data = $this->db->get('tbl_sasaran');
		return $data->num_rows();
	}

	public function total_sasaran() {
		$data = $this->db->get('tbl_sasaran');
		return $data->num_rows();
	}

	public function total_pelaporan() {
		$data = $this->db->get('tbl_pelaporan');
		return $data->num_rows();
	}

	public function riwayat_swab($nik) {
		$this->db->where('nik', $nik);
		$this->db->order_by('id', 'DESC');
		$data = $this->db->get('tbl_pelaporan');
		return $data->result();
	}

	public function total_isoman() {
		$this->db->where('status_pasien', 'Isolasi Mandiri');
		$this->db->where('status_pantau', 'Sedang Dipantau');
		$data = $this->db->get('tbl_pelaporan');
		return $data->num_rows();
	}

	public function total_rawat() {
		$this->db->where('status_pasien', 'Rawat');
		$this->db->where('status_pantau', 'Sedang Dipantau');
		$data = $this->db->get('tbl_pelaporan');
		return $data->num_rows();
	}

	public function total_meninggal() {
		$this->db->where('status_pantau', 'Meninggal');
		$data = $this->db->get('tbl_pelaporan');
		return $data->num_rows();
	}

	public function total_sembuh() {
		$this->db->where('status_pantau', 'Selesai Pantau');
		$data = $this->db->query('SELECT* FROM tbl_pelaporan where status_pantau = "Selesai Pantau" and status_pasien <> "Meninggal"');
		return $data->num_rows();
	}

	public function jml($wilayah) {
		$data = $this->db->query(
			'SELECT * 
			FROM
			tbl_sasaran
			RIGHT JOIN tbl_pelaporan ON tbl_sasaran.nik = tbl_pelaporan.nik WHERE tbl_pelaporan.kel_domisili = "'.$wilayah.'"
			ORDER BY tbl_pelaporan.id desc'
		);
		return $data->num_rows();
	}

	public function jml_luar_wilayah() {
		$data = $this->db->query(
			'SELECT * 
			FROM
			tbl_sasaran
			RIGHT JOIN tbl_pelaporan ON tbl_sasaran.nik = tbl_pelaporan.nik WHERE tbl_pelaporan.kec_domisili <> "Cempaka Putih"
			ORDER BY tbl_pelaporan.id desc'
		);
		return $data->num_rows();
	}

	public function dpemantau($status) {
		$this->db->where('status_pantau', $status);
		$data = $this->db->get('tbl_pelaporan');
		return $data->num_rows();
	}

}
