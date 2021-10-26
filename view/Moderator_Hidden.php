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
    <link rel="shortcut icon" type = "image/x-icon" href = "../images/logo.ico">
    <script src="https://kit.fontawesome.com/c119b7fc61.js" crossorigin="anonymous"></script>
</head>

<style>
  body {
    overflow-x: hidden; /* Hide scrollbars */
  }
  
.box-container{
    height: 250px;
    margin-left:1rem;
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

  .posts_content_view_head{
    font-size:x-large;

    }

   .posts_content_view_body{
       margin-left:7rem;
       margin-top:2rem;
       padding: 1.2vw;       
   }

</style>

<body>



<!--navigation-->

<?php $page = 'more';
  include 'nav.php'; ?>

<!--End of Navigation-Bar-->





<div class="content_posts_view">
    <div class="posts_content_view_head">
            Hidden Posts
    </div>

      <div class="post_sort" style="margin-left:2rem;">
        <div class="post_sort_bar">
          <button onclick="showsort()" class="drop_area_sort">Select Post Type<img src="../images/sort.svg" alt="" srcset=""></button>
          <div class="drop_area_sort_cont" id="sortdrop">
            <img src="../images/search.svg" alt="" srcset="">
            <input type="text" id="myInput" onkeyup="filterFunction()" placeholder="Search...">
            <a href="#">News</a>
            <a href="#">Articles</a>
            <a href="#">Notices</a>
            <a href="#">Job Vacancies</a>
            <a href="#">Advertisements</a>
          </div>
        </div>
      </div>
      
    
    
</div>





  <div class="posts_content_view_body">

    <div class="body_information">

      <div class="box-container" style="    margin-bottom: 50px; margin-right: 50px;">
        <div class="box_head">
          <img src="../images/save/cake.jpg" alt="">

          <div class="middle">
            <div class="view_btn" onclick="window.open('./Moderator_Hidden_Read.php', '_self')">View</div>
          </div>

        </div>
        <div style="display: flex; justify-content: space-between;">
          <div class="box_body">
            <h3>Cake Shop</h3>
            <p>2021-02-20</p>
            <p>Nishal Kumara</p>



          </div>

          <div style="margin-top: 30px; margin-right: 30px;">
          <img src="../images/Close.svg" alt="" srcset="" style="transform:scale(2);">
          </div>

        </div>
      </div>

      

      
    </div>


  </div>





</body>

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

</html>