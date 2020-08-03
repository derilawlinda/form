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

    public function getProjectStatusByMonthYearAndProjectNickName($month, $year, $projectNickName)
    {
        $result = array();
        $query = $this->db->select('start_date,end_date,project_status')
                    ->from('project_schedule')
                    ->where('month(start_date)', $month)
                    ->where('year(start_date)', $year)
                    ->group_start()
                    ->or_where('month(end_date)', $month)
                    ->where('year(end_date)', $year)
                    ->group_end()
                    ->where('project_nickname',$projectNickName)
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