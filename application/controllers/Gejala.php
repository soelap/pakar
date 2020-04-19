<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gejala extends CI_Controller {

	public function index()
	{
		$data['gejala'] = $this->db->get('gejala')->result_array();
		$this->load->view('header');
		$this->load->view('sistem-pakar/gejala', $data);
		$this->load->view('footer');
	}
}
