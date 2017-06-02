<?php
/**
 * Created by Chris
 * Modified by Chris the 16/03/17
 */
 ?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="text-center">
            My Bookings
        </h1>
        
         <div class="col-md-2">
             <h4> Booking</h4>
             <input type="radio" name="status" id="old" value="old" aria-label="..."> Old
             <input type="radio" name="status" id="upcoming" value="upcoming" aria-label="..."  checked="checked"> Upcoming
           
           <form method="post" action="indexUser.php?page=myBooking">
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
                <button id="submitUp" type="submit" name="search" class="btn btn-primary">Search</button>
                <button id="submitOld" type="submit" name="search" class="btn btn-primary hidden">Search</button>
                <a class="btn btn-warning" href="indexUser.php?page=myBooking">Clear</a></div>
                <?php echo "<p class='text-danger' style='font-weight: bold;'>$err</p>";?>
            </form>
        </div>
        
        
        <div class="col-md-10" id="upcomingDiv">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th class="info"> Name </th>
                        <th class="info">Date</th>
                        <th class="info"> Start time </th>
                        <th class="info"> Duration </th>
                        <th class="info">Type of training</th>
                        <th class="info">Option</th>
                    </tr>
                    <?php
                  // var_dump($array);
                   
                    foreach($arrayUpcoming as $idTraining){
                        if($idTraining != null){
                            $training = new Training($idTraining['id']);
                            echo '  <tr>
                            <th>'.$training -> getName().'</th>
                            <th>'.$training -> getDate().'</th>
                            <th>'.substr($training -> getStart(),0,-3).'</th>
                            <th>'.$training -> getDuration().'</th>
                            <th>'.$training -> getType().'</th>
                            <th><a href="#" id="'.$training -> getId().'"  class="delbutton btn btn-danger" title="Click To Delete">Delete</a></th>
                              
                        </tr>';
                        }
                        
                    }
                    
                    ?>
                </table>
            </div>
        </div>
        <div class="col-md-10 hidden" id="oldDiv">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th class="info"> Name </th>
                        <th class="info">Date</th>
                        <th class="info"> Start time </th>
                        <th class="info"> Duration </th>
                        <th class="info">Type of training</th>
                        <th class="info">Option</th>
                    </tr>
                    <?php
                  // var_dump($array);
                   
                    foreach($arrayOld as $idTraining){
                        if($idTraining != null){
                            $training = new Training($idTraining['id']);
                            echo '  <tr>
                            <th>'.$training -> getName().'</th>
                            <th>'.$training -> getDate().'</th>
                            <th>'.substr($training -> getStart(),0,-3).'</th>
                            <th>'.$training -> getDuration().'</th>
                            <th>'.$training -> getType().'</th>
                            <th><a href="#" id="'.$training -> getId().'"  class="delbutton btn btn-danger" title="Click To Delete">Delete</a></th>
                              
                        </tr>';
                        }
                        
                    }
                    
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal to show to ask to delete the booking -->
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
              <p class="text-center" style="font-size:20px">Do you really want to delete this booking?</p>
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
        <h4 class="modal-title">Booking Deleted</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6 col-md-offset-5">
              <img src="Images/iconTick.png">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <a href="indexUser.php?page=myBooking" role="button" class="btn btn-success" id="btnConfirm">Ok</a>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
$(function() {
    $(".delbutton").click(function(){
    
        //Save the link in a variable called element
        var element = $(this);
        
        //Find the id of the link that was clicked
        var del_id = element.attr("id");
        console.log(del_id);
        var idUser = '<?php echo $user -> getId();?>';
        console.log(idUser);
        //Built a url to send
        $('#modalAsk').modal('show');
        $(".delbuttonConfirm").click(function(){
        
             $.ajax({
               type: "POST",
               url: "Functions/deleteBooking.php",
               //data: info,
               data: {params:{'id': del_id,'idUser': idUser }},
               success: function(answer){
                console.log(answer);
                if(answer == 1){
                    $('#modalConfirm').modal('show');
                }
               }
             });
        })

    });

});

$('#old').on("click",function(){
    $('#upcomingDiv').addClass('hidden');
    $('#oldDiv').removeClass('hidden');
    $('#submitOld').removeClass('hidden');
    $('#submitUp').addClass('hidden');
}); 
$('#upcoming').on("click",function(){
    $('#upcomingDiv').removeClass('hidden');
    $('#submitOld').addClass('hidden');
    $('#oldDiv').addClass('hidden');
    $('#submitUp').removeClass('hidden');
});


$('#home').removeClass('active');
$('#training').removeClass('active');
$('#settings').removeClass('active');
$('#logout').removeClass('active');
$('#myBookings').addClass('active'); 
</script>