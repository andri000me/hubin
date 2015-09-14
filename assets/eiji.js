$(function(){
	//Anchor
	$(document).on('click','[x] a,[x]',function(e){
		// Include
		$.get('assets/js/main.js');
		$url = $(this).attr('href');
		$target = $(this).attr('target');
		//Check Target
		if($target){
			$url = $url+'?x='+$target;
			$target = '#'+$target;
		}else{
			$url = $url+'?x=true';
			$target = 'body';
		}
		$.ajax({
			url:$url,type:'post',
				beforeSend:function(){
					$('[loading]').fadeIn(100);
				},
				success: function(a){
					$('[loading]').fadeOut(100);
					$($target).html(a);
			}
		});
		return false;
	 });
});
$(function(){
	//Form
	$.get('assets/js/plugins/form.js',function(){
		$(document).on('submit','form',function(){
			$url = $(this).attr('action');
			$target = $(this).attr('target');
			if(!$url || $url==""){
				$url = location.pathname;
			}
			if(!$target || $target==""){
				$url += "?x=1";
				$target="body";
			}else{
				$url = $url+"?x="+$target;
				$target = "#"+$target;
			}
			$(this).ajaxSubmit({
				url:$url,
				beforeSend:function(){				
					$('[loading]').fadeIn(100);
				},
				success:function(a){
					$('[loading]').fadeOut(100);
					$($target).html(a)
				}
			});
			return false;
		});
	});
});