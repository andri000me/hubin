// Upload Album
$("[name='img_album[]'],[name='nama_album']").change(function(){
  if($("[name='img_album[]']").val()!='' && $("[name='nama_album']").val()!=''){
	$progress = $(this).parent().find('.progress');
	$bar = $progress.find('.progress-bar');
	$("[name='tambah_album']").removeAttr('disabled');
	$("[name='tambah_album']").click(function(){
		$('#album').ajaxSubmit({
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
		    	$("[name='tambah_album']").attr('disabled','');
		    	$("[name='img_album[]']").val('');
		    	$('#body').html(a.responseText);
		    }
		});
	});
  }else{
  	$("[name='tambah_album'").attr('disabled','');
  }
});
// Edit Album
$("[name='add_img_album[]']").change(function(){
  if($("[name='add_img_album[]']").val()!=''){
	$progress = $(this).parent().find('.progress');
	$bar = $progress.find('.progress-bar');
	$("[name='tambah_gallery']").fadeIn(250);
	$("[name='tambah_gallery'] a").click(function(){
		$('#album').ajaxSubmit({
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
		    	$("[name='tambah_gallery']").fadeOut(200);
		    	$("[name='add_img_album[]]']").val('');
		    	$('#body').html(a.responseText);
		    }
		});
	});
  }else{
  	$("[name='tambah_gallery']").fadeOut(200);
  }
});
// Delete Gallery Album
$("[delete]").click(function(){
	$conf = confirm('Yakin Hapus?');
	if($conf){
		$(this).parent().parent().fadeOut(500);
		$data = "id="+$(this).attr('rel-id')+"&delete="+$(this).attr('delete');
		$.ajax({url:location.pathname,type:'post',data:$data});
	}
});