// Upload slider
$("[name='img_slider']").change(function(){
  if($("[name='img_slider']").val()!=''){
	$progress = $(this).parent().find('.progress');
	$bar = $progress.find('.progress-bar');
	$("[name='tambah_slider']").removeAttr('disabled');
	$("[name='tambah_slider']").click(function(){
		$('#slider').ajaxSubmit({
			url:location.pathname+"?x=1",
			beforeSend:function(){
				$progress.show();
			},
			uploadProgress: function(a, b, c, d) {
		        var percentVal = d + '%';
		        $bar.width(percentVal);
		    },
		    complete:function(a){
		    	$bar.width(0);
		    	$progress.hide();
		    	$("[name='tambah_slider']").attr('disabled','');
		    	$("[name='img_slider']").val('');
		    	$('#body').html(a.responseText);
		    }
		});
	});
  }else{
  	$("[name='tambah_slider'").attr('disabled','');
  }
});
// Edit Album
$("[name='upload_slider']").hide();
$("[name='edit_img_slider']").change(function(){
  if($("[name='edit_img_slider']").val()!=''){
	$progress = $(this).parent().find('.progress');
	$bar = $progress.find('.progress-bar');
	$("[name='upload_slider']").fadeIn(250);
	$("[name='upload_slider']").click(function(){
		$('#slider').ajaxSubmit({
			url:location.pathname+"?x=1",
			beforeSend:function(){
				$progress.show();
			},
			uploadProgress: function(a, b, c, d) {
		        var percentVal = d + '%';
		        $bar.width(percentVal);
		    },
		    complete:function(a){
		    	$bar.width(0);
		    	$progress.hide();
		    	$("[name='upload_slider']").fadeOut(200);
		    	$("[name='edit_img_slider']").val('');
		    	$('#body').html(a.responseText);
		    }
		});
	});
  }else{
  	$("[name='upload_slider']").fadeOut(200);
  }
});
// Delete Slider
$("[delete]").click(function(){
	$conf = confirm('Yakin Hapus?');
	if($conf){
		$(this).parent().parent().fadeOut(500);
		$data = "id="+$(this).attr('rel-id')+"&delete="+$(this).attr('delete');
		$.ajax({url:location.pathname,type:'post',data:$data});
	}
});