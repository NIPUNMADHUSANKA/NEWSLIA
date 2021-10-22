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
    <link rel="stylesheet" href="../css/error.css">
    <link rel="stylesheet" href="../css/main_home.css">
    <link rel="shortcut icon" type = "image/x-icon" href = "../images/logo.ico">
</head>

<style>
  body {
  overflow: hidden; /* Hide scrollbars */
  }
  .error_body{
    color:#333;
  }

  .data{
      border:none;
      background-color:#EBEAEA;dxcx
      border-radius: 5px;
      color:#444;
      padding:0.5rem;
      margin-right:3px;
      text-align:center;
      margin-bottom:5px;
  }

  .data_edit{
      border:none;
      background-color:#ACE0B8;
      border-radius: 5px;
      color:#444;
      padding:0.5rem;
      margin-right:3px;
      text-align:center;
      transition: .5s ease;
  }

  .data_edit:hover{
      transform:scale(1.2);
      cursor:pointer;
  }
.moderate_area_title{
    padding-left: -1rem;
}
table, th, td {
  vertical-align: top;
}

.tit{
  font-size:1rem;
  padding:0;
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
            <p><?php   echo $_SESSION['FName']." ".$_SESSION['LName']; ?> <img src="../images/Drop-down.svg" alt="" srcset="" class="down"> </p>
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

<!-- Moderator Page Content -->
<div class="content">

        <div class="content_left">
          <h1>Welcome to the NEWSLIA's <br> Moderator Interface</h1>
              
          <div class="moderate_info">
              <table class="moderator_details">

                  <tr class="moderate_area">
                    <td class="moderate_area_title tit">Moderating Area</td>
                    <td>
                        <?php
                          include '../Model/connect.php';
                          $system_actor_id = $_SESSION['System_Actor_ID'];
                          $moderating_area_sql = "SELECT * FROM moderate_area WHERE (System_Actor_Id = '$system_actor_id') ";
                          
                          $moderating_area_statement = $conn -> query($moderating_area_sql);
                          $moderating_area_results = $moderating_area_statement->fetchAll(PDO::FETCH_ASSOC);

                          if($moderating_area_results){
                            
                            foreach($moderating_area_results as $moderating_area_result){
                                $_SESSION['moderate_area'] = $moderating_area_result['Area'];
                                echo "<button class='data'>".$moderating_area_result['Area']."</button>";
                            
                            }
                          }
                        ?>

                        <button class="data_edit">Edit</button>

                    </td>
                  </tr>

                  <tr class="reading_area">
                    <td class="reading_area_title tit">Reading Area</td>
                    <td>
                    <?php
                          include '../Model/connect.php';
                          $system_actor_id = $_SESSION['System_Actor_ID'];
                          $reading_area_sql = "SELECT * FROM read_area WHERE (System_Actor_Id = '$system_actor_id') ";
                          
                          $reading_area_statement = $conn -> query($reading_area_sql);
                          $reading_area_results = $reading_area_statement->fetchAll(PDO::FETCH_ASSOC);

                          if($reading_area_results){
                            
                            foreach($reading_area_results as $reading_area_result){
                                echo "<button class='data'>".$reading_area_result['Area']."</button>";
                            
                            }
                          }
                        ?>

                        <button class="data_edit">Edit</button>
                    </td>
                  </tr>

                  <tr class="reading_type">
                    <td class="reading_post_type tit">View Posts Type</td>
                    <td>
                      <?php
                          include '../Model/connect.php';
                          $system_actor_id = $_SESSION['System_Actor_ID'];
                          $reading_type_sql = "SELECT * FROM post_type WHERE (System_Actor_Id = '$system_actor_id') ";
                          
                          $reading_type_statement = $conn -> query($reading_type_sql);
                          $reading_type_results = $reading_type_statement->fetchAll(PDO::FETCH_ASSOC);

                          if($reading_type_results){
                            
                            foreach($reading_type_results as $reading_type_result){
                                if ($reading_type_result['News'] == 1){
                                  echo "<button class='data'>News</button>";
                                }
                                if ($reading_type_result['Article'] == 1){
                                  echo "<button class='data'>Articles</button>";
                                }
                                if ($reading_type_result['Notice'] == 1){
                                  echo "<button class='data'>Notices</button>";
                                }
                                if ($reading_type_result['Job_Vacancies'] == 1){
                                  echo "<button class='data'>Job Vacancies</button>";
                                }
                                if ($reading_type_result['Com_Ads'] == 1){
                                  echo "<button class='data'>Advertisements</button>";
                                }
                            }
                          }
                        ?>

                        <button class="data_edit">Edit</button>
                     


                    </td>
                  </tr>

              </table>
          </div>
         
              

        </div>

        <div class="content_right">
            <img src="../images/background.svg" alt="" srcset="">
        </div>

  </div>


  
  <div class="errorbox active" id="error2">
  <div class="content_erro">
       <div class="error_head">NEWSLIA says</div>
       <div class="error_body">Welcome to the Moderator HomePage.</div>
       <div class="error_foot" onclick="moderator_login()">OK</div>

  </div>
</div>


<script>
    function moderator_login(){
      document.getElementById("error2").classList.remove("active");
    } 
</script>
    
</body>
</html>