// Upload Logo siswa
$("[name='foto_siswa']").change(function(){
	$progress = $(this).parent().find('.progress');
	$bar = $progress.find('.progress-bar');
	$("[name='upload-foto']").removeAttr('disabled');
	$("[name='upload-foto']").click(function(e){
		e.preventDefault(); // <-- important
		$('#foto-siswa').ajaxSubmit({
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
		    	$("[name='upload-foto']").attr('disabled','');
		    	$("[name='foto_siswa']").val('');
		    	$('#body').load(location.pathname+"?x=1");
		    }
		});
	});
});
// Upload Portofolio
$("[name='img_portofolio[]']").change(function(){
	$progress = $(this).parent().find('.progress');
	$bar = $progress.find('.progress-bar');
	$("[name='upload-portofolio']").removeAttr('disabled');
	$("[name='upload-portofolio']").click(function(){
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
		    	$("[name='upload-portofolio']").attr('disabled','');
		    	$("[name='img_portofolio[]']").val('');
		    	$('#body').load(location.pathname+"?x=1");
		    }
		});
	});
});
// Delete pendidikan formal
$("[delete]").click(function(){
	$conf = confirm('Hapus?');
	if($conf){
		$(this).parent().parent().fadeOut(500);
		$data = "id="+$(this).attr('rel-id')+"&delete="+$(this).attr('delete');
		$.ajax({url:location.pathname,type:'post',data:$data});
	}
});