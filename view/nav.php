<!DOCTYPE html>
<html lang="en">
<head>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/nav/final-navigation.css">
  <link rel="shortcut icon" type = "image/x-icon" href = "../images/logo.ico">

  <script src="https://kit.fontawesome.com/c119b7fc61.js" crossorigin="anonymous"></script>
</head>


<style>
  body {
    overflow-x: hidden;
  }

  .navigation-profile-menu-container {
    margin-right: 160px;
  }

  .navigation-down {
    margin-left: 5px;
  }

  .fa-customize {
    font-size: 22px;
    color: black;
  }

  .fa-check:before {
    content: "\f00c";
    color: lightgreen;
  }


  .navigation-notification{
    margin-bottom:0.5rem;
    padding: 1rem;
    color:#444;
    font-weight:10px;
    letter-spacing:1px;
    transition: 0.5s ease;
    width: 95%; 
    display: flex; 
    justify-content: space-between; 
    background-color: #ECECEC;
  }

  .navigation-notification:hover{
    transform:scale(1.1);
  }



  .deactivate-1-main-container {
    margin: auto;
    margin-top: 100px;
    width: 328px;
    height: 270px;
    border: black 1px solid;
  }
  
  .deactivate-1-up {
    width: 100%;
    height: 25%;
    display: flex;
    border-bottom: 1px solid black;
  }
  
  .deactivate-1-down {
    width: 100%;
    height: 75%;
  }
  
  .deactivate-1-up-left {
    height: 100%;
    width: 90%;
    text-align: center;
  }
  
  .deactivate-1-up-left img {
    margin-top: 5%;
    width: 90%;
    height: 73%;
  }
  
  .deactivate-1-up-right {
    height: 100%;
    width: 10%;
  
    text-align: center;
  }
  
  .deactivate-1-deactivation-form-header {
    color: #8b7c7c;
    text-decoration: underline;
    margin-left: 10px;
    margin-top: 7px;
  }
  
  .deactivate-1-paragraph {
    text-align: center;
    margin: 18px;
    margin-top: 12px;
    margin-bottom: 25px;
    font-size:15px;
  }
  
  .deactivate-1-button {
    margin-top: 20px;
  }


  .deactivate-2-main-container {
    margin: auto;
    margin-top: 100px;
    width: 328px;
    height: 270px;
    border: black 1px solid;
  }
  
  .deactivate-2-up {
    width: 100%;
    height: 30%;
    display: flex;
    border-bottom: 1px solid black;
  }
  
  .deactivate-2-down {
    width: 100%;
    height: 70%;
  }
  
  .deactivate-2-up-left {
    height: 100%;
    width: 90%;
    text-align: center;
  }
  
  .deactivate-2-up-left img {
    margin-top: 5%;
    width: 90%;
    height: 73%;
  }
  
  .deactivate-2-up-right {
    height: 100%;
    width: 10%;
    text-align: center;
  }
  
  .deactivate-2-deactivation-form-header {
    color: #8b7c7c;
    text-decoration: underline;
    margin-left: 11px;
    margin-top: 7px;
  }
  
  .deactivate-2-deactivation-form {
    text-align: center;
    margin-top: 20px;
  }
  
  input:focus::placeholder {
    color: transparent;
  }
  
  .deactivate-2-input-1 {
    width: 80%;
    padding-left: 5px;
    background: #ebeaea;
    height: 36px;
    border: none;
    margin: 5px;
    outline: none;
    margin-top:-3rem;

  }
  
  .deactivate-2-button {
    margin-top: 20px;
  }


</style>


<body>
<div class="navigation-heder">

<div class="navigation-left">
    <img src="../images/logo.svg" alt="" srcset="">
</div>

<div class="navigation-center">
    <img src="../images/Name.svg" alt="" srcset="">
</div>

<div class="navigation-right">
    <img src="../images/Profile.svg" alt="" srcset="">
    <p><?php echo $_SESSION['FName']." ".$_SESSION['LName']; ?> <img src="../images/Drop-down.svg" alt="" srcset="" class="down"> </p>
           
  <div class="navigation-profile-menu-container" style="margin-left:5rem;">
    <ul class="navigation-profile_menu">
              <li><a href="Moderator_Profile.php"> <img src="../images/other/profile.png" alt="" srcset=""> My Profile</a></li>
              <li><a href="Moderate_Area.php"><img src="../images/other/location.png" alt="" srcset="">Select Area</a></li>
              <li><a href="Moderate_Post_Type.php"><img src="../images/other/type.png" alt="" srcset="">Select Type</a></li>
              <li><a href="Moderator_Insight.php"><img src="../images/other/insights.png" alt="" srcset="">Insights</a></li>
              <li onclick="togglePopup_select_option('deactivate-1')"><a href="#"><img src="../images/other/deactivate.png" alt="" srcset="">Deactivate</a></li>
              <li><a href="logout.php"><img src="../images/other/logout.png" alt="" srcset="">Log Out</a></li>
    </ul>
  </div>

</div>
</div>


