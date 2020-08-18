<?php

class Projectschedule_model extends CI_Model
{
    private $_table = "project_schedule";


    public function getProjectScheduleByProjectNickname($projectNickName)
    {
        $project_schedules = array();
        $query = $this->db->select('*')
                    ->from('project_schedule')
                    ->where('project_nickname',$projectNickName)
                    ->get(); 
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $project_schedules[] = $row;
            }
        }
        return $project_schedules;
    }

    public function getIdProjectScheduleByProjectNickname($projectNickName)
    {
        $result = array();
        $query = $this->db->select('id_project_schedule')
                    ->from('project_schedule')
                    ->where('project_nickname',$projectNickName)
                    ->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                array_push($result, $row["id_project_schedule"]);
            }
        }
        
        return $result;
    }

    public function getProjectScheduleArrayByProjectNickName($projectNickName)
    {
        $result = array();
        $query = $this->db->select('id_project_schedule AS arrkey, id_project_schedule')
                    ->from('project_schedule')
                    ->where('project_nickname',$projectNickName)
                    ->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $result[$row["id_project_schedule"]] =  $row["id_project_schedule"];
            }
        }
        
        return $result;
    }

    public function getProjectStatusByMonthYearAndProjectNickName($lastDate,$lastMonth,$lastYear,$date,$month, $year, $projectNickName)
    {
        $result = array();
        $query = $this->db->select('start_date,end_date,project_status')
                    ->from('project_schedule')
                    ->where('project_nickname',$projectNickName)
                    ->group_start()
                        ->where('start_date BETWEEN " '.$lastYear.'-'.$lastMonth.'-'.$lastDate.' " and "'.$year.'-'.$month.'-'.$date.'"')
                        ->or_where('end_date BETWEEN " '.$lastYear.'-'.$lastMonth.'-'.$lastDate.' " and "'.$year.'-'.$month.'-'.$date.'"')
                    ->group_end()    
                    ->order_by('start_date', 'ASC')
                    ->get();
        
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $result[] = $row;
            }
        }
        
        return $result;
    }
    

}