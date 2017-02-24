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
		),
	'withdraw' => array(
			array(
				'field' => 'accno',
				'label' => 'Account Number',
				'rules' => 'required'
				),
			array(
				'field' => 'amount',
				'label' => 'Amount',
				'rules' => 'required'
				)
		),
	'transfer' => array(
			array(
				'field' => 'fraccno',
				'label' => 'From Account Number',
				'rules' => 'required'
				),
			array(
				'field' => 'toaccno',
				'label' => 'To Account Number',
				'rules' => 'required'
				),
			array(
				'field' => 'amount',
				'label' => 'Amount',
				'rules' => 'required'
				)
			)
		);