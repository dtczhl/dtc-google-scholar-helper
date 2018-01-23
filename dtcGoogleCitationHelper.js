$(function(){
	
	var myFile;
	
	$.ajax({
		url: 'https://scholar.google.com/citations?user=Xm4NYnsAAAAJ&hl=en', 
		success: function(data){
			myFile = data;
		}
	});
	
});