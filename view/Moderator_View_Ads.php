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
  .popular_famous_container{
    height: 330px;
  }

  .drop_area_sort{
    margin-left: -2vw;
  }

  .popular_famous_middel {
    display: flex;
    flex-direction: row;
    justify-content: right;
    margin-top: -7.5rem;
    margin-left: 0.5rem;
  }

  .left_side{
    padding-left:9rem;
    cursor: pointer;
  }
  .right_side{
    padding-right:9rem;
    cursor: pointer;
  }
  .right_side:hover{
    opacity: 1;

  }
  .left_side:hover{
    opacity: 1;
  }
  
.drop_area_sort_cont{
  margin-left:-2rem;
}

.pop_more{
  margin-top: 1rem;
}

.body_information{
      margin-left:-3rem;
       margin-top:-1rem;
       /*padding: 1.2vw; */     
}

.normal_box{
  margin-left:3rem;
  height:260px;
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
    Commercial Advertisements
    </div>
</div>


<div class="posts_content_view_body popular_famous">

    <div class="popular_famous_info">
    
    <div class="title">Most Recent</div>
         
    
          <div class="box-container popular_famous_container">
              <div class="box_head">
                <img src="../images/save/cake.jpg" alt="">
              
                <div class="middle popular_famous_middel">
                     <div class="right_side"><img src="../images/Right.svg" alt="" srcset=""></div>
                     <div class="view_btn">View</div>
                     <div class="left_side"><img src="../images/Left.svg" alt="" srcset=""></div>
                    
                </div>

              </div>
              <div class="box_body">
                <h3>Cake Shop</h3>
                <p>2021-02-20</p>
                <p>Nishal Kumara</p>
                
              </div>

              <div class="more">
                <img src="../images/More.svg" alt="" srcset="" class="pop_more">
                <ul class ="more_post">
                  
                      <li><a href="#">Save</a></li>
                      <li><a href="#">Hidden</a></li>
          
              </ul>
              </div>
          </div>

          <div class="title">Most Popular</div>
          <div class="box-container popular_famous_container">
              <div class="box_head">
                <img src="../images/save/cake.jpg" alt="">
              
                <div class="middle popular_famous_middel">
                     <div class="right_side"><img src="../images/Right.svg" alt="" srcset=""></div>
                     <div class="view_btn">View</div>
                     <div class="left_side"><img src="../images/Left.svg" alt="" srcset=""></div>
                    
                </div>

              </div>
              <div class="box_body">
                <h3>Cake Shop</h3>
                <p>2021-02-20</p>
                <p>Nishal Kumara</p>
              </div>

              <div class="more">
                <img src="../images/More.svg" alt="" srcset="" class="pop_more">
                <ul class ="more_post">
                  
                      <li><a href="#">Save</a></li>
                      <li><a href="#">Hidden</a></li>
                
              </ul>
              </div>

              

          </div>

    </div>

    
</div>

<hr>
<div class="content_posts_view">

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
                <img src="../images/pending/cafe_shop.jpg" alt="">
              
                <div class="middle">
                     <div class="view_btn" onclick="window.open('./Moderator_Read_ads.php', '_self')">View</div>
                </div>

              </div>
              <div class="box_body">
                <h3>Candy Cafe</h3>
                <p>2021-10-24</p>
                <p>Candy Cafe Team</p>
              </div>

              <div class="more">
                <img src="../images/More.svg" alt="" srcset="">
                <ul class ="more_post">
                  
                      <li><a href="#">Save</a></li>
                      <li><a href="#">Hidden</a></li>
          
              </ul>
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