<?php

class OverrideAbsensi_model extends CI_Model
{

    public function addBatchOverrideAbsensiBatch($dataArray)
    {
        
        $this->load->model('OverrideAbsensiHistory_model');

        if($this->db->insert_batch('override_absensi', $dataArray)){
            return $this->OverrideAbsensiHistory_model->addBatchOverrideAbsensiHistoryBatch($dataArray);
        }

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

    public function updateByDateAndNoPekerja($date,$updated_by,$no_pekerja,$status,$old_status){
        
        $this->load->model('OverrideAbsensiHistory_model');

        $this->load->helper('date');
        date_default_timezone_set('Asia/Jakarta');
        $datestring = '%Y-%m-%d %h:%i:%s';
        $time = time();
        $updated_at = mdate($datestring, $time);
        
        $this->db->set('status', $status);
        $this->db->set('updated_at', $updated_at);
        $this->db->set('updated_by', $updated_by);
        $this->db->where('date', $date);
        $this->db->where('no_pekerja', $no_pekerja);
        
        if($this->db->update('override_absensi')){
            $arrayToInsert = array();
            $array = array(
                "no_pekerja" => $no_pekerja,
                "status" => $status,
                "old_status" => $old_status,
                "date" => $date,
                'updated_at' => $updated_at,
                'updated_by' => $updated_by,
                'action' => 'UPDATE'
            );
            $arrayToInsert[] = $array;
            $this->OverrideAbsensiHistory_model->addBatchOverrideAbsensiHistoryBatch($arrayToInsert);
        }
    }

}

?>