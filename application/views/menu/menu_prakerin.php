<form action='front/prakerin' method="post">
<legend>
	<h3>Menu pencarian!</h3>
</legend>
	<input type='hidden' name='filter' value='true' />
	<div class="form-group">
		<label>Judul Laporan</label>
		<input tyep='text' name='search' value='<?=post('search');?>' class='form-control' placeholder='Judul Laporan' />
	</div>
	<div class="form-group">
		<label>Tahun</label>
<?php
	$sel_ta[''] = "Semua Lulusan";
	foreach($this->db->get('ta')->result_array() as $s){
		$sel_ta[$s['lulusan']] = $s['lulusan'];
	} 
	echo form_dropdown("tahun",$sel_ta,post('tahun'),"class='form-control'");
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

	<div class="actions">

		<button type="submit" class="btn btn-primary col-sm-12">Filter !</button>

	</div>

</form>