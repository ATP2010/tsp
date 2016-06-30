<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {
	public function _construct()
	{
		session_start();
	}

	public function index()
	{
		$cek = $this->session->userdata('logged_in');
		if (empty($cek)) {
			
			$this->load->view('access/login');
		}
		else
		{
			$st = $this->session->userdata('stts');
			if ($st=='admin') {
				redirect('admin');
			}
			if ($st=='administrasi') {
				redirect('administrasi');
			}
			if ($st=='staff') {
				redirect('staff');
			}
			if ($st=='agent') {
				redirect('agent');
			}
		}
	}

	public function login(){
		$u = $this->input->post('userid');
		$p = $this->input->post('password');
		$this->model_login->getLoginData($u,$p);
		/*$this->web_app_model->getLoginData($u,$p);*/
		/*$this->load->model('model_login');*/
		
	}

	public function logout(){
		$cek = $this->session->userdata('logged_in');
		if (empty($cek)) {
			redirect('web');
		}
		else
		{
			$this->session->sess_destroy();
			redirect('web');
		}
	}

}

/* End of file web.php */
/* Location: ./application/controllers/web.php */