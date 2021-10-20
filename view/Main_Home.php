<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moderator_Home</title>
   <!-- <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/moderator.css">-->
    <link rel="stylesheet" href="../css/popup.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/error.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<style>
  body {
  overflow-x:hidden;/* Hide scrollbars */
  }

  .inp1{
      width:12rem;
      margin-left:1.2rem;
      padding-left:5px;
  }

  .popup_login .popup_login_content {
    height:360px;
    width:300px;
  }

  .popup_signup .popup_signup_content{
    width:350px;
    height:390px;
  }

  .popup_signup2 .popup_signup_content2{
    width:350px;
    height:440px;
  }

  .txt{
    font-size:x-small;
      letter-spacing:1px;
  }

  .txt1{
    margin-left:1.25rem;
    color:#FF4444;
    cursor: pointer;
    font-weight:10;
  }

  .update_btn{
      border: none;
      width:5rem;
      margin-top:0.5rem;
      transition: 0.25s ease;
      box-shadow: none;
  }

  .update_btn:hover{
    box-shadow: 1px 1px 5px 1px rgba(0, 0, 0, 0.25);
    transform:scale(1.12);
  
  }

  .txt2{
    margin-left:1.25rem;
    font-weight:10;
    font-size:xx-small;
  }

  .txt3{
    font-weight:10;
    font-size:xx-small;
    color:blue;
    cursor: pointer;
  }

  .inpu2{
    width:6.8rem;
    margin-left:1.2rem;
  }

  .otp_btn{
    width:4rem;
    height:2rem;
    padding:0.1rem;
    font-size:13px;
    margin-left:1rem;
  }

  .otp_btn2{
    width:6rem;
    height:2rem;
    padding:0.1rem;
    font-size:13px;
    margin-left:4.5rem;
    margin-top:1rem;
  }

  .caption{
    text-align:center;
    font-size: 10.5px;
    margin-top:-0.5rem;
    color:#333; 
  }

  .finp{
    width:6.5rem;
  }

  .linp{
    width:7rem;
  }

  .einp{
    margin-top:0.6rem;
    width:15.5rem;
  }

  .next{
    float:right;
    margin-right:1.5rem;
    width:3rem;
    font-size:small;
    padding:0.5rem;
    font-weight:normal;
  }

  .prev{
      float: left;
      margin-left:1rem;
      width:3rem;
      font-size:small;
      font-weight:normal;
      padding:0.5rem;
  }

  .submit{
    float:right;
    margin-right:1.5rem;
  }

  .select_your_job{
    width: 16rem;
    padding: 0.4rem;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.ent{
  padding:2rem;
}

.pass{
  margin-top:0.8rem;
  margin-bottom:0.4rem;
}

.send{
  text-align:center;
  font-size:small;
  width:5rem;
}

#privacy{
  margin-left:1.3rem;
  font-size:5px;
}
.privacy_info{
  font-size:11px;
}

.sel{
  margin-bottom:10px;
}

.inp3{
  width:15.5rem;
}

.sel2{
  width:7.3rem;
}



</style>

<body>

  <a name="start"></a>

  <div class="heder">
      
        <div class="left">
            <img src="../images/Name.svg" alt="" srcset="">
        </div>

        

        <div class="right">

                <ul>
                    <li> <a href="#start">Home</a> </li>
                    <li> <a href="#aboutus">About Us</a></li>
                    <li><a href="#contactus">Contact Us</a></li>
                </ul>
            
        </div>

  </div>
  
 
<!-- Moderator Page Content -->
<div class="content">

        <div class="content_left">
          <h1>NEWSLIA</h1>
              
              <div class="content_left_info">

                NEWSLIA, is the best news reporting system <br> which provides
                news and special <br> announcements that are related to <br> the user's area.
              </div>

              <div class="button_set">
                  <div class="button_login" onclick="togglePopup_login()">Login</div>
                  <div class="button_login" onclick="togglePopup_sign_up()">Sign Up</div>
              </div>

        </div>

        <div class="content_right">
            <img src="../images/background.svg" alt="" srcset="">
        </div>

  </div>









<div class="about_us">
<a name="aboutus"></a>
    <div class="para-box">
        <div class="head-para-type">
           <h1>About Us ...</h1>
        </div>
        

        <div>
            <p class="body-para">There is a great demand for people to know accurate and trustworthy news about their specific areas.The majority of that news is similar to gossip, which has a huge problem with accuracy as well as reliability.
              <br>
            Furthermore, there is no efficient way for them to receive information pertaining to their grama niladhari or Divisional Secretariat regions, such as vaccination programs, payments, and so forth.
            Furthermore, when people do not receive accurate news on time, they suffer a slew of problems.
            Some of the issues include wasting time and missing chances since they do not receive news/announcements at the appropriate moment.
            <br>

            Even though individuals are alerted, they might quickly forget about important occasions and activities since they do not receive any reminders.
            <br>

            So, with our system, users can able to get such information on time, as well as many other features such   as reminding about special events, reading / creating articles, and obtaining vital contact numbers. 
            </p>
        </div>
       
    </div>
    

