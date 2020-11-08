<?php 
	class Galery extends CI_Controller{
		public function index(){
			$data['title'] = "Halaman Galery";
			$this->load->view('galery',$data);
		}
	}