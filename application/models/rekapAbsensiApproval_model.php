<?php

class RekapAbsensiApproval_model extends CI_Model
{
    private $_table = "rekap_absensi_approval";

    public function addRekapAbsensiApproval($project_nickname,$bulan,$tahun,$approved_by,$notes,$status)
    {
        $this->load->helper('date');
        date_default_timezone_set('Asia/Jakarta');
        $datestring = '%Y-%m-%d %h:%i:%s';
        $time = time();
        $approved_at = mdate($datestring, $time);
        $data = [
            'project_nickname' => $project_nickname,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'approved_by' => $approved_by,
            'approved_at' => $approved_at,
            'is_last_approved_by_system' => 0,
            'notes' => $notes,
            'status' => $status

        ];

        //logging
        $this->load->model('RekapAbsensiApprovalHistory_model');
        $this->RekapAbsensiApprovalHistory_model->addRekapAbsensiApprovalHistory($project_nickname,$bulan,$tahun,$approved_by,$notes,"-",$status,"CREATE");
        
        return $this->db->insert('rekap_absensi_approval', $data);
  
    }

    public function addRekapAbsensiApprovalBatch($arrayToInsert)
    {
        //logging
        $this->load->model('RekapAbsensiApprovalHistory_model');
        if($this->db->insert_batch('rekap_absensi_approval', $arrayToInsert)){
            $this->RekapAbsensiApprovalHistory_model->addRekapAbsensiApprovalHistoryBatch($arrayToInsert,'CREATE');
        };
  
    }

    public function updateRekapAbsensiApproval($project_nickname,$bulan,$tahun,$approved_by,$notes,$status)
    {
        $lastStatus = $this->getRekapAbsensiApprovalByMonthYearAndProjectNickname($bulan,$tahun,$project_nickname);
        $this->load->helper('date');
        date_default_timezone_set('Asia/Jakarta');
        $datestring = '%Y-%m-%d %h:%i:%s';
        $time = time();
        $approved_at = mdate($datestring, $time);

        $this->load->model('RekapAbsensiApprovalHistory_model');
        $this->db->set('approved_by', $approved_by);
        $this->db->set('approved_at', $approved_at);
        $this->db->set('status', $status);
        $this->db->set('notes', $notes);
        $this->db->where('bulan', $bulan);
        $this->db->where('tahun', $tahun);
        $this->db->where('project_nickname', $project_nickname);

       
        if($this->db->update('rekap_absensi_approval')){
             //logging
            $this->load->model('RekapAbsensiApprovalHistory_model');
            if(count($lastStatus) > 0){
                $status_from = $lastStatus[0]["status"];
            }else{
                $status_from = "-";
            }
            $status_to = $status;
            return $this->RekapAbsensiApprovalHistory_model->addRekapAbsensiApprovalHistory($project_nickname,$bulan,$tahun,$approved_by,$notes,$status_from,$status_to,"UPDATE");
            
        }else {
            return false;
        }
  
    }

    public function getRekapAbsensiApprovalByMonthYearAndProjectNickname($month,$year,$projectNickName){

        $result = array();
        $query = $this->db->select('status,notes')
                    ->from('rekap_absensi_approval')
                    ->where('bulan',$month)
                    ->where('tahun',$year)
                    ->where('project_nickname',$projectNickName)
                    ->get();
                    
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $result[] = $row;
            }
        }
        return $result;
        
    }

    public function getArrayProjectNameAbsensiApprovalByMonthYear($month,$year){

        $result = array();
        $query = $this->db->select('project_nickname')
                    ->from('rekap_absensi_approval')
                    ->where('bulan',$month)
                    ->where('tahun',$year)
                    ->get();
                    
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $result[] = $row["project_nickname"];
            }
        }
        return $result;
        
    }

    public function getProjectNameAbsensiApprovalByMonthYear($month,$year){

        $result = array();
        $query = $this->db->select('*')
                    ->from('rekap_absensi_approval')
                    ->where('bulan',$month)
                    ->where('tahun',$year)
                    ->get();
                    
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $result[] = $row;
            }
        }
        return $result;
        
    }


    

}