</div>







<div class="about_us">
<a name="contactus"></a>
    <div class="para-box">
        <div class="head-para-type2">
           <h1>Contact Us ...</h1>
        </div>
        


        <div class="contact">
            
          
              
              <?php
                include '../Model/connect.php';
              ?>

              <select name="" id="Province" class="select_your_job inp1 sel sel2">
              <option value="" class="ent" disabled selected hidden>Province</option>

              <?php
                $query = "SELECT * FROM dsa GROUP BY Province";
                $query_statement = $conn->query($query);
                $query_results = $query_statement->fetchAll(PDO::FETCH_ASSOC);
                               
                if($query_results){
                    foreach($query_results as $query_result){
                        echo "<option value=".$query_result['Province'].">".$query_result['Province']."</option>";
                      }
                }
                else{
                    echo '<option value="">Provinces not available</option>';
                 }
              ?>
                          
              </select>
              
              
              <select name="" id="District" class="select_your_job inp1 sel sel2">
                  <option value="" class="ent">District</option>
              </select>
                        
              <select name="" id="DSA" class="select_your_job inp1 sel">
                  <option value="" class="ent">Divisional Secretariat Area </option>
              </select>  
                
          </ul>



           
      
        </div>

        
        <div class="contact_info">
          <div class="repoter">
              <h3>Repoter</h3>
              <p>Kasun Chamara </p> <span class="tele_contact">0711737382</span>
              <span class="email_contact">kasunchamara120@gmail.com</span>

              <p>Nipun Chamira </p> <span class="tele_contact">0771747382</span>
              <span class="email_contact">nipunsanjula125@gmail.com</span>

          </div>
          <div class="moderator">
              <h3>Moderator</h3>
              <p>Nipun Madhusanka </p> <span class="tele_contact">0784383142</span>
              <span class="email_contact">nipunmadhusanka1250@gmail.com</span>

              <p>Hansika Madhuwanthi </p> <span class="tele_contact">0781532145</span>
              <span class="email_contact">hansikamadhuwanthi5854@gmail.com</span>


          </div>
          <div class="admin">
             <h3>Administrator</h3>
             <p>Kumudu Madhuranga </p> <span class="tele_contact">0759045358</span>
             <span class="email_contact">kumudu14@gmail.com</span>

             <p>Susara Madhusanka </p> <span class="tele_contact">0708045745</span>
             <span class="email_contact">susaramadhusanka@gmail.com</span>
            
          </div>
        </div>


       
    </div>
    

</div>





















<!--Popup windows -->

<div class="errorbox" id="error1">
  <div class="content_erro">
       <div class="error_head">NEWSLIA says</div>
       <div class="error_body">Incorrect email address or password.</div>
       <div class="error_foot" onclick="remove_error_login()">OK</div>

  </div>
</div>

<div class="popup popup_login" id="popup-7">

<div class="overlay"></div>

<div class="content popup_login_content">
    <div class="close-btn" onclick="togglePopup_login()">&times;</div>


    <div class="content_body popup_login_body">
        <div class="popup_logo">
             <img src="../images/Name.svg" alt="" srcset="">
        </div>
        <hr>

        <div class="popup_form">
            <h3 class="popup_title">Login</h3>
            <form action="./Main_Home.php" method="post" name="login_form">

 
               <input type="text" name="sysactoremail" placeholder="Email" id="username" class="inp inp1">
               <br>
               <br>
               <input type="password" name="sysactorpassword" id="password" class="inp inp1" placeholder="Password">
               <br>
               <span id="remember_me" class="txt txt1" onclick="togglePopup_forget()">Forgot Password?</span>

               <button type="submit" name ="login" class="update_btn" value="LOGIN">Login</button>

               <br>
               <br>
               <span id="remember_me" class="txt txt2">New to NEWSLIA?</span>
               <span id="remember_me" class="txt txt3" onclick="togglePopup_sign_up()">Create an Account</span>
        
             </form>
         </div>

    </div>
</div>

</div>



<div class="popup popup_forget" id="popup-8">

<div class="overlay"></div>

