<?php
	if($get_profil){
?>
<div class='row'>
	<?php if($get_profil['siswa_ket']){ ?>
	<!-- Keterangan Siswa -->
	<div class='col-md-12' style='margin:10px 0px'>
		<div class='title'>
			<h3>Keterangan Alumni <a x href="javascript:history.go(-1)" class='btn btn-inverse btn-xs'><i class='glyphicon glyphicon-arrow-left'></i> Back</a></h3>
		</div>
		<table class='table-cv'>
			<tr>
				<td width='200px'>Keterangan Alumni</td>
				<td><?=siswa_ket($get_profil['siswa_ket']);?></td>
			</tr>
			<tr>
				<td>Tempat / Universitas</td>
				<td><?=$get_profil['tempat_ket'];?></td>
			</tr>
			<tr>
				<td>Posisi / Jurusan</td>
				<td><?=$get_profil['posisi_ket'];?></td>
			</tr>
			<tr>
				<td>Pesan / Keterangan</td>
				<td><?=$get_profil['pesan_ket'];?></td>
			</tr>
		</table>
	</div>
	<?php } ?>
	<!-- Form Biodata -->
	<div class='col-md-8' style='margin:10px 0px'>
		<div class='title'>
			<h3>Biodata 
			<?php if(!$get_profil['siswa_ket']){ ?>
			<a x href="javascript:history.go(-1)" class='btn btn-inverse btn-xs'><i class='glyphicon glyphicon-arrow-left'></i> Back</a>
			<?php } ?></h3>
		</div>
		<table class='table-cv'>
			<tr>
				<td width='200px'>Keterangan</td>
				<td><?=$get_profil['nama_siswa'];?></td>
			</tr>
			<tr>
				<td>Tenpat Tanggal Lahir</td>
				<td><?=$get_profil['tmp_lhr_siswa'].", ".$get_profil['tgl_lhr_siswa'];?></td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td><?=$get_profil['jk_siswa'];?></td>
			</tr>
			<tr>
				<td>Kewarganegaraan</td>
				<td><?=$get_profil['negara_siswa'];?></td>
			</tr>
			<tr>
				<td>Agama</td>
				<td><?=$get_profil['agama_siswa'];?></td>
			</tr>
			<tr>
				<td>Status</td>
				<td><?=$get_profil['status_siswa'];?></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td><?=$get_profil['alamat_siswa'];?></td>
			</tr>
			<tr>
				<td>Telepon/HP</td>
				<td><?=$get_profil['tlp_siswa'];?></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><?=$get_profil['email_siswa'];?></td>
			</tr>
			<tr>
				<td>No. KTP</td>
				<td><?=$get_profil['ktp_siswa'];?></td>
			</tr>
		</table>
	</div>
	<!-- Foto -->
	<div class='col-md-4' style='margin:10px 0px'>
		<div class='title'>
			<h3>Foto</h3>
		</div>
		<div class='col-md-4'>
			<img src="assets/foto/<?=img_default($get_profil['foto_siswa'],'default.png');?>" class='foto-cv'>
		</div>
	</div>
	<!-- Form Pendidikan Formal -->
	<div class='col-md-12' style='margin:10px 0px'>
		<div class='title'>
			<h3>Pendidikan Formal</h3>
		</div>
		<table class='table-cv'>
		<?php foreach($this->alumni->get_pndk_formal($id_user) as $pndk_formal){ ?>
			<tr>
				<td width='200px'>Tahun <?php echo $pndk_formal['awal_pndk_formal']."-".$pndk_formal['akhir_pndk_formal'];?></td>
				<td><?=$pndk_formal['nama_pndk_formal'];?></td>
			</tr>
		<?php } ?>
		</table>
	</div>
	<!-- Form Pendidikan Informal -->
	<div class='col-md-12' style='margin:10px 0px'>
		<div class='title'>
			<h3>Pendidikan Informal</h3>
		</div>
		<table class='table-cv'>
		<?php foreach($this->alumni->get_pndk_informal($id_user) as $pndk_informal){ ?>
			<tr>
				<td width='200px'>Tahun <?php echo $pndk_informal['awal_pndk_informal']."-".$pndk_informal['akhir_pndk_informal'];?></td>
				<td><?=$pndk_informal['nama_pndk_informal'];?></td>
			</tr>
		<?php } ?>
		</table>
	</div>
	<!-- Form Pengalaman Organisasi -->
	<div class='col-md-12' style='margin:10px 0px'>
		<div class='title'>
			<h3>Pengalaman Organisasi</h3>
		</div>
		<table class='table-cv'>
		<?php foreach($this->alumni->get_org($id_user) as $get_org){ ?>
			<tr>
				<td width='200px'>Tahun <?php echo $get_org['awal_org']."-".$get_org['akhir_org'];?></td>
				<td><?=$get_org['posisi_org']." di ".$get_org['nama_org'];?></td>
			</tr>
		<?php } ?>
		</table>
	</div>
	<!-- Form Pengalaman Kerja -->
	<div class='col-md-12' style='margin:10px 0px'>
		<div class='title'>
			<h3>Pengalaman Kerja</h3>
		</div>
		<ul class="arrow_list cv">
		<?php foreach($this->alumni->get_kerja($id_user) as $get_kerja){ ?>
			<li><?=$get_kerja['pengalaman_kerja'];?></li>
		<?php } ?>
		</ul>
	</div>
	<!-- Form Keahlian -->
	<div class='col-md-12' style='margin:10px 0px'>
		<div class='title'>
			<h3>Keahlian</h3>
		</div>
		<ul class="check_list cv">
		<?php foreach($this->alumni->get_keahlian($id_user) as $get_keahlian){ ?>
			<li><?=$get_keahlian['ket_keahlian'];?></li>
		<?php } ?>
		</ul>
	</div>
	<!-- Form Prestasi -->
	<div class='col-md-12' style='margin:10px 0px'>
		<div class='title'>
			<h3>Prestasi</h3>
		</div>
		<ul class="star_list cv">
		<?php foreach($this->alumni->get_prestasi($id_user) as $get_prestasi){ ?>
			<li><?=$get_prestasi['prestasi'];?></li>
		<?php } ?>
		</ul>
	</div>
	<!-- Form Portofolio -->
	<div class='col-md-12' style='margin:10px 0px'>
		<div class='title'>
			<h3>Portofolio</h3>
		</div>
		<div class='row'>
		<?php 
			$title = "";
			foreach($this->alumni->get_portofolio($id_user) as $row_portofolio){ ?>
	        <div class="col-sm-6 col-md-3">
	          <a title='<?php echo $row_portofolio['title_gallery'];?>' href='assets/portofolio/<?php echo $row_portofolio['img_gallery'];?>' class="thumbnail cb-portofolio">
	            <img src="assets/portofolio/<?php echo $row_portofolio['thumb_gallery'];?>" style="height: 180px; width: 100%; display: block;">
	          </a>
	        </div>
	    <?php } ?>
		</div>
	</div>
	<script>
	$.get('assets/js/jquery.colorbox.js',function(){
		$('.cb-portofolio').colorbox({rel:"cb-portofolio-<?php echo $id_user;?>",width:"95%", height:"95%"});
	});
	</script>
</div>
<?php
	}else{
		echo "<h2>CV Alumni tidak ditemukan</h2>";
	}
?>