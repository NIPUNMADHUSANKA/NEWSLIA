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
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" type = "image/x-icon" href = "../images/logo.ico">
</head>

<style>
  body {
    overflow-x: hidden; /* Hide scrollbars */
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

  .card{
    cursor: pointer;
    transition:0.5s ease;
  }

  .card:hover{
    transform:scale(1.2);
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

  <li><a href="Moderator_Profile.php"><img src="../images/other/profile.png" alt="" srcset=""><p>My Profile</p></a></li>
  <li><a href="Moderate_Area.php"><img src="../images/other/location.png" alt="" srcset=""><p>Select Area</p></a></li>
  <li><a href="Moderate_Post_Type.php"><img src="../images/other/type.png" alt="" srcset=""><p>Select Type</p></a></li>
  <li><a href="Moderator_Insight.php"><img src="../images/other/insights.png" alt="" srcset=""><p style="color: #45ADA8EB;">Insights</p></a></li>
  <li onclick="togglePopup_select_option('deactivate-1')"><a href="#"><img src="../images/other/deactivate.png" alt="" srcset=""><p>Deactivate</p></a></li>
  <li><a href="logout.php"><img src="../images/other/logout.png" alt="" srcset=""><p>Log Out</p></a></li>




  </div>


</div>


<div class="right_side">

    
    <div class="bottom_side">

          <div class="approvement">

            <div class="card">
                    <div class="content">
                      <h2>40<br/><span>Approves</span></h2>
                    </div>
                    <ul class="navigation">
                      <li>
                        <p>News <span>10</span> </p>
                      </li>
                      <li>
                        <p>Articles <span>10</span> </p>
                      </li>
                      <li>
                        <p>Notices <span>5</span></p>
                      </li>
                      <li>
                        <p>Job Vacancies <span>5</span></p>
                      </li>
                      <li>
                        <p>Commercial Ads <span>10</span></p>
                      </li>
                    </ul>
                    <div class="toggle">
                      <i class="fa fa-chevron-down"></i>
                    </div>
            </div>


          </div>

          <div class="complaints">

                <div class="card card2">
                          <div class="content">
                            <h2>02<br/><span>Complaints</span></h2>
                          </div>
                        
                  </div>

          </div>

          <div class="trust">
                  <div class="card card3">
                          <div class="content">
                            <h2><span class="precentage" style="color:#000;font-size:1.5rem"><b>95%</b></span><br/> <span class="precentage">Trust for Approvement</span></h2>
                            <br>
                            
                          </div>
                        
                  </div>

          </div>

    </div>

</div>


<div class="top_side">

          <img src="../images/Profile.svg" alt="" srcset="">
          <p>A.A.N.Madhusanka</p>

</div>


<script>
    const card = document.querySelector(".card");
    const cardToggle = document.querySelector(".toggle");

    cardToggle.onclick = () => {
	      card.classList.toggle("active");
    };
</script>
    
</body>
</html>