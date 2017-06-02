<?php
/**
 *  Created by Antoine 
 *  Modified by Antoine the 28/02/17 
 */
 ?>
 <div class="row">
    <div class="col-lg-12">
        <h1 class="text-center">
            Strength and Conditioning
        </h1>
        <div class="col-md-10 col-md-offset-1">
            <div class="row">
                <div class="col-md-12">
                    Our Strength and conditioning suite has 6 full Olympic standard power racks, 
                    complimented with Olympic bars for all users and 2 full sets of collaborated 
                    Elieko discs and 4 training sets, lateral pull down machine, leg press, glute-ham 
                    bench, plyometric boxes and dumbbell rack. The racks also have access to pull up 
                    bars at the front and between racks. The suite has been designed for easy access
                    for wheelchairs with dura-flex flooring laid to be flush with all platforms areas.
                </div>
            </div></br></br>
            <h3 class="text-center"> Our gallery</h3></br>
            <div class="row">
                <div class="col-md-12">
                    <div class="row2">
                        <div class="col-md-1"></div>
                        <div class="col-md-2">
                            <div class="column">
                                <img src="Images/snc01.jpg" style="width:130px" onclick="openModal();currentSlide(1)" class="hover-shadow cursor">
                            </div>
                        </div>
                        
                        <div class="col-md-2">
                            <div class="column">
                                <img src="Images/snc02.jpg" style="width:130px" onclick="openModal();currentSlide(2)" class="hover-shadow cursor">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="column">
                                <img src="Images/snc03.jpg" style="width:130px;height:73.6px" onclick="openModal();currentSlide(3)" class="hover-shadow cursor">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="column">
                                <img src="Images/snc04.jpg" style="width:130px" onclick="openModal();currentSlide(4)" class="hover-shadow cursor">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="column">
                                <img src="Images/snc05.jpg" style="height:73.6px" onclick="openModal();currentSlide(5)" class="hover-shadow cursor">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="myModal" class="modal2">
              <span class="close cursor" onclick="closeModal()">&times;</span>
              <div class="modal-content2">
            
                <div class="mySlides">
                  <div class="numbertext">1 / 5</div>
                  <img src="Images/snc01.jpg" style="width:100%">
                </div>
            
                <div class="mySlides">
                  <div class="numbertext">2 / 5</div>
                  <img src="Images/snc02.jpg" style="width:100%">
                </div>
            
                <div class="mySlides">
                  <div class="numbertext">3 / 5</div>
                  <img src="Images/snc03.jpg" style="width:100%">
                </div>
                
                <div class="mySlides">
                  <div class="numbertext">4 / 5</div>
                  <img src="Images/snc04.jpg" style="width:100%">
                </div>
                
                <div class="mySlides">
                  <div class="numbertext">5 / 5</div>
                  <img src="Images/snc05.jpg" style="width:100%">
                </div>
                
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            
                <div class="caption-container">
                  <p id="caption"></p>
                </div>
                
                    <div class="column">
                      <img class="demo cursor" src="Images/snc01.jpg" style="width:200px" onclick="currentSlide(1)" alt="Strength and Conditioning">
                    </div>
                <div class="col-md-2">
                    <div class="column">
                      <img class="demo cursor" src="Images/snc02.jpg" style="width:200px" onclick="currentSlide(2)" alt="Strength and Conditioning">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="column">
                      <img class="demo cursor" src="Images/snc03.jpg" style="width:200px" onclick="currentSlide(3)" alt="Strength and Conditioning">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="column">
                      <img class="demo cursor" src="Images/snc04.jpg" style="width:200px" onclick="currentSlide(4)" alt="Strength and Conditioning">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="column">
                      <img class="demo cursor" src="Images/snc05.jpg" style="width:200px" onclick="currentSlide(5)" alt="Strength and Conditioning">
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div></br>

<script type="text/javascript">
    // code jquery to active or remove css class in the menu bar
    $('#home').removeClass('active');
    $('#gym').removeClass('active');
    $('#fitness').removeClass('active');
    $('#sportsHall').removeClass('active');
    $('#climbingCenter').removeClass('active');
    $('#beauty').removeClass('active');
    $('#register').removeClass('active');
    $('#login').removeClass('active');
    $('#sac').addClass('active');
</script>