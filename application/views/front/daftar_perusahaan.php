<script src='assets/js/validasi.js' ></script>

<div class='col-md-6 pull-right'>
	<legend>
		<h2>Ketentuan Daftar</h2>
	</legend>
	<blockquote>
		 Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet 
		 dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit 
		 lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit 
		 esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero 
	</blockquote>
</div>
<div class='col-md-6'>
	<legend>
		<h2>Daftar Perusahaan <a x href="front/login/perusahaan" class='btn btn-inverse btn-xs'><i class='glyphicon glyphicon-arrow-left'></i> Login</a></h2>
	</legend>
	<!-- Form Perusahaan -->
	<form method="post" id='perusahaan'>
		<?php $this->all->getMsg();?>
		<input type='hidden' name='daftar_perusahaan' value='true' />

		<div class="form-group">
			<label>Username</label>
			<input type="text" name="user" class="form-control" value="<?php echo post('user');?>" placeholder="Username">
		</div>
			
		<div class="form-group">
			<label>Password</label>
			<input type="password" id='pass' name="pass" class="form-control" placeholder="Password">
		</div>

		<div class="form-group">
			<label>Retype Password</label>
			<input type="password" name="re_pass" class="form-control" placeholder="Retype Password">
		</div>

		<div class="form-group">
			<label>Nama Perusahaan</label>
			<input type="text" name="nama_perusahaan" class="form-control" value="<?php echo post('nama_perusahaan');?>" placeholder="Nama Perusahaan">
		</div>

		<div class="form-group">
			<label>Email Perusahaan</label>
			<input type="email" name="email_perusahaan" class="form-control" value="<?php echo post('email_perusahaan');?>" placeholder="Email Perusahaan">
		</div>

		<div class="form-group">
			<label>Link Perusahaan</label>
			<input type="text" name="link_perusahaan" class="form-control" value="<?php echo post('link_perusahaan');?>" placeholder="Link Perusahaan">
		</div>

		<div class="form-group">
			<label>Telepon Perusahaan</label>
			<input type="text" name="tlp_perusahaan" class="form-control" value="<?php echo post('tlp_perusahaan');?>" placeholder="Telepon Perusahaan">
		</div>

		<div class="form-group">
			<label>Alamat Perusahaan</label>
			<textarea class='form-control' name='alamat_perusahaan' placeholder='Alamat Perusahaan'><?php echo post('alamat_perusahaan');?></textarea>
		</div>

		<div class="form-group">
			<label>Tentang Perusahaan</label>
			<textarea class='form-control' name='about_perusahaan' placeholder='Tentang Perusahaan'><?php echo post('about_perusahaan');?></textarea>
		</div>

		<div class="form-group">
			<label>Minat Jurusan</label>
		<?php
		foreach($this->db->get('jurusan')->result_array() as $s){
		?>
			<div class="checkbox" style='display:table-cell;width:24%'>
		        <label>
		          <input type="checkbox" name='minat_jurusan[]' value='<?=$s['nama_jurusan'];?>'> <?=$s['nama_jurusan'];?>
		        </label>
		    </div>
		<?php } ?>
		</div>
		<div class="actions">
			<button type="submit" class="btn btn-primary col-sm-12">Daftar!</button>
		</div>

	</form>
</div>