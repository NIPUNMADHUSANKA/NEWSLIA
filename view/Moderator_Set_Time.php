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
</head>

<style>
  body {
    overflow-x: hidden; /* Hide scrollbars */
  }
  
  .post_sort{
      padding-left:80px;
  }
  .box-container{
    height: 290px;
  }

  .more{
      font-size:14px;
      text-align:right;
      margin-top:-14%;
      display:flex;
      flex-direction:row;
      
  }
  .more p{
    margin-left:5%;
  }

  .setting_close{
    transform:scale(2);
    margin-left:78%;
    margin-top :-7%;
  }
  .setting_close img{
    padding-right:5px;
    cursor: pointer;
  }

  .update_btn{
      border: none;
      width:5rem;
      margin-top:0.5rem;
      transition: 0.25s ease;
      box-shadow: none;
  }

  .update_btn:hover{
    box-shadow: 1px 1px 5px 1px rgba(0, 0, 0, 0.25);
    transform:scale(1.07);
  
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

<?php $page = 'publish';
  include 'nav.php'; ?>

<!--End of Navigation-Bar-->



<!-- Moderator Notices View -->
<div class="content_posts_view">
    <div class="posts_content_view_head">
        Set Time Posts
    </div>

    <div class="post_sort">
        <div class="post_sort_bar">
          <button onclick="showsort()" class="drop_area_sort">Select Post Type<img src="../images/sort.svg" alt="" srcset=""></button>
          <div class="drop_area_sort_cont" id="sortdrop">
            <img src="../images/search.svg" alt="" srcset="">
            <input type="text" id="myInput" onkeyup="filterFunction()" placeholder="Search...">
            <a href="#">Notices</a>
            <a href="#">Job Vacancies</a>
            <a href="#">Commercial Ads</a>
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
            include '../Model/connect.php';
            $Moderator_Area = $_SESSION['moderate_area'];

            
//Notices
      $pending_post_sql = "SELECT * FROM notices_pending";
      $pending_post_statement = $conn -> query($pending_post_sql);
      $pending_post_results = $pending_post_statement->fetchAll(PDO::FETCH_ASSOC);

      if($pending_post_results){
        foreach($pending_post_results as $pending_post_result){
            $Post_ID = $pending_post_result['Post_ID'];
                  
            $flag = 0;
            $Area = array();
            $y=0;

            $post_from_sql = "SELECT * FROM post_area WHERE Post_ID='$Post_ID'";
            $post_from_state = $conn->query($post_from_sql);
            $post_from_results = $post_from_state->fetchAll(PDO::FETCH_ASSOC);

            if($post_from_results){
                foreach($post_from_results as $post_from_result){
                  if($post_from_result['Area'] == $Moderator_Area){
                      $flag = 1;
                  }
                  $Area[$y] = $post_from_result['Area'];
                  $y++;
                }
            }
                  
            if($flag == 1){
                $img = $pending_post_result['Image'];
                $img = base64_encode($img);
                $text = pathinfo($pending_post_result['Post_ID'], PATHINFO_EXTENSION);

                $Creator_ID = $pending_post_result['Creator_ID'];
                $Title = $pending_post_result['Title'];
                $Publish_Date = $pending_post_result['Publish Date'];
                $Publish_Time = $pending_post_result['Publish Time'];

                echo "
                  <div class='box-container'>
                      <div class='box_head'>
                        
                        <img src='data:image/".$text.";base64,".$img."'/>
                        
                        <div class='tag'>
                            <div class='tag_text'>Notices</div>
                        </div>

                        

                      </div>

                      <div class='box_body'>
                        <h3>".$Title."</h3>";
                      
                          echo "<p><b><i>-</i>";
                            foreach ($Area as $value) {
                                echo "<i>".$value." - ";
                                echo "</i>";
                            } 
                          echo "</b></p>";

                          $save_who_sql = "SELECT * FROM system_actor WHERE System_Actor_Id='$Creator_ID'";
                          $save_who_state = $conn->query($save_who_sql);
                          $save_who_results = $save_who_state->fetchAll(PDO::FETCH_ASSOC);

                          if($save_who_results){
                            foreach($save_who_results as $save_who_result){
                              echo "<p>".$save_who_result['FirstName']." ".$save_who_result['LastName']."</p>";    
                            }
                          }

                          echo "<p>".$Publish_Date." ".$Publish_Time."</p>";
                            
                          echo "<div class='setting_close'>
                              <ul style='list-style:none;'>
                                <li onclick=toggle_view_Ads('$Post_ID','Notices');><a href='#'><img src='../images/Check.svg'></a></li>
                            </ul>
                          </div>";
                            
                          echo "</div>
                          </div>";
                  }   
              }
            }





//Job Vacancies
      $pending_post_sql = "SELECT * FROM job_vacancies_pending";
      $pending_post_statement = $conn -> query($pending_post_sql);
      $pending_post_results = $pending_post_statement->fetchAll(PDO::FETCH_ASSOC);

      if($pending_post_results){
        foreach($pending_post_results as $pending_post_result){
            $Post_ID = $pending_post_result['Post_ID'];
                  
            $flag = 0;
            $Area = array();
            $y=0;

            $post_from_sql = "SELECT * FROM post_area WHERE Post_ID='$Post_ID'";
            $post_from_state = $conn->query($post_from_sql);
            $post_from_results = $post_from_state->fetchAll(PDO::FETCH_ASSOC);

            if($post_from_results){
                foreach($post_from_results as $post_from_result){
                  if($post_from_result['Area'] == $Moderator_Area){
                      $flag = 1;
                  }
                  $Area[$y] = $post_from_result['Area'];
                  $y++;
                }
            }
                  
            if($flag == 1){
                $img = $pending_post_result['Image'];
                $img = base64_encode($img);
                $text = pathinfo($pending_post_result['Post_ID'], PATHINFO_EXTENSION);

                $Creator_ID = $pending_post_result['Creator_ID'];
                $Title = $pending_post_result['Position'];
                $Company = $pending_post_result['Company'];
                $Publish_Date = $pending_post_result['Set_Date'];
                $Publish_Time = $pending_post_result['Set_Time'];
                
                echo "
                  <div class='box-container'>
                      <div class='box_head'>
                        
                        <img src='data:image/".$text.";base64,".$img."'/>
                        
                        <div class='tag'>
                            <div class='tag_text'>Vacancies</div>
                        </div>

                        

                      </div>

                      <div class='box_body'>
                        <h3>".$Title." (".$Company.")</h3>";
                      
                          echo "<p><b><i>-</i>";
                            foreach ($Area as $value) {
                                echo "<i>".$value." - ";
                                echo "</i>";
                            } 
                          echo "</b></p>";

                          $save_who_sql = "SELECT * FROM system_actor WHERE System_Actor_Id='$Creator_ID'";
                          $save_who_state = $conn->query($save_who_sql);
                          $save_who_results = $save_who_state->fetchAll(PDO::FETCH_ASSOC);

                          if($save_who_results){
                            foreach($save_who_results as $save_who_result){
                              echo "<p>".$save_who_result['FirstName']." ".$save_who_result['LastName']."</p>";    
                            }
                          }

                          echo "<p>".$Publish_Date." ".$Publish_Time."</p>";
                            
                          echo "<div class='setting_close'>
                              <ul style='list-style:none;'>
                                <li onclick=toggle_view_Ads('$Post_ID','Vacancies');><a href='#'><img src='../images/Check.svg'></a></li>
                              </ul>
                          </div>";
                            
                          echo "</div>
                          </div>";
                  }   
              }
            }




//Com. Advertisment
        $pending_post_sql = "SELECT * FROM com_ads_pending";
        $pending_post_statement = $conn -> query($pending_post_sql);
        $pending_post_results = $pending_post_statement->fetchAll(PDO::FETCH_ASSOC);

        if($pending_post_results){
          foreach($pending_post_results as $pending_post_result){
              $Post_ID = $pending_post_result['Post_ID'];
                    
              $flag = 0;
              $Area = array();
              $y=0;

              $post_from_sql = "SELECT * FROM post_area WHERE Post_ID='$Post_ID'";
              $post_from_state = $conn->query($post_from_sql);
              $post_from_results = $post_from_state->fetchAll(PDO::FETCH_ASSOC);

              if($post_from_results){
                  foreach($post_from_results as $post_from_result){
                    if($post_from_result['Area'] == $Moderator_Area){
                        $flag = 1;
                    }
                    $Area[$y] = $post_from_result['Area'];
                    $y++;
                  }
              }
                    
              if($flag == 1){
                  $img = $pending_post_result['Image'];
                  $img = base64_encode($img);
                  $text = pathinfo($pending_post_result['Post_ID'], PATHINFO_EXTENSION);

                  $Creator_ID = $pending_post_result['Creator_ID'];
                  $Title = $pending_post_result['Title'];
                  $Publish_Date = $pending_post_result['Set_Date'];
                  $Publish_Time = $pending_post_result['Set_Time'];
                  
                  echo "
                    <div class='box-container'>
                        <div class='box_head'>
                          
                          <img src='data:image/".$text.";base64,".$img."'/>
                          
                          <div class='tag'>
                              <div class='tag_text'>Ads</div>
                          </div>

                          <div class='middle'>
                              <div class='view_btn'>
                                   <ul>
                                      <li onclick=toggle_view('$Post_ID');><a href='#'>View</a></li>
                                   </ul>   
                               </div>  
                          </div>
                          

                        </div>

                        <div class='box_body'>
                          <h3>".$Title."</h3>";
                        
                            echo "<p><b><i>-</i>";
                              foreach ($Area as $value) {
                                  echo "<i>".$value." - ";
                                  echo "</i>";
                              } 
                            echo "</b></p>";

                            $save_who_sql = "SELECT * FROM system_actor WHERE System_Actor_Id='$Creator_ID'";
                            $save_who_state = $conn->query($save_who_sql);
                            $save_who_results = $save_who_state->fetchAll(PDO::FETCH_ASSOC);

                            if($save_who_results){
                              foreach($save_who_results as $save_who_result){
                                echo "<p>".$save_who_result['FirstName']." ".$save_who_result['LastName']."</p>";    
                              }
                            }

                            echo "<p>".$Publish_Date." ".$Publish_Time."</p>
                                  <p>2022:01:01
                                  00:00</p>";

                            echo "<div class='setting_close'>
                              <img src='../images/Setting.svg' onclick='togglePopup()'>
                              <img src='../images/Close.svg'>
                            </div>";
                              
                            echo "</div>
                            </div>";
                    }   
                }
              }
                


          ?>
         

          
    </div>

    
</div>



<!--create popup window-->


<div class="popup" id="popup-1">

      <div class="overlay"></div>

      <div class="content">
          <div class="close-btn" onclick="togglePopup()">&times;</div>


          <div class="content_body">
              <div class="popup_logo">
                   <img src="../images/Name.svg" alt="" srcset="">
              </div>
              <hr>

              <div class="popup_form">
                  <h3 class="popup_title">Update Publish Date & Time</h3>
                  <form action="" method="post">

                     <label for="update-date" class="lbl">Date</label>
                  
                     <input type="date" name="" id="update-date" class="inp" required value="2022-01-01">
                     <br>
                     <br>

                     <label for="update-time" class="lbl">Time</label>
                     
                     <input type="time" name="" id="update-time" class="inp" required value="00:00">
                     <br>
                     <br>

                     <button type="submit" name ="login" class="update_btn" value="LOGIN">Update</button>
              
                   </form>
               </div>

          </div>
      </div>
      
</div>







<script>
    function showsort() {
      document.getElementById("sortdrop").classList.toggle("show");
    }

    function togglePopup(){
      document.getElementById("popup-1").classList.toggle("active");
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