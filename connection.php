
<?php
	session_start();
	$userID = $_SESSION['username'];
	global $rows;
	global $rows1;
	try {
		$con = new PDO("mysql:host=localhost;dbname=MentorWeb", "root", "root");
		$con->setAttribute(PDO::ATTR_ERRMODE,
						   PDO::ERRMODE_EXCEPTION);
		
		$sql = "SELECT mentor_user_id AS userID FROM mentor_mentee WHERE mentee_user_id=:user";
		$sql1 = "SELECT mentee_user_id AS userID FROM mentor_mentee WHERE mentor_user_id=:user";
		$q = $con->prepare($sql);
		$q->execute(array(':user' => $userID));
		$rows = $q->fetchAll();
		
		$q1 = $con->prepare($sql1);
		$q1->execute(array(':user' => $userID));
		$rows1 = $q1->fetchAll();
		
	
	} catch(PDOException $ex) {
		echo "<p>Connection failed</p>";
	}
?>
	

<html>
<head>
	<title>My Connections</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
	    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	    <!-- Squad theme CSS -->
		<link href="css/message.css" rel="stylesheet">
	    <link href="color/default.css" rel="stylesheet">
	    <script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/message.js"></script>
		<script>
		$("#clear").click(funtion(){
			alert("here");
		 });
		
		</script>
  		 
</head>
<body style="background-image: url('photos/connection.jpg');">

	 <div class="row" style="padding-top: 10px;">
	 	<div class="col-lg-8 col-lg-offset-2">
	 	 <a href="profilePage.php" class="btn btn-primary btn-block">
   		 <span class="glyphicon glyphicon-arrow-left"></span> Back
 	 	 </a>
 	 	 <button class="btn btn-primary btn-block" id="clear" onclick = location.reload();>
   		 	<span class="glyphicon glyphicon-off"></span> Close Profile

 	 	 </button>
 	 	
		 <h1 style="color:white; background:#337ab7; text-align:center;">My Connections</h1>
		 
	 	</div>
	 </div>
	 
	<div class="row" >
	
		<div class="col-md-4 col-md-offset-2">
			<div class="panel panel-Primary">
      			<div class="panel-heading"><h4>Mentors</h4></div>
      			<div class="panel-body" id="mentorDiv"> 
      				<?php
						for ($i = 0; $i < count($rows); $i++) {
		
						echo'
								<p  class="bg-info viewprofile" style="cursor:pointer;" data-name="'.$rows[$i]["userID"].' ">
								<span class="glyphicon glyphicon-user"></span>
            					'.$rows[$i]["userID"].'</p>';
							}
		
					?>
		
      			</div>
   		 	</div>
   		 </div>
   		
   		 
   		 <div class="col-md-4">
    		<div class="panel panel-Primary">
      			<div class="panel-heading"><h4>Mentees</h4></div>
      			<div class="panel-body" id="menteeDiv">
      			<?php
					for ($j = 0; $j < count($rows1); $j++) {
		
					echo'
							<p  class="bg-info viewprofile" style="cursor:pointer;" data-name="'.$rows1[$j]["userID"].' ">
							<span class="glyphicon glyphicon-user"></span>
            				'.$rows1[$j]["userID"].'</p>';
						}
		
				?>
		
      			</div>
    		</div>
    	</div>
    </div>
    	<div class="row">
    		<div class="col-md-8 col-md-offset-2" id="profileDiv">
    			
      			
      		</div>
    	</div>
    	</div>
    </div>

