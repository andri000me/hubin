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
    Hasil Prakerin yang didapat : <span class='label label-info'><?=$get_prakerin['count'];?> Prakerin</span>
  </div>
  <table class="table table-striped">
    <tr>
      <th>No</th>
      <th>Judul Laporan</th>
      <th>Perusahaan</th>
      <th>Jurusan</th>
      <th>Tahun</th>
    </tr>
  <?php
    if($get_prakerin){
      foreach($get_prakerin['data'] as $row_prakerin){
  ?>
    <tr>
      <td><?=$get_prakerin['no']++;?></td>
      <td><a x href='front/detail_prakerin/<?=$row_prakerin['salt'].".".$row_prakerin['user'];?>'><?=$row_prakerin['judul_laporan']?></a></td>
      <td><?=$row_prakerin['nama_perusahaan']?></td>
      <td><?=$row_prakerin['nama_jurusan']?></td>
      <td><?=$row_prakerin['lulusan']?></td>
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