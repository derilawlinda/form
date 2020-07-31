<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Survey extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Survey_model");
        $this->load->model("Rekapabsen_model");
        $this->load->library('form_validation');
        $this->load->model("Login_model");
        if($this->Login_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {
        $data["temp_form"] = $this->Survey_model->getAll();
        // $data["rekap"] = $this->Rekapabsen_model->getByConfirmed();
        $this->load->view("admin/Survey/index", $data);
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/Confirmed');
       
        $Temp = $this->Temp_model;
        $validation = $this->form_validation;
        $validation->set_rules($Temp->rules());

        if ($validation->run()) {
            $Temp->update();
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
        }

        $data["temp_form"] = $Temp->getByIdConfirm($id);
        if (!$data["temp_form"]) show_404();
        
        $this->load->view("admin/Confirmed/edit", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->Temp_model->delete($id)) {
            redirect(site_url('admin/Request'));
        }
    }

    public function deleterekap($no=null)
    {
        if (!isset($no)) show_404();
        
        if ($this->Rekapabsen_model->delete($no)) {
            redirect(site_url('admin/Confirmed'));
        }
    }

    public function detailrekap($no = null)
    {
        if (!isset($no)) redirect('admin/Confirmed');
       
        $Temp = $this->Rekapabsen_model;
        $validation = $this->form_validation;
        $validation->set_rules($Temp->rules());

        if ($validation->run()) {
            $Temp->update();
            $this->session->set_flashdata('success', 'Data berhasil di approve');
        }

        $data["temp_form"] = $Temp->getByNopek($no);
        if ($validation->run() && !$data["rekap"]){
            // $Temp->update();
            $this->session->set_flashdata('success', 'Data berhasil di approve');
            // redirect('Rekapabsen/approve');
        }
        $this->load->view("admin/Confirmed/detailrekap", $data);
    }
}