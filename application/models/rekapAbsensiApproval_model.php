<?php

class RekapAbsensiApproval_model extends CI_Model
{
    private $_table = "rekap_absensi_approval";

    public function addRekapAbsensiApproval($project_nickname,$bulan,$tahun,$approved_by,$notes,$status)
    {

        $data = [
            'project_nickname' => $project_nickname,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'approved_by' => $approved_by,
            'approved_at' => date("Y-m-d H:i:s"),
            'is_last_approved_by_system' => 0,
            'notes' => $notes,
            'status' => $status

        ];
        return $this->db->insert('rekap_absensi_approval', $data);
  
    }

    public function updateRekapAbsensiApproval($project_nickname,$bulan,$tahun,$approved_by,$notes,$status)
    {

        $this->db->set('approved_by', $approved_by);
        $this->db->set('status', $status);
        $this->db->set('approved_at', date("Y-m-d H:i:s"));
        $this->db->where('bulan', $bulan);
        $this->db->where('tahun', $tahun);
        $this->db->where('project_nickname', $project_nickname);
        
        return $this->db->update('rekap_absensi_approval');
  
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


    

}