<div class='title'>
  <h3>Data Loker <a x href="javascript:history.go(-1)" class='btn btn-inverse btn-xs'><i class='glyphicon glyphicon-arrow-left'></i> Back</a></h3>
</div>
<table class='table-detail' style='width:100%'>
  <tr>
    <td width='200px'>Logo Perusahaan</td>
    <td><img style='max-height:50px' src='assets/perusahaan/logo/<?=img_default($get_detail['logo_perusahaan'],'default.png');?>' /></td>
  </tr>
  <tr>
    <td>Perusahaan</td>
    <td><a x href='front/detail_perusahaan/<?=$get_detail['user'];?>'><?=$get_detail['nama_perusahaan'];?></a></td>
  </tr>
  <tr>
    <td>Jurusan</td>
    <td><?=$get_detail['nama_jurusan'];?></td>
  </tr>
  <tr>
    <td>Lowongan Kerja</td>
    <td><?=$get_detail['judul_loker'];?></td>
  </tr>
  <tr>
    <td>Tanggal Lowongan</td>
    <td><?=date_convert($get_detail['tgl_loker']);?></td>
  </tr>
  <tr>
    <td>Jumlah Requitment</td>
    <td><?=$get_detail['jumlah_requitment'];?> Orang</td>
  </tr>
  <tr>
    <td>Deskripsi Loker</td>
    <td><?=$get_detail['deskripsi_loker'];?></td>
  </tr>
<?php
if($this->session->userdata('role')=='alumni'){
  $lamar = $this->db->get_where('lamar_loker',array('id_loker'=>$id_loker,'id_siswa'=>$this->session->userdata('id_user')))->row_array();
  if(!$lamar){
?>
  <tr>
    <td>Lamar Lowongan</td>
    <td><a pointer class='btn btn-primary open-pesan'>Minta Lamaran ke pihak HUBIN</a></td>
  </tr>
  <tr hidden id='pesan_lamar'>
    <td>Pesan</td>
    <td>
      <form method='post'>
        <textarea name='pesan_lamar' class='form-control'></textarea>
        <div class='btn-group' style='margin:10px 0px'>
          <button class='btn btn-primary'>Kirim Pesan Ke Hubin</button>
          <a pointer class='btn btn-warning batal'>Batal</a>
        </div>
      </form>
    </td>
  </tr>
  <script>
    $('.open-pesan').click(function(){
      $(this).attr('disabled','');
      $('#pesan_lamar').fadeIn(300);
    })
    $('.batal').click(function(){
      $('.open-pesan').removeAttr('disabled');
      $('#pesan_lamar').fadeOut(300);
    })
  </script>
<? }else{ ?>
  <tr>
    <td>Lamar Lowongan</td>
    <td>
  <?php
    switch ($lamar['status_hubin']) {
      case 'Belum di setujui':
        echo "Pesan sudah dikirim, tinggal menunggu <span class='label label-success'>timbal balik</span> dari pihak Hubin";
        break;
      case 'Setujui':
        echo "Lamaran lowongan di <span class='label label-success'>setujui</span> oleh pihak Hubin, ";
        break;
      case 'Tidak di setujui':
        echo "Lamaran lowongan <span class='label label-warning'>tidak di setujui</span> oleh pihak Hubin";
        break;
    }
    if($lamar['status_hubin']=='Setujui'){
      switch ($lamar['status_perusahaan']) {
        case 'Belum di terima':
          echo "Tetapi tinggal menunggu <span class='label label-success'>timbal balik</span> dari perusahaan";
          break;
        case 'Terima Bekerja':
          echo "Anda diterima bekerja di perusahaan ini";
          break;
        case 'Belum di terima':
          echo "Tetapi tinggal menunggu <span class='label label-success'>timbal balik</span> dari perusahaan";
          break;
      }
    }
  ?>
    </td>
  </tr>
<?php }} ?>
</table>