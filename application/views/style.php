<?php
  header("Content-type: text/css");
  if(post('jurusan')){
    $this->session->set_userdata('jurusan',post('jurusan'));
  }
  $jurusan = $this->session->userdata('jurusan');
  /*Default*/
  $pages = $this->uri->segment(2);
  if(!$jurusan){
   $this->session->set_userdata('jurusan',"#CC1212");
   $jurusan = $this->session->userdata('jurusan');
  }
?>
@import "<?php echo base_url();?>assets/style.css";

/*Load*/
body{ 
  font-family: Helvetica,Arial,sans-serif;
  margin-top:5px;
}
.cl{
	clear:both;
}
.close{
  font-family:'Droid Sans';
}
/*Loading*/
[pointer]{
	cursor:pointer;
}
[loading]{
  display:none;
  position:fixed;
  top: 50%;
  left: 50%;
  margin-top: -50px;
  margin-left: -50px;
  z-index:9999;
}
[loading] img{
  width:100px;
  height:100px;
}
[hide]{
  position:absolute;
  visibility:hidden;
}
[target-toggle]{
  display:none;
}
/*Button*/
.btn-active{
  background-color: #97F342;
  color: white;
  background-repeat: repeat-x;
}
.btn-active:hover{
  color:white;
}
.x{
  position:absolute;
  z-index:10;
  top:7px;
  right:25px;
}
.x .glyphicon{
  margin:0px !important;
}
/*Style MIN*/
#page-title{
  margin:0px;
  background:none;
}
/*label error*/
label.error{
	margin:5px 0px 0px;
	color:red;
}
.foto{
  width:100px;
  height:120px;
  border:1px solid #ccc;
}
/*CV Style*/
.cv li{
  padding-top: 6px;
  padding-bottom: 6px;
}
.table-cv td{
  padding: 6px 0px;
}
.portofolio-cv{
  margin-bottom:20px;
}
.portofolio-cv img{
  width:100%;
  max-width:800px;
  border:1px solid #ddd;
  box-shadow: 0px -10px 15px -15px #000,0px 20px 25px -25px #000;
}
.foto-cv{
  width: 130px;
  height: 160px;
  border:1px solid #ccc;
  padding: 4px;
  background: #efefef;
}
/*Menu Dashboard*/
.menu-dash{
  background:#f3f3f3;
}
.menu-dash a{
  color:#666;
}
/*Informasi*/
.informasi .judul{
  color:<?=$jurusan?>;
}
/*Nav Bar*/
.navbar-nav li a{
  transition:0.25s;
}
/*Jurusan default color : #29a9df*/
#page-title #page-title-inner{background:-moz-linear-gradient(top,<?=$jurusan?> 0,<?=$jurusan?> 100%);
  background:-webkit-gradient(linear,left top,left bottom,color-stop(0%,<?=$jurusan?>),color-stop(100%,<?=$jurusan?>));
  background:-webkit-linear-gradient(top,<?=$jurusan?> 0,<?=$jurusan?> 100%);
  background:-o-linear-gradient(top,<?=$jurusan?> 0,<?=$jurusan?> 100%);
  background:-ms-linear-gradient(top,<?=$jurusan?> 0,<?=$jurusan?> 100%);
  background:linear-gradient(to bottom,<?=$jurusan?> 0,<?=$jurusan?> 100%);
  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#e629a9df',endColorstr='#e629a9df',GradientType=0);
  -webkit-box-shadow:inset 0 0 5px rgba(0,0,0,0.25);-moz-box-shadow:inset 0 0 5px rgba(0,0,0,0.25);box-shadow:inset 0 0 5px rgba(0,0,0,0.25);padding:10px}
