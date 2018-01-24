/* 

	Huanle Zhang at UC Davis
	www.huanlezhang.com
	
	
	pathTodtcGoogleCitationHelperPhp: path to the PHP file
	
*/

var dtcGoogleCitationVariables = {
	pathTodtcGoogleCitationHelperPhp: 'google-citation-helper/dtcGoogleCitationHelper.php',
	paperTitleClass: "dtcGooglePaperTitle",
	paperCitationCountClass: "dtcGoogleCicationCount"
};

function dtcGoogleCitationCount(scholarUrl){
	
	var paperCitationCountArray = {};
	
	$.ajax({
		type: 'POST',
		url: dtcGoogleCitationVariables['pathTodtcGoogleCitationHelperPhp'],
		data: 'scholarUrl=' + scholarUrl,
		dataType: 'json',
		cache: false,
		success: function(data){
			
			var $paperTitles = $("." + dtcGoogleCitationVariables["paperTitleClass"]);
			var $paperCitationCount = $("." + dtcGoogleCitationVariables["paperCitationCountClass"]);
			
			for (var i = 0; i < $paperTitles.length; i++){
				var paperTitle = $paperTitles[i].innerText;
				
				paperTitle = paperTitle.replace(/\W/g, '').toLowerCase();
				if (data[paperTitle] != ''){
					$paperCitationCount[i].innerText = data[paperTitle];
				} else {
					$paperCitationCount[i].innerText = "0";
				}
			}
			
		}
	});
}
	
