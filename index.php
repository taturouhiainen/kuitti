
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Kuitti</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Barlow+Condensed:500,600,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">

    <style type="text/css">
      input[type="text"]
{
    font-size:65%;
}

    .persons {

      cursor: pointer;
       border-radius: 45px;

    }
    .persons:hover {

       transform: scale(1.2);

    }

    .persons:onclick {

        background-color: grey;

    }

    .active {

      color: #bf925b !important;
      background-color: #333333;

    }
    
    .colour {

      color: #bf925b;
    }
    /* The switch - the box around the slider */
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;


}



#submitbtn:hover {
transform: scale(1.2);
}

.item {

  margin-top: 20px;
  size: 50% !important;
}
 input[type='radio'] { 
     transform: scale(2); 
 }
    </style>



  </head>
  <body>
   
   
    
    
    
    <section class="services-section ftco-section">
      <div class="container">
        <div class="row justify-content-center pb-3">
          <div class="col-md-10 heading-section text-center ftco-animate">
            <span class="subheading">DUBS OY</span>
            <h2 class="mb-4">KUITTI</h2>
            <p>Fill in the empty fields with correct information and botterna sends a kuitti to the customer.</p>
            <span class="subheading">ADD PRODUCTS</span>
            <div class="row justify-content-center">
          <div class="col-md-10 ftco-animate">
            <form action="sent.php" class="appointment-form" method="post" id="kuittiform">
              <div class="appendhere">

              <div class="row">
                <div class="col-4">
                  <div class="form-group">
                    <input type="text" list="cars" placeholder="Tuotteen nimi" name="tuote[]" style="max-width: 100%">
                      <datalist id="cars">
                        <option>Tumma Shenzhen matto</option>
                        <option>Vaalea Shenzhen matto</option>
                        <option>Sohva</option>
                        <option>Kuljetus</option>
                      </datalist>
                  </div>
                </div>

                <div class="col-4">
                  <div class="form-group">
                    <input type="text" class="form-control" id="appointment_name" placeholder="Hinta (sis. alv)" name="hinta[]">
                  </div>
                </div>

                <div class="col-2">
                 <div class="form-group" style="max-width:100%;">
                  <input type="text" name="amount[]" style="max-width:100%;" placeholder="Kpl">
                 </div>
               </div>

                 <div class="col-2">
                 <div class="form-group">
                  <img src="https://icon-library.com/images/trash-can-icon/trash-can-icon-15.jpg" class="trash" style="width: 50px; height: 50px; cursor: pointer; margin: auto;visibility: hidden;">
                 </div>
               </div>

               
              </div>

             

             
              

              </div>
                 <div class="row" style="padding-bottom: 50px">
                  
                  <p id="addrow" style="width:20%; margin: auto;" class="btn btn-primary">Add a row</p>
                
                 </div>

                <div class="row" style="padding-bottom: 15px">
                  <span class="subheading" style="width: 30%;margin: auto; text-align: center;">CHOOSE PAYMENT METHOD</span>
                </div>

              <div class="row">

                <div class="col-sm-3" style="padding-bottom: 30px;">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" id="flexRadioDefault1" value="MOBILEPAY" name="maksutapa">
                    <label class="form-check-label" for="flexRadioDefault1" style="margin-left: 10px;">
                      Mobilepay
                    </label>
                  </div>
                </div>

                <div class="col-sm-3" style="padding-bottom: 30px;">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" id="flexRadioDefault1" value="KATEINEN" name="maksutapa">
                    <label class="form-check-label" for="flexRadioDefault1"style="margin-left: 10px;">
                      Käteinen
                    </label>
                  </div>

                </div>

                <div class="col-sm-3" style="padding-bottom: 30px;">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" id="flexRadioDefault1" value="KORTTI" name="maksutapa">
                    <label class="form-check-label" for="flexRadioDefault1"style="margin-left: 10px;">
                      Kortti
                    </label>
                  </div>
                </div>

                <div class="col-sm-3" style="padding-bottom: 30px;">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" id="flexRadioDefault1" value="TILISIIRTO" name="maksutapa">
                    <label class="form-check-label" for="flexRadioDefault1"style="margin-left: 10px;">
                      Tilisiirto
                    </label>
                  </div>
                </div>
               
              </div>


                <div class="row" style="padding-bottom: 15px">
                  <span class="subheading" style="width: 30%;margin: auto; text-align: center;">FILL IN REST OF THE OPTIONS</span>
                </div>

              <div class="row" style="padding-bottom: 30px;">
                <div class="col-md-12">
                  <div class="form-group">
                   <input type="text" list="sale" placeholder="Alennus % (Oletus 0%)" name="discount" style="max-width: 100%">
                      <datalist id="sale">
                        <option>10%</option>
                        <option>25%</option>
                        <option>30%</option>
                        <option>50%</option>
                      </datalist>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <textarea form="kuittiform" name="sposti" id="" cols="10" rows="1" class="form-control" placeholder="Asiakkaan s-posti"></textarea>
                  </div>
                </div>
              </div>

            <div class="row" style="padding-top: 30px;">
              
                <input type="submit" value="Laheta kuitti" class="btn btn-primary" style="width:20%; margin: auto;">
             
            </div>

            </form>
          </div>
        </div>
          </div>
        
      </div>
    </section>

   
   
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    

   <script type="text/javascript">
    
    $(function() {                       //run when the DOM is ready
      $(".persons").click(function() {  //use a class, since your ID gets mangled
        $(this).addClass("active");      //add the class to the clicked element
        $(this).css("color", "#bf925b !important");
        $(this).css("background-color", "#333333");

      });
    });

$('.trash').on('click', function(e){
              

    $(this).closest(".target").css("display", "none");
});

  var one = '<div class="row target"><div class="col-4"><div class="form-group"><input type="text" list="cars" placeholder="Tuotteen nimi" name="tuote[]" style="max-width: 100%"><datalist id="cars"><option>Tumma Shenzhen matto</option><option>Vaalea Shenzhen matto</option><option>Sohva</option><option>Kuljetus</option></datalist></div></div><div class="col-4"><div class="form-group"><input type="text" class="form-control" id="appointment_name" placeholder="Hinta (sis. alv)" name="hinta[]"></div></div><div class="col-2"><div class="form-group" style="max-width:100%;"><input type="text" name="amount[]" style="max-width:100%;" placeholder="Kpl"></div></div><div class="col-2"><div class="form-group"><img src="https://icon-library.com/images/trash-can-icon/trash-can-icon-15.jpg" class="trash" style="width: 50px; height: 50px; cursor: pointer;" onclick="$(this).closest(';

  var two = "'.target').css('display', 'none');";

  var three = '"></div></div></div>';

 var appendable = one.concat(two, three);
  
    $( "#addrow" ).click(function() {
      $( ".appendhere" ).append( appendable );
});




    


   </script>
  </body>
</html>