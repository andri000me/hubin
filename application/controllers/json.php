<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class json extends CI_Controller {

	function __construct(){
		parent::__construct();

	}
	function perusahaan(){
		header('Content-Type: application/json');
		foreach($this->db->get('perusahaan')->result_array() as $row){
			$data[] = array(
				"value"=>$row['nama_perusahaan'],
				"label"=>$row['nama_perusahaan'],
				"image"=>img_default($row['logo_perusahaan'],'default.png')
			);
		}
		echo json_encode($data);
	}
	function alumni(){
		header('Content-Type: application/json');
		$this->db->join("jurusan","jurusan.id_jurusan=siswa.id_jurusan");
		$this->db->join("ta","ta.id_ta=siswa.id_ta");
		$i=0;
		foreach($this->db->get('siswa')->result_array() as $row){
			$data[$i] = array(
				"value"=>$row['id_siswa'],
				"label"=>$row['nama_siswa'],
				"jurusan"=>$row['nama_jurusan'],
				"lulusan"=>$row['lulusan'],
				"image"=>img_default($row['foto_siswa'],'default.png')
			);
			if(get('v')){
				$data[$i]["value"] = $row[get('v')];
			}
			$i++;
		}
		echo json_encode($data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */