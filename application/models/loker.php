<?php
class loker extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->library('pagination');
		// $this->load->library('image_lib');
	}
	// Theme jurusan
	function theme(){
		if(post('filter')){
			$this->db->where('id_jurusan',post('id_jurusan'));
			$row = $this->db->get('jurusan')->row_array();
			if($row){
				$this->session->set_userdata('jurusan',$row['warna_jurusan']);
			}
		}
	}
	// Get prakerin
	function get_loker($url,$id_perusahaan=false){
		$this->db->start_cache();
			/*Join*/
			$this->db->select("perusahaan.*,jurusan.*,loker.*");
			$this->db->join("perusahaan","perusahaan.id_perusahaan=loker.id_perusahaan");
			$this->db->join("jurusan","jurusan.id_jurusan=loker.id_jurusan");
			// Where
			if(post('filter')){
				$where = "";
				if(post('search')){
					$this->db->like('judul_loker',post('search'));
				}
				if(post('id_jurusan')){
					$where['loker.id_jurusan'] = post('id_jurusan');
				}
				if($where){
					$this->db->where($where);
				}
			}
			if($id_perusahaan){
				$this->db->where('loker.id_perusahaan',$id_perusahaan);
			}
			$this->db->order_by('tgl_loker','desc');
			$this->db->from('loker');
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
	// Get Detail Loker
	function get_detail($id_loker){
		$this->db->join("perusahaan","perusahaan.id_perusahaan=loker.id_perusahaan");
		$this->db->join("jurusan","jurusan.id_jurusan=loker.id_jurusan");
		$this->db->where("loker.id_loker",$id_loker);
		$result = $this->db->get('loker')->row_array();
		return $result;
	}
	// Lamar
	function lamar($id_loker){
		if(post('pesan_lamar')){
			$data = array(
				'id_loker' => $id_loker,
				'id_siswa' => $this->session->userdata('id_user'),
				'pesan_lamar' => post('pesan_lamar'),
				'tgl_lamar' => date('Y-m-d')
			);
			$this->db->insert('lamar_loker',$data);
		}
	}
	function aksi($id_loker){
		// Buat Loker perusahaan
		if(post('add_loker')){
			$data = array(
				"id_perusahaan" => $this->session->userdata("id_user"),
				"id_jurusan" => post('id_jurusan'),
				"judul_loker" => post('judul_loker'),
				"jumlah_requitment" => post('jumlah_requitment'),
				"deskripsi_loker" => post('deskripsi_loker'),
				"tgl_loker" => date("Y-m-d"),
				"status" => "active"
			);
			$this->db->insert('loker',$data);
			$this->all->setMsg('success',"Buat Loker berhasil");
			$_POST = "";
		}
		// Edit Loker perusahaan
		if(post('edit_loker')){
			$data = array(
				"id_perusahaan" => $this->session->userdata("id_user"),
				"id_jurusan" => post('id_jurusan'),
				"judul_loker" => post('judul_loker'),
				"jumlah_requitment" => post('jumlah_requitment'),
				"deskripsi_loker" => post('deskripsi_loker'),
				"tgl_loker" => date("Y-m-d")
			);
			$this->db->where('id_loker',$id_loker);
			$this->db->update('loker',$data);
			$this->all->setMsg('success',"Edit Loker berhasil");
		}
		// Status Loker
		if(post('status')=='loker'){
			$status = explode(".", post('id'));
			$this->db->where('id_loker',$status[0]);
			$this->db->update('loker',array('status'=>$status[1]));
		}
		// Delete sisa kel prakerin
		if(post('delete')=="loker"){
			$this->db->where('id_loker',post('id'));
			$this->db->delete('loker');
		}
	}
}
?>