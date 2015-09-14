<script src='assets/js/validasi.js' ></script>
<div class='col-md-6 col-md-offset-3'>
	<legend>
		<h3>Login Admin</h3>
	</legend>
	<?php $this->all->getMsg(); ?>
	<form method="post" id='login'>
		<input type='hidden' name='login' value='true' />
		<div class="form-group">
			<input type="text" name="user" class="form-control" value="" placeholder="username">
		</div>
			
		<div class="form-group">
			<input type="password" name="pass" class="form-control" value="" placeholder="password">
		</div>

		<div class="actions">

			<button type="submit" class="btn btn-primary col-sm-12">Login!</button>

		</div>

	</form>
</div>