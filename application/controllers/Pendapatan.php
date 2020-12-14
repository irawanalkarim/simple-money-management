<?php

class Pendapatan extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Pendapatan_model');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['judul'] = 'Pendapatan Harian';
        $data['pendapatan'] = $this->Pendapatan_model->getAllPendapatan();

        $data['total_laba'] = $this->Pendapatan_model->jumlahLaba();
        $data['total_bahan'] = $this->Pendapatan_model->jumlahBahan();
        $data['total_sablon'] = $this->Pendapatan_model->jumlahSablon();
        $data['total_jahit'] = $this->Pendapatan_model->jumlahJahit();
        $data['total_label'] = $this->Pendapatan_model->jumlahLabel();
        $data['total_qty'] = $this->Pendapatan_model->jumlahQty();

        $this->load->view('templates/header',$data);
        $this->load->view('pendapatan/index',$data);
        $this->load->view('templates/footer');
    }

    public function tambah() {
        $data['judul'] = 'Tambah Pendapatan Harian';
        $this->form_validation->set_rules('quantity','Jumlah Terjual','required|numeric');
        $this->form_validation->set_rules('nominal','Pendapatan','required|numeric');
        
        if($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header',$data);
            $this->load->view('pendapatan');
            $this->load->view('templates/footer');
        }else {
            $this->Pendapatan_model->tambahDataPendapatan();
            $this->session->set_flashdata('flash','Ditambahkan');
            redirect('pendapatan');
        }
    }
}