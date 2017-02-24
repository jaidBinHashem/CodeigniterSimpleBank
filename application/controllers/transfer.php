<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transfer extends CI_Controller {

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
		if($this->input->post('transfer'))
		{
			if($this->form_validation->run('transfer') == false)
			{
				$data['message'] = validation_errors();
				$this->load->view('view_transfer',$data);
				return;
			}


			$fraccno = $this->input->post('fraccno');
			$toaccno = $this->input->post('toaccno');
			$amount = $this->input->post('amount');

			if($this->accountmodel->getAccountDetails($fraccno))
			{
				if($this->accountmodel->getAccountDetails($toaccno))
				{
					if($this->accountmodel->transfer($fraccno,$toaccno,$amount))
					{
						$this->load->helper('url');
						redirect('http://localhost:8082/ci226/home','refresh');
						return;
					}
					else
					{
						$data['message'] = "Invalid transfer amount";
						$this->load->view('view_transfer',$data);
						return;
					}
				}
				else
				{
					$data['message'] = "Not valid account numbers";
					$this->load->view('view_transfer',$data);
					return;
				}
			}
			else
			{
				$data['message'] = "Not valid account numbers";
				$this->load->view('view_transfer',$data);
				return;
			}
		}
		else
		{
			$data['message'] =  "";
			$this->load->view('view_transfer',$data);
		}
	}

}

/* End of file transfer.php */
/* Location: ./application/controllers/transfer.php */