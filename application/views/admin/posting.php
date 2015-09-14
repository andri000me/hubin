<script src='assets/js/validasi.js'></script>
<?php
if($aksi=='add'||$aksi=='edit'){
	$act = "Tambah";
	$row = array('title_posting'=>post('title_posting'),'content_posting'=>post('content_posting'));
	if($aksi=='edit'){
		$this->db->where('id_posting',$id);
		$row = $this->db->get('posting')->row_array();
		$act = "Edit";
	}
?>
<!--Add Page-->
<div class='row'>
	<div class='title'>
		<h3><?=$act?> Posting <a x href='<?=$link;?>' class='btn btn-inverse btn-xs'><i class='glyphicon glyphicon-arrow-left'></i> Back</a></h3>
	</div>
	<?php $this->all->getMsg();?>
	<form id='posting' method='post'>
		<input type='hidden' name='<?=$aksi;?>' value='1' />
		<div class='form-group'>
			<label>Judul Posting</label>
			<input type='text' name='title_posting' class='form-control' value='<?=$row['title_posting'];?>' placeholder='Judul Posting' />
		</div>
		<div class='form-group'>
			<label>Content Posting</label>
			<textarea id='wysihtml5' style='height:150px' name='content_posting' class='form-control' placeholder='Content Posting'><?=$row['content_posting'];?></textarea>
		</div>
		<button type='submit' class='btn btn-primary'><?=$act?> Posting</button>
	</form>
</div>
<?php }else{ ?>
<!--View Page-->
<div class='row'>
	<!--Menu Aksi-->
	<div class='row' style='margin-bottom:10px;padding:0px 15px;'>
		<a x href='<?=$link;?>add' class='btn btn-success col-md-2' style='margin:0px 0px 10px'>+ Tambah Posting</a>
		<form class='form-inline pull-right' method='post'>
			<label>Search</label>
			<input class='form-control' type='text' name='search' value='<?=post('search');?>' placeholder="Judul Posting" />
			<button type='submit' class='btn btn-primary'>Search!!</button>
		</form>
	</div>
	<table class="table">
	  <tr>
	    <th>No</th>
	    <th>Judul Posting</th>
	    <th>Tanggal Posting</th>
	    <th width='230px'>Aksi</th>
	  </tr>
	<?php
	if($get_posting){
		foreach($get_posting['data'] as $row){
	?>
		<tr>
			<td><?=$get_posting['no']++;?></td>
			<td><?=$row['title_posting'];?></td>
			<td><?=$row['date_posting'];?></td>
			<td>
				<div class='btn-group'>
				<?php
					if($row['status']=='active'){
						echo "<a status-id='$row[id_posting]' status='non' class='btn btn-active btn-sm'><i class='glyphicon glyphicon-ok-circle'></i> Active</a>";
					}else{
						echo "<a status-id='$row[id_posting]' status='active' class='btn btn-default btn-sm'><i class='glyphicon glyphicon-ban-circle'></i> Non</a>";
					}
				?>
					
					<a x href='<?=$link."edit/".$row['id_posting']?>' class='btn btn-info btn-sm'><i class='glyphicon glyphicon-edit'></i> Edit</a>
					<a pointer remove='<?=$row['id_posting']?>' rel='posting' class='btn btn-danger btn-sm'><i class='glyphicon glyphicon-remove'></i> Delete</a>
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
<?php } ?>