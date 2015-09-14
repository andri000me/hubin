<?php
class posting extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->library('pagination');
	}
	function get_posting($status=false){
		$this->db->start_cache();
			// Where
			$this->db->where('role_posting','informasi');
			if($status){
				$this->db->where('status','active');
			}
			if(post('search')){
				$this->db->like('title_posting',post('search'));
			}
			$this->db->order_by('date_posting','desc');
			$this->db->from('posting');
		$this->db->stop_cache();
			// Pagination
			$config['base_url'] = 'admin/posting/';
			$config['uri_segment'] = 3;
			$config['total_rows'] = $this->db->count_all_results();
			$config['per_page'] = 10;
			$no = $this->uri->segment($config['uri_segment']);
			$this->pagination->initialize($config);
			$this->db->limit($config['per_page'],$no);
			$result['data'] = $this->db->get()->result_array();
			$result['no'] = $no+1;
		$this->db->flush_cache();
		return $result;
	}
	function get_informasi($base_url,$status=false){
		$this->db->start_cache();
			// Where
			$this->db->where('role_posting','informasi');
			if($status){
				$this->db->where('status','active');
			}
			if(post('search')){
				$this->db->like('title_posting',post('search'));
			}
			$this->db->order_by('date_posting','desc');
			$this->db->from('posting');
		$this->db->stop_cache();
			// Pagination
			$config['base_url'] = $base_url;
			$config['uri_segment'] = 3;
			$config['total_rows'] = $this->db->count_all_results();
			$config['per_page'] = 3;
			$no = $this->uri->segment($config['uri_segment']);
			$this->pagination->initialize($config);
			$this->db->limit($config['per_page'],$no);
			$result['data'] = $this->db->get()->result_array();
			$result['no'] = $no+1;
		$this->db->flush_cache();
		return $result;
	}
	// Aksi Posting
	function aksi($id){
		// Add
		if(post('add')){
			if(post('content_posting')){
				$data = array(
					'title_posting' => post('title_posting'),
					'content_posting' => post('content_posting'),
					'date_posting' => date('Y-m-d'),
					'role_posting' => 'informasi'
				);
				$this->db->insert('posting',$data);
				$this->all->setMsg('success','Berhasil tambah posting');
				$_POST = '';
			}else{
				$this->all->setMsg('error','Konten Posting harus diisi');
			}
		}
		// Edit
		if(post('edit')){
			if(post('content_posting')){
				$data = array(
					'title_posting' => post('title_posting'),
					'content_posting' => post('content_posting'),
					'date_posting' => date('Y-m-d')
				);
				$this->db->where('id_posting',$id);
				$this->db->update('posting',$data);
				$this->all->setMsg('success','Berhasil edit posting');
			}else{
				$this->all->setMsg('error','Konten Posting harus diisi');
			}
		}
		// Status
		if(post('status')){
			$this->db->where('id_posting',post('id'));
			$this->db->update('posting',array('status'=>post('status')));
		}
		// Delete
		if(post('delete')){
			$this->db->where('id_posting',post('id'));
			$this->db->delete(post('delete'));
		}
	}
}
?>