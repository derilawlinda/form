<?php

class UploadRekapAbsen_model extends CI_Model{

               function select(){

                              $this->db->order_by('no', 'DESC');

                              $query = $this->db->get('temp_rekapabsen');

                              return $query;

               }

               function insert($data){

                              $this->db->insert_batch('temp_rekapabsen', $data);

               }

}