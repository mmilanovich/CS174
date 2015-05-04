$(document).ready(init);

function init() {
	buildMentorContactList();
	buildMenteeContactList();
}

function buildMentorContactList() {
    $.ajax({
	    type: "POST",
        url: "getMentors.php",
		dataType: "json",
		success: function(data){
               buildMentorHtmlList(data);
            }
    });
}

function buildMentorHtmlList(data) {
	var html = "";
	$('#mentorDiv').empty();
	$.each(data, function(index, data) {
		html += "<p class='bg-success'>" + data.userID +"</p>";
	});
	$('#mentorDiv').append(html);
}

function buildMenteeContactList() {
    $.ajax({
	    type: "POST",
        url: "getMentees.php",
		dataType: "json",
		success: function(data){
               buildMenteeHtmlList(data);
            }
    });
}

function buildMenteeHtmlList(data) {
	var html = "";
	$('#menteeDiv').empty();
	$.each(data, function(index, data) {
		html += "<p class='bg-info'>" + data.userID + "</p>";;
	});
	$('#menteeDiv').append(html);
}