<div class="content popup_forget_content">
    <div class="close-btn" onclick="togglePopup_forget()">&times;</div>


    <div class="content_body popup_forget_body">
        <div class="popup_logo">
             <img src="../images/Name.svg" alt="" srcset="">
        </div>
        <hr>

        <div class="popup_form">
            <h3 class="popup_title">Forgot Password</h3>
            <div>

 
               <input type="text" name="sysactorusername" placeholder="NIC No" id="forget_NIC" class="inp inp1">
               <br>
              
               <input type="text" name="sysactorotp" id="otp" class="inp inp1 inpu2" placeholder="OTP Code">
               <button class="update_btn otp_btn" onclick="togglePopup_forget_email()">Send</button>
               
               <button type="" name ="" class="update_btn otp_btn2" value="" onclick="togglePopup_reset_password()">Verify</button>

               <br>
               <br>
</div>
         </div>

    </div>
</div>

</div>






<div class="popup popup_forget" id="popup-9">

<div class="overlay"></div>

<div class="content popup_forget_content">
    <div class="close-btn" onclick="togglePopup_reset_save()">&times;</div>


    <div class="content_body popup_forget_body">
        <div class="popup_logo">
             <img src="../images/Name.svg" alt="" srcset="">
        </div>
        <hr>

        <div class="popup_form">
            <h3 class="popup_title">Forgot Password</h3>
            <div name="login_form">

 
               <input type="password" name="sysactor_new_psd_confirm" id="New-Forget-Password" class="inp inp1" placeholder="New Password">
               <br>
               <br>
               <input type="password" name="sysactor_new_psd_confirm" id="Re-New-Forget-Password" class="inp inp1" placeholder="Retype New Password">
               <br>
              
              <button class="update_btn otp_btn2" onclick="togglePopup_reset_save()">Save</button>

               <br>
               <br> 
        </div>
         </div>

    </div>
</div>

</div>



<form action="" method = "POST">

          <div class="popup popup_signup" id="popup-10">

          <div class="overlay"></div>

          <div class="content popup_signup_content">
              <div class="close-btn" onclick="togglePopup_sign_up()">&times;</div>


              <div class="content_body popup_signup_body">
                  <div class="popup_logo">
                      <img src="../images/Name.svg" alt="" srcset="">
                  </div>
                  <hr>

                  <div class="popup_form">
                      <h3 class="popup_title">Sign Up</h3>
                      <p class="caption">Create your account.It's free and only takes a minute</p>
                      <div name="login_form">

                        <input type="text" name="sysactor_first_name" id="new_fname" class="inp inp1 finp" placeholder="First Name" required>
                        
                        <input type="text" name="sysactor_last_name" id="new_lname" class="inp inp1 linp" placeholder="Second Name" required>
                          
                        <input type="email" name="sysactor_email" id="new_email" class="inp inp1 einp" placeholder="Email Address" required>

                        <input type="text" name="sysactor_mobile" id="new_mobile" class="inp inp1 einp" placeholder="Mobile Number" required>

                        <input type="text" name="sysactor_nic" id="new_nic" class="inp inp1 einp" placeholder="NIC Number" required>
                        
                        <div class="update_btn next" onclick="togglePopup_sign_up_2()">Next</div>

                        <br>
                        <br> 
                  </div>
                  </div>

              </div>
          </div>

          </div>







          <div class="popup popup_signup2" id="popup-11">

          <div class="overlay"></div>

          <div class="content popup_signup_content2">
              <div class="close-btn" onclick="togglePopup_sign_up_2()">&times;</div>


              <div class="content_body popup_signup_body">
                  <div class="popup_logo">
                      <img src="../images/Name.svg" alt="" srcset="">
                  </div>
                  <hr>

                  <div class="popup_form">
                      <h3 class="popup_title">Sign Up</h3>
                      
                      <div name="login_form">

          
                        <select name="" id="" class="select_your_job inp1 sel" required>
                          <option value="0" disabled selected hidden class="ent">Your Job</option>
                          <option value="normal_user" class="ent">Normal User</option>
                          <option value="reporter" class="ent">Reporter</option>
                          <option value="moderator" class="ent">Moderator</option>
                          <option value="admin" class="ent">Administrator</option>
                        </select>

                        
                        <br>
                        <select name="" id="new_Province" class="select_your_job inp1 sel sel2" required>
                          <option value="" class="ent" disabled selected hidden>Province</option>

                          <?php
                               $query = "SELECT * FROM dsa GROUP BY Province";
                               $query_statement = $conn->query($query);
                               $query_results = $query_statement->fetchAll(PDO::FETCH_ASSOC);
                               
                               if($query_results){
                                 foreach($query_results as $query_result){
                                  echo "<option value=".$query_result['Province'].">".$query_result['Province']."</option>";
                                 }
                               }
                               else{
                                echo '<option value="">Provinces not available</option>';
                               }
                          ?>
                          
                        </select>

                        <select name="" id="new_District" class="select_your_job inp1 sel sel2" required>
                          <option value="" class="ent">District</option>
                        </select>
                        
                        
                        <br>

                        <select name="" id="new_DSA" class="select_your_job inp1 sel" required>
                          <option value="" class="ent">Divisional Secretariat Area </option>
                        </select>  


                        <input type="text" name="sysactor_username" id="lname" class="inp inp1 inp3" placeholder="Username" required>

                        <br>
                        <input type="password" name="sysactor_pwd" id="new_pwd" class="inp inp1 finp pass" placeholder="Password" required>
                        <input type="password" name="sysactor_rpwd" id="re_new_pwd" class="inp inp1 linp pass" placeholder="Retype Password" required>
                        <br>
                        
                        <input type="checkbox" id="privacy" name="privacy" value="">
                        <label for="privacy" class="privacy_info"> I accept the Terms of Use & Privacy Policy.</label>
                        <br>
                        
                        <div class="update_btn prev" onclick="togglePopup_sign_up_3()">Prev</div> 
                        <button class="update_btn submit send" onclick="">Submit</button>

                        <br>
                        <br> 
                  </div>
                  </div>

              </div>
          </div>

          </div>


