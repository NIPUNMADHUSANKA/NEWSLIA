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
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/moderator.css">
    <link rel="stylesheet" href="../css/search.css">
    <link rel="stylesheet" href="../css/profile.css">
    <link rel="stylesheet" href="../css/select_area.css">
    <link rel="shortcut icon" type = "image/x-icon" href = "../images/logo.ico">
    <script src="https://kit.fontawesome.com/c119b7fc61.js" crossorigin="anonymous"></script>
   
</head>

<style>
  body {
    overflow: hidden; /* Hide scrollbars */
  }

  
  .column2 {
    float: right;
    width: 82%;
    height: 557px;
    margin-top:-44rem;
  }

  .prof_img{
      margin-top:-0.5rem;
  }

  .prof_img img {
    position: relative;
    width: 110px;
    height: 124px;
    left: 45%;
    top: 32px;
  }

  .prof_img h3 {
    text-align: center;
    margin-top: 25px;
    margin-left: -5px;
    font-style: normal;
    font-weight: bold;
    font-size: 17px;
    line-height: 21px;
  }

  .prof_img input {
    background-color: #E3E3E3;
    position: relative;
    width: 32px;
    height: 32px;
    left: 552px;
    top: 24px;
  }

  .columns_below2 {
    position: relative;
    width: 50%;
    float: right;
    margin-top: 0%;
    top: -349px;
  }

  .columns_below1 {
    position: relative;
    width: 50%;
    float: left;
    padding: 30px 40px;
  }

  .columns_below1 h3 {
    position: relative;
    width: 59px;
    height: 23px;
    font-family: Roboto;
    font-style: normal;
    font-weight: bold;
    font-size: 20px;
    line-height: 23px;

  }

  /* .label{
    position: relative;
    width: 74px;
    height: 18px;
/* left: 296px;*/
  /* top: 17px; 

    font-family: Roboto;
    font-style: normal;
    font-weight: 500;
    font-size: 15px;
    line-height: 18px;


    color: #565555;
} */
  */
  /* .ans{
    position: relative;
width: 36px;
height: 16px;
/* left: 316px;
top: 463px; */

  /* font-family: Roboto;
font-style: normal;
font-weight: 500;
font-size: 14px;
line-height: 16px;

color: #463F3F; */
  /* }  */



  .formp1 {
    display: flex;
    flex-direction: column;
    padding: 0px 40px;
  }

  .part {
    margin: 20px 0px;
  }

  .label {
    margin-bottom: 10px;

    font-family: Roboto;
    font-style: normal;
    font-weight: 500;
    font-size: 15px;
    line-height: 18px;


    color: #565555;
  }

  .ans {
    font-family: Roboto;
    font-style: normal;
    font-weight: 500;
    font-size: 14px;
    line-height: 16px;
    padding-left: 22px;
  }

  .part hr {
    margin-left: 4px;
    width: 90%;
  }

  .part img {
    position: relative;
    height: 25px;
    width: 15px;
    float: right;
    right: 50px;
    /* right: 44.1%; */
    /* top: 66.14%;
bottom: 31.43%; */
  }

  .camera {
    background-color: #E3E3E3;
    position: relative;
    width: 32px;
    height: 32px;
    left: 552px;
    top: 24px;
  }

  .fa-camera:before {
    content: "\f030";
    color: black;
  }

  .column1 tr:hover {
    background-color: #f1f1f1;
  }

  .profile-pen {

    position: relative;
    height: 25px;
    width: 15px;
    float: right;
    right: 50px;
    /* right: 44.1%; */

  }

  .fa-pen:before {
    content: "\f304";
    color: black;
  }
</style>


<body>

 

<!--navigation-->

<?php $page = 'home';
  include 'nav.php'; ?>

<!--End of Navigation-Bar-->



<!-- Moderator Notices View -->


