<?php
	/*
		format data from your Google Scholar website

		return dictionary structure:
			paper title -> citation count

		Huanle Zhang at UC Davis
		www.huanlezhang.com
	*/

	header('Content-type: application/json');

	if ( isset($_POST['scholarUrl'])){
		$url = $_POST['scholarUrl'];
	} else {
		die("Error, scholarUrl is not set...");
	}

	$sepratorSymbols = array(
		"citationsAllStartSymbol" => '<td class="gsc_rsb_std">',
		"citationsAllEndSymbol" => '</td>',
		"citationsRecentStartSymbol" => '<td class="gsc_rsb_std">',
		"citationsRecentEndSymbol" => '</td>',

		"hIndexAllStartSymbol" => '<td class="gsc_rsb_std">',
		"hIndexAllEndSymbol" => '</td>',
		"hIndexRecentStartSymbol" => '<td class="gsc_rsb_std">',
		"hIndexRecentEndSymbol" => '</td>',

		"i10IndexAllStartSymbol" => '<td class="gsc_rsb_std">',
		"i10IndexAllEndSymbol" => '</td>',
		"i10IndexRecentStartSymbol" => '<td class="gsc_rsb_std">',
		"i10IndexRecentEndSymbol" => '</td>',

		"paperStartSymbol" => '<tbody id="gsc_a_b">',
		"paperEndSymbol" => '</table>',
		"paperTitleStartSymbol" => 'class="gsc_a_at">',
		"paperTitleEndSymbol" => '</a>',
		"paperCitationStartSymbol" => 'gs_ibl">',
		"paperCitationEndSymbol" => '</a>',
	);

	$googleScholarArray = array();

	$scholarHtml = file_get_contents($url);

	// Citations All
	$firstIndex = strpos($scholarHtml, $sepratorSymbols["citationsAllStartSymbol"]);
	$scholarHtml = substr($scholarHtml, $firstIndex+strlen($sepratorSymbols["citationsAllStartSymbol"]));
	$lastIndex = strpos($scholarHtml, $sepratorSymbols["citationsAllEndSymbol"]);
	$googleScholarArray["citationsAll"] = substr($scholarHtml, 0, $lastIndex);
	$scholarHtml = substr($scholarHtml, $lastIndex + strlen($sepratorSymbols["citationsAllEndSymbol"]));
	// Citations Recent
	$firstIndex = strpos($scholarHtml, $sepratorSymbols["citationsRecentStartSymbol"]);
	$scholarHtml = substr($scholarHtml, $firstIndex+strlen($sepratorSymbols["citationsRecentStartSymbol"]));
	$lastIndex = strpos($scholarHtml, $sepratorSymbols["citationsRecentEndSymbol"]);
	$googleScholarArray["citationsRecent"] = substr($scholarHtml, 0, $lastIndex);
	$scholarHtml = substr($scholarHtml, $lastIndex + strlen($sepratorSymbols["citationsRecentEndSymbol"]));
	// h-index All
	$firstIndex = strpos($scholarHtml, $sepratorSymbols["hIndexAllStartSymbol"]);
	$scholarHtml = substr($scholarHtml, $firstIndex+strlen($sepratorSymbols["hIndexAllStartSymbol"]));
	$lastIndex = strpos($scholarHtml, $sepratorSymbols["hIndexAllEndSymbol"]);
	$googleScholarArray["hIndexAll"] = substr($scholarHtml, 0, $lastIndex);
	$scholarHtml = substr($scholarHtml, $lastIndex + strlen($sepratorSymbols["hIndexAllEndSymbol"]));
	// h-index recent
	$firstIndex = strpos($scholarHtml, $sepratorSymbols["hIndexRecentStartSymbol"]);
	$scholarHtml = substr($scholarHtml, $firstIndex+strlen($sepratorSymbols["hIndexRecentStartSymbol"]));
	$lastIndex = strpos($scholarHtml, $sepratorSymbols["hIndexRecentEndSymbol"]);
	$googleScholarArray["hIndexRecent"] = substr($scholarHtml, 0, $lastIndex);
	$scholarHtml = substr($scholarHtml, $lastIndex + strlen($sepratorSymbols["hIndexRecentEndSymbol"]));
	// i10-index All
	$firstIndex = strpos($scholarHtml, $sepratorSymbols["i10IndexAllStartSymbol"]);
	$scholarHtml = substr($scholarHtml, $firstIndex+strlen($sepratorSymbols["i10IndexAllStartSymbol"]));
	$lastIndex = strpos($scholarHtml, $sepratorSymbols["i10IndexAllEndSymbol"]);
	$googleScholarArray["i10IndexAll"] = substr($scholarHtml, 0, $lastIndex);
	$scholarHtml = substr($scholarHtml, $lastIndex + strlen($sepratorSymbols["i10IndexAllEndSymbol"]));
	// i10-index recent
	$firstIndex = strpos($scholarHtml, $sepratorSymbols["i10IndexRecentStartSymbol"]);
	$scholarHtml = substr($scholarHtml, $firstIndex+strlen($sepratorSymbols["i10IndexRecentStartSymbol"]));
	$lastIndex = strpos($scholarHtml, $sepratorSymbols["i10IndexRecentEndSymbol"]);
	$googleScholarArray["i10IndexRecent"] = substr($scholarHtml, 0, $lastIndex);
	$scholarHtml = substr($scholarHtml, $lastIndex + strlen($sepratorSymbols["i10IndexRecentEndSymbol"]));

	// citations for each paper
	$firstIndex = strpos($scholarHtml, $sepratorSymbols["paperStartSymbol"]);
	$scholarHtml = substr($scholarHtml, $firstIndex);
	$lastIndex = strpos($scholarHtml, $sepratorSymbols["paperEndSymbol"]);
	$scholarHtml = substr($scholarHtml, 0, $lastIndex);

	while (!empty($scholarHtml)){

		$firstIndex = strpos($scholarHtml, $sepratorSymbols["paperTitleStartSymbol"]);
		if ($firstIndex == FALSE) break;
		$scholarHtml = substr($scholarHtml, $firstIndex+strlen($sepratorSymbols["paperTitleStartSymbol"]));
		$lastIndex = strpos($scholarHtml, $sepratorSymbols["paperTitleEndSymbol"]);

		$paperTitle = preg_replace("/[\W]+/", "", substr($scholarHtml, 0, $lastIndex));
		$paperTitle = strtolower($paperTitle);

		$scholarHtml = substr($scholarHtml, $lastIndex + strlen($sepratorSymbols["paperTitleEndSymbol"]));

		$firstIndex = strpos($scholarHtml, $sepratorSymbols["paperCitationStartSymbol"]);
		$scholarHtml = substr($scholarHtml, $firstIndex+strlen($sepratorSymbols["paperCitationStartSymbol"]));
		$lastIndex = strpos($scholarHtml, $sepratorSymbols["paperCitationEndSymbol"]);
		$citationCount = substr($scholarHtml, 0, $lastIndex);
		$scholarHtml = substr($scholarHtml, $lastIndex + strlen($sepratorSymbols["paperCitationEndSymbol"]));

		$googleScholarArray[$paperTitle] = $citationCount;
	}

	echo json_encode($googleScholarArray);
?>
