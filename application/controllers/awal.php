<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Awal extends CI_Controller {

	public function _construct(){
		session_start();
	}

	public function index()
	{
		$cek = $this->session->userdata('logged_in');
		if (empty($cek)) {
			$this->load->view('access/v_login');
		}else{
			$jb = $this->session->userdata('jabatan');
			if ($jb=='IT Staff') {
				redirect('it','refresh');
			}
			if ($jb=='Supervisor') {
				redirect('user','refresh');
			}
		}		
	}

	public function login(){
		$u = $this->input->post('userid');
		$p = $this->input->post('password');
		$this->model_login->getLoginData($u,$p);
	}

	public function logout(){
		$cek = $this->session->userdata('logged_in');
		if (empty($cek)) {
			redirect('awal','refresh');
		}else{
			$this->session->sess_destroy();
			redirect('awal','refresh');
		}
	}

}

/* End of file awal.php */
/* Location: ./application/controllers/awal.php */