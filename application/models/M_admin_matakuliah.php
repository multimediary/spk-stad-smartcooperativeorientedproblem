<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_admin_matakuliah extends CI_Model {
  // Fungsi untuk menampilkan semua data tabel users
  public function view(){
    return $this->db->get('tbl_admin_matakuliah')->result();
  }
  
  public function view2(){
    $this->db->select('*');
	$this->db->from('tbl_admin_matakuliah_users');
	$this->db->join('tbl_users','tbl_users.user_id=tbl_admin_matakuliah_users.user_id');
	$this->db->join('tbl_admin_matakuliah','tbl_admin_matakuliah.matakuliah_id=tbl_admin_matakuliah_users.matakuliah_id');
	$query = $this->db->get();
	return $query->result();
  }
  
  public function view3(){
	$accept = $this->uri->segment(3);
    $this->db->select('*');
	$this->db->from('tbl_admin_matakuliah_users');
	$this->db->join('tbl_users','tbl_users.user_id=tbl_admin_matakuliah_users.user_id');
	$this->db->join('tbl_admin_matakuliah','tbl_admin_matakuliah.matakuliah_id=tbl_admin_matakuliah_users.matakuliah_id');
	$this->db->where_in('tbl_admin_matakuliah_users.matakuliah_id', $accept);
	$query = $this->db->get();
	return $query->result();
  }
  
  // Fungsi untuk menampilkan data berdasarkan ID nya
  public function view_by($matakuliah_id){
    $this->db->where('matakuliah_id', $matakuliah_id);
    return $this->db->get('tbl_admin_matakuliah')->row();
  }
  // Fungsi untuk menampilkan data berdasarkan ID nya
  public function view_matakuliah_users_by($matakuliah_users_id){
	$this->db->select('*');
	$this->db->from('tbl_admin_matakuliah_users');
	$this->db->join('tbl_users','tbl_users.user_id=tbl_admin_matakuliah_users.user_id');
	$this->db->join('tbl_admin_matakuliah','tbl_admin_matakuliah.matakuliah_id=tbl_admin_matakuliah_users.matakuliah_id');
    $this->db->where('matakuliah_users_id', $matakuliah_users_id);
    return $this->db->get()->row();
  }
  
  // Fungsi untuk melakukan simpan data ke tabel users
  public function add(){
    $data = array(
      "matakuliah_nama" => $this->input->post('matakuliah_nama'),
      "matakuliah_nilai_x" => $this->input->post('matakuliah_nilai_x'),
      "matakuliah_nilai_y" => $this->input->post('matakuliah_nilai_y'),
      "matakuliah_creator" => $this->session->userdata('nim')
    );
    
    $this->db->insert('tbl_admin_matakuliah', $data); // Untuk mengeksekusi perintah insert data
  }
  // Fungsi untuk melakukan simpan data ke tabel users
  public function add_matakuliah_users(){
    $data = array(
      "user_id" => $this->input->post('user_id'),
      "matakuliah_id" => $this->input->post('matakuliah_id'),
      "matakuliah_users_creator" => $this->session->userdata('nim')
    );
    
    $this->db->insert('tbl_admin_matakuliah_users', $data); // Untuk mengeksekusi perintah insert data
  }
  
  // Fungsi untuk melakukan ubah data berdasarkan ID 
  public function edit($matakuliah_id){
    $data = array(
      "matakuliah_nama" => $this->input->post('matakuliah_nama'),
      "matakuliah_nilai_x" => $this->input->post('matakuliah_nilai_x'),
      "matakuliah_nilai_y" => $this->input->post('matakuliah_nilai_y'),
	  "matakuliah_updater" => $this->session->userdata('nim')
    );
    
    $this->db->where('matakuliah_id', $matakuliah_id);
    $this->db->update('tbl_admin_matakuliah', $data); // Untuk mengeksekusi perintah update data
  }
  // Fungsi untuk melakukan ubah data berdasarkan ID 
  public function edit_matakuliah_users($matakuliah_users_id){
    $data = array(
      "user_id" => $this->input->post('user_id'),
      "matakuliah_id" => $this->input->post('matakuliah_id'),
      "tugas" => $this->input->post('tugas'),
	  "matakuliah_users_updater" => $this->session->userdata('nim')
    );
    
    $this->db->where('matakuliah_users_id', $matakuliah_users_id);
    $this->db->update('tbl_admin_matakuliah_users', $data); // Untuk mengeksekusi perintah update data
  }
  
  // Fungsi untuk melakukan menghapus data berdasarkan nim 
  public function hapus($matakuliah_id){
    $this->db->where('matakuliah_id', $matakuliah_id);
    $this->db->delete('tbl_admin_matakuliah'); // Untuk mengeksekusi perintah delete data
  }
  // Fungsi untuk melakukan menghapus data berdasarkan nim 
  public function hapus_matakuliah_users($matakuliah_users_id){
    $this->db->where('matakuliah_users_id', $matakuliah_users_id);
    $this->db->delete('tbl_admin_matakuliah_users'); // Untuk mengeksekusi perintah delete data
  }
}