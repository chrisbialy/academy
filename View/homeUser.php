<div class="row">
    <div class="col-md-12">
        <div class="col-md-8 col-md-offset-2">
            <div class="col-md-6 text-center">
                <a href="indexUser.php?page=bookTraining" class="linkHomeUser">
                    <img src="Images/icon-book.png"></br>
                    Book a training session
                </a>
            </div>
            <div class="col-md-6 text-center">
                <a href="indexUser.php?page=myBooking" class="linkHomeUser">
                    <img src="Images/icon-my-booking.png"></br>
                    See my booking
                </a>
            </div>
            <?php
                if($user -> getHasPaid() == 0){
                    echo "<p class='text-danger text-center' style='font-weight: bold;font-size:25px;'>
                            You need to pay before book any training session
                        </p>";
                }
            ?>
        </div>
    </div>
</div></br>