<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Accountmodel extends CI_Model {

	public function getAccountList()
	{
		$sql = "SELECT * FROM accounts";

		//$result = mysqli_query($sql);
		$result = $this->db->query($sql);

		//$row = mysqli_fetch_array($result);
		return $result->result_array();
	}



	public function getAccountDetails($account_no=0)
	{
		$sql = "SELECT * from accounts where account_no='$account_no'";
		$result = $this->db->query($sql);
		return $result->row_array();
	}


	public function deposit($accno,$amount)
	{
		$result = $this->accountmodel->getAccountDetails($accno);
		$data = array(
               'balance' => $result['balance'] + $amount,
               'last_tran' => date('Y-m-d H:i:s')
            );

		$this->db->where('account_no', $accno);
		$this->db->update('accounts', $data);
		return true;
	}

	public function deleteAccount($account_no=0)
	{
		$sql = "DELETE FROM `accounts` WHERE account_no='$account_no'";
		$this->db->query($sql);
		return true;
	}


	public function addAccount($accno,$accname,$acctype)
	{
		$data = array(
   			'account_no' => $accno,
   			'account_name' => $accname,
   			'account_type' => $acctype,
		);

		$this->db->insert('accounts', $data);
		return true; 
	}


	public function withdraw($accno, $amount)
	{
		$sql = "SELECT balance FROM accounts WHERE account_no='$accno'";
		$result = $this->db->query($sql);
		$row = $result->row_array();
		if($row['balance'] < $amount)
		{
			return false;
		}
		
		$time = date('Y-m-d H:i:s');
		$sql = "UPDATE accounts SET balance = balance-'$amount', last_tran = '$time'  where account_no='$accno'";

		$this->db->query($sql);
		return true;
	}

	public function transfer($fraccno,$toaccno, $amount)
	{
		if($this->withdraw($fraccno, $amount))
		{
			$this->deposit($toaccno, $amount);
			return true;
		}
		else
		{
			return false;
		}	
		
	}
}