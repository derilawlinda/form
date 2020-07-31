<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

  function getUsers($postData){
 
    $response = array();
  
    

    if($postData['search'] ){
      // Select record
      $this->db->select('*');
      $where = "email_kantor like '%".$postData['search']."%' OR no_pekerja like '%".$postData['search']."%'";
      $this->db->where($where);
      
      $records = $this->db->get('pekerja')->result();
      

      foreach($records as $row ){
        $response[] = array("value0"=>$row->no_pekerja,
                            "value1"=>$row->nama_pekerja,
                            "value2"=>$row->tgl_masuk,
                            "value3"=>$row->tempat_lahir,
                            "value4"=>$row->tgl_lahir,
                            "value5"=>$row->departemen,
                            "value6"=>$row->jabatan,
                            "value7"=>$row->project,
                            "value8"=>$row->no_pkwt,
                            "value9"=>$row->area,
                            "value10"=>$row->alamat,
                            "value11"=>$row->provinsi,
                            "value12"=>$row->kota,
                            "value13"=>$row->telepon,
                            "value14"=>$row->handphone,
                            "value15"=>$row->email_pribadi,
                            "value16"=>$row->no_ktp,
                            "value17"=>$row->no_kontrak_project,
                            "value18"=>$row->project_nickname,
                            "value19"=>$row->lokasi_kerja,
                            "value20"=>$row->fungsi,
                            "value21"=>$row->department,
                            "value22"=>$row->id_pos,
                            "value23"=>$row->pt_pdc_sk_028a_pdc1000_2019_s0,
                            "label"=>$row->email_kantor,
                            "label2"=>$row->no_pekerja);

      }
 
    }
    
    return $response;
  }
  
  public function getUserAccount()
  {
    return $this->db->get('users')->result();
  }

    public function addUser()
  {
      $username = $this->input->post('username');
      $password = $this->input->post('password');
      $email = $this->input->post('email');
      $fullname = $this->input->post('fullname');
      $sn = $this->input->post('sn');
      $role = $this->input->post('role');
      $no_pekerja = $this->input->post('no_pekerja');

      $data = [
      'username' => $username,
      'password' => password_hash($password, PASSWORD_DEFAULT),
      'email' => $email,
      'full_name' => $fullname,
      'sn' => $sn,
      'role' => $role,
      'no_pekerja' => $no_pekerja
      ];

      return $this->db->insert('users', $data);
  }

  public function delete()
  {
      $idUser = $this->input->post('idUser');
      $where = [
        'user_id' => $idUser,
      ];

      $this->db->where($where);
      $this->db->delete('users');
  }

}