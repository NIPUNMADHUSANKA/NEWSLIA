<?php
  session_start();
  date_default_timezone_set("Asia/Calcutta");
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
    overflow-x: hidden; /* Hide scrollbars */
  }
  
  .post_sort{
      padding-left:80px;
  }
  .box-container{
    height: 310px;
    margin-left:1rem;
  }

  .posts_content_view_head{
    font-size:x-large;

  }

.body_information{
  margin-left:-3rem;
  margin-top:-1rem;
       /*padding: 1.2vw; */     
}

.normal_box{
  margin-left:1rem;
  height:260px;
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

  
  .tag {
      position: absolute;
      top: 1.3%;
      bottom: 0;
      left: 20;
      right: 1%;
      height: 15%;
      width: 30%;
      opacity: 1;
      transition: .5s ease;
      background-color: #ACE0B8;
      cursor: pointer;
      border-radius:0px 0px 0px 20px;
  }
  .box_head:hover .tag{
      opacity: 1;
  } 

  .tag_text{
      color: #555;
      font-weight:bold;
      font-size: 15px;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
  }

  .view_btn ul{
    list-style-type: none;
  }

  .view_btn ul a{
    text-decoration:none;
    color:#333;
  }

</style>

<body>

  
<!--navigation-->

<?php $page = 'view';
  include 'nav.php'; ?>

<!--End of Navigation-Bar-->


<!-- Start Auto Delete Posts -->

<?php
  include '../Model/connect.php';

  $Type = "Notices";
  $System_Date = date("Y-m-d");
  $System_Time = date("H:i:s");

  $post_delete = "SELECT * FROM post_auto_delete WHERE Type='$Type' AND Date <= '$System_Date'";
  $post_delete_state = $conn->query($post_delete);
  $post_delete_results = $post_delete_state->fetchAll(PDO::FETCH_ASSOC);

  if($post_delete_results){
      foreach($post_delete_results as $post_delete_result){
        $flag = 0;
        
        if($post_delete_result['Date'] == $System_Date and $post_delete_result['Time'] < $System_Time){
          $flag = 1;
        }
        elseif($post_delete_result['Date'] < $System_Date){
          $flag = 1; 
        }
        
        if($flag == 1){
          $Post_ID = $post_delete_result['Post_ID'];
          
          /////////////////////////////////////////////////////////////////////////////
          $sql = 'DELETE FROM read_time WHERE Post_ID = :Post_ID';
          
          $statement = $conn->prepare($sql);
          $statement->bindParam(':Post_ID', $Post_ID);
          $statement->execute();

          /////////////////////////////////////////////////////////////////////////////
          $sql = 'DELETE FROM reminder WHERE Post_ID = :Post_ID';
          
          $statement = $conn->prepare($sql);
          $statement->bindParam(':Post_ID', $Post_ID);
          $statement->execute();

          /////////////////////////////////////////////////////////////////////////////
          $sql = 'DELETE FROM hidden WHERE Post_ID = :Post_ID';
          
          $statement = $conn->prepare($sql);
          $statement->bindParam(':Post_ID', $Post_ID);
          $statement->execute();

          /////////////////////////////////////////////////////////////////////////////
          $sql = 'DELETE FROM save WHERE Post_ID = :Post_ID';
          
          $statement = $conn->prepare($sql);
          $statement->bindParam(':Post_ID', $Post_ID);
          $statement->execute();

          /////////////////////////////////////////////////////////////////////////////
          $sql = 'DELETE FROM post_area WHERE Post_ID = :Post_ID';
          
          $statement = $conn->prepare($sql);
          $statement->bindParam(':Post_ID', $Post_ID);
          if($statement->execute()){
            echo $statement_Area->rowCount();
          }

          /////////////////////////////////////////////////////////////////////////////
          $sql = 'DELETE FROM notices WHERE Post_ID = :Post_ID';
          
          $statement = $conn->prepare($sql);
          $statement->bindParam(':Post_ID', $Post_ID);
          $statement->execute();

          /////////////////////////////////////////////////////////////////////////////
          $sql = 'DELETE FROM post_auto_delete WHERE Post_ID = :Post_ID';
          
          $statement = $conn->prepare($sql);
          $statement->bindParam(':Post_ID', $Post_ID);
          $statement->execute();

        }
        
      }
  }
?>

<!-- End Auto Delete Posts -->


<!-- Moderator Notices View -->
<div class="content_posts_view">
    <div class="posts_content_view_head">
        Notices
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


<div class="posts_content_view_body">

    <div class="body_information">
         
        <?php
        
            $table = 'Notices';
            $USERID = $_SESSION['System_Actor_ID'];

  
            $post_area_sql = "SELECT DISTINCT post_area.Post_ID as PI FROM post_area INNER JOIN read_area ON post_area.Area = read_area.Area WHERE post_area.`Post Type` = 'NOTICES' AND read_area.System_Actor_Id = '$USERID' ORDER BY post_area.Post_ID DESC";
            $post_area_state = $conn->query($post_area_sql);
            $post_area_results = $post_area_state->fetchAll(PDO::FETCH_ASSOC);
            
            if($post_area_results){
              foreach($post_area_results as $post_area_result){

                $ID = $post_area_result['PI'];
                      
                $notice_info_sql = "SELECT * FROM notices WHERE Post_ID = '$ID'";                        
                $notice_info_state = $conn->query($notice_info_sql);
                $notice_info_results = $notice_info_state->fetchAll(PDO::FETCH_ASSOC);
                      if($notice_info_results){
                          foreach($notice_info_results as $notice_info_result){

                              $flag = 0;
                              $System_Date = date("Y-m-d");
                              $Set_Date = $notice_info_result['Set_Date'];
                
                              $System_Time = date("H:i:s");
                              $Set_Time = $notice_info_result['Set_Time'];
                              
                              if($Set_Time == NULL and $Set_Date == NULL){
                                $flag = 1;
                              }
                              elseif($System_Date>$Set_Date){
                                $flag = 1;
                              }
                              elseif($System_Date == $Set_Date and $System_Time > $Set_Time){
                                $flag = 1;
                              }

                              $Post_ID = $notice_info_result['Post_ID'];

                              $remove_hidden_info_sql = "SELECT * FROM hidden WHERE Post_ID = '$Post_ID'";                        
                              $remove_hidden_info_state = $conn->query($remove_hidden_info_sql);
                              $remove_hidden_info_results = $remove_hidden_info_state->fetchAll(PDO::FETCH_ASSOC);

                              if($remove_hidden_info_results){
                                $flag = 0;
                              }

                              if($flag == 1){
                              
                              $Type = $table;

                              $img = $notice_info_result['Image'];
                              $img = base64_encode($img);
                              $text = pathinfo($notice_info_result['Post_ID'], PATHINFO_EXTENSION);

                              $TITLE = $notice_info_result['Title'];
                              $P_DATE = $notice_info_result['Publish_Date'];
                              $Creator_ID = $notice_info_result['Creator_ID'];
                                    

                              echo "<div class='box-container'>
                                    <div class='box_head'>
                                      <img src='data:image/".$text.";base64,".$img."'/>
                                      
                                      <div class='tag'>
                                        <div class='tag_text'>".$Type."</div>
                                      </div>
                                      
                                      <div class='middle'>
                                          <div class='view_btn'>
                                              <ul>
                                                  <li onclick=toggle_view('$Post_ID','NOTICES');><a href='#'>View</a></li>
                                              </ul>
                                                      
                                          </div>
                                          
                                      </div>
                                    </div>
                                    
                                    <div class='box_body'>";

                                    /*
                                    $notice_read_time_sql = "SELECT * FROM read_time WHERE Post_ID='$Post_ID'";
                                    $notice_read_time_state = $conn->query($notice_read_time_sql);
                                    $notice_read_time_results = $notice_read_time_state->fetchAll(PDO::FETCH_ASSOC);

                                    if($notice_read_time_results){
                                      foreach($notice_read_time_results as $notice_read_time_result){

                                        $Read_Time = strtotime($notice_read_time_result['Last_Read_Time']);
                                      // $System_Time = strtotime(date("H:i:s"));

                                        /*$CAP = $System_Time - $Read_Time;

                                        /*echo $CAP;
                                        echo "<br>";
                                      echo $System_Time;

                                        /*echo "<i><span style='font-size:13px;color:#888;'>".$notice_read_time_result['Last_Read_Date']." </span>
                                              <span style='font-size:13px; margin-left:1rem;color:#888;'> ".."</span></i>"; 

                                      }
                                    }*/
                                      
                                    echo "<h3>".$TITLE."</h3>";
                                      
                                      
                                    echo "<p>".$P_DATE."</p>";
                                      

                                      $notice_from_sql = "SELECT * FROM post_area WHERE Post_ID='$Post_ID'";
                                      $notice_from_state = $conn->query($notice_from_sql);
                                      $notice_from_results = $notice_from_state->fetchAll(PDO::FETCH_ASSOC);

                                      if($notice_from_results){
                                          echo "<b><i>-</b></i>";
                                        foreach($notice_from_results as $notice_from_result){
                                          echo "<i>".$notice_from_result['Area']." - ";
                                          echo "</i>";
                                        }
                                      }

                                      echo "<br>";
                                    
                                      $notice_who_sql = "SELECT * FROM system_actor WHERE System_Actor_Id='$Creator_ID'";
                                      $notice_who_state = $conn->query($notice_who_sql);
                                      $notice_who_results = $notice_who_state->fetchAll(PDO::FETCH_ASSOC);

                                      if($notice_who_results){
                                        foreach($notice_who_results as $notice_who_result){
                                          echo "<p>".$notice_who_result['FirstName']." ".$notice_who_result['LastName']."</p>";    
                                        }
                                      }

                                    echo "
                                    </div>
                                    <div class='more'>
                                      <img src='../images/More.svg'>
                                      <ul class ='more_post'>
                                        <li onclick=toggle_save('$Post_ID','NOTICES');><a href='#' >Save</a></li>
                                        <li onclick=toggle_hidden('$Post_ID','NOTICES');><a href='#'>Hide</a></li>
                                        <li onclick='set_time_to_publish_Popup()'><a href='#'>Reminder</a></li>
                                      </ul>
                                    </div>
                                  </div>";

                                    }

                                }
                          }
                        
      
              }
            }
                          
        ?>
          
    </div>
</div>







<div class="popup popup_set_time" id="popup-8">

      <div class="overlay"></div>

      <div class="content popup_set_time">
          <div class="close-btn" onclick="set_time_to_publish_Popup()">&times;</div>


          <div class="content_body popup_set_time_body">
              <div class="popup_logo">
                   <img src="../images/Name.svg" alt="" srcset="">
              </div>
              <hr>

              <div class="popup_form">
                  <h3 class="popup_title">Set Time to Reminder</h3>
                  <form action="" method="post">

                  
                    <label for="new-date" class="lbl"> Date</label>
                    <input type="date" name="" id="new-date" class="inp inp1">
                      <br>
                      <br>

                    <label for="new-time" class="lbl"> Time</label>
                  
                    <input type="time" name="" id="new-time" class="inp inp1">
                    <br>
                    <div class="publish_btn" onclick="window.open('Moderator_View_Notices.php','_self')">Set</div>
              
                   </form>
               </div>

          </div>
      </div>
      
</div>



<script>
    
    function toggle_save(save_post_id,Type){
      $.ajax({
        url : '../Control/post_control.php',
        type: "POST",
        data :{save_post_id:save_post_id,
          Type:Type},
        success:function(data){
          window.open("./Moderator_View_Notices.php","_self");
        }
      })

    }

    function toggle_hidden(hidden_post_id,Type){
      $.ajax({
        url : "../Control/post_control.php",
        type :"POST",
        data :{hidden_post_id:hidden_post_id,
          Type:Type},
        success:function(){
          window.open("./Moderator_View_Notices.php","_self");
        }
      })
    }

    function toggle_view(view_post_id,Type){
      $.ajax({
        url : "../Control/post_control.php",
        type :"POST",
        data :{view_post_id:view_post_id,
          Type:Type},
        success:function(){
          window.open("./Moderator_View_Post_Read.php","_self");
        }
      })
    }

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


    function set_time_to_publish_Popup(){
      document.getElementById("popup-8").classList.toggle("active");
    } 

</script>
    
</body>
</html>