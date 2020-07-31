<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Rekapabsen_model extends CI_Model
{
    private $_table = "temp_rekapabsen";
    private $_valid = "rekap_absensi";
    private $_import = "temp_rekapabsen";

    public $no;
    public $nip;
    public $nama;
    public $bulan;
    public $tahun;
    public $hari_kerja;
    public $masuk;
    public $cuti;
    public $izin;
    public $sakit;
    public $alfa;
    public $total_jam_lembur;
    public $total_lembur_konversi;
    public $keterangan;
    public $KG111;
    public $KG104;
    public $KG045;
    public $KG044;
    public $KG037;
    public $KG050;
    public $KG042;
    public $KG067;
    public $KG091;
    public $KG068;
    public $KG108;
    public $KG109;
    public $KG073;
    public $KG114;
    public $KG118;
    public $KG105;
    public $KG106;
    public $KG107;
    public $KG122;
    public $KG039;
    public $KG038;
    public $KG119;
    public $KG043;
    public $KG074;
    public $KG112;
    public $KG113;
    public $KG062;
    public $KG094;
    public $KG034;
    public $KG046;
    public $KG072;
    public $KG092;
    public $KG070;
    public $KG064;
    public $KG095;
    public $KG071;
    public $KG061;
    public $KG093;
    public $KG117;
    public $KG103;
    public $KG031;
    public $KG090;
    public $KG110;
    public $KG058;
    public $KG083;
    public $KG115;
    public $KG116;
    public $KG082;
    public $KG033;
    public $KG057;
    public $KG120;
    public $KG035;
    public $KG036;
    public $KG089;
    public $KG069;
    public $KG052;
    public $KG065;
    public $KG066;
    public $KG096;
    public $KG003;
    public $KG049;
    public $KG047;
    public $KG048;
    public $status;
    public $created_at;

    public function rules()
    {
        return [
            ['field' => 'nip',
            'label' => 'nip',
            'rules' => 'required'],
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    public function getAllImported()
    {
        return $this->db->get_where($this->_import, ["status" => 'Requested'])->result();
    }
    public function getByIdImport($no)
    {
        return $this->db->get_where($this->_import, ["nip" => $no])->row();
    }
    
    public function getById($no)
    {
        return $this->db->get_where($this->_table, ["no" => $no])->row();
    }
    public function getByIdConfirm($no)
    {
        return $this->db->get_where($this->_valid, ["no" => $no])->row();
    }
    
    public function getByConfirmed()
    {
        return $this->db->get_where($this->_valid, ["status" => 'Confirmed'])->result();
    }
    public function getByRequested()
    {
        return $this->db->get_where($this->_table, ["status" => 'Requested'])->result();
    }
    public function getByNopek($no)
    {
        return $this->db->get_where($this->_valid, ["nip" => $no])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->no = uniqid();
        // $this->id = $post["id"];
        $this->nip = $post["nip"];
        $this->nama = $post["nama"];
        $this->bulan = $post["bulan"];
        $this->tahun = $post["tahun"];
        $this->hari_kerja = $post["hari_kerja"];
        $this->masuk = $post["masuk"];
        $this->cuti = $post["cuti"];
        $this->izin = $post["izin"];
        $this->sakit = $post["sakit"];
        $this->alfa = $post["alfa"];
        $this->total_jam_lembur = $post["total_jam_lembur"];
        $this->total_lembur_konversi = $post["total_lembur_konversi"];
        $this->keterangan = $post["keterangan"];
        $this->KG111= $post["KG111"];
        $this->KG104= $post["KG104"];
        $this->KG045= $post["KG045"];
        $this->KG044= $post["KG044"];
        $this->KG037= $post["KG037"];
        $this->KG050= $post["KG050"];
        $this->KG042= $post["KG042"];
        $this->KG067= $post["KG067"];
        $this->KG091= $post["KG091"];
        $this->KG068= $post["KG068"];
        $this->KG108= $post["KG108"];
        $this->KG109= $post["KG109"];
        $this->KG073= $post["KG073"];
        $this->KG114= $post["KG114"];
        $this->KG118= $post["KG118"];
        $this->KG105= $post["KG105"];
        $this->KG106= $post["KG106"];
        $this->KG107= $post["KG107"];
        $this->KG122= $post["KG122"];
        $this->KG039= $post["KG039"];
        $this->KG038= $post["KG038"];
        $this->KG119= $post["KG119"];
        $this->KG043= $post["KG043"];
        $this->KG074= $post["KG074"];
        $this->KG112= $post["KG112"];
        $this->KG113= $post["KG113"];
        $this->KG062= $post["KG062"];
        $this->KG094= $post["KG094"];
        $this->KG034= $post["KG034"];
        $this->KG046= $post["KG046"];
        $this->KG072= $post["KG072"];
        $this->KG092= $post["KG092"];
        $this->KG070= $post["KG070"];
        $this->KG064= $post["KG064"];
        $this->KG095= $post["KG095"];
        $this->KG071= $post["KG071"];
        $this->KG061= $post["KG061"];
        $this->KG093= $post["KG093"];
        $this->KG117= $post["KG117"];
        $this->KG103= $post["KG103"];
        $this->KG031= $post["KG031"];
        $this->KG090= $post["KG090"];
        $this->KG110= $post["KG110"];
        $this->KG058= $post["KG058"];
        $this->KG083= $post["KG083"];
        $this->KG115= $post["KG115"];
        $this->KG116= $post["KG116"];
        $this->KG082= $post["KG082"];
        $this->KG033= $post["KG033"];
        $this->KG057= $post["KG057"];
        $this->KG120= $post["KG120"];
        $this->KG035= $post["KG035"];
        $this->KG036= $post["KG036"];
        $this->KG089= $post["KG089"];
        $this->KG069= $post["KG069"];
        $this->KG052= $post["KG052"];
        $this->KG065= $post["KG065"];
        $this->KG066= $post["KG066"];
        $this->KG096= $post["KG096"];
        $this->KG003= $post["KG003"];
        $this->KG049= $post["KG049"];
        $this->KG047= $post["KG047"];
        $this->KG048= $post["KG048"];

        $this->status = "Requested";
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
        $this->no = $post["no"];
        $this->nip = $post["nip"];
        $this->nama = $post["nama"];
        $this->bulan = $post["bulan"];
        $this->tahun = $post["tahun"];
        $this->hari_kerja = $post["hari_kerja"];
        $this->masuk = $post["masuk"];
        $this->cuti = $post["cuti"];
        $this->izin = $post["izin"];
        $this->sakit = $post["sakit"];
        $this->alfa = $post["alfa"];
        $this->total_jam_lembur = $post["total_jam_lembur"];
        $this->total_lembur_konversi = $post["total_lembur_konversi"];
        $this->keterangan = $post["keterangan"];
        $this->KG111= $post["KG111"];
        $this->KG104= $post["KG104"];
        $this->KG045= $post["KG045"];
        $this->KG044= $post["KG044"];
        $this->KG037= $post["KG037"];
        $this->KG050= $post["KG050"];
        $this->KG042= $post["KG042"];
        $this->KG067= $post["KG067"];
        $this->KG091= $post["KG091"];
        $this->KG068= $post["KG068"];
        $this->KG108= $post["KG108"];
        $this->KG109= $post["KG109"];
        $this->KG073= $post["KG073"];
        $this->KG114= $post["KG114"];
        $this->KG118= $post["KG118"];
        $this->KG105= $post["KG105"];
        $this->KG106= $post["KG106"];
        $this->KG107= $post["KG107"];
        $this->KG122= $post["KG122"];
        $this->KG039= $post["KG039"];
        $this->KG038= $post["KG038"];
        $this->KG119= $post["KG119"];
        $this->KG043= $post["KG043"];
        $this->KG074= $post["KG074"];
        $this->KG112= $post["KG112"];
        $this->KG113= $post["KG113"];
        $this->KG062= $post["KG062"];
        $this->KG094= $post["KG094"];
        $this->KG034= $post["KG034"];
        $this->KG046= $post["KG046"];
        $this->KG072= $post["KG072"];
        $this->KG092= $post["KG092"];
        $this->KG070= $post["KG070"];
        $this->KG064= $post["KG064"];
        $this->KG095= $post["KG095"];
        $this->KG071= $post["KG071"];
        $this->KG061= $post["KG061"];
        $this->KG093= $post["KG093"];
        $this->KG117= $post["KG117"];
        $this->KG103= $post["KG103"];
        $this->KG031= $post["KG031"];
        $this->KG090= $post["KG090"];
        $this->KG110= $post["KG110"];
        $this->KG058= $post["KG058"];
        $this->KG083= $post["KG083"];
        $this->KG115= $post["KG115"];
        $this->KG116= $post["KG116"];
        $this->KG082= $post["KG082"];
        $this->KG033= $post["KG033"];
        $this->KG057= $post["KG057"];
        $this->KG120= $post["KG120"];
        $this->KG035= $post["KG035"];
        $this->KG036= $post["KG036"];
        $this->KG089= $post["KG089"];
        $this->KG069= $post["KG069"];
        $this->KG052= $post["KG052"];
        $this->KG065= $post["KG065"];
        $this->KG066= $post["KG066"];
        $this->KG096= $post["KG096"];
        $this->KG003= $post["KG003"];
        $this->KG049= $post["KG049"];
        $this->KG047= $post["KG047"];
        $this->KG048= $post["KG048"];

        $this->status = "Confirmed";
        $this->load->helper('date');
        date_default_timezone_set('Asia/Jakarta');
        $datestring = '%Y-%m-%d %h:%i:%s';
        $time = time();
        $this->created_at = mdate($datestring, $time);
        
        $this->db->delete($this->_table, array("no" => $post['no']));
        return $this->db->insert($this->_valid, $this);
    //    return $this->db->update($this->_valid, $this, array('nip' => $post['nip']));
    }

    public function reject($no)
    {
        $status = array('status' => 'Rejected');
        $this->db->where('no', $no);
        return $this->db->update($this->_table, $status); 
        // return $this->db->update($this->_table, $this, array("no" => $no));
    }

    public function delete($no)
    {
        return $this->db->delete($this->_table, array("no" => $no));
    }
}