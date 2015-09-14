<?php
class reg_alumni extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->library('pagination');
	}
	function get_id_siswa($user){
		$user = explode(".", $user);
		if(isset($user[1])){
			$row = $this->db->get_where('siswa',array('salt'=>$user[0],'user'=>$user[1]))->row_array();
		}else{
			$row = false;
		}
		if($row){
			return $row['id_siswa'];
		}
	}
	function theme($id_jurusan){
		if(post('filter')){
			$this->db->where('id_jurusan',post('id_jurusan'));
			$row = $this->db->get('jurusan')->row_array();
			if($row){
				$this->session->set_userdata('jurusan',$row['warna_jurusan']);
			}
		}
	}
	// Get Almuni
	function get_reg_alumni($url,$status=false){
		$this->db->start_cache();
			// Join
			$this->db->join('jurusan','jurusan.id_jurusan=siswa.id_jurusan');
			$this->db->join('ta','ta.id_ta=siswa.id_ta');
			// Where
			if(post('filter')){
				$where = "";
				if(post('search')){
					$this->db->like('nama_siswa',post('search'));
				}
				if(post('id_ta')){
					$where['siswa.id_ta'] = post('id_ta');
				}
				if(post('id_jurusan')){
					$where['siswa.id_jurusan'] = post('id_jurusan');
				}
				if(post('siswa_ket')){
					$where['siswa.siswa_ket'] = post('siswa_ket');
				}
				if($where){
					$this->db->where($where);
				}
			}
			if($status){
				$this->db->where('status','active');
			}
			$this->db->where('siswa.status_reg','non');
			$this->db->order_by('lulusan','desc');
			$this->db->order_by('nama_siswa','asc');
			$this->db->from('siswa');
		$this->db->stop_cache();
			// Pagination
			$config['base_url'] = $url;
			$config['uri_segment'] = 3;
			$config['total_rows'] = $this->db->count_all_results();
			$config['per_page'] = 20;
			$no = $this->uri->segment($config['uri_segment']);
			$this->pagination->initialize($config);
			$this->db->limit($config['per_page'],$no);
			$result['count'] = $config['total_rows'];
			$result['data'] = $this->db->get()->result_array();
			$result['no'] = $no+1;
		$this->db->flush_cache();
		return $result;
	}
	// get Profil
	function get_profil($id){
		$this->db->start_cache();
			$this->db->join('ta',"ta.id_ta=siswa.id_ta");
			$this->db->where('id_siswa',$id);
		$this->db->stop_cache();
			$result = $this->db->get('siswa')->row_array();
		$this->db->flush_cache();
		return $result;
	}
	// Aksi Almuni
	function aksi($id_siswa){
		if($this->session->userdata('role')=='admin'){
		// Admin Aksi
			// Status Register
			if(post('status_reg')){
				$this->db->where('id_siswa',post('id'));
				$this->db->update('siswa',array('status_reg'=>post('status_reg'),'status'=>'active'));
			}
			// Delete
			if(post('delete')=='siswa'){
				$this->db->where('id_siswa',post('id'));
				$this->db->delete(post('delete'));
			}
		}
	}
}
?>