<?php
class gallery extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->library('pagination');
	}
	function get_id_byname($name=''){
		$name = str_replace("%20"," ", $name);
		$this->db->where('nama_album',$name);
		$row = $this->db->get('album')->row_array();
		if($row){
			return $row['id_album'];
		}
	}
	// Get album
	function get_album(){
		$result = $this->db->get('album')->result_array();
		return $result;
	}
	// Get Gallery by album
	function get_gallery($id_album=false){
		$this->db->start_cache();
			$this->db->join('album',"album.id_album=gallery.id_album");
			$this->db->where('role_gallery','gallery');
			if($id_album){
				$this->db->where('gallery.id_album',$id_album);
				$this->db->order_by('id_gallery','asc');
			}else{
				$this->db->limit(16,0);
				$this->db->order_by('id_gallery','desc');
			}
			$this->db->from('gallery');
		$this->db->stop_cache();
			$result['data'] = $this->db->get()->result_array();
		$this->db->flush_cache();
		return $result;
	}
}
?>