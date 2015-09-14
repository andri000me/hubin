<script src='assets/js/validasi.js' ></script>
<div class='row' style='padding:0px 15px'>
<?php $this->all->getMsg();?>
<div class='col-md-6'>
	<!-- Form user perusahaan -->
	<div class="panel panel-primary">
    	<div class="panel-heading">
	      <h3 class="panel-title">User Perusahaan</h3>
	    </div>
	    <div class="panel-body">
	    	<form id='user' method="post">
	    	<input type='hidden' name='edit-profil' value='1' />
			<div class="form-group">
				<label>Username</label>
				<input type="text" name="user" class="form-control" value="<?php echo $get_detail['user'];?>" placeholder="Username" disabled>
			</div>
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
	      <h3 class="panel-title">Logo Perusahaan</h3>
	    </div>
	    <div class='panel-body'>
		<form id='logo-perusahaan' method='post' enctype="multipart/form-data">
			<div class='form-group' style='margin-bottom:0px;'>
				<label pointer for='logo_perusahaan'>
					<img class='logo-perusahaan' src="assets/perusahaan/logo/<?=img_default($get_detail['logo_perusahaan'],'default.png');?>" />
				</label>
				<input id='logo_perusahaan' type="file" name="logo_perusahaan" class="form-control" accept="image/*" title="Upload Foto" hide>
				<a style='margin:10px 0px;' name='upload-logo' class='btn btn-primary' disabled>Upload Foto</a>
				<div style='margin:10px 0px;' class="progress" hidden>
			        <div class="progress-bar" role="progressbar" style="width:0%;"></div>
			    </div>
			</div>
	    </form>
	    </div>
	</div>
	<!-- Form sampul Perusahaan -->
	<div class="panel panel-primary">
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
	</div>
</div>
<div class='col-md-12'>
	<!-- Form profile perusahaan -->
	<div class="panel panel-primary">
    	<div class="panel-heading">
	      <h3 class="panel-title">Profile Perusahaan</h3>
	    </div>
	    <div class="panel-body">
	    	<form id='user' method="post">
	    	<input type='hidden' name='profile-perusahaan' value='1' />
			<div class="form-group">
				<label>Nama Perusahaan</label>
				<input type="text" name="nama_perusahaan" class="form-control" value="<?php echo $get_detail['nama_perusahaan'];?>" placeholder="Nama Perusahaan">
			</div>

			<div class="form-group">
				<label>Email Perusahaan</label>
				<input type="email" name="email_perusahaan" class="form-control" value="<?php echo $get_detail['email_perusahaan'];?>" placeholder="Email Perusahaan">
			</div>

			<div class="form-group">
				<label>Link Perusahaan</label>
				<input type="text" name="link_perusahaan" class="form-control" value="<?php echo $get_detail['link_perusahaan'];?>" placeholder="Link Perusahaan">
			</div>

			<div class="form-group">
				<label>Telepon Perusahaan</label>
				<input type="text" name="tlp_perusahaan" class="form-control" value="<?php echo $get_detail['tlp_perusahaan'];?>" placeholder="Telepon Perusahaan">
			</div>

			<div class="form-group">
				<label>Alamat Perusahaan</label>
				<textarea class='form-control' name='alamat_perusahaan' placeholder='Alamat Perusahaan'><?php echo $get_detail['alamat_perusahaan'];?></textarea>
			</div>

			<div class="form-group">
				<label>Tentang Perusahaan</label>
				<textarea id='wysihtml5' class='form-control' name='about_perusahaan' placeholder='Tentang Perusahaan'><?php echo $get_detail['about_perusahaan'];?></textarea>
			</div>

			<div class="form-group">
				<label>Minat Jurusan</label>
			<?php
			foreach($this->db->get('jurusan')->result_array() as $s){
				$sel="";
				foreach(explode("/",$get_detail['minat_jurusan']) as $a){
					if($a == $s['nama_jurusan']){$sel="checked";}
				}
			?>
				<div class="checkbox" style='display:table-cell;width:24%'>
			        <label>
			          <input <?=$sel;?> type="checkbox" name='minat_jurusan[]' value='<?=$s['nama_jurusan'];?>'> <?=$s['nama_jurusan'];?>
			        </label>
			    </div>
			<?php } ?>
			</div>

			<div class="actions">
				<input type="submit" value="Edit!" class="btn btn-primary col-sm-12">
			</div>
			</form>
	    </div>
  	</div>
</div>
</div>
<script src='assets/js/page/perusahaan.js' ></script>