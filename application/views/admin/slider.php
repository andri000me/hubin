<script src='assets/js/validasi.js'></script>
<?php
if($aksi=='add'||$aksi=='edit'){
	  if($aksi=="add"){
	    $title = "Tambah";
	    $act = "add_slider";
	  }
	  if($aksi=="edit"){
	    $title = "Edit";
	    $act = "edit_slider";
	    $_POST = $get_detail;
	  }
?>
<!--Add Page-->
<div class='row' style='padding:0px 15px'>
	<legend>
		<h2><?=$title;?> Slider <a x href='<?=$link;?>' class='btn btn-inverse btn-xs'><i class='glyphicon glyphicon-arrow-left'></i> Back</a></h2>
	</legend>
	<!-- Form Perusahaan -->
	<form id='slider' method="post" enctype="multipart/form-data">
		<?php $this->all->getMsg();?>
		<input type='hidden' name='<?=$act;?>' value='true' />

		<div class='form-group'>
		<?php if($aksi=="edit"){ ?>
			<label pointer for='edit_img_slider'><img src='assets/slider/<?=post('img_slider');?>' style='max-height:200px' /> 
			Upload Slider</label>
			<input id='edit_img_slider' style='margin:10px 0px' type="file" name="edit_img_slider" class="form-control" accept="image/*" title="Upload Foto">
			<a name='upload_slider' class="btn btn-primary" style='margin-top:10px'><?=$title;?> Slider</a>
		<?php }else{ ?>
			<label>Upload Slider</label>
			<input type="file" name="img_slider" class="form-control" accept="image/*" title="Upload Foto">
		<?php } ?>
			<div class='cl'></div>
			<div style='margin:10px 0px;' class="progress" hidden>
		        <div class="progress-bar" role="progressbar" style="width:0%;"></div>
		    </div>
		</div>
		<div class="form-group">
			<label>Content Slider</label>
			<textarea name="content_slider" id='wysihtml5' style='height:150px' class="form-control" placeholder="Content Slider"><?=post('content_slider');?></textarea>
		</div>

		<div class="actions">
		<?php if($aksi=="edit"){ ?>
			<button class="btn btn-primary"><?=$title;?> Content Slider</button>
		<?php }else{ ?>
			<a name='tambah_slider' class="btn btn-primary" disabled><?=$title;?> Slider</a>
		<?php } ?>
		</div>

	</form>
</div>
<?php }else{ ?>
<!--View Page-->
<div class='row' style='padding:0px 15px'>
	<div class='title'>
		<h3>Content Slider <a href='<?=$link."add";?>' class='label label-success'>+ Tambah Slider</a></h3>
	</div>
	<!-- Image Slider -->
	<div class="row">
	<?php
	if($get_slider){
		foreach($get_slider as $row_slider){ 
	?>
	        <div class="col-sm-12 col-md-6">
	       	  <i><a title='Delete' rel-id='<?=$row_slider['id_slider'];?>' delete='slider' class='x btn btn-sm btn-danger'><i class='glyphicon glyphicon-remove'></i></a></i>
		<?php 
		if($this->session->userdata('role')=='admin'){?>
			  <i><a title='Edit' href='<?=$link."edit/".$row_slider['id_slider'];?>' class='x btn btn-sm btn-info' style='right:101px'><i class='glyphicon glyphicon-edit'></i></a></i>
		<?php if($row_slider['status']=='active'){ ?>
	       	  <i><a title='Non Active' status-id='<?=$row_slider['id_slider'].".non";?>' status='slider' class='x btn btn-sm btn-active' style='right:63px'><i class='glyphicon glyphicon-ok-circle'></i></a></i>
	       	<?php }else{ ?>
	       	  <i><a title='Active' status-id='<?=$row_slider['id_slider'].".active";?>' status='slider' class='x btn btn-sm btn-default' style='right:63px'><i class='glyphicon glyphicon-ban-circle'></i></a></i>
	       	<?php }
	    }?>
	          <a title='Content Slider' href='assets/slider/<?=$row_slider['img_slider'];?>' class="thumbnail cb-slider">
	            <img src="assets/slider/<?=$row_slider['img_slider'];?>" style="height: 180px; width: 100%; display: block;">
	          </a>
	        </div>
	    <?php }
	}
	?>
		<script>
			$.get('assets/js/jquery.colorbox.js',function(){
				$('.cb-slider').colorbox({rel:"cb-slider",width:"95%", height:"95%"});
			});
		</script>
	</div>
</div>
<?php } ?>
<script src='assets/js/page/admin_slider.js' ></script>