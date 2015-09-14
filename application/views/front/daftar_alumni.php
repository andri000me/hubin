<script src='assets/js/validasi.js' ></script>

<div class='col-md-6 pull-right'>
	<legend>
		<h2>Ketentuan Daftar</h2>
	</legend>
<blockquote class='notification' style='white-space:pre'><span class='label label-warning'>Pendaftaran!</span> hanya diperuntukan oleh siswa yang telah
<span class='label label-success'>lulus</span> di SMK ADI Sanggoro.

<span class='label label-warning'><b>Cara Pendaftaran :</b></span>
Pertama pilih Tahun Lulusan dan Jurusan Anda !!.
Secara automatis anda akan mendapatkan kode alumni.
Contoh :
<img src='assets/img/hubin/ex_reg1.png' style='width:90%;border:1px solid #ccc' />
Maka user anda menjadi <label class='label label-primary'>1402.rochim</label>
Ingat baik-baik Username anda, bahwa setelah kode alumni
ditambah titik (.) lalu dilanjutkan dengan user anda.
Contoh : <span class='label label-success'>[kode].[user]</span>
Nah username inilah yang akan digunakan untuk <span class='label label-info'>Login Alumni</span>
</blockquote>
</div>
<div class='col-md-6'>
	<legend>
		<h2>Daftar Alumni <a x href="front/login/alumni" class='btn btn-inverse btn-xs'><i class='glyphicon glyphicon-arrow-left'></i> Login</a></h2>
	</legend>
	<!-- Form Perusahaan -->
	<form method="post" id='user' enctype="multipart/form-data">
		<?php $this->all->getMsg();?>
		<input type='hidden' name='daftar' value='true' />
		<div class="form-group">
			<label>Lulusan</label>
			<?php
				foreach($this->db->get('ta')->result_array() as $k){
					$lulusan = $k['lulusan'];
					$sel_ta["$k[hast_ta]"] = $k['lulusan'];
				}
				echo form_dropdown("lulusan",$sel_ta,post('lulusan'),"class='form-control'");
			?>
		</div>
		<div class="form-group">
			<label>Jurusan</label>
			<?php
				foreach($this->db->get('jurusan')->result_array() as $s){
					$sel_jurusan[$s['id_jurusan']] = $s['nama_jurusan'];
				}
				echo form_dropdown("id_jurusan",$sel_jurusan,post('id_jurusan'),"class='form-control'");
			?>
		</div>
		<div class="form-group">
			<label>Username</label>
			<div class='table-cell' style='width:25%'>
				<input type='hidden' name='salt' />
				<input style='width:90%' type="text" name="salt" class="form-control" placeholder='Salt' disabled>
			</div>
			<div class='table-cell'>
				<input type="text" name="user" class="form-control" value="<?=post('user');?>" placeholder="Username">
			</div>
		</div>
		<script>
		// Auto Load
		$salt = $("[name='lulusan']").val()+0+$("[name='id_jurusan']").val();
		$("[name='salt']").val($salt);
		$("[name='id_jurusan'],[name='lulusan']").change(function(){
			$salt = $("[name='lulusan']").val()+0+$("[name='id_jurusan']").val();
			$("[name='salt']").val($salt);
		});
		</script>
			
		<div class="form-group">
			<label>Password</label>
			<input type="password" id='pass' name="pass" class="form-control" placeholder="Password">
		</div>

		<div class="form-group">
			<label>Retype Password</label>
			<input type="password" name="re_pass" class="form-control" placeholder="Retype Password">
		</div>

		<div class="form-group">
			<label>Nama Lengkap</label>
			<input type="text" name="nama_siswa" class="form-control" value="<?php echo post('nama_siswa');?>" placeholder="Nama">
		</div>

		<div class="form-group">
			<label>Foto (Disarankan Menggunakan Baju PU)</label>
			<input type="file" name="foto_siswa" class="form-control" placeholder="Foto Siswa" title='Foto siswa'>
		</div>

		<div class="form-group">
			<label>Pesan bahwa anda siswa SMK ADI SANGGORO</label>
			<textarea name="pesan_reg" class="form-control" placeholder="Pesan untuk HUBIN"><?php echo post('nama_siswa');?></textarea>
		</div>

		<div class="actions">
			<button type="submit" class="btn btn-primary col-sm-12">Daftar!</button>
		</div>

	</form>
</div>