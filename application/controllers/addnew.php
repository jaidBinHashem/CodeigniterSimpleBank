<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Addnew extends CI_Controller {

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
		if($this->input->post('buttonCreate'))
		{
			
			
			if($this->form_validation->run('addnew') == false)
			{
				$data['message'] = validation_errors();
				$this->load->view('view_addnew', $data);
				return;
			}

			$accno = $this->input->post('accno');
			$accname = $this->input->post('accname');
			$acctype = $this->input->post('acctype');
			//echo md5($this->input->post('accname'));


			if($this->accountmodel->addAccount($accno, $accname, $acctype))
			{
				$this->load->helper('url');
				redirect('http://localhost:8082/ci226','refresh');
				return;
			}
			else
			{
				//$data['message'] = 'Invalid withdraw amount';
				$this->load->view('view_addnew', $data);
				echo "There were some error";
			}
		}
		else
		{
			$data['message'] = '';
			$this->load->view('view_addnew', $data);
		}
	}

	public function validAccountNo($accno)
	{
		$pattern = '/[0-9]{3}.[0-9]{3}.[0-9]{8}/';
		if(preg_match($pattern, $accno))
		{
			return true;
		}
		else
		{
			$this->form_validation->set_message('validAccountNo', 'Invalid account number');
			return false;
		}
	}

}