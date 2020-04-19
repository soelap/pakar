<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Startup extends CI_Controller {

	public function index()
	{
		$this->load->view('header');
		$this->load->view('sistem-pakar/index');
		$this->load->view('footer');
	}
	public function team()
	{
		$this->load->view('header');
		$this->load->view('sistem-pakar/team');
		$this->load->view('footer');
	}
}
