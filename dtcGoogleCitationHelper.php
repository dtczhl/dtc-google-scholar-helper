<?php

	header('Content-type: application/json');
	
	if ( isset($_POST['scholarUrl'])){
		$url = $_POST['scholarUrl'];
	} else {
		die("Error, scholarUrl is not set...");
	}

	$paperStartSymbol = '<tbody id="gsc_a_b"';
	$paperEndSymbol = '</table>';
	
	$paperTitleStartSymbol = '"gsc_a_at">';
	$paperTitleEndSymbol = '</a>';
	
	$paperCitationStartSymbol = 'gs_ibl">';
	$paperCitationEndSymbol = '</a>';
	
	$scholarHtml = file_get_contents($url);
	$firstIndex = strpos($scholarHtml, $paperStartSymbol);
	$scholarHtml = substr($scholarHtml, $firstIndex);
	$lastIndex = strpos($scholarHtml, $paperEndSymbol);
	$scholarHtml = substr($scholarHtml, 0, $lastIndex);
	
	$paperCitationCountArray = array();
	
	while (!empty($scholarHtml)){
		
		$firstIndex = strpos($scholarHtml, $paperTitleStartSymbol);
		if ($firstIndex == FALSE) break;
		$scholarHtml = substr($scholarHtml, $firstIndex+strlen($paperTitleStartSymbol));
		$lastIndex = strpos($scholarHtml, $paperTitleEndSymbol);
		
		$paperTitle = preg_replace("/[\W]+/", "", substr($scholarHtml, 0, $lastIndex));
		$paperTitle = strtolower($paperTitle);
		
		$scholarHtml = substr($scholarHtml, $lastIndex + strlen($paperTitleEndSymbol));
		
		$firstIndex = strpos($scholarHtml, $paperCitationStartSymbol);
		$scholarHtml = substr($scholarHtml, $firstIndex+strlen($paperCitationStartSymbol));
		$lastIndex = strpos($scholarHtml, $paperCitationEndSymbol);
		$citationCount = substr($scholarHtml, 0, $lastIndex);
		$scholarHtml = substr($scholarHtml, $lastIndex + strlen($paperCitationEndSymbol));
		
		$paperCitationCountArray[$paperTitle] = $citationCount;
	}
	
	echo json_encode($paperCitationCountArray);



?>