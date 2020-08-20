<?php

class OverrideAbsensiHistory_model extends CI_Model
{

    public function addBatchOverrideAbsensiHistoryBatch($dataArray)
    {
        
        $overrideHistoryArray = array();
        foreach($dataArray as $data){
            if($data['action']){
                $action = $data['action'];
            }else{
                $action = 'CREATE';
            };
            
            $arr = array(
                "no_pekerja" => $data["no_pekerja"],
                "status_to" => $data["status"],
                "status_from" => $data["old_status"],
                "date" => $data["date"],
                'created_by' => $data["updated_by"],
                'created_at' => $data["updated_at"],
                'action' => $action
            );
            array_push($overrideHistoryArray,$arr);
            
        };
        
        return $this->db->insert_batch('override_absensi_history', $overrideHistoryArray);

    }

}

?>


