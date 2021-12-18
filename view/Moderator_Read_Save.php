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
    <link rel="stylesheet" href="../css/popup.css">
    <link rel="shortcut icon" type = "image/x-icon" href = "../images/logo.ico">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<style>
  body {
    overflow: hidden; /* Hide scrollbars */
  }
  .box_head:hover img{
    opacity: 1;
  } 
  .post_sort{
      padding-left:80px;
  }
  .box-container{
    height: 270px;
  }

  .more{
      font-size:14px;
      text-align:right;
      margin-top:-12%;
      display:flex;
      flex-direction:row;
      
  }
  .more p{
    margin-left:5%;
  }


  .setting_close{
    transform:scale(1.5);
    margin-left:78%;
    margin-top :-5%;
  }
  .setting_close img{
    padding-right:5px;
    cursor: pointer;
  }

  .box-container:hover{
    transform: scale(1.6);
  }

  .box-container{
    transform: scale(1.6);
    margin-top: 5rem;
    margin-left: 1.8rem;
  }

  .box_body h3{
      font-size:0.9rem;
  }

  .box_body p{
      font-size:0.65rem;
  }

  .box-read{
    width:800px;
    height:400px;
    margin-top:-1rem;
    overflow: hidden;
    overflow-y:scroll;
    margin-left:30rem;
  }

  .box-read h2{
    font-size:1.8rem;
    font-weight:normal;
    color:#222;
  }

  .box-read p{
    font-weight:normal;
    font-size:1rem;
    padding:1rem;
    text-align:justify;
    color:#555;
    letter-spacing:1.8px;
    line-height:30px;
  }

  .button-set{
    margin-top:-13rem;
    margin-left:5rem;
    display:flex;
    flex-direction:row;
  }

  .view_btn{
    width:100px;
    height:20px;
    margin-top:20%;
    margin-left:15rem;
    box-shadow: 1px 1px 5px 1px rgba(0, 0, 0, 0.4);
    transition: 0.5s ease;
  }

  .view_btn:hover{
    transform:scale(1.2);
  }

  .update_btn{
    color:#222;
    margin-top:15rem;
  }

  .back_btn{
    margin-top:15.2rem;
    background-color:#ADD8E6;
    margin-left:40rem;
    color:#222;
  }

  .publish_btn{
    background-color: #ACE0B8;;
    color: #444;
    font-weight: 500;
    font-size: 16px;
    padding: 10px 20px;
    text-align: center;
    border-radius: 5px;
    box-shadow: 1px 1px 5px 1px rgba(0, 0, 0, 0.25);
    cursor: pointer;
    width: 50px;
    margin-top: 20px;
    margin-left: 5rem;
  }


  .remove_btn{
   margin-top:15.2rem;
   background-color:#FF4444;
   margin-left:3rem;
   color:#222;
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

  .popup_smart .popup_smart_content{
    width:290px;
    height: 260px;
  }

  .inp1{
    margin-left:-0.5rem;
  }

  .update_btn{
    text-align:center;
  }

  .img_set{
      margin-top:15.5rem;
      transform: scale(1.4);
      padding-left:2rem;   
  }

  .img_set img{
    cursor: pointer;
  }

  .btn_set_option{
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }
  .select_option{
      background:#ACE0B8;
      margin-bottom:0.5rem;
      padding: 1rem;
      width:12.5rem;
      color:#444;
      font-weight:10px;
      letter-spacing:1px;
      transition: 0.5s ease;
      cursor: pointer;
  }

  .select_option:hover{
    transform:scale(1.1);
  }

  .posts_content_view_body{
  margin-top:3rem;
}

</style>

<body>
 
<!--navigation-->

<?php $page = 'more';
  include 'nav.php'; ?>

<!--End of Navigation-Bar-->



<!-- Moderator Notices View -->

<?php
    include '../Model/connect.php';

    $Post_ID = $_SESSION['SAVE_READ_Post_ID'];
    $Post_Type = $_SESSION['SAVE_READ_TYPE'];

    if($Post_Type == "NEWS"){
      $save_read_sql = "SELECT * FROM news WHERE Post_ID='$Post_ID'";
    }
    else if($Post_Type == "ARTICLES"){
      $save_read_sql = "SELECT * FROM articles WHERE Post_ID='$Post_ID'";
    }
    else if($Post_Type == "NOTICES"){
      $save_read_sql = "SELECT * FROM notices WHERE Post_ID='$Post_ID'";
    }
    else if($Post_Type == "VACANCIES"){
       $save_read_sql = "SELECT * FROM job_vacancies WHERE Post_ID='$Post_ID'";
    }
    else if($Post_Type == "C.ADS"){
       $save_read_sql = "SELECT * FROM com_ads WHERE Post_ID='$Post_ID'";
    }


    $save_read_state = $conn->query($save_read_sql);
    $save_read_results = $save_read_state->fetchAll(PDO::FETCH_ASSOC);

    if($save_read_results){
        foreach($save_read_results as $save_read_result){
            $_SESSION['Title'] = $save_read_result['Title'];
            
            if($Post_Type == "VACANCIES"){
              $_SESSION['PD_Date'] = $save_read_result['Deadline_Date'];
            }
            else{
              $_SESSION['PD_Date'] = $save_read_result['Publish_Date'];
            }

            $_SESSION['Img'] = $save_read_result['Image'];
            $_SESSION['Details'] = $save_read_result['Details'];
            $_SESSION['Creator_Id'] = $save_read_result['Creator_ID'];
        }
    }

    $Creator_ID = $_SESSION['Creator_Id'];
    $save_who_sql = "SELECT * FROM system_actor WHERE System_Actor_Id='$Creator_ID'";
    $save_who_state = $conn->query($save_who_sql);
    $save_who_results = $save_who_state->fetchAll(PDO::FETCH_ASSOC);

    if($save_who_results){
        foreach($save_who_results as $save_who_result){
            $_SESSION['FirstName'] = $save_who_result['FirstName'];
            $_SESSION['LastName'] = $save_who_result['LastName'];    
        }
    }

    $img = $_SESSION['Img'];
    $img = base64_encode($img);
    $text = pathinfo($Post_ID, PATHINFO_EXTENSION);



?>



<?php

$Post_Type = $_SESSION['SAVE_READ_TYPE'];

    if($Post_Type == "NEWS"){
        echo "<div class='rate' style='text-align: center; width: 5%; background-color: #ACE0B8;border:1px solid #333;height:27rem;margin-left:2rem;margin-top:5rem;'>
        
        <div><a href='#' style='color: black;margin-top:5rem;'>
              <i class='fas fa-chevron-up fa-3x'></i></a>
        </div>
              
              <h2 style='color: black;margin-top:8rem;'>246</h2>
        
        <div style='padding-top:8rem;'><a href='#' style='color: black;margin-top:15rem;'>
              <i class='fas fa-chevron-down fa-3x'></i></a>
        </div>
    </div>";
    }

?>

<div class="posts_content_view_body">

    <?php

      $Post_Type = $_SESSION['SAVE_READ_TYPE'];

      if($Post_Type == "NEWS"){
            echo "<div class='body_information' style='margin-top:-32.5rem;margin-left:1rem;'>";
      }
      else{
            echo "<div class='body_information' style='margin-top:1rem;margin-left:1rem;'>";
      }
  ?>
          <div class="box-container">

              <div class="box_head">
                  <?php echo "<img src='data:image/".$text.";base64,".$img."'/>";?>
              </div>

              <div class="box_body">
                <h3><?php echo $_SESSION['Title']; ?></h3>
                <p><?php echo $_SESSION['PD_Date']; ?></p>

                <?php
                    $Post_ID = $_SESSION['SAVE_READ_Post_ID'];
                    $save_from_sql = "SELECT * FROM post_area WHERE Post_ID='$Post_ID'";
                    $save_from_state = $conn->query($save_from_sql);
                    $save_from_results = $save_from_state->fetchAll(PDO::FETCH_ASSOC);

                    if($save_from_results){
                        echo "<h6><b><i>-</b></i>";
                        foreach($save_from_results as $save_from_result){
                           echo "<i>".$save_from_result['Area']." - ";
                           echo "</i>";
                         }
                         echo "</h6>";
                     }
                ?>

                <p><?php echo $_SESSION['FirstName']; echo " "; echo $_SESSION['LastName']; ?></p>
              </div>

            <div class="more" style="width: 14%; margin-bottom: 20px;">
            <img src="../images/More.svg" alt="" srcset="" style="transform: none;margin-top:0rem;width:7px;margin-left:2rem;">
            <ul class="more_post" style="margin-top:0rem;margin-left:2.5rem;">

            <?php
               $Post_ID = $_SESSION['SAVE_READ_Post_ID'];
               $Post_Type = $_SESSION['SAVE_READ_TYPE'];
              echo "<li onclick=toggle_unsave('$Post_ID');><a href='#'>Unsave</a></li>
                    <li onclick=toggle_hidden('$Post_ID','$Post_Type');><a href='#'>Hide</a></li>";
            ?>
              
            </ul>
          </div>

          </div>

          <div class="box-read" style="margin-top:-2rem;margin-left:1rem;">
             <h2><?php echo $_SESSION['Title']; ?></h2>
             <p><?php echo $_SESSION['Details']; ?></p>
          </div>
    </div>

    <div class="button-set">
        <div class="view_btn back_btn" onclick="window.open('./Moderator_Save.php', '_self')">Back</div>
    </div>
</div>


<script>
    function toggle_unsave(SAVE_ID){
      $.ajax({
        url :"../Control/save_hidden.php",
        type:"POST",
        cache:false,
        data:{SAVE_ID:SAVE_ID},
        success:function(data){
          window.open('./Moderator_Read_save.php','_self');
        }

      });
    }

    function toggle_hidden(HIDDEN_ID,TYPE){
      $.ajax({
        url :"../Control/save_hidden.php",
        type:"POST",
        data:{
          HIDDEN_ID: HIDDEN_ID,
          TYPE: TYPE
        },
        success:function(data){
          window.open('./Moderator_Read_save.php','_self');
        }
      });
    }
</script>











</body>
</html>