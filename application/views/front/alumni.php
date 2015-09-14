<div class='data_alumni'>
  <div class='well well-sm'>
    <!-- <table class='tbl-filter'>
      <tr>
        <td>Lulusan :</td>
        <td>
      <?php
        foreach($this->db->get('ta')->result_array() as $ta){
          echo "<a style='margin:0px 10px' href='#'>$ta[lulusan]</a>";
        }
      ?>
        </td>
      </tr>
    </table> -->
    Hasil alumni yang didapat : <span class='label label-info'><?=$get_alumni['count'];?> Alumni</span>
  </div>
  <table class="table table-striped">
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Keterangan</th>
      <th>Jurusan</th>
      <th>Lulusan</th>
    </tr>
  <?php
    if($get_alumni){
      foreach($get_alumni['data'] as $row_alumni){
  ?>
    <tr>
      <td><?=$get_alumni['no']++;?></td>
      <td><a x href='front/cv_alumni/<?=$row_alumni['salt'].".".$row_alumni['user'];?>'><?=$row_alumni['nama_siswa']?></a></td>
      <td><?=siswa_ket($row_alumni['siswa_ket'])?></td>
      <td><?=$row_alumni['nama_jurusan']?></td>
      <td><?=$row_alumni['lulusan']?></td>
    </tr>
  <?php
    }}else{
     echo "<tr><td colspan='4'><h2>Data alumni tidak ada</h2></td></tr>";
    }
  ?>
  </table>
  <?php
    echo $this->pagination->create_links();
  ?>
</div>