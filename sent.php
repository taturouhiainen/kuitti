
<?php 



date_default_timezone_set('Europe/Helsinki');

$alert = '';
$dbalert = '';
if ($_POST['hinta'] == '') {
    $alert = ' the price';
}

if ($_POST['tuote'] == '') {
  
  if (strlen($alert) > 0) {
    $alert .= ', the product name';
  } else {
    $alert .= ' the product name';
  }

}


if (empty($_POST['amount'])) {
  
  if (strlen($alert) > 0) {
    $alert .= ', the product amount';

    
  } else {
    $alert .= ' the product amount';
    
  }

} 

if (!isset($_POST['maksutapa'])) {
  
  if (strlen($alert) > 0) {
    $alert .= ', the payment method';

  } else {
    $alert .= ' the payment method';

    
  }
  
}

if ($_POST['sposti'] == '') {
  
  if (strlen($alert) > 0) {
    $alert .= ', the email';
  } else {
    $alert .= ' the email';
  }
  
}


if( strlen($alert) == 0) {

     $hintaArray = $_POST['hinta'];
     $amountArray = $_POST['amount'];
     $dirtytuote = '';
     $kuittirow = [];
     $nro = 0;
     $maksutapa = $_POST['maksutapa'];
     $kuittinumero = uniqid();
     $today = date("m.d.y, H:i:s");

     
     

     $kokonaishinta = 0;

    
   

    foreach ($_POST['tuote'] as $key => $value) {
       
       if (!empty($value)) {

         $hinta = $hintaArray[$nro];
         $amount = $amountArray[$nro];

         $letsadd = $hinta * $amount;
       
         $kokonaishinta += $letsadd;

       if (strpos($hinta, ',') !== false) {

             str_replace(',', '.', $hinta);

        } else if (strpos($hinta, '.') !== false) {

         

        } else {

          $hinta .= '.00';
          
          
        }

       

       $kuittirow[] = '<tr bgcolor="#ffffff" style="color:#202020">
              <td bgcolor="#ffffff"></td>
              <td bgcolor="#ffffff" style="color:#202020;font-size:16px;line-height:24px;font-weight:600;text-align:left">'.$value.'</td>
              <td bgcolor="#ffffff" style="color:#202020;font-size:16px;line-height:24px;font-weight:600;text-align:left">'.$amount.'</td>
              <td bgcolor="#ffffff" style="color:#202020;font-size:16px;line-height:24px;font-weight:600;text-align:right">'.$hinta.'</td>
              <td bgcolor="#ffffff"></td>
            </tr>';

        if ($amount > 1) {
          
          $kuittirow[] = '<tr bgcolor="#ffffff" style="color:#202020">
              <td bgcolor="#ffffff"></td>
              <td bgcolor="#ffffff" style="color:#202020;font-size:16px;line-height:24px;font-weight:600;text-align:left"></td>
              <td bgcolor="#ffffff" style="color:#202020;font-size:16px;line-height:24px;font-weight:600;text-align:left"></td>
              <td bgcolor="#ffffff" style="color:#202020;font-size:16px;line-height:24px;font-weight:600;text-align:right">'.$hinta.'</td>
              <td bgcolor="#ffffff"></td>
            </tr>';

        }


       $nro++;

       }

      
    }

    if (strpos($kokonaishinta, ',') !== false) {

             str_replace(',', '.', $kokonaishinta);

        } else if (strpos($kokonaishinta, '.') !== false) {

         

        } else {

          $kokonaishinta .= '.00';
          
          
        }

    if (!empty($_POST['discount'])) {
        
        if (strpos($_POST['discount'], '%') == false) {

               $_POST['discount'] .= '%';

          }

        $discount = $_POST['discount'];
        $discountamount = round(($discount / 100) * $kokonaishinta, 2);

        if (strpos($discountamount, '.') == false) {
          
          $discountamount .= '.00';

        }

        $kokonaishinta -= $discountamount;
     }
   
     $netto = number_format($kokonaishinta / 1.24, 2);
      $alv = number_format($kokonaishinta - $netto, 2);


      $kokonais = number_format($kokonaishinta, 2);
  

  
   
   
    
   
    

   
     
    
     $sposti = $_POST['sposti'];


     

    

  $from = 'noreply@dubs.fi';

  $to = $_POST['sposti'];
  $subject = "Digitaalinen kuitti ostoksestasi";
  $headers = "From: " . $from . "\r\n";
$headers .= "Reply-To: ". $from . "\r\n";
$headers .= "CC: noreply@dubs.fi\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";




     $txt = '<table bgcolor="#ffffff" align="center" style="max-width:600px;background:#ffffff;font-size:18px;width:100%;color:#000;border-spacing:0;border-collapse:collapse" cellpadding="0" cellspacing="0" border="0">
      <tbody><tr>
        <td>
          <table align="center" bgcolor="#ffffff" style="background:#ffffff;max-width:600px;font-size:18px;width:600px;color:#ffffff;border-spacing:0;border-collapse:collapse" cellpadding="0" cellspacing="0" border="0">
            <tbody><tr height="25" bgcolor="#f5f5f5">
              <td colspan="5"></td>
            </tr>
            <tr height="25" bgcolor="#B9BBB6">
              <td colspan="5"></td>
            </tr>
            <tr height="25" bgcolor="#B9BBB6">
              <td colspan="5"></td>
            </tr>

            <tr>
              <td colspan="5" bgcolor="#B9BBB6">
                <table align="center" style="max-width:600px;font-size:12px;width:600px;color:#000;border-spacing:0;border-collapse:collapse" cellpadding="0" cellspacing="0" border="0">
                  <tbody><tr height="85">
                    <td width="257"></td>
                    <td width="85" bgcolor="#f5f5f5" align="center"><img src="http://dubs.fi/homepage/images/dubsicon.png" style="width:120px !important" alt="Dubs logo" width="130" height="85" style="display:block;width:85px;height:85px" data-image-whitelisted="" class="CToWUd"></td>
                    <td width="258"></td>
                  </tr>
                </tbody></table>
              </td>
            </tr>

            <tr height="25" bgcolor="#B9BBB6">
              <td colspan="5"></td>
            </tr>

            <tr height="25" bgcolor="#B9BBB6">
              <td></td>
              
              <td colspan="3" style="color:#ffffff;font-size:24px;line-height:28px;font-weight:600;text-align:center"></td>
              <td></td>
            </tr>

            <tr height="25" bgcolor="#B9BBB6">
              <td colspan="5"></td>
            </tr>

            <tr height="42" bgcolor="#ffffff">
              <td colspan="5"></td>
            </tr>

            <tr bgcolor="#ffffff" style="color:#202020">
              <td width="25" bgcolor="#ffffff"></td>
              <td width="275" bgcolor="#ffffff" style="color:#202020;font-size:12px;line-height:16px;font-weight:600;text-align:left">TUOTE
              </td>
              <td width="145" bgcolor="#ffffff" style="color:#202020;font-size:12px;line-height:16px;font-weight:600;text-align:left">LUKUMÄÄRÄ
              </td>
              <td width="130" bgcolor="#ffffff" style="color:#202020;font-size:12px;line-height:16px;font-weight:600;text-align:right">HINTA €
              </td>
              <td width="25" bgcolor="#ffffff"></td>
            </tr>

            <tr height="15" bgcolor="#ffffff">
              <td colspan="5"></td>
            </tr>

            <tr height="1" bgcolor="#ffffff">
              <td width="25" bgcolor="#ffffff"></td>
              <td colspan="3" bgcolor="#f5f5f5"></td>
              <td width="25" bgcolor="#ffffff"></td>
            </tr>

            <tr height="15" bgcolor="#ffffff">
              <td colspan="5"></td>
            </tr>';

            foreach ($kuittirow as $key => $value) {

              $txt .= $value;
            }

            if (isset($discount)) {
              
              $txt .= '<tr bgcolor="#ffffff" style="color:#202020">
              <td bgcolor="#ffffff"></td>
              <td bgcolor="#ffffff" style="color:#202020;font-size:16px;line-height:24px;font-weight:400;text-align:left;"></td>
              <td bgcolor="#ffffff" style="color:#202020;font-size:16px;line-height:24px;font-weight:400;text-align:left">Alennus  '.$discount.'</td>
              <td bgcolor="#ffffff" style="color:#202020;font-size:16px;line-height:24px;font-weight:400;text-align:right">-'.$discountamount.'</td>
              <td bgcolor="#ffffff"></td>
            </tr>';

            }


        $txt .= '    <tr bgcolor="#ffffff" style="color:#202020">
              <td bgcolor="#ffffff"></td>
              <td bgcolor="#ffffff" style="color:#606060;font-size:12px;line-height:24px;font-weight:400;text-align:left">
              </td>
              <td bgcolor="#ffffff" style="color:#606060;font-size:12px;line-height:24px;font-weight:400;text-align:left">
              </td>
              <td bgcolor="#ffffff" style="color:#606060;font-size:12px;line-height:24px;font-weight:400;text-align:right">sis. alv
              </td>
              <td bgcolor="#ffffff"></td>
            </tr>

            <tr height="20" bgcolor="#ffffff">
              <td colspan="5"></td>
            </tr>

            <tr height="1" bgcolor="#ffffff">
              <td width="25" bgcolor="#ffffff"></td>
              <td colspan="3" bgcolor="#f5f5f5"></td>
              <td width="25" bgcolor="#ffffff"></td>
            </tr>

            <tr height="15" bgcolor="#ffffff">
              <td colspan="5"></td>
            </tr>


            <tr bgcolor="#ffffff" style="color:#202020">
              <td bgcolor="#ffffff"></td>
              <td bgcolor="#ffffff" style="color:#202020;font-size:12px;line-height:24px;font-weight:600;text-align:left">ALV LUOKITUS
              </td>
              <td bgcolor="#ffffff" style="color:#202020;font-size:12px;line-height:24px;font-weight:600;text-align:left">
              </td>
              <td bgcolor="#ffffff" style="color:#202020;font-size:16px;line-height:24px;font-weight:400;text-align:right">MARGINAALI
              </td>
              <td bgcolor="#ffffff"></td>
            </tr>

            <tr bgcolor="#ffffff" style="color:#202020">
              <td bgcolor="#ffffff"></td>
              <td bgcolor="#ffffff" style="color:#202020;font-size:12px;line-height:24px;font-weight:600;text-align:left">ALV
              </td>
              <td bgcolor="#ffffff" style="color:#202020;font-size:12px;line-height:24px;font-weight:600;text-align:left">
              </td>
              <td bgcolor="#ffffff" style="color:#202020;font-size:16px;line-height:24px;font-weight:400;text-align:right">
              0.00
              </td>
              <td bgcolor="#ffffff"></td>
            </tr>

            <tr bgcolor="#ffffff" style="color:#202020">
              <td bgcolor="#ffffff"></td>
              <td bgcolor="#ffffff" style="color:#202020;font-size:12px;line-height:24px;font-weight:600;text-align:left">HINTA YHTEENSÄ
              </td>
              <td bgcolor="#ffffff" style="color:#202020;font-size:12px;line-height:24px;font-weight:600;text-align:left">
              </td>
              <td bgcolor="#ffffff" style="color:#202020;font-size:16px;line-height:24px;font-weight:600;text-align:right">'.$kokonais.'  €
              </td>
              <td bgcolor="#ffffff"></td>
            </tr>

             <tr bgcolor="#ffffff" style="color:#202020">
              <td bgcolor="#ffffff"></td>
              <td bgcolor="#ffffff" style="color:#202020;font-size:12px;line-height:24px;font-weight:600;text-align:left">MAKSUTAPA
              </td>
              <td bgcolor="#ffffff" style="color:#202020;font-size:12px;line-height:24px;font-weight:600;text-align:left">
              </td>
              <td bgcolor="#ffffff" style="color:#202020;font-size:16px;line-height:24px;font-weight:600;text-align:right">'.$maksutapa.'
              </td>
              <td bgcolor="#ffffff"></td>
            </tr>

            <tr height="40" bgcolor="#ffffff">
              <td colspan="5"></td>
            </tr>

            <tr height="20" bgcolor="#a0a0a0">
              <td colspan="5"></td>
            </tr>

            <tr>
              <td width="25" bgcolor="#a0a0a0"></td>
              <td colspan="3">
                <table align="center" style="max-width:550px;font-size:12px;width:100%;color:#000;border-spacing:0;border-collapse:collapse" cellpadding="0" cellspacing="0" border="0">
                  <tbody><tr>
                    <td width="57" bgcolor="#a0a0a0"></td>
                    <td width="78" bgcolor="#a0a0a0" style="color:#ffffff;font-size:12px;line-height:22px;font-weight:600;text-align:left">Laskuttaja</td>
                    <td width="140" bgcolor="#a0a0a0" style="color:#ffffff;font-size:12px;line-height:22px;font-weight:400;text-align:left">Dubs Oy
                    </td>
                    <td width="10" bgcolor="#a0a0a0"></td>
                    <td width="100" bgcolor="#a0a0a0" style="color:#ffffff;font-size:12px;line-height:22px;font-weight:600;text-align:left">Kuittinumero
                    </td>
                    <td width="165" bgcolor="#a0a0a0" style="color:#ffffff;font-size:12px;line-height:22px;font-weight:400;text-align:left">'.$kuittinumero.'</td>
                  </tr>
                  <tr>
                    <td width="57" bgcolor="#a0a0a0"></td>
                    <td width="78" bgcolor="#a0a0a0" style="color:#ffffff;font-size:12px;line-height:22px;font-weight:600;text-align:left">Y-tunnus</td>
                    <td width="140" bgcolor="#a0a0a0" style="color:#ffffff;font-size:12px;line-height:22px;font-weight:400;text-align:left">3211544-3
                    </td>
                    <td width="10" bgcolor="#a0a0a0"></td>
                    <td width="100" bgcolor="#a0a0a0" style="color:#ffffff;font-size:12px;line-height:22px;font-weight:600;text-align:left">Aikaleima
                    </td>
                    <td width="165" bgcolor="#a0a0a0" style="color:#ffffff;font-size:12px;line-height:22px;font-weight:400;text-align:left">'.$today.'</td>
                  </tr>
                </tbody></table>
              </td>
              <td width="25" bgcolor="#a0a0a0"></td>
            </tr>

            <tr height="25" bgcolor="#a0a0a0">
              <td colspan="5"></td>
            </tr>

            <tr height="30" bgcolor="#f5f5f5">
              <td colspan="5"></td>
            </tr>

            <tr bgcolor="#f5f5f5">
              <td colspan="5">
                <table align="center" style="max-width:550px;font-size:12px;width:100%;color:#000;border-spacing:0;border-collapse:collapse" cellpadding="0" cellspacing="0" border="0">
                  <tbody><tr>
                    <td width="275" bgcolor="#f5f5f5" style="color:#404040;font-size:12px;line-height:22px;font-weight:400;text-align:center; width: 100% !important">
                      <center>
                        <p><span style="font-weight:700">Dubs Oy</span><br>
                          +358 45 277 8520<br>
                          <a href="mailto:taskuparkki@aimopark.fi" style="padding:0;text-align:left;color:#B9BBB6;text-decoration:none" target="_blank">asiakaspalvelu@dubs.fi</a><br>
                          <a href="https://taskuparkki.fi/" style="padding:0;text-align:left;color:#B9BBB6;text-decoration:none" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://taskuparkki.fi/&amp;source=gmail&amp;ust=1635942893065000&amp;usg=AFQjCNEZBcQlToP39rPKJj5re-6KABGE8Q">www.dubs.fi</a>
                        </p>
                      </center>
                    </td>
                   
                  </tr>
                  <tr>
                    <td colspan="2" bgcolor="#f5f5f5">
                      <table align="center" style="max-width:550px;font-size:12px;width:550px;color:#000;border-spacing:0;border-collapse:collapse" cellpadding="0" cellspacing="0" border="0">
                        <tbody><tr height="25" bgcolor="#f5f5f5">
                          <td colspan="3"></td>
                        </tr>
                        <tr height="38">
                          <td width="227"></td>
                          <td width="96" bgcolor="#f5f5f5" align="center"></td>
                          <td width="227"></td>
                        </tr>
                      </tbody></table>
                    </td>
                  </tr>
                </tbody></table>
              </td>
            </tr>

          </tbody></table>
        </td>
      </tr>

    </tbody></table>';



  mail($to, $subject, $txt, $headers);



}
    

    
              $conn= mysqli_connect("mysql09.domainhotelli.fi", "gjeulrkl_manager", "Taturou11!", "gjeulrkl_kuitti");

              // Check connection
              if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
              }


              
             

              $query = "INSERT INTO kuitti (kuittinumero, aikaleima, kokonaishinta, alv, netto, tuote, sposti, maksutapa) VALUES ('$kuittinumero', '$today', '$hinta', '$alv', '$netto', '$tuote', '$sposti', '$maksutapa')"; 
              
              if($result = mysqli_query($conn, $query)) {




              } else {


                $dbalert = "There was an error connecting to the database. Contact the botterna maintenance team immediately";
              }
  
