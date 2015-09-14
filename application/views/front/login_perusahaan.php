<script src='assets/js/validasi.js' ></script>

<div class='col-md-6 pull-right'>
	<legend>
		<h2>Ketentuan Login</h2>
	</legend>
	<blockquote>
		 Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet 
		 dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit 
		 lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit 
		 esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero 
	</blockquote>
</div>
<div class='col-md-6'>
	<ul id="myTab" class="nav nav-tabs" style='margin:0px 0px 10px'>
		<li class="active"><a x href="front/login/perusahaan">Login Perusahaan</a></li>
		<li class=""><a x href="front/login/alumni">Login Alumni</a></li>
	</ul>
	<!-- Form Perusahaan -->
	<form method="post">
		<?php $this->all->getMsg();?>
		<input type='hidden' name='login-perusahaan' value='true' />
		<div class="form-group">
			<label>Username</label>
			<input type="text" name="user" class="form-control" value="<?php echo post('user');?>" placeholder="Username">
		</div>
			
		<div class="form-group">
			<label>Password</label>
			<input type="password" name="pass" class="form-control" placeholder="Password">
		</div>

		<div class="form-group">
			<a x href='front/daftar/perusahaan'>Register !</a>
		</div>

		<div class="actions">

			<button type="submit" class="btn btn-primary col-sm-12">Login!</button>

		</div>

	</form>
</div>