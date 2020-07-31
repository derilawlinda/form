<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Request extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Temp_model");
        $this->load->library('form_validation');
        $this->load->model("Login_model");
        if($this->Login_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {
        $data["login"] = $this->Login_model->isLogin();
        $data["temp_form"] = $this->Temp_model->getAll();
        $this->load->view("admin/Request/list", $data);
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/Request');
       
        $Temp = $this->Temp_model;
        $validation = $this->form_validation;
        $validation->set_rules($Temp->rules());

        if ($validation->run()) {
            $Temp->update();
            $this->session->set_flashdata('success', 'Data berhasil dikoreksi');
        }

        $data["temp_form"] = $Temp->getById($id);
        if (!$data["temp_form"]) show_404();
        
        $this->load->view("admin/Request/edit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->Temp_model->delete($id)) {
            redirect(site_url('admin/Request'));
        }
    }
}