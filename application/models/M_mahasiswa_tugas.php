<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_mahasiswa_tugas extends CI_Model {
  // Fungsi untuk menampilkan data berdasarkan ID nya
  public function view(){
	$user_id = $this->session->userdata('userid');
	$this->db->select('*');
	$this->db->from('tbl_admin_matakuliah');
	$this->db->join('tbl_admin_matakuliah_users','tbl_admin_matakuliah.matakuliah_id=tbl_admin_matakuliah_users.matakuliah_id');
	$this->db->join('tbl_users','tbl_users.user_id=tbl_admin_matakuliah_users.user_id');
	$this->db->join('tbl_admin_tugas','tbl_admin_tugas.matakuliah_id=tbl_admin_matakuliah_users.matakuliah_id');
    $this->db->where('tbl_users.user_id', $user_id);
    $this->db->group_by('tbl_admin_tugas.matakuliah_id'); 
	$query = $this->db->get();
	return $query->result();
  }
  public function viewmatakuliah(){
	$getmatakuliah = $this->uri->segment(3);
	$this->db->select('*');
	$this->db->from('tbl_admin_matakuliah');
	$this->db->where('matakuliah_id', $getmatakuliah);
	$query = $this->db->get();
	return $query->result();
  }
  public function tugas(){
	$getmatakuliah = $this->uri->segment(3);
	$getpertemuan = $this->uri->segment(4);
	$this->db->select('*');
	$this->db->from('tbl_admin_tugas');
	$array = array('matakuliah_id' => $getmatakuliah, 'tugas_pertemuan' => $getpertemuan);
	$this->db->where($array); 
	$query = $this->db->get();
	return $query->result();
  }
  public function jumlahtugas($matakuliah_id){
    $this->db->select('max(tugas_pertemuan) as jumlahtugas');
	$this->db->from('tbl_admin_tugas');
	$this->db->where('tbl_admin_tugas.matakuliah_id', $matakuliah_id);
	$query = $this->db->get();
	return $query->result();
  }
  
}