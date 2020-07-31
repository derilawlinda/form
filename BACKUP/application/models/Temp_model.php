<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Temp_model extends CI_Model
{
    private $_table = "temp_form";
    private $_valid = "pekerja";

    public $id;
    public $no_pekerja;
    public $email_kantor;
    public $nama_pekerja;
    public $tgl_masuk;
    public $tempat_lahir;
    public $tgl_lahir;
    public $departemen;
    public $jabatan;
    public $project;
    public $no_pkwt;
    public $area;
    public $alamat;
    public $provinsi;
    public $kota;
    public $telepon;
    public $handphone;
    public $email_pribadi;
    public $no_ktp;
    public $no_kontrak_project;
    public $project_nickname;
    public $lokasi_kerja;
    public $fungsi;
    public $department;
    public $id_pos;
    public $pt_pdc_sk_028a_pdc1000_2019_s0;
    public $image;
    public $status;
    public $userid;
    public $fingerprintid;
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
    
    public function getByConfirmed()
    {
        return $this->db->get_where($this->_valid, ["status" => 'Confirmed'])->result();
    }
    public function getByNopek($id)
    {
        // return $this->db->join('temp_form', 'pekeja.no_pekerja = temp_form.no_pekerja');
        return $this->db->get_where($this->_valid, ["no_pekerja" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id = uniqid();
        // $this->id = $post["id"];
        $this->no_pekerja = $post["no_pekerja"];
        $this->email_kantor = $post["email_kantor"];
        $this->nama_pekerja = $post["nama_pekerja"];
        $this->tgl_masuk = $post["tgl_masuk"];
        $this->tempat_lahir = $post["tempat_lahir"];
        $this->tgl_lahir = $post["tgl_lahir"];
        $this->departemen = $post["departemen"];
        $this->jabatan = $post["jabatan"];
        $this->project = $post["project"];
        $this->no_pkwt = $post["no_pkwt"];
        $this->area = $post["area"];
        $this->alamat = $post["alamat"];
        $this->provinsi = $post["provinsi"];
        $this->kota = $post["kota"];
        $this->telepon = $post["telepon"];
        $this->handphone = $post["handphone"];
        $this->email_pribadi = $post["email_pribadi"];
        $this->no_ktp = $post["no_ktp"];
        $this->no_kontrak_project = $post["no_kontrak_project"];
        $this->project_nickname = $post["project_nickname"];
        $this->lokasi_kerja = $post["lokasi_kerja"];
        $this->fungsi = $post["fungsi"];
        $this->department = $post["department"];
        $this->id_pos = $post["id_pos"];
        $this->pt_pdc_sk_028a_pdc1000_2019_s0 = $post["pt_pdc_sk_028a_pdc1000_2019_s0"];
        $this->image = $this->_uploadImage();
        $this->status = "Requested";
        $this->userid = $post["userid"];
        $this->fingerprintid = $post["fingerprintid"];
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
        $this->id = $post["id"];
         $this->no_pekerja = $post["no_pekerja"];
        $this->email_kantor = $post["email_kantor"];
        $this->nama_pekerja = $post["nama_pekerja"];
        $this->tgl_masuk = $post["tgl_masuk"];
        $this->tempat_lahir = $post["tempat_lahir"];
        $this->tgl_lahir = $post["tgl_lahir"];
        $this->departemen = $post["departemen"];
        $this->jabatan = $post["jabatan"];
        $this->project = $post["project"];
        $this->no_pkwt = $post["no_pkwt"];
        $this->area = $post["area"];
        $this->alamat = $post["alamat"];
        $this->provinsi = $post["provinsi"];
        $this->kota = $post["kota"];
        $this->telepon = $post["telepon"];
        $this->handphone = $post["handphone"];
        $this->email_pribadi = $post["email_pribadi"];
        $this->no_ktp = $post["no_ktp"];
        $this->no_kontrak_project = $post["no_kontrak_project"];
        $this->project_nickname = $post["project_nickname"];
        $this->lokasi_kerja = $post["lokasi_kerja"];
        $this->fungsi = $post["fungsi"];
        $this->department = $post["department"];
        $this->id_pos = $post["id_pos"];
        $this->pt_pdc_sk_028a_pdc1000_2019_s0 = $post["pt_pdc_sk_028a_pdc1000_2019_s0"];
        if (!empty($_FILES["image"])) {
            $this->image = $this->_uploadImage();
        } else {
            $this->image = $post["old_image"];
        }
        $this->status = "Confirmed";
        $this->userid = $post["userid"];
        $this->fingerprintid = $post["fingerprintid"];
        
        $this->load->helper('date');
        date_default_timezone_set('Asia/Jakarta');
        $datestring = '%Y-%m-%d %h:%i:%s';
        $time = time();
        $this->created_at = mdate($datestring, $time);
        
       return $this->db->update($this->_valid, $this, array('no_pekerja' => $post['no_pekerja']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }
    
    private function _uploadImage()
    {
        $config['upload_path']          = './upload/foto/';
        $config['allowed_types']        = 'gif|jpg|png';
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        $randomString .= $characters[rand(0, $charactersLength - 1)];
        $config['file_name']            = $this->no_pekerja;
        $config['overwrite']			= true;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;
    
        $this->load->library('upload', $config);
    
        if ($this->upload->do_upload('image')) {
            return $this->upload->data("file_name");
        }
        
        // print_r($this->upload->display_errors());
        
        return "default.png";
    }
}