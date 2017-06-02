<?php
/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="text-center">
            See Users
        </h1>
        <div class="col-md-2">
            <form method="post" action="indexAdmin.php?page=seeUsers">
                <h4>Filter by Email</h4>
                <input type="text" id="emailUser" name="emailUser"class="form-control" placeholder="email..."/>
                    
                <h4>Filter by Paid</h4>
                <select id="paid" name="paidUser"class="form-control">
                    <option value="--">Select payments</option>
                    <option value="1" <?php if(isset($_POST["paid"]) && $_POST["paid"] == "1") {echo "selected";}; ?>>Paid</option>
                    <option value="0" <?php if(isset($_POST["paid"]) && $_POST["paid"] == "0") {echo "selected";}; ?>>Not Paid</option>
                </select>
                <h4>Filter by Last Name</h4>
                <input type="text" id="name" name="nameUser"class="form-control" placeholder="Last name..."/>
                <div class="col-md-12">
                <button id="search" type="submit" name="search" class="btn btn-primary">Search</button>
                <a class="btn btn-warning" href="indexAdmin.php?page=seeUsers">Clear</a></div>
                <?php echo "<p class='text-danger' style='font-weight: bold;'>$err</p>";?>
            </form>
        </div>
        <div class="col-md-10">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th class="info">First Name</th>
                        <th class="info">Last Name</th>
						<th class="info">Email</th>
                        <th class="info">Password</th>
						<th class="info">Card Number</th>
                        <th class="info">Paid(1) - Unpaid(0)</th>
                        <th class="info">Phone Number</th>
						<th class="info">Option</th>
                    </tr>
                    <?php
                        foreach ($data2 as $name) {
                            $newUser= new User($name['id']);
                            echo '
                            <tr>
                                <td>'.$newUser -> getFirstName().'</td>
                                <td>'.$newUser -> getLastName().'</td>
                                <td>'.$newUser -> getEmail().'</td>
                                <td>'.$newUser -> getPassword().'</td>
                                <td>'.$newUser -> getCardNumber().'</td>
                                <td>'.$newUser -> getHasPaid().'</td>
                                <td>'.$newUser -> getPhone().'</td>
                                <td>
                                    <a href="#" id="'.$newUser ->getId().'" class="deluser btn btn-danger"> Delete </a>
							        <a href="indexAdmin.php?page=editUsers&id='.$newUser -> getId().'" class="btn btn-warning"> Edit </a>
                                </td>
                            </tr>';
                        }
                    ?>

                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal to show to ask to delete the users -->
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
              <p class="text-center" style="font-size:20px">Do you really want to delete this User?</p>
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
        <h4 class="modal-title">User Deleted</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6 col-md-offset-5">
              <img src="Images/iconTick.png">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <a href="indexAdmin.php?page=seeUsers" role="button" class="btn btn-success" id="btnConfirm">Ok</a>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
$(function() {
    $(".deluser").click(function(){
    
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
               url: "Functions/deleteUser.php",
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
    $(".edituser").click(function(){
    
        //Save the link in a variable called element
        var element = $(this);
        
        //Find the id of the link that was clicked
        var del_id = element.attr("id");
        console.log(del_id);
        var idUser = '<?php echo $admin -> getId();?>';
        console.log(idUser);
        //Built a url to send
        $('#modalAsk').modal('show');
        $(".editbuttonConfirm").click(function(){
        
             $.ajax({
               type: "POST",
               url: "Functions/edituser.php",
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

$('#home').removeClass('active');
$('#user').removeClass('active');
$('#settings').removeClass('active');
$('#logout').removeClass('active');
$('#user').addClass('active'); 
</script>