.navbar-default .navbar-nav>li>a{color:#666;border-top:4px solid white;font-size:16px;padding:22px;padding:22px 15px \9}
.navbar-default .navbar-nav>li>a:hover,.navbar-default .navbar-nav>li>a:focus{border-top:4px solid <?=$jurusan?>;background:<?=$jurusan?>;color:white}
.navbar-default .navbar-nav>.active>a,.navbar-default .navbar-nav>.active>a:hover,
.navbar-default .navbar-nav>.active>a:focus{border-top:4px solid <?=$jurusan?>;background:<?=$jurusan?>;color:white}
.navbar .navbar-brand span{color:<?=$jurusan?>}
.navbar-default .navbar-nav>.open>a,.navbar-default .navbar-nav>.open>a:hover,.navbar-default .navbar-nav>.open>a:focus{background:<?=$jurusan?>;color:white}
.dropdown-menu li>a:hover,.dropdown-menu li>a:focus,.dropdown-submenu:hover>a{color:white;background:<?=$jurusan?>!important}
.dropdown-menu .active>a{color:white!important;background:<?=$jurusan?>!important}
.dropdown-menu .active>a:hover{color:white!important;background:<?=$jurusan?>!important}
.navbar .btn-navbar{margin-top:15px}.nav .active .dropdown-toggle .caret{border-top-color:<?=$jurusan?>!important;border-bottom-color:<?=$jurusan?>!important}
.flex-direction-nav .flex-prev:hover,.flex-direction-nav .flex-next:hover{background-color:<?=$jurusan?>;opacity:1}
.title h1,.title h2,.title h3,.title h4,.title h5,.title h6{border-bottom:5px solid <?=$jurusan?>!important;display:inline-block;padding:0 10px!important;}
.jumbotron{background:#eee;border-left:4px solid <?=$jurusan?>;padding:13px 13px 13px 15px!important;font-style:italic;margin:40px auto;
  -webkit-border-radius:0!important;-moz-border-radius:0!important;border-radius:0!important;font-size:14px!important}
.icons-box i.color{color:<?=$jurusan?>}
.icons-box i.full-color{background:<?=$jurusan?>;color:white}
.icons-box i.bordered.color{-webkit-border-radius:50em;-moz-border-radius:50em;border-radius:50em;
  -webkit-box-shadow:0 0 0 3px <?=$jurusan?>;-moz-box-shadow:0 0 0 3px <?=$jurusan?>;box-shadow:0 0 0 3px <?=$jurusan?>;margin:0 auto;opacity:1}
.button.color{color:white;background:<?=$jurusan?>}
input[type="button"]{background:<?=$jurusan?>;color:white}
.mr-rotato-prev:hover,.mr-rotato-next:hover{background-color:<?=$jurusan?>;border-color:<?=$jurusan?>}
span:after,ul.skills li .animate>span>spans li.current{background:<?=$jurusan?>}
.quotes .quote,.quotes .author{background:<?=$jurusan?>}
.dropcap.dropcap.color{background:<?=$jurusan?>;color:white}
.pricing-table .color-custom h4{background-color:<?=$jurusan?>}
#filters a:hover,.selected{background-color:<?=$jurusan?>!important;border:1px solid <?=$jurusan?>!important;color:white!important}
.project-info strong{color:<?=$jurusan?>}
li.current{background:<?=$jurusan?>;border:1px solid <?=$jurusan?>;color:white}
.tags a:hover{background:<?=$jurusan?>;border:1px solid <?=$jurusan?>;color:white}
#footer-menu #footer-menu-back-to-top a{width:30px;height:30px;display:block;background-color:<?=$jurusan?>;background-image:url(../assets/img/scroll-top-top.png);
  background-repeat:no-repeat;background-position:50%;
-webkit-transition:all .1s ease-in-out;-moz-transition:all .1s ease-in-out;-ms-transition:all .1s ease-in-out;-o-transition:all .1s ease-in-out;transition:all .1s ease-in-out}
form#newsletter button{background:<?=$jurusan?>;color:white;float:left;border:1px solid #f6f6f6;position:relative;z-index:2;
  font-size:14px;padding:9px 30px;-webkit-border-radius:0 3px 3px 0;-moz-border-radius:0 3px 3px 0;border-radius:0 3px 3px 0}
.btn-primary{background-color:<?=$jurusan?>;color:white;background-image:-moz-linear-gradient(top,<?=$jurusan?>,<?=$jurusan?>);
  background-image:-ms-linear-gradient(top,<?=$jurusan?>,<?=$jurusan?>);background-image:-webkit-gradient(linear,0 0,0 100%,from(<?=$jurusan?>),to(<?=$jurusan?>));
  background-image:-webkit-linear-gradient(top,<?=$jurusan?>,<?=$jurusan?>);background-image:-o-linear-gradient(top,<?=$jurusan?>,<?=$jurusan?>);
  background-image:linear-gradient(top,<?=$jurusan?>,<?=$jurusan?>);background-repeat:repeat-x;border-color:<?=$jurusan?> <?=$jurusan?> <?=$jurusan?>;
  border-color:rgba(0,0,0,0.1) rgba(0,0,0,0.1) rgba(0,0,0,0.25)}
.btn-primary:hover,.btn-primary:active,.btn-primary.active,.btn-primary.disabled{background-color:<?=$jurusan?>}
.btn-success{background-color:#5bb75b;color:white;background-image:-moz-linear-gradient(top,<?=$jurusan?>,<?=$jurusan?>);
  background-image:-ms-linear-gradient(top,<?=$jurusan?>,<?=$jurusan?>);background-image:-webkit-gradient(linear,0 0,0 100%,from(<?=$jurusan?>),to(<?=$jurusan?>));
  background-image:-webkit-linear-gradient(top,<?=$jurusan?>,<?=$jurusan?>);background-image:-o-linear-gradient(top,<?=$jurusan?>,<?=$jurusan?>);
  background-image:linear-gradient(top,<?=$jurusan?>,<?=$jurusan?>);background-repeat:repeat-x;border-color:#51a351 #51a351 #387038;
  border-color:rgba(0,0,0,0.1) rgba(0,0,0,0.1) rgba(0,0,0,0.25)}
.btn-success:hover,.btn-success:active,.btn-success.active,.btn-success.disabled{background-color:<?=$jurusan?>}
.panel-primary {
  border-color: <?=$jurusan?>;
}
.panel-primary>.panel-heading {
  color: #fff;
  background-color: <?=$jurusan?>;
  border-color: <?=$jurusan?>;
}
/*Admin Style*/
.aksi{

}