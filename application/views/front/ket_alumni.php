<?php
	if($get_profil){
?>
<div class='row' style='padding:0 15px'>
	<!-- Keterangan Alumni -->
	<div class='title'>
		<h3>Keterangan Alumni <a x href="javascript:history.go(-1)" class='btn btn-inverse btn-xs'><i class='glyphicon glyphicon-arrow-left'></i> Back</a></h3>
	</div>
	<?php $this->all->getMsg() ;?>
	<form method='post'>
		<div class='form-group'>
			<label>Keterangan Alumni</label>
		<?php
		$ket = array(''=>'Pilih Keterangan','Kuliah'=>'Kuliah','Mencari Kerja'=>'Mencari Kerja','Bekerja'=>'Bekerja');
		echo form_dropdown('siswa_ket',$ket,$get_profil['siswa_ket'],'class="form-control"');
		?>
		</div>
		<div class='form-group'>
			<label>Lokasi / Universitas</label>
			<input type='text' name='tempat_ket' class='form-control' value='<?=$get_profil['tempat_ket'];?>' placeholder='Lokasi / Universitas' />
		</div>
		<div class='form-group'>
			<label>Posisi / Jurusan</label>
			<input type='text' name='posisi_ket' class='form-control' value='<?=$get_profil['posisi_ket'];?>' placeholder='Posisi / Jurusan' />
		</div>
		<div class='form-group'>
			<label>Pesan / Keterangan</label>
			<textarea name='pesan_ket' class='form-control' placeholder='Pesan / Keterangan'><?=$get_profil['pesan_ket'];?></textarea>
		</div>
		<div class='form-group'>
			<button class='btn btn-primary'>Simpan Keterangan Alumni</button>
		</div>
	</form>
</div>
<?php
	}else{
		echo "<h2>CV Alumni tidak ditemukan</h2>";
	}
?>
<script></script>