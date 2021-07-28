<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Sasaran extends CI_Model {

    public function select_all() {
        $this->db->order_by('nama','ASC');
        $data = $this->db->get('tbl_sasaran');

        return $data->result();
    }

    public function select_by_id($id) {
        $data = $this->db->get_where('tbl_sasaran', array('id' => $id));

        return $data->row();
    }

    public function cek_nik($nik) {
        $this->db->where('nik', $nik);
        $data = $this->db->get('tbl_sasaran');

        return $data->num_rows();
    }

    public function update($data) {
        $this->db->update('tbl_sasaran', $data, array('id' => $data['id']));
        return $this->db->affected_rows();
    }

    public function delete($id) {
        $this->db->delete('tbl_sasaran', array('id' => $id));

        return $this->db->affected_rows();
    }

    public function insert($data) {
        $this->db->insert('tbl_sasaran', $data);
        return $this->db->affected_rows();
    }

    public function insert_batch_sasaran($data) {
        $this->db->insert_batch('tbl_sasaran', $data);
        
        return $this->db->affected_rows();
    }

    public function insert_batch_pelaporan($data) {
        $this->db->insert_batch('tbl_pelaporan', $data);
        
        return $this->db->affected_rows();
    }

    public function insert_batch_admin($data) {
        $this->db->insert_batch('admin', $data);
        
        return $this->db->affected_rows();
    }


}
