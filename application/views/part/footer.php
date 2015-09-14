	<!-- start: Footer Menu -->
	<div id="footer-menu" class="hidden-sm hidden-xs">

		<!-- start: Container -->
		<div class="container">
			
			<!-- start: Row -->
			<div class="row">

				<!-- start: Footer Menu Logo -->
				<div class="col-sm-2">
					<div id="footer-menu-logo">
						<a class="brand" pointer><span>Hubin</span>.</a>
					</div>
				</div>
				<!-- end: Footer Menu Logo -->

				<!-- start: Footer Menu Links-->
				<div class="col-sm-9">
					
					<div id="footer-menu-links">

						<ul id="footer-nav">
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
							      $nav['Forum'] = "front/forum";
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
							      echo "<li $act><a x href='$link_nav'>$nav</a></li>";
							    }
							   ?>

						</ul>

					</div>
					
				</div>
				<!-- end: Footer Menu Links-->

				<!-- start: Footer Menu Back To Top -->
				<div class="col-sm-1">
						
					<div id="footer-menu-back-to-top">
						<a pointer></a>
					</div>
				
				</div>
				<!-- end: Footer Menu Back To Top -->
			
			</div>
			<!-- end: Row -->
			
		</div>
		<!-- end: Container  -->	

	</div>	
	<!-- end: Footer Menu -->

	<!-- start: Copyright -->
	<div id="copyright">
	
		<!-- start: Container -->
		<div class="container">
		
			<div class="col-sm-12">
				
				<p>
					&copy; 2014, HUBUNGAN UNDUSTRI <a target='_blank' href="http://adisanggoro.sch.id">SMK ADI SANGGORO</a>. Design and Develop by <a target='_blank' href="front/cv_alumni/1402.eiji">Zainu Rochim</a> 
				</p>
				
			</div>
	
		</div>
		<!-- end: Container  -->
		
	</div>	
	<!-- end: Copyright -->

<!-- start: Java Script -->
<!-- Placed at the end of the document so the pages load faster -->
	<!-- <script src="assets/jquery.js"></script>
	<script src="assets/load.js"></script>
	<script src="assets/js/jquery-1.9.1.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/jquery.isotope.min.js"></script>
	<script src="assets/js/jquery.imagesloaded.js"></script>
	<script src="assets/js/flexslider.js"></script>
	<script src="assets/js/carousel.js"></script>
	<script src="assets/js/jquery.cslider.js"></script>
	<script src="assets/js/slider.js"></script>
	<script src="assets/js/jquery.fancybox.js"></script>

	<script src="assets/js/excanvas.js"></script>
	<script src="assets/js/jquery.flot.js"></script>
	<script src="assets/js/jquery.flot.pie.min.js"></script>
	<script src="assets/js/jquery.flot.stack.js"></script>
	<script src="assets/js/jquery.flot.resize.min.js"></script>

	<script src="assets/js/custom.js"></script> -->
<!-- end: Java Script -->

</body>

<!-- Mirrored from bootstrapmaster.com/live/smart2/index.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 24 Apr 2014 06:31:45 GMT -->
</html>