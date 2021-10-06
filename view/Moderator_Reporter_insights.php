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
    
</head>

<style>
  body {
    overflow-x: hidden;
  }
  
  .post_sort{
      padding-left:80px;
  }
  .box-container{
    height: 240px;
  }

  .posts_content_view_head{
    font-size:xx-large;

  }
  .right_side{
    margin-top: 0%;
  }

  .bottom_side{
    margin-left: 20%;
}

.left_box h4{
    margin-top:1rem;
}

.close_btn{
    position: flex;
    margin-left:95%;
    margin-top:1%;
    cursor: pointer;
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
                <li><a href="#"><img src="../images/other/insights.png" alt="" srcset="">Insights</a></li>
                <li><a href="#"><img src="../images/other/deactivate.png" alt="" srcset="">Deactivate</a></li>
                <li><a href="#"><img src="../images/other/logout.png" alt="" srcset="">Log Out</a></li>
            </ul>
        </div>

  </div>
  
  <ul class="menu">
      <li><a href="#">Home</a></li>
      <li class="view dropdown">
        <a href="javascript:void(0)" class="dropbtn">View</a>
        <div class="view-content dropdown-content">
            <a href="#">News</a>
            <a href="#">Articles</a>
            <a href="#">Notices</a>
            <a href="#">job vacancies</a>
            <a href="#">Commercial Ads</a>
        </div>
      </li>

      <li class="publish dropdown">
        <a href="javascript:void(0)" class="dropbtn">Publish</a>
        <div class="publish-content dropdown-content">
            <a href="#">Pending</a>
            <a href="#">Set Time</a>
        </div>
      </li>

      <li class="imporatnt dropdown">
        <a href="javascript:void(0)" class="dropbtn">Important Contacts</a>
        <div class="important-content dropdown-content">
            <a href="#">View Contact Numbers</a>
            <a href="#">Edit Contact Numbers</a>
        </div>
      </li>

      <li><a href="#">Insights</a></li>
      <li class="more_menu dropdown">
        <a href="javascript:void(0)" class="dropbtn">More</a>
        <div class="more_menu-content dropdown-content">
            <a href="#">Save</a>
            <a href="#">Hidden</a>
            <a href="#">Reminder</a>
        </div>
      </li>  
  </ul>

<!-- Moderator Notices View -->

<div class="close_btn">
    <img src="../images/close_btn.svg" alt="" srcset="">
</div>


<div class="right_side">

    <div class="top_side">

          <img src="../images/Profile.svg" alt="" srcset="">
          <p>A.A.N.Madhusanka</p>

    </div>
    <div class="bottom_side">

          <div class="left_box">
            <h2>Insights</h2>

            <h4>Approve <span>40</span> </h4>
                <ul>
                    <li>News <span>20 </span> </li>
                    <li>Advertisements <span>20 </span> </li>
                </ul>

                <h4>Complaints <span>05</span> </h4>
                <ul>
                    <li>News <span>05</span> </li>
                </ul>

                <h4>Precentage of news' Complaints <span>12.5%</span> </h4>
                
                <h4>Black Stars <span><img src="../images/black_star.svg" alt="" srcset=""></span> </h4>

          </div>

    </div>

</div>
    
</body>
</html>