<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_login extends CI_Model {

	public function getLoginData($u,$p){
		$q_cek_login = $this->db->get_where('user', array('userid'=>$u,'password'=>$p));
			if (count($q_cek_login->result())>0) {
				foreach ($q_cek_login->result() as $qck) {
					$jab = $qck->jabatan;
					
							if ($jab == 'IT Staff') {
								$sess_data['logged_in'] = 'yes';
								$sess_data['userid'] = $qck->userid;
								$sess_data['nama'] = $qck->nama;
								$sess_data['jabatan'] = $qck->jabatan;
								$sess_data['id'] = $qck->id;
								$this->session->set_userdata($sess_data);
								redirect('it','refresh');
							}

							if ($jab == 'Supervisor') {
								$sess_data['logged_in'] = 'yes';
								$sess_data['userid'] = $qck->userid;
								$sess_data['nama'] = $qck->nama;
								$sess_data['jabatan'] = $qck->jabatan;
								$sess_data['id'] = $qck->id;
								$this->session->set_userdata($sess_data);
								redirect('user','refresh');
							}
							
						
								
							}
						}
					
			else
			{
				$this->session->set_flashdata('info','<div class="alert alert-warning">userid / password tidak sesuai !</div>');
				redirect('awal');
			}
	}

	

}

/* End of file web_app_model.php */
/* Location: ./application/models/web_app_model.php */