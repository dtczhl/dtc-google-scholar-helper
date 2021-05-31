/*
  Display Google Scholar profile to your website

  Huanle Zhang at UC Davis
  www.huanlezhang.com

  Configuration:
    pathToGoogleScholarCitationTxt: pth to the google_scholar_citation text file. 
    

*/

var dtcGoogleScholarVariables = {

    // change it !!
	// pathToGoogleScholarCitationTxt: "google_scholar_citation.txt",
	pathToGoogleScholarCitationTxt: "dtc-google-scholar-helper/Python_Offline/google_scholar_citation.txt",

    updateTimeClass: "dtcGoogleUpdateTime",

	citationsAllClass: "dtcGoogleCitationsAll",
	citationsRecentClass: "dtcGoogleCitionsRecent",
	hIndexAllClass: "dtcGoogleHIndexAll",
	hIndexRecentClass: "dtcGoogleHIndexRecent",
	i10IndexAllClass: "dtcGoogleI10IndexAll",
	i10IndexRecentClass: "dtcGoogleI10IndexRecent",

	paperTitleClass: "dtcGooglePaperTitle",
	paperCitationCountClass: "dtcGoogleCitationCount"
};


function dtcGoogleScholarHelper(){

	$.ajax({
		url : dtcGoogleScholarVariables["pathToGoogleScholarCitationTxt"],
		dataType : "text",
		success : function (t) {

				var lines = t.split('\n');

				var data = {};
				data["updateTime"] = lines[0];
				data["citationsAll"] = lines[1];
				data["citationsRecent"] = lines[2];
				data["hIndexAll"] = lines[3];
				data["hIndexRecent"] = lines[4];
				data["i10IndexAll"] = lines[5];
				data["i10IndexRecent"] = lines[6];

				var index = 7;
				while (index < lines.length) {
					data[lines[index]] = lines[index+1];
					index = index + 2;
				}

				var $updateTime = $("." + dtcGoogleScholarVariables["updateTimeClass"]);
				if ($updateTime.length !== 0) {
				        $updateTime[0].innerText = data["updateTime"];
				}

				var $citationsAll = $("." + dtcGoogleScholarVariables["citationsAllClass"]);
                if ($citationsAll.length !== 0) {
                    $citationsAll[0].innerText = data["citationsAll"];
                }
                var $citationsRecent = $("." + dtcGoogleScholarVariables["citationsRecentClass"]);
                if ($citationsRecent.length !== 0) {
                    $citationsRecent[0].innerText = data["citationsRecent"];
                }
                var $hIndexAll = $("." + dtcGoogleScholarVariables["hIndexAllClass"]);
                if ($hIndexAll.length !== 0) {
                    $hIndexAll[0].innerText = data["hIndexAll"];
                }
                var $hIndexRecent = $("." + dtcGoogleScholarVariables["hIndexRecentClass"]);
                if ($hIndexRecent.length !== 0) {
                    $hIndexRecent[0].innerText = data["hIndexRecent"];
                }
                var $i10IndexAll = $("." + dtcGoogleScholarVariables["i10IndexAllClass"]);
                if ($i10IndexAll.length !== 0) {
                    $i10IndexAll[0].innerText = data["i10IndexAll"];
                }
                var $i10IndexRecent = $("." + dtcGoogleScholarVariables["i10IndexRecentClass"]);
                if ($i10IndexRecent.length !== 0) {
                    $i10IndexRecent[0].innerText = data["i10IndexRecent"];
                }

                // citations for each paper
                var $paperTitles = $("." + dtcGoogleScholarVariables["paperTitleClass"]);
                var $paperCitationCount = $("." + dtcGoogleScholarVariables["paperCitationCountClass"]);

                for (var i = 0; i < $paperTitles.length; i++){
                    var paperTitle = $paperTitles[i].innerText;

                    paperTitle = paperTitle.replace(/\W/g, "").toLowerCase();
                    if (data[paperTitle] !== ""){
                        if (/\d/.test(data[paperTitle])){
                            $paperCitationCount[i].innerText = data[paperTitle];
                        } else {
                            $paperCitationCount[i].innerText = "NA";
                        }
                    } else {
                        $paperCitationCount[i].innerText = "0";
                    }
                }
		}
	});

}
