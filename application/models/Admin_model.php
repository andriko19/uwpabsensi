<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function user($user)
	{
		return $this->db->get_where('users', ['username' => $user])->row_array();
	}

	public function getDepartemen()
	{
		return $this->db->get('data_departemen')->result_array();
	}

	public function getDataByIdDepartemen($id_departemen)
	{
		return $this->db->get_where('data_departemen', ['id_departemen' => $id_departemen])->row_array();
	}

	public function tambahDepartemen()
	{
		$data = [
  		'nama_departemen'		=> htmlspecialchars($this->input->post('nama_departemen', true)),
			'created_at'				=> date('Y-m-d'),
		];

		$this->db->insert('data_departemen',$data);
	}

	public function ubahDepartemen()
	{
		$id_departemen = htmlspecialchars($this->input->post('id_departemen', true));

		$data = [
  		'nama_departemen'		=> htmlspecialchars($this->input->post('nama_departemen', true)),
  		// 'created_at'				=> date('Y-m-d'),
		];

		$this->db->where('id_departemen',$id_departemen);
  	$this->db->update('data_departemen', $data);
	}	

	public function hapusDepartemen($id_departemen)
	{
		$this->db->where('id_departemen', $id_departemen);
		return $this->db->delete('data_departemen');
	}

	public function getKaryawan()
	{
		return $this->db->get('data_karyawan')->result_array();
	}

	public function tambahKaryawan($kirim)
	{
		$this->db->insert('data_karyawan', $kirim);
	}

	public function getDataByIdKaryawan($id_karyawan)
	{
		$this->db->where('id_karyawan', $id_karyawan);
		return $this->db->get('data_karyawan');
	}

	public function editKaryawan($upload_file, $where)
	{
		$this->db->where($where);
		$this->db->update('data_karyawan', $upload_file);
		return TRUE;
	}

	public function hapusKaryawan($id_karyawan)
	{
		$this->db->where('id_karyawan', $id_karyawan);
		return $this->db->delete('data_karyawan');
	}

	public function getRecordsKehadiran()
	{
		$this->db->order_by('id_records_kehadiran', 'DESC');
		return $this->db->from('data_karyawan')
									  ->join('records_kehadiran', 'records_kehadiran.nik=data_karyawan.nik')
									  ->get()
									  ->result_array();
	}

	function search_blog($title)
	{
    $this->db->like('nik', $title , 'both');
    $this->db->order_by('nik', 'asc');
    $this->db->limit(5);
    return $this->db->get('data_karyawan')->result();
  }

  public function tambahRecordsKehadiran()
  {
  	$data = [
  		'nik'				=>  htmlspecialchars($this->input->post('nik', true)),
			'tgl'				=>	htmlspecialchars($this->input->post('tanggal', true)),
			'jam_masuk'	=> '',
			'jam_keluar'=> '',
			'keterangan'=> htmlspecialchars($this->input->post('keterangan', true)),
			'status'		=> '',
		];

		$this->db->insert('records_kehadiran',$data);
  }

  public function tampilkanLaporanTgl($tanggalAwal, $tanggalAkhir)
  {
  	$query = $this->db->query("SELECT * from records_kehadiran r JOIN data_karyawan d ON r.nik = d.nik WHERE r.tgl BETWEEN '$tanggalAwal' AND '$tanggalAkhir' ORDER BY d.nama_karyawan ASC, r.tgl ASC");
  	return $query->result_array();
  }

  public function tampilkanLaporanDepar($tanggalAwal, $tanggalAkhir, $departemen)
  {
  	$query = $this->db->query("SELECT * from records_kehadiran r JOIN data_karyawan d ON r.nik = d.nik WHERE d.departemen = '$departemen' AND r.tgl BETWEEN '$tanggalAwal' AND '$tanggalAkhir' ORDER BY d.nama_karyawan ASC, r.tgl ASC");
  	return $query->result_array();
  }

  public function tampilkanLaporanNama($tanggalAwal, $tanggalAkhir, $departemen, $nama_karyawan)
  {
  	$query = $this->db->query("SELECT * from records_kehadiran r JOIN data_karyawan d ON r.nik = d.nik WHERE d.nama_karyawan = '$nama_karyawan' AND d.departemen = '$departemen' AND r.tgl BETWEEN '$tanggalAwal' AND '$tanggalAkhir' ORDER BY d.nama_karyawan ASC, r.tgl ASC");
  	return $query->result_array();
  }

  public function cetakLaporan($tanggalAwal, $tanggalAkhir)
  {
  	$query = $this->db->query("SELECT * from records_kehadiran r JOIN data_karyawan d ON r.nik = d.nik WHERE r.tgl BETWEEN '$tanggalAwal' and '$tanggalAkhir' ORDER BY d.nama_karyawan ASC, r.tgl ASC");
  	return $query->result_array();
  }

   public function tampilkanLaporanKalTgl($tanggalAwal, $tanggalAkhir, $hadir='Hadir')
  {
  	$query = $this->db->query("SELECT * from records_kehadiran r JOIN data_karyawan d ON r.nik = d.nik WHERE r.tgl BETWEEN '$tanggalAwal' AND '$tanggalAkhir' ORDER BY d.nama_karyawan ASC, r.tgl ASC");
  	return $query->result_array();
  }

  function search_nama_karyawan($title)
	{
    $this->db->like('nama_karyawan', $title , 'both');
    $this->db->order_by('nama_karyawan', 'asc');
    $this->db->limit(5);
    return $this->db->get('data_karyawan')->result();
  }

  public function hitungJumlahKaryawan()
	{
    $query = $this->db->get('data_karyawan');
    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
	}

	public function hitungJumlahUsers()
	{
    $query = $this->db->get('users');
    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
	}

	public function hitungJumlahKaryawanMasuk($tgl)
	{
		$query = $this->db->get_where('records_kehadiran', ['tgl' => $tgl]);

    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
	}

	function getTahun()
	{
		$query = $this->db->query("SELECT YEAR(tgl) AS tahun FROM records_kehadiran GROUP BY YEAR(tgl) ORDER BY YEAR(tgl) ASC");

		return $query->result();
	}

	public function hapusBulanRecords($bulan, $tahun)
	{
		$query = $this->db->query("DELETE FROM records_kehadiran WHERE MONTH(tgl) = '$bulan' and YEAR(tgl) = '$tahun'");
	}

	public function hapusTahunRecords($tahun)
	{
		$query = $this->db->query("DELETE FROM records_kehadiran WHERE YEAR(tgl) = '$tahun'");
	}


}