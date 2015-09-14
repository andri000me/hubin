<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller {

	function __construct(){
		parent::__construct();
	}
	function index(){
		// $data['menu'] = "menu/page";
		if($this->session->userdata('role')=='admin'){
			redirect('admin');
		}
		if(post('login')){
			$row = $this->db->get_where('user',array('user'=>post('user'),'pass'=>sha1(post('pass'))))->row_array();
			if($row){
				$data = array(
					'login'=>true,
					'id_user'=>$row['id_user'],
					'role'=>$row['role'],
				);
				$this->session->set_userdata($data);
				direct('admin');
			}else{
				$this->all->setMsg('error','Username dan Password salah');
			}
		}
		$data['page_title'] = "Login Admin";
		$data['content'] = "admin/login";
		$this->load->view('main',$data);
	}
	function logout(){
		$data = array(
					'login'=>'',
					'id_siswa'=>'',
					'id_user'=>'',
					'role'=>'',
				);
		$this->session->unset_userdata($data);
		direct();
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */