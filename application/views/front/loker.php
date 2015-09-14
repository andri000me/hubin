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
    Hasil Lowongan Kerja yang didapat : <span class='label label-info'><?=$get_loker['count'];?> Lowongan Kerja</span>
  </div>
  <table class="table table-striped">
    <tr>
      <th>No</th>
      <th>Lowongan Kerja</th>
      <th>Requitment</th>
      <th>Perusahaan</th>
      <th>Jurusan</th>
    </tr>
  <?php
    if($get_loker){
      foreach($get_loker['data'] as $row){
  ?>
    <tr>
      <td><?=$get_loker['no']++;?></td>
      <td><a x href='front/detail_loker/<?=$row['id_loker'];?>'><?=$row['judul_loker']?></a></td>
      <td><?=$row['jumlah_requitment']?> Orang</td>
      <td><?=$row['nama_perusahaan']?></td>
      <td><?=$row['nama_jurusan']?></td>
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