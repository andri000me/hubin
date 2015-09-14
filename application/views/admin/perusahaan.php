<script src='assets/js/validasi.js'></script>
<?php
if($aksi=='add'){
?>
	<legend>
		<h2>Tambah Perusahaan <a x href='<?=$link;?>' class='btn btn-inverse btn-xs'><i class='glyphicon glyphicon-arrow-left'></i> Back</a></h2>
	</legend>
	<!-- Form Perusahaan -->
	<form method="post" id='loker'>
		<?php $this->all->getMsg();?>
		<input type='hidden' name='add_loker' value='true' />

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
<?php }elseif($aksi=='detail'){ ?>
	<?php $this->load->view('front/detail_perusahaan');?>
<?php }elseif($aksi=='edit'){ ?>
	<div class='title'>
		<h3>Edit Profil <a x href='<?=$link;?>' class='btn btn-inverse btn-xs'><i class='glyphicon glyphicon-arrow-left'></i> Back</a></h3>
	</div>
	<?php $this->load->view('front/profile_perusahaan');?>
<?php }else{ ?>
<!--View Page-->
<div class='row'>
	<!--Menu Aksi-->
	<div class='row' style='margin-bottom:10px;padding:0px 15px;'>
		<a x href='<?=$link;?>add' class='btn btn-primary' style='margin:0px 0px 10px'>+ Tambah Perusahaan</a>
		<form class='form-inline pull-right' method="post">
			<input type='hidden' name='filter' value='true' />
			<div class="form-group">
				<label>Cari Perusahaan</label>
				<input type='text' class='form-control' name='search' value='<?=post('search');?>' placeholder='Nama Perusahaan'/>
			</div>
				
			<div class="form-group">
				<label>Minat Jurusan</label>
		<?php
			$sel_jurusan[''] = "Semua Jurusan";
			foreach($this->db->get('jurusan')->result_array() as $s){
				$sel_jurusan[$s['nama_jurusan']] = $s['nama_jurusan'];
			} 
			echo form_dropdown("minat_jurusan",$sel_jurusan,post('minat_jurusan'),"class='form-control'");
		?>
			</div>
				<button type="submit" class="btn btn-primary">Filter !</button>
		</form>
	</div>
	<table class="table">
	  <tr>
	    <th>No</th>
	    <th>Nama Perusahaan</th>
	    <th>Minat Jurusan</th>
	    <th width='300'>Aksi</th>
	  </tr>
	<?php
	if($get_perusahaan){
		foreach($get_perusahaan['data'] as $row){
	?>
		<tr>
			<td><?=$get_perusahaan['no']++;?></td>
			<td><?=$row['nama_perusahaan'];?></td>
			<td><?=$row['minat_jurusan'];?></td>
			<td>
				<div class='btn-group'>
					<a x href='<?=$link."detail/".$row['id_perusahaan']?>' class='btn btn-primary btn-sm'><i class='glyphicon glyphicon-list-alt'></i> Detail</a>
				<?php
					if($row['status']=='active'){
						echo "<a status-id='$row[id_perusahaan]' status='non' class='btn btn-active btn-sm'><i class='glyphicon glyphicon-ok-circle'></i> Active</a>";
					}else{
						echo "<a status-id='$row[id_perusahaan]' status='active' class='btn btn-default btn-sm'><i class='glyphicon glyphicon-ban-circle'></i> Non</a>";
					}
				?>
					<a x href='<?=$link."edit/".$row['id_perusahaan']?>' class='btn btn-info btn-sm'><i class='glyphicon glyphicon-edit'></i> Edit</a>
					<a pointer remove='<?=$row['id_perusahaan']?>' rel='siswa' class='btn btn-danger btn-sm'><i class='glyphicon glyphicon-remove'></i> Delete</a>
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