<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class Kepsek_C extends CI_Controller{
		
		function __construct(){
			parent::__construct();
			$this->load->model('Kepsek_M');
		}
	}