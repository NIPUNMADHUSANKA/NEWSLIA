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

  .posts_content_view_head{
    font-size:xx-large;
  }
  .right_side{
      margin-top:0rem;
      margin-left:1.7rem;
  }

  .first_box_area{
    height:250px;
   }

.second_box_area{
    height:250px;
}



.topic {
        position: relative;
        width: 300px;
        height: 23px;
        left: 86px;
        margin-top: 30px;
        font-family: Roboto;
        font-style: normal;
        font-weight: bold;
        font-size: 20px;
        line-height: 23px;
    }


    .arealist {
        position: relative;
        width: 30%;
        padding: 20px;
        margin: auto;
        height: 250px;
        overflow-y: scroll;
    }

    .arealist input {
        float: right;
    }


    .arealist h4 {
        font-size: 15px;
        position: relative;
        left: -20px;
    }

    .arealist h5 {
        font-size: 13px;
        color: #433D3D;
        position: relative;
        left: -7px;

    }

    .arealist li {
        display: list-item;
        list-style: inside;
        list-style-type: decimal;
        margin-top: 10px;
        font-size: 13px;
    }

    .btn_set{
      margin-top:-23rem;
      margin-left:75rem;
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
  <li><a href="Moderate_Post_Type.php"><img src="../images/other/type.png" alt="" srcset=""><p style="color: #45ADA8EB;">Select Type</p></a></li>
  <li><a href="Moderator_Insight.php"><img src="../images/other/insights.png" alt="" srcset=""><p>Insights</p></a></li>
  <li onclick="togglePopup_select_option('deactivate-1')"><a href="#"><img src="../images/other/deactivate.png" alt="" srcset=""><p>Deactivate</p></a></li>
  <li><a href="logout.php"><img src="../images/other/logout.png" alt="" srcset=""><p>Log Out</p></a></li>

  </div>


</div>


<div class="column2">

<div class="prof_img">
  <img src="../images/Profile.svg" style="margin-top:-2rem;">
  <br>
  <h3>Nipun Madhusanka</h3>

  <hr style="margin-top: 50px;margin-left:2rem;">
</div>


            <div class="topic">
                            <h3>Select Posts Type</h3>
                        </div>


                        <div class="arealist">
                            <input type="checkbox"><label>
                                <h4>News</h4>
                            </label>
                            <ol>
                                <li><input type="checkbox"><label>Political</label></li>
                                <li><input type="checkbox"><label>Crime</label></li>
                                <li><input type="checkbox"><label>Investigative</label></li>
                                <li><input type="checkbox"><label>Arts</label></li>
                                <li><input type="checkbox"><label>Entertainment</label></li>
                                <li><input type="checkbox"><label>Education</label></li>
                                <li><input type="checkbox"><label>Sports</label></li>
                                <li><input type="checkbox"><label>Environment</label></li>
                            </ol>

                            <br>
                            <input type="checkbox"><label>
                                <h4>Articles</h4>
                            </label>
                            
                            <br>

                            <input type="checkbox"><label>
                                <h4>Notices</h4>
                            </label>
                            <br>
                            <input type="checkbox"><label>
                                <h4>Job Vacancies</h4>
                            </label>

                            <br>
                            <input type="checkbox"><label>
                                <h4>Commercial Advertisements</h4>
                            </label>

                        </div>

                        



            </div>
            <div class="btn_set">
                <button class="edit_btn_set" onclick="remove_disable()">Edit</button>
                <br>
                <button class="save_btn_set">Save</button>
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