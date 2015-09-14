var base_url = location.host+"/hubin/";
//Load Jquery Plugin
	// $.get('assets/js/flexslider.js');
	// $.get('assets/js/jquery.fancybox.js');
	// $.get('assets/js/custom.js');

/* the below code is to override back button to get the ajax content without reload*/
$(window).bind('popstate', function() {
	$.ajax({url:location.pathname+'?x=1',success: function(data){
		$('#body').html(data);
	}});
});


// Toogle
$(document).on('click','#footer-menu-back-to-top',function(){
	var body = $("html, body");
	body.animate({scrollTop:0}, '500', 'swing');
});

// Toogle
$(document).on('click','[toggle]',function(){
	$("[target-toggle='"+$(this).attr('toggle')+"']").fadeToggle(500);
});

// class x direct close in table
$(document).on('click','.c',function(){
	$(this).parent().parent().fadeOut(250);
});


// Theme
$(document).on('click','.line-smk div,[change-theme]',function(){
	$data = "jurusan="+$(this).attr('rel');
	$.ajax({url:'front/style',type:'post',data:$data,
		beforeSend:function(){
			$('[loading]').fadeIn(100);
		},
		complete:function(a){
			if($.browser.mozilla) location.reload();
			$('[style]').attr('href','front/style');
			$('[loading]').fadeOut(100);
		}	
	});
});

// AJAX Reload
$(function(){
	//Anchor
	$(document).on('click','[x] a,[x]',function(e){
		$url = $(this).attr('href');
		$target = $(this).attr('target');
		//Check Target
		if($target){
			$link = $url+'?x='+$target;
			$target = '#'+$target;
		}else{
			$link = $url+'?x=true';
			$target = '#body';
		}
		$.ajax({
			url:$link,type:'post',
				beforeSend:function(){
					$('[loading]').fadeIn(100);
				},
				complete: function(a){
					$('[loading]').fadeOut(100);
					$($target).html(a.responseText);
			}
		});
			if(!$url){
				$url = "front";
			}
			window.history.pushState({path:location.pathname},'',$url);
		return false;
	 });
	//Form
	$.get('assets/js/form.js',function(){
		$(document).on('submit','form',function(e){
			e.preventDefault(); // <-- important
			$url = $(this).attr('action');
			$link = $url;
			$target = $(this).attr('target');
			if(!$url || $url==""){
				$link = location.pathname;
			}
			if(!$target || $target==""){
				$link += "?x=1";
				$target="#body";
			}else{
				$link = $url+"?x="+$target;
				$target = "#"+$target;
			}
			$(this).ajaxSubmit({
				url:$link,
				beforeSend:function(){				
					$('[loading]').fadeIn(100);
				},
				complete:function(a){
					$('[style]').attr('href','front/style');
					$('[loading]').fadeOut(100);
					$($target).html(a.responseText);
					// window.scrollTo(0,0);
				}
			});
			window.history.pushState({path:location.pathname},'',$url);
			return false;
		});
	});
	//Pagination
	$.get('assets/js/form.js',function(){
		$(document).on('click','.pagination a',function(){
			$url = $(this).attr('href');
			$link = $url;
			$target = $('form').attr('target');
			if(!$url || $url==""){
				$link = location.pathname;
			}
			if(!$target || $target==""){
				$link += "?x=1";
				$target = "#body";
			}else{
				$link = $url+"?x="+$target;
				$target = "#"+$target;
			}
			$('form').ajaxSubmit({
				url:$link,
				beforeSend:function(){				
					$('[loading]').fadeIn(100);
				},
				complete:function(a){
					$('[style]').attr('href','front/style');
					$('[loading]').fadeOut(100);
					$($target).html(a.responseText);
					// window.scrollTo(0,0);
				}
			});
			if(!$url){
				$url = "front";
			}
			window.history.pushState({path:location.pathname},'',$url);
			return false;
		});
	});
});

// Aksi Delete
$(document).on('click','[remove]',function(){
	$confirm = confirm("Yakin Hapus?");
	if($confirm){
		$data = "id="+$(this).attr('remove')+"&delete="+$(this).attr('rel');
		$.ajax({url:location.pathname,type:'post',data:$data,
			beforeSend:function(){
				$('[loading]').fadeIn(100);
			},
			success:function(a){
				$('[loading]').fadeOut(100);
				$('#body').load(location.pathname+"?x=1");
			}
		});
	}
});

// Aksi Active Register
$(document).on('click','[reg-status]',function(){
	$confirm = confirm("Terima sebagai Alumni ADI SANGGORO!");
	if($confirm){
		$data = "id="+$(this).attr('reg-id')+"&status_reg="+$(this).attr('reg-status');
		$.ajax({url:location.pathname,type:'post',data:$data,
			beforeSend:function(){
				$('[loading]').fadeIn(100);
			},
			success:function(a){
				$('[loading]').fadeOut(100);
				$('#body').load(location.pathname+"?x=1");
			}
		});
	}
});

// Aksi Active Non Active
$(document).on('click','[status]',function(){
	$data = "id="+$(this).attr('status-id')+"&status="+$(this).attr('status');
	$.ajax({url:location.pathname,type:'post',data:$data,
		beforeSend:function(){
			$('[loading]').fadeIn(100);
		},
		success:function(a){
			$('[loading]').fadeOut(100);
			$('#body').load(location.pathname+"?x=1");
		}
	});
});