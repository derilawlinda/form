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

 public function getDistinctProjectNickNames()
 {
    $projects = array();
    $query = $this->db->select('project_nickname')
                ->distinct('project_nickname')
                ->from('pekerja')
                ->get(); 
    if ($query->num_rows() > 0) {
        foreach ($query->result_array() as $row) {
            $projects[] = $row;
        }
    }
    return $projects;
 }

 public function getPegawaiAndKlasifikasiByProjectNickName($projectNickName)
 {
    $pegawais = array();
    $query = $this->db->select('no_pekerja,nama_pekerja,jabatan,tgl_masuk,roster')
                ->from('pekerja')
                ->where('project_nickname',$projectNickName)
                ->get(); 
    if ($query->num_rows() > 0) {
        foreach ($query->result_array() as $row) {
            $pegawais[] = $row;
        }
    }
    return $pegawais;
 }

 public function getDistinctProjectNickNamesAndStatusByMonthAndYear($draw,$start,$length,$search,$order_field, $order_ascdesc)
 {
    $this->load->model('RekapAbsensiApproval_model', true);
    $month = date('n');
    $year = date('Y');
    $projects = array();

   
    $allsql = "SELECT DISTINCT p.project_nickname, a.status FROM pekerja p LEFT JOIN 
            (
            SELECT project_nickname, status FROM rekap_absensi_approval rap WHERE rap.bulan = ? AND rap.tahun = ?
            ) a ON a.project_nickname = p.project_nickname
            ";
    $query = $this->db->query($allsql, [$month,$year]);
    
    $limitedSql = "SELECT DISTINCT p.project_nickname, a.status FROM pekerja p LEFT JOIN 
    (
    SELECT project_nickname, status FROM rekap_absensi_approval rap WHERE rap.bulan = ? AND rap.tahun = ?
    ) a ON a.project_nickname = p.project_nickname ";
    
    
    
    if($search){
        $limitedSql = "SELECT * FROM (SELECT DISTINCT p.project_nickname, a.status FROM pekerja p LEFT JOIN 
        (
        SELECT project_nickname, status FROM rekap_absensi_approval rap WHERE rap.bulan = ? AND rap.tahun = ?
        ) a ON a.project_nickname = p.project_nickname) b WHERE project_nickname like '%".$search."%'";
        
    }
    if($order_field){
        $limitedSql .= " ORDER BY ".$order_field." ".$order_ascdesc;
    }
    $limitedSql .= " LIMIT ? OFFSET ? ";
    
    $limitedQuery = $this->db->query($limitedSql, [$month,$year,$length,$start]);
    
    if ($limitedQuery ->num_rows() > 0) {
        foreach ($limitedQuery ->result_array() as $row) {
            $countProjectStatus = $this->countProjectStatus($month-1,$year,$row["project_nickname"]);
            $row["OFT"] = $countProjectStatus["OFT"];
            $row["OFJ"] = $countProjectStatus["OFJ"];
            $row["ORC"] = $countProjectStatus["ORC"];
            $row["ORT"] = $countProjectStatus["ORT"];
            $row["MVR"] = $countProjectStatus["MVR"];
            $row["MTR"] = $countProjectStatus["MTR"];
            $row["DK"] = $countProjectStatus["DK"];
            $row["CT"] = $countProjectStatus["CT"];
            $row["IZN"] = $countProjectStatus["IZN"];
            $row["NA"] = $countProjectStatus["NA"];
            $projects[] = $row;
        }
    }
   
    $result = array(
          "draw" => $draw,
          "recordsTotal" => $limitedQuery->num_rows(),
          "recordsFiltered" => $query->num_rows(),
          "data" => $projects
     );
     echo json_encode($result);
     exit();
    
 }


 public function countProjectStatus($bulanNumber,$tahun,$projectNickName){

    $this->load->model('OverrideAbsensi_model');
    $this->load->model("Projectschedule_model");
    
    $pegawais = array();
    $lastBulanNumber = $bulanNumber - 1;
    $tanggalArray = array();

    if($lastBulanNumber < 0){
        $lastBulanNumber = 11;
        $projectStatuses = $this->Projectschedule_model->getProjectStatusByMonthYearAndProjectNickName(21,$lastBulanNumber+1,$tahun-1,20,$bulanNumber+1,$tahun,$projectNickName);
    }else{
        $projectStatuses = $this->Projectschedule_model->getProjectStatusByMonthYearAndProjectNickName(21,$lastBulanNumber+1,$tahun,20,$bulanNumber+1,$tahun,$projectNickName);
    }
    $pegawais = $this->getPegawaiAndKlasifikasiByProjectNickName($projectNickName);
    $lastDayLastMonth = $this->getNumberOfDaysInMonth($bulanNumber,$tahun);
    $bulanArray = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");

    for ($x = 21; $x <= $lastDayLastMonth; $x++) {
        array_push($tanggalArray, $x);
    };
    for ($x = 1; $x <= 20; $x++) {
        array_push($tanggalArray, $x);
    };
    $count["OFT"] = 0;
    $count["OFJ"] = 0;
    $count["ORC"] = 0;
    $count["ORT"] = 0;
    $count["MVR"] = 0;
    $count["MTR"] = 0;
    $count["DK"] = 0;
    $count["CT"] = 0;
    $count["IZN"] = 0;
    $count["NA"] = 0;
    foreach($pegawais as $pegawai){
        foreach ($tanggalArray as $x) {
            if($x >20 && $x<=$lastDayLastMonth){
                if($bulanNumber == 0){
                    $tahunLalu = $tahun - 1;
                }else{
                    $tahunLalu = $tahun;
                }
                $thisDate = $tahunLalu."-".($lastBulanNumber+1)."-".($x);
            }else{
                $thisDate = $tahun."-".($bulanNumber+1)."-".($x);
            }
                
            $overRideArray = $this->OverrideAbsensi_model->getOverrideStatusByDateAndNoPekerja($thisDate,$pegawai["no_pekerja"]);
            $numOfWeekWorking = $this->weekDifference($pegawai["tgl_masuk"],$thisDate,'%a');

            if(strtotime($pegawai["tgl_masuk"]) > strtotime($thisDate)){
                $count["NA"] += 1;
            }else{
                if ( $pegawai["roster"] == 21 ){
                    if(count($overRideArray) > 0){
                        $count[$overRideArray[0]["status"]] += 1;
                    }else{
                        if(($numOfWeekWorking - 2) % 3 == 0){
                            $count["OFT"] += 1;                
                        }else{
                            if($this->getCountAbsenByNoPekAndTanggal($pegawai["no_pekerja"],$thisDate)){
                                if(count($projectStatuses) > 0){
                                    foreach($projectStatuses as $projectStatus){
                                        if(strtotime($projectStatus["start_date"]) <=  strtotime($thisDate) && strtotime($projectStatus["end_date"]) >= strtotime($thisDate)){
                                            $count[$projectStatus["project_status"]] += 1;
                                        }
                                    }
                                }else{
                                    $count["NA"] += 1;
                                }
                            }else{
                                $count["OFT"] += 1;   
                            }
                        }

                    }
                }
                elseif($pegawai["roster"] == 42){
                    if(count($overRideArray) > 0){
                        $count[$overRideArray[0]["status"]] += 1;
                    }else{
                        if($numOfWeekWorking&1){
                            if(($numOfWeekWorking - 5) % 6 == 0){
                                $count["OFT"] += 1;             
                            }else{
                                if($this->getCountAbsenByNoPekAndTanggal($pegawai["no_pekerja"],$thisDate)){
                                    if(count($projectStatuses) > 0){
                                        foreach($projectStatuses as $projectStatus){
                                            if(strtotime($projectStatus["start_date"]) <=  strtotime($thisDate) && strtotime($projectStatus["end_date"]) >= strtotime($thisDate)){
                                                $count[$projectStatus["project_status"]] += 1;
                                            }
                                        }
                                    }else{
                                        $count["NA"] += 1;
                                    }
                                }else{
                                    $count["OFT"] += 1;
                                }
                            }
                        }
                        else{
                            if(($numOfWeekWorking - 4) % 6 == 0){
                                    $count["OFT"] += 1;                 
                            }else{
                                if($this->getCountAbsenByNoPekAndTanggal($pegawai["no_pekerja"],$thisDate)){
                                    if(count($projectStatuses) > 0){
                                        foreach($projectStatuses as $projectStatus){
                                            if(strtotime($projectStatus["start_date"]) <=  strtotime($thisDate) && strtotime($projectStatus["end_date"]) >= strtotime($thisDate)){
                                                $count[$projectStatus["project_status"]] += 1;
                                            }
                                        }
                                    }else{
                                        $count["NA"] += 1;
                                    }
                                }else{
                                    $count["OFT"] += 1;
                                }
                                
                            }
                        }
                    }
                }
            }
        }
    };
    return $count;
  }

  public function weekDifference($date_1 , $date_2 , $differenceFormat = '%a' )
  {
      $datetime1 = date_create($date_1);
      
      if(date('w', strtotime($date_1)) == 0){
        $datetime1->modify('+1 day');
      }
      
      if(date('w', strtotime($date_1)) > 1){
        $datetime1->modify('+'.(8 - date('w', strtotime($date_1))).' day');
      }
      $datetime2 = date_create($date_2);
    
      $interval = date_diff($datetime1, $datetime2);
    
      return floor(($interval->format($differenceFormat))/7);
    
  }

  public function getNumberOfDaysInMonth($month, $year) {
    $date = $year."-".$month."-1";
    return date("t", strtotime($date));
  }

 public function getCountAbsenByNoPekAndTanggal($no_pekerja, $tanggal)
 {
    $result = $this->db->select('id')
                ->from('absen')
                ->where('no_pekerja',$no_pekerja)
                ->where('date(created_at)',$tanggal)
                ->get()->num_rows(); 
    
    return $result;
 }
 public function deleteLokasi($id)
 {
     return $this->db->delete('lokasi', array("lokasi_id" => $id));
 }
}