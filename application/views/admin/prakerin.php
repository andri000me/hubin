<script src='assets/js/validasi.js'></script>
<?php
if($aksi=='add'){
?>
	<legend>
		<h2>Tambah Prakerin <a x href='<?=$link;?>' class='btn btn-inverse btn-xs'><i class='glyphicon glyphicon-arrow-left'></i> Back</a></h2>
	</legend>
	<!-- Form Perusahaan -->
	<form method="post" id='prakerin'>
		<?php $this->all->getMsg();?>
		<input type='hidden' name='add_prakerin' value='true' />
		<div class="form-group">
			<label>Tahun</label>
			<?php
				foreach($this->db->get('ta')->result_array() as $k){
					$lulusan = $k['lulusan'];
					$sel_ta["$k[hast_ta]"] = $k['lulusan'];
				}
				echo form_dropdown("tahun",$sel_ta,post('tahun'),"class='form-control'");
			?>
		</div>
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
		$salt = $("[name='tahun']").val()+0+$("[name='id_jurusan']").val();
		$("[name='salt']").val($salt);
		$("[name='id_jurusan'],[name='tahun']").change(function(){
			$salt = $("[name='tahun']").val()+0+$("[name='id_jurusan']").val();
			$("[name='salt']").val($salt);
		});
		</script>
			
		<!-- <div class="form-group">
			<label>Password</label>
			<input type="password" id='pass' name="pass" class="form-control" placeholder="Password">
		</div>

		<div class="form-group">
			<label>Retype Password</label>
			<input type="password" name="re_pass" class="form-control" placeholder="Retype Password">
		</div> -->

		<div class="form-group">
			<label>Nama Perusahaan</label>
			<input type="text" name="nama_perusahaan" class="form-control" value="<?php echo post('nama_perusahaan');?>" placeholder="Nama Perusahaan">
		</div>
		<!-- <div class="form-group">
			<label>Judul Laporan</label>
			<input type="text" name="judul_laporan" class="form-control" value="<?php echo post('judul_prakerin');?>" placeholder="Judul Prakerin">
		</div>

		<div class="form-group">
			<label>Tentang Prakerin</label>
			<textarea class='form-control' name='about_prakerin' placeholder='Tentang Perusahaan'><?php echo post('about_prakerin');?></textarea>
		</div> -->

		<div class="form-group input_siswa">
			<label>Nama Siswa <a pointer class='label label-success a' id='input_siswa'>+ siswa</a></label>
			<label>Link Alumni</label><br>
		<table style='width:100%'>
			<tr>
				<td><input class='form-control' name='nama_siswa[]' placeholder='Nama Siswa'></td>
				<td><input class='form-control' name='id_alumni[]' placeholder='Id Alumni'></td>
				<td width='30px'></td>
			</tr>
		</table>
		</div>
		<div class="actions">
			<button type="submit" class="btn btn-primary col-sm-12">Tambah User Prakerin!</button>
		</div>

	</form>
<?php }elseif($aksi=='detail'){ ?>
	<?php $this->load->view('front/detail_prakerin');?>
<?php }elseif($aksi=='edit'){ ?>
	<div class='title'>
		<h3>Edit Profil Prakerin <a x href='<?=$link;?>' class='btn btn-inverse btn-xs'><i class='glyphicon glyphicon-arrow-left'></i> Back</a></h3>
	</div>
	<?php $this->load->view('front/profile_prakerin');?>
<?php }else{ ?>
<!--View Page-->
<div class='row'>
	<!--Menu Aksi-->
	<div class='row' style='margin-bottom:10px;padding:0px 15px;'>
		<a x href='<?=$link;?>add' class='btn btn-primary' style='margin:0px 0px 10px'>+ Tambah Prakerin</a>
		<form class='form-inline pull-right' method="post">
			<input type='hidden' name='filter' value='true' />
			<div class="form-group">
				<label>Judul Laporan</label>
				<input type='text' class='form-control' name='search' value='<?=post('search');?>' placeholder='Judul Laporan'/>
			</div>
				
			<div class="form-group">
				<label>Tahun</label>
		<?php
			$sel_ta[''] = "Tahun";
			foreach($this->db->get('ta')->result_array() as $s){
				$sel_ta[$s['lulusan']] = $s['lulusan'];
			} 
			echo form_dropdown("tahun",$sel_ta,post('tahun'),"class='form-control'");
		?>
			</div>

			<div class="form-group">
				<label>Tahun</label>
		<?php
			$sel_jurusan[''] = "Jurusan";
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
	    <th>No</th>
	    <th>Judul Laporan</th>
	    <th>Perusahaan</th>
	    <th>Jurusan</th>
	    <th>Tahun</th>
	    <th width='300'>Aksi</th>
	  </tr>
	<?php
	if($get_prakerin){
		foreach($get_prakerin['data'] as $row){
	?>
		<tr>
			<td><?=$get_prakerin['no']++;?></td>
			<td><?=$row['judul_laporan'];?></td>
			<td><?=$row['nama_perusahaan'];?></td>
			<td><?=$row['nama_jurusan'];?></td>
			<td><?=$row['lulusan'];?></td>
			<td>
				<div class='btn-group'>
					<a x href='<?=$link."detail/".$row['id_prakerin']?>' class='btn btn-primary btn-sm'><i class='glyphicon glyphicon-list-alt'></i> Detail</a>
				<?php
					if($row['status_prakerin']=='active'){
						echo "<a status-id='$row[id_prakerin].non' status='prakerin' class='btn btn-active btn-sm'><i class='glyphicon glyphicon-ok-circle'></i> Active</a>";
					}else{
						echo "<a status-id='$row[id_prakerin].active' status='prakerin' class='btn btn-default btn-sm'><i class='glyphicon glyphicon-ban-circle'></i> Non</a>";
					}
				?>
					<a x href='<?=$link."edit/".$row['id_prakerin']?>' class='btn btn-info btn-sm'><i class='glyphicon glyphicon-edit'></i> Edit</a>
					<a pointer remove='<?=$row['id_prakerin']?>' rel='prakerin' class='btn btn-danger btn-sm'><i class='glyphicon glyphicon-remove'></i> Delete</a>
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
<script src='assets/js/autocompleter/autocompleter.js'></script>
<script>
	// Input add siswa
	$('#input_siswa').click(function(){
		$input = "<tr><td><input class='form-control' name='nama_siswa[]' placeholder='Nama Siswa'></td>"+
		"<td><input class='form-control' name='id_alumni[]' placeholder='Id Alumni'></td>"+
		"<td width='30px'><a class='close c'>×</a></td></tr>";
		$(this).parent().parent().find('table').append($input);
	});
	$("[name='nama_perusahaan']").autocompleter({
		highlightMatches: true,
        empty: false,
        limit: 5,
		source:"json/perusahaan",
		template: '<img src="assets/perusahaan/logo/{{ image }}"> {{ label }}',
	});
	$(document).on('focus',"[name='id_alumni[]']",function(){
		$(this).autocompleter({
			highlightMatches: true,
	        empty: false,
	        limit: 5,
			source:"json/alumni",
			template: '<img class="foto" src="assets/foto/{{ image }}"> {{ label }}, {{ jurusan }}, {{ lulusan }}',
		})
	});
</script>