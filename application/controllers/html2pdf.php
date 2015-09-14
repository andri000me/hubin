<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class html2pdf extends CI_Controller {

	function __construct(){
		parent::__construct();

	}
	function index(){
		$this->load->model('alumni');
		$user = $this->uri->segment(3);
		$id_user = $this->alumni->get_id_siswa($user);
		$data['get_profil'] = $this->alumni->get_profil($id_user);
		$this->load->view('html',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */