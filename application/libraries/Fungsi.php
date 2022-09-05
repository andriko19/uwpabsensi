<?php

Class Fungsi {

	protected $ci;
		
	function __construct() {
		$this->ci =& get_instance();
	}

	function PdfGenerator($html, $filename, $paper, $orientation) {

		$options = new Options\Options();
		$options->set('isRemoteEnabled', TRUE);
		
 		$dompdf = new Dompdf\Dompdf($options);
		$dompdf->loadHtml($html);
		$dompdf->setPaper($paper, $orientation);
		$dompdf->render();
		$dompdf->stream($filename, array('Attachment' => 0 ));
	}
	
}