<script>
		var viewname;
		$(".viewprofile").on("click",function(){
			viewname = $(this).data("name");
			//alert(viewname);
			getPersonalInfo();
			getMentors();
			getMentees();
			getInterest();
			getAverageRating();
			getSpecificReview();
			getAllReviews();		
			});
			
			function getPersonalInfo(){
			//var viewname = $(this).data("name");
			//alert(viewname);
			$.ajax({
			type:"POST",
			url: "getViewProfile.php",
			data: "viewprofile=" + viewname,
			dataType: "json",
			success: function(data){
			buildViewProfile(data);
					}
				});
			}
			
			function getMentors(){
			$.ajax({
	   		type: "POST",
       		 url: "getMentors.php",
       		 data: "viewprofile=" + viewname,
			dataType: "json",
			success: function(data){
               buildMentorHtmlList(data);
           			 }
    			});	
    		}
    		
    		function getMentees(){
    		
    		$.ajax({
	   		type: "POST",
       		 url: "getMentees.php",
       		 data: "viewprofile=" + viewname,
			dataType: "json",
			success: function(data){
               buildMenteeHtmlList(data);
           			 }
    			});	
			//	alert(viewname);
			}
			
			function getInterest(){
			
			$.ajax({
	   		type: "POST",
       		 url: "getInterest.php",
       		 data: "viewprofile=" + viewname,
			dataType: "json",
			success: function(data){
              buildInterstList(data);
           			 }
    			});	
				
			}
			
			function getSpecificReview(){
			
			$.ajax({
	   			type: "POST",
       			url: "getSpecificReview.php",
				dataType: "json",
				data: "viewprofile=" + viewname,
				success: function(data){
					buildSpecificReviewList(data);
           		}
    		});	
				
			}
			
			function getAllReviews(){
			
			$.ajax({
	   			type: "POST",
       			url: "getReviews.php",
				dataType: "json",
				data: "viewprofile=" + viewname,
				success: function(data){
					buildReviewList(data);
           		}
    		});	
				
			}
			
			function getAverageRating(){
			
			$.ajax({
	   			type: "POST",
       			url: "getAverageRating.php",
				dataType: "json",
				data: "viewprofile=" + viewname,
				success: function(data){
					buildAverageRatingElement(data);
           		}
    		});	
				
			}
			
			
			function buildViewProfile(data){
				
				var html = "";
				$.each(data, function(index,data) {
				var newhtml = "";
				newhtml += "<div class='panel panel-Primary'>";
				newhtml += "<div class='panel-heading' id='profileheader'><h4 style='text-align:center;'>"
						+ data.username +"'s Profile"+"</h4></div>"; 
				newhtml += "<div class= 'panel-body' id='profilebody'>";	
				newhtml += "<h4 style= 'background: #5bc0de; '><strong><em> Personal Info</strong></em></h4><br>";
				newhtml += "<p class='bg-info'> "+" First Name:	"+  data.firstName+"<br>"
						+ "Last Name:		"+ data.lastName+"<br> ";
				newhtml += " Mentor Status:		"+ data.mentor+"<br>";
				newhtml += " Mentee Status:		"+ data.mentee+"<br>";
				newhtml += " Looking for Match:		"+data.lookingForMatch+"</p>"; 
				newhtml += "<hr>";
				newhtml += "<h4 style= 'background: #5bc0de; '><strong><em> Connections</strong></em></h4><br>";
			
			
				html = newhtml + html;
			
				});
				$('#profileDiv').html(html)
			 
			}
		
	function buildMentorHtmlList(data) {
	var html = "";
	//alert("mentor");
	$.each(data, function(index,data) {
		
		html += "<p class='bg-success user'> " + data.mentor_user_id +"</p>";
		
	});
	$('#profilebody').append(html);
	}
	
	
	function buildMenteeHtmlList(data) {
	var html = "";
	//alert("mentor2");
	$.each(data, function(index, data) {
		
		html += "<p class='user bg-info'>" + data.mentee_user_id + "</p>";
		
	});
	$('#profilebody').append(html);
	}

	function buildInterstList(data){
	//alert(viewname);
	var html = "";
	html += "<hr>";
	html += "<h4 style= 'background: #5bc0de; '><strong><em> Interests</strong></em></h4><br>";
	$.each(data, function(index, data) {
		html += "<p class='user bg-info'>" + data.interest + "</p>";
		//html += "</div></div>";
	});
	
	$('#profilebody').append(html);
	}
	
	function buildSpecificReviewList(data){
		var html = "<hr>";
		html += "<h4 style= 'background: #5bc0de; '><strong><em>Your Review</strong></em></h4><br>";
		html += "<div id='your_review'>";
		if (data.length == 0) {
			html += "<button id='reviewButton' data-messagebody='0' type='submit' class='btn btn-default' type='button' onclick='editReview()'>Edit Review</button></span>";
		}
		$.each(data, function(index, data) {
			html += "<p class='user bg-info'>Stars: " + data.stars + "<br> Comments: " + data.messageBody + "</p>";
			html += "<span class='input-group-btn'><button id='reviewButton' data-messagebody='" + data.messageBody + "' type='submit' class='btn btn-default' type='button' onclick='editReview()'>Edit Review</button></span>";
		});	
		html += "</div></div></div>";
		$('#profilebody').append(html);
	}
	
	function buildAverageRatingElement(data){
	//alert(viewname);
	var html = "";
	html += "<hr>";
	html += "<h4 style= 'background: #5bc0de; '><strong><em>Average Rating</strong></em></h4><br>";
	$.each(data, function(index, data) {
		if (data.stars == null) {
			html += "<p class='user bg-info'> No reviews</p>";
		} else {
			html += "<p class='user bg-info'>" + data.stars + " with a total of " + data.count + " reviews</p>";
		}
	});
	
	$('#profilebody').append(html);
	}
	
	function buildReviewList(data) {
		var html = "<hr>";
		html += "<h4 style= 'background: #5bc0de; '><strong><em>Other Reviews</strong></em></h4><br>";
		$.each(data, function(index, data) {
			html += "<p class='user bg-info'><strong>Reviewer</strong>: " + data.reviewerID + ", <strong>Stars</strong>: " + data.stars + "<br> <strong>Comments</strong>: " + data.messageBody + "</p>";
			html += "<hr>";
		});	
		$('#profilebody').append(html);
	}

    function editReview() {
   	 var messageBody = $('#reviewButton').attr("data-messagebody");
   	 var html = "<div class='form-group'><label for='sel1'>Star Rating (select one):</label><select class='form-control' id='sel1'><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option></select><br>";
   	 html += "<textarea id='messageBody' class='form-control' rows='5' id='comment'> " 
	 if (messageBody != '0') {
		 html += messageBody;
	 }
	 html += "</textarea>";
   	 html += "<button class='btn btn-default' onclick='submitReview()' type='button'>Submit</button>";
   	 $('#your_review').html(html); 
    }
 
    function submitReview() {
   	 	var stars = $('#sel1').val();
   		var messageBody = $('#messageBody').val();
   		$.ajax({
   			type:"POST",
   			url: "postReview.php",
   			data: "viewprofile=" + viewname + "&stars=" + stars + "&messageBody=" + messageBody,
   			dataType: "json",
   			complete: function(data){
   				$('#your_review').html("<p class='user bg-info'>Review posted, thanks for the feedback!</p>");
   			}
   		});
   	}
</script>

</body>
</html>