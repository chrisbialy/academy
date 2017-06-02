<?php
/**
 *  Created by Antoine 
 *  Modified by Antoine the 28/02/17 
 */
 ?>
 <div class="row">
    <div class="col-md-12">
        <h1 class="text-center"> Register </h1>
		<div class="col-md-12">
		    <div class="col-md-8 col-md-offset-3">
    			<form class="form-horizontal" method="post"  enctype="multipart/form-data">
    			 	<div class="form-group">
    			 	    <div class="col-sm-3">
    				        <label class="control-label">First Name </label><font color="red">*</font>
    				    </div>
    				    <div class="col-sm-7">
        				    <input type="text" name="firstName" id="firstName" class="form-control" placeholder="First Name" value="<?php echo htmlspecialchars($_POST['firstName']); ?>">
        				    <?php echo "<p class='text-danger'>$errFirstName</p>";?>
    				    </div>
    				</div>
    				<div class="form-group">   
				        <div class="col-sm-3">
    				       <label class="control-label">Last Name </label><font color="red">*</font>
				        </div>
				        <div class="col-sm-7">
        				    <input type="text" name="lastName" id="lastName" class="form-control" placeholder="Last Name" value="<?php echo htmlspecialchars($_POST['firstName']); ?>">
        				    <?php echo "<p class='text-danger'>$errLastName</p>";?>
        				</div>
    				</div>
    			    <div class="form-group">
    			        <div class="col-sm-3">
    				        <label class="control-label">Mail </label><font color="red">*</font>
    				    </div>
    				    <div class="col-sm-7">
    				        <input name="email2" id="mail" type="email" class="form-control" placeholder="email@ex.com" value="<?php echo htmlspecialchars($_POST['email2']); ?>">
    				        <?php echo "<p class='text-danger'>$errEmail</p>";?>
    				    </div>
    				</div>
    			    <div class="form-group">
    			        <div class="col-sm-3">
    				        <label class="control-label">Phone </label><font color="red">*</font>
    				    </div>
    				    <div class="col-sm-7">
    				        <input type="text" name="phone" id="phone" class="form-control" placeholder="0606060606" value="<?php echo htmlspecialchars($_POST['phone']); ?>">
    				        <?php echo "<p class='text-danger'>$errPhone</p>";?>
    				    </div>
    				</div>
    				<div class="form-group">
    				    <div class="col-sm-3">
                		    <label class="control-label">Password</label><font color="red">*</font>
            		    </div>
                		<div class="col-sm-7">  
            			    <input type="password" class="form-control" id="password" name="password" placeholder="*******">
            			    <?php echo "<p class='text-danger'>$errPassword</p>";?>
                	    </div>
                	</div>
                	<div class="form-group">
                		<div class="col-sm-3">
    				    	<label class="control-label">Confirm Password</label><font color="red">*</font>
    				    </div>
    				    <div class="col-sm-7">
    				    	<input type="password" name="confirm" id="confirm" class="form-control" >
    				    	<?php echo "<p class='text-danger'>$errConfirm</p>";?>
    				    </div>
    				</div>
    				</br>
    		    	<button id="submit" name="submit2" class="btn btn-success" type="submit">Register</button></br>
    		    	<?php echo $result; ?> 
    			</form></br>
    		</div>
		</div>
    </div>
</div>

<!-- Modal to show if the registration is good -->
<div class="modal fade" id="modalConfirm" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Successful Registration</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6 col-md-offset-5">
              <img src="Images/iconTick.png">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <a href="indexUser.php" role="button" class="btn btn-success" id="btnConfirm">Ok</a>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
    // code jquery to active or remove css class in the menu bar
    $('#home').removeClass('active');
    $('#gym').removeClass('active');
    $('#fitness').removeClass('active');
    $('#sac').removeClass('active');
    $('#sportsHall').removeClass('active');
    $('#beauty').removeClass('active');
    $('#climbingCenter').removeClass('active');
    $('#register').addClass('active');
    
    var a = '<?php echo $verif;?>';
    if(a == '1'){
        $("#modalConfirm").modal('show');
    }
</script>