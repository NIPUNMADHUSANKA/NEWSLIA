<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/nav/final-navigation.css">
  <link rel="stylesheet" href="../css/nav/Deactivate-1.css">
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
              <li><a href="#"><img src="../images/other/deactivate.png" alt="" srcset="">Deactivate</a></li>
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
      <a href="javascript:void(0)" class="navigation-dropbtn">View</a>
      <div class="navigation-view-content navigation-dropdown-content">
            <a href="Moderator_View_News.php">News</a>
            <a href="Moderator_View_Articles.php">Articles</a>
            <a href="Moderator_View_Notices.php">Notices</a>
            <a href="Moderator_View_Jobs.php">job vacancies</a>
            <a href="Moderator_View_Ads.php">Commercial Ads</a>
      </div>
    </li>



    <!-- Publish -->
    <li class="navigation-view  navigation-dropdown  <?php if ($page == 'publish') {
                                                        echo 'activate';
                                                      } ?>">
      <a href="" class="navigation-dropbtn">Publish</a>
      <div class="navigation-view-content navigation-dropdown-content">
            <a href="Moderator_Pending.php">Pending</a>
            <a href="Moderator_Set_Time.php">Set Time</a>
      </div>
    </li>







    <li class="navigation-imporatnt navigation-dropdown  <?php if ($page == 'news') {
                                                            echo 'activate';
                                                          } ?>">
      <a href="view-news.php" class="navigation-dropbtn">News</a>
    </li>

    <li class="navigation-view  navigation-dropdown  <?php if ($page == 'articles') {
                                                        echo 'activate';
                                                      } ?>">
      <a href="View-Articles.php" class="navigation-dropbtn">Articles<img src="../images/nav-photos/Drop-down.svg" alt="" srcset="" class="navigation-down"></a>
      <div class="navigation-view-content navigation-dropdown-content">
        <a href="my-articles.php">My Articles</a>
        <a href="Drafted-Articles.php">Drafted Articles</a>
        <a href="Write-Article.php">Create New</a>
      </div>
    </li>


    <li class="navigation-view  navigation-dropdown  <?php if ($page == 'advertisements') {
                                                        echo 'activate';
                                                      } ?>">
      <a href="#" class="navigation-dropbtn">Advertisements<img src="../images/nav-photos/Drop-down.svg" alt="" srcset="" class="navigation-down"></a>
      <div class="navigation-view-content navigation-dropdown-content">
        <a href="View-Commercial-Ads.php">Commercial Ads</a>
        <a href="View-Job-Vacancies.php">Job Vacancies</a>
        <a href="View-Notices.php">Notices</a>
        <a href="#" onclick="togglePopup_select_option('popup-type')">Create New</a>
      </div>
    </li>

    <li class="navigation-imporatnt dropdown  <?php if ($page == 'important-contacts') {
                                                echo 'activate';
                                              } ?>">
      <a href="View-Important-Contacts.php" class="navigation-dropbtn">Important Contacts</a>
    </li>

    <li class="navigation-more navigation-dropdown  <?php if ($page == 'more') {
                                                      echo 'activate';
                                                    } ?>" style="margin-top: 0;">
      <a href="#" class="navigation-dropbtn">More<img src="../images/nav-photos/Drop-down.svg" alt="" srcset="" class="down navigation-down"></a>

      <div class="navigation-more-content navigation-dropdown-content">
        <a href="pending-posts.php">Pending</a>
        <a href="Saved-Posts.php">Saved</a>
        <a href="Hidden-Posts.php">Hidden</a>
        <a href="Reminder.php">Reminders</a>
      </div>

    </li>

    

  </ul>



</body>
</html>