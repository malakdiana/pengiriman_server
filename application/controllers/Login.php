<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('login_view');
	}
	public function cekLogin(){
	$this->load->helper('url','form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'USERNAME', 'trim|required');
		$this->form_validation->set_rules('password', 'PASSWORD', 'trim|required|callback_cekDb');
		if ($this->form_validation->run() == FALSE) {
			
			$this->load->view('login_view');
		} else{
			$session_data=$this->session->userdata('logged_in');
			$data['username']=$session_data['username'];
			
				redirect('Server','refresh');
	}
	}

	public function cekDb($password){
	$this->load->helper('url','form');
		$this->load->library('form_validation');
		$this->load->model('LoginModel');
		$username= $this->input->post('username');
		$result = $this->LoginModel->login($username,$password);
		if($result){
			$sess_array= array();
			foreach ($result as $key) {
				$sess_array = array('id' =>$key->idAdmin ,'username'=>$key->username,'password'=>$key->password);
			$this->session->set_userdata('logged_in',$sess_array);
			}
			return true;
		}
		else{
			$this->form_validation->set_message('cekDb','login gagal');
			return false;
		}

	}

	public function logout(){
		$this->load->library('session');
		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();
		redirect('login','refresh');
	}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */