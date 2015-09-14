<div id="wrapper">
    
    <!-- start: Container --> 
    <div class="container">

      <div id="filters" style='text-align:left'>
        <ul class="option-set" data-option-key="filter">
          <!-- <li><a href="portfolio3.html#filter" class="selected" data-option-value="*">All</a></li> -->
    <?php
    if($get_album){
      foreach($get_album as $row1){
        if($row1['id_album']==$id_album){$s="class='selected'";}else{$s="";}
        echo "<li><a x href='$link$row1[id_album]' $s>$row1[nama_album]</a></li>";
      }
    } ?>
        </ul>
      </div>

    </div>
    <!-- end: Container  -->
        
    <!--start: Container -->
      <div class="container">
    <?php
    if($get_gallery['data']){
      foreach($get_gallery['data'] as $row){ ?>
        <div class="col-sm-6 col-md-3">
          <a title='<?php echo $row['title_gallery'];?>' href='assets/gallery/<?php echo $row['img_gallery'];?>' class="thumbnail cb-gallery">
            <img src="assets/gallery/<?php echo $row['thumb_gallery'];?>" style="height: 180px; width: 100%; display: block;">
          </a>
        </div>
    <?php
    }}
    ?>
      </div>
      <script>
      $.get('assets/js/jquery.colorbox.js',function(){
        $('.cb-gallery').colorbox({rel:"cb-gallery-<?php echo $id_album;?>",width:"95%", height:"95%"});
      });
      </script>
        
  </div>