<ul class="navigation-menu">



    <!-- Home -->
    <li class="navigation-imporatnt  navigation-dropdown  <?php if ($page == 'home') {
                                                            echo 'activate';
                                                          } ?>">
      <a href="Moderator_Home.php" class="navigation-dropbtn">Home</a>
    </li>


    <!-- View -->
    <li class="navigation-view  navigation-dropdown  <?php if ($page == 'view') {
                                                        echo 'activate';
                                                      } ?>">
      <a href="Moderator_View_News.php" class="navigation-dropbtn">View</a>
      <div class="navigation-view-content navigation-dropdown-content">
        <a href="Moderator_View_News.php">News</a>
        <a href="Moderator_View_Articles.php">Articles</a>
        <a href="Moderator_View_Notices.php">Notices</a>
        <a href="Moderator_View_Jobs.php">Job Vacancies</a>
        <a href="Moderator_View_Ads.php">Commercial Ads</a>
      </div>
    </li>


    <!-- Publish -->
    <li class="navigation-view  navigation-dropdown  <?php if ($page == 'publish') {
                                                        echo 'activate';
                                                      } ?>">
      <a href="Moderator_Pending.php" class="navigation-dropbtn">Publish</a>
      <div class="navigation-view-content navigation-dropdown-content">
        <a href="Moderator_Pending.php">Pending</a>
        <a href="Moderator_Set_Time.php">Set Time</a>
      </div>
    </li>

    <!-- Important Contact -->
    <li class="navigation-view  navigation-dropdown  <?php if ($page == 'important') {
                                                        echo 'activate';
                                                      } ?>">
      <a href="Moderator_Important_View.php" class="navigation-dropbtn">Important Contacts</a>
      <div class="navigation-view-content navigation-dropdown-content">
          <a href="Moderator_Important_View.php">View Contact Numbers</a>
          <a href="Moderator_Manage_ICN.php">Edit Contact Numbers</a>
      </div>
    </li>


    <!-- Insights -->
    <li class="navigation-imporatnt navigation-dropdown  <?php if ($page == 'insights') {
                                                            echo 'activate';
                                                          } ?>">
      <a href="Moderator_Reporter.php" class="navigation-dropbtn">Insights</a>
    </li>


    <!-- More -->
    <li class="navigation-more navigation-dropdown  <?php if ($page == 'more') {
                                                      echo 'activate';
                                                    } ?>" style="margin-top: 0;">
      <a href="#" class="navigation-dropbtn">More</a>

      <div class="navigation-more-content navigation-dropdown-content">
        <a href="Moderator_save.php">Saved</a>
        <a href="Moderator_Hidden.php">Hidden</a>
        <a href="Moderator_Reminder.php">Reminders</a>
      </div>

    </li>

    <li style="visibility: hidden;"><a href="#" onclick="togglePopup_select_option('notification')"><i class="fas fa-bell fa-customize"></i></a></li>

  </ul>











  <!-- deactivate  popup - 1-->

  <div class="navigation-popup navigation-popup_set_time" id="deactivate-1">

    <div class="navigation-overlay"></div>

    <div class="navigation-content navigation-popup_set_time" style="width: 300px; height: 360px;">
      <div class="navigation-close-btn" onclick="togglePopup_select_option('deactivate-1')">&times;</div>


      <div class="navigation-content_body  navigation-popup_set_time_body">
        <div class="navigation-popup_logo">
        <img src="../images/Name.svg" alt="" srcset="">
        </div>
        <hr>

        <div class="deactivate-1-down">
          <h3 class="deactivate-1-deactivation-form-header">Delete your account permanently.</h3>

          <div class="deactivate-1-paragraph">
            <p>
              Your account will be deleted permanently <br>
              after 15 days. <br>
              Until date, you can active the account by <br>
              login to the account.
            </p>

            <div class="deactivate-1-button">
              <a href="#" onclick="togglePopup_select_option('deactivate-2'); hide_previous('deactivate-1')"><img src="../images/16-deactivation/deactivate.png" alt=""></a>
            </div>

          </div>

        </div>

      </div>
    </div>

  </div>


  <!-- deactivate  popup - 2-->

  <div class="navigation-popup navigation-popup_set_time" id="deactivate-2">

    <div class="navigation-overlay"></div>

    <div class="navigation-content  navigation-popup_set_time" style="width: 300px; height: 300px;">
      <div class="navigation-close-btn" onclick="togglePopup_select_option('deactivate-2'); hide_previous('deactivate-1')">&times;</div>


      <div class="navigation-content_body  navigation-popup_set_time_body">
        <div class="navigation-popup_logo">
        <img src="../images/Name.svg" alt="" srcset="">
        </div>
        <hr>

        <div class="deactivate-2-down">
          <h3 class="deactivate-2-deactivation-form-header">Delete your account permanently.</h3>
          <div class="deactivate-2-deactivation-form">


          <br>

            <form action="../Control/other.php" method="post">
                <input type="password" class="deactivate-2-input-1" placeholder="Password to Deactivate" required name='confirm_deactivate'>

                <input type='submit' value='Deactivate' class='update_btn otp_btn2' name = 'deactivate' style="margin-left:-0.5rem;">
            </form>

          </div>
        </div>

      </div>
    </div>

  </div>



  <script>
  function togglePopup_select_option(id) {
    document.getElementById(id).classList.toggle("active");
  }

  function hide_previous(id) {
    document.getElementById(id).classList.toggle("navigation-hide");
  }
</script>





</body>
</html>