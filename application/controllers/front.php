<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class front extends CI_Controller {

	function __construct(){
		parent::__construct();

	}
	function style(){
		$this->load->view('style');
	}
	function index(){
		// $this->session->set_userdata('jurusan',"#CC1212");
		$this->load->model(array('slider','posting'));
		$this->session->set_userdata('nav','Home');
		// $data['menu'] = "menu/page";
		$data['get_informasi'] = $this->posting->get_informasi('front/index/',true);
		$data['get_slider'] = $this->slider->get_slider(true);
		$data['content'] = "front/index";
		$this->load->view('main',$data);
	}
	function login(){
		$this->session->set_userdata('nav','Login');
		$this->load->model('login');
		$role = $this->uri->segment(3);
		$this->login->aksi();
		$data['page_title'] = "Login ".$role;
		$data['content'] = "front/login_".$role;
		$this->load->view('main',$data);
	}
	function daftar(){
		$this->load->model('daftar');
		$role = $this->uri->segment(3);
		$this->daftar->aksi($role);
		$data['page_title'] = "Daftar ".$role;
		$data['content'] = "front/daftar_".$role;
		$this->load->view('main',$data);
	}
	// Loker
	function loker(){
		$this->session->set_userdata('nav','Loker');
		$this->load->model('loker');
		$data['id_loker'] = $this->uri->segment(3);
		$this->loker->theme();
		$data['get_loker'] = $this->loker->get_loker('front/loker');
		$data['get_detail'] = $this->loker->get_detail($data['id_loker']);
		$data['page_title'] = "Data Lowongan Kerja";
		$data['menu'] = "menu/menu_loker";
		$data['content'] = "front/loker";
		$this->load->view('main',$data);
	}
	// Perusahaan
	function detail_loker(){
		$this->session->set_userdata('nav','Loker');
		$this->load->model('loker');
		$data['id_loker'] = $this->uri->segment(3);
		$this->loker->lamar($data['id_loker']);
		$data['get_detail'] = $this->loker->get_detail($data['id_loker']);
		$data['menu'] = "menu/menu_loker";
		$data['page_title'] = "Detail Lowongan Kerja";
		$data['content'] = "front/detail_loker";
		$this->load->view('main',$data);
	}
	// Prakerin
	function prakerin(){
		$this->session->set_userdata('nav','Prakerin');
		$this->load->model('prakerin');
		$id_jurusan = $this->all->id_jurusan_ses($this->session->userdata('jurusan'));
		$data['id_user'] = $this->uri->segment(3);
		$this->prakerin->theme($id_jurusan);
		$data['get_prakerin'] = $this->prakerin->get_prakerin('admin/perusahaan');
		$data['get_detail'] = $this->prakerin->get_detail($data['id_user']);
		$data['page_title'] = "Data Prakerin";
		$data['menu'] = "menu/menu_prakerin";
		$data['content'] = "front/prakerin";
		$this->load->view('main',$data);
	}
	// Detail Prakerin
	function detail_prakerin(){
		$this->load->model('prakerin');
		$user = explode(".", $this->uri->segment(3));
		$id_user = "";
		if($user){
			$id_user = $this->prakerin->get_id_prakerin($user);
		}elseif($this->session->userdata('role')=='prakerin'){
			$id_user = $this->session->userdata('id_user');
		}
		$data['get_detail'] = $this->prakerin->get_detail($id_user);
		$data['page_title'] = "Detail Prakerin";
		$data['link'] = "front/prakerin";
		$data['id_user'] = $id_user;
		$data['menu'] = "menu/menu_prakerin";
		$data['content'] = "front/detail_prakerin";
		$this->load->view('main',$data);
	}
	// Alumni
	function alumni(){
		$this->session->set_userdata('nav','Alumni');
		$this->load->model('alumni');
		$id_jurusan = $this->all->id_jurusan_ses($this->session->userdata('jurusan'));
		$this->alumni->theme($id_jurusan);
		$data['get_alumni'] = $this->alumni->get_alumni('front/alumni',true);
		$data['page_title'] = "Data Alumni";
		$data['menu'] = "menu/menu_alumni";
		$data['content'] = "front/alumni";
		$this->load->view('main',$data);
	}
	function profil_alumni(){
		$this->all->cek_login("alumni");
		$this->session->set_userdata('nav','Profile');
		$this->load->model('alumni');
		$id_user = $this->session->userdata('id_user');
		$this->alumni->aksi($id_user);
		$data['get_profil'] = $this->alumni->get_profil($id_user);
		$data['page_title'] = "Profil Dan Curriculum Vitae";
		$data['id_user'] = $id_user;
		$data['content'] = "front/profil_alumni";
		$data['menu'] = "menu/menu_profile_alumni";
		$this->load->view('main',$data);
	}
	function cv_alumni(){
		$this->load->model('alumni');
		$user = $this->uri->segment(3);
		$id_user = "";
		$data['menu'] = "menu/menu_alumni";
		if($user){
			$id_user = $this->alumni->get_id_siswa($user);
		}elseif($this->session->userdata('role')=='alumni'){
			$id_user = $this->session->userdata('id_user');
			if($this->session->userdata('id_user')==$id_user){
				$data['menu'] = "menu/menu_profile_alumni";
			}
		}
		$data['get_profil'] = $this->alumni->get_profil($id_user);
		$data['page_title'] = "Daftar Riwayat Hidup";
		$data['id_user'] = $id_user;
		$data['content'] = "front/cv_alumni";
		$html = $this->load->view('main',$data);
	}
	function ket_alumni(){
		$this->load->model('alumni');
		$user = $this->uri->segment(3);
		$id_user = "";
		$data['menu'] = "menu/menu_alumni";
		if($user){
			$id_user = $this->alumni->get_id_siswa($user);
		}elseif($this->session->userdata('role')=='alumni'){
			$id_user = $this->session->userdata('id_user');
			if($this->session->userdata('id_user')==$id_user){
				$data['menu'] = "menu/menu_profile_alumni";
			}
		}
		$this->alumni->aksi($id_user);
		$data['get_profil'] = $this->alumni->get_profil($id_user);
		$data['page_title'] = "Keterangan Alumni";
		$data['id_user'] = $id_user;
		$data['content'] = "front/ket_alumni";
		$this->load->view('main',$data);
	}
	function about(){
		$this->session->set_userdata('nav','About');
		// $data['menu'] = "menu/page";
		$data['content'] = "front/about";
		$this->load->view('main',$data);
	}
	function gallery(){
		$this->session->set_userdata('nav','Gallery');
		$this->load->model('gallery');
		$id_album = $this->uri->segment(3);
		// $id_album = $this->gallery->get_id_byname($nama_album);
		$data['get_album'] = $this->gallery->get_album();
		$data['get_gallery'] = $this->gallery->get_gallery($id_album);
		$data['id_album'] = $id_album;
		$data['link'] = "front/gallery/";
		$data['page_title'] = "Gallery";
		$data['content'] = "front/gallery";
		$this->load->view('main',$data);
	}
	// Perusahaan
	function detail_perusahaan(){
		$this->load->model('perusahaan');
		$user = $this->uri->segment(3);
		// Aksi
		if($user){
			$id_user = $this->perusahaan->get_id_perusahaan($user);
			$data['menu'] = "menu/menu_loker";
		}elseif($this->session->userdata('role')=='perusahaan'){
			$this->session->set_userdata('nav','Profile');
			$data['menu'] = "menu/profile_perusahaan";
			$id_user = $this->session->userdata('id_user');
		}
		$data['id_user'] = $id_user;
		$this->perusahaan->aksi($data['id_user']);
		$data['get_detail'] = $this->perusahaan->get_detail($data['id_user']);
		$data['page_title'] = "Detail Perusahaan";
		$data['content'] = "front/detail_perusahaan";
		$this->load->view('main',$data);
	}
	function profile_perusahaan(){
		$this->all->cek_login("perusahaan");
		$this->session->set_userdata('nav','Profile');
		$this->load->model('perusahaan');
		// Aksi
		$data['id_user'] = $this->session->userdata('id_user');
		$this->perusahaan->aksi($data['id_user']);
		$data['get_detail'] = $this->perusahaan->get_detail($data['id_user']);
		$data['menu'] = "menu/profile_perusahaan";
		$data['page_title'] = "Profile Perusahaan";
		$data['content'] = "front/profile_perusahaan";
		$this->load->view('main',$data);
	}
	function loker_perusahaan(){
		$this->all->cek_login("perusahaan");
		$this->session->set_userdata('nav','Profile');
		$this->load->model('loker');
		// Aksi
		$this->loker->theme();
		$data['aksi'] = $this->uri->segment(3);
		$data['id_loker'] = $this->uri->segment(4);
		$this->loker->aksi($data['id_loker']);
		$data['get_loker'] = $this->loker->get_loker("front/loker_perusahaan",$this->session->userdata('id_user'));
		$data['get_detail'] = $this->loker->get_detail($data['id_loker']);
		$data['link'] = "front/loker_perusahaan/";
		$data['menu'] = "menu/profile_perusahaan";
		$data['page_title'] = "Profile Perusahaan";
		$data['content'] = "front/loker_perusahaan";
		$this->load->view('main',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */