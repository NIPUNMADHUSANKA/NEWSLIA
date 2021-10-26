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
    <link rel="shortcut icon" type = "image/x-icon" href = "../images/logo.ico">
</head>

<style>
  body {
    overflow-x: hidden; /* Hide scrollbars */
  }
  .box_head:hover img{
    opacity: 1;
  }

  
.box-container{
    height: 250px;
  }

  .box_head img{
    height:50%;
  }
  .setting_close{
    transform:scale(1.2);
    margin-left:78%;
    margin-top :-12%;
  }
  .setting_close img{
    padding-right:5px;
    cursor: pointer;
  }
</style>

<body>


<!--navigation-->

<?php $page = 'important';
  include 'nav.php'; ?>

<!--End of Navigation-Bar-->

  




<!-- Moderator Important Number View -->
<div class="content_posts_view">
    <div class="posts_content_view_head">
        Important Contact Numbers
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
        
    </div>
      
</div>

<div class="posts_content_view_body">

    <div class="body_information">
         
        <?php

        include '../Model/connect.php';

        $USERID = $_SESSION['System_Actor_ID'];
        
        $read_area_sql = "SELECT * FROM read_area WHERE (System_Actor_Id = '$USERID')";

        $read_area_state = $conn->query($read_area_sql);
        $read_area_results = $read_area_state->fetchAll(PDO::FETCH_ASSOC);

        if($read_area_results){
          foreach($read_area_results as $read_area_result){
                      
                      $R_Area = $read_area_result['Area']; 

                      $import_sql = "SELECT * FROM important_number WHERE (Area = '$R_Area')";

                      $import_state = $conn->query($import_sql);
                      $import_results = $import_state->fetchAll(PDO::FETCH_ASSOC);
              
                      if($import_results){
                        foreach($import_results as $import_result){
                          $img = $import_result['Image'];
                          $img = base64_encode($img);
                          $ext = pathinfo($import_result['Contact_ID'], PATHINFO_EXTENSION);
                          
                          
                          echo "<div class='box-container'>";
                          echo "<div class='box_head'>";
                          echo "<img src='data:image/".$ext.";base64,".$img."'/>"; 
                          echo "</div>";
                          echo "<div class='box_body'>";
                          echo "<h3>".$import_result['Title']."</h3>"; 
              
                          $CID = $import_result['Contact_ID'];
                          $importnum_sql = "SELECT * FROM important_number_list WHERE (Contact_ID = '$CID')";
                          $importnum_state = $conn->query($importnum_sql);
                          $importnum_results = $importnum_state->fetchAll(PDO::FETCH_ASSOC);
              
                          if($importnum_results){
                              foreach($importnum_results as $importnum_result){
                                echo "<p>".$importnum_result['Number']."</p>";
                              }}
              
                          echo "</div>";
                          echo "</div>";
              
                        }
                      }
              

          }
        }

        

       
       


            
        ?>






          
    </div>

    
</div>




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