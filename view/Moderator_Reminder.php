<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Reminder Post</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/moderator.css">
    <link rel="stylesheet" href="../css/search.css">
    <link rel="stylesheet" href="../css/popup.css">
  <link rel="shortcut icon" type = "image/x-icon" href = "../images/logo.ico">
  <script src="https://kit.fontawesome.com/c119b7fc61.js" crossorigin="anonymous"></script>
</head>

<style>
 

  body {
    font-family: 'Sora', sans-serif;
  }


  .profile-menu-container {
    margin-right: 160px;
  }

  .down {
    margin-left: 2px;
  }

  .fa-customize {
    font-size: 22px;
    color: black;
  }

  .box-container {
    height: 250px;
  }

  .payment {
    text-align: end;
  }

  .content_posts_view {
    display: flex;
    flex-direction: row;
    padding: 2vw 0vw 0vw 7vw;
    justify-content: space-between;
  }

  .payment a {
    text-decoration: none;
    color: black;
  }

  .posts_content_view_head{
      font-size:x-large;
  }

  .setting_close{
    transform:scale(2);
    /*margin-left:78%;*/
    margin-right:5%;
    margin-top :12%;
  }
  .setting_close img{
    padding-right:5px;
    cursor: pointer;
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
    transform:scale(1.07);
  
  }

</style>

<body>
  <!--navigation-->
  <div class="heder">
      
      <div class="left">
          <img src="../images/logo.svg" alt="" srcset="">
      </div>

      <div class="center">
          <img src="../images/Name.svg" alt="" srcset="">
      </div>

      <div class="right">
            <img src="../images/Profile.svg" alt="" srcset="">
            <p><?php   echo $_SESSION['FName']." ".$_SESSION['LName']; ?> <img src="../images/Drop-down.svg" alt="" srcset="" class="down"> </p>
            <ul class="profile_menu">
                <li><a href="#"> <img src="../images/other/profile.png" alt="" srcset=""> My Profile</a></li>
                <li><a href="Moderate_Area.php"><img src="../images/other/location.png" alt="" srcset="">Select Area</a></li>
                <li><a href="Moderate_Post_Type.php"><img src="../images/other/type.png" alt="" srcset="">Select Type</a></li>
                <li><a href="Moderator_Insight.php"><img src="../images/other/insights.png" alt="" srcset="">Insights</a></li>
                <li><a href="#"><img src="../images/other/deactivate.png" alt="" srcset="">Deactivate</a></li>
                <li><a href="logout.php"><img src="../images/other/logout.png" alt="" srcset="">Log Out</a></li>
            </ul>
      </div>

</div>

<ul class="menu">
    <li><a href="Moderator_Home.php">Home</a></li>
    <li class="view dropdown">
      <a href="javascript:void(0)" class="dropbtn">View</a>
      <div class="view-content dropdown-content">
          <a href="Moderator_View_News.php">News</a>
          <a href="Moderator_View_Articles.php">Articles</a>
          <a href="Moderator_View_Notices.php">Notices</a>
          <a href="Moderator_View_Jobs.php">job vacancies</a>
          <a href="Moderator_View_Ads.php">Commercial Ads</a>
      </div>
    </li>

    <li class="publish dropdown">
      <a href="javascript:void(0)" class="dropbtn">Publish</a>
      <div class="publish-content dropdown-content">
          <a href="Moderator_Pending.php">Pending</a>
          <a href="Moderator_Set_Time.php">Set Time</a>
      </div>
    </li>

    <li class="imporatnt dropdown">
      <a href="javascript:void(0)" class="dropbtn">Important Contacts</a>
      <div class="important-content dropdown-content">
          <a href="Moderator_Important_View.php">View Contact Numbers</a>
          <a href="Moderator_Manage_ICN.php">Edit Contact Numbers</a>
      </div>
    </li>

    <li><a href="Moderator_Reporter.php">Insights</a></li>
    <li class="more_menu dropdown">
      <a href="javascript:void(0)" class="dropbtn">More</a>
      <div class="more_menu-content dropdown-content">
          <a href="Moderator_save.php">Saved</a>
          <a href="#">Hidden</a>
          <a href="#">Reminder</a>
      </div>
    </li>  
</ul>
  
  <!--End of Navigation-Bar-->

  <div class="content_posts_view">
    <div class="posts_content_view_head">
      Reminders
    </div>

    <div class="post_sort" style="margin-right:30rem;">
      <div class="post_sort_bar">
        <button onclick="showsort()" class="drop_area_sort">Select Post Type<img src="../images/sort.svg" alt="" srcset=""></button>
        <div class="drop_area_sort_cont" id="sortdrop">
          <img src="../photos/search.svg" alt="" srcset="">
          <input type="text" id="myInput" onkeyup="filterFunction()" placeholder="Search...">
          <a href="#">News</a>
          <a href="#">Articles</a>
          <a href="#">Notices</a>
          <a href="#">Job Vacancies</a>
          <a href="#">Commercial Ads</a>
        </div>
      </div>
    </div>

    <div class="payment">
      <a href="#">Account Balance Rs. 99.99</a>
      <img src="../images/reminder.png" alt="" style="margin-right:50px;margin-top:0rem;cursor:pointer">
    </div>

  </div>



  <div class="posts_content_view_body">

    <div class="body_information">

      <div class="box-container" style="margin-bottom: 50px; margin-right: 50px;">
        <div class="box_head">
          <img src="../images/save/vaccine.jpg" alt="">

          <div class="middle">
            <div class="view_btn" onclick="window.open('Moderator_Read_Reminder.php','_self')">View</div>
          </div>

        </div>
        <div style="display: flex; justify-content: space-between;">
          <div class="box_body">
            <h3>Vaccination Program</h3>
            <p>2021-10-25</p>
            <p>Anura Malshan</p>



          </div>

          <div class="setting_close">
                  <img src="../images/Setting.svg" alt="" srcset="" onclick="togglePopup()">
                  <img src="../images/Close.svg" alt="" srcset="">
              
              </div>


        </div>
      </div>

    </div>


  </div>







  <div class="popup" id="popup-1">

<div class="overlay"></div>

<div class="content">
    <div class="close-btn" onclick="togglePopup()">&times;</div>


    <div class="content_body">
        <div class="popup_logo">
             <img src="../images/Name.svg" alt="" srcset="">
        </div>
        <hr>

        <div class="popup_form">
            <h3 class="popup_title">Update Reminder Date & Time</h3>
            <form action="" method="post">

               <label for="update-date" class="lbl">Date</label>
            
               <input type="date" name="" id="update-date" class="inp" required value="2021-11-05">
               <br>
               <br>

               <label for="update-time" class="lbl">Time</label>
               
               <input type="time" name="" id="update-time" class="inp" required value="08:00">
               <br>
               <br>

               <button type="submit" name ="login" class="update_btn" value="LOGIN">Update</button>
        
             </form>
         </div>

    </div>
</div>

</div>



</body>

<script>

function togglePopup(){
      document.getElementById("popup-1").classList.toggle("active");
    }


  function showsort() {
    document.getElementById("sortdrop").classList.toggle("show");
  }

  function filterFunction() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    div = document.getElementById("sortdrop");
    a = div.getElementsByTagName("a");
    for (i = 0; i < a.length; i++) {
      txtValue = a[i].textContent || a[i].innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        a[i].style.display = "";
      } else {
        a[i].style.display = "none";
      }
    }
  }
</script>

</html>