<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('role') != 'admin'){
			redirect('login');
		}
	}
	function index(){
		$this->session->set_userdata('nav','Dashboard');
		$this->load->model('admin/dashboard');
		$data['aksi'] = $this->uri->segment(3);
		$data['id'] = $this->uri->segment(4);
		$this->dashboard->aksi($data['id']);
		/*All Get*/
		$data['get_about'] = $this->dashboard->get_about();
		$data['get_quick_register'] = $this->dashboard->get_quick_register();
		/*Data*/
		$data['link'] = "admin/index/";
		$data['menu'] = "menu/dashboard";
		$data['page_title'] = "Dashboard";
		$data['content'] = "admin/dashboard";
		$this->load->view('main',$data);
	}
	// Slider
	function slider(){
		$this->load->model('slider');
		$data['aksi'] = $this->uri->segment(3);
		$data['id'] = $this->uri->segment(4);
		$this->slider->aksi($data['id']);
		$data['get_slider'] = $this->slider->get_slider();
		$data['get_detail'] = $this->slider->get_detail($data['id']);
		$data['link'] = "admin/slider/";
		$data['menu'] = "menu/dashboard";
		$data['page_title'] = "Dashboard > Slider";
		$data['content'] = "admin/slider";
		$this->load->view('main',$data);
	}
	// Posting
	function posting(){
		$this->load->model('posting');
		$data['aksi'] = $this->uri->segment(3);
		$data['id'] = $this->uri->segment(4);
		$this->posting->aksi($data['id']);
		$data['get_posting'] = $this->posting->get_posting();
		$data['link'] = "admin/posting/";
		$data['menu'] = "menu/dashboard";
		$data['page_title'] = "Dashboard > Posting";
		$data['content'] = "admin/posting";
		$this->load->view('main',$data);
	}
	// Posting
	function mutiara(){
		$this->load->model('mutiara');
		$data['aksi'] = $this->uri->segment(3);
		$data['id'] = $this->uri->segment(4);
		$this->mutiara->aksi($data['id']);
		$data['link'] = "admin/mutiara/";
		$data['get_posting'] = $this->mutiara->get_mutiara($data['link']);
		$data['menu'] = "menu/dashboard";
		$data['page_title'] = "Dashboard > Posting";
		$data['content'] = "admin/mutiara";
		$this->load->view('main',$data);
	}
	// Register Alumni
	function regis_alumni(){
		$this->load->model('reg_alumni');
		// Tema Jurusan
		// $id_jurusan = $this->all->id_jurusan_ses($this->session->userdata('jurusan'));
		// $this->reg_alumni->theme($id_jurusan);
		// Aksi
		$data['aksi'] = $this->uri->segment(3);
		$data['id_user'] = $this->uri->segment(4);
		$this->reg_alumni->aksi($data['id_user']);
		$data['get_reg_alumni'] = $this->reg_alumni->get_reg_alumni('admin/regis_alumni');
		$data['get_profil'] = $this->reg_alumni->get_profil($data['id_user']);
		$data['link'] = "admin/regis_alumni/";
		$data['menu'] = "menu/dashboard";
		$data['page_title'] = "Dashboard > Pendaftaran Alumni";
		$data['content'] = "admin/reg_alumni";
		$this->load->view('main',$data);
	}
	// Almuni
	function alumni(){
		$this->load->model('alumni');
		// Tema Jurusan
		$id_jurusan = $this->all->id_jurusan_ses($this->session->userdata('jurusan'));
		$this->alumni->theme($id_jurusan);
		// Aksi
		$data['aksi'] = $this->uri->segment(3);
		$data['id_user'] = $this->uri->segment(4);
		$this->alumni->aksi($data['id_user']);
		$data['get_alumni'] = $this->alumni->get_alumni('admin/alumni');
		$data['get_profil'] = $this->alumni->get_profil($data['id_user']);
		$data['link'] = "admin/alumni/";
		$data['menu'] = "menu/dashboard";
		$data['page_title'] = "Dashboard > Alumni";
		$data['content'] = "admin/alumni";
		$this->load->view('main',$data);
	}
	// Perusahaan
	function perusahaan(){
		$this->load->model('perusahaan');
		// Aksi
		$data['aksi'] = $this->uri->segment(3);
		$data['id_user'] = $this->uri->segment(4);
		$this->perusahaan->aksi($data['id_user']);
		$data['get_perusahaan'] = $this->perusahaan->get_perusahaan('admin/perusahaan');
		$data['get_detail'] = $this->perusahaan->get_detail($data['id_user']);
		$data['link'] = "admin/perusahaan/";
		$data['menu'] = "menu/dashboard";
		$data['page_title'] = "Dashboard > Perusahaan";
		$data['content'] = "admin/perusahaan";
		$this->load->view('main',$data);
	}
	// Prakerin
	function prakerin(){
		$this->load->model('prakerin');
		// Aksi
		$data['aksi'] = $this->uri->segment(3);
		$data['id_user'] = $this->uri->segment(4);
		$this->prakerin->aksi($data['id_user']);
		$data['get_prakerin'] = $this->prakerin->get_prakerin('admin/perusahaan');
		$data['get_detail'] = $this->prakerin->get_detail($data['id_user']);
		$data['link'] = "admin/prakerin/";
		$data['menu'] = "menu/dashboard";
		$data['page_title'] = "Dashboard > Prakerin";
		$data['content'] = "admin/prakerin";
		$this->load->view('main',$data);
	}
	// Gallery
	function gallery(){
		$this->load->model('admin/gallery');
		// Aksi
		$data['aksi'] = $this->uri->segment(3);
		$data['id_album'] = $this->uri->segment(4);
		$this->gallery->aksi($data['id_album']);
		$data['get_album'] = $this->gallery->get_album();
		$data['get_gallery'] = $this->gallery->get_gallery($data['id_album']);
		$data['link'] = "admin/gallery/";
		$data['menu'] = "menu/dashboard";
		$data['page_title'] = "Dashboard > Gallery";
		$data['content'] = "admin/gallery";
		$this->load->view('main',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */