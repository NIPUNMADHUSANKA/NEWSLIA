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
          <p><?php echo $_SESSION['FName']." ".$_SESSION['LName']; ?> <img src="../images/Drop-down.svg" alt="" srcset="" class="down"> </p>
            <ul class="profile_menu">
              <li><a href="Moderator_Profile.php"> <img src="../images/other/profile.png" alt="" srcset=""> My Profile</a></li>
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
          <a href="#">Save</a>
          <a href="#">Hidden</a>
          <a href="#">Reminder</a>
      </div>
    </li>  
</ul>

<!-- Moderator Notices View -->


<div class="left_side">

  <div class="icon_left_side">

  <li><a href="Moderator_Profile.php"><img src="../images/other/profile.png" alt="" srcset=""><p>My Profile</p></a></li>
  <li><a href="Moderate_Area.php"><img src="../images/other/location.png" alt="" srcset=""><p style="color: #45ADA8EB;">Select Area</p></a></li>
  <li><a href="Moderate_Post_Type.php"><img src="../images/other/type.png" alt="" srcset=""><p>Select Type</p></a></li>
  <li><a href="Moderator_Insight.php"><img src="../images/other/insights.png" alt="" srcset=""><p>Insights</p></a></li>
  <li><a href="#"><img src="../images/other/deactivate.png" alt="" srcset=""><p>Deactivate</p></a></li>
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

<div class="right_side">

    
    <div class="bottom_side">
        
        <div class="first_box">
            <h2>Reading Area</h2>

            <div class="first_box_area">

                    <?php
                        include '../Model/connect.php';
                        $read_province_area_sql = "SELECT * FROM dsa ORDER BY DSA ASC";
                      
                        $read_province_area_statement = $conn -> query($read_province_area_sql);
                        $read_province_area_results = $read_province_area_statement->fetchAll(PDO::FETCH_ASSOC);

                        if($read_province_area_results){
                                
                          $i = 350;
                          foreach($read_province_area_results as $read_province_area_result){
                            
                            echo " <input type='checkbox' id='".$i."' value='' name='dsa' disabled class='moderator_read_radio'> 
                            <label for='".$i."'>".$read_province_area_result['DSA']."</label>
                            <br>";
                            
                            $i = $i +1;  
                          }
                    }
                    ?>

            </div>

                <div class="btn_set">
                    <button class="edit_btn_set" onclick="remove_read_disable()">Edit</button>
                    <br>
                    <button class="save_btn_set">Save</button>
               </div>

        </div>

        <div class="second_box">
            <h2>Moderating Area</h2>

            <div class="second_box_area">
                <?php
                    include '../Model/connect.php';
                    $moderate_area_sql = "SELECT * FROM dsa ORDER BY DSA ASC";
                   
                    $moderate_area_statement = $conn -> query($moderate_area_sql);
                    $moderate_area_results = $moderate_area_statement->fetchAll(PDO::FETCH_ASSOC);

                    if($moderate_area_results){
                            
                      $i = 1;
                      foreach($moderate_area_results as $moderate_area_result){


                        $system_actor_id = $_SESSION['System_Actor_ID'];
                        
                        $moderate_area_check_sql = "SELECT * FROM moderate_area WHERE (System_Actor_Id = '$system_actor_id') ";
                        $moderate_area_check_statement = $conn -> query($moderate_area_check_sql);
                        $moderate_area_check_results = $moderate_area_check_statement->fetchAll(PDO::FETCH_ASSOC);

                        if($moderate_area_check_results){
                          foreach($moderate_area_check_results as $moderate_area_check_result){
                            if($moderate_area_check_result['Area'] == $moderate_area_result['DSA']){
                              echo " <input type='radio' id='".$i."' value='' name='dsa' disabled class='moderator_radio' checked> 
                              <label for='".$i."'>".$moderate_area_result['DSA']."</label>
                              <br>";
                            }
                            else{
                              echo " <input type='radio' id='".$i."' value='' name='dsa' disabled class='moderator_radio'> 
                              <label for='".$i."'>".$moderate_area_result['DSA']."</label>
                              <br>";
                            }

                          }
                        }
                        $i = $i +1;   
                      }
                }
                ?>

            </div>  

            <div class="btn_set">
                <button class="edit_btn_set" onclick="remove_disable()">Edit</button>
                <br>
                <button class="save_btn_set">Save</button>
            </div>


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