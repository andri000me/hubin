<div class='row'>
  <div class='col-md-12' style='margin:10px 0px'>
    <div class='title'>
      <h3>Data Prakerin <a x href="javascript:history.go(-1)" class='btn btn-inverse btn-xs'><i class='glyphicon glyphicon-arrow-left'></i> Back</a></h3>
    </div>
    <table class='table-detail'>
      <tr>
        <td width='200px'>Tahun</td>
        <td><?=$get_detail['lulusan'];?></td>
      </tr>
      <tr>
        <td>Jurusan</td>
        <td><?=$get_detail['nama_jurusan'];?></td>
      </tr>
      <tr>
        <td>Perusahaan</td>
        <td><?=$get_detail['nama_perusahaan'];?></td>
      </tr>
      <tr>
        <td>Logo Perusahaan</td>
        <td><img style='max-height:50px' src='assets/perusahaan/logo/<?=img_default($get_detail['logo_perusahaan'],'default.png');?>' /></td>
      </tr>
      <tr>
        <td>Judul Laporan</td>
        <td><?=$get_detail['judul_laporan'];?></td>
      </tr>
      <tr>
        <td>Hasil Laporan</td>
        <td><a href="assets/files/<?=$get_detail['hasil_laporan'];?>"><img style='max-height:30px' src='assets/images/pdf-icon.png'/><?=$get_detail['hasil_laporan'];?></a></td>
      </tr>
      <tr>
        <td>Kelompok Prakerin</td>
        <td>
          <ul class="arrow_list">
        <?php foreach($this->prakerin->get_kel_prakerin($id_user) as $r){ 
            if($r['id_siswa']){
        ?>
            <li><a x href='front/cv_alumni/<?=$r['salt'].".".$r['user'];?>'><?=$r['nama_siswa_prakerin'];?></a></li>
        <?php }else{ ?>
            <li><?=$r['nama_siswa_prakerin'];?></li>
        <?php }} ?>
          </ul>
        </td>
      </tr>
    </table>
  </div>
<!-- Gallery Prakerin -->
  <div class='col-md-12' style='margin:10px 0px'>
    <div class='title'>
      <h3>Gallery Prakerin</h3>
    </div>
    <div class='row'>
    <?php foreach($this->prakerin->get_gallery($id_user,true) as $row){ ?>
          <div class="col-sm-6 col-md-3">
            <a title='<?php echo $row['title_gallery'];?>' href='assets/prakerin/<?php echo $row['img_gallery'];?>' class="thumbnail cb-prakerin">
              <img src="assets/prakerin/<?php echo $row['thumb_gallery'];?>" style="height: 180px; width: 100%; display: block;">
            </a>
          </div>
      <?php } ?>
    </div>
  </div>
  <script>
  $.get('assets/js/jquery.colorbox.js',function(){
    $('.cb-prakerin').colorbox({rel:"cb-prakerin-<?php echo $id_user;?>",width:"95%", height:"95%"});
  });
  </script>
</div>