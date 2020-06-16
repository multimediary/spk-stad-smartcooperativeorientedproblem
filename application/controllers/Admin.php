<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('status') != "login" or $this->session->userdata('level') != "admin"){
			redirect(base_url("login"));
		}
		$this->load->model('m_admin_index'); // Load  ke controller ini
		$this->load->model('m_admin_matakuliah'); // Load  ke controller ini
		$this->load->model('m_admin_nilai'); // Load  ke controller ini
		$this->load->model('m_admin_materi'); // Load  ke controller ini
		$this->load->model('m_admin_tugas'); // Load  ke controller ini
		$this->load->model('m_admin_laporan'); // Load  ke controller ini
	}
	
	// START INI ADALAH FUNGSI FUNGSI UNTUK HALAMAN KONFIRMASI
	public function index()
    {
		$data['tbl_users'] = $this->m_admin_index->view();
        $this->load->view("v_admin_header");
        $this->load->view("v_admin_index", $data);
        $this->load->view("v_admin_footer_datatables");
    }
	public function indexadmin()
    {
		$data['tbl_users'] = $this->m_admin_index->viewadmin();
        $this->load->view("v_admin_header");
        $this->load->view("v_admin_index", $data);
        $this->load->view("v_admin_footer_datatables");
    }		
	public function index_tambah()
    {
		$this->load->view("v_admin_header_form");
        $this->load->view("v_admin_index_add");
		$this->load->view("v_admin_footer_form");
    }
	public function index_ubah($user_id)
	{
		$data['tbl_users'] = $this->m_admin_index->view_by($user_id);
		$this->load->view("v_admin_header_form");
		$this->load->view('v_admin_index_edit', $data);
		$this->load->view("v_admin_footer_form");
	}	
	public function index_aksi_tambah()
    {
        if($this->input->post('submit')){
			$this->m_admin_index->add(); // Panggil fungsi add() yang ada di M_admin_index.php
			redirect('admin');
		}    
    }	
	public function index_aksi_ubah($user_id)
    {
        if($this->input->post('submit')){
			$this->m_admin_index->edit($user_id); // Panggil fungsi edit() yang ada di M_admin_index.php
			redirect('admin');
		}    
    }
	public function index_ubah_konfirmasi($user_id)
    {
        $this->m_admin_index->aktivasi($user_id); // Panggil fungsi edit() yang ada di M_admin_index.php
		redirect('admin');   
    }	
	public function index_aksi_hapus($user_id){
			$this->m_admin_index->hapus($user_id); // Panggil fungsi hapus() yang ada di M_admin_index.php
			redirect('admin');
	}
	// END INI ADALAH FUNGSI FUNGSI UNTUK HALAMAN KONFIRMASI
	
	
	// START INI ADALAH FUNGSI FUNGSI UNTUK HALAMAN INPUT matakuliah
	public function matakuliah()
    {
		$data['tbl_admin_matakuliah'] = $this->m_admin_matakuliah->view();
		$data['tbl_admin_matakuliah_users'] = $this->m_admin_matakuliah->view2();
        $this->load->view("v_admin_header");
        $this->load->view("v_admin_matakuliah", $data);
        $this->load->view("v_admin_footer_datatables");
    }	
	public function matakuliah_tambah()
    {
		$this->load->view("v_admin_header_form");
        $this->load->view("v_admin_matakuliah_add");
		$this->load->view("v_admin_footer_form");
    }
	public function matakuliah_ubah($matakuliah_id)
	{
		$data['tbl_admin_matakuliah'] = $this->m_admin_matakuliah->view_by($matakuliah_id);
		$this->load->view("v_admin_header_form");
		$this->load->view('v_admin_matakuliah_edit', $data);
		$this->load->view("v_admin_footer_form");
	}	
	public function matakuliah_aksi_tambah()
    {
        if($this->input->post('submit')){
			$this->m_admin_matakuliah->add(); // Panggil fungsi add() yang ada di M_admin_matakuliah.php
			redirect('admin/matakuliah');
		}    
    }	
	public function matakuliah_aksi_ubah($matakuliah_id)
    {
        if($this->input->post('submit')){
			$this->m_admin_matakuliah->edit($matakuliah_id); // Panggil fungsi edit() yang ada di M_admin_matakuliah.php
			redirect('admin/matakuliah');
		}    
    }	
	public function matakuliah_aksi_hapus($matakuliah_id){
			$this->m_admin_matakuliah->hapus($matakuliah_id); // Panggil fungsi hapus() yang ada di M_admin_matakuliah.php
			redirect('admin/matakuliah');
	}
	// END INI ADALAH FUNGSI FUNGSI UNTUK HALAMAN INPUT matakuliah
	
	
	// START INI ADALAH FUNGSI FUNGSI UNTUK HALAMAN INPUT matakuliah USERS
	public function matakuliah_users_tambah()
    {
		$data['tbl_admin_matakuliah'] = $this->m_admin_matakuliah->view();
		$data['tbl_users'] = $this->m_admin_index->view();
		$this->load->view("v_admin_header_form");
        $this->load->view("v_admin_matakuliah_users_add", $data);
		$this->load->view("v_admin_footer_form");
    }
	public function matakuliah_users_ubah($matakuliah_users_id)
	{
		$data['tbl_admin_matakuliah'] = $this->m_admin_matakuliah->view();
		$data['tbl_users'] = $this->m_admin_index->view();
		$data['tbl_admin_matakuliah_users'] = $this->m_admin_matakuliah->view_matakuliah_users_by($matakuliah_users_id);
		$this->load->view("v_admin_header_form");
		$this->load->view('v_admin_matakuliah_users_edit', $data);
		$this->load->view("v_admin_footer_form");
	}	
	public function matakuliah_users_aksi_tambah()
    {
        if($this->input->post('submit')){
			$this->m_admin_matakuliah->add_matakuliah_users(); // Panggil fungsi add_users() yang ada di M_admin_matakuliah.php
			redirect('admin/matakuliah');
		}    
    }	
	public function matakuliah_users_aksi_ubah($matakuliah_users_id)
    {
        if($this->input->post('submit')){
			$this->m_admin_matakuliah->edit_matakuliah_users($matakuliah_users_id); // Panggil fungsi edit_users() yang ada di M_admin_matakuliah.php
			redirect('admin/matakuliah');
		}    
    }	
	public function matakuliah_users_aksi_hapus($matakuliah_users_id){
			$this->m_admin_matakuliah->hapus_matakuliah_users($matakuliah_users_id); // Panggil fungsi hapus_users() yang ada di M_admin_matakuliah.php
			redirect('admin/matakuliah');
	}
	// END INI ADALAH FUNGSI FUNGSI UNTUK HALAMAN INPUT matakuliah USERS
	
	// START INI ADALAH FUNGSI FUNGSI UNTUK HALAMAN INPUT NILAI
	public function nilai()
    {
		$data['tbl_admin_nilai'] = $this->m_admin_nilai->view();
		$this->load->view("v_admin_header");
        $this->load->view("v_admin_nilai", $data);
		$this->load->view("v_admin_footer_datatables");
    }	
	public function nilai_tambah()
    {
		$accept = $this->uri->segment(3);
		$matakuliah_id = $this->uri->segment(3);
		$data['tbl_admin_matakuliah_users'] = $this->m_admin_matakuliah->view3($accept);
		$data['tbl_admin_matakuliah'] = $this->m_admin_index->view2();
		$data['tbl_admin_matakuliah_2'] = $this->m_admin_matakuliah->view_by($matakuliah_id);
		$this->load->view("v_admin_header_form");
        $this->load->view("v_admin_nilai_add", $data);
		$this->load->view("v_admin_footer_form");
    }
	public function nilai_ubah($nilai_id)
	{
		$data['tbl_admin_nilai'] = $this->m_admin_nilai->view_by($nilai_id);
		$this->load->view("v_admin_header_form");
		$this->load->view('v_admin_nilai_edit', $data);
		$this->load->view("v_admin_footer_form");
	}	
	public function nilai_aksi_tambah()
    {
        if($this->input->post('submit')){
			$this->m_admin_nilai->add(); // Panggil fungsi add() yang ada di M_admin_nilai.php
			redirect('admin/nilai');
		}    
    }	
	public function nilai_aksi_ubah($nilai_id)
    {
        if($this->input->post('submit')){
			$this->m_admin_nilai->edit($nilai_id); // Panggil fungsi edit() yang ada di M_admin_nilai.php
			redirect('admin/nilai');
		}    
    }	
	public function nilai_aksi_hapus($nilai_id){
			$this->m_admin_nilai->hapus($nilai_id); // Panggil fungsi hapus() yang ada di M_admin_nilai.php
			redirect('admin/nilai');
	}
	// END INI ADALAH FUNGSI FUNGSI UNTUK HALAMAN INPUT NILAI
	
	// START INI ADALAH FUNGSI FUNGSI UNTUK HALAMAN INPUT MATERI
	public function materi()
    {
		$data['tbl_admin_materi'] = $this->m_admin_materi->view();
        $this->load->view("v_admin_header");
        $this->load->view("v_admin_materi", $data);
        $this->load->view("v_admin_footer_datatables");
    }	
	public function materi_tambah()
    {
		$data['tbl_admin_matakuliah'] = $this->m_admin_matakuliah->view();
		$this->load->view("v_admin_header_form");
        $this->load->view("v_admin_materi_add", $data);
		$this->load->view("v_admin_footer_form");
    }
	public function materi_ubah($materi_id)
	{
		$data['tbl_admin_matakuliah'] = $this->m_admin_matakuliah->view();
		$data['tbl_admin_materi'] = $this->m_admin_materi->view_by($materi_id);
		$this->load->view("v_admin_header_form");
		$this->load->view('v_admin_materi_edit', $data);
		$this->load->view("v_admin_footer_form");
	}	
	public function materi_aksi_tambah()
    {
		$data = array();
		if($this->input->post('submit'))
		{
			$files1 = $_FILES['userfiles1'];
			$config1=array(  
                'upload_path' => './upload/materi/', //direktori untuk menyimpan gambar  
                'allowed_types' => 'mp4|pdf|jpg|jpeg|png|gif',  
                'max_size' => '30000',  
                'max_width' => '20000',  
                'max_height' => '20000'  
            ); 
			
				$_FILES['userfile1']['name'] = $files1['name'];
				$_FILES['userfile1']['type'] = $files1['type'];
				$_FILES['userfile1']['error'] = $files1['error'];
				$_FILES['userfile1']['tmp_name'] = $files1['tmp_name'];
				$_FILES['userfile1']['size'] = $files1['size'];
				
				// File upload configuration
                $uploadPath = './upload/materi/';
                $config1['upload_path'] = $uploadPath;
                $config1['allowed_types'] = 'mp4|pdf|jpg|jpeg|png|gif';
				
				// Load and initialize upload library
                $this->load->library('upload', $config1);
                $this->upload->initialize($config1);
                
                // Upload userfile1 to server
                if($this->upload->do_upload('userfile1')){
                    // Uploaded userfile1 data
                    $this->upload->data();
					$materi_linkvideo = $files1['name'];
                }else{
					$materi_linkvideo = $this->input->post('materi_linkvideo');
				}
			
			$files2 = $_FILES['userfiles2'];
			$config2=array(  
                'upload_path' => './upload/materi/', //direktori untuk menyimpan gambar  
                'allowed_types' => 'mp4|pdf|jpg|jpeg|png|gif',  
                'max_size' => '30000',  
                'max_width' => '20000',  
                'max_height' => '20000'  
            ); 
			
				$_FILES['userfile2']['name'] = $files2['name'];
				$_FILES['userfile2']['type'] = $files2['type'];
				$_FILES['userfile2']['error'] = $files2['error'];
				$_FILES['userfile2']['tmp_name'] = $files2['tmp_name'];
				$_FILES['userfile2']['size'] = $files2['size'];
				
				// File upload configuration
                $uploadPath = './upload/materi/';
                $config2['upload_path'] = $uploadPath;
                $config2['allowed_types'] = 'mp4|pdf|jpg|jpeg|png|gif';
				
				// Load and initialize upload library
                $this->load->library('upload', $config2);
                $this->upload->initialize($config2);
                
                // Upload userfile2 to server
                if($this->upload->do_upload('userfile2')){
                    // Uploaded userfile2 data
                    $this->upload->data();
					$materi_file = $files2['name'];
                }else{
					$materi_file = $this->input->post('materi_file');
				}
				
				$this->m_admin_materi->add(array(
				  "matakuliah_id" => $this->input->post('matakuliah_id'),
				  "materi_nama" => $this->input->post('materi_nama'),
				  "materi_pertemuan" => $this->input->post('materi_pertemuan'),
				  "materi_linkvideo" => $materi_linkvideo,
				  "materi_file" => $materi_file,
				  "materi_creator" => $this->session->userdata('nim')
				));
				redirect('admin/materi');
		}
    }	
	public function materi_aksi_ubah($materi_id)
    {
		$data = array();
        if($this->input->post('submit')){
			$files1 = $_FILES['userfiles1'];
			$config1=array(  
                'upload_path' => './upload/materi/', //direktori untuk menyimpan gambar  
                'allowed_types' => 'mp4|pdf|jpg|jpeg|png|gif',  
                'max_size' => '30000',  
                'max_width' => '20000',  
                'max_height' => '20000'  
            ); 
			
				$_FILES['userfile1']['name'] = $files1['name'];
				$_FILES['userfile1']['type'] = $files1['type'];
				$_FILES['userfile1']['error'] = $files1['error'];
				$_FILES['userfile1']['tmp_name'] = $files1['tmp_name'];
				$_FILES['userfile1']['size'] = $files1['size'];
				
				// File upload configuration
                $uploadPath = './upload/materi/';
                $config1['upload_path'] = $uploadPath;
                $config1['allowed_types'] = 'mp4|pdf|jpg|jpeg|png|gif';
				
				// Load and initialize upload library
                $this->load->library('upload', $config1);
                $this->upload->initialize($config1);
                
                // Upload userfile1 to server
                if($this->upload->do_upload('userfile1')){
                    // Uploaded userfile1 data
                    $this->upload->data();
					$materi_linkvideo = $files1['name'];
                }else{
					$materi_linkvideo = $this->input->post('materi_linkvideo');
				}
			
			$files2 = $_FILES['userfiles2'];
			$config2=array(  
                'upload_path' => './upload/materi/', //direktori untuk menyimpan gambar  
                'allowed_types' => 'mp4|pdf|jpg|jpeg|png|gif',  
                'max_size' => '30000',  
                'max_width' => '20000',  
                'max_height' => '20000'  
            ); 
			
				$_FILES['userfile2']['name'] = $files2['name'];
				$_FILES['userfile2']['type'] = $files2['type'];
				$_FILES['userfile2']['error'] = $files2['error'];
				$_FILES['userfile2']['tmp_name'] = $files2['tmp_name'];
				$_FILES['userfile2']['size'] = $files2['size'];
				
				// File upload configuration
                $uploadPath = './upload/materi/';
                $config2['upload_path'] = $uploadPath;
                $config2['allowed_types'] = 'mp4|pdf|jpg|jpeg|png|gif';
				
				// Load and initialize upload library
                $this->load->library('upload', $config2);
                $this->upload->initialize($config2);
                
                // Upload userfile2 to server
                if($this->upload->do_upload('userfile2')){
                    // Uploaded userfile2 data
                    $this->upload->data();
					$materi_file = $files2['name'];
                }else{
					$materi_file = $this->input->post('materi_file');
				}
			
			$this->m_admin_materi->edit($materi_id, array(
				  "matakuliah_id" => $this->input->post('matakuliah_id'),
				  "materi_nama" => $this->input->post('materi_nama'),
				  "materi_pertemuan" => $this->input->post('materi_pertemuan'),
				  "materi_linkvideo" => $materi_linkvideo,
				  "materi_file" => $materi_file,
				  "materi_updater" => $this->session->userdata('nim')
				));
			redirect('admin/materi');
		}    
    }	
	public function materi_aksi_hapus($materi_id){
			$this->m_admin_materi->hapus($materi_id); // Panggil fungsi hapus() yang ada di M_admin_materi.php
			redirect('admin/materi');
	}
	// END INI ADALAH FUNGSI FUNGSI UNTUK HALAMAN INPUT MATERI
	
	// START INI ADALAH FUNGSI FUNGSI UNTUK HALAMAN INPUT TUGAS
	public function tugas()
    {
		$data['tbl_admin_tugas'] = $this->m_admin_tugas->view();
        $this->load->view("v_admin_header");
        $this->load->view("v_admin_tugas", $data);
        $this->load->view("v_admin_footer_datatables");
    }	
	public function tugas_tambah()
    {
		$data['tbl_admin_matakuliah'] = $this->m_admin_matakuliah->view();
		$this->load->view("v_admin_header_form");
        $this->load->view("v_admin_tugas_add", $data);
		$this->load->view("v_admin_footer_form");
    }
	public function tugas_ubah($tugas_id)
	{
		$data['tbl_admin_matakuliah'] = $this->m_admin_matakuliah->view();
		$data['tbl_admin_tugas'] = $this->m_admin_tugas->view_by($tugas_id);
		$this->load->view("v_admin_header_form");
		$this->load->view('v_admin_tugas_edit', $data);
		$this->load->view("v_admin_footer_form");
	}	
	public function tugas_aksi_tambah()
    {
		$data = array();
		if($this->input->post('submit'))
		{
			$files1 = $_FILES['userfiles1'];
			$config1=array(  
                'upload_path' => './upload/tugas/', //direktori untuk menyimpan gambar  
                'allowed_types' => 'mp4|pdf|jpg|jpeg|png|gif',  
                'max_size' => '30000',  
                'max_width' => '20000',  
                'max_height' => '20000'  
            ); 
			
				$_FILES['userfile1']['name'] = $files1['name'];
				$_FILES['userfile1']['type'] = $files1['type'];
				$_FILES['userfile1']['error'] = $files1['error'];
				$_FILES['userfile1']['tmp_name'] = $files1['tmp_name'];
				$_FILES['userfile1']['size'] = $files1['size'];
				
				// File upload configuration
                $uploadPath = './upload/tugas/';
                $config1['upload_path'] = $uploadPath;
                $config1['allowed_types'] = 'mp4|pdf|jpg|jpeg|png|gif';
				
				// Load and initialize upload library
                $this->load->library('upload', $config1);
                $this->upload->initialize($config1);
                
                // Upload userfile1 to server
                if($this->upload->do_upload('userfile1')){
                    // Uploaded userfile1 data
                    $this->upload->data();
					$tugas_linkvideo = $files1['name'];
                }else{
					$tugas_linkvideo = $this->input->post('tugas_linkvideo');
				}
			
			$files2 = $_FILES['userfiles2'];
			$config2=array(  
                'upload_path' => './upload/tugas/', //direktori untuk menyimpan gambar  
                'allowed_types' => 'mp4|pdf|jpg|jpeg|png|gif',  
                'max_size' => '30000',  
                'max_width' => '20000',  
                'max_height' => '20000'  
            ); 
			
				$_FILES['userfile2']['name'] = $files2['name'];
				$_FILES['userfile2']['type'] = $files2['type'];
				$_FILES['userfile2']['error'] = $files2['error'];
				$_FILES['userfile2']['tmp_name'] = $files2['tmp_name'];
				$_FILES['userfile2']['size'] = $files2['size'];
				
				// File upload configuration
                $uploadPath = './upload/tugas/';
                $config2['upload_path'] = $uploadPath;
                $config2['allowed_types'] = 'mp4|pdf|jpg|jpeg|png|gif';
				
				// Load and initialize upload library
                $this->load->library('upload', $config2);
                $this->upload->initialize($config2);
                
                // Upload userfile2 to server
                if($this->upload->do_upload('userfile2')){
                    // Uploaded userfile2 data
                    $this->upload->data();
					$tugas_file = $files2['name'];
                }else{
					$tugas_file = $this->input->post('tugas_file');
				}
				
				$this->m_admin_tugas->add(array(
				  "matakuliah_id" => $this->input->post('matakuliah_id'),
				  "tugas_nama" => $this->input->post('tugas_nama'),
				  "tugas_pertemuan" => $this->input->post('tugas_pertemuan'),
				  "tugas_linkvideo" => $tugas_linkvideo,
				  "tugas_file" => $tugas_file,
				  "tugas_creator" => $this->session->userdata('nim')
				));
				redirect('admin/tugas');
		}
    }	
	public function tugas_aksi_ubah($tugas_id)
    {
		$data = array();
        if($this->input->post('submit')){
			$files1 = $_FILES['userfiles1'];
			$config1=array(  
                'upload_path' => './upload/tugas/', //direktori untuk menyimpan gambar  
                'allowed_types' => 'mp4|pdf|jpg|jpeg|png|gif',  
                'max_size' => '30000',  
                'max_width' => '20000',  
                'max_height' => '20000'  
            ); 
			
				$_FILES['userfile1']['name'] = $files1['name'];
				$_FILES['userfile1']['type'] = $files1['type'];
				$_FILES['userfile1']['error'] = $files1['error'];
				$_FILES['userfile1']['tmp_name'] = $files1['tmp_name'];
				$_FILES['userfile1']['size'] = $files1['size'];
				
				// File upload configuration
                $uploadPath = './upload/tugas/';
                $config1['upload_path'] = $uploadPath;
                $config1['allowed_types'] = 'mp4|pdf|jpg|jpeg|png|gif';
				
				// Load and initialize upload library
                $this->load->library('upload', $config1);
                $this->upload->initialize($config1);
                
                // Upload userfile1 to server
                if($this->upload->do_upload('userfile1')){
                    // Uploaded userfile1 data
                    $this->upload->data();
					$tugas_linkvideo = $files1['name'];
                }else{
					$tugas_linkvideo = $this->input->post('tugas_linkvideo');
				}
			
			$files2 = $_FILES['userfiles2'];
			$config2=array(  
                'upload_path' => './upload/tugas/', //direktori untuk menyimpan gambar  
                'allowed_types' => 'mp4|pdf|jpg|jpeg|png|gif',  
                'max_size' => '30000',  
                'max_width' => '20000',  
                'max_height' => '20000'  
            ); 
			
				$_FILES['userfile2']['name'] = $files2['name'];
				$_FILES['userfile2']['type'] = $files2['type'];
				$_FILES['userfile2']['error'] = $files2['error'];
				$_FILES['userfile2']['tmp_name'] = $files2['tmp_name'];
				$_FILES['userfile2']['size'] = $files2['size'];
				
				// File upload configuration
                $uploadPath = './upload/tugas/';
                $config2['upload_path'] = $uploadPath;
                $config2['allowed_types'] = 'mp4|pdf|jpg|jpeg|png|gif';
				
				// Load and initialize upload library
                $this->load->library('upload', $config2);
                $this->upload->initialize($config2);
                
                // Upload userfile2 to server
                if($this->upload->do_upload('userfile2')){
                    // Uploaded userfile2 data
                    $this->upload->data();
					$tugas_file = $files2['name'];
                }else{
					$tugas_file = $this->input->post('tugas_file');
				}
			
			$this->m_admin_tugas->edit($tugas_id, array(
				  "matakuliah_id" => $this->input->post('matakuliah_id'),
				  "tugas_nama" => $this->input->post('tugas_nama'),
				  "tugas_pertemuan" => $this->input->post('tugas_pertemuan'),
				  "tugas_linkvideo" => $tugas_linkvideo,
				  "tugas_file" => $tugas_file,
				  "tugas_updater" => $this->session->userdata('nim')
				));
			redirect('admin/tugas');
		}    
    }	
	public function tugas_aksi_hapus($tugas_id){
			$this->m_admin_tugas->hapus($tugas_id); // Panggil fungsi hapus() yang ada di M_admin_tugas.php
			redirect('admin/tugas');
	}
	// END INI ADALAH FUNGSI FUNGSI UNTUK HALAMAN INPUT TUGAS
	
	// START INI ADALAH FUNGSI FUNGSI UNTUK HALAMAN LAPORAN
	public function laporan($matakuliah_id)
    {
		$data['tbl_users'] = $this->m_admin_laporan->laporan($matakuliah_id);
		$data['tbl_users_2'] = $this->m_admin_laporan->jumlahmahasiswamatakuliah($matakuliah_id);
		$data['tbl_users_3'] = $this->m_admin_laporan->jumlahpertemuanmatakuliah($matakuliah_id);
		$data['tbl_admin_matakuliah'] = $this->m_admin_matakuliah->view();
		$data['tbl_admin_matakuliah_2'] = $this->m_admin_matakuliah->view_by($matakuliah_id);
        $this->load->view("v_admin_header");
        $this->load->view("v_admin_laporan", $data);
        $this->load->view("v_admin_footer");
    }
	// END INI ADALAH FUNGSI FUNGSI UNTUK HALAMAN LAPORAN
	
	// START INI ADALAH FUNGSI FUNGSI UNTUK HALAMAN GRAFIK
	public function grafik()
    {
		$matakuliah_id = $this->uri->segment(4);
		$user_id = $this->uri->segment(5);
		$data['tbl_users'] = $this->m_admin_laporan->laporan($matakuliah_id);
		$data['tbl_users_1'] = $this->m_admin_index->view_by($user_id);
		$data['tbl_users_2'] = $this->m_admin_laporan->jumlahmahasiswamatakuliah($matakuliah_id);
		$data['tbl_users_3'] = $this->m_admin_laporan->jumlahpertemuanmatakuliah($matakuliah_id);
		$data['tbl_admin_matakuliah'] = $this->m_admin_matakuliah->view();
		$data['tbl_admin_matakuliah_2'] = $this->m_admin_matakuliah->view_by($matakuliah_id);
        $this->load->view("v_admin_header");
        $this->load->view("v_admin_grafik", $data);
        $this->load->view("v_admin_footer");
    }
	// END INI ADALAH FUNGSI FUNGSI UNTUK HALAMAN GRAFIK
	
}