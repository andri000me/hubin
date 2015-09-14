<div class='title'>
  <h3>Profile Perusahaan <a x href="javascript:history.go(-1)" class='btn btn-inverse btn-xs'><i class='glyphicon glyphicon-arrow-left'></i> Back</a></h3>
</div>
<div class='sampul-perusahaan' style="background-image:url('assets/perusahaan/sampul/<?=img_default($get_detail['sampul_perusahaan'],'default.jpg');?>')">
  <img class='logo-perusahaan' style='margin:50px 0px 0px;' src='assets/perusahaan/logo/<?=img_default($get_detail['logo_perusahaan'],'default.png');?>' />
  <div class='nama-perusahaan'><?=$get_detail['nama_perusahaan'];?></div>
</div>
<div class='row' style='padding:0px 15px'>
  <table class='table-perusahaan'>
    <tr>
      <td width='200'>Logo</td>
      <td>: <img src='assets/perusahaan/logo/<?=img_default($get_detail['logo_perusahaan'],'default.png');?>' /></td>
    </tr>
    <tr>
      <td>Nama Perusahaan</td>
      <td>: <?=$get_detail['nama_perusahaan'];?></td>
    </tr>
    <tr>
      <td>Alamat Perusahaan</td>
      <td>: <?=$get_detail['alamat_perusahaan'];?></td>
    </tr>
    <tr>
      <td>Telepon Perusahaan</td>
      <td>: <?=$get_detail['tlp_perusahaan'];?></td>
    </tr>
    <tr>
      <td>Email Perusahaan</td>
      <td>: <?=$get_detail['email_perusahaan'];?></td>
    </tr>
    <tr>
      <td>Link Perusahaan</td>
      <td>: <a target="_blank" href='<?=$get_detail['link_perusahaan'];?>'><?=str_replace("http://","",$get_detail['link_perusahaan']);?></a></td>
    </tr>
    <tr>
      <td>Tentang Perusahaan</td>
      <td>: <?=$get_detail['about_perusahaan'];?></td>
    </tr>
    <tr>
      <td>Minat Jurusan</td>
      <td>: <?=str_replace("/",", ",$get_detail['minat_jurusan']);?></td>
    </tr>
  </table>
</div>