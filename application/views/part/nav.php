<!-- start: Navbar -->
<nav class="navbar navbar-default" role="navigation">		
	<!--start: Container -->
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
    	<div class="navbar-header">
      		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-navigation">
        		<span class="sr-only">Toggle navigation</span>
        		<span class="icon-bar"></span>
        		<span class="icon-bar"></span>
        		<span class="icon-bar"></span>
      		</button>
      		<a class="navbar-brand" style='font-size:26px' href=""><span>Hubungan Industri (HUBIN)</span></a>
    	</div>
  <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="main-navigation">
        <ul class="nav navbar-right navbar-nav">
	<?php
		if($this->session->userdata('role') == 'admin'){
      $nav['Dashboard'] = "admin";
    }
      $nav['Home'] = "";
      $nav['Prakerin'] = "front/prakerin";
      $nav['Loker'] = "front/loker";
      $nav['Alumni'] = "front/alumni";
      $nav['Gallery'] = "front/gallery";
    if($this->session->userdata('role')=='alumni'){ 
      $nav['Profile'] = "front/profil_alumni";
      // $nav['Forum'] = "front/forum";
    }
    if($this->session->userdata('role')=='perusahaan'){ 
      $nav['Profile'] = "front/detail_perusahaan";
    }
    // Login dan Logout
    if($this->session->userdata('login')){
      $nav['Logout'] = "login/logout";
    }else{
      $nav['Login'] = "front/login/alumni";
    }
    foreach($nav as $nav => $link_nav){
      if($this->session->userdata('nav')==$nav){$act="class='active'";}else{$act="";}
      $change_theme = ($nav=="Home"||$nav=="Dashboard") ? "change-theme rel='#CC1212' " : "";
      echo "<li $act><a x $change_theme href='$link_nav'>$nav</a></li>";
    }
   ?>
        </ul>
      </div><!-- /.navbar-collapse -->    
  </div>
	<!--/.container-->			
</nav>
<!--end: Navbar -->