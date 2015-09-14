<script src='assets/js/validasi.js' ></script>
<div class='row' style='padding:0px 15px'>
<?php $this->all->getMsg();?>
<div class='col-md-6'>
	<!-- Form user perusahaan -->
	<div class="panel panel-primary">
    	<div class="panel-heading">
	      <h3 class="panel-title">User Prakerin</h3>
	    </div>
	    <div class="panel-body">
	    	<form id='user' method="post">
	    	<input type='hidden' name='edit_user' value='1' />
			<div class="form-group">
				<label>Jurusan</label>
				<?php
					foreach($this->db->get('jurusan')->result_array() as $s){
						$sel_jurusan[$s['id_jurusan']] = $s['nama_jurusan'];
					}
					echo form_dropdown("id_jurusan",$sel_jurusan,$get_detail['id_jurusan'],"class='form-control'");
				?>
			</div>

			<div class="form-group">
				<label>Tahun</label>
				<?php
					foreach($this->db->get('ta')->result_array() as $k){
						$lulusan = $k['lulusan'];
						$sel_ta["$k[hast_ta]"] = $k['lulusan'];
					}
					echo form_dropdown("tahun",$sel_ta,$get_detail['hast_ta'],"class='form-control'");
				?>
			</div>
			<div class="form-group">
				<label>Username</label>
				<div class='table-cell' style='width:25%'>
					<input type='hidden' name='salt' />
					<input style='width:90%' type="text" name="salt" class="form-control" placeholder='Salt' disabled>
				</div>
				<div class='table-cell'>
					<input type="text" name="user" class="form-control" value="<?php echo $get_detail['user'];?>" placeholder="Username">
				</div>
			</div>
			<script>
			// Auto Load
			$salt = $("[name='tahun']").val()+0+$("[name='id_jurusan']").val();
			$("[name='salt']").val($salt);
			$("[name='id_jurusan'],[name='tahun']").change(function(){
				$salt = $("[name='tahun']").val()+0+$("[name='id_jurusan']").val();
				$("[name='salt']").val($salt);
			});
			</script>
		<?php if($this->session->userdata('role')=='admin'){ ?>
			<div class="form-group">
				<label>Password</label>
				<input type="password" name="password" class="form-control" placeholder="Password">
			</div>
		<?php }else{ ?>
			<div class="form-group">
				<label>Old Password</label>
				<input type="password" name="old_pass" class="form-control" placeholder="Old Password">
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" name="pass" class="form-control" placeholder="Password" id='pass'>
			</div>
			<div class="form-group">
				<label>Retype Password</label>
				<input type="password" name="re_pass" class="form-control" placeholder="Retype Password">
			</div>
		<?php } ?>
			<div class="actions">
				<input type="submit" value="Edit!" class="btn btn-primary col-sm-12">
			</div>
			</form>
	    </div>
  	</div>
</div>
<div class='col-md-6'>
	<!-- Form Logo Perusahaan -->
	<div class="panel panel-primary">
    	<div class="panel-heading">
	      <h3 class="panel-title">Hasil Laporan</h3>
	    </div>
	    <div class='panel-body'>
		<form id='hasil-laporan' method='post' enctype="multipart/form-data">
			<input type='hidden' name='asdf' value='hello' />
			<div class='form-group' style='margin-bottom:0px;'>
			<?php if($get_detail['hasil_laporan']){ ?>
				<a href='assets/files/<?=$get_detail['hasil_laporan'];?>'><img class='logo-perusahaan' src="assets/images/pdf-icon.png" /> <?=$get_detail['hasil_laporan'];?></a><br>
			<?php } ?>
				<label pointer for='hasil_laporan'>
					Upload Laporan
				</label>
				<input id='hasil_laporan' type="file" name="hasil_laporan" class="form-control" accept="application/pdf" title="Upload Laporan">
				<a style='margin:10px 0px;' name='upload-laporan' class='btn btn-primary' disabled>Upload Laporan</a>
				<div style='margin:10px 0px;' class="progress" hidden>
			        <div class="progress-bar" role="progressbar" style="width:0%;"></div>
			    </div>
			</div>
	    </form>
	    </div>
	</div>
	<!-- Form sampul Perusahaan -->
	<!-- <div class="panel panel-primary">
    	<div class="panel-heading">
	      <h3 class="panel-title">Sampul Perusahaan</h3>
	    </div>
	    <div class='panel-body'>
		<form id='sampul-perusahaan' method='post' enctype="multipart/form-data">
			<div class='form-group' style='margin-bottom:0px;'>
				<label pointer for='sampul_perusahaan'>
					<img class='logo-perusahaan' src="assets/perusahaan/sampul/<?=img_default($get_detail['sampul_perusahaan'],'default.jpg');?>" />
				</label>
				<input id='sampul_perusahaan' type="file" name="sampul_perusahaan" class="form-control" accept="image/*" title="Upload Foto" hide>
				<a style='margin:10px 0px;' name='upload-sampul' class='btn btn-primary' disabled>Upload Foto</a>
				<div style='margin:10px 0px;' class="progress" hidden>
			        <div class="progress-bar" role="progressbar" style="width:0%;"></div>
			    </div>
			</div>
	    </form>
	    </div>
	</div> -->
