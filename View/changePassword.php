<?php
/**
 *  Created by Antoine 
 *  Modified by Antoine the 09/03/17 
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="col-md-6 col-md-offset-3">
            <h2 class="text-center">Change password</h2></br></br>
            <form class="form-horizontal" method="post"  enctype="multipart/form-data">
            	<?php echo $message; ?>
			 	<div class="form-group">
			 	    <div class="col-sm-4">
				        <label class="control-label">Old password </label><font color="red">*</font>
				    </div>
				    <div class="col-sm-8">
    				    <input type="password" name="oldPass" id="oldPass" class="form-control" placeholder="Old password">
    				    <?php echo "<p class='text-danger'>$errOldPass</p>";?>
				    </div>
				</div>
				<div class="form-group">   
			        <div class="col-sm-4">
				       <label class="control-label">New password</label><font color="red">*</font>
			        </div>
			        <div class="col-sm-8">
    				    <input type="password" name="newPass" id="newPass" class="form-control" placeholder="New password" >
    				    <?php echo "<p class='text-danger'>$errPass</p>";?>
    				</div>
				</div>
				<div class="form-group">   
			        <div class="col-sm-4">
				       <label class="control-label">Confirm password</label><font color="red">*</font>
			        </div>
			        <div class="col-sm-8">
    				    <input type="password" name="confirmPass" id="confirmPass" class="form-control" placeholder="Confirm password" >
    				    <?php echo "<p class='text-danger'>$errPass</p>";?>
    				</div>
				</div>
				</br>
				<div class="row">
					<div class="col-lg-7 col-md-offset-5">
						<a href="indexUser.php?page=settings"class="btn btn-danger" role="button" id ="btnCancel"> Cancel </a>
				    	<button id="submit" name="submitPass" class="btn btn-success" type="submit">Change password</button></br>
		    		</div>
		    	</div></br></br>
			</form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalConfirm" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Password saved</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6 col-md-offset-5">
						<img src="Images/iconTick.png">
					</div>
				</div>
				<p class="text-center"> Click on the button ok to go back to the home page.</p>	
			</div>
			<div class="modal-footer">
				<a href="indexUser.php" role="button" class="btn btn-success" id="btnConfirm">Ok</a>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$('#home').removeClass('active');
	$('#training').removeClass('active');
	$('#myBookings').removeClass('active');
	$('#logout').removeClass('active');
	$('#settings').addClass('active'); 
	var a = '<?php echo $verif;?>';
    if(a == '1'){
        $("#modalConfirm").modal('show');
    }
</script>