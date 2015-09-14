<script src='assets/js/validasi.js' ></script>
<?php if($aksi=='tentang'){ ?>
<div class='title'>
	<h3>Tentang Hubin <a x href='<?php echo $link;?>' class='btn btn-inverse btn-xs'><i class='glyphicon glyphicon-arrow-left'></i> Back</a></h3>
</div>
<form method="post" id='tentang'>
	<?php $this->all->getMsg();?>
	<input type='hidden' name='add_loker' value='true' />

	<div class="form-group">
		<label>Tentang Hubin</label>
		<textarea name="tentang_hubin" id='wysihtml5' style='height:200px' class="form-control"><?php echo $get_about['content_hubin'];?></textarea>
	</div>
	<div class="form-group">
		<button class='btn btn-primary'>Edit Tentang Hubin</button>
	</div>
</form>
<?php }elseif($aksi=="password"){ ?>
<div class='title'>
	<h3>Ganti Pasword <a x href='<?php echo $link;?>' class='btn btn-inverse btn-xs'><i class='glyphicon glyphicon-arrow-left'></i> Back</a></h3>
</div>
<form method="post" id='user'>
	<?php $this->all->getMsg();?>
	<input type='hidden' name='change_password' value='true' />

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
	<div class="form-group">
		<button class='btn btn-primary'>Edit Tentang Hubin</button>
	</div>
</form>
<?php }elseif($aksi=="quick_reg"){ ?>
<div class='title'>
	<h3>Ubah Kode Quick Regsiter <a x href='<?php echo $link;?>' class='btn btn-inverse btn-xs'><i class='glyphicon glyphicon-arrow-left'></i> Back</a></h3>
</div>
<form method="post" id='user'>
	<?php $this->all->getMsg();?>
	<input type='hidden' name='quick_reg' value='true' />

	<div class="form-group">
		<label>Kode Quick Register</label>
		<input type="text" name="config_kode" class="form-control" placeholder="Kode Quick Register" value='<?php echo $get_quick_register['config_kode'];?>'>
	</div>
	<div class="form-group">
		<button class='btn btn-primary'>Ubah Kode</button>
	</div>
</form>
<?php }else{ ?>
<div class='title'>
	<h3>Configurasi HUBIN</h3>
</div>
<div class='row'>
	<div class="col-sm-6">
      <div class="thumbnail">
        <img src="assets/img/register.jpg" style="width: 300px; height: 200px;">
        <div class="caption">
          <h3>Quick Register Alumni</h3>
          <div class='btn-group btn-group-justified'>
          	<a href="admin/index/quick_reg" class="btn btn-primary">Ubah Kode</a>
			<?php
				if($get_quick_register['config_status']=='active'){
					echo "<a status-id='$get_quick_register[config_name]' status='non' class='btn btn-active btn-sm'><i class='glyphicon glyphicon-ok-circle'></i> Active</a>";
				}else{
					echo "<a status-id='$get_quick_register[config_name]' status='active' class='btn btn-default btn-sm'><i class='glyphicon glyphicon-ban-circle'></i> Non</a>";
				}
			?>
          </div>
          <div class='cl'></div>
        </div>
      </div>
    </div>
	<div class="col-sm-6">
      <div class="thumbnail">
        <img src="assets/img/lock.png" style="width: 300px; height: 200px;">
        <div class="caption">
          <h3>Ganti Password</h3>
          <div><a href="admin/index/password" class="btn btn-primary col-md-12">Ganti Password</a></div>
          <div class='cl'></div>
        </div>
      </div>
    </div>
	<div class="col-sm-6">
      <div class="thumbnail">
        <img src="assets/img/hubin/about.png" style="width: 300px; height: 200px;">
        <div class="caption">
          <h3><?php echo $get_about['title_hubin'];?></h3>
          <div><a href="admin/index/tentang" class="btn btn-primary col-md-12">Edit Tentang Hubin</a></div>
          <div class='cl'></div>
        </div>
      </div>
    </div>
</div>
<?php } ?>