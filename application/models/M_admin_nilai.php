<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_admin_nilai extends CI_Model {
  // Fungsi untuk menampilkan semua data
  public function view() {
	$this->db->select('*');
	$this->db->from('tbl_admin_nilai');
	$this->db->join('tbl_admin_matakuliah_users','tbl_admin_matakuliah_users.matakuliah_users_id=tbl_admin_nilai.matakuliah_users_id');
	$this->db->join('tbl_users','tbl_users.user_id=tbl_admin_matakuliah_users.user_id');
	$this->db->join('tbl_admin_matakuliah','tbl_admin_matakuliah_users.matakuliah_id=tbl_admin_matakuliah.matakuliah_id');
	$query = $this->db->get();
	return $query->result();
  }
  
  // Fungsi untuk menampilkan data berdasarkan ID nya
  public function view_by($nilai_id){
	$this->db->select('*');
	$this->db->join('tbl_admin_matakuliah_users','tbl_admin_matakuliah_users.matakuliah_users_id=tbl_admin_nilai.matakuliah_users_id');
	$this->db->join('tbl_users','tbl_users.user_id=tbl_admin_matakuliah_users.user_id');
	$this->db->join('tbl_admin_matakuliah','tbl_admin_matakuliah_users.matakuliah_id=tbl_admin_matakuliah.matakuliah_id');
    $this->db->where('nilai_id', $nilai_id);
    return $this->db->get('tbl_admin_nilai')->row();
  }

  
  // Fungsi untuk melakukan simpan data ke tabel users
  public function add(){
    $data = array(
      "matakuliah_users_id" => $this->input->post('matakuliah_users_id'),
      "nilai_angka" => $this->input->post('nilai_angka'),
      "nilai_pertemuan" => $this->input->post('nilai_pertemuan'),
      "nilai_creator" => $this->session->userdata('nim')
    );
    
    $this->db->insert('tbl_admin_nilai', $data); // Untuk mengeksekusi perintah insert data
  }
  
  // Fungsi untuk melakukan ubah data berdasarkan ID 
  public function edit($nilai_id){
    $data = array(
      "nilai_angka" => $this->input->post('nilai_angka'),
      "nilai_pertemuan" => $this->input->post('nilai_pertemuan'),
	  "nilai_updater" => $this->session->userdata('nim')
    );
    
    $this->db->where('nilai_id', $nilai_id);
    $this->db->update('tbl_admin_nilai', $data); // Untuk mengeksekusi perintah update data
  }
  
  // Fungsi untuk melakukan menghapus data berdasarkan nim siswa
  public function hapus($nilai_id){
    $this->db->where('nilai_id', $nilai_id);
    $this->db->delete('tbl_admin_nilai'); // Untuk mengeksekusi perintah delete data
  }
}