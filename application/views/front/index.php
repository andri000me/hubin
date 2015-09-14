<?php if($get_slider){ ?>
<div id="carousel-example-generic" class="carousel slide slider col-md-8 bs-docs-carousel-example">
    <ol class="carousel-indicators">
  <?php 
    $i = 0;
    foreach($get_slider as $row){ 
    if($i==0){$act="active";}else{$act="";}
  ?>
      <li data-target="#carousel-example-generic" data-slide-to="<?=$i;?>" class="<?=$act;?>"></li>
  <?php $i++; } ?>
    </ol>
    <div class="carousel-inner">
  <?php 
    $i = 0;
    foreach($get_slider as $row){ 
    if($i==0){$act="active";}else{$act="";}
  ?>
      <div class="item <?=$act;?>">
        <img src="assets/slider/<?=$row['img_slider'];?>" style='height:300px;width:100%;'>
      	<div class="carousel-caption">
          <?=$row['content_slider'];?>
        </div>
      </div>
  <?php $i++; } ?>
    </div>
    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
      <span class="icon-prev"></span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
      <span class="icon-next"></span>
    </a>
</div>
<?php } ?>
<div class="col-md-4 news-ticker">
  <div class="panel panel-default">
    <div class="panel-heading"> <span class="glyphicon glyphicon-list-alt"></span><b>Kata-kata mutiara</b></div>
    <div class="panel-body">
      <div class="row">
        <div class="col-xs-12">
          <ul class="mutiara-ticker">
        <?php
        $data = $this->db->get_where('posting',array('role_posting'=>'mutiara','status'=>'active'))->result_array();
        if($data){
          foreach($data as $mutiara){
        ?>
            <li class="news-item"><?=$mutiara['content_posting'].". ($mutiara[title_posting])";?></li>
        <?php }} ?>
          </ul>
        </div>
      </div>
    </div>
    <div class="panel-footer"> </div>
  </div>
</div>
<div class='cl'></div>
<div class='row' style='padding:0px 15px'>
  <div class='col-md-8'>
    <div class='title'>
      <h2>Informasi HUBIN</h2>
    </div>
    <div class='informasi'>
    <?php
      if($get_informasi['data']){
        foreach($get_informasi['data'] as $inform){
    ?>
      <div class='content_informasi'>
        <h3 class='judul'><?=$inform['title_posting'];?></h3>
        <p><?=strip_tags($inform['content_posting']);?></p>
      </div>
    <?php }} ?>
    </div>
    <form></form>
    <?=$this->pagination->create_links();?>
  </div>
  <div class='col-md-4'>
  <?php $get_about = $this->db->get_where('hubin',array('role_hubin'=>'about'))->row_array(); ?>
    <div class='title'>
      <h2><?=$get_about['title_hubin'];?></h2>
    </div>
    <p><?=$get_about['content_hubin'];?></p>
  </div>
</div>
<script src='assets/js/news-ticker.js'></script>
<script>
  $(".mutiara-ticker").bootstrapNews({
    newsPerPage: 2,
    autoplay: true,
    pauseOnHover: true,
    navigation: true,
    direction: 'down',
    newsTickerInterval: 5000,
    onToDo: function () {
        //console.log(this);
    }
  });
  $('.slider').carousel({ interval: 3000, cycle: true });
</script>