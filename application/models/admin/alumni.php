<?php
class alumni extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->library('pagination');
	}
	// Aksi Posting
	function aksi($id){
		// Add
		if(post('add')){
			$data = array(
				'title_posting' => post('title_posting'),
				'content_posting' => post('content_posting'),
				'date_posting' => date('Y-m-d')
			);
			$this->db->insert('posting',$data);
			$this->all->setMsg('success','Berhasil tambah posting');
			$_POST = '';
		}
		// Edit
		if(post('edit')){
			$data = array(
				'title_posting' => post('title_posting'),
				'content_posting' => post('content_posting'),
				'date_posting' => date('Y-m-d')
			);
			$this->db->where('id_posting',$id);
			$this->db->update('posting',$data);
			$this->all->setMsg('success','Berhasil edit posting');
		}
		// Status
		if(post('status')){
			$this->db->where('id_siswa',post('id'));
			$this->db->update('siswa',array('status'=>post('status')));
		}
		// Delete
		if(post('delete')){
			$this->db->where('id_posting',post('id'));
			$this->db->delete(post('delete'));
		}
	}
}
?>