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
      margin-top:0.5rem;
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
                  <div class="button_login">Sign Up</div>
              </div>

        </div>

        <div class="content_right">
            <img src="../images/background.svg" alt="" srcset="">
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
            <form action="" method="post">

 
               <input type="email" name="sysusername" placeholder="Email" id="username" class="inp inp1">
               <br>
               <br>
               <input type="password" name="syspassword" id="password" class="inp inp1" placeholder="Password">
               <br>
               <span id="remember_me" class="txt txt1">Forgot Password?</span>

               <div class="update_btn">Login</div>
               <br>
               <span id="remember_me" class="txt txt2">New to NEWSLIA?</span>
               <span id="remember_me" class="txt txt3">Create an Account</span>
        
             </form>
         </div>

    </div>
</div>

</div>







<script>


    function togglePopup_login(){
      document.getElementById("popup-7").classList.toggle("active");
    }


   
   

</script>


    
</body>
</html>