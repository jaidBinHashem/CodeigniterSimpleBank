<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->load->library('session');
		if(! $this->session->userdata('loggedin'))
		{
			$this->load->helper('url');
			redirect('http://localhost:8082/ci226/', 'refresh');
			return;
		}

		$this->load->model('accountmodel');
	}

	public function index()
	{
		
		$data['accountlist'] = $this->accountmodel->getAccountList();
		$this->load->view('view_home', $data);
		//$this->load->view('view_userdetails');
		//print_r($this->loginmodel->getUserList());
	}



	public function accountdetails($account_no = 0)
	{
		
		//print_r($this->accountmodel->getAccountDetails($account_no));
		
		$account['account'] = $this->accountmodel->getAccountDetails($account_no);

		if($account == null)
		{
			echo "user not found";
		}
		else
		{
			$this->load->view('view_details', $account);
		}
	}



	public function deleteAccount($account_no = 0)
	{
		if($this->input->post('delete'))
		{
			
			if($this->accountmodel->deleteAccount($account_no))
			{
				$this->load->helper('url');
				redirect('http://localhost:8082/ci226/', 'refresh');
				return;
			}
			else
			{
				echo "Account Was Not Deleted";
			}

		}
		else
		{
			$account['account'] = $this->accountmodel->getAccountDetails($account_no);

			if($account['account'] == null)
			{
				echo "Account not found";
			}
			else
			{
				$this->load->view('view_delete', $account);
			}
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('loggedin');
		redirect('http://localhost:8082/ci226/', 'refresh');
	}
}
