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
    height: 240px;
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



</style>

<body>

  
<!--navigation-->

<?php $page = 'view';
  include 'nav.php'; ?>

<!--End of Navigation-Bar-->


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
         
          <div class="box-container normal_box">
              <div class="box_head">
                <img src="../images/save/blood.jpg" alt="">
              
                <div class="middle">
                     <div class="view_btn" onclick="window.open('./Moderator_read_notice.php', '_self')">View</div>
                </div>

              </div>
              <div class="box_body">
                <h3>Blood Donation</h3>
                <p>2021-10-15</p>
                <p>Nilu Perera</p>
              </div>

              <div class="more">
                <img src="../images/More.svg" alt="" srcset="">
                <ul class ="more_post">
                  
                      <li><a href="#">Save</a></li>
                      <li><a href="#">Hide</a></li>
                      <li onclick="set_time_to_publish_Popup()"><a href="#">Reminder</a></li>
          
              </ul>
              </div>
          </div>

         


          
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