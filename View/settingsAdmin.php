<?php
/**
 *  Created by Chris 
 *  Modified by Chris the 14/03/17 
 */
?>
<div class="row">
	<div class="col-lg-12">
		<h2 class="text-center"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Settings</h2></br>
		<div class="col-lg-8 col-md-offset-2">
			<form class="form-horizontal" method="post"  enctype="multipart/form-data">
				<div class="form-group">
				    <label for="inputEmail" class="col-sm-5 control-label">Email</label>
				    <div class="col-sm-4">
				      <input type="email" class="form-control" name="emailSettingsAdmin" id="inputEmail" value=<?php echo $email; ?>>
				      <?php echo "<p class='text-danger'>$errEmail</p>";?>
				    </div>
				</div>
				<div class="row">
					<div class="col-lg-3 col-md-offset-4">
						<a href="indexAdmin.php?page=changePasswordAdmin" id="btnChangePass"> Change your Password</a>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6 col-md-offset-6">
						<a href="indexAdmin.php"class="btn btn-danger" role="button" id ="btnCancel"> Cancel </a>
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
				<a href="indexAdmin.php" role="button" class="btn btn-success" id="btnConfirm">Ok</a>
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