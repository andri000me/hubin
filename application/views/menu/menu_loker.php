<form action='front/loker' method="post">
<legend>
	<h3>Menu pencarian!</h3>
</legend>
	<input type='hidden' name='filter' value='true' />
	<div class="form-group">
		<label>Judul Loker</label>
		<input tyep='text' name='search' value='<?=post('search');?>' class='form-control' placeholder='Judul Loker' />
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