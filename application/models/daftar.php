<?php
class daftar extends CI_Model{
	function aksi($role){
		if($role=='alumni'&&post('daftar')){
			$config = $this->db->get_where('configs',array('config_name'=>'quick_register'))->row_array();
			$ta = $this->db->get_where('ta',array('hast_ta'=>post('lulusan')))->row_array();
			$foto = $_FILES['foto_siswa'];
			$dir = "assets/foto/";
			$img = time().$foto['name'];
			$data = array(
				'user' => post('user'),
				'salt' => post('salt'),
				'pass' => sha1(post('pass')),
				'nama_siswa' => post('nama_siswa'),
				'id_jurusan' => post('id_jurusan'),
				'id_ta' => $ta['id_ta'],
				'pesan_reg' => post('pesan_reg'),
			);
			if(move_uploaded_file($foto['tmp_name'], $dir.$img)){
				$data['foto_siswa'] = $img;
			}
			if($config['config_status']=='active'&&$config['config_kode']===post('pesan_reg')){
				$data['status_reg'] = 'active';
				$data['status'] = 'active';
				$msg = "Berhasil Daftar silahkan anda <a href='front/login/alumni'><span class='label label-primary'>LOGIN</span></a>";
			}else{
				$msg = 'Daftar alumni berhasil, aktifasi akan diaktifkan oleh admin';
			}
			$this->db->insert('siswa',$data);
			$this->all->setMsg('success',$msg);
			$_POST = '';
		}
		if($role=='perusahaan'&&post('daftar_perusahaan')){
			$data = array(
				'user' => post('user'),
				'pass' => sha1(post('pass')),
				'nama_perusahaan' => post('nama_perusahaan'),
				'email_perusahaan' => post('email_perusahaan'),
				'link_perusahaan' => "http://".str_replace("http://",'',post('link_perusahaan')),
				'tlp_perusahaan' => post('tlp_perusahaan'),
				'alamat_perusahaan' => post('alamat_perusahaan'),
				'about_perusahaan' => post('about_perusahaan'),
				'minat_jurusan' => implode("/",post('minat_jurusan')),
			);
			$this->db->insert('perusahaan',$data);
			$this->all->setMsg('success','Daftar perusahaan berhasil, aktifasi akan diaktifkan oleh admin');
			$_POST = '';
		}
	}
}
?>