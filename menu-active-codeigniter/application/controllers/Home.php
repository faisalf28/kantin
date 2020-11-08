<?php 
	class Home extends CI_Controller{
		public function index(){
			$data['title'] = "Halaman Home";
			$this->load->view('home',$data);
		}
	}