<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penyakit extends CI_Controller {

	public function index()
	{
		$data['penyakit'] = $this->db->get('penyakit')->result_array();
		$this->load->view('header');
		$this->load->view('sistem-pakar/penyakit', $data);
		$this->load->view('footer');
	}
}
