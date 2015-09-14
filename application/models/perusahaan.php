<?php
class perusahaan extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->library('pagination');
		$this->load->library('image_lib');
	}
	function get_id_perusahaan($user){
		$this->db->where("user",$user);
		$result =  $this->db->get("perusahaan")->row_array();
		return $result['id_perusahaan'];
	}
	// Get Almuni
	function get_perusahaan($url){
		$this->db->start_cache();
			// Where
			if(post('filter')){
				$where = "";
				if(post('search')){
					$this->db->like('nama_perusahaan',post('search'));
				}
				if(post('minat_jurusan')){
					$this->db->like('minat_jurusan',post('minat_jurusan'));
				}
			}
			$this->db->order_by('nama_perusahaan','asc');
			$this->db->from('perusahaan');
		$this->db->stop_cache();
			// Pagination
			$config['base_url'] = $url;
			$config['uri_segment'] = 3;
			$config['total_rows'] = $this->db->count_all_results();
			$config['per_page'] = 3;
			$no = $this->uri->segment($config['uri_segment']);
			$this->pagination->initialize($config);
			$this->db->limit($config['per_page'],$no);
			$result['count'] = $config['total_rows'];
			$result['data'] = $this->db->get()->result_array();
			$result['no'] = $no+1;
		$this->db->flush_cache();
		return $result;
	}
	// Get Almuni
	function get_detail($id_user){
		$this->db->where('id_perusahaan',$id_user);
		$result = $this->db->get('perusahaan')->row_array();
		return $result;
	}
	// Aksi Almuni
	function aksi($id_user){
		// Edit User Perusahaan
		if(post('edit-profil')){
			$old_pass = $this->db->get_where('perusahaan',array('id_perusahaan'=>$id_user))->row_array();
			if(sha1(post('old_pass'))==$old_pass['pass']){
				$data = array(
					'pass' => sha1(post('pass')),
				);
				$this->db->where('id_perusahaan',$id_user);
				$this->db->update('perusahaan',$data);
				$this->all->setMsg('success','Berhasil edit password');
			}else{
				$this->all->setMsg('error','Old password salah');
			}
		}
		// Upload Logo perusahaan
		if(isset($_FILES['logo_perusahaan'])){
			$user = $this->db->get_where('perusahaan',array('id_perusahaan'=>$id_user))->row_array();
			$foto = $_FILES['logo_perusahaan'];
			$dir = "assets/perusahaan/logo/";
			$img = time().$foto['name'];
			if($user['logo_perusahaan']){
				unlink($dir.$user['logo_perusahaan']);
			}
			if(move_uploaded_file($foto['tmp_name'], $dir.$img)){
				// Update Database
				$this->db->where('id_perusahaan',$id_user);
				$this->db->update('perusahaan',array('logo_perusahaan'=>$img));
			}
		}
		// Upload sampul perusahaan
		if(isset($_FILES['sampul_perusahaan'])){
			$user = $this->db->get_where('perusahaan',array('id_perusahaan'=>$id_user))->row_array();
			$foto = $_FILES['sampul_perusahaan'];
			$dir = "assets/perusahaan/sampul/";
			$img = time().$foto['name'];
			if($user['sampul_perusahaan']){
				unlink($dir.$user['sampul_perusahaan']);
			}
			if(move_uploaded_file($foto['tmp_name'], $dir.$img)){
				// Update Database
				$this->db->where('id_perusahaan',$id_user);
				$this->db->update('perusahaan',array('sampul_perusahaan'=>$img));
			}
		}
		// Profile Perusahaan
		if(post('profile-perusahaan')){
			$data = array(
				'nama_perusahaan' => post('nama_perusahaan'),
				'email_perusahaan' => post('email_perusahaan'),
				'link_perusahaan' => "http://".str_replace("http://",'',post('link_perusahaan')),
				'tlp_perusahaan' => post('tlp_perusahaan'),
				'alamat_perusahaan' => post('alamat_perusahaan'),
				'about_perusahaan' => post('about_perusahaan'),
				'minat_jurusan' => implode("/",post('minat_jurusan')),
			);
			$this->db->where('id_perusahaan',$id_user);
			$this->db->update('perusahaan',$data);
		}
		// Aksi admin
		if($this->session->userdata('role')=='admin'){
			// Add Perusahaan
			if(post('add_perusahaan')){
				$data = array(
					'user' => post('user'),
					'pass' => sha1(post('pass')),
					'nama_perusahaan' => post('nama_perusahaan'),
					'email_perusahaan' => post('email_perusahaan'),
					'link_perusahaan' => "http://".str_replace("http://",'',post('link_perusahaan')),
					'tlp_perusahaan' => post('tlp_perusahaan'),
					'alamat_perusahaan' => post('alamat_perusahaan'),
					'about_perusahaan' => post('about_perusahaan'),
					'minat_jurusan' => implode("/",post('minat_jurusan')),
				);
				$this->db->insert('perusahaan',$data);
				$this->all->setMsg('success','Tambah perusahaan berhasil');
				$_POST = '';
			}
			// Status
			if(post('status')){
				$this->db->where('id_perusahaan',post('id'));
				$this->db->update('perusahaan',array('status'=>post('status')));
			}
		}
	}
}
?>