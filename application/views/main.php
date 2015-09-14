<?php
/*Auto Load Jquery Plugin*/
// Ajax get x
if(!get('x')){
	$this->load->view('part/head');
}
	/*Auto load jquery plugin*/
?>
	<script src='assets/js/bootstrap.min.js'></script>
<?php
// Ajax get x = content
if(get('x')=="content"){
	if(isset($content)){
		echo "<base href='".base_url()."' />";
		$this->load->view($content);
	}
// Ajax get x = menu
}elseif(get('x')=="menu"){
	if(isset($menu)){
		$this->load->view($menu);
	}
}else{
	echo "
	<div id='body'>";
	$this->load->view('part/nav');
	if(isset($page_title)){
		$this->load->view('part/page_title');
	}
	echo "
	<div class='container'>
	<hr>
	<div class='row'>";
	if(isset($menu_top)){
		$this->load->view($menu_top);
	}
	if(isset($menu)){
	echo"	<div id='menu' class='col-md-3' style='margin-bottom:15px;'>";
		$this->load->view($menu);
		echo "
			</div>
			<div id='content' class='col-md-9'>
		";
	}else{
		echo "
			<div id='content' class='col-md-12'>
		";
	}
	if(isset($content)){
		$this->load->view($content);
	}
	echo"
		</div>
	</div>
	</div>
	";

	$this->load->view('part/footer');
	echo "</div>";
}
?>
<!-- Auto Load -->
<script>
	/*Auto Load*/
	$.get('assets/js/elastic/elastic.js',function(){
		$('textarea').elastic();
	});
	/*Auto Load*/
	$.get('assets/js/wysiwyg/wysihtml5-0.3.0.min.js'),
	$.get('assets/js/wysiwyg/bootstrap-wysihtml5.js').done(function(){
		$('#wysihtml5').wysihtml5();
	});
</script>
<?php
// Ajax get x true
if(!get('x')){
	// $this->load->view('part/client');
	// $this->load->view('part/footer');
}
?>