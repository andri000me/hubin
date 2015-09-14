<?php
	$count = $this->all->count_data();
?>
<ul class="nav bs-sidenav menu-dash">
	<li class="active">
	  <a x href="admin"><i class="glyphicon glyphicon-th-large"></i> Dashboard</a>
	  <ul class="arrow_list nav" style='margin-left:20px'>
	  	<li><a x href="admin/regis_alumni">Siswa yg mendaftar <span class="badge pull-right" style='background:#F73B3B;'><?php echo $count['regis_alumni'];?></span></a></li>
	  </ul>
	</li>
	<li>
	  <a x href="admin/slider"><i class="glyphicon glyphicon-tasks"></i> Slider <span class="badge pull-right"><?php echo $count['slider'];?></span></a>
	</li>
	<li>
	  <a x href="admin/mutiara"><i class="glyphicon glyphicon-comment"></i> Kata Mutiara <span class="badge pull-right"><?php echo $count['kata_mutiara'];?></span></a>
	</li>
	<li>
	  <a x href="admin/posting"><i class="glyphicon glyphicon-tags"></i> Posting <span class="badge pull-right"><?php echo $count['posting'];?></span></a>
	</li>
	<li>
	  <a x href="admin/alumni"><i class="glyphicon glyphicon-user"></i> Alumni <span class="badge pull-right"><?php echo $count['siswa'];?></span></a>
	</li>
	<li>
	  <a x href="admin/perusahaan"><i class="glyphicon glyphicon-tower"></i> Perusahaan <span class="badge pull-right"><?php echo $count['perusahaan'];?></span></a>
	</li>
	<li>
	  <a x href="admin/prakerin"><i class="glyphicon glyphicon-book"></i> Prakerin <span class="badge pull-right"><?php echo $count['prakerin'];?></a>
	</li>
	<!-- <li>
	  <a x href="admin/loker"><i class="glyphicon glyphicon-globe"></i> Loker</a>
	</li> -->
	<li>
	  <a x href="admin/gallery"><i class="glyphicon glyphicon-picture"></i> Gallery <span class="badge pull-right"><?php echo $count['gallery'];?></a>
	</li>
</ul>