</form>


<script type="text/javascript">

      $(document).ready(function(){
        $("#Province").on("change",function(){
          var Province = $(this).val();
          $.ajax({
            url :"../Control/action.php",
            type:"POST",
            cache:false,
            data:{Province:Province},
            success:function(data){
            $("#District").html(data);
            $('#DSA').html('<option value="">Divisional Secretariat Area</option>');
          }
          });
        });


      $("#District").on("change",function(){
        var District = $(this).val();
        $.ajax({
            url :"../Control/action.php",
            type:"POST",
            cache:false,
            data:{District:District},
            success:function(data){
            $("#DSA").html(data);
          }
        });
      }); 
    });




    $(document).ready(function(){
        $("#new_Province").on("change",function(){
          var Province = $(this).val();
          $.ajax({
            url :"../Control/action.php",
            type:"POST",
            cache:false,
            data:{Province:Province},
            success:function(data){
            $("#new_District").html(data);
            $('#new_DSA').html('<option value="">Divisional Secretariat Area</option>');
          }
          });
        });


      $("#new_District").on("change",function(){
        var District = $(this).val();
        $.ajax({
            url :"../Control/action.php",
            type:"POST",
            cache:false,
            data:{District:District},
            success:function(data){
            $("#new_DSA").html(data);
          }
        });
      }); 
    });


    

</script>



<script>
    function togglePopup_login(){
      document.getElementById("popup-7").classList.toggle("active");
    }

    function togglePopup_forget(){
      document.getElementById("popup-7").classList.toggle("active");
      document.getElementById("popup-8").classList.toggle("active");
    }
    function togglePopup_forget_email(){
      document.getElementById("popup-8").classList.add("active");
    }
   
    function togglePopup_reset_password(){
      document.getElementById("popup-8").classList.toggle("active");
      document.getElementById("popup-9").classList.toggle("active");
    }

    function togglePopup_reset_save(){
      document.getElementById("popup-9").classList.toggle("active");
      document.getElementById("popup-7").classList.toggle("active");
    }
  
  
    function togglePopup_sign_up(){
      document.getElementById("popup-7").classList.remove("active");
      document.getElementById("popup-10").classList.toggle("active");
    }

    function togglePopup_sign_up_2(){
      document.getElementById("popup-10").classList.remove("active");
      document.getElementById("popup-11").classList.toggle("active");
    }

    function togglePopup_sign_up_3(){
      document.getElementById("popup-11").classList.remove("active");
      document.getElementById("popup-10").classList.toggle("active");
    }

    function error_login(){
      document.getElementById("error1").classList.add("active");
    }

    function remove_error_login(){
      document.getElementById("error1").classList.remove("active");
    }
    
</script>

<?php
  if(isset($_POST['login'])){
    $email = $_POST['sysactoremail'];
    $pwd = $_POST['sysactorpassword'];

    if(filter_var($email,FILTER_VALIDATE_EMAIL) and (strlen($pwd)<=15 and strlen($pwd)>=8)){
        echo '<script type="text/javascript">remove_error_login();</script>';
        include '../Control/login_Control.php';
        $connect =  login($email,$pwd);
        if($connect == 'false'){
          echo '<script type="text/javascript">error_login();</script>';
        }
        elseif($connect == 'M'){
          echo '<script type="text/javascript">window.open("./Moderator_Home.php", "_self");</script>';
        }
        
    }
    else{
        echo '<script type="text/javascript">error_login();</script>';
    }

  }
?>


    
</body>
</html>