</div>
<div class='col-md-12'>
	<!-- Form profile perusahaan -->
	<div class="panel panel-primary">
    	<div class="panel-heading">
	      <h3 class="panel-title">Profile Prakerin</h3>
	    </div>
	    <div class="panel-body">
	    	<form id='prakerin' method="post">
	    	<input type='hidden' name='edit_profil_prakerin' value='1' />
	    	<input type='hidden' name='user' value='<?=$get_detail['user'];?>' />
			<div class="form-group">
				<label>Nama Perusahaan</label>
				<input type="text" name="nama_perusahaan" class="form-control" value="<?=$get_detail['nama_perusahaan'];?>" placeholder="Nama Perusahaan">
			</div>
			<div class="form-group">
				<label>Judul Laporan</label>
				<input type="text" name="judul_laporan" class="form-control" value="<?=$get_detail['judul_laporan'];?>" placeholder="Judul Laporan">
			</div>
			<div class="form-group">
				<label>Tentang Prakerin</label>
				<textarea name="about_prakerin" class="form-control" placeholder="Tentang Prakerin"><?=$get_detail['about_prakerin'];?></textarea>
			</div>
			<div class="form-group input_siswa">
				<label>Nama Siswa <a pointer class='label label-success a' id='input_siswa'>+ siswa</a></label>
				<label>Link Alumni</label><br>
			<table style='width:100%'>
			<?php
			foreach($this->prakerin->get_kel_prakerin($id_user) as $r){ ?>
				<input type='hidden' name='id_siswa_prakerin[]' value="<?=$r['id_siswa_prakerin'];?>" />
					<tr>
						<td><input class='form-control' name='nama_siswa[]' value='<?=$r['nama_siswa_prakerin'];?>' placeholder='Nama Siswa'></td>
						<td><input class='form-control' name='id_alumni[]' value='<?=$r['id_siswa'];?>' placeholder='Id Alumni'></td>
						<td width='30px'><a rel-id='<?php echo $r['id_siswa_prakerin'];?>' delete='kel_prakerin' class='close'>×</a></td>
					</tr>
			<?php } ?>
			</table>
			</div>

			<div class="actions">
				<input type="submit" value="Edit!" class="btn btn-primary col-sm-12">
			</div>
			</form>
	    </div>
  	</div>
</div>
<div class='col-md-12'>
	<!-- Form Portofolio -->
	<div class="panel panel-primary">
		<div class="panel-heading">
	      <h3 class="panel-title">Gallery Prakerin  <a pointer class='label label-success' toggle='portofolio'>Tambah</a>
	      	<div class='btn-group' style='margin-left:70px'>
	      		<a status-id='<?=$id_user.".active";?>' status='gallery' class='btn btn-sm btn-active' style='right:63px'><i class='glyphicon glyphicon-ok-circle'></i> Aktifkan semua</a>
	      		<a status-id='<?=$id_user.".non";?>' status='gallery' class='btn btn-sm btn-default' style='right:63px'><i class='glyphicon glyphicon-ban-circle'></i> NonAktifkan semua</a>
	      	</div>
	      </h3>
	    </div>
	    <div class='panel-body'>
			<form id='portofolio' class='col-md-5' method='post' target-toggle='portofolio' enctype="multipart/form-data">
				<div class="form-group">
					<label>Judul Gallery</label>
					<input type="text" name="title_gallery" class="form-control" placeholder="Judul Gallery">
				</div>
				<div class='form-group'>
					<label>Multi Upload Gallery</label>
					<input type="file" name="img_prakerin[]" class="form-control" multiple accept="image/*" title="Upload Foto">
					<a style='margin:10px 0px;' name='gallery-prakerin' class='btn btn-primary col-md-12' disabled>Upload Gallery</a>
					<div class='cl'></div>
					<div style='margin:10px 0px;' class="progress" hidden>
				        <div class="progress-bar" role="progressbar" style="width:0%;"></div>
				    </div>
				</div>
	    		<legend></legend>
		    </form>
		    <div class='cl'></div>
			<div class="row">
			<?php foreach($this->prakerin->get_gallery($id_user) as $row_gallery){ 
					
				?>
		        <div class="col-sm-6 col-md-3">
		       	  <i><a rel-id='<?=$row_gallery['id_gallery'];?>' delete='gallery_prakerin' class='x btn btn-sm btn-danger'><i class='glyphicon glyphicon-remove'></i></a></i>
			<?php 
			if($this->session->userdata('role')=='admin'){
				if($row_gallery['status']=='active'){ ?>
		       	  <i><a status-id='<?=$row_gallery['id_gallery'].".non";?>' status='gallery_prakerin' class='x btn btn-sm btn-active' style='right:63px'><i class='glyphicon glyphicon-ok-circle'></i></a></i>
		       	<?php }else{ ?>
		       	  <i><a status-id='<?=$row_gallery['id_gallery'].".active";?>' status='gallery_prakerin' class='x btn btn-sm btn-default' style='right:63px'><i class='glyphicon glyphicon-ban-circle'></i></a></i>
		       	<?php }
		    }?>
		          <a title='<?=$row_gallery['title_gallery'];?>' href='assets/prakerin/<?=$row_gallery['img_gallery'];?>' class="thumbnail cb-portofolio">
		            <img src="assets/prakerin/<?=$row_gallery['thumb_gallery'];?>" style="height: 180px; width: 100%; display: block;">
		          </a>
		        </div>
		    <?php } ?>
		    </div>
			<script>
				$.get('assets/js/jquery.colorbox.js',function(){
					$('.cb-portofolio').colorbox({rel:"cb-portofolio-<?php echo $id_user;?>",width:"95%", height:"95%"});
				});
			</script>
	    </div>
	</div>
</div>
</div>
</div>
<script src='assets/js/page/perusahaan.js' ></script>