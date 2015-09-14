<?php
class alumni extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->library('pagination');
		$this->load->library('image_lib');
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
	function get_alumni($url,$status=false){
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
			$this->db->where('status_reg','active');
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
	// Pendidikan Formal
	function get_pndk_formal($id){
		$this->db->where('id_siswa',$id);
		$this->db->order_by('id_pndk_formal');
		$result = $this->db->get('pendidikan_formal')->result_array();
		return $result;
	}
	// Pendidikan Informal
	function get_pndk_informal($id){
		$this->db->where('id_siswa',$id);
		$this->db->order_by('id_pndk_informal');
		$result = $this->db->get('pendidikan_informal')->result_array();
		return $result;
	}
	// Pengalaman Organisasi
	function get_org($id){
		$this->db->where('id_siswa',$id);
		$this->db->order_by('id_org');
		$result = $this->db->get('pengalaman_organisasi')->result_array();
		return $result;
	}
	// Keahlian siswa
	function get_keahlian($id){
		$this->db->where('id_siswa',$id);
		$this->db->order_by('id_keahlian');
		$result = $this->db->get('keahlian_siswa')->result_array();
		return $result;
	}
	// Prestasi siswa
	function get_prestasi($id){
		$this->db->where('id_siswa',$id);
		$this->db->order_by('id_prestasi');
		$result = $this->db->get('prestasi_siswa')->result_array();
		return $result;
	}
	// Pengalaman Kerja
	function get_kerja($id){
		$this->db->where('id_siswa',$id);
		$this->db->order_by('id_kerja');
		$result = $this->db->get('pengalaman_kerja')->result_array();
		return $result;
	}
	// Portofolio Siswa
	function get_portofolio($id){
		$this->db->where(array('id_user'=>$id,'role_gallery'=>'portofolio'));
		$this->db->order_by('id_gallery');
		$result = $this->db->get('gallery')->result_array();
		return $result;
	}
	// Aksi Almuni
	function aksi($id_siswa){
		// Edit Profil
		if(post('edit-profil')){
			if($this->session->userdata('role')=="admin"){
				$this->db->where(array("salt"=>post("salt"),"user"=>post("user")));
				$prakerin = $this->db->get("siswa")->row_array();
				$ta = $this->db->get_where("ta",array("hast_ta"=>post('tahun')))->row_array();
				if($prakerin){
					$self = $prakerin['id_siswa'] == $id_siswa;
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
					$this->db->where('id_siswa',$id_siswa);
					$this->db->update('siswa',$data);
					$this->all->setMsg("success","Edit Alumni berhasil");
				}else{
					$this->all->setMsg("error","User, Jurusan dan Tahun Alumni sudah ada");
				}
			}else{
				$old_pass = $this->db->get_where('siswa',array('id_siswa'=>$id_siswa))->row_array();
				if(sha1(post('old_pass'))==$old_pass['pass']){
					$data = array(
						'pass' => sha1(post('pass')),
					);
					$this->db->where('id_siswa',$id_siswa);
					$this->db->update('siswa',$data);
					$this->all->setMsg('success','Berhasil edit password');
				}else{
					$this->all->setMsg('error','Old password salah');
				}
			}
		}
		// Edit Biodata
		if(post('edit-biodata')){
			$data = array(
				'nama_siswa' 	=> post('nama_siswa'),
				'tmp_lhr_siswa' => post('tmp_lhr_siswa'),
				'tgl_lhr_siswa' => post('tgl_lhr_siswa'),
				'jk_siswa'		=> post('jk_siswa'),
				'negara_siswa' 	=> post('negara_siswa'),
				'agama_siswa' 	=> post('agama_siswa'),
				'status_siswa' 	=> post('status_siswa'),
				'alamat_siswa' 	=> post('alamat_siswa'),
				'tlp_siswa' 	=> post('tlp_siswa'),
				'email_siswa' 	=> post('email_siswa'),
				'ktp_siswa' 	=> post('ktp_siswa'),
				'id_jurusan' 	=> post('id_jurusan'),
				'id_ta' 		=> post('id_ta'),
			);
			$this->db->where('id_siswa',$id_siswa);
			$this->db->update('siswa',$data);
			$this->all->setMsg('success','Berhail edit biodata');
		}
		// Upload Foto Siswa
		if(isset($_FILES['foto_siswa'])){
			$user = $this->db->get_where('siswa',array('id_siswa'=>$id_siswa))->row_array();
			$foto = $_FILES['foto_siswa'];
			$dir = "assets/foto/";
			$img = time().$foto['name'];
			if($img['foto_siswa']){
				unlink($dir.$user['foto_siswa']);
			}
			if(move_uploaded_file($foto['tmp_name'], $dir.$img)){
				// Image manipulation
				$config['source_image']	= 'assets/foto/'.$img;
				$this->image_lib->initialize($config); 
				$this->image_lib->resize();
				// Insert Database
				$this->db->where('id_siswa',$id_siswa);
				$this->db->update('siswa',array('foto_siswa'=>$img));
			}
		}
		// Upload Portofolio Siswa
		if(isset($_FILES['img_portofolio'])){
			foreach ($_FILES['img_portofolio']['name'] as $k => $v) {
				$foto = $_FILES['img_portofolio'];
				$dir = "assets/portofolio/";
				$img = time().$foto['name'][$k];
				if(move_uploaded_file($foto['tmp_name'][$k], $dir.$img)){
					// Image manipulation
					$config['source_image']	= 'assets/portofolio/'.$img;
					$config['create_thumb'] = TRUE;
					$this->image_lib->initialize($config); 
					$this->image_lib->resize();
					// Insert Database
					$data = array(
						'id_user' => $id_siswa,
						'title_gallery' => post('title_portofolio'),
						'img_gallery' => $img,
						'thumb_gallery' => get_thumb($img),
						'role_gallery' => 'portofolio',
					);
					$this->db->insert('gallery',$data);
				}
			}
		}
		// Delete pendidikan Formal
		if(post('delete')=='portofolio'){
			$img = $this->db->get_where('gallery',array('id_gallery'=>post('id')))->row_array();
			unlink('assets/portofolio/'.$img['img_gallery']);
			unlink('assets/portofolio/'.$img['thumb_gallery']);
			$this->db->where(array('id_gallery'=>post('id'),'role_gallery'=>'portofolio'));
			$this->db->delete('gallery');
		}
		// Tambah Pendidikan Formal
		if(post('nama_pndk_formal')){
			$data = array(
				'id_siswa' => $id_siswa,
				'awal_pndk_formal' => post("awal_pndk_formal"),
				'akhir_pndk_formal' => post("akhir_pndk_formal"),
				'nama_pndk_formal' => post("nama_pndk_formal"),
			);
			$this->db->insert('pendidikan_formal',$data);
		}
		// Delete pendidikan Formal
		if(post('delete')=='pndk_formal'){
			$this->db->where('id_pndk_formal',post('id'));
			$this->db->delete('pendidikan_formal');
		}
		// Tambah Pendidikan Informal
		if(post('nama_pndk_informal')){
			$data = array(
				'id_siswa' => $id_siswa,
				'awal_pndk_informal' => post("awal_pndk_informal"),
				'akhir_pndk_informal' => post("akhir_pndk_informal"),
				'nama_pndk_informal' => post("nama_pndk_informal"),
			);
			$this->db->insert('pendidikan_informal',$data);
		}
		// Delete pendidikan Informal
		if(post('delete')=='pndk_informal'){
			$this->db->where('id_pndk_informal',post('id'));
			$this->db->delete('pendidikan_informal');
		}
		// Tambah Pengalaman Organisasi
		if(post('nama_org')){
			$data = array(
				'id_siswa' => $id_siswa,
				'awal_org' => post("awal_org"),
				'akhir_org' => post("akhir_org"),
				'posisi_org' => post("posisi_org"),
				'nama_org' => post("nama_org"),
			);
			$this->db->insert('pengalaman_organisasi',$data);
		}
		// Delete Pengalaman Organisasi
		if(post('delete')=='pengalaman_organisasi'){
			$this->db->where('id_org',post('id'));
			$this->db->delete('pengalaman_organisasi');
		}
		// Tambah Keahlian Siswa
		if(post('ket_keahlian')){
			$data = array(
				'id_siswa' => $id_siswa,
				'ket_keahlian' => post("ket_keahlian"),
			);
			$this->db->insert('keahlian_siswa',$data);
		}
		// Delete Keahlian Siswa
		if(post('delete')=='keahlian_siswa'){
			$this->db->where('id_keahlian',post('id'));
			$this->db->delete('keahlian_siswa');
		}
		// Tambah Prestasi Siswa
		if(post('prestasi')){
			$data = array(
				'id_siswa' => $id_siswa,
				'prestasi' => post("prestasi"),
			);
			$this->db->insert('prestasi_siswa',$data);
		}
		// Delete Prestasi Siswa
		if(post('delete')=='prestasi_siswa'){
			$this->db->where('id_prestasi',post('id'));
			$this->db->delete('prestasi_siswa');
		}
		// Tambah Pengalaman Kerja
		if(post('pengalaman_kerja')){
			$data = array(
				'id_siswa' => $id_siswa,
				'pengalaman_kerja' => post("pengalaman_kerja"),
			);
			$this->db->insert('pengalaman_kerja',$data);
		}
		// Delete Pengalaman Kerja
		if(post('delete')=='pengalaman_kerja'){
			$this->db->where('id_kerja',post('id'));
			$this->db->delete('pengalaman_kerja');
		}
		// Keterangan Alumni
		if(post('siswa_ket')){
			$data = array(
				'siswa_ket' => post('siswa_ket'),
				'tempat_ket' => post('tempat_ket'),
				'posisi_ket' => post('posisi_ket'),
				'pesan_ket' => post('pesan_ket')
			);
			$this->db->where('id_siswa',$id_siswa);
			$this->db->update('siswa',$data);
			$this->all->setMsg('success','Berhasil Simpan Keterangan Almuni');
		}
		if($this->session->userdata('role')=='admin'){
		// Admin Aksi
			// Add
			if(post('add_siswa')){
				$ta = $this->db->get_where('ta',array('hast_ta'=>post('lulusan')))->row_array();
				$data = array(
					'user' => post('user'),
					'salt' => post('salt'),
					'pass' => sha1(post('pass')),
					'nama_siswa' => post('nama_siswa'),
					'id_jurusan' => post('id_jurusan'),
					'id_ta' => $ta['id_ta'],
					'status' => 'active'
				);
				$this->db->insert('siswa',$data);
				$this->all->setMsg('success','Tambah Almuni berhasil');
				$_POST = '';
			}
			// Status
			if(post('status')){
				$this->db->where('id_siswa',post('id'));
				$this->db->update('siswa',array('status'=>post('status')));
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