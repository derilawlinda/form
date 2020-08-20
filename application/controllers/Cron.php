<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron extends CI_Controller {

  public function __construct(){

    parent::__construct();
    $this->load->helper('url');

    // Load model
    $this->load->model('Absen_model');
    $this->load->model('RekapAbsensiApproval_model');
   
  }

  public function index(){
        return false;
  }

  public function approveAbsensiBySystem(){

    
    $distinctProjectNames = $this->Absen_model->getArrayDistinctProjectNickNames();
    $bulan = date('n');
    $tahun = date('Y');
    $projectApprovalThisMonthYear = $this->RekapAbsensiApproval_model->getProjectNameAbsensiApprovalByMonthYear($bulan,$tahun);
    $projectApprovalArrayThisMonthYear = $this->RekapAbsensiApproval_model->getArrayProjectNameAbsensiApprovalByMonthYear($bulan,$tahun);
    $projectToInsert = array_diff($distinctProjectNames,$projectApprovalArrayThisMonthYear);

    $this->load->helper('date');
    date_default_timezone_set('Asia/Jakarta');
    $datestring = '%Y-%m-%d %h:%i:%s';
    $time = time();
    $approved_at = mdate($datestring, $time);
    $arrayToInsert = array();

    if(count($projectToInsert)){
        foreach($projectToInsert as $project){
            $arrayToInsert[] = array(
                'project_nickname' => $project,
                'bulan' => $bulan,
                'tahun' => $tahun,
                'approved_by' => 'SYSTEM',
                'approved_at' => $approved_at,
                'is_last_approved_by_system' => 1,
                'notes' => "-",
                'status' => APPROVAL_STATUS["APPROVED_BY_SYSTEM"]
            );
        };
        $this->RekapAbsensiApproval_model->addRekapAbsensiApprovalBatch($arrayToInsert);
    }

    if(count($projectApprovalThisMonthYear)){
        foreach($projectApprovalThisMonthYear as $projectUpdate){ 
            if($projectUpdate["status"] != APPROVAL_STATUS["APPROVED_BY_USER"] || $projectUpdate["status"] != APPROVAL_STATUS["APPROVED_BY_SYSTEM"]){
                $this->RekapAbsensiApproval_model->updateRekapAbsensiApproval($projectUpdate["project_nickname"],$bulan,$tahun,'SYSTEM',$projectUpdate["project_nickname"],APPROVAL_STATUS["APPROVED_BY_SYSTEM"]);
            };
        };
    }

  }

}