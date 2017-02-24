<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		if($this->input->post('buttonLogin'))
		{
			$un = $this->input->post('username');
			$ps = $this->input->post('password');

			$this->load->model('loginmodel');


			if($this->loginmodel->verifyUser($un, $ps))
			{
				$this->session->set_userdata('loggedin', true);
				redirect('http://localhost:8082/ci226/home', 'refresh');

			}
			else
			{
				$data['message'] = 'Invalid username or password';
				$this->load->view('view_login', $data);
			}
		}
		else
		{
			if($this->session->userdata('loggedin'))
			{
				$this->load->helper('url');
				redirect('http://localhost:8082/ci226/home', 'refresh');
				return;
			}
			$data['message'] = '';
			$this->load->view('view_login', $data);
		}
	}
}