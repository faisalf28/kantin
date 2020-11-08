<?php 
	class Service extends CI_Controller{
		public function index(){
			$data['title'] = "Halaman Service";
			$this->load->view('service',$data);
		}
	}