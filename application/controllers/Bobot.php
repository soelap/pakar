<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bobot extends MY_controller  {

    public function __construct()
    {
        parent::__construct();
        if ( ! $this->is_logged_in() ) {
            redirect( 'auth' );
        }

    }

    public function index()
    {
        $data = [
            'core_title' => "Data",
            'title' => "Bobot Kriteria",
            'data' => $this->db->get("kriteria")->result_array()
        ];
        
        $this->view('konten/bobot',$data);

    }

    public function subbobot($id_kriteria)
    {
        if(!$id_kriteria) flashdata('warning', "Data tidak ditemukan", "bobot");
        $kriteria = $this->db->get_where("kriteria",['id_kriteria' => $id_kriteria])->row_array();

        $data = [
            'core_title' => "Data",
            'title' => "Bobot Kriteria ".$kriteria['nama_kriteria'],
            'id_kriteria' => $id_kriteria,
            'data' => $this->db->get_where("sub_kriteria",['id_kriteria' => $id_kriteria])->result_array()
        ];

        $this->view('konten/bobot_sub',$data);
    }
    public function settingsubbobot($id_kriteria)
    {
        if(!$id_kriteria) flashdata('warning', "Data tidak ditemukan", "bobot");
        $kriteria = $this->db->get_where("kriteria",['id_kriteria' => $id_kriteria])->row_array();
        $tab_navigasi = [];
        $all = [];
        
        $data = [
            'core_title' => "Data",
            'title' => "Bobot Kriteria ".$kriteria['nama_kriteria'],
        ];
        if(!$kriteria) flashdata('warning', "Kriteria tidak ditemukan", "bobot");
        else {
            $tab_navigasi[] = $kriteria['nama_kriteria'];
            $data['kriteria'] = $kriteria;

            if ($kriteria['punya_sub_kriteria'] == "Y") {
                $all =  $this->db->get_where('sub_kriteria',['id_kriteria' => $kriteria['id_kriteria']])->result_array();
                if($all){
                    foreach ($all as $key => $value){
                         array_push($tab_navigasi, $value['nama_sub_kriteria']);
                         $all[$key]['bobot'] = $this->db->get_where('bobot',['id_sub_kriteria' => $value['id_sub_kriteria']])->result_array();
                        }
                        
                        $data['sub_kriteria'] = $all;
                }

                $data['tab_navigasi'] = $tab_navigasi;
            }
        }
        // exit(print_r($data));

        $this->view('konten/bobot_sub_form',$data);
    }


    // if ($kriteria) foreach ($all as $key => $value) {
    //     $tab_navigasi += [$all[$key]['nama_sub_kriteria']];
    //     if ($kriteria['punya_sub_kriteria'] == "Y") {
    //         $sub_kriteria = $this->db->get_where('bobot',['id_sub_kriteria' => $value['id_sub_kriteria']])->result_array();
    //         if($sub_kriteria) $data['tab_'.$key+2] = $sub_kriteria;
    //     }
    //     else if ($kriteria['punya_sub_kriteria'] == "T") {
    //         $sub_kriteria = $this->db->get_where('bobot',['id_sub_kriteria' => $id_kriteria])->result_array();
    //         if($sub_kriteria) $data['tab_'.$key+2] = $sub_kriteria;
    //     }
    // }
}