<?php
class prakerin extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->library('pagination');
		$this->load->library('image_lib');
	}
	// Theme jurusan
	function theme($id_jurusan){
		if(post('filter')){
			$this->db->where('id_jurusan',post('id_jurusan'));
			$row = $this->db->get('jurusan')->row_array();
			if($row){
				$this->session->set_userdata('jurusan',$row['warna_jurusan']);
			}
		}
	}
	// Get id user by user
	function get_id_prakerin($user){
		$this->db->where(array('salt'=>$user[0],'user'=>$user[1]));
		$result = $this->db->get('prakerin')->row_array();
		return $result['id_prakerin'];
	}
	// Get prakerin
	function get_prakerin($url){
		$this->db->start_cache();
			/*Join*/
			$this->db->select("perusahaan.*,prakerin.*,hast_ta,lulusan,jurusan.*");
			$this->db->join("perusahaan","perusahaan.id_perusahaan=prakerin.id_perusahaan");
			$this->db->join("jurusan","jurusan.id_jurusan=prakerin.id_jurusan");
			$this->db->join("ta","ta.id_ta=prakerin.id_ta");
			// Where
			if(post('filter')){
				$where = "";
				if(post('search')){
					$this->db->like('judul_laporan',post('search'));
				}
				if(post('tahun')){
					$where['lulusan'] = post('tahun');
				}
				if(post('id_jurusan')){
					$where['prakerin.id_jurusan'] = post('id_jurusan');
				}
				if($where){
					$this->db->where($where);
				}
			}
			$this->db->order_by('nama_perusahaan','asc');
			$this->db->from('prakerin');
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
	// Get Detail prakerin
	function get_detail($id_user){
		$this->db->select("perusahaan.*,prakerin.*,hast_ta,lulusan,jurusan.*");
		$this->db->join("perusahaan","perusahaan.id_perusahaan=prakerin.id_perusahaan");
		$this->db->join("jurusan","jurusan.id_jurusan=prakerin.id_jurusan");
		$this->db->join("ta","ta.id_ta=prakerin.id_ta");
		$this->db->where('id_prakerin',$id_user);
		$result = $this->db->get('prakerin')->row_array();
		return $result;
	}
	// Get kelompok prakerin
	function get_kel_prakerin($id_user){
		$this->db->join('siswa',"siswa.id_siswa=kel_prakerin.id_siswa",'left');
		$this->db->where('id_prakerin',$id_user);
		$result = $this->db->get('kel_prakerin')->result_array();
		return $result;
	}
	// Get gallery prakerin
	function get_gallery($id_user,$detail=false){
		if($detail){
			$this->db->where('status','active');
		}
		$this->db->where(array('role_gallery'=>'prakerin','id_user'=>$id_user));
		$result = $this->db->get('gallery')->result_array();
		return $result;
	}
	function aksi($id_user){
		// Edit User Prakerin
		if(post('edit_user')){
			// For Admin
			if($this->session->userdata('role')=='admin'){
				$this->db->where(array("salt"=>post("salt"),"user"=>post("user")));
				$prakerin = $this->db->get("prakerin")->row_array();
				$ta = $this->db->get_where("ta",array("hast_ta"=>post('tahun')))->row_array();
				if($prakerin){
					$self = $prakerin['id_prakerin'] == $id_user;
				}
				if(!$prakerin||$self){
					$data = array(
						"salt" => post('salt'),
						"user" => post('user'),
						"id_ta" => $ta['id_ta'],
						"id_jurusan" => post('id_jurusan'),
					);
					if(post('password')){
						$data['pass'] = sha1(post('password'));
					}
					$this->db->where('id_prakerin',$id_user);
					$this->db->update('prakerin',$data);
					$this->all->setMsg("success","Edit User Prakerin berhasil");
				}else{
					$this->all->setMsg("error","User, Jurusan dan Tahun Prakerin sudah ada");
				}
			}else{
			// For User

			}
		}
		// Edit Prakerin
		if(post('edit_profil_prakerin')){
			$perusahaan = $this->db->get_where('perusahaan',array('nama_perusahaan'=>post('nama_perusahaan')))->row_array();
			$data = array(
				"judul_laporan" => post('judul_laporan'),
				"id_perusahaan" => $perusahaan['id_perusahaan'],
				"about_prakerin" => post('about_prakerin'),
				"tgl_prakerin" => date("Y-m-d")
			);
			$this->db->where('id_prakerin',$id_user);
			$this->db->update('prakerin',$data);
			if(post('nama_siswa')){
				$id_siswa_prakerin = post("id_siswa_prakerin");
				$id_alumni = post("id_alumni");
				foreach(post('nama_siswa') as $k => $v){
					$data1 = array(
						"id_prakerin" => $id_user,
						"nama_siswa_prakerin" => $v,
						"id_siswa" => $id_alumni[$k]
					);
					if(!$id_alumni[$k]){
						$data1["id_siswa"] = null;
					}
					if(isset($id_siswa_prakerin[$k])){
						$this->db->where("id_siswa_prakerin",$id_siswa_prakerin[$k]);
						$this->db->update('kel_prakerin',$data1);
					}elseif($v){
						$this->db->insert('kel_prakerin',$data1);
					}
				}
			}
			$this->all->setMsg('success',"Berhasil Ubah Data Prakerin");
			$_POST = "";
		}
		if(post('asdf')){
			alert(post('asdf'));
		}
		// Upload hasil laporan
		if(isset($_FILES['hasil_laporan'])){
			$files = $_FILES['hasil_laporan'];
			$dir = "assets/files/";
			$laporan = time().$files['name'];

			$prakerin = $this->db->get_where('prakerin',array('id_prakerin'=>$id_user))->row_array();
			if($prakerin['hasil_laporan']){
				unlink($dir.$prakerin['hasil_laporan']);
			}
			if(move_uploaded_file($files['tmp_name'], $dir.$laporan)){
				$data['hasil_laporan'] = $laporan;
				$this->db->where('id_prakerin',$id_user);
				$this->db->update('prakerin',$data);
			}
		}
		// Upload gallery prakerin
		if(isset($_FILES['img_prakerin'])){
			foreach ($_FILES['img_prakerin']['name'] as $k => $v) {
				$foto = $_FILES['img_prakerin'];
				$dir = "assets/prakerin/";
				$img = time().$foto['name'][$k];
				if(move_uploaded_file($foto['tmp_name'][$k], $dir.$img)){
					// Image manipulation
					$config['source_image']	= 'assets/prakerin/'.$img;
					$config['create_thumb'] = TRUE;
					$this->image_lib->initialize($config); 
					$this->image_lib->resize();
					// Insert Database
					$data = array(
						'id_user' => $id_user,
						'title_gallery' => post('title_gallery'),
						'img_gallery' => $img,
						'thumb_gallery' => get_thumb($img),
						'role_gallery' => 'prakerin',
					);
					if($this->session->userdata('role')=='admin'){
						$data['status'] = "active";
					}
					$this->db->insert('gallery',$data);
				}
			}
		}
		// Delete sisa kel prakerin
		if(post('delete')=="kel_prakerin"){
			$this->db->where('id_siswa_prakerin',post('id'));
			$this->db->delete('kel_prakerin');
		}
		// Delete gallery prakerin
		if(post('delete')=="gallery_prakerin"){
			$gallery = $this->db->get_where('gallery',array('id_gallery'=>post('id')))->row_array();
			$dir = "assets/prakerin/";
			unlink($dir.$gallery['img_gallery']);
			unlink($dir.$gallery['thumb_gallery']);
			$this->db->where('id_gallery',post('id'));
			$this->db->delete('gallery');
		}
		// Aksi admin
		if($this->session->userdata('role')=='admin'){
			// Add Prakerin
			if(post('add_prakerin')){
				$this->db->where(array("salt"=>post("salt"),"user"=>post("user")));
				$prakerin = $this->db->get("prakerin")->row_array();
				$ta = $this->db->get_where("ta",array("hast_ta"=>post('tahun')))->row_array();
				$perusahaan = $this->db->get_where('perusahaan',array("nama_perusahaan"=>post("nama_perusahaan")))->row_array();
				if(!$prakerin){
					$data = array(
						"user" => post('user'),
						"salt" => post('salt'),
						"pass" => sha1('12345'),
						"id_jurusan" => post('id_jurusan'),
						"id_ta" => $ta['id_ta'],
						"id_perusahaan" => $perusahaan['id_perusahaan'],
						"status_prakerin" => "active",
						"tgl_prakerin" => date("Y-m-d")
					);
					$this->db->insert('prakerin',$data);
					$this->db->where(array("salt"=>post("salt"),"user"=>post("user")));
					$prakerin = $this->db->get("prakerin")->row_array();
					if(post('nama_siswa')){
						$id_alumni = post("id_alumni");
						foreach(post('nama_siswa') as $k => $v){
							$data1 = array(
								"id_prakerin" => $prakerin['id_prakerin'],
								"nama_siswa_prakerin" => $v,
								"id_siswa" => $id_alumni[$k]
							);
							if(!$id_alumni[$k]){
								$data1["id_siswa"] = null;
							}
							if($v){
								$this->db->insert('kel_prakerin',$data1);
							}
						}
					}
					$this->all->setMsg('success',"Berhasil Tambah Prakerin");
					$_POST = "";
				}else{
					$this->all->setMsg('error',"User prakerin sudah ada");
				}
			}
			/*Edit status prakerin*/
			if(post('status')=="prakerin"){
				$status = explode(".", post('id'));
				$this->db->where('id_prakerin',$status[0]);
				$this->db->update('prakerin',array('status_prakerin'=>$status[1]));
			}
			/*Edit status All galery prakerin*/
			if(post('status')=="gallery"){
				$status = explode(".", post('id'));
				$this->db->where('id_user',$status[0]);
				$this->db->update('gallery',array('status'=>$status[1]));
			}
			/*Edit status gallery prakerin*/
			if(post('status')=="gallery_prakerin"){
				$status = explode(".", post('id'));
				$this->db->where('id_gallery',$status[0]);
				$this->db->update('gallery',array('status'=>$status[1]));
			}
			// Delete prakerin
			if(post('delete')=="prakerin"){
				// Delete kel prakerin
				$prakerin = $this->db->get_where('prakerin',array('id_prakerin'=>post('id')))->row_array();
				$this->db->where('id_prakerin',$prakerin['id_prakerin']);
				$this->db->delete("kel_prakerin");
				// Delete Prakerin
				$this->db->where('id_prakerin',post('id'));
				$this->db->delete('prakerin');
			}
		}
	}
}
?>