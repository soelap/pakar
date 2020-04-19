<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sistempakar extends CI_Controller {

	public function index()
	{
		$data['kiri'] = $this->db->get('gejala', 40)->result_array();
		$data['kanan'] = $this->db->get('gejala', 40, 40)->result_array();

		$this->load->view('header');
		$this->load->view('sistem-pakar/diagnosa', $data);
		$this->load->view('footer');
	}

	public function diagnosa_submit()
	{
		$fakta = $this->input->post('fakta');
		$penyakit = [];
		if (!$this->input->post('fakta')) {
			$this->session->set_flashdata('error', 'Data yang di input tidak ada !');
			redirect('sistempakar','refresh');
		}else{
			//inference engine !
			if (in_array("G001", $fakta) && in_array("G002", $fakta) && in_array("G007", $fakta) && in_array("G011", $fakta) && in_array("G012", $fakta) && in_array("G032", $fakta) && in_array("G033", $fakta) && in_array("G034", $fakta) && in_array("G035", $fakta)) {
				array_push($penyakit,"P001");
			}
			if (in_array("G001", $fakta) && in_array("G007", $fakta) && in_array("G012", $fakta) && in_array("G013", $fakta) && in_array("G014", $fakta) && in_array("G036", $fakta) && in_array("G037", $fakta)) {
				array_push($penyakit,"P002");
			}
			if (in_array("G001", $fakta) && in_array("G007", $fakta)  && in_array("G013", $fakta) && in_array("G014", $fakta) && in_array("G038", $fakta) && in_array("G039", $fakta) && in_array("G040", $fakta) && in_array("G041", $fakta)) {
				array_push($penyakit,"P003");
			}
			if (in_array("G002", $fakta) && in_array("G003", $fakta)  && in_array("G004", $fakta) && in_array("G008", $fakta) && in_array("G009", $fakta) && in_array("G010", $fakta) && in_array("G017", $fakta) && in_array("G018", $fakta)) {
				array_push($penyakit,"P004");
			}
			if (in_array("G002", $fakta) && in_array("G003", $fakta)  && in_array("G004", $fakta) && in_array("G008", $fakta) && in_array("G009", $fakta) && in_array("G010", $fakta) && in_array("G019", $fakta) && in_array("G020", $fakta)) {
				array_push($penyakit,"P005");
			}
			if (in_array("G003", $fakta)  && in_array("G021", $fakta) && in_array("G022", $fakta) && in_array("G023", $fakta) && in_array("G024", $fakta) && in_array("G025", $fakta) && in_array("G026", $fakta) && in_array("G027", $fakta)) {
				array_push($penyakit,"P006");
			}
			if (in_array("G003", $fakta)  && in_array("G006", $fakta) && in_array("G028", $fakta) && in_array("G029", $fakta) && in_array("G030", $fakta) && in_array("G031", $fakta)) {
				array_push($penyakit,"P007");
			}
			if (in_array("G001", $fakta)  && in_array("G002", $fakta) && in_array("G004", $fakta) && in_array("G011", $fakta) && in_array("G042", $fakta) && in_array("G043", $fakta) && in_array("G044", $fakta) && in_array("G045", $fakta) && in_array("G046", $fakta) && in_array("G047", $fakta)) {
			array_push($penyakit,"P008");
			}
			if (in_array("G001", $fakta)  && in_array("G002", $fakta) && in_array("G004", $fakta) && in_array("G005", $fakta) && in_array("G048", $fakta) && in_array("G049", $fakta) && in_array("G050", $fakta) && in_array("G051", $fakta)) {
				array_push($penyakit,"P009");
			}
			if (in_array("G001", $fakta)  && in_array("G005", $fakta) && in_array("G052", $fakta) && in_array("G053", $fakta) && in_array("G054", $fakta) && in_array("G055", $fakta)) {
				array_push($penyakit,"P010");
			}
			if (in_array("G001", $fakta)  && in_array("G005", $fakta) && in_array("G015", $fakta) && in_array("G016", $fakta) && in_array("G056", $fakta) && in_array("G057", $fakta)) {
				array_push($penyakit,"P011");
			}
			if (in_array("G001", $fakta)  && in_array("G005", $fakta) && in_array("G015", $fakta) && in_array("G016", $fakta) && in_array("G058", $fakta) && in_array("G059", $fakta)) {
				array_push($penyakit,"P012");
			}


			if ($penyakit) {
				$this->result('sukses', $fakta, $penyakit);
			}else{
				$this->result('error', $fakta, $penyakit);
			}
		}
	}

	public function result($status, $fakta, $penyakit)
	{
	if ($status == 'sukses') {
		$this->db->where_in('Kode_Gejala', $fakta);
		$data['gejala'] = $this->db->get('gejala')->result_array();

		$this->db->where_in('Kode_Penyakit', $penyakit);
		$data['penyakit'] = $this->db->get('penyakit')->result_array();
		$this->session->set_flashdata('msg', 'Diagnosa Berhasil !');

	}else{
		$this->db->where_in('Kode_Gejala', $fakta);
		$data['gejala'] = $this->db->get('gejala')->result_array();
		$data['penyakit'] = [];
		$this->session->set_flashdata('error', 'Maaf, Diagnosa gagal!<br>Mungkin Gejala yang diinputkan kurang sesuai dengan knowledge base yang dibuat developer');
	}

		$this->load->view('header');
		$this->load->view('sistem-pakar/result-diagnosa', $data);
		$this->load->view('footer');
	}
}
