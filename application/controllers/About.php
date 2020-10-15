<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 

class About extends MY_backend {

	public function __construct(){
		parent::__construct();

		$GLOBALS['folder_file'] = 'settings';
		$GLOBALS['thumb_file'] = ['width' => '62','height' => '62'];

		$this->load->model('my_m');

		$this->tabel = 'options';

		$this->rules = [
			// array('field' => 'name', 'label' => 'Name','rules' => 'required'),
			// array('field' => 'value','label' => 'Value','rules' => 'required')
		];

	}
		
	public function index(){
		$this->rule->type('U');
		
		$setting = $this->wd_db->get_data('options',['tipe' => 'ft'],'name,value');
		foreach ($setting as $key => $val) {
			$settingData[$val['name']] = $val['value'];
		}
		$about = $this->wd_db->get_data('options',['tipe' => 'about'],'name,value');
		foreach ($about as $key => $val) {
			$aboutData[$val['name']] = $val['value'];
		}
		$platform = $this->wd_db->get_data('platform');
		foreach ($platform as $key => $val) {
			$platformData[strtolower($val['name'])] = $val['url'];
		}
		
		$sosmed = $this->wd_db->get_data('platform',null,'name,url');
		if($sosmed) foreach ($sosmed as $key => $val) {
			$sosmedData[$key] = '<a href="'.$val['url'].'" target="_blank"><img class="mr-15-icon" src="'.base_url("public/platform/".strtolower($val['name']).".svg").'"></a>';
		}

		$data['sosmed'] = json_encode($sosmedData);
		$data['setting'] = $settingData;
		$data['about'] = $aboutData;
		$data['platform'] = $platformData;
		$data['list'] = array_merge($settingData,$aboutData,$platformData);
		$data['content'] = 'form';
		$this->view($data,'');
	}

	public function update(){
		$this->rule->type('U');

		$oldIcon = $this->wd_db->get_data('options',['name' => 'icon']);
		if (isset($_FILES['icon']['name']) && $_FILES['icon']['name']!= '') {
			$updata = img_crop($GLOBALS['folder_file'],'icon',['width' => '520','height' => '520','mode' => 'original']);
			if ($updata['error']==1) {
				$this->session->set_flashdata('danger_message', 'Error uploading file !!');
				redirect(base_url().$this->modul);
				exit();
			}
			$icon = $updata['name'];
			@unlink($GLOBALS['folder_file'].$oldIcon[0]['icon']);
			@unlink($GLOBALS['folder_file'].'thumb/thumb_'.$oldIcon[0]['icon']);	
		}else{
			$icon = $oldIcon[0]['value'];
		}

		$oldLogo = $this->wd_db->get_data('options',['name' => 'logo']);
		if (isset($_FILES['logo']['name']) && $_FILES['logo']['name']!= '') {
			$updata = img_crop($GLOBALS['folder_file'],'logo',['width' => '520','height' => '520','mode' => 'fit']);
			if ($updata['error']==1) {
				$this->session->set_flashdata('danger_message', 'Error uploading file !!');
				redirect(base_url().$this->modul);
				exit();
			}
			$logo = $updata['name'];
			@unlink($GLOBALS['folder_file'].$oldLogo[0]['logo']);
			@unlink($GLOBALS['folder_file'].'thumb/thumb_'.$oldLogo[0]['logo']);	
		}else{
			$logo = $oldLogo[0]['value'];
		}

		$setting = array(
			'icon' => $icon,
			'logo' => $logo,
			'title' => $this->input->post('setting_title'),
		);
		foreach ($setting as $key => $val) {
			$this->wd_db->edit_dml('options',['value' => $val],['tipe' => 'ft','name' => $key]);
		}

		$about = array(
			'deskripsi' => $this->input->post('about_deskripsi'),
			'alamat' => $this->input->post('about_alamat'),
			'no_hp' => $this->input->post('about_hp'),
			'email' => $this->input->post('about_email'),
		);
		foreach ($about as $key => $val) {
			$this->wd_db->edit_dml('options',['value' => $val],['tipe' => 'about','name' => $key]);
		}

		$platform = array(
			'Tokopedia' => $this->input->post('platform_tokopedia'),
			'Lazada' => $this->input->post('platform_lazada'),
			'Shopee' => $this->input->post('platform_shopee'),
			'Facebook' => $this->input->post('platform_facebook'),
			'Instagram' => $this->input->post('platform_instagram'),
			'Youtube' => $this->input->post('platform_youtube'),
		);
		foreach ($platform as $key => $val) {
			$this->wd_db->edit_dml('platform',['url' => $val,'date_u' => date('Y-m-d H:i:s')],['name' => $key]);
		}
		
		redirect('backend/'.$this->modul);
	}

	function deleteImg(){
		$type = $this->input->post('type');
		if($type){
			$delete = $this->wd_db->edit_dml('options',['value' => null],['name' => ($type == 'icon' ? 'icon':'logo')],false);
			if($delete) echo json_encode(['result' => 'ok']);
			else echo json_encode(['result' => 'ko']);
		}
	}



}

