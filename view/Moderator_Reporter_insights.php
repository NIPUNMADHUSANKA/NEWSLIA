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
   overflow: hidden; /* Hide scrollbars */
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
    margin-left:3rem;
    border-top:1px solid #333;
    width:95%;
    margin-top:15%;
  }

  .top_side{
    margin-top:-0%;
  }

  .card{
    transition:0.5s ease;
    cursor: pointer;
  }

  .card:hover{
    transform:scale(1.2);
  }

  .card.active {
	height: 260px;
}

.card2{
    margin-left: -4rem;
}

.card3{
  margin-left: 4rem;
}

.card4{
  margin-left:4rem;
}

.close_btn{
    position: flex;
    margin-left:95%;
    margin-top:1%; 
    cursor: pointer;
  }
  .close_btn img{
    width:30px;
  }

  .button-set{
    margin-top:1rem;
    margin-left:74rem;
    position:fixed;
  }

  .view_btn{
    width:100px;
    height:20px;
    margin-top:20%;
    margin-left:15rem;
    margin-right:5rem;
    box-shadow: 1px 1px 5px 1px rgba(0, 0, 0, 0.4);
    transition: 0.5s ease;
    float:right;
    
  }

  .view_btn:hover{
    transform:scale(1.2);
  }

  .back_btn{
    margin-top:15.2rem;
    background-color:#ADD8E6;
    margin-left:3rem;
    color:#222;
   
  }

</style>

<body>



<!--navigation-->

<?php $page = 'insights';
  include 'nav.php'; ?>

<!--End of Navigation-Bar-->



<!-- Moderator Notices View -->

<!--

<div class="left_side">

  <div class="icon_left_side">

  <li><a href="#"> <img src="../images/other/profile.png" alt="" srcset=""><p>My Profile</p></a></li>
  <li><a href="#"><img src="../images/other/location.png" alt="" srcset=""><p>Select Area</p></a></li>
  <li><a href="#"><img src="../images/other/type.png" alt="" srcset=""><p>Select Type</p></a></li>
  <li><a href="#"><img src="../images/other/insights.png" alt="" srcset=""><p>Insights</p></a></li>
  <li><a href="#"><img src="../images/other/deactivate.png" alt="" srcset=""><p>Deactivate</p></a></li>
  <li><a href="#"><img src="../images/other/logout.png" alt="" srcset=""><p>Log Out</p></a></li>



  </div>

</div>
-->

<div class="right_side">

    
    <div class="bottom_side">

          <div class="approvement">

            <div class="card">
                    <div class="content">
                      <h2>20<br/><span>Published</span></h2>
                    </div>
                    <ul class="navigation">
                      <li>
                        <p>News <span>10</span> </p>
                      </li>
                    
                      <li>
                        <p>Notices <span>5</span></p>
                      </li>
                      <li>
                        <p>Job Vacancies <span>2</span></p>
                      </li>
                      <li>
                        <p>Commercial Ads <span>3</span></p>
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
                            <h2><span class="precentage" style="color:#000;font-size:1.5rem;margin-left:-0.5rem;"><b>95%</b></span><br/> <span class="precentage" style="padding-left:1.5rem;">Trust for Publish</span></h2>
                            <br>
                            
                          </div>
                        
                  </div>

          </div>



          <div class="star">
                  <div class="card card4">
                          <div class="content">

                            <h2><span class="precentage" style="color:#000;font-size:1.5rem;margin-left:0.5rem;">
                            <b><img src="../images/black_star.svg" alt="" srcset=""></b></span><br/> <span class="precentage" style="margin-left:0.5rem;">
                            Black Stars</span></h2>

                            <br>
                            
                          </div>
                        
                  </div>

          </div>

          

    </div>

                <div class="button-set">
                    <div class="view_btn back_btn" onclick="window.open('Moderator_Reporter.php','_self')">Back</div>
                </div>

</div>


<div class="top_side">

          <img src="../images/Profile.svg" alt="" srcset="">
          <p>Nimal Kumara</p>

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