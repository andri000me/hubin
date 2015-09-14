<form action='front/alumni' method="post">
<legend>
	<h3>Menu pencarian!</h3>
</legend>
	<input type='hidden' name='filter' value='true' />
	<div class="form-group">
		<label>Nama Alumni</label>
		<input tyep='text' name='search' value='<?=post('search');?>' class='form-control' placeholder='Nama Alumni' />
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

	<div class='form-group'>
		<label>Keterangan Alumni</label>
	<?php
		$ket = array(''=>'Pilih Keterangan','Kuliah'=>'Kuliah','Mencari Kerja'=>'Mencari Kerja','Bekerja'=>'Bekerja');
		echo form_dropdown('siswa_ket',$ket,post('siswa_ket'),'class="form-control"');
	?>
	</div>
	<div class="actions">

		<button type="submit" class="btn btn-primary col-sm-12">Filter !</button>

	</div>

</form>

<script src='assets/js/autocompleter/autocompleter.js'></script>
<script>
	$("[name='search']").autocompleter({
		highlightMatches: true,
        empty: false,
        limit: 5,
		source:"json/alumni?v=nama_siswa",
		template: '<img class="foto" src="assets/foto/{{ image }}"> {{ label }}, {{ jurusan }}, {{ lulusan }}',
	})
</script>