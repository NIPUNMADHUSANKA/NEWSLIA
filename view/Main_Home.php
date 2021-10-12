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
    transform:scale(1.08);
  
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

</style>

<body>

  <div class="heder">
      
        <div class="left">
            <img src="../images/Name.svg" alt="" srcset="">
        </div>

        

        <div class="right">

                <ul>
                    <li> <a href="#">Home</a> </li>
                    <li> <a href="#">About Us</a></li>
                    <li><a href="#">Contact Us</a></li>
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
                  <div class="button_login" onclick="">Sign Up</div>
              </div>

        </div>

        <div class="content_right">
            <img src="../images/background.svg" alt="" srcset="">
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
               <span id="remember_me" class="txt txt3">Create an Account</span>
        
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

 
               <input type="text" name="sysactorusername" placeholder="Username" id="username" class="inp inp1">
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

 
               <input type="password" name="sysactor_new_psd_confirm" id="otp" class="inp inp1" placeholder="New Password">
               <br>
               <br>
               <input type="password" name="sysactor_new_psd_confirm" id="otp" class="inp inp1" placeholder="Retype New Password">
               <br>
              
              <button class="update_btn otp_btn2" onclick="togglePopup_reset_save()">Save</button>

               <br>
               <br> 
        </div>
         </div>

    </div>
</div>

</div>













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