<div class="left_side">

  <div class="icon_left_side">

  <li><a href="Moderator_Profile.php"><img src="../images/other/profile.png" alt="" srcset=""><p style="color: #45ADA8EB;">My Profile</p></a></li>
  <li><a href="Moderate_Area.php"><img src="../images/other/location.png" alt="" srcset=""><p>Select Area</p></a></li>
  <li><a href="Moderate_Post_Type.php"><img src="../images/other/type.png" alt="" srcset=""><p>Select Type</p></a></li>
  <li><a href="Moderator_Insight.php"><img src="../images/other/insights.png" alt="" srcset=""><p>Insights</p></a></li>
  <li onclick="togglePopup_select_option('deactivate-1')"><a href="#"><img src="../images/other/deactivate.png" alt="" srcset=""><p>Deactivate</p></a></li>
  <li><a href="logout.php"><img src="../images/other/logout.png" alt="" srcset=""><p>Log Out</p></a></li>



  </div>


</div>


<div class="column2">

<div class="prof_img">
  <img src="../images/Profile.svg" style="margin-top:-2rem;">
  <a href="#" class="camera"><i class="fas fa-camera fa-2x"></i></a>
  <br>
  <h3>Nipun Madhusanka</h3>

  <hr style="margin-top: 50px;margin-left:2rem;">
</div>

<div class="columns_below1">
  <h3>Profile</h3>

  <div class="formp1" style="padding: 0px 45px;">
    <div class="part">
      <p class="label">First Name</p>
      <p class="ans"> Nipun <a href="#" class="profile-pen"> <i class="fas fa-pen"></i> </a></p>
      <hr>
    </div>
    <div class="part">
      <p class="label">Last Name</p>
      <p class="ans">Madhusanka <a href="#" class="profile-pen"> <i class="fas fa-pen"></i> </a> </p>
      <!-- <img src="images/pen.svg"> -->
      <hr>
    </div>
    <div class="part">
      <p class="label">Divisional Secretariat Area</p>
      <p class="ans">Minuwangoda <a href="#" class="profile-pen"> <i class="fas fa-pen"></i> </a> </p>
      <!-- <img src="images/pen.svg"> -->
      <hr>
    </div>
    <div class="part">
      <p class="label">Mobile No.</p>
      <p class="ans">0711737382 <a href="#" class="profile-pen"> <i class="fas fa-pen"></i> </a> </p>
      <!-- <img src="images/pen.svg"> -->
      <hr>
    </div>
  </div>
</div>

<div class="columns_below2">
  <div class="formp1" style="padding: 35px 45px;">
    <div class="part">
      <p class="label">NIC No.</p>
      <p class="ans"> 199934310393 <a href="#" class="profile-pen"> <i class="fas fa-pen"></i> </a> </p>
      <hr>
    </div>
    <div class="part">
      <p class="label">Email</p>
      <p class="ans">nipunmadhusanka201085@gmail.com <a href="#" class="profile-pen"> <i class="fas fa-pen"></i> </a> </p>
      <!-- <img src="images/pen.svg"> -->
      <hr>
    </div>
    <div class="part">
      <p class="label">User Name</p>
      <p class="ans">NIPUNM <a href="#" class="profile-pen"> <i class="fas fa-pen"></i> </a> </p>
      <!-- <img src="images/pen.svg"> -->
      <hr>
    </div>
    <div class="part">
      <p class="label">Password</p>
      <p class="ans">******** <a href="#" class="profile-pen"> <i class="fas fa-pen"></i> </a> </p>
      <!-- <img src="images/pen.svg"> -->
      <hr>
    </div>
  </div>
</div>

</div>

</div>


<script>
    function remove_disable(){
      var input = document.getElementsByClassName('moderator_radio');
      for (var i = 0; i < input.length; i++) {
                input[i].disabled = false;
            }
    }

    function remove_read_disable(){
      var input = document.getElementsByClassName('moderator_read_radio');
      for (var i = 0; i < input.length; i++) {
                input[i].disabled = false;
                
            }
    }


</script>
    
</body>
</html>