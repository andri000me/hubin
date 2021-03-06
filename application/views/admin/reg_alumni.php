<link href='assets/css/tooltipster.css' rel='stylesheet'>

<script src='assets/js/jquery.tooltipster.js'></script>
<script src='assets/js/validasi.js'></script>
<script>
$(function(){
	$('.tooltips').tooltipster({
	   position : 'right',
	   contentAsHTML: true,
	   animation: 'fade',
	   delay: 200,
	   maxWidth : 300,
	   theme: 'tooltipster-default',
	   touchDevices: false,
	   trigger: 'hover'
	});
});
</script>
<?php
if($aksi=='add'){
?>
	<legend>
		<h2>Tambah Alumni <a x href='<?=$link;?>' class='btn btn-inverse btn-xs'><i class='glyphicon glyphicon-arrow-left'></i> Back</a></h2>
	</legend>
	<!-- Form Perusahaan -->
	<form method="post" id='user'>
		<?php $this->all->getMsg();?>
		<input type='hidden' name='add_siswa' value='true' />

		<div class="form-group">
			<label>Jurusan</label>
			<?php
				foreach($this->db->get('jurusan')->result_array() as $s){
					$sel_jurusan[$s['id_jurusan']] = $s['nama_jurusan'];
				}
				echo form_dropdown("id_jurusan",$sel_jurusan,post('id_jurusan'),"class='form-control'");
			?>
		</div>

		<div class="form-group">
			<label>Lulusan</label>
			<?php
				foreach($this->db->get('ta')->result_array() as $k){
					$lulusan = $k['lulusan'];
					$sel_ta["$k[hast_ta]"] = $k['lulusan'];
				}
				echo form_dropdown("lulusan",$sel_ta,post('lulusan'),"class='form-control'");
			?>
		</div>
		<div class="form-group">
			<label>Username</label>
			<div class='table-cell' style='width:20%'>
				<input type='hidden' name='salt' />
				<input style='width:90%' type="text" name="salt" class="form-control" placeholder='Salt' disabled>
			</div>
			<div class='table-cell'>
				<input type="text" name="user" class="form-control" value="<?=post('user');?>" placeholder="Username">
			</div>
		</div>
		<script>
		// Auto Load
		$salt = $("[name='lulusan']").val()+0+$("[name='id_jurusan']").val();
		$("[name='salt']").val($salt);
		$("[name='id_jurusan'],[name='lulusan']").change(function(){
			$salt = $("[name='lulusan']").val()+0+$("[name='id_jurusan']").val();
			$("[name='salt']").val($salt);
		});
		</script>
			
		<div class="form-group">
			<label>Password</label>
			<input type="password" id='pass' name="pass" class="form-control" placeholder="Password">
		</div>

		<div class="form-group">
			<label>Retype Password</label>
			<input type="password" name="re_pass" class="form-control" placeholder="Retype Password">
		</div>

		<div class="form-group">
			<label>Nama Lengkap</label>
			<input type="text" name="nama_siswa" class="form-control" value="<?php echo post('nama_siswa');?>" placeholder="Nama">
		</div>

		<div class="actions">
			<button type="submit" class="btn btn-primary col-sm-12">Daftar!</button>
		</div>

	</form>
<?php }elseif($aksi=='detail'){ ?>
	<?php $this->load->view('front/cv_alumni');?>
<?php }elseif($aksi=='edit'){ ?>
	<div class='title'>
		<h3>Edit Profil <a x href='<?=$link;?>' class='btn btn-inverse btn-xs'><i class='glyphicon glyphicon-arrow-left'></i> Back</a></h3>
	</div>
	<?php $this->load->view('front/profil_alumni');?>
<?php }else{ ?>
<!--View Page-->
<div class='row'>
	<!--Menu Aksi-->
	<div class='row' style='margin-bottom:10px;padding:0px 15px;'>
		<a x href='<?=$link;?>add' class='btn btn-primary' style='margin:0px 0px 10px'>+ Tambah Alumni</a>
		<form class='form-inline pull-right' method="post">
			<input type='hidden' name='filter' value='true' />
			<div class="form-group">
				<label>Search</label>
				<input type='text' class='form-control' style='width:150px' name='search' value='<?=post('search');?>' placeholder='Nama' />
			</div>
			<div class="form-group">
				<label>Lulusan</label>
		<?php
			$sel_ta[''] = "Semua Lulusan";
			foreach($this->db->get('ta')->result_array() as $s){
				$sel_ta[$s['id_ta']] = $s['lulusan'];
			} 
			echo form_dropdown("id_ta",$sel_ta,post('id_ta'),"class='form-control'");
		?>
			</div>
				
			<div class="form-group">
				<label>Jurusan</label>
		<?php
			$sel_jurusan[''] = "Semua Jurusan";
			foreach($this->db->get('jurusan')->result_array() as $s){
				$sel_jurusan[$s['id_jurusan']] = $s['nama_jurusan'];
			} 
			echo form_dropdown("id_jurusan",$sel_jurusan,post('id_jurusan'),"class='form-control'");
		?>
			</div>
				<button type="submit" class="btn btn-primary">Filter !</button>
		</form>
	</div>
	<table class="table">
	  <tr>
	    <th width="50px">No</th>
	    <th>Nama</th>
	    <th>Lulusan</th>
	    <th>Jurusan</th>
	    <th width='200'>Aksi</th>
	  </tr>
	<?php
	if($get_reg_alumni['data']){
		foreach($get_reg_alumni['data'] as $row){
		$tooltips = "&lt;img src=&quot;assets/foto/$row[foto_siswa]&quot; style=&quot;width:100px;height:100px;float:left;margin-right:5px&quot; /&gt; $row[pesan_reg]";
	?>
		<tr>
			<td><?=$get_reg_alumni['no']++;?></td>
			<td><a class='tooltips' title='<?=$tooltips;?>'><?=$row['nama_siswa'];?></a></td>
			<td><?=$row['lulusan'];?></td>
			<td><?=$row['nama_jurusan'];?></td>
			<td>
				<div class='btn-group'>
					<a reg-id='<?=$row['id_siswa'];?>' reg-status='active' class='btn btn-primary btn-sm'><i class='glyphicon glyphicon-list-alt'></i> Terima</a>
					<a pointer remove='<?=$row['id_siswa']?>' rel='siswa' class='btn btn-danger btn-sm'><i class='glyphicon glyphicon-remove'></i> Delete</a>
				</div>
			</td>
		</tr>
	<?php
		}
	}else{ ?>
		<tr>
			<td colspan='5' align="center"><h3>Tidak ada data alumni yang <b>mendaftar</b></h3></td>
		</tr>
	<?php }
	?>
	</table>
	<?php echo $this->pagination->create_links(); ?>
</div>
<?php } ?>