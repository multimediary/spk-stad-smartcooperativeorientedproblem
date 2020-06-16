<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_admin_laporan extends CI_Model {
  // Fungsi untuk menampilkan semua data tabel users
  
  
  public function laporan($matakuliah_id){
    $this->db->select('*');
	$this->db->from('tbl_users');
	$this->db->join('tbl_admin_matakuliah_users','tbl_users.user_id=tbl_admin_matakuliah_users.user_id');
	$this->db->join('tbl_mahasiswa_nilai','tbl_users.user_id=tbl_mahasiswa_nilai.user_id');
	//Associative array method:
	$array = array('tbl_admin_matakuliah_users.matakuliah_id' => $matakuliah_id, 'tbl_mahasiswa_nilai.matakuliah_id' => $matakuliah_id);
	$this->db->where($array); 
	$query = $this->db->get();
	return $query->result();
  }
  
  public function jumlahmahasiswamatakuliah($matakuliah_id){
    $this->db->select('count(*) as jumlahmahasiswamatakuliah');
	$this->db->from('tbl_users');
	$this->db->join('tbl_admin_matakuliah_users','tbl_users.user_id=tbl_admin_matakuliah_users.user_id');
	$this->db->join('tbl_mahasiswa_nilai','tbl_users.user_id=tbl_mahasiswa_nilai.user_id');
	//Associative array method:
	$array = array('tbl_admin_matakuliah_users.matakuliah_id' => $matakuliah_id, 'tbl_mahasiswa_nilai.matakuliah_id' => $matakuliah_id);
	$this->db->where($array); 
	$query = $this->db->get();
	return $query->result();
  }
  
  public function jumlahpertemuanmatakuliah($matakuliah_id){
    $this->db->select('max(nilai_pertemuan) as jumlahpertemuanmatakuliah');
	$this->db->from('tbl_admin_nilai');
	$this->db->join('tbl_admin_matakuliah_users','tbl_admin_nilai.matakuliah_users_id=tbl_admin_matakuliah_users.matakuliah_users_id');
	$array = array('tbl_admin_matakuliah_users.matakuliah_id' => $matakuliah_id);
	$this->db->where($array); 
	$query = $this->db->get();
	return $query->result();
  }
  
  
}