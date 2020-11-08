<?php 
	class Blog extends CI_Controller{
		public function index(){
			$data['title'] = "Halaman Blog";
			$this->load->view('blog',$data);
		}
	}