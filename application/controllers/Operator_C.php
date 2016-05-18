<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class Operator_C extends CI_Controller{
		
		function __construct(){
			parent::__construct();
			$this->load->model('Opertaor_M');
		}
	}