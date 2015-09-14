<?php
class all extends CI_Model{
	//role
	function role($role,$id=""){
		$result = false;
		$sess = $this->session->userdata('role');
		$login = $this->session->userdata('login');
		$id_user = $this->session->userdata('id_user');
		//Role with $id
		if($id){
			if($role==$sess||$sess=='admin'||$sess=='user'){
				$result = true;
			}elseif($role=='login'&&$login==true){
				$result = true;
			}
		}
		//Role without $id
		if($role==$sess||$sess=='admin'||$sess=='user'){
			$result = true;
		}elseif($role=='login'&&$login==true){
			$result = true;
		}
		return $result;
	}
	function cek_login($role=''){
		$result = false;
		$sess = $this->session->userdata('role');
		$login = $this->session->userdata('login');
		if($role){
			if(is_array($role)){
				foreach($role as $role){
					if($sess==$role){
						$result = true;
					}
				}
			}else{
				if($role==$sess){
					$result = true;
				}
			}
		}else{
			if($login==true){
				$result = true;
			}
		}
		if($result==false){
			redirect();
		}
	}
	function setMsg($style,$msg){
		$data = array('style'=>$style,'msg'=>$msg);
		$this->session->set_userdata('msg',$data);
	}
	// Get Message
	function getMsg(){
		$msg = $this->session->userdata('msg');
		if($msg){
			echo "<div class='alert alert-$msg[style]'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>$msg[msg]</div>";
			$this->session->unset_userdata('msg','');
		}
	}
	// Get Id_jurusan
	function id_jurusan_ses($ses){
		$this->db->where('warna_jurusan',$ses);
		$result = $this->db->get('jurusan')->row_array();
		if($result){
			return $result['id_jurusan'];
		}
	}
	function count_data(){
		$count['slider'] = $this->db->query("select id_slider from slider")->num_rows();
		$count['posting'] = $this->db->query("select id_posting from posting where role_posting='informasi'")->num_rows();
		$count['kata_mutiara'] = $this->db->query("select id_posting from posting where role_posting='mutiara'")->num_rows();
		$count['perusahaan'] = $this->db->query("select id_perusahaan from perusahaan")->num_rows();
		$count['siswa'] = $this->db->query("select id_siswa from siswa where status_reg='active'")->num_rows();
		$count['regis_alumni'] = $this->db->query("select id_siswa from siswa where status_reg='non'")->num_rows();
		$count['prakerin'] = $this->db->query("select id_prakerin from prakerin")->num_rows();
		$count['gallery'] = $this->db->query("select id_album from album")->num_rows();

		return $count;
	}
}
?>