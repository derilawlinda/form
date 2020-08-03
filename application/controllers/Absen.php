<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absen extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Absen_model");
        $this->load->helper('url');
        $this->load->model('User_model');
        $this->load->model('Temp_model');
        $this->load->library('form_validation');
        $this->load->model("Login_model");
        if($this->Login_model->isNotLogin()) redirect(site_url('admin/login'));

    }

public function index(){
        $temp = $this->Temp_model;
        $validation = $this->form_validation;
        $validation->set_rules($temp->rules());

        if ($validation->run()) {
            $temp->save();
            $this->session->set_flashdata('success', 'Data Berhasil Dikirim');
        }
        $this->load->view("admin/Absen/view.php");
}

public function harian($id = null){
    if($this->session->userdata('role') == 'user'){
        redirect(site_url('absen/approve'));
    }
    // $temp = $this->Temp_model;
    if (!isset($id)){$data["temp_form"] = NULL;}
    if (!isset($id) && $this->session->userdata('role') == 'crew'){ redirect(site_url('absen/harian/'.$this->session->userdata('no_pekerja'))); }
    $data["temp_form"] = $this->Absen_model->getById($id);
    $temp = $this->Absen_model;
    $validation = $this->form_validation;
    $validation->set_rules($temp->rules());

    if ($validation->run()) {
        $temp->save();
        $this->session->set_flashdata('success', 'Data Berhasil Dikirim');
    }
    $this->load->view("admin/Absen/harian.php", $data);
}

public function batch($id = NULL){
    // $temp = $this->Temp_model;    if (!isset($id)){$data["temp_form"] = NULL;}
    if (!isset($id)){$data["temp_form"] = NULL;}
    if (!isset($id) && $this->session->userdata('role') == 'crew'){ redirect(site_url('absen/batch/'.$this->session->userdata('no_pekerja'))); }
    $data["temp_form"] = $this->Absen_model->getById($id);

    $temp = $this->Absen_model;
    $validation = $this->form_validation;
    $validation->set_rules($temp->rules());

    if ($validation->run()) {
        $temp->savebatch();
        $this->session->set_flashdata('success', 'Data Berhasil Dikirim');
    }
    $this->load->view("admin/Absen/batch.php", $data);
}

  public function list(){

        $data["respon"] = $this->Absen_model->getRecords();
        $this->load->view("admin/Absen/absen_view.php", $data);
  }

  public function approve($lokasi = null){

    $data["temp_form"] = $this->Absen_model->getByHadir($lokasi);
        $this->load->view("admin/Absen/approval", $data);
  }

  public function approved(){

    $data["temp_form"] = $this->Absen_model->getByHadirApproved();
        $this->load->view("admin/Absen/approval", $data);
  }

  public function detail_approve($no = null, $bln = null){
    if (!isset($no)) redirect('absen/batch');
    if (!isset($bln)) redirect('absen/batch');
    $data["temp_form"] = $this->Absen_model->getByHadirId($no);
    $data["temp"] = $this->Absen_model->getByHadirDetail($no,$bln);
    $this->load->view("admin/Absen/detail_approval", $data);

    $validation = $this->form_validation;
    $validation->set_rules($this->Absen_model->rules());
    
    if ($validation->run()) {
        $this->Absen_model->update();
        $this->session->set_flashdata('success', 'Data telah berhasil di approve');
    }
  }
  
  public function approveAbsensi($no = null, $bln = null)
  {
    $validation = $this->form_validation;
    $validation->set_rules($this->Absen_model->rules());
    
    if ($validation->run()) {
        $this->Absen_model->update();
        $this->session->set_flashdata('success','Data telah berhasil di approve');
    }
    return redirect(base_url('absen/detail_approve/'.$no.'/'.$bln));
  }

  public function laporan(){

    $data["temp_form"] = $this->Absen_model->getReport();
        $this->load->view("admin/Absen/report", $data);
  }

  public function lokasi(){

    $data["userAccount"] = $this->User_model->getUserAccount();
    $data["lokasi"] = $this->Absen_model->getLokasi();
    $data["project"] = $this->Absen_model->getProjectName();
    // $data["users"] = $this->User_model->getUsers();
    $this->load->view("admin/Absen/lokasi", $data);
  }

  public function addProject()
  {
      $this->Absen_model->addProject();
      $this->session->set_flashdata('success', 'Berhasil menambahkan data');
      return redirect(base_url('absen/lokasi'));   
  }

  public function deleteProject($id=null)
  {
      if (!isset($id)) show_404();
      
      if ($this->Absen_model->deleteProject($id)) {
          $this->session->set_flashdata('success', 'Berhasil menghapus data');
          redirect(site_url('absen/lokasi'));
      }
  }
  public function addLokasi()
  {
      $this->Absen_model->addLokasi();
      $this->session->set_flashdata('success', 'Berhasil menambahkan data');
      return redirect(base_url('absen/lokasi'));   
  }

  public function deleteLokasi($id=null)
  {
      if (!isset($id)) show_404();
      
      if ($this->Absen_model->deleteLokasi($id)) {
          $this->session->set_flashdata('success', 'Berhasil menghapus data');
          redirect(site_url('absen/lokasi'));
      }
  }

  
}