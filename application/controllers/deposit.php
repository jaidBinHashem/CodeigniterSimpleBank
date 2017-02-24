<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deposit extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('loggedin'))
		{
			$this->load->helper('url');
			redirect('http://localhost:8082/ci226/login','refresh');
			return;
		}
		$this->load->model('accountmodel');
	}

	public function index()
	{
		if($this->input->post('deposit'))
		{
			if($this->form_validation->run('deposit') == false)
			{
				$data['message'] = validation_errors();
				$this->load->view('view_deposit',$data);
				return;
			}


			$accno = $this->input->post('accno');
			$amount = $this->input->post('amount');

			if($this->accountmodel->getAccountDetails($accno))
			{
				if($this->accountmodel->deposit($accno,$amount))
				{
					$this->load->helper('url');
					redirect('http://localhost:8082/ci226/home','refresh');
					return;
				}
			}
			else
			{
				$data['message'] = "Not a valid account";
				$this->load->view('view_deposit',$data);
				return;
			}
			
		}
		else
		{
			$data['message'] =  "";
			$this->load->view('view_deposit',$data);
		}
	}

}

/* End of file deposit.php */
/* Location: ./application/controllers/deposit.php */