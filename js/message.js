$(document).ready(init);

function init() {
	buildContactList();
	getMessages()
	setInterval(function(){
	      getMessages();
	    },5000);
	//getMessages();
}

function sendMessage() {
	var recipient = $('#contactList').val();
	var messageBody = $('#messageBody').val();
    $.ajax({
	    type: "POST",
        url: "sendMessage.php",
		data: "recipient=" + recipient + "&body=" + messageBody
    });
}

function getMessages() {
    $.ajax({
	    type: "POST",
        url: "getMessages.php",
		dataType: "json",
		success: function(data){
               buildMessageList(data);
            }
    });
}

function buildMessageList(data) {
	var html = "";
	
	$.each(data, function(index, data) {
		var newhtml = "";
		newhtml += "<div class='well'><p>" + data.senderID + " said to " + data.recipientID + "</p>";
		newhtml += "<br>";
		newhtml += "<p>" + data.messageBody + "</p>";
		newhtml += "</div>";
		html = newhtml + html;
	});
	$('#messages').html(html);
}

function buildContactList() {
    $.ajax({
	    type: "POST",
        url: "getContacts.php",
		dataType: "json",
		success: function(data){
               buildHtmlList(data);
            }
    });
}

function buildHtmlList(data) {
	var html = "";
	$.each(data, function(index, data) {
		html += '<option value="' + data.userID + '">Send a message to ' + data.userID + '</option>';
	});
	$('#contactList').append(html);
}