?>



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
            <h2 class="mb-4">KUITTI SENT <?php 

            if ($alert == "" AND $dbalert == '') {
                 
                 echo "<span style='color:green'>SUCCESFULLY</span>";
            } else {

               echo "<span style='color:red'>UNSUCCESFULLY</span>";
            }


       ?></h2>
            <?php 

            if ($alert !== "") {
                
                 echo '<p>The following are missing or incorrect:<span style="color:red;">'.$alert.'</span><p>';
            } else if ($dbalert !== "") {

                echo $dbalert;

            }
       ?>
       <form action="https://dubs.fi/kuitti/">
            <div class="form-group">
               <?php 
              if ($alert !== '' OR $dbalert !== '') {
                echo ' <input type="submit" value="Try again" class="btn btn-primary">';
              } else {

                echo ' <input type="submit" value="SEND ANOTHER ONE" class="btn btn-primary">';

              }



               ?>
              </div>
            </form>
            <?php 

            if ($alert == '' AND $dbalert == '') {
              echo '<span class="subheading">THE KUITTI</span>';
            }

          ?>

            <div class="row justify-content-center">
          <div class="col-md-10 ftco-animate">
           
               <?php 
               if ($alert == '' AND $dbalert == '') {
                    
                echo $txt;

               } 
               

               ?>
              

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


   </script>
  </body>
</html>