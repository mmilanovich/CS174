<script type="text/javascript">function validateForm() {	var form = document.getElementById("registerForm");	alert("Validating");	var firstname = form.elements["firstName"].value;	if (firstname == null || firstname == "") {		alert("First name is required");		return false;	}		var lastname = form.elements["lastName"].value;	if (lastname == null || lastname == "") {		alert("Last name is required");		return false;	}		var password= form.elements["password"].value;		if (password.length < 8) {		alert("Passwords is too short, please make it longer than 8 characters");		return false;	}		var passwordConfirmation = form.elements["passwordConfirm"].value;	if (password != passwordConfirmation) {		alert("Passwords don't match");		return false;	}	form.submit();	return true;}	</script><div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">  <div class="modal-md modal-dialog     " >    <div class="modal-content">         <div class="modal-header">        <div class="panel panel-primary">            <div class="panel-heading">            <h6>Register</h6>            </div>            <div class="panel-body">                           <div class="row">                  <form id="registerForm" class="form-horizontal" name="register"                   action="register.php" method="POST">                        <div class="form-group">                            <!-- label for input text field-->                            <div class="col-md-8 col-md-offset-2">                                <label for="reset1"> Username:</label>                            </div>                            <!-- input text for username-->                            <div class="col-md-8 col-md-offset-2">                                <input type="text" class="form-control" name="username"                                 placeholder="Please Enter User Name" autofocus>                            </div>                            <!-- input text for password-->                            <div class="col-md-8 col-md-offset-2">                                <label for="reset1"> Password:</label>                            </div>                            <div class="col-md-8 col-md-offset-2">                                <input type="password" class="form-control" name="password"                                 placeholder="Please Enter Your Password" >                            </div>                                                        <div class="col-md-8 col-md-offset-2">                                <label for="reset1">Confirm Password:</label>                            </div>                            <!-- input text for confirm password-->                            <div class="col-md-8 col-md-offset-2">                                <input type="password" class="form-control" name="passwordConfirm"                                 placeholder="Please Enter Your Password Again"  >                            </div>                            <div class="col-md-8 col-md-offset-2">                                <label for="reset1">Firstname:</label>                            </div>                            <!-- input text for firstname-->                            <div class="col-md-8 col-md-offset-2">                                <input type="text" class="form-control" name="firstName"                                 placeholder="Please Enter Your Firstname"  >                            </div>                                                        <div class="col-md-8 col-md-offset-2">                                <label for="reset1">Lastname:</label>                            </div>                            <!-- input text for firstname-->                            <div class="col-md-8 col-md-offset-2">                                <input type="text" class="form-control" name="lastName"                                 placeholder="Please Enter Your Lastname"  >                            </div>                                                        <div class="col-md-8 col-md-offset-2">                                <label for="reset1">Account Type:</label>                            </div>                            <!-- input text for firstname-->                            <div class="col-md-8 col-md-offset-2">                                <input type="checkbox" name="accountType[]" value="mentor">Mentor                                <input type="checkbox" name="accountType[]" value="mentee">Mentee<br/> <br/>                                <input type="radio" name="matchStatus" value="lookingForMatch" checked>Find me a match<br/>                                <input type="radio" name="matchStatus" value="notLookingForMatch">I don't want a match just yet<br/>                            </div>                        </div><!-- end of form-group-->                            <!-- buttons for cancel and submit-->                            <div class="col-md-offset-6" style="padding-top:5px">                                <button type="button" class="btn btn-default " data-dismiss="modal">Cancel</button>                                <button type="button" class="btn btn-primary" onclick="validateForm()" name="submitRegister">Submit</button>                           </div><!--end of buttons-->                    </form>                </div><!--end of row-->                         </div>                                   </div>     </div>    </div>  </div></div>