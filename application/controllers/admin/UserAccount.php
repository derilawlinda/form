<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UserAccount extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("User_model");
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->model("Login_model");
        if($this->Login_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {
        $data["userAccount"] = $this->User_model->getUserAccount();
        // $data["users"] = $this->User_model->getUsers();
        $this->load->view("admin/User/userManagement_view", $data);
    }

    public function addAccount()
    {
        $this->User_model->addUser();
        $this->session->set_flashdata('success', 'Berhasil menambahkan user!');
        return redirect(base_url('admin/UserAccount'));   
    }

    public function delete()
    {
        $this->User_model->delete();
        $this->session->set_flashdata('success', 'Berhasil hapus data!');
        return redirect(base_url('admin/UserAccount'));   
    }
}