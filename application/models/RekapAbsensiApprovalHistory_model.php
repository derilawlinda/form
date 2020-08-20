<?php

class RekapAbsensiApprovalHistory_model extends CI_Model
{
    private $_table = "rekap_absensi_approval_history";

    public function addRekapAbsensiApprovalHistory($project_nickname,$bulan,$tahun,$approved_by,$notes,$status_from,$status_to,$action)
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
            'notes' => $notes,
            'status_from' => $status_from,
            'status_to' => $status_to,
            'approved_by' => $approved_by,
            'approved_at' => $approved_at,
            'action' => $action
        ];
        return $this->db->insert('rekap_absensi_approval_history', $data);
  
    }

    public function addRekapAbsensiApprovalHistoryBatch($arrayInserted,$action)
    {
        $this->load->helper('date');
        date_default_timezone_set('Asia/Jakarta');
        $datestring = '%Y-%m-%d %h:%i:%s';
        $time = time();
        $approved_at = mdate($datestring, $time);
        if(!isset($action)){
           $action = 'CREATE'; 
        }
        
        $data = array();
        foreach($arrayInserted as $arr){
            
            $data[] = array(
                'project_nickname' => $arr["project_nickname"],
                'bulan' => $arr["bulan"],
                'tahun' => $arr["tahun"],
                'notes' => $arr["notes"],
                'status_from' => "-",
                'status_to' => APPROVAL_STATUS["APPROVED_BY_SYSTEM"],
                'approved_by' => 'SYSTEM',
                'approved_at' => $arr["approved_at"],
                'action' => $action
            );
        };
        return $this->db->insert_batch('rekap_absensi_approval_history', $data);
  
    }

    public function getLastStatusApprovalByMonthYearAndProjectNickname($month,$year,$projectNickName){

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


    

}