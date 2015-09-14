<?php
	// Doom PDF
	function pdf_create($html, $filename='', $stream=TRUE){
	    require_once("dompdf/dompdf_config.inc.php");

	    $dompdf = new DOMPDF();
	    $dompdf->load_html($html);
	    $dompdf->render();
	    if ($stream) {
	        $dompdf->stream($filename.".pdf",array('Attachment'=>0));
	    } else {
	        return $dompdf->output();
	    }
	}
	// Keterangan Alumni
	function siswa_ket($ket){
		if($ket=='Kuliah'){
			$ket = "<span class='label label-success'><i class='glyphicon glyphicon-book'></i> $ket</span>";
		}elseif($ket=='Mencari Kerja'){
			$ket = "<span class='label label-info'><i class='glyphicon glyphicon-credit-card'></i> $ket</span>";
		}elseif($ket=='Bekerja'){
			$ket = "<span class='label label-primary'><i class='glyphicon glyphicon-thumbs-up'></i> $ket</span>";
		}else{
			$ket = "<span class='label label-warning'><i class='glyphicon glyphicon-user'></i> Free</span>";			
		}
		return $ket;
	}
	function post($array){
		if(isset($_POST[$array])){
			return $_POST[$array];
		}
	}
	function get($array){
		if(isset($_GET[$array])){
			return $_GET[$array];
		}
	}
	function myurl(){
		return $_SERVER['REDIRECT_URL'];
	}
	function alert($msg){
		echo "<script>alert('$msg')</script>";
	}
	function push_url($url=""){
		$base = "http://".$_SERVER['HTTP_HOST'].str_replace('index.php','',$_SERVER['SCRIPT_NAME']);
		echo"
		<script>
			//$.ajax({url:'$url?x=1',
			//	complete:function(a){
					window.history.pushState({path:'$url'},'','$url');
					$('body').html(a.responseText);
			//	}
			//});
		</script>";
	}
	function direct($url=''){
		/*echo"
		<script>
			$.ajax({url:'$url?x=1',
				success:function(a){
					$('#body').html(a);
				}
			});
			window.history.pushState({path:location.pathname},'','$url');
		</script>
		";*/
		if(!$url){
			$url = "front";
		}
		echo"
		<script>
			window.history.pushState({path:location.pathname},'','$url');
			$('#body').load('$url?x=1');
		</script>
		<noscript>location='$url';</noscript>
		";
	}
	function img_default($img,$name){
		if(!$img){
			return $name;
		}else{
			return $img;
		}
	}
	// Thumbnails
	function get_thumb($img_name){
		$name = '';
		$ex = explode(".", $img_name);
		if(count($ex)>2){
			$x = $ex;
			unset($x[count($ex)-1]);
			$name = implode(".", $x);
		}else{
			for($i=0;$i<count($ex)-1;$i++){
				$name .= $ex[$i];
			}
		}
		
		$img = $name."_thumb.".$ex[count($ex)-1];
		return $img;
	}
	// Date Convert
	function date_convert($date){
		$date = explode("-", $date);
		$tahun = $date[0];
		$bulan = $date[1];
		$hari = $date[2];
		switch ($bulan) {
			case '01':
				$bulan="Januari";
				break;
			case '02':
				$bulan="Februari";
				break;
			case '03':
				$bulan="Maret";
				break;
			case '04':
				$bulan="April";
				break;
			case '05':
				$bulan="Mei";
				break;
			case '06':
				$bulan="Juni";
				break;
			case '07':
				$bulan="Juli";
				break;
			case '08':
				$bulan="Agustus";
				break;
			case '09':
				$bulan="September";
				break;
			case '10':
				$bulan="Oktober";
				break;
			case '11':
				$bulan="November";
				break;
			case '12':
				$bulan="Desember";
				break;
		}
		return "$hari $bulan $tahun";
	}
	// TCPDF
	function tcpdf(){
	    require_once('tcpdf/config/lang/eng.php');
	    require_once('tcpdf/tcpdf.php');
	}
?>