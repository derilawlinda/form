<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Absen_model extends CI_Model {

 function getRecords(){
 
   // Load database
   $db2 = $this->load->database('absenlokasi', TRUE);
      
    $db2->select('id,userinfo.userid,checktime,userinfo.SN,name,DeptName');    
    $db2->from('checkinout');
    $db2->join('userinfo', 'userinfo.userid = checkinout.userid');
    $db2->join('departments', 'userinfo.defaultdeptid = departments.DeptID');
    $db2->order_by("checkinout.id", "DESC");
    $db2->limit('25');

    $q = $db2->get();

    return $q->result();
 }

 private $_table = "absen";
 private $_valid = "absen";

 public $id;
 public $no_pekerja;
 public $email_kantor;
 public $nama_pekerja;
 public $lokasi_kerja;
 public $fungsi;
 public $status;
 public $created_at;

 public function rules()
 {
     return [
         ['field' => 'email_kantor',
         'label' => 'email_kantor',
         'rules' => 'required'],
     ];
 }

 public function getAll()
 {
     return $this->db->get($this->_table)->result();
 }
 
 public function getById($id)
 {
     return $this->db->get_where($this->_table, ["no_pekerja" => $id])->row();
 }
 public function getByIdConfirm($id)
 {
     return $this->db->get_where($this->_valid, ["id" => $id])->row();
 }
 
 public function getReport()
 {
    $lokasi = $this->session->userdata('sn');
    $role = $this->session->userdata('role');
     $this->db->select('no_pekerja,nama_pekerja,lokasi_kerja, GROUP_CONCAT(created_at ORDER BY created_at asc) as created_at'); 
    
        $array = array('status' => 'User Confirmed');
     return $this->db->group_by(array('lokasi_kerja', 'MONTH(created_at)'))->get_where($this->_valid, $array)->result(); 
 }

 public function getByHadir($lokasi)
 {
    $lokasi = $this->session->userdata('sn');
    $role = $this->session->userdata('role');
     $this->db->select('no_pekerja,nama_pekerja,lokasi_kerja,jabatan, GROUP_CONCAT(status_kerja ORDER BY status_kerja asc) as status_kerja, GROUP_CONCAT(created_at ORDER BY created_at asc) as created_at'); 
    if($role == 'user'){
        $array = array('status' => 'Admin Confirmed', 'lokasi_kerja' => $lokasi);
    }else{
        $array = array('status' => 'Hadir', 'lokasi_kerja' => $lokasi);
    }
     return $this->db->group_by(array('no_pekerja', 'MONTH(created_at)'))->get_where($this->_valid, $array)->result(); 
 }

 public function getByHadirApproved()
 {
    $lokasi = $this->session->userdata('sn');
    $role = $this->session->userdata('role');
     $this->db->select('no_pekerja,nama_pekerja,jabatan, GROUP_CONCAT(status_kerja ORDER BY status_kerja asc) as status_kerja, GROUP_CONCAT(created_at ORDER BY created_at asc) as created_at'); 
    if($role == 'user'){
        $array = array('status' => 'Admin Confirmed', 'lokasi_kerja' => $lokasi);
    }else{
        $array = array('status' => 'User Confirmed', 'lokasi_kerja' => $lokasi);
    }
     return $this->db->group_by(array('no_pekerja', 'MONTH(created_at)'))->get_where($this->_valid, $array)->result(); 
 }

 public function getByHadirId($id)
 {
    $lokasi = $this->session->userdata('sn');
     $array = array('no_pekerja' => $id,'lokasi_kerja' => $lokasi);
     return $this->db->get_where($this->_valid, $array)->row(); 
 }
 public function getByHadirDetail($id,$bln)
 {
    $lokasi = $this->session->userdata('sn');
    $role = $this->session->userdata('role');
    if($role == 'user'){
     $array = array('no_pekerja' => $id,'status' => 'Admin Confirmed', 'lokasi_kerja' => $lokasi, 'MONTH(created_at)' => $bln);
    }else{
        $array = array('no_pekerja' => $id,'status' => 'Hadir', 'lokasi_kerja' => $lokasi, 'MONTH(created_at)' => $bln);
    }
     return $this->db->group_by('CAST(created_at AS DATE)')->get_where($this->_valid, $array)->result(); 
 }
 public function getByNopek($id)
 {
     // return $this->db->join('temp_form', 'pekeja.no_pekerja = temp_form.no_pekerja');
     return $this->db->get_where($this->_valid, ["no_pekerja" => $id])->row();
 }

 public function savebatch()
 {
     $post = $this->input->post();

     $this->load->helper('date');
     date_default_timezone_set('Asia/Jakarta');
     $datestring = '%Y-%m-%d %h:%i:%s';
     $time = time();

     $period = new DatePeriod(
          new DateTime($post["startdate"]),
          new DateInterval('P1D'),
          new DateTime($post["enddate"])
      );

     foreach ($period as $key => $value) {
      $this->id = uniqid();
      // $this->id = $post["id"];
      $this->no_pekerja = $post["no_pekerja"];
      $this->email_kantor = $post["email_kantor"];
      $this->nama_pekerja = $post["nama_pekerja"];
      $this->lokasi_kerja = $post["lokasi_kerja"];
      $this->fungsi = $post["fungsi"];
      $this->jabatan = $post["jabatan"];
      $this->status_kerja = $post["status_lokasi"];
      $this->status = "Hadir";
      $this->created_by = $this->session->userdata('full_name');
      $this->created_at = $value->format('Y-m-d H:i:s');
      $this->db->insert($this->_table, $this);
    }
    
 }

 public function save()
 {
     $post = $this->input->post();
     $this->id = uniqid();
      $this->no_pekerja = $post["no_pekerja"];
     $this->email_kantor = $post["email_kantor"];
     $this->nama_pekerja = $post["nama_pekerja"];
     $this->lokasi_kerja = $post["lokasi_kerja"];
     $this->fungsi = $post["fungsi"];
     $this->jabatan = $post["jabatan"];
     $this->status_kerja = $post["status_lokasi"];
     $this->created_by = $this->session->userdata('email');
     $this->status = "Hadir";
     
     $this->load->helper('date');
     date_default_timezone_set('Asia/Jakarta');
     $datestring = '%Y-%m-%d %h:%i:%s';
     $time = time();
     $this->created_at = mdate($datestring, $time);
     
    return $this->db->insert($this->_table, $this);
 }

 public function update()
 {
    $post = $this->input->post();
    $role = $this->session->userdata('role');
    if($role == 'user'){
        $getWhere = [
            'no_pekerja' => $post['no_pekerja'],
            'lokasi_kerja' => $post["lokasi_kerja"],
            'MONTH(created_at)' => $post["bln"],
            'status' => 'Admin Confirmed'
        ];
    }else{
        $getWhere = [
            'no_pekerja' => $post['no_pekerja'],
            'lokasi_kerja' => $post["lokasi_kerja"],
            'MONTH(created_at)' => $post["bln"],
            'status' => 'Hadir'
        ];
    }
    $dataAbsen = $this->db->get_where($this->_valid, $getWhere)->result();

    $this->load->helper('date');
    date_default_timezone_set('Asia/Jakarta');
    $datestring = '%Y-%m-%d %h:%i:%s';
    $time = time();

    $data = [];
    if($this->session->userdata('role')!="user" || $this->session->userdata('role')=='admin'){
        array_push($data, [
          'acc_by' => $this->session->userdata('email'),
          'status' => "Admin Confirmed",
          'updated_at' => mdate($datestring, $time)
        ]);
    }elseif(isset($post['reason'])){
        array_push($data, [
          'acc_by' => $this->session->userdata('email'),
          'status' => "Rejected",
          'reason' => $post['reason'],
          'updated_at' => mdate($datestring, $time)
        ]);
    }else{
        array_push($data, [
            'acc_by' => $this->session->userdata('email'),
            'status' => "User Confirmed",
            'updated_at' => mdate($datestring, $time)
          ]);
    }

    for ($i=0; $i < count($dataAbsen); $i++) { 
        $whereID = [
            'id' => $dataAbsen[$i]->id
        ];

        $this->db->where($whereID);
        $this->db->update($this->_valid, $data[0]);
    }
    
    // return $this->db->update_batch($this->_valid, $data, $where);
 }

 public function delete($id)
 {
     return $this->db->delete($this->_table, array("id" => $id));
 }

 
 public function addProject()
 {
     $projectName = $this->input->post('projectName');
     $adminid = $this->input->post('adminid');

     $data = [
     'projectname' => $projectName,
     'projectadmin' => $adminid
     ];

     return $this->db->insert('projectlokasi', $data);
 }

 public function getProjectName()
 {
   return $this->db->get('projectlokasi')->result();
 }
 public function deleteProject($id)
 {
     return $this->db->delete('projectlokasi', array("projectid" => $id));
 }

 public function addLokasi()
 {
     $projectid = $this->input->post('projectid');
     $userid = $this->input->post('user_id');
     $adminid = $this->input->post('adminid');
     $name = $this->input->post('nama_lokasi');
     $status = $this->input->post('status_lokasi');
     $start = $this->input->post('mulai');
     $end = $this->input->post('akhir');
     
     $post = $this->input->post();
     $this->load->helper('date');
     date_default_timezone_set('Asia/Jakarta');
     $datestring = '%Y-%m-%d';

     $period = new DatePeriod(
          new DateTime($post["mulai"]),
          new DateInterval('P1D'),
          new DateTime($post["akhir"])
      );

     foreach ($period as $key => $value) {
        $data = [
            'projectid' => $projectid,
            'user_id' => $userid,
            'projectadmin' => $adminid,
            'nama_lokasi' => $name,
            'status_lokasi' => $status,
            'mulai' => $value->format('Y-m-d')
            ];
        $this->db->insert('lokasi', $data);
    }
 }
 public function getLokasi()
 {
    $admin = $this->session->userdata('email');
    $this->db->select('*');    
    // $this->db->from('lokasi');
    $this->db->join('projectlokasi', 'lokasi.projectid = projectlokasi.projectid');
    $this->db->join('users', 'lokasi.user_id = users.user_id');
    $query = $this->db->get_where('lokasi', array('projectlokasi.projectadmin' => $admin))->result();
   return $query;
 }
 public function deleteLokasi($id)
 {
     return $this->db->delete('lokasi', array("lokasi_id" => $id));
 }
}