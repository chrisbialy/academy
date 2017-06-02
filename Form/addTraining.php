<?php
/**
 *  Created by Antoine 
 *  Modified by Antoine the 11/04/17 
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="col-md-6 col-md-offset-3">
            <h2 class="text-center">Training</h2></br></br>
            <form class="form-horizontal" method="post"  enctype="multipart/form-data">
			 	<div class="form-group">
			 	    <?php echo $message; ?>
			 	    <div class="col-sm-3">
				        <label class="control-label">Name </label><font color="red">*</font>
				    </div>
				    <div class="col-sm-7">
				        <select id="nameTraining" name="nameTraining"class="form-control">
                            <option value="--">Select Training Session</option>
                            <?php
                                $query = $bdd -> prepare('SELECT DISTINCT(name) FROM Training');
                                $query -> execute();
                                $arrayName = $query -> fetchAll();
                                foreach ($arrayName as $name) {
                                    echo '<option value="'.$name["name"].'" ';
                                    if(isset($_POST["nameTraining"]) && $_POST["nameTraining"] == $name["name"]) {echo "selected";};
                                    echo '>'.$name["name"].'</option>';
                                }
                            ?>
                        </select>
                        <?php echo "<p class='text-danger'>$errNameTraining</p>";?>
				    </div>
				</div>
				<div class="form-group">   
			        <div class="col-sm-3">
				       <label class="control-label">Date </label><font color="red">*</font>
			        </div>
			        <div class="col-sm-7">
    				    <input type="date" class="form-control" id="date" name="dateTraining" data-date-inline-picker="true" <?php if(isset($_POST["dateTraining"])) {echo 'value="'.$_POST["dateTraining"].'"';}; ?> /></br>
    				     <?php echo "<p class='text-danger'>$errDateTraining</p>";?>
    				</div>
				</div>
				<div class="form-group">   
			        <div class="col-sm-3">
				       <label class="control-label">Start </label><font color="red">*</font>
			        </div>
			        <div class="col-sm-7">
    				    <input type="time" id="timeTraining"class="form-control" name="timeTraining" <?php if(isset($_POST["timeTraining"])) {echo 'value="'.$_POST["timeTraining"].'"';}; ?> /></br>
    				    <?php echo "<p class='text-danger'>$errStartTraining</p>";?>
    				</div>
				</div>
				<div class="form-group">   
			        <div class="col-sm-3">
				       <label class="control-label">Duration </label><font color="red">*</font>
			        </div>
			        <div class="col-sm-7">
    				    <input type="number" id="duration" class="form-control" name="durationTraining" <?php if(isset($_POST["durationTraining"])) {echo 'value="'.$_POST["durationTraining"].'"';}; ?> /></br>
    				    <?php echo "<p class='text-danger'>$errDurationTraining</p>";?>
    				</div>
				</div>
				<div class="form-group">   
			        <div class="col-sm-3">
				       <label class="control-label">Type </label><font color="red">*</font>
			        </div>
			        <div class="col-sm-7">
    				    <select id="typeTraining" name="typeTraining" class="form-control">
                            <option value="--">Select a type</option>
                            <?php
                                $query = $bdd -> prepare('SELECT DISTINCT(type) FROM Training');
                                $query -> execute();
                                $arrayName = $query -> fetchAll();
                                foreach ($arrayName as $name) {
                                    echo '<option value="'.$name["type"].'" ';
        							if(isset($_POST["typeTraining"]) && $_POST["typeTraining"] == $name["type"]) {echo "selected";};
                                    echo '>'.$name["type"].'</option>';
                                }
                            ?>
                        </select>
                        <?php echo "<p class='text-danger'>$errTypeTraining</p>";?>
    				</div>
				</div>
				</br>
				<div class="row">
		    	<button id="submit" name="submit4" class="btn btn-success" type="submit">Submit</button>
		    	<a href="indexAdmin.php?page=seeTrainings" class="btn btn-danger">Cancel</a></br></div>
		    	<?php echo $result; ?> </br></br>
			</form>
        </div>
    </div>
</div>
<!-- Modal to show if the training has been created -->
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Training added</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6 col-md-offset-5">
              <img src="Images/iconTick.png">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <a href="indexAdmin.php?page=seeTrainings" role="button" class="btn btn-success" id="btnConfirm">Ok</a>
      </div>
    </div>
  </div>
</div>
<!-- Modal to show if the training has been updated -->
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Training updated</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6 col-md-offset-5">
              <img src="Images/iconTick.png">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <a href="indexAdmin.php?page=seeTrainings" role="button" class="btn btn-success" id="btnConfirm">Ok</a>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
    $('#home').removeClass('active');
    $('#user').removeClass('active');
    $('#settings').removeClass('active');
    $('#logout').removeClass('active');
    $('#trainings').addClass('active'); 
    var a = '<?php echo $verif;?>';
    if(a == '1'){
        $("#modalAdd").modal('show');
    }
    else if(a == '2'){
        $("#modalEdit").modal('show');
    }
</script>