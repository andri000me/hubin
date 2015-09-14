<?php
class slider extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	// Get prakerin
	function get_slider($status=false){
		$this->db->start_cache();
			if($status){
				$this->db->where('status','active');
			}
			$this->db->order_by('id_slider','asc');
			$this->db->from('slider');
		$this->db->stop_cache();
			$result = $this->db->get()->result_array();
		$this->db->flush_cache();
		return $result;
	}
	// Get Detail Loker
	function get_detail($id_slider){
		$this->db->where("id_slider",$id_slider);
		$result = $this->db->get('slider')->row_array();
		return $result;
	}
	function aksi($id_slider){
		if($this->session->userdata('role')=="admin"){
			// Upload slider
			if(isset($_FILES['img_slider'])){
				$slider = $_FILES['img_slider'];
				$dir = "assets/slider/";
				$img = time().$slider['name'];
				if(move_uploaded_file($slider['tmp_name'], $dir.$img)){
					$data = array(
						"img_slider" => $img,
						"content_slider" => "<p>".post('content_slider')."</p>",
						"status" => "active",
					);
					$this->db->insert('slider',$data);
					$this->all->setMsg("success","Berhasil Tambah Slider");
					$_POST = "";
				}
			}
			// Edit content slider
			if(post('edit_slider')){
				$this->db->where('id_slider',$id_slider);
				$this->db->update('slider',array('content_slider'=>"<p>".post('content_slider')."</p>"));
			}
			// edit image slider
			if(isset($_FILES['edit_img_slider'])){
				$slide = $this->db->get_where('slider',array('id_slider'=>$id_slider))->row_array();
				$slider = $_FILES['edit_img_slider'];
				$dir = "assets/slider/";
				$img = time().$slider['name'];
				if($slide['img_slider']){
					unlink($dir.$slide['img_slider']);
				}
				if(move_uploaded_file($slider['tmp_name'], $dir.$img)){
					$data = array(
						"img_slider" => $img,
						"content_slider" => "<p>".post('content_slider')."</p>"
					);
					$this->db->where('id_slider',$id_slider);
					$this->db->update('slider',$data);
					$this->all->setMsg("success","Berhasil upload Slider");
				}
			}
			// Status
			if(post('status')=="slider"){
				$status = explode(".", post('id'));
				$this->db->where('id_slider',$status[0]);
				$this->db->update('slider',array('status'=>$status[1]));
			}
			// Delete slider
			if(post('delete')=="slider"){
				$img = $this->db->get_where('slider',array('id_slider'=>post('id')))->row_array();
				if($img['img_slider']){
					unlink("assets/slider/".$img['img_slider']);
				}
				$this->db->where('id_slider',post('id'));
				$this->db->delete('slider');
			}
		}
	}
}
?>