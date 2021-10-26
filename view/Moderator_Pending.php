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

  .box_head:hover img{
    opacity: 1;
  }

  .setting_close{
    transform:scale(1.2);
    margin-left:87%;
    margin-top :-7%;
  }
  .setting_close img{
    transition: 0.25s ease;
    cursor: pointer;
  }
  .setting_close img:hover{
    transform:scale(1.2);
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
        Pending Posts
    </div>

      <div class="post_sort">
        <div class="post_sort_bar">
          <button onclick="showsort()" class="drop_area_sort">Select Post Type<img src="../images/sort.svg" alt="" srcset=""></button>
          <div class="drop_area_sort_cont" id="sortdrop">
            <img src="../images/search.svg" alt="" srcset="">
            <input type="text" id="myInput" onkeyup="filterFunction()" placeholder="Search...">
            <a href="#">News</a>
            <a href="#">Articles</a>
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
                    <img src="../images/pending/powercut.jpg" alt="">
                  </div>

                  <div class="box_body">
                    <h3>Power Cut</h3>
                    <p>Electricity Board - Negombo</p>
                  </div>

                  <div class="more">
                    <p>2022:01:17</p>
                  </div>

                  <div class="setting_close">
                     <img src="../images/Check.svg" alt="" srcset="" onclick="window.open('Moderator_Check_News.php','_self')">
                  </div>
          </div>

          <div class="box-container">
                      <div class="box_head">
                      <img src="../images/pending/kandy_perehera.jpg" alt="">
                    </div>

                    <div class="box_body">
                      <h3>Kandy Perahera</h3>
                      <p>Amith Malsanka</p>
                    </div>

                    <div class="setting_close">
                       <img src="../images/Check.svg" alt="" srcset="" onclick="window.open('Moderator_Check_Articles.php','_self')">
                    </div>
          </div>


          <div class="box-container">
              <div class="box_head">
                <img src="../images/pending/cafe_shop.jpg" alt="">
              </div>

              <div class="box_body">
                <h3>Candy Cafe</h3>
                <p>Candy Cafe Team</p>
              </div>

              <div class="more">
                  <p>2022:01:17</p>
                  <p>00:00</p>
              </div>

              <div class="setting_close">
                 <img src="../images/Check.svg" alt="" srcset="" onclick="window.open('Moderator_Check_Ads.php','_self')">
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

</script>
    
</body>
</html>