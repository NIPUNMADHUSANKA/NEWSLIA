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
    height: 100px;
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

  .popup .content{
    height: 270px;
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

</style>

<body>

  
<!--navigation-->

<?php $page = 'view';
  include 'nav.php'; ?>

<!--End of Navigation-Bar-->

<!-- Moderator Notices View -->
<div class="content_posts_view">
    <div class="posts_content_view_head">
        Reports
    </div>    
</div>


<div class="posts_content_view_body">

    <div class="body_information">
         
        <?php

            $Catogory = ["Power Cut","Water Cut","Samurdhi Payment","Curfew","Blood Donation","vaccination Program"];
            $Area = [];
            
            $USERID = $_SESSION['System_Actor_ID'];

            $from_sql = "SELECT * FROM read_area WHERE System_Actor_Id ='$USERID'";
            $from_state = $conn->query($from_sql);
            $from_results = $from_state->fetchAll(PDO::FETCH_ASSOC);

            if($from_results){
                $i = 0;
                foreach($from_results as $from_result){
                    $Area[$i] = $from_result['Area'];
                    $i++;
                }
            }

            foreach($Area as $item){
  

                foreach($Catogory as $type_cat){

                    $Number = 0;
                    // Notice
                    $post_count_sql = "SELECT count(DISTINCT notices.Post_ID) as PI FROM post_area INNER JOIN notices ON post_area.Post_ID = notices.Post_ID WHERE post_area.Area = '$item' AND notices.Title LIKE '%$type_cat%'";
                  
                    $post_count_state = $conn->query($post_count_sql);
                    $post_count_results = $post_count_state->fetchAll(PDO::FETCH_ASSOC);
                

                    if($post_count_results){
                        foreach($post_count_results as $post_count_result){
                            $Number = $Number + $post_count_result['PI'];
                        }
                    }


                     // News
                     $post_count_sql = "SELECT count(DISTINCT news.Post_ID) as PI FROM post_area INNER JOIN news ON post_area.Post_ID = news.Post_ID WHERE post_area.Area = '$item' AND news.Title LIKE '%$type_cat%'";
                  
                     $post_count_state = $conn->query($post_count_sql);
                     $post_count_results = $post_count_state->fetchAll(PDO::FETCH_ASSOC);
                 
 
                     if($post_count_results){
                         foreach($post_count_results as $post_count_result){
                             $Number = $Number + $post_count_result['PI'];
                         }
                     }

                    echo "<div class='box-container'>
                                   
                                    
                    <div class='box_body'>
                          <h3 style='color:#888;'>".$item." </h3>
                          <h2 style='color:#888;'><center>".$Number."</center></h2>
                          <h3 style='color:#888; text-transform: capitalize;'>".$type_cat."</h3>
                          
                          
                          
                   </div>
                    </div>";


                }
                
            }


                          
        ?>
          
    </div>
</div>




<script>
    

    function toggle_reminder(Reminder_post_ID,Type){

      const xhttp = new XMLHttpRequest();
      xhttp.onload = function(){
        document.getElementById("reminder_ID").value = Reminder_post_ID;
        document.getElementById("reminder_Type").value = Type;
      }
      xhttp.open("GET",Reminder_post_ID,Type);
      xhttp.send(); 
      document.getElementById("popup-8").classList.add("active");

    }


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