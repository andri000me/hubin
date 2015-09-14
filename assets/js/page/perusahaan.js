// Upload Hasil Laporan
$("[name='hasil_laporan']").change(function(){
	$progress = $(this).parent().find('.progress');
	$bar = $progress.find('.progress-bar');
	$("[name='upload-laporan']").removeAttr('disabled');
	$("[name='upload-laporan']").click(function(){
		$('#hasil-laporan').ajaxSubmit({
			url:location.pathname,
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
		    	$("[name='upload-laporan']").attr('disabled','');
		    	$("[name='hasil_laporan']").val('');
		    	$('#body').load(location.pathname+"?x=1");
		    }
		});
	});
});
// Upload Gallery prakerin
$("[name='img_prakerin[]']").change(function(){
	$progress = $(this).parent().find('.progress');
	$bar = $progress.find('.progress-bar');
	$("[name='gallery-prakerin']").removeAttr('disabled');
	$("[name='gallery-prakerin']").click(function(){
		$('#portofolio').ajaxSubmit({
			url:location.pathname,
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
		    	$("[name='gallery-prakerin']").attr('disabled','');
		    	$("[name='img_prakerin[]']").val('');
		    	$('#body').load(location.pathname+"?x=1");
		    }
		});
	});
});
// Delete
$("[delete]").click(function(){
	$conf = confirm('Hapus?');
	if($conf){
		$(this).parent().parent().fadeOut(500);
		$data = "id="+$(this).attr('rel-id')+"&delete="+$(this).attr('delete');
		$.ajax({url:location.pathname,type:'post',data:$data});
	}
});