<?php
/**
 *  Created by Antoine 
 *  Modified by Antoine the 09/03/17 
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="col-md-6 col-md-offset-3">
            <h2 class="text-center">Log in</h2></br></br>
            <form class="form-horizontal" method="post"  enctype="multipart/form-data">
			 	<div class="form-group">
			 	    <?php echo $message; ?>
			 	    <div class="col-sm-3">
				        <label class="control-label">Email </label><font color="red">*</font>
				    </div>
				    <div class="col-sm-7">
    				    <input type="text" name="email3" id="email3" class="form-control" placeholder="email@example.com">
				    </div>
				</div></br>
				<div class="form-group">   
			        <div class="col-sm-3">
				       <label class="control-label">Password </label><font color="red">*</font>
			        </div>
			        <div class="col-sm-7">
    				    <input type="password" name="password2" id="password2" class="form-control" placeholder="Password" >
    				</div>
				</div>
				</br>
		    	<button id="submit" name="submit3" class="btn btn-success" type="submit">Log in</button></br>
		    	<?php echo $result; ?> </br></br>
			</form>
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
    $('#register').removeClass('active');
    $('#login').addClass('active');
    
</script>