<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('status') != "login" or $this->session->userdata('level') != "mahasiswa"){
			redirect(base_url("login"));
		}
		
		
		$this->load->model('m_mahasiswa_index'); // Load  ke controller ini
		$this->load->model('m_mahasiswa_nilai'); // Load  ke controller ini
		$this->load->model('m_mahasiswa_materi'); // Load  ke controller ini
		$this->load->model('m_mahasiswa_tugas'); // Load  ke controller ini
		$this->load->model('m_mahasiswa_group'); // Load  ke controller ini
	}
	public function index()
	{
		$data['tbl_users'] = $this->m_mahasiswa_index->view();
		$data['tbl_admin_matakuliah'] = $this->m_mahasiswa_index->viewmatakuliah();
		
		$this->load->view('v_mahasiswa_header');
		$this->load->view('v_mahasiswa_index', $data);
		$this->load->view('v_admin_footer_datatables');
	}
	public function index_ubah()
	{
		$data['tbl_users'] = $this->m_mahasiswa_index->view();
		$this->load->view('v_mahasiswa_header');
		$this->load->view('v_mahasiswa_index_edit', $data);
		$this->load->view('v_admin_footer_datatables');
	}
	public function index_aksi_ubah($user_id)
    {
	   $data = array();
       if($this->input->post('submit')){
			$files = $_FILES['userfiles'];
			$config=array(  
                'upload_path' => './assets/avatar/', //direktori untuk menyimpan gambar  
                'allowed_types' => 'mp4|pdf|jpg|jpeg|png|gif',  
                'max_size' => '30000',  
                'max_width' => '20000',  
                'max_height' => '20000'  
            ); 
			
				$_FILES['userfile']['name'] = $files['name'];
				$_FILES['userfile']['type'] = $files['type'];
				$_FILES['userfile']['error'] = $files['error'];
				$_FILES['userfile']['tmp_name'] = $files['tmp_name'];
				$_FILES['userfile']['size'] = $files['size'];
				
				// File upload configuration
                $uploadPath = './assets/avatar/';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'mp4|pdf|jpg|jpeg|png|gif';
				
				// Load and initialize upload library
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                
                // Upload userfile to server
                if($this->upload->do_upload('userfile')){
                    // Uploaded userfile data
                    $this->upload->data();
					$user_image = $files['name'];
                }else{
					$user_image = $this->input->post('user_image');
				}
			if($this->input->post('user_passwordlama')==$this->input->post('user_password')){
					$password = $this->input->post('user_passwordlama');
			  }else{
					$password = md5($this->input->post('user_password'));
			  }
			$this->m_mahasiswa_index->edit($user_id, array(// Panggil fungsi edit() yang ada di M_mahasiswa_index.php
				  "user_fullname" => $this->input->post('user_fullname'),
				  "user_password" => $password,
				  "user_email" => $this->input->post('user_email'),
				  "user_semester" => $this->input->post('user_semester'),
				  "user_image" => $user_image,
				  "user_updater" => $this->session->userdata('nim')
				));
			redirect('mahasiswa');		
		}   
		
    }	

	public function nilai()
	{
		$data['tbl_mahasiswa_nilai'] = $this->m_mahasiswa_nilai->view();
		$this->load->view('v_mahasiswa_header');
		$this->load->view('v_mahasiswa_nilai', $data);
		$this->load->view('v_admin_footer_form');
	}
	public function nilai_aksi_tambah()
	{
		if($this->input->post('submit')){
			$this->m_mahasiswa_nilai->add(); // Panggil fungsi add() yang ada di M_mahasiswa_nilai.php
			redirect('mahasiswa/nilai');
		}  
	}
	public function materi()
	{
		$data['tbl_admin_materi'] = $this->m_mahasiswa_materi->materi();
		$data['tbl_mahasiswa_materi'] = $this->m_mahasiswa_materi->view();
		$data['tbl_mahasiswa_matakuliah'] = $this->m_mahasiswa_materi->viewmatakuliah();
		$data['jumlahmateri'] = $this->m_mahasiswa_materi->jumlahmateri($this->uri->segment(3));
		$this->load->view('v_mahasiswa_header');
		$this->load->view('v_mahasiswa_materi', $data);
		$this->load->view('v_admin_footer_datatables');
	}
	public function tugas()
	{
		$data['tbl_admin_tugas'] = $this->m_mahasiswa_tugas->tugas();
		$data['tbl_mahasiswa_tugas'] = $this->m_mahasiswa_tugas->view();
		$data['tbl_mahasiswa_matakuliah'] = $this->m_mahasiswa_tugas->viewmatakuliah();
		$data['jumlahtugas'] = $this->m_mahasiswa_tugas->jumlahtugas($this->uri->segment(3));
		$this->load->view('v_mahasiswa_header');
		$this->load->view('v_mahasiswa_tugas', $data);
		$this->load->view('v_admin_footer_datatables');
	}
	// START INI ADALAH FUNGSI FUNGSI UNTUK HALAMAN LAPORAN
	public function group($matakuliah_id)
    {
		$data['tbl_users'] = $this->m_mahasiswa_group->laporan($matakuliah_id);
		$data['tbl_users_2'] = $this->m_mahasiswa_group->jumlahmahasiswamatakuliah($matakuliah_id);
		$data['tbl_users_3'] = $this->m_mahasiswa_group->jumlahpertemuanmatakuliah($matakuliah_id);
		$data['tbl_admin_matakuliah'] = $this->m_mahasiswa_group->view();
		$data['tbl_admin_matakuliah_2'] = $this->m_mahasiswa_group->view_by($matakuliah_id);
        $this->load->view("v_mahasiswa_header");
        $this->load->view("v_mahasiswa_group", $data);
        $this->load->view("v_admin_footer_datatables");
    }
	// END INI ADALAH FUNGSI FUNGSI UNTUK HALAMAN LAPORAN
	
	// START INI ADALAH FUNGSI FUNGSI UNTUK HALAMAN GRAFIK
	public function grafik($matakuliah_id)
    {
		$data['tbl_users_1'] = $this->m_mahasiswa_index->view();
		$data['tbl_users_2'] = $this->m_mahasiswa_group->jumlahmahasiswamatakuliah($matakuliah_id);
		$data['tbl_users_3'] = $this->m_mahasiswa_group->jumlahpertemuanmatakuliah($matakuliah_id);
		$data['tbl_admin_matakuliah'] = $this->m_mahasiswa_group->view();
		$data['tbl_admin_matakuliah_2'] = $this->m_mahasiswa_group->view_by($matakuliah_id);
        $this->load->view("v_mahasiswa_header");
        $this->load->view("v_mahasiswa_grafik", $data);
        $this->load->view("v_admin_footer_datatables");
    }
	// END INI ADALAH FUNGSI FUNGSI UNTUK HALAMAN GRAFIK

}