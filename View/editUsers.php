<div class="row">
	<div class="col-lg-12">
		<h2 class="text-center"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Edit Users </h2></br>
		<div class="col-lg-8 col-md-offset-2">
			<form class="form-horizontal" method="post"  enctype="multipart/form-data">
    			<div class="form-group">
				    <label for="inputFirstName" class="col-sm-5 control-label">First name <font color="red">*</font></label>
				    <div class="col-sm-4">
				      <input type="text" class="form-control" name="firstNameAdmin" id="inputFirstName" value=<?php echo $firstName; ?>>
				      <?php echo "<p class='text-danger'>$errFirstName</p>";?>
				    </div>
				</div>
				<div class="form-group">
				    <label for="inputLasttName" class="col-sm-5 control-label">Last name <font color="red">*</font></label>
				    <div class="col-sm-4">
				      <input type="text" class="form-control" name="lastNameAdmin" id="inputLastName" value=<?php echo $lastName; ?>>
				      <?php echo "<p class='text-danger'>$errLastName</p>";?>
				    </div>
				</div>
				<div class="form-group">
				    <label for="inputEmail" class="col-sm-5 control-label">Email</label>
				    <div class="col-sm-4">
				      <input type="email" class="form-control" name="emailAdmin" id="inputEmail" value=<?php echo $email; ?>>
				      <?php echo "<p class='text-danger'>$errEmail</p>";?>
				    </div>
				</div>
				<div class="form-group">
				    <label for="cardNumber" class="col-sm-5 control-label">Card Number</label>
				    <div class="col-sm-4">
				      <input type="cardNumber" class="form-control" name="cardNumberAdmin" id="cardNumber" value=<?php echo $cardNumber; ?>>
				      <?php echo "<p class='text-danger'>$errcardNumber</p>";?>
				    </div>
				</div>
				<div class="form-group">
				    <label for="hasPaid" class="col-sm-5 control-label">Unpaid/Paid</label>
				    <div class="col-sm-4">
				      <input type="hasPaid" class="form-control" name="hasPaidAdmin" id="hasPaid" value=<?php echo $hasPaid; ?>>
				      <?php echo "<p class='text-danger'>$errHasPaid</p>";?>
				    </div>
				</div>
				<div class="form-group">
				    <label for="inputPhone" class="col-sm-5 control-label">Phone Number</label>
				    <div class="col-sm-4">
				      <input type="text" class="form-control" name="phoneAdmin" id="inputPhone" value=<?php echo $phone;?>>
				      <?php echo "<p class='text-danger'>$errPhone</p>";?>
				    </div>
				</div>
				<div class="row">
					<div class="col-lg-6 col-md-offset-6">
						<a href="indexAdmin.php?page=seeUsers"class="btn btn-danger" role="button" id ="btnCancel"> Cancel </a>
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
				<a href="indexAdmin.php?page=seeUsers" role="button" class="btn btn-success" id="btnConfirm">Ok</a>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$('#home').removeClass('active');
	$('#user').addClass('active');
	$('#settings').removeClass('active');
	$('#logout').removeClass('active');
	$('#trainings').removeClass('active'); 
	$(function () {
	  $('[data-toggle="tooltip"]').tooltip();
	  $('#tt1').tooltip('show');
	});
	var a = '<?php echo $verif;?>';
    if(a == '1'){
        $("#modalConfirm").modal('show');
    }
</script>