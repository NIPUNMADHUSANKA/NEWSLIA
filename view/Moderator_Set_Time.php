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
    transform:scale(1.5);
    margin-left:78%;
    margin-top :-5%;
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
         
          <div class="box-container">
              <div class="box_head">
                <img src="../images/settime/newyear.jpg" alt="">
              
                <div class="middle">
                     <div class="view_btn" onclick="window.open('./Moderator_set_read.php', '_self')">View</div>
                </div>

              </div>
              <div class="box_body">
                <h3>New Year</h3>
                <p>ABC Company</p>
              </div>

              <div class="more">
                  <p>2022:01:01</p>
                  <p>00:00</p>
              </div>

              <div class="setting_close">
                  <img src="../images/Setting.svg" alt="" srcset="" onclick="togglePopup()">
                  <img src="../images/Close.svg" alt="" srcset="">
              
              </div>

          </div>

         

          
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