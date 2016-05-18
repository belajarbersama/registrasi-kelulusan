<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class Keuangan_C extends CI_Controller{
		
		function __construct(){
			parent::__construct();
			$this->load->model('Keuangan_M');
		}
	}