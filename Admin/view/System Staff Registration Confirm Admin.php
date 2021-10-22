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


<div class="body_form">

  </div>

  <div class="main_title"><h3>ADMINISTRATOR REGISTRATION</h3></div>
  <div class="form_1">


        <div class="title_"><h3>Personal Information</h3><br></div>
        

        <?php
            echo "<form action='./System Staff Registration Confirm Admin.php' method='post'>";
            include '../model/connect.php';
            $ID = $_SESSION['STAFF_ADMIN_MEMBER'];
            $email = $_SESSION['STAFF_ADMIN_MEMBER_EMAIL'];

            $staff_admin_sql = "SELECT * FROM system_actor WHERE System_Actor_Id = '$ID'";
            $staff_admin_statement = $conn -> query($staff_admin_sql);
            $staff_admin_results = $staff_admin_statement->fetchAll(PDO::FETCH_ASSOC);

            if($staff_admin_results){
              foreach($staff_admin_results as $staff_admin_result){
                
                $DSA = $staff_admin_result['DSA'];

                $staff_dsa_sql = "SELECT * FROM dsa WHERE DSA = '$DSA'";
                $staff_dsa_statement = $conn -> query($staff_dsa_sql);
                $staff_dsa_results = $staff_dsa_statement->fetchAll(PDO::FETCH_ASSOC);

                if($staff_dsa_results){
                  foreach($staff_dsa_results as $staff_dsa_result){
                    $_SESSION['province_Admin'] = $staff_dsa_result['Province'];
                    $_SESSION['district_Admin'] = $staff_dsa_result['District'];
                    
                  }
                }

              $province =  $_SESSION['province_Admin'];
              $district =  $_SESSION['district_Admin'];
            
              echo "
              <label for='fname' class='label'>First name</label>
              <input type='text' id='fname' name='moderator_fname' value= '".$staff_admin_result['FirstName']."' class='input_fields' disabled>

              
              <label for='lname' class='label'>Last name</label>
              <input type='text' id='lname' name='moderator_lname' value='".$staff_admin_result['LastName']."' class='input_fields' disabled><br><br>

              <label for='Email' class='label'>Email Address</label>
              <input type='email' id='Email' name='moderator_email' value='".$email."' class='input_fields' disabled>

              <label for='Mobile' class='label'>Mobile Number</label>
              <input type='text' id='Mobile' name='moderator_mobile' value='".$staff_admin_result['Mobile']."' class='input_fields' disabled> <br><br>

              <label for= 'NIC' class='label'>NIC Number</label>
              <input type='text' id='NIC' name='moderator_NIC' value='".$staff_admin_result['NIC']."' class='input_fields' disabled><br><br>

              
              <label for='province' class='label'>Province</label>
              <input type='text' id='province' name='moderator_province' value='".$province."' class='input_fields' disabled>


              <label for='distict' class='label'>District</label>
              <input type='text' id='distict' name='moderator_district' value='".$district."' class='input_fields' disabled>


              <label for='dsa' class='label'>Divisional Secretariat Area</label>
              <input type='text' id='dsa' name='moderator_dsa' value='".$staff_admin_result['DSA']."' class='input_fields' disabled><br><br>

              ";
            
              }
            }
         ?>


       
</div>
    
  <div class="buttons">
      <button class="accept_button" name = "accept">Accept</button>
      
      <button class="reject_button" name = "reject">Reject</button>
  </div>

  </form>


  <?php

  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    if(isset($_POST['accept'])){
      include '../model/connect.php';
      $email = $_SESSION['STAFF_ADMIN_MEMBER_EMAIL'];
      $first = $_POST['moderator_fname'];

     
    $sql = "UPDATE login
            SET Staff_State = '1'
            WHERE Email = '$email'";
    
    $statement = $conn->prepare($sql);
    

    if ($statement->execute()) {

      //the subject
      $sub = "Registration Confirmation Email";
      //the message
      $msg = "Dear Sir/Madam,

      Thank you for completing your registration with the Administrator.

      This email serves as a confirmation that your account is activated and that you are officially a part of the NEWSLIA family.
      Enjoy!

      Regards,
      The NEWSLIA team.
      ";

      //send email
      $send_result = mail($email,$sub,$msg);

      echo '<script type="text/javascript">window.open("./Staff_Registration_Admin.php", "_self");</script>';
    }
  }


    /*if($send_result){
      echo '<script>alert("work")</script>';
    }
    else{
      echo '<script>alert("Not work")</script>';
    }*/

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    if(isset($_POST['reject'])){
      include '../model/connect.php';
      $ID = $_SESSION['STAFF_ADMIN_MEMBER'];

     
    $sql = "DELETE FROM system_actor WHERE System_Actor_Id = '$ID'";
    
    $statement = $conn->prepare($sql);
    

    if ($statement->execute()) {
      echo '<script type="text/javascript">window.open("./Staff_Registration_Admin.php", "_self");</script>';
    }
    }

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  ?>

</body>
</html>