<div class="modal fade" id="bioModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-md modal-dialog" style="width:1000px;">
    <div class="modal-content">   
      <div class="modal-header">
        <div class="panel panel-primary">
            <div class="panel-heading">
            <h6>Update Bio</h6>
            </div>
            <div class="panel-body">           
                <div class="row">
                  <form id="bioForm" class="form-horizontal" name="register" 
                  action="saveBio.php" method="POST">
                        <div class="form-group">
                            <!-- label for input text field-->
							<div class="col-md-8 col-md-offset-2">
                            	<textarea id="bioText" name="bioText" rows="10" style="width:100%;">
                            		<?php  $cu = $data[0];
            						print_r($cu['bio']);?>  
                            	</textarea>
							</div>

                        </div><!-- end of form-group-->
                            <!-- buttons for cancel and submit-->
                            <div class="col-md-8 col-md-offset-2">
                                <button type="button" class="btn btn-block btn-default " data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-block btn-primary" name="submitRegister">Submit</button>
                           </div><!--end of buttons-->
                    </form>
                </div><!--end of row-->             
            </div>                           
        </div>
     </div>
    </div>
  </div>
</div>