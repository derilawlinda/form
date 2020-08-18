<?php

class overrideAbsensi_model extends CI_Model
{

    public function addBatchOverrideAbsensiBatch($dataArray)
    {
        
        return $this->db->insert_batch('override_absensi', $dataArray);

    }

    public function getCountOverrideStatusByDateAndNoPekerja($date,$no_pekerja){
        
        $result = array();
        $query = $this->db->select('status')
                    ->from('override_absensi')
                    ->where('no_pekerja',$no_pekerja)
                    ->where('date',$date)
                    ->get();
                    
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $result[] = $row;
            }
        }
        return count($result);
    }

    public function getOverrideStatusByDateAndNoPekerja($date,$no_pekerja){
        
        $result = array();
        $query = $this->db->select('status')
                    ->from('override_absensi')
                    ->where('no_pekerja',$no_pekerja)
                    ->where('date',$date)
                    ->get();
                    
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $result[] = $row;
            }
        }
        return $result;
    }

    public function updateByDateAndNoPekerja($date,$updated_by,$no_pekerja,$status){
        
        $this->db->set('status', $status);
        $this->db->set('updated_at', date("Y-m-d H:i:s"));
        $this->db->set('updated_by', $updated_by);
        $this->db->where('date', $date);
        $this->db->where('no_pekerja', $no_pekerja);
        
        return $this->db->update('override_absensi');
    }

}

?>