<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$config = array(
	'addnew' => array(
			array(
				'field' => 'accno',
				'label' => 'Account Number',
				'rules' => 'required|callback_validAccountNo|is_unique[accounts.account_no]'
				),
			array(
				'field' => 'accname',
				'label' => 'Account Name',
				'rules' => 'required'
				),
		),
	'deposit' => array(
			array(
				'field' => 'accno' ,
				'label' => 'Account Number',
				'rules' => 'required'
				),
			array(
				'field' => 'amount',
				'label' => 'Amount',
				'rules' => 'required'
				),
		)
	);