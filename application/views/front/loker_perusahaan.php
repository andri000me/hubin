<script src='assets/js/validasi.js'></script>
<?php
if($aksi=='add'||$aksi=='edit'){
  if($aksi=="add"){
    $title = "Buat";
    $act = "add_loker";
  }
  if($aksi=="edit"){
    $title = "Edit";
    $act = "edit_loker";
    $_POST = $get_detail;
  }
?>
  <legend>
    <h2><?=$title;?> Lowongan kerja <a x href='<?=$link;?>' class='btn btn-inverse btn-xs'><i class='glyphicon glyphicon-arrow-left'></i> Back</a></h2>
  </legend>
  <!-- Form Perusahaan -->
  <form method="post" id='loker'>
    <?php $this->all->getMsg();?>
    <input type='hidden' name='<?=$act;?>' value='true' />

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
      <label>Judul Loker</label>
      <input type="text" name="judul_loker" class="form-control" value="<?=post('judul_loker');?>" placeholder="Judul Loker">
    </div>
      
    <div class="form-group">
      <label>Jumlah Requitment</label>
      <input type="number" name="jumlah_requitment" class="form-control" value='<?=post('jumlah_requitment');?>' placeholder="Jumlah Requitment">
    </div>

    <div class="form-group">
      <label>Deskripsi Loker</label>
      <textarea name="deskripsi_loker" id='wysihtml5' style='height:250px' class="form-control" placeholder="Deskripsi Loker"><?=post('deskripsi_loker');?></textarea>
    </div>

    <div class="actions">
      <button type="submit" class="btn btn-primary col-sm-12"><?=$title;?> Loker</button>
    </div>

  </form>
<?php }elseif($aksi=='detail'){ ?>
  <?php $this->load->view('front/detail_loker');?>
<?php }else{ ?>
<!--View Page-->
<div class='row'>
  <!--Menu Aksi-->
  <div class='row' style='margin-bottom:10px;padding:0px 15px;'>
    <a x href='<?=$link;?>add' class='btn btn-primary' style='margin:0px 0px 10px'>+ Buat Loker</a>
    <form class='form-inline pull-right' method="post">
      <input type='hidden' name='filter' value='true' />
      <div class="form-group">
        <label>Cari Loker</label>
        <input type='text' class='form-control' name='search' value='<?=post('search');?>' placeholder='Judul Loker'/>
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
      <th>No</th>
      <th>Judul Loker</th>
      <th>Jumlah Requitment</th>
      <th>Jurusan</th>
      <th width='300'>Aksi</th>
    </tr>
  <?php
  if($get_loker){
    foreach($get_loker['data'] as $row){
  ?>
    <tr>
      <td><?=$get_loker['no']++;?></td>
      <td><?=$row['judul_loker'];?></td>
      <td><?=$row['jumlah_requitment'];?> Orang</td>
      <td><?=$row['nama_jurusan'];?></td>
      <td>
        <div class='btn-group'>
          <a x href='<?=$link."detail/".$row['id_loker']?>' class='btn btn-primary btn-sm'><i class='glyphicon glyphicon-list-alt'></i> Detail</a>
        <?php
          if($row['status']=='active'){
            echo "<a status-id='$row[id_loker].non' status='loker' class='btn btn-active btn-sm'><i class='glyphicon glyphicon-ok-circle'></i> Active</a>";
          }else{
            echo "<a status-id='$row[id_loker].active' status='loker' class='btn btn-default btn-sm'><i class='glyphicon glyphicon-ban-circle'></i> Non</a>";
          }
        ?>
          <a x href='<?=$link."edit/".$row['id_loker']?>' class='btn btn-info btn-sm'><i class='glyphicon glyphicon-edit'></i> Edit</a>
          <a pointer remove='<?=$row['id_loker']?>' rel='loker' class='btn btn-danger btn-sm'><i class='glyphicon glyphicon-remove'></i> Delete</a>
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