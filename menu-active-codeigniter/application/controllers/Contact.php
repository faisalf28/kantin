<?php 
	class Contact extends CI_Controller{
		public function index(){
			$data['title'] = "Halaman Contact";
			$this->load->view('contact', $data);
		}
	}