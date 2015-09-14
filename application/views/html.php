<?php
	tcpdf();
	$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
	$obj_pdf->SetFont('helvetica', '', 9);
	$obj_pdf->AddPage();
	ob_start();
?>
	<div style="background-color:red;width:40%;">
	asdsdf
	</div>
<?php
	    $content = ob_get_contents();
	ob_end_clean();
	$obj_pdf->writeHTML($content, true, 0, true, 0);
	$obj_pdf->Output('output.pdf', 'I');
?>