<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('model_utama');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$cek 	= $this->session->userdata('logged_in');
		$jb 	= $this->session->userdata('jabatan');
		$d 		= $this->session->userdata('userid');
		if (!empty($cek) && $jb=='Supervisor') {
		$isi['judul'] = "Home";
		$isi['sub_judul'] = "Info";

			$new=$this->db->query("select count(tiket)as newtiket from log_reqit where status='new' and user_req='$d'");
			$isi['newtiket'] = $new;

			$inprog=$this->db->query("select count(tiket)as inprogtiket from log_reqit where status='inprogress' and user_req='$d'");
			$isi['inprogtiket'] = $inprog;

			$closed=$this->db->query("select count(tiket)as closedtiket from log_reqit where status='closed' and user_req='$d'");
			$isi['closedtiket'] = $closed;
		
		$this->load->view('design/atas2');
		$this->load->view('user/menu', $isi);
		$this->load->view('user/home', $isi);
		$this->load->view('design/bawah2');
	}else{
		redirect('awal','refresh');
	}
	}

	public function laporkan(){
		$cek = $this->session->userdata('logged_in');
		$jb = $this->session->userdata('jabatan');
		if (!empty($cek) && $jb=='Supervisor') {
		$isi = array(
				'button' 	=> 'Input',
				'action' 	=> site_url('user/laporkan_act'),
				'id' 		=> set_value('id'),
				'tiket' 	=> set_value('tiket'),
				'tanggal'	=> set_value('tanggal'),
				'user_req'	=> set_value('user_req'),
				'phone'		=> set_value('phone'),
				'divisi'	=> set_value('divisi'),
				'perangkat'	=> set_value('perangkat'),
				'problem'	=> set_value('problem'),
				'status'	=> set_value('status')
				);

		$isi['jns_divisi'] 		= $this->model_utama->ambil_divisi();
		$isi['jns_perangkat'] 	= $this->model_utama->ambil_perangkat();
		$isi['tiket']			= $this->model_utama->buat_tiket();

		$isi['judul'] = "Home";
		$isi['sub_judul'] = "Input Gangguan";
		
		$this->load->view('design/atas2');
		$this->load->view('user/menu', $isi);
		$this->load->view('user/laporkan', $isi);
		$this->load->view('design/bawah2');
	}else{
		redirect('awal','refresh');
		}
	}

	public function laporkan_act(){
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$this->laporkan();
		} else {
			$data = array (
				'tiket' => $this->input->post('tiket'),
				'tgl_new' => $this->input->post('tgl_new'),
				'user_req' => $this->input->post('user_req'),
				'phone' => $this->input->post('phone'),
				'divisi' => $this->input->post('divisi'),
				'perangkat' => $this->input->post('perangkat'),
				'problem' => $this->input->post('problem'),
				'status' => $this->input->post('status')
				);
			$this->model_utama->inputke_reqit($data);
			$this->session->set_flashdata('laporok', '<div class="alert alert-success">Data berhasil diinput !</div>');
			redirect('user/laporkan','refresh');
		}
	}

	public function new_tkt(){
		$cek = $this->session->userdata('logged_in');
		$jb = $this->session->userdata('jabatan');
		if (!empty($cek) && $jb=='Supervisor') {

			$isi['judul'] = "Home";
			$isi['sub_judul'] = "Tiket New";
			$this->load->view('design/atas2');
			$this->load->view('user/menu', $isi);
			$this->load->view('user/t_new', $isi);
			$this->load->view('design/bawah2');

		} else {
			redirect('awal','refresh');
		}
	}	

	public function ajax_assign(){
		if (!$this->input->is_ajax_request()) {
			exit('No direct script access allowed');
		}else{
			$this->load->library('ssp');
			$table = 'log_reqit';
			$d = $this->session->userdata('userid');
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
				/*array('db' => '`u`.`tiket`', 'dt' => 8, 'field' => 'tiket', 'formatter' => function( $d) {
																return '<a href="'.site_url('user/detail/' .$d).'" >View</a>';}),*/
				);
			$sql_details = array(
				'user' 	=> 'root',
				'pass' 	=> 'root',
				'db' 	=>	'TSP',
				'host' 	=> 'localhost'
				);

				$joinQuery = "FROM log_reqit AS u";
				$extraWhere = "u.status='new' and u.user_req='$d'";   

			echo json_encode(
				SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraWhere ));
		}
	}

	public function inprog(){
		$cek = $this->session->userdata('logged_in');
		$jb = $this->session->userdata('jabatan');
		if (!empty($cek) && $jb=='Supervisor') {

			$isi['judul'] = "Home";
			$isi['sub_judul'] = "Tiket In Progress";
			$this->load->view('design/atas2');
			$this->load->view('user/menu', $isi);
			$this->load->view('user/t_inprog', $isi);
			$this->load->view('design/bawah2');

		} else {
			redirect('awal','refresh');
		}
	}	

	public function ajax_inprog(){
		if (!$this->input->is_ajax_request()) {
			exit('No direct script access allowed');
		}else{
			$this->load->library('ssp');
			$table = 'log_reqit';
			$d = $this->session->userdata('userid');
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
																return '<a href="'.site_url('user/inprog_detail/' .$d).'" >View</a>';}),
				);
			$sql_details = array(
				'user' 	=> 'root',
				'pass' 	=> 'root',
				'db' 	=>	'TSP',
				'host' 	=> 'localhost'
				);

				$joinQuery = "FROM log_reqit AS u";
				$extraWhere = "u.status='inprogress' and u.user_req='$d'";   

			echo json_encode(
				SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraWhere ));
		}
	}

	public function inprog_detail($tiket){	
		$cek = $this->session->userdata('logged_in');
		$jb = $this->session->userdata('jabatan');
		if (!empty($cek) && $jb=='Supervisor') {

		$row = $this->model_utama->ambil_detailtiket($tiket);
		if ($row) {
			$isi = array(
				
				
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
		$isi['sub_judul'] = "Detail Progress";
		
		$this->load->view('design/atas2');
		$this->load->view('user/menu', $isi);
		$this->load->view('user/t_inprog_detail', $isi);
		$this->load->view('design/bawah2');

		} else {
			redirect('awal','refresh');
		}
	}	

	public function closed(){
		$cek = $this->session->userdata('logged_in');
		$jb = $this->session->userdata('jabatan');
		if (!empty($cek) && $jb=='Supervisor') {

			$isi['judul'] = "Home";
			$isi['sub_judul'] = "Tiket Closed";
			$this->load->view('design/atas2');
			$this->load->view('user/menu', $isi);
			$this->load->view('user/t_closed', $isi);
			$this->load->view('design/bawah2');

		} else {
			redirect('awal','refresh');
		}
	}	

	public function ajax_closed(){
		if (!$this->input->is_ajax_request()) {
			exit('No direct script access allowed');
		}else{
			$this->load->library('ssp');
			$table = 'log_reqit';
			$d = $this->session->userdata('userid');
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
																return '<a href="'.site_url('user/closed_detail/' .$d).'" >View</a>';}),
				);
			$sql_details = array(
				'user' 	=> 'root',
				'pass' 	=> 'root',
				'db' 	=>	'TSP',
				'host' 	=> 'localhost'
				);

				$joinQuery = "FROM log_reqit AS u";
				$extraWhere = "u.status='closed' and u.user_req='$d'";   

			echo json_encode(
				SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraWhere ));
		}
	}

	public function closed_detail($tiket){	
		$cek = $this->session->userdata('logged_in');
		$jb = $this->session->userdata('jabatan');
		if (!empty($cek) && $jb=='Supervisor') {

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
		$isi['sub_judul'] = "Detail Closed";
		
		$this->load->view('design/atas2');
		$this->load->view('user/menu', $isi);
		$this->load->view('user/t_closed_detail', $isi);
		$this->load->view('design/bawah2');

		} else {
			redirect('awal','refresh');
		}
	}


	function _rules(){
		$this->form_validation->set_rules('phone', ' ', 'trim|required|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('problem', ' ', 'trim|required|min_length[5]|max_length[500]');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>' );
	}
	

}

/* End of file user.php */
/* Location: ./application/controllers/user.php */