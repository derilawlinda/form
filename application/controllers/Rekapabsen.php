<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekapabsen extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Absen_model");
        $this->load->helper('url');
        $this->load->model('User_model');
        $this->load->model('Rekapabsen_model');
        $this->load->library('form_validation');
        $this->load->model('UploadRekapAbsen_model');
        $this->load->library('Excel');
        $this->load->model("Login_model");
        $this->load->model("Projectschedule_model");
        $this->load->database('default');
        if($this->Login_model->isNotLogin()) redirect(site_url('admin/login'));

    }

public function index(){
        $temp = $this->Rekapabsen_model;
        $validation = $this->form_validation;
        $validation->set_rules($temp->rules());

        if ($validation->run()) {
            $temp->save();
            $this->session->set_flashdata('success', 'Data Berhasil Dikirim');
        }
        $this->load->view("admin/Absen/request.php");
}

  public function approve(){

    $data["temp_form"] = $this->Rekapabsen_model->getByRequested();
        $this->load->view("admin/Absen/requested", $data);
  }

  public function imported(){
        $data["temp_form"] = $this->Rekapabsen_model->getAllImported();
        $this->load->view("admin/Absen/requested", $data);
  }
  
  public function upload(){
      $this->load->view('admin/Absen/UploadRekapAbsen');
  }

  public function detail($no = null)
    {
        if (!isset($no)) redirect('Rekapabsen/approve');
       
        $Temp = $this->Rekapabsen_model;
        $validation = $this->form_validation;
        $validation->set_rules($Temp->rules());

        if ($validation->run()) {
            $Temp->update();
            $this->session->set_flashdata('success', 'Data berhasil di approve');
        }

        $data["temp_form"] = $Temp->getById($no);
        if ($validation->run() && !$data["temp_form"]){
            // $Temp->update();
            $this->session->set_flashdata('success', 'Data berhasil di approve');
            // redirect('Rekapabsen/approve');
        }
        $this->load->view("admin/Absen/detail", $data);
    }

  public function delete($no=null)
  {
      if (!isset($no)) show_404();
      
      if ($this->Rekapabsen_model->delete($no)) {
          redirect(site_url('Rekapabsen/approve'));
      }
  }

  public function reject($no=null)
  {
      if (!isset($no)) show_404();
      
      if ($this->Rekapabsen_model->reject($no)) {
          redirect(site_url('Rekapabsen/approve'));
      }
  }

  function fetch(){

    $data = $this->UploadRekapAbsen_model->select();

    $output = '

    <h3 align="center">Total Data - '.$data->num_rows().'</h3>

    <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
    <thead align="center">
     <tr>
      <th>NO</th>
      <th>NIP</th>
      <th>Nama</th>
     </tr>
    </thead>
    <tbody align="center">
    ';

    $x=0;
    foreach($data->result() as $row){

      $output .= '
      <tr>
      <td>'.++$x.'</td>
      <td>'.$row->nip.'</td>
      <td>'.$row->nama.'</td>
      </tr>
      ';

    }

    $output .= '
    </tbody></table>';

    echo $output;

  }

 

  function import(){

    if(isset($_FILES["file"]["name"])){

      $path = $_FILES["file"]["tmp_name"];

      $object = PHPExcel_IOFactory::load($path);

      foreach($object->getWorksheetIterator() as $worksheet){

        $highestRow = $worksheet->getHighestRow();

        $highestColumn = $worksheet->getHighestColumn();

        for($row=3; $row<=$highestRow; $row++){

           $no = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
           $nip = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
           $nama = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
           $bulan = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
           $tahun = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
           $hari_kerja = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
           $masuk = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
           $cuti = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
           $izin = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
           $sakit = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
           $alfa = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
           $total_jam_lembur = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
           $total_lembur_konversi = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
           $keterangan = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
           $KG111 = $worksheet->getCellByColumnAndRow(14, $row)->getValue();
           $KG104 = $worksheet->getCellByColumnAndRow(15, $row)->getValue();
           $KG045 = $worksheet->getCellByColumnAndRow(16, $row)->getValue();
           $KG044 = $worksheet->getCellByColumnAndRow(17, $row)->getValue();
           $KG037 = $worksheet->getCellByColumnAndRow(18, $row)->getValue();
           $KG050 = $worksheet->getCellByColumnAndRow(19, $row)->getValue();
           $KG042 = $worksheet->getCellByColumnAndRow(20, $row)->getValue();
           $KG067 = $worksheet->getCellByColumnAndRow(21, $row)->getValue();
           $KG091 = $worksheet->getCellByColumnAndRow(22, $row)->getValue();
           $KG068 = $worksheet->getCellByColumnAndRow(23, $row)->getValue();
           $KG108 = $worksheet->getCellByColumnAndRow(24, $row)->getValue();
           $KG109 = $worksheet->getCellByColumnAndRow(25, $row)->getValue();
           $KG073 = $worksheet->getCellByColumnAndRow(26, $row)->getValue();
           $KG114 = $worksheet->getCellByColumnAndRow(27, $row)->getValue();
           $KG118 = $worksheet->getCellByColumnAndRow(28, $row)->getValue();
           $KG105 = $worksheet->getCellByColumnAndRow(29, $row)->getValue();
           $KG106 = $worksheet->getCellByColumnAndRow(30, $row)->getValue();
           $KG107 = $worksheet->getCellByColumnAndRow(31, $row)->getValue();
           $KG122 = $worksheet->getCellByColumnAndRow(32, $row)->getValue();
           $KG039 = $worksheet->getCellByColumnAndRow(33, $row)->getValue();
           $KG038 = $worksheet->getCellByColumnAndRow(34, $row)->getValue();
           $KG119 = $worksheet->getCellByColumnAndRow(35, $row)->getValue();
           $KG043 = $worksheet->getCellByColumnAndRow(36, $row)->getValue();
           $KG074 = $worksheet->getCellByColumnAndRow(37, $row)->getValue();
           $KG112 = $worksheet->getCellByColumnAndRow(38, $row)->getValue();
           $KG113 = $worksheet->getCellByColumnAndRow(39, $row)->getValue();
           $KG062 = $worksheet->getCellByColumnAndRow(40, $row)->getValue();
           $KG094 = $worksheet->getCellByColumnAndRow(41, $row)->getValue();
           $KG034 = $worksheet->getCellByColumnAndRow(42, $row)->getValue();
           $KG046 = $worksheet->getCellByColumnAndRow(43, $row)->getValue();
           $KG072 = $worksheet->getCellByColumnAndRow(44, $row)->getValue();
           $KG092 = $worksheet->getCellByColumnAndRow(45, $row)->getValue();
           $KG070 = $worksheet->getCellByColumnAndRow(46, $row)->getValue();
           $KG064 = $worksheet->getCellByColumnAndRow(47, $row)->getValue();
           $KG095 = $worksheet->getCellByColumnAndRow(48, $row)->getValue();
           $KG071 = $worksheet->getCellByColumnAndRow(49, $row)->getValue();
           $KG061 = $worksheet->getCellByColumnAndRow(50, $row)->getValue();
           $KG093 = $worksheet->getCellByColumnAndRow(51, $row)->getValue();
           $KG117 = $worksheet->getCellByColumnAndRow(52, $row)->getValue();
           $KG103 = $worksheet->getCellByColumnAndRow(53, $row)->getValue();
           $KG031 = $worksheet->getCellByColumnAndRow(54, $row)->getValue();
           $KG090 = $worksheet->getCellByColumnAndRow(55, $row)->getValue();
           $KG110 = $worksheet->getCellByColumnAndRow(56, $row)->getValue();
           $KG058 = $worksheet->getCellByColumnAndRow(57, $row)->getValue();
           $KG083 = $worksheet->getCellByColumnAndRow(58, $row)->getValue();
           $KG115 = $worksheet->getCellByColumnAndRow(59, $row)->getValue();
           $KG116 = $worksheet->getCellByColumnAndRow(60, $row)->getValue();
           $KG082 = $worksheet->getCellByColumnAndRow(61, $row)->getValue();
           $KG033 = $worksheet->getCellByColumnAndRow(62, $row)->getValue();
           $KG057 = $worksheet->getCellByColumnAndRow(63, $row)->getValue();
           $KG120 = $worksheet->getCellByColumnAndRow(64, $row)->getValue();
           $KG035 = $worksheet->getCellByColumnAndRow(65, $row)->getValue();
           $KG036 = $worksheet->getCellByColumnAndRow(66, $row)->getValue();
           $KG089 = $worksheet->getCellByColumnAndRow(67, $row)->getValue();
           $KG069 = $worksheet->getCellByColumnAndRow(68, $row)->getValue();
           $KG052 = $worksheet->getCellByColumnAndRow(69, $row)->getValue();
           $KG065 = $worksheet->getCellByColumnAndRow(70, $row)->getValue();
           $KG066 = $worksheet->getCellByColumnAndRow(71, $row)->getValue();
           $KG096 = $worksheet->getCellByColumnAndRow(72, $row)->getValue();
           $KG003 = $worksheet->getCellByColumnAndRow(73, $row)->getValue();
           $KG049 = $worksheet->getCellByColumnAndRow(74, $row)->getValue();
           $KG047 = $worksheet->getCellByColumnAndRow(75, $row)->getValue();
           $KG048 = $worksheet->getCellByColumnAndRow(76, $row)->getValue();
            $this->load->helper('date');
            date_default_timezone_set('Asia/Jakarta');
            $datestring = '%Y-%m-%d %h:%i:%s';
            $time = time();
            $created_at = mdate($datestring, $time);


           $data[] = array(

            'no' => uniqid($no),
            'nip'  => $nip,
            'nama'   => $nama,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'hari_kerja' => $hari_kerja,
            'masuk' => $masuk,
            'cuti' => $cuti,
            'izin' => $izin,
            'sakit' => $sakit,
            'alfa' => $alfa,
            'total_jam_lembur' => $total_jam_lembur,
            'total_lembur_konversi' => $total_lembur_konversi,
            'keterangan' => $keterangan,
            'KG111' => $KG111,
            'KG104' => $KG104,
            'KG045' => $KG045,
            'KG044' => $KG044,
            'KG037' => $KG037,
            'KG050' => $KG050,
            'KG042' => $KG042,
            'KG067' => $KG067,
            'KG091' => $KG091,
            'KG068' => $KG068,
            'KG108' => $KG108,
            'KG109' => $KG109,
            'KG073' => $KG073,
            'KG114' => $KG114,
            'KG118' => $KG118,
            'KG105' => $KG105,
            'KG106' => $KG106,
            'KG107' => $KG107,
            'KG122' => $KG122,
            'KG039' => $KG039,
            'KG038' => $KG038,
            'KG119' => $KG119,
            'KG043' => $KG043,
            'KG074' => $KG074,
            'KG112' => $KG112,
            'KG113' => $KG113,
            'KG062' => $KG062,
            'KG094' => $KG094,
            'KG034' => $KG034,
            'KG046' => $KG046,
            'KG072' => $KG072,
            'KG092' => $KG092,
            'KG070' => $KG070,
            'KG064' => $KG064,
            'KG095' => $KG095,
            'KG071' => $KG071,
            'KG061' => $KG061,
            'KG093' => $KG093,
            'KG117' => $KG117,
            'KG103' => $KG103,
            'KG031' => $KG031,
            'KG090' => $KG090,
            'KG110' => $KG110,
            'KG058' => $KG058,
            'KG083' => $KG083,
            'KG115' => $KG115,
            'KG116' => $KG116,
            'KG082' => $KG082,
            'KG033' => $KG033,
            'KG057' => $KG057,
            'KG120' => $KG120,
            'KG035' => $KG035,
            'KG036' => $KG036,
            'KG089' => $KG089,
            'KG069' => $KG069,
            'KG052' => $KG052,
            'KG065' => $KG065,
            'KG066' => $KG066,
            'KG096' => $KG096,
            'KG003' => $KG003,
            'KG049' => $KG049,
            'KG047' => $KG047,
            'KG048' => $KG048,
            'status' => 'Requested',
            'created_at' => $created_at

           );

        }

      }

      $this->UploadRekapAbsen_model->insert($data);

      echo 'Data Imported successfully';

    }

  }

  public function tabelAbsensi(){

        $data["projects"] = $this->Absen_model->getDistinctProjectNickNames();
        $this->load->view("admin/Absen/tabelAbsensi", $data);
  }

  public function generateAbsensiTable(){

    $projectNickName = $this->input->get('project');
    $bulanNumber = $this->input->get('bulanNumber');
    $tahun = $this->input->get('tahun');
    $bulanArray = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
    $pegawais = $this->Absen_model->getPegawaiAndKlasifikasiByProjectNickName($projectNickName);
    $lastDayThisMonth = $this->getNumberOfDaysInMonth($bulanNumber+1,$tahun);


    $table = "<table border='1' class='table table-bordered table-responsive statistics' id='tabelAbsensi'>";
    $table .= "<tr>";
    $table .= "<td rowspan=2 style='background-color:gainsboro;vertical-align:middle;'> <strong> Nama </strong> </td>";
    $table .= "<td rowspan=2 style='background-color:gainsboro;vertical-align:middle;'> <strong> Klasifikasi </strong>  </td>";
    $table .= "<td style='background-color:gainsboro;text-align:center' colspan=".$lastDayThisMonth."><strong>".$bulanArray[$bulanNumber]." ".$tahun."</strong></td>";
    $table .= "</tr>";
    $table .= "<tr>";
    for ($x = 0; $x < $lastDayThisMonth; $x++) {
      $table .= "<td>".($x+1)."</td>";
    }
    $table .= "</tr>";

    foreach($pegawais as $pegawai)
      {
        $table .= "<tr>";
        $table .= "<td>".$pegawai["nama_pekerja"]."</td>";
        $table .= "<td>".$pegawai["jabatan"]."</td>";
        
        for ($x = 0; $x < $lastDayThisMonth; $x++) {
          $numOfWeekWorking = $this->weekDifference($pegawai["tgl_masuk"],$tahun."-".$bulanNumber."-".($x+1),'%a');
          if ( $pegawai["roster"] == 21 ){
            if(($numOfWeekWorking - 2) % 3 == 0){

              $table .= "<td data-fill-color='FFFF0000' style='background-color:red;'>OFF</td>";
            }else{
              $table .= "<td style='background-color:green;'>HDR</td>";
            }
            
          }elseif($pegawai["roster"] == 42){
            
            if($numOfWeekWorking&1){
              if(($numOfWeekWorking - 5) % 6 == 0){
                $table .= "<td data-fill-color='FFFF0000' style='background-color:red;'>OFF</td>";
              }else{
                $table .= "<td style='background-color:green;'>HDR</td>";
              }
            }else{
              if(($numOfWeekWorking - 4) % 6 == 0){
                $table .= "<td data-fill-color='FFFF0000' style='background-color:red;'>OFF</td>";
              }else{
                $table .= "<td style='background-color:green;'>HDR</td>";
              }
            }
          }
        }

        $table .= "</tr>";
          
      }
    
    $table .= "</table>";
    echo($table);
  }

  public function getNumberOfDaysInMonth($month, $year) {
    // Using first day of the month, it doesn't really matter
    $date = $year."-".$month."-1";
    return date("t", strtotime($date));
  }

  public function weekDifference($date_1 , $date_2 , $differenceFormat = '%a' )
  {
      $datetime1 = date_create($date_1);
      $datetime2 = date_create($date_2);
    
      $interval = date_diff($datetime1, $datetime2);
    
      return floor($interval->format($differenceFormat)/7);
      //return $datetime2->format('Y-m-d H:i:s');
    
  }

  public function projectSchedule(){

      $data["projects"] = $this->Absen_model->getDistinctProjectNickNames();
      $this->load->view("admin/Absen/projectSchedule", $data);
  }

  public function projectScheduleDetail(){

      $projectNickName = $this->input->get('project');
      $data["project_nickname"] = $projectNickName;
      $data["project_schedules"] = $this->Projectschedule_model->getProjectScheduleByProjectNickname($projectNickName);
      $this->load->view("admin/Absen/projectScheduleDetail", $data);
  }

  public function syncDatabase(){

    
    $projectNickName = $this->input->post('projectNickName');
    
    $array_database = $this->Projectschedule_model->getProjectScheduleArrayByProjectNickName($projectNickName);
    $array_client = json_decode($this->input->post('project_schedules'), true);

   
    //project_schedule update 
    $this->db->update_batch('project_schedule', $array_client,'id_project_schedule'); 

    
    //project_schedule insert
    $arrayToInsert = array_diff_key($array_client, $array_database);
    if(count($arrayToInsert)){
      foreach ($arrayToInsert as $key => $value) {
        unset($arrayToInsert[$key]['id_project_schedule']);
      };
      $this->db->insert_batch('project_schedule', $arrayToInsert); 
    }
    
    

    //project_schedule delete
    $arrayToDelete = array_diff_key($array_database, $array_client);
    $deleteWhere = array();
    if(count($arrayToDelete)){
      foreach ($arrayToDelete as $key => $value) {
        array_push($deleteWhere ,$key);
      }
      $this->db->where_in('id_project_schedule', $deleteWhere);
      $this->db->delete('project_schedule');
    }

    
    
    
  }



}