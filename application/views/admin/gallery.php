<script src='assets/js/validasi.js'></script>
<?php
	if($aksi=='add'){
	// Aksi Add
?>
	<legend>
		<h2>Tambah Album <a x href='<?=$link;?>' class='btn btn-inverse btn-xs'><i class='glyphicon glyphicon-arrow-left'></i> Back</a></h2>
	</legend>
	<!-- Form Perusahaan -->
	<form id='album' method="post" id='user' enctype="multipart/form-data">
		<?php $this->all->getMsg();?>
		<input type='hidden' name='add_siswa' value='true' />

		<div class="form-group">
			<label>Nama Album</label>
			<input type="text" name="nama_album" class="form-control" value="<?php echo post('nama_album');?>" placeholder="Nama Album">
		</div>
		<div class='form-group'>
			<label>Multi Upload Galery</label>
			<input type="file" name="img_album[]" class="form-control" multiple accept="image/*" title="Upload Foto">
			<div class='cl'></div>
			<div style='margin:10px 0px;' class="progress" hidden>
		        <div class="progress-bar" role="progressbar" style="width:0%;"></div>
		    </div>
		</div>

		<div class="actions">
			<a name='tambah_album' class="btn btn-primary" disabled>Tambah Album</a>
		</div>

	</form>
<?php
	}elseif($aksi=='edit'){
// Aksi Add
?>
	<legend>
		<h2>Edit Album <a x href='<?=$link;?>' class='btn btn-inverse btn-xs'><i class='glyphicon glyphicon-arrow-left'></i> Back</a></h2>
	</legend>
	<!-- Form Perusahaan -->
	<form id='album' method="post" id='user' enctype="multipart/form-data">
		<?php $this->all->getMsg();?>
		<input type='hidden' name='edit_album' value='true' />

		<div class="form-group">
			<label>Nama Album</label>
			<input type="text" name="nama_album" class="form-control" value="<?php echo $get_gallery['album']['nama_album'];?>" placeholder="Nama Album">
		</div>

		<div class="form-group">
			<button class="btn btn-primary">Edit Nama Album</button>
		</div>

		<div class='form-group'>
			<label>Multi Upload Gallery</label>
			<input type="file" name="add_img_album[]" class="form-control" multiple accept="image/*" title="Upload Foto">
			<div class='cl'></div>
			<div style='margin:10px 0px;' class="progress" hidden>
		        <div class="progress-bar" role="progressbar" style="width:0%;"></div>
		    </div>
		</div>

		<div name='tambah_gallery' class="form-group" hidden>
			<a class="btn btn-primary">Tambah Gallery</a>
		</div>

	</form>
	<legend></legend>
<?php
if($get_gallery['data']){
	foreach($get_gallery['data'] as $row){ ?>
		<div class="col-sm-6 col-md-3">
		  <i><a rel-id='<?php echo $row['id_gallery'];?>' delete='gallery' class='x btn btn-sm btn-danger'><i class='glyphicon glyphicon-remove'></i></a></i>
          <a title="<?php echo $get_gallery['album']['nama_album'];?>" href='assets/gallery/<?php echo $row['img_gallery'];?>' class="thumbnail cb-gallery">
            <img src="assets/gallery/<?php echo $row['thumb_gallery'];?>" style="height: 180px; width: 100%; display: block;">
          </a>
        </div>
<?php
	}
}
?>
	<script>
	$.get('assets/js/jquery.colorbox.js',function(){
		$('.cb-gallery').colorbox({rel:"cb-gallery-<?php echo $id_album;?>",width:"95%", height:"95%"});
	});
	</script>
<?php
	}elseif($aksi=='view'){
?>
<div class='row'>
	<legend>
		<h2><?=$get_gallery['album']['nama_album'];?> <small>Tanggal : <?=$get_gallery['album']['tgl_album'];?></small>
		<a x href='<?=$link;?>' class='btn btn-inverse btn-xs'><i class='glyphicon glyphicon-arrow-left'></i> Back</a></h2>
	</legend>
<?php
if($get_gallery['data']){
	foreach($get_gallery['data'] as $row){ ?>
		<div class="col-sm-6 col-md-3">
          <a title="<?php echo $get_gallery['album']['nama_album'];?>" href='assets/gallery/<?php echo $row['img_gallery'];?>' class="thumbnail cb-gallery">
            <img src="assets/gallery/<?php echo $row['thumb_gallery'];?>" style="height: 180px; width: 100%; display: block;">
          </a>
        </div>
<?php
	}
}
?>
	<script>
	$.get('assets/js/jquery.colorbox.js',function(){
		$('.cb-gallery').colorbox({rel:"cb-gallery-<?php echo $id_album;?>",width:"95%", height:"95%"});
	});
	</script>
</div>
<?php
	}else{
?>
<!--View Page-->
<div class='row'>
	<!--Menu Aksi-->
	<div class='row' style='margin-bottom:10px;padding:0px 15px;'>
		<a x href='<?=$link;?>add' class='btn btn-primary col-md-2' style='margin:0px 0px 10px'>+ Tambah Album</a>
		<form class='form-inline pull-right' method="post">
			<input type='hidden' name='filter' value='true' />
			<div class="form-group">
				<label>Search</label>
				<input type='text' name='search' class='form-control' value='<?=post('search');?>' placeholder='Nama Album' />
			</div>
				<button type="submit" class="btn btn-primary">Search !</button>
		</form>
	</div>
	<table class="table">
	  <tr>
	    <th width='50px'>No</th>
	    <th>Nama Album</th>
	    <th width='200px'>Aksi</th>
	  </tr>
	<?php
	if($get_album){
		foreach($get_album['data'] as $row){
	?>
		<tr>
			<td><?=$get_album['no']++;?></td>
			<td><a x href='<?=$link."view/".$row['id_album'];?>'><?=$row['nama_album'];?></a></td>
			<td>
				<div class='btn-group'>
					<a href='<?=$link."edit/".$row['id_album'];?>' class='btn btn-info btn-sm'><i class='glyphicon glyphicon-edit'></i> Edit</a>
					<a pointer remove='<?=$row['id_album']?>' rel='album' class='btn btn-danger btn-sm'><i class='glyphicon glyphicon-remove'></i> Delete</a>
				</div>
			</td>
		</tr>
	<?php
		}
	}
	?>
	</table>
	<?php echo $this->pagination->create_links(); ?>
</div>
<?php
	}
?>
<script src='assets/js/page/admin_album.js' ></script>