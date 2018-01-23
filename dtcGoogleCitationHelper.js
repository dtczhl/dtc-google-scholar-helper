function dtcGoogleCitationCount(scholarUrl){
	
	var paperCitationCountArray = {};
	
	$.ajax({
		type: 'POST',
		url: 'google-citation-helper/dtcGoogleCitationHelper.php',
		data: 'scholarUrl=' + scholarUrl,
		dataType: 'json',
		cache: false,
		success: function(data){
			console.log(data);
			console.log(data["when pipelines meet fountain: fast data dissemination in wireless sensor networks"]);
		}
	});
}
	
