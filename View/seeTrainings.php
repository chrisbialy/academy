<div class="row">
    <div class="col-lg-12">
        <h1 class="text-center">
            Training Sessions
        </h1>
        <div class="col-md-2">
            <form method="post" action="indexAdmin.php?page=seeTrainings">
                <h4> Filter</h4>
                <label for="">Name</label>
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
                <label for="">Type</label>
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
                <label for="">Date</label>
                <input type="date" class="form-control" name="dateTraining"data-date-inline-picker="true" <?php if(isset($_POST["dateTraining"])) {echo 'value="'.$_POST["dateTraining"].'"';}; ?> /></br>
                <div class="col-md-12">
                <button id="search" type="submit" name="search" class="btn btn-primary">Search</button>
                <a class="btn btn-warning" href="indexAdmin.php?page=seeTrainings">Clear</a></div>
                <?php echo "<p class='text-danger' style='font-weight: bold;'>$err</p>";?>
            </form>
        </div>
        <div class="col-md-10">
            <a href="indexAdmin.php?page=addTraining" class="btn btn-primary">Add Training</a></br>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th class="info">Name</th>
                        <th class="info">Number of Remaining Places</th>
                        <th class="info">Date of Session</th>
						<th class="info">Start Time</th>
                        <th class="info">Duration</th>
                        <th class="info">Type of Training</th>
						<th class="info">Option</th>
                    </tr>
                    <?php
                    
					// var_dump($data2);
                    foreach($data2 as $idTraining){
                        $training = new Training($idTraining['id']);
                        
                        echo '  <tr>
                        <th>'.$training -> getName().'</th>
						<th>'.$training -> getNbPlace().'</th>
						<th>'.$training -> getDate().'</th>
						<th>'.substr($training -> getStart(),0,-3).'</th>
                        <th>'.$training -> getDuration().'</th>
                        <th>'.$training -> getType().'</th>
                        <th> <a href="indexAdmin.php?page=editTraining&id='.$training->getId().'" class="btn btn-primary"> Edit </a>
                            <a href="#" id="'.$training -> getId().'" class="delTraining btn btn-danger"> Delete </a>
                            <a href="#" id="'.$training -> getId().'" class="bookings btn btn-warning"> See bookings </a>
                            </th>
                        </tr>';
                    }
                    ?>

                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal to show to ask to delete the trainings -->
<div class="modal fade" id="modalAsk" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Delete</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
              <p class="text-center" style="font-size:20px">Do you really want to delete this Training?</p>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <a href="#" role="button" class="delbuttonConfirm btn btn-success" id="btnConfirm">Yes</a>
        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Cancel</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal to show if the deletion is good -->
<div class="modal fade" id="modalConfirm" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Training Deleted</h4>
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

<!-- Modal to show to ask to show the bookings -->
<div class="modal fade" id="modalShowBookings" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Bookings</h4>
      </div>
      <div class="modal-body bks">
        
      </div>
      <div class="modal-footer">
        <a href="printBooking.php" role="button" target="_blank" class="bookbuttonConfirm btn btn-success" id="btnPrint">Print</a>
        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Cancel</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
$(function() {
    $(".delTraining").click(function(){
    
        //Save the link in a variable called element
        var element = $(this);
        
        //Find the id of the link that was clicked
        var del_id = element.attr("id");
        console.log(del_id);
        var idUser = '<?php echo $admin -> getId();?>';
        console.log(idUser);
        //Built a url to send
        $('#modalAsk').modal('show');
        $(".delbuttonConfirm").click(function(){
        
             $.ajax({
               type: "POST",
               url: "Functions/deleteTraining.php",
               //data: info,
               data: {params:{'id': del_id,'idUser': idUser }},
               success: function(answer){
                console.log(answer);
                if(answer == 1){
                    $('#modalConfirm').modal('show');
                }
               }
             });
        });

    });

});

$(function() {
    $(".bookings").click(function(e){
       // e.preventDefault();
        //Save the link in a variable called element
        var element = $(this);
        
        //Find the id of the link that was clicked
        var train_id = element.attr("id");
        console.log(train_id);
        var idUser = '<?php echo $admin -> getId();?>';
        console.log(idUser);
        $.ajax({
           type: "POST",
           url: "Functions/getTrainingModal.php",
           data: { train_id : train_id},
           success: function(answer){
                //console.log(answer);
                $('.bks').html(answer);
                $('#modalShowBookings').modal('show');
                //$('#btnPrint').attr("href", "printBooking.php?training=<?php echo $_SESSION['idTraining']; ?>");
           }
        });
    });
});

$('#home').removeClass('active');
$('#user').removeClass('active');
$('#settings').removeClass('active');
$('#logout').removeClass('active');
$('#trainings').addClass('active'); 
</script>