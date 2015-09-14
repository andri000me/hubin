<?php
class login extends CI_Model{
	function aksi(){
		if(post('login-alumni')){
			$this->db->join('jurusan','jurusan.id_jurusan=siswa.id_jurusan');
			$user = explode(".", post('user'));
			if(isset($user[1])){
				$row = $this->db->get_where('siswa',array('salt'=>$user[0],'user'=>$user[1],'pass'=>sha1(post('pass'))))->row_array();
			}else{
				$row = false;
			}
			if($row){
				if($row['status']=='active'){
					$data = array(
						'id_user' => $row['id_siswa'],
						'login' => true,
						'role' => 'alumni',
						'jurusan' => $row['warna_jurusan']
					);
					$this->session->set_userdata($data);
					direct("front/profil_alumni");
				}else{
					$this->all->setMsg('error','Username tidak aktif');
				}
			}else{
				$this->all->setMsg('error','Username Dan Password Salah');
			}
		}
		if(post('login-perusahaan')){
			$row = $this->db->get_where('perusahaan',array('user'=>post('user'),'pass'=>sha1(post('pass'))))->row_array();
			if($row){
				if($row['status']=='active'){
					$data = array(
						'id_user' => $row['id_perusahaan'],
						'login' => true,
						'role' => 'perusahaan'
					);
					$this->session->set_userdata($data);
					direct("front/detail_perusahaan");
				}else{
					$this->all->setMsg('error','Username tidak aktif');
				}
			}else{
				$this->all->setMsg('error','Username Dan Password Salah');
			}
		}
	}
}
?>