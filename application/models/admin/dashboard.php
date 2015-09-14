<?php
class dashboard extends CI_Model{
	function __construct(){
		parent::__construct();
		/*$this->load->library('pagination');
		$this->load->library('image_lib');*/
	}
	function get_about(){
		$this->db->where('role_hubin','about');
		$result = $this->db->get('hubin')->row_array();
		return $result;
	}
	function get_quick_register(){
		$this->db->where('config_name','quick_register');
		$result = $this->db->get('configs')->row_array();
		return $result;
	}
	function aksi($id){
		if(post('tentang_hubin')){
			$data['content_hubin'] = post('tentang_hubin');
			$this->db->where('role_hubin','about');
			$this->db->update('hubin',$data);
			$this->all->setMsg('success','Berhasil Edit Tentang Hubin');
		}
		// Quick Register
		if(post('quick_reg')){
			$data['config_kode'] = post('config_kode');
			$this->db->where('config_name','quick_register');
			$this->db->update('configs',$data);
			$this->all->setMsg('success','Berhasil Ubah Kode Quick Register');
		}
		if(post('id')=='quick_register'){
			$this->db->where('config_name','quick_register');
			$this->db->update('configs',array('config_status'=>post('status')));
		}
		if(post('change_password')){
			$id_user = 2;
			$old_pass = $this->db->get_where('user',array('id_user'=>$id_user))->row_array();
			if(sha1(post('old_pass'))==$old_pass['pass']){
				$data = array(
					'pass' => sha1(post('pass')),
				);
				$this->db->where('id_user',$id_user);
				$this->db->update('user',$data);
				$this->all->setMsg('success','Berhasil edit password');
			}else{
				$this->all->setMsg('error','Old password salah');
			}
		}
	}
}
?>