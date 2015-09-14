<?php
class gallery extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->library('pagination');
		$this->load->library('image_lib');
	}
	function get_album(){
		$this->db->start_cache();
			// Where
			if(post('search')){
				$this->db->like('nama_album',post('search'));
			}
			$this->db->order_by('tgl_album','desc');
			$this->db->from('album');
		$this->db->stop_cache();
			// Pagination
			$config['base_url'] = 'admin/gallery/';
			$config['uri_segment'] = 3;
			$config['total_rows'] = $this->db->count_all_results();
			$config['per_page'] = 20;
			$no = $this->uri->segment($config['uri_segment']);
			$this->pagination->initialize($config);
			$this->db->limit($config['per_page'],$no);
			$result['data'] = $this->db->get()->result_array();
			$result['no'] = $no+1;
		$this->db->flush_cache();
		return $result;
	}
	function get_gallery($id_album){
		$this->db->start_cache();
			$this->db->where('gallery.id_album',$id_album);
			$this->db->order_by('id_gallery','asc');
			$this->db->from('gallery');
		$this->db->stop_cache();
			$result['data'] = $this->db->get()->result_array();
		$this->db->flush_cache();
			$result['album'] = $this->db->get_where('album',array('id_album'=>$id_album))->row_array();
		return $result;
	}
	// Aksi Gallery
	function aksi($id){
		// Upload Album
		if(isset($_FILES['img_album'])){
			$album = $this->db->get_where('album',array('nama_album'=>post('nama_album')))->row_array();
			if(!$album){
				$data_album = array('nama_album'=>post('nama_album'),'tgl_album'=>date('Y-m-d'));
				$this->db->insert('album',$data_album);
				$album = $this->db->get_where('album',array('nama_album'=>post('nama_album')))->row_array();
				foreach ($_FILES['img_album']['name'] as $k => $v) {
					$foto = $_FILES['img_album'];
					$dir = "assets/gallery/";
					$img = time().$foto['name'][$k];
					if(move_uploaded_file($foto['tmp_name'][$k], $dir.$img)){
						// Image manipulation
						$config['source_image']	= 'assets/gallery/'.$img;
						$config['create_thumb'] = TRUE;
						$this->image_lib->initialize($config); 
						$this->image_lib->resize();
						// Insert Database
						$data = array(
							'id_album' => $album['id_album'],
							'img_gallery' => $img,
							'thumb_gallery' => get_thumb($img),
							'role_gallery' => 'gallery',
						);
						$this->db->insert('gallery',$data);
					}
					$this->all->setMsg('success','Berhasil tambah album!');
				}
			}else{
				$this->all->setMsg('error','Nama album sudah ada!');
			}
		}
		// Edit Nama Album
		if(post('edit_album')){
			$data = array('nama_album'=>post('nama_album'));
			$this->db->where('id_album',$id);
			$this->db->update('album',$data);
			$this->all->setMsg('success','Berhasil edit nama album');
		}
		// Tambah gallery Album
		if(isset($_FILES['add_img_album'])){
			foreach($_FILES['add_img_album']['name'] as $k => $v) {
				$foto = $_FILES['add_img_album'];
				$dir = "assets/gallery/";
				$img = time().$foto['name'][$k];
				if(move_uploaded_file($foto['tmp_name'][$k], $dir.$img)){
					// Image manipulation
					$config['source_image']	= 'assets/gallery/'.$img;
					$config['create_thumb'] = TRUE;
					$this->image_lib->initialize($config); 
					$this->image_lib->resize();
					// Insert Database
					$data = array(
						'id_album' => $id,
						'img_gallery' => $img,
						'thumb_gallery' => get_thumb($img),
						'role_gallery' => 'gallery',
					);
					$this->db->insert('gallery',$data);
				}
			}
			$this->all->setMsg('success','Berhasil tambah gallery album!');
		}
		// Delete gallery album
		if(post('delete')=='gallery'){
			$gallery = $this->db->get_where('gallery',array('id_gallery'=>post('id')))->row_array();
			if($gallery['img_gallery']){
				unlink("assets/gallery/$gallery[img_gallery]");
				unlink("assets/gallery/$gallery[thumb_gallery]");
			}
			$this->db->where('id_gallery',post('id'));
			$this->db->delete('gallery');
		}
		// Delete Album
		if(post('delete')=='album'){
			$gallery = $this->db->get_where('gallery',array('id_album'=>post('id')))->result_array();
			foreach($gallery as $row){
				unlink("assets/gallery/$row[img_gallery]");
				unlink("assets/gallery/$row[thumb_gallery]");
				$this->db->where('id_gallery',$row['id_gallery']);
				$this->db->delete('gallery');
			}
			$this->db->where('id_album',post('id'));
			$this->db->delete('album');
		}
	}
}
?>