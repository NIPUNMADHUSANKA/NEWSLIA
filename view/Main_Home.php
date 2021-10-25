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
    <link rel="stylesheet" href="../css/password.css">
    <link rel="shortcut icon" type = "image/x-icon" href = "../images/logo.ico">
    
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

.top_icon{
  float:right;
  margin-top:1.5rem;
  transform:scale(3);
  cursor: pointer;
  color:#eee;
  width:1rem;
  height:1rem;
  background: #5CD85A;
  padding:0.1rem;
  padding-bottom:0.3rem;
  transition:0.5s ease;
  margin-left:5rem;
  border-radius:5px;
  text-align:center;
}



.top_icon:hover{
  transform:scale(3.5); 
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

    <div class="top_icon" id="btnscrollToTop">
         <i class="fa fa-arrow-up"></i>
    </div>

    

</div>


<script>
 const btnscrollToTop = document.querySelector("#btnscrollToTop");
 btnscrollToTop.addEventListener("click",function(){
   window.scrollTo({
     top:0,
     left:0,
     behavior:"smooth"
   });
 });
</script>







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
    <div class="top_icon" id="btnscrollToTopsecond">
         <i class="fa fa-arrow-up"></i>
   </div>

   </div>

   

</div>


<script>
 const btnscrollToTop2 = document.querySelector("#btnscrollToTopsecond");
 btnscrollToTop2.addEventListener("click",function(){
   window.scrollTo({
     top:0,
     left:0,
     behavior:"smooth"
   });
 });
</script>


















<!--Popup windows -->

<div class="errorbox" id="error1">
  <div class="content_erro">
       <div class="error_head">NEWSLIA says</div>
       <div class="error_body">Incorrect email address or password.</div>
       <div class="error_foot" onclick="remove_error_login()">OK</div>

  </div>
</div>

<div class="errorbox" id="error2">
  <div class="content_erro">
       <div class="error_head">NEWSLIA says</div>
       <div class="error_body">Please complete all required fields.</div>
       <div class="error_foot" onclick="remove_error_signup_1()">OK</div>

  </div>
</div>

<div class="errorbox" id="error3">
  <div class="content_erro">
       <div class="error_head">NEWSLIA says</div>
       <div class="error_body">Invalid data insert</div>
       <div class="error_foot" onclick="remove_error_signup_2()">OK</div>

  </div>
</div>


<div class="errorbox" id="error4">
  <div class="content_erro">
       <div class="error_head">NEWSLIA says</div>
       <div class="error_body">Password must be at least 8 characters</div>
       <div class="error_foot" onclick="error_signup_3()">OK</div>

  </div>
</div>

<div class="errorbox" id="error5">
  <div class="content_erro">
       <div class="error_head">NEWSLIA says</div>
       <div class="error_body">Confirm Password confirmation does not match.</div>
       <div class="error_foot" onclick="error_signup_4()">OK</div>

  </div>
</div>


<div class="errorbox" id="error6">
  <div class="content_erro">
       <div class="error_head">NEWSLIA says</div>
       <div class="error_body">Sorry... Your email has already been taken.</div>
       <div class="error_foot" onclick="error_signup_5()">OK</div>

  </div>
</div>

<div class="errorbox" id="error7">
  <div class="content_erro">
       <div class="error_head">NEWSLIA says</div>
       <div class="error_body">Your mobile number has already been taken.</div>
       <div class="error_foot" onclick="error_signup_6()">OK</div>

  </div>
</div>

<div class="errorbox" id="error8">
  <div class="content_erro">
       <div class="error_head">NEWSLIA says</div>
       <div class="error_body">Your NIC number has already been taken.</div>
       <div class="error_foot" onclick="error_signup_7()">OK</div>

  </div>
</div>


<div class="errorbox" id="error9">
  <div class="content_erro">
       <div class="error_head">NEWSLIA says</div>
       <div class="error_body">Your Username has already been taken.</div>
       <div class="error_foot" onclick="error_signup_8()">OK</div>

  </div>
</div>

<div class="errorbox" id="error10">
  <div class="content_erro">
       <div class="error_head">NEWSLIA says</div>
       <div class="error_body" style="color:#555;">Congratulations, your account has been successfully created.</div>
       <div class="error_foot" onclick="signup_msg1()" style="margin-top:-0.15rem;">OK</div>

  </div>
</div>


<div class="errorbox" id="error11">
  <div class="content_erro">
       <div class="error_head">NEWSLIA says</div>
       <div class="error_body" style="color:#555;">Congratulations, Already have recorded your data,we will evaluate them and inform you later. </div>
       <div class="error_foot" onclick="signup_msg2()" style="margin-top:0.1rem;margin-right:1rem;">OK</div>

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



<form action="./Main_Home.php" method = "POST">

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

                        <input type="text" name="sysactor_first_name" id="new_fname" class="inp inp1 finp" placeholder="First Name">
                        
                        <input type="text" name="sysactor_last_name" id="new_lname" class="inp inp1 linp" placeholder="Second Name">
                          
                        <input type="text" name="sysactor_email" id="new_email" class="inp inp1 einp" placeholder="Email Address">

                        <input type="text" name="sysactor_mobile" id="new_mobile" class="inp inp1 einp" placeholder="Mobile Number">

                        <input type="text" name="sysactor_nic" id="new_nic" class="inp inp1 einp" placeholder="NIC Number">
                        
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

          
                        <select name="job" id="" class="select_your_job inp1 sel">
                          <option value="0" disabled selected hidden class="ent">Your Job</option>
                          <option value="normal_user" class="ent">Normal User</option>
                          <option value="reporter" class="ent">Reporter</option>
                          <option value="moderator" class="ent">Moderator</option>
                          <option value="admin" class="ent">Administrator</option>
                        </select>

                        
                        <br>
                        <select name="province" id="new_Province" class="select_your_job inp1 sel sel2">
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

                        <select name="district" id="new_District" class="select_your_job inp1 sel sel2">
                          <option value="" class="ent">District</option>
                        </select>
                        
                        
                        <br>

                        <select name="dsa" id="new_DSA" class="select_your_job inp1 sel">
                          <option value="" class="ent">Divisional Secretariat Area </option>
                        </select>  


                        <input type="text" name="sysactor_new_username" id="new_uname" class="inp inp1 inp3" placeholder="Username">

                        <br>
                        <input type="password" name="sysactor_pwd" id="new_pwd" class="inp inp1 finp pass" placeholder="Password" maxlength="15">
                        

                        
                        <input type="password" name="sysactor_rpwd" id="re_new_pwd" class="inp inp1 linp pass" placeholder="Retype Password" maxlength="15">
                        <br>
                        
                        <!--<input type="checkbox" id="privacy" name="privacy" value="1">
                        <label for="privacy" class="privacy_info"> I accept the Terms of Use & Privacy Policy.</label>-->
                        
                        <div class="update_btn prev" onclick="togglePopup_sign_up_3()">Prev</div> 
                        <button class="update_btn submit send" name="signup">Submit</button>

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
    

    function error_signup_1(){
      document.getElementById("error2").classList.add("active");
    }

    function remove_error_signup_1(){
      document.getElementById("error2").classList.remove("active");
    }

    function error_signup_2(){
      document.getElementById("error3").classList.add("active");
    }

    function remove_error_signup_2(){
      document.getElementById("error3").classList.remove("active");
    }

    function error_signup_3(){
      document.getElementById("error4").classList.toggle("active");
    }

    function error_signup_4(){
      document.getElementById("error5").classList.toggle("active");
    }

    function error_signup_5(){
      document.getElementById("error6").classList.toggle("active");
    }

    function error_signup_6(){
      document.getElementById("error7").classList.toggle("active");
    }

    function error_signup_7(){
      document.getElementById("error8").classList.toggle("active");
    }

    function error_signup_8(){
      document.getElementById("error9").classList.toggle("active");
    }

    function signup_msg1(){
      document.getElementById("error10").classList.toggle("active");
    }

    function signup_msg2(){
      document.getElementById("error11").classList.toggle("active");
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


  if(isset($_POST['signup'])){

        $first = $_POST['sysactor_first_name'];
        $last = $_POST['sysactor_last_name'];
        
        $email = $_POST['sysactor_email'];
        $mobile = $_POST['sysactor_mobile'];
        $nic = $_POST['sysactor_nic'];
        
        $job = $_POST['job'];
        $province = $_POST['province'];
        $district = $_POST['district'];
        $dsa = $_POST['dsa'];

        $username_new = $_POST['sysactor_new_username'];

        $pwd = $_POST['sysactor_pwd'];
        $repwd = $_POST['sysactor_rpwd'];

        //$privacy = $_POST['privacy'];

        //echo '<script>alert("'.$username_new.'")</script>'; 


        $regex = '/^(?:0|94|\+94)?(?:(?P<area>11|21|23|24|25|26|27|31|32|33|34|35|36|37|38|41|45|47|51|52|54|55|57|63|65|66|67|81|912)(?P<land_carrier>0|2|3|4|5|7|9)|7(?P<mobile_carrier>0|1|2|4|5|6|7|8)\d)\d{6}$/';  
   

        if (empty($first) || empty($last) || empty($email) || empty($mobile) || empty($nic) || empty($job) || empty($province) 
        || empty($district) || empty($dsa) || empty($username_new) || empty($pwd) || empty($repwd))
        {
          echo '<script type="text/javascript">error_signup_1();</script>';
        }
        elseif(filter_var($email,FILTER_VALIDATE_EMAIL) && preg_match_all($regex, $mobile, $matches, PREG_SET_ORDER, 0) && preg_match('/^([0-9]{9}[x|X|v|V]|[0-9]{12})$/', $nic) ){
          if(strlen($pwd)<8){
              echo '<script type="text/javascript">error_signup_3();</script>';
          }
          elseif($pwd != $repwd){
            echo '<script type="text/javascript">error_signup_4();</script>';
          }
          else{
            include '../Model/connect.php';
            
            //Email
            $email_check_sql = "SELECT * FROM login WHERE Email = '$email'";
            $email_check_statement = $conn -> query($email_check_sql);
            $email_check_results = $email_check_statement->fetchAll(PDO::FETCH_ASSOC);

            //Mobile
            $mobile_check_sql = "SELECT * FROM system_actor WHERE Mobile = '$mobile'";
            $mobile_check_statement = $conn -> query($mobile_check_sql);
            $mobile_check_results = $mobile_check_statement->fetchAll(PDO::FETCH_ASSOC);


            //NIC
            $nic_check_sql = "SELECT * FROM system_actor WHERE NIC = '$nic'";
            $nic_check_statement = $conn -> query($nic_check_sql);
            $nic_check_results = $nic_check_statement->fetchAll(PDO::FETCH_ASSOC);


            //Username
            $username_check_sql = "SELECT * FROM system_actor WHERE UserName = '$username_new'";
            $username_check_statement = $conn -> query($username_check_sql);
            $username_check_results = $username_check_statement->fetchAll(PDO::FETCH_ASSOC);


            if($email_check_results){
              echo '<script type="text/javascript">error_signup_5();</script>';  
            }
            elseif($mobile_check_results){
              echo '<script type="text/javascript">error_signup_6();</script>';  
            }
            elseif($nic_check_results){
              echo '<script type="text/javascript">error_signup_7();</script>';  
            }

            elseif($username_check_results){
              echo '<script type="text/javascript">error_signup_8();</script>';  
            }

            else{
              include '../Control/login_Control.php';
              $signup_connection =  signup($first,$last,$email,$mobile,$nic,$job,$dsa,$username_new,$pwd);
              if ($signup_connection == "User"){
                echo '<script type="text/javascript">signup_msg1();</script>'; 
              }
              elseif ($signup_connection == "Staff"){
                echo '<script type="text/javascript">signup_msg2();</script>'; 
              }

            }


          }

        }
        else{
          echo '<script type="text/javascript">error_signup_2();</script>';
        }


        

  }
  
?>

<script src="../js/validate.js"></script>

    
</body>
</html>