<div class="modal fade" id="bioModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-md modal-dialog     " >
    <div class="modal-content">   
      <div class="modal-header">
        <div class="panel panel-primary">
            <div class="panel-heading">
            <h6>Register</h6>
            </div>
            <div class="panel-body">           
                <div class="row">
                  <form id="bioForm" class="form-horizontal" name="register" 
                  action="saveBio.php" method="POST">
                        <div class="form-group">
                            <!-- label for input text field-->

                            <textarea id="bioText" name="bioText" rows="10">
                            <?php  $cu = $data[0];
            print_r($cu['bio']);?>  
                            </textarea>

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