<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_utama extends CI_Model {

	function ambil_divisi(){
		$result = $this->db->get('jns_divisi');
		$options = array();
		foreach ($result->result_array() as $row) {
			$options[$row["id"]] = $row["nm_divisi"];
		} return $options;
	}

	function ambil_perangkat(){
		$result = $this->db->get('jns_perangkat');
		$options = array();
		foreach ($result->result_array() as $row) {
			$options[$row["id"]] = $row["nm_perangkat"];
		} return $options;
	}

	function inputke_reqit($data){
		$this->db->insert('log_reqit', $data);
	}

	function buat_tiket(){
		$q = $this->db->query("select MAX(RIGHT(tiket,5)) as no_tiket from log_reqit");
		$kd = "";
		if ($q->num_rows()>0) {
			foreach ($q->result() as $k) {
				$tmp 	= ((int)$k->no_tiket)+1;
				$kd		= sprintf("%05s", $tmp);
			}
			} else {
				$kd = "00001";
			} 
			$kar = "TSP";
			return $kar.$kd;
		}

	function ambil_detailtiket($tiket){
		$this->db->where('tiket', $tiket);
		return $this->db->get('log_reqit')->row();
	}

	function update_prog($tiket,$data){
		$this->db->where('tiket', $tiket);
		$this->db->update('log_reqit', $data);
	}

	function update_closed($tiket,$data){
		$this->db->where('tiket', $tiket);
		$this->db->update('log_reqit', $data);
	}

	

}

/* End of file model_utama.php */
/* Location: ./application/models/model_utama.php */