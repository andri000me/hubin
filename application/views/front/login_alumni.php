<script src='assets/js/validasi.js' ></script>

<div class='col-md-6 pull-right'>
	<legend>
		<h2>Ketentuan Login</h2>
	</legend>
<blockquote class='notification'><span class='label label-warning'>Login!</span> hanya diperuntukan oleh siswa yang telah <span class='label label-success'>lulus</span> di SMK ADI Sanggoro.
<span class='label label-primary'>Akun Alumni</span> yang telah <span class='label label-success'>disetujui</span> oleh pihak Hubungan Industri (HUBIN) SMK ADI SANGGORO.
</blockquote>
</div>
<div class='col-md-6'>
	<ul id="myTab" class="nav nav-tabs" style='margin:0px 0px 10px'>
		<li class=""><a x href="front/login/perusahaan">Login Perusahaan</a></li>
		<li class="active"><a x href="front/login/alumni">Login Alumni</a></li>
	</ul>
	<!-- Form Perusahaan -->
	<form id='login' method="post">
		<?php $this->all->getMsg();?>
		<input type='hidden' name='login-alumni' value='true' />
		<div class="form-group">
			<label>Username</label>
			<input type="text" name="user" class="form-control" value="<?php echo post('user');?>" placeholder="Username">
		</div>
			
		<div class="form-group">
			<label>Password</label>
			<input type="password" name="pass" class="form-control" placeholder="Password">
		</div>

		<div class="form-group">
			<a x href='front/daftar/alumni'>Register !</a>
		</div>

		<div class="actions">

			<button type="submit" class="btn btn-primary col-sm-12">Login!</button>

		</div>

	</form>
</div>