<script type="text/javascript">
function validateForm() {
	var form = document.getElementById("registerForm");
	var firstname = form.elements["firstName"].value;
	if (firstname == null || firstname == "") {
		alert("First name is required");
		return false;
	}
	
	var lastname = form.elements["lastName"].value;
	if (lastname == null || lastname == "") {
		alert("Last name is required");
		return false;
	}
	
	var password= form.elements["password"].value;
	
	if (password.length < 8) {
		alert("Password is too short, please make it longer than 8 characters");
		return false;
	}
	
	var passwordConfirmation = form.elements["passwordConfirm"].value;
	if (password != passwordConfirmation) {
		alert("Passwords don't match");
		return false;
	}
	return true;
}	
</script>

<div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-md modal-dialog     " >
    <div class="modal-content">   
      <div class="modal-header">
        <div class="panel panel-primary">
            <div class="panel-heading">
            <h6>Register</h6>
            </div>
            <div class="panel-body">           
                <div class="row">
                  <form id="editProfileForm" class="form-horizontal" name="editProfile" 
                  action="editProfile.php" onsubmit="return validateForm()" method="POST">
                        <div class="form-group">
                            <!-- label for input text field-->
                            <div class="col-md-8 col-md-offset-2">
                                <label for="reset1"> Username:</label>
                            </div>
                            <!-- input text for username-->
                            <div class="col-md-8 col-md-offset-2">
                                <input type="text" class="form-control" name="username" 
                                placeholder=<?php echo $username; ?> disabled autofocus>
                            </div>
                            
                            <div class="col-md-8 col-md-offset-2">
                                <label for="reset1">Account Type:</label>
                            </div>
                            <!-- input text for firstname-->
                            <div class="col-md-8 col-md-offset-2">
                                <input type="checkbox" name="accountType[]" value="mentor">Mentor
                                <input type="checkbox" name="accountType[]" value="mentee">Mentee<br/> <br/>
                                <input type="radio" name="matchStatus" value="lookingForMatch" checked>Find me a match<br/>
                                <input type="radio" name="matchStatus" value="notLookingForMatch">I don't want a match just yet<br/>
                            </div>
                        </div><!-- end of form-group-->
                            <!-- buttons for cancel and submit-->
                            <div class="col-md-offset-6" style="padding-top:5px">
                                <button type="button" class="btn btn-default " data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary" name="submitRegister">Submit</button>
                           </div><!--end of buttons-->
                    </form>
                </div><!--end of row-->             
            </div>                           
        </div>
     </div>
    </div>
  </div>
</div>