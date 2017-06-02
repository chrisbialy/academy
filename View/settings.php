<?php
/**
 *  Created by Antoine 
 *  Modified by Antoine the 14/03/17 
 */
?>
<div class="row">
	<div class="col-lg-12">
		<h2 class="text-center"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Settings</h2></br>
		<div class="col-lg-8 col-md-offset-2">
			<form class="form-horizontal" method="post"  enctype="multipart/form-data">
    			<div class="form-group">
				    <label for="inputEmail" class="col-sm-5 control-label">ID membership <a href="#" data-toggle="tooltip" data-placement="top" title="You can not change your membership number.">i</a></label>
				    <div class="col-sm-4">
				      <input type="text" class="form-control" id="inputMem" disabled value=<?php echo $membership; ?>>
				      <?php echo "<p class='text-danger' style='font-weight: bold;'>$messageNoPayment</p>";?>
				    </div>
				</div>
				<div class="form-group">
				    <label for="inputFirstName" class="col-sm-5 control-label">First name <font color="red">*</font></label>
				    <div class="col-sm-4">
				      <input type="text" class="form-control" name="firstNameSettings" id="inputFirstName" value=<?php echo $firstName; ?>>
				      <?php echo "<p class='text-danger'>$errFirstName</p>";?>
				    </div>
				</div>
				<div class="form-group">
				    <label for="inputLastName" class="col-sm-5 control-label">Last name <font color="red">*</font></label>
				    <div class="col-sm-4">
				      <input type="text" class="form-control" name="lastNameSettings" id="inputLastName" value=<?php echo $lastName; ?>>
				      <?php echo "<p class='text-danger'>$errLastName</p>";?>
				    </div>
				</div>
				<div class="form-group">
				    <label for="inputAge" class="col-sm-5 control-label">Phone </label>
				    <div class="col-sm-4">
				      <input type="text" class="form-control" name="phoneSettings" id="inputPhone" value=<?php echo $phone;?>>
				      <?php echo "<p class='text-danger'>$errPhone</p>";?>
				    </div>
				</div>
				<div class="form-group">
				    <label for="inputEmail" class="col-sm-5 control-label">Email</label>
				    <div class="col-sm-4">
				      <input type="email" class="form-control" name="emailSettings" id="inputEmail" value=<?php echo $email; ?>>
				      <?php echo "<p class='text-danger'>$errEmail</p>";?>
				    </div>
				</div>
				<div class="row">
					<div class="col-lg-3 col-md-offset-4">
						<a href="indexUser.php?page=changePassword" id="btnChangePass"> Change your Password</a>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6 col-md-offset-6">
						<a href="indexUser.php"class="btn btn-danger" role="button" id ="btnCancel"> Cancel </a>
						<button type="submit" class="btn btn-success" name="btnSave">Save changes</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div></br>
<div class="modal fade" id="modalConfirm" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Saved</h4>
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
	$(function () {
	  $('[data-toggle="tooltip"]').tooltip();
	  $('#tt1').tooltip('show');
	});
	var a = '<?php echo $verif;?>';
    if(a == '1'){
        $("#modalConfirm").modal('show');
    }
</script>