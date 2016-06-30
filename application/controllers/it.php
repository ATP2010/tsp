<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class It extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('model_utama');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$cek = $this->session->userdata('logged_in');
		$jb = $this->session->userdata('jabatan');
		if (!empty($cek) && $jb=='IT Staff') {
				$isi['judul'] = "Home";
				$isi['sub_judul'] = "Info";

			$new=$this->db->query("select count(tiket)as newtiket from log_reqit where status='new'");
			$isi['newtiket'] = $new;

			$inprog=$this->db->query("select count(tiket)as inprogtiket from log_reqit where status='inprogress'");
			$isi['inprogtiket'] = $inprog;

			$closed=$this->db->query("select count(tiket)as closedtiket from log_reqit where status='closed'");
			$isi['closedtiket'] = $closed;

		
		$this->load->view('design/atas2');
		$this->load->view('v_it/menu', $isi);
		$this->load->view('v_it/home', $isi);
		$this->load->view('design/bawah2');

		} else {
		redirect('awal','refresh');
	}
	}

	public function new_tkt(){
		$cek = $this->session->userdata('logged_in');
		$jb = $this->session->userdata('jabatan');
		if (!empty($cek) && $jb=='IT Staff') {
				$isi['judul'] = "Home";
				$isi['sub_judul'] = "New Tiket";
		
		$this->load->view('design/atas2');
		$this->load->view('v_it/menu', $isi);
		$this->load->view('v_it/t_new', $isi);
		$this->load->view('design/bawah2');

		} else {
			redirect('awal','refresh');
		}
	}

	public function ajax_t_new(){
		if (!$this->input->is_ajax_request()) {
			exit('No direct script access allowed');
		}else{
			$this->load->library('ssp');
			$table = 'log_reqit';
			$primaryKey = 'id';
			$columns = array(
				array('db' => '`u`.`tiket`', 'dt' => 0, 'field' => 'tiket'),
				array('db' => '`u`.`tgl_new`', 'dt' => 1, 'field' => 'tgl_new'),
				array('db' => '`u`.`user_req`', 'dt' => 2, 'field' => 'user_req'),
				array('db' => '`u`.`phone`', 'dt' => 3, 'field' => 'phone'),
				array('db' => '`u`.`divisi`', 'dt' => 4, 'field' => 'divisi'),
				array('db' => '`u`.`perangkat`', 'dt' => 5, 'field' => 'perangkat'),
				array('db' => '`u`.`problem`', 'dt' => 6, 'field' => 'problem'),
				array('db' => '`u`.`status`', 'dt' => 7, 'field' => 'status'),
				array('db' => '`u`.`tiket`', 'dt' => 8, 'field' => 'tiket', 'formatter' => function( $d) {
																return '<a href="'.site_url('it/tkt_prog/' .$d).'" >Eksekusi</a>';}),
				);
			$sql_details = array(
				'user' 	=> 'root',
				'pass' 	=> 'root',
				'db' 	=>	'TSP',
				'host' 	=> 'localhost'
				);

				$joinQuery = "FROM log_reqit AS u";
				$extraWhere = "u.status='new'";   

			echo json_encode(
				SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraWhere ));
		}
	}

	public function tkt_prog($tiket){	
		$cek = $this->session->userdata('logged_in');
		$jb = $this->session->userdata('jabatan');
		if (!empty($cek) && $jb=='IT Staff') {

		$row = $this->model_utama->ambil_detailtiket($tiket);
		if ($row) {
			$isi = array(
				'button'	=> 'Inprogress Tiket',
				'action'	=> site_url('it/tkt_prog_act'),
				'tiket'		=> set_value('tiket', $row->tiket),
				'tanggal'	=> set_value('tgl_new', $row->tgl_new),
				'user_req'	=> set_value('user_req', $row->user_req),
				'phone'		=> set_value('phone', $row->phone),
				'divisi'	=> set_value('divisi', $row->divisi),
				'perangkat'	=> set_value('perangkat', $row->perangkat),
				'problem'	=> set_value('problem', $row->problem),
				'tgl_prog'	=> set_value('tgl_prog'),
				);
		}

		$isi['judul'] = "Home";
		$isi['sub_judul'] = "Form Penanganan";
		
		$this->load->view('design/atas2');
		$this->load->view('v_it/menu', $isi);
		$this->load->view('v_it/t_detail', $isi);
		$this->load->view('design/bawah2');

		} else {
			redirect('awal','refresh');
		}
	}	

	public function tkt_prog_act(){
		$data = array (
				'tgl_prog' 		=> $this->input->post('tgl_prog'),
				'admin_prog' 	=> $this->input->post('admin_prog'),
				'teknisi_it' 	=> $this->input->post('teknisi_it'),
				'penanganan' 	=> $this->input->post('penanganan'),
				'status' 		=> $this->input->post('status')
				);
			$this->model_utama->update_prog($this->input->post('tiket', TRUE), $data);
			//$this->session->set_flashdata('laporok', '<div class="alert alert-success">Data berhasil diinput !</div>');
			redirect('it/new_tkt','refresh');
		}

	public function inprog_tkt(){
		$cek = $this->session->userdata('logged_in');
		$jb = $this->session->userdata('jabatan');
		if (!empty($cek) && $jb=='IT Staff') {
				$isi['judul'] = "Home";
				$isi['sub_judul'] = "Tiket In Progress";
		
		$this->load->view('design/atas2');
		$this->load->view('v_it/menu', $isi);
		$this->load->view('v_it/t_prog', $isi);
		$this->load->view('design/bawah2');

		} else {
			redirect('awal','refresh');
		}
	}

	public function ajax_t_prog(){
		if (!$this->input->is_ajax_request()) {
			exit('No direct script access allowed');
		}else{
			$this->load->library('ssp');
			$table = 'log_reqit';
			$primaryKey = 'id';
			$columns = array(
				array('db' => '`u`.`tiket`', 'dt' => 0, 'field' => 'tiket'),
				array('db' => '`u`.`tgl_new`', 'dt' => 1, 'field' => 'tgl_new'),
				array('db' => '`u`.`user_req`', 'dt' => 2, 'field' => 'user_req'),
				array('db' => '`u`.`phone`', 'dt' => 3, 'field' => 'phone'),
				array('db' => '`u`.`divisi`', 'dt' => 4, 'field' => 'divisi'),
				array('db' => '`u`.`perangkat`', 'dt' => 5, 'field' => 'perangkat'),
				array('db' => '`u`.`problem`', 'dt' => 6, 'field' => 'problem'),
				array('db' => '`u`.`status`', 'dt' => 7, 'field' => 'status'),
				array('db' => '`u`.`tiket`', 'dt' => 8, 'field' => 'tiket', 'formatter' => function( $d) {
																return '<a href="'.site_url('it/tkt_closed/' .$d).'" >Eksekusi</a>';}),
				);
			$sql_details = array(
				'user' 	=> 'root',
				'pass' 	=> 'root',
				'db' 	=>	'TSP',
				'host' 	=> 'localhost'
				);

				$joinQuery = "FROM log_reqit AS u";
				$extraWhere = "u.status='inprogress'";   

			echo json_encode(
				SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraWhere ));
		}
	}

	public function tkt_closed($tiket){	
		$cek = $this->session->userdata('logged_in');
		$jb = $this->session->userdata('jabatan');
		if (!empty($cek) && $jb=='IT Staff') {

		$row = $this->model_utama->ambil_detailtiket($tiket);
		if ($row) {
			$isi = array(
				'button'	=> 'Closed Tiket',
				'action'	=> site_url('it/tkt_closed_act'),
				'tiket'		=> set_value('tiket', $row->tiket),
				'tgl_new'	=> set_value('tgl_new', $row->tgl_new),
				'user_req'	=> set_value('user_req', $row->user_req),
				'phone'		=> set_value('phone', $row->phone),
				'divisi'	=> set_value('divisi', $row->divisi),
				'perangkat'	=> set_value('perangkat', $row->perangkat),
				'problem'	=> set_value('problem', $row->problem),
				'tgl_prog'	=> set_value('tgl_prog', $row->tgl_prog),
				'penanganan'=> set_value('penanganan', $row->penanganan),
				'teknisi_it'=> set_value('teknisi_it', $row->teknisi_it),
				'admin_prog'=> set_value('admin_prog', $row->admin_prog),
				);
		}

		$isi['judul'] = "Home";
		$isi['sub_judul'] = "Form Progress";
		
		$this->load->view('design/atas2');
		$this->load->view('v_it/menu', $isi);
		$this->load->view('v_it/t_closed', $isi);
		$this->load->view('design/bawah2');

		} else {
			redirect('awal','refresh');
		}
	}

	public function tkt_closed_act(){
		$data = array (
				'tgl_closed'	=> $this->input->post('tgl_closed'),
				'admin_closed' 	=> $this->input->post('admin_closed'),
				'solusi' 		=> $this->input->post('solusi'),
				'tgl_closed' 	=> $this->input->post('tgl_closed'),
				'status'	 	=> $this->input->post('status')
				);
			$this->model_utama->update_closed($this->input->post('tiket', TRUE), $data);
			//$this->session->set_flashdata('laporok', '<div class="alert alert-success">Data berhasil diinput !</div>');
			redirect('it/inprog_tkt','refresh');
		}

		public function closed_tkt(){
		$cek = $this->session->userdata('logged_in');
		$jb = $this->session->userdata('jabatan');
		if (!empty($cek) && $jb=='IT Staff') {
				$isi['judul'] = "Home";
				$isi['sub_judul'] = "Tiket Closed";
		
		$this->load->view('design/atas2');
		$this->load->view('v_it/menu', $isi);
		$this->load->view('v_it/t_clear', $isi);
		$this->load->view('design/bawah2');

		} else {
			redirect('awal','refresh');
		}
	}

	public function ajax_t_clear(){
		if (!$this->input->is_ajax_request()) {
			exit('No direct script access allowed');
		}else{
			$this->load->library('ssp');
			$table = 'log_reqit';
			$primaryKey = 'id';
			$columns = array(
				array('db' => '`u`.`tiket`', 'dt' => 0, 'field' => 'tiket'),
				array('db' => '`u`.`tgl_new`', 'dt' => 1, 'field' => 'tgl_new'),
				array('db' => '`u`.`user_req`', 'dt' => 2, 'field' => 'user_req'),
				array('db' => '`u`.`phone`', 'dt' => 3, 'field' => 'phone'),
				array('db' => '`u`.`divisi`', 'dt' => 4, 'field' => 'divisi'),
				array('db' => '`u`.`perangkat`', 'dt' => 5, 'field' => 'perangkat'),
				array('db' => '`u`.`problem`', 'dt' => 6, 'field' => 'problem'),
				array('db' => '`u`.`status`', 'dt' => 7, 'field' => 'status'),
				array('db' => '`u`.`tiket`', 'dt' => 8, 'field' => 'tiket', 'formatter' => function( $d) {
																return '<a href="'.site_url('it/tkt_clear/' .$d).'" >Show</a>';}),
				);
			$sql_details = array(
				'user' 	=> 'root',
				'pass' 	=> 'root',
				'db' 	=>	'TSP',
				'host' 	=> 'localhost'
				);

				$joinQuery = "FROM log_reqit AS u";
				$extraWhere = "u.status='closed'";   

			echo json_encode(
				SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraWhere ));
		}
	}

	public function tkt_clear($tiket){	
		$cek = $this->session->userdata('logged_in');
		$jb = $this->session->userdata('jabatan');
		if (!empty($cek) && $jb=='IT Staff') {

		$row = $this->model_utama->ambil_detailtiket($tiket);
		if ($row) {
			$isi = array(
				'tiket'			=> set_value('tiket', $row->tiket),
				'tgl_new'		=> set_value('tgl_new', $row->tgl_new),
				'user_req'		=> set_value('user_req', $row->user_req),
				'phone'			=> set_value('phone', $row->phone),
				'divisi'		=> set_value('divisi', $row->divisi),
				'perangkat'		=> set_value('perangkat', $row->perangkat),
				'problem'		=> set_value('problem', $row->problem),
				'tgl_prog'		=> set_value('tgl_prog', $row->tgl_prog),
				'admin_prog'	=> set_value('admin_prog', $row->admin_prog),
				'teknisi_it'	=> set_value('teknisi_it', $row->teknisi_it),
				'penanganan'	=> set_value('penanganan', $row->penanganan),
				'tgl_closed'	=> set_value('tgl_closed', $row->tgl_closed),
				'admin_closed'	=> set_value('admin_closed', $row->admin_closed),
				'solusi'		=> set_value('solusi', $row->solusi),
				);
		}

		$isi['judul'] = "Home";
		$isi['sub_judul'] = "Detail Proses";
		
		$this->load->view('design/atas2');
		$this->load->view('v_it/menu', $isi);
		$this->load->view('v_it/t_clear_detail', $isi);
		$this->load->view('design/bawah2');

		} else {
			redirect('awal','refresh');
		}
	}
}

/* End of file it.php */
/* Location: ./application/controllers/it.php */