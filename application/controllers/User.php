<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

  public function __construct(){

    parent::__construct();
    $this->load->helper('url');

    // Load model
    $this->load->model('User_model');
    $this->load->model('Temp_model');
    
    //Library
    $this->load->library('form_validation');
  }

  public function index(){
        $temp = $this->Temp_model;
        $validation = $this->form_validation;
        $validation->set_rules($temp->rules());
        if ($validation->run()) {
            $temp->save();
            $this->session->set_flashdata('success', 'Data Berhasil Dikirim');
        }
    // load view
    $this->load->view('user_view');
  }

  public function dashboard(){
    $this->load->view('admin/User/dashboard_view');
  }

  public function userList(){
    // POST data
    $postData = $this->input->post();

    // get data
    $data = $this->User_model->getUsers($postData);

    echo json_encode($data);
  }

}