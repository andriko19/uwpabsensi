<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {

	public function register($data)
	{
		$this->db->insert('users', $data);
	}

  function getKaryawanById($nik){
    return $this->db->get_where('data_karyawan', ['nik' => $nik])->row_array();
  }

	function cek_nik($nik){
    $query_str = "SELECT * FROM data_karyawan WHERE nik= ? ";
    $result = $this->db->query($query_str, array($nik));
    if ($result->num_rows()==1){
      return $result->row(0)->nik;
    }
    else{
      return false;
    }
  }

  function kar_abs_msk($nik){
   	$query_str = "SELECT * FROM data_karyawan WHERE nik= ? ";
    $result = $this->db->query($query_str,array($nik));
    if ($result->num_rows()==1) {
      $tgl=date('Y-m-d');
      $jam_msk=date('H:i:s');
      $ket = 'Hadir';
      $status = 'Masuk';
      $data=array(
        'nik' =>$nik,
        'tgl' => $tgl,
        'jam_masuk' => $jam_msk,
        'keterangan'=> $ket,
        'status' => $status
      );
      $this->db->insert('records_kehadiran',$data);
      return $result->row(0)->nik;
    } else {
      return false;
  	}
	}

	function kar_abs_klr($nik,$tgl){
   	$query_str = "SELECT * FROM records_kehadiran WHERE nik= ? AND tgl= ? ";
    $result = $this->db->query($query_str,array($nik,$tgl));
    if ($result->num_rows()==1) {
    $jam_klr=date('H:i:s');
    $status = 'Pulang';
    $data=array(
      'nik' =>$nik,
      'jam_keluar' => $jam_klr,
      'status' => $status,
    );
    $this->db->where('nik',$nik);
    $this->db->where('tgl',$tgl);
    $this->db->update('records_kehadiran',$data);
    return $result->row(0)->nik;
    } else {
      return false;
    }
	}

	function cek_set($nik,$tgl){
   	$query_str = "SELECT * FROM records_kehadiran WHERE nik= ? AND tgl= ? ";
    $result = $this->db->query($query_str,array($nik,$tgl));
    if ($result->num_rows()==1) {
    return $result->row(0)->jam_masuk;
    } else {
      return false;
    }
	}

}