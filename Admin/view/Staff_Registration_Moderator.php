<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator_Home</title>
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/moderator.css">
    <link rel="stylesheet" href="../css/search.css">
    <link rel="stylesheet" href="../css/insight.css">
    <link rel="stylesheet" href="../css/System Staff Registration Confirm.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" type = "image/x-icon" href = "../images/logo.ico">
</head>
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
            <p>H.M.M.Mandashini <img src="../images/Drop-down.svg" alt="" srcset="" class="down"> </p>
            <ul class="profile_menu">
                <li><a href="#"> <img src="../images/other/profile.svg" alt="" srcset=""> My Profile</a></li>
                <li><a href="#"><img src="../images/other/location.svg" alt="" srcset="">Select Area</a></li>
                <li><a href="#"><img src="../images/other/type.svg" alt="" srcset="">Select Type</a></li>
                <li><a href="#"><img src="../images/other/insights.svg" alt="" srcset="">Insights</a></li>
                <li><a href="#"><img src="../images/other/deactivate.svg" alt="" srcset="">Deactivate</a></li>
                <li><a href="#"><img src="../images/other/logout.svg" alt="" srcset="">Log Out</a></li>
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
        <a href="javascript:void(0)" class="dropbtn">INSIGHTS</a>
        <div class="publish-content dropdown-content">
            <a href="#">Reporter</a>
            <a href="#">Moderator</a>
        </div>
      </li>

      <li><a href="#">Complaints</a></li>
      <li><a href="#">BLACKLIST</a></li>

      <li class="imporatnt dropdown">
        <a href="javascript:void(0)" class="dropbtn">USER MANAGEMENT</a>
        <div class="important-content dropdown-content">
            <a href="#">User Details</a>
            <a href="#">Reporter Details</a>
            <a href="#">Moderator Details</a>
        </div>
      </li>

      <li class="publish dropdown">
        <a href="javascript:void(0)" class="dropbtn">STAFF REGISTRATION</a>
        <div class="publish-content dropdown-content" style="width:15rem;">
            <a href="#">Moderator</a>
            <a href="#">Administrator</a>
        </div>
      </li>

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
<div class="content_posts_view">
    <div class="posts_content_view_head">
        Moderators
    </div>

      <div class="post_sort">
        <div class="post_sort_bar">
          <button onclick="showsort()" class="drop_area_sort">Select Area<img src="../images/sort.svg" alt="" srcset=""></button>
          <div class="drop_area_sort_cont" id="sortdrop">
            <img src="../images/search.svg" alt="" srcset="">
            <input type="text" id="myInput" onkeyup="filterFunction()" placeholder="Search...">
            <a href="#">Gampaha</a>
            <a href="#">Minuwangoda</a>
            <a href="#">Negombo</a>
          </div>
        </div>
      </div>
      
     
    <form action="" class="search-bar">
	     <input type="search" name="search" pattern=".*\S.*" required>
	     <button class="search-btn" type="submit">
		       <span>Search</span>
	     </button>
    </form>
    
</div>


<div class="reporter_insight">

        <?php
          include '../model/connect.php';
          
          $staff_state_sql = "SELECT * FROM login WHERE Staff_State = '0'";
          $staff_state_statement = $conn -> query($staff_state_sql);
          $staff_state_results = $staff_state_statement->fetchAll(PDO::FETCH_ASSOC);
        
          if($staff_state_results){
              foreach($staff_state_results as $staff_state_result){

                $ID = $staff_state_result['System_Actor_ID'];
                $email = $staff_state_result['Email'];

                $staff_state_actor_sql = "SELECT * FROM system_actor WHERE System_Actor_Id = '$ID' AND 	Position = 'M'";
                $staff_state_actor_statement = $conn -> query($staff_state_actor_sql);
                $staff_state_actor_results = $staff_state_actor_statement->fetchAll(PDO::FETCH_ASSOC);

                if($staff_state_actor_results){
                  foreach($staff_state_actor_results as $staff_state_actor_result){

                            echo "
                            <form action = './Staff_Registration_Moderator.php' method = 'POST'>
                                <input type='hidden' name='staffId' value='".$staff_state_actor_result['System_Actor_Id']."'>
                                <input type='hidden' name='staffemail' value='".$email."'>
                            <button class='card' name='moderator'>
                            <div class='content'>
                              <div class='imgBx'>
                              <img src='../images/Profile.svg' alt='' srcset='' style='transform:scale(1);'>
                              </div>
                              <h2>".$staff_state_actor_result['FirstName'].""."  "."".$staff_state_actor_result['LastName']."</h2>
                            </div>
                            </button> 
                            </form>";
                  }
                }
                
              }
          }

           
        
        ?>


</div>


<?php
  if(isset($_POST['moderator'])){

    $_SESSION['STAFF_MEMBER'] = $_POST['staffId'];
    
    $_SESSION['STAFF_MEMBER_EMAIL'] = $_POST['staffemail'];

    //$ID = $_SESSION['STAFF_MEMBER'];

    //echo '<script>alert(work)</script>';
    //echo '<script>alert("'.$ID.'")</script>';
    echo '<script type="text/javascript">window.open("./System Staff Registration Confirm.php", "_self");</script>';
  }
?>




<script>
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
    
</body>
</html>