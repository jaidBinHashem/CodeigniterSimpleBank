<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Withdraw extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->load->library('session');
		if(! $this->session->userdata('loggedin'))
		{
			$this->load->helper('url');
			redirect('http://localhost:8082/ci226/login', 'refresh');
			return;
		}

		$this->load->model('accountmodel');
	}

	public function index()
	{
		if($this->input->post('buttonSave'))
		{
			$accno = $this->input->post('accno');
			$amount = $this->input->post('amount');

			if($this->accountmodel->withdraw($accno, $amount))
			{
				//redirect('http://localhost:8082/ci226/home', 'refresh');
				echo "done";

			}
			else
			{
				$data['message'] = 'Invalid withdraw amount';
				$this->load->view('view_withdraw', $data);
			}
		}
		else
		{
			$data['message'] = '';
			$this->load->view('view_withdraw', $data);
		}
	}
}
