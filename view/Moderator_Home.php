<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moderator_Home</title>
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/moderator.css">
</head>

<style>
  body {
  overflow: hidden; /* Hide scrollbars */
  }
</style>

<body>

  <div class="heder">
      
        <div class="left">
            <img src="../images/logo.svg" alt="" srcset="">
        </div>

        <div class="center">
            <img src="../images/Name.svg" alt="" srcset="">
        </div>

        <div class="right">
            <img src="../images/Profile.svg" alt="" srcset="">
            <p>A.A.N.Madhusanka <img src="../images/Drop-down.svg" alt="" srcset="" class="down"> </p>
            <ul class="profile_menu">
                <li><a href="#"> <img src="../images/other/profile.png" alt="" srcset=""> My Profile</a></li>
                <li><a href="#"><img src="../images/other/location.png" alt="" srcset="">Select Area</a></li>
                <li><a href="#"><img src="../images/other/type.png" alt="" srcset="">Select Type</a></li>
                <li><a href="Moderator_Insight.php"><img src="../images/other/insights.png" alt="" srcset="">Insights</a></li>
                <li><a href="#"><img src="../images/other/deactivate.png" alt="" srcset="">Deactivate</a></li>
                <li><a href="#"><img src="../images/other/logout.png" alt="" srcset="">Log Out</a></li>
            </ul>
        </div>

  </div>
  
  <ul class="menu">
      <li><a href="Moderator_Home.php">Home</a></li>
      <li class="view dropdown">
        <a href="javascript:void(0)" class="dropbtn">View</a>
        <div class="view-content dropdown-content">
            <a href="#">News</a>
            <a href="Moderator_View_Articles .php">Articles</a>
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
            <a href="#">Save</a>
            <a href="#">Hidden</a>
            <a href="#">Reminder</a>
        </div>
      </li>  
  </ul>

<!-- Moderator Page Content -->
<div class="content">

        <div class="content_left">
          <h1>Welcome to the NEWSLIA's <br> Moderator Interface</h1>
              
              <div class="content_left_info">


                  <div class="content_left_info_moderate row">
                    <div class="content_left_info_moderate_key key">
                        Moderating Area
                    </div>
                    <div class="content_left_info_moderate_input input">
                      
                    </div>
                  </div>


                  <div class="content_left_info_reading row">
                    <div class="content_left_info_reading_key key">
                        Reading Area
                    </div>
                    <div class="content_left_info_reading_input input">
                      
                    </div>
                  </div>


                  <div class="content_left_info_type row">
                    <div class="content_left_info_type_key key">
                        View Posts Type
                    </div>
                    <div class="content_left_info_type_input input">
                      
                    </div>
                  </div>

              </div>

        </div>

        <div class="content_right">
            <img src="../images/background.svg" alt="" srcset="">
        </div>

  </div>
    
</body>
</html>