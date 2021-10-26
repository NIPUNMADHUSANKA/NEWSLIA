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
    <link rel="stylesheet" href="../css/calendar.css">
    <link rel="stylesheet" href="../css/popup.css">
    <link rel="shortcut icon" type = "image/x-icon" href = "../images/logo.ico">
    <script src="https://kit.fontawesome.com/c119b7fc61.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <script src="app.js"></script>
</head>

<style>
  body {
    /*overflow-x: hidden; /* Hide scrollbars */
  }
  .post_sort{
      padding-left:80px;
  }
  .box-container{
    height: 240px;
  }
  .popular_famous_container{
    height: 300px;
  }

  .posts_content_view_head{
    font-size:x-large;
    margin-left:-1rem;
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
    margin-left:6rem; 
  }
  .right_side{
    margin-right:7rem;
  }

 .arrow:hover{
  cursor: pointer;
 }
  
 .vie{
    margin-left:1rem;
 }

.drop_area_sort_cont{
  margin-left:-2rem;
}

.pop_more{
  margin-top: 1rem;
}

.popular_famous{
    margin-left:-2rem;
}
.poupular_famous{
    width:23%;
    height:25%;
    padding-bottom:1rem;
    margin-left:-3rem;
}

.poupular_famous:hover{
    transform:scale(1);
}
.popular_famous_middel{
    margin-top:-7rem;
    margin-left:0rem;
}
.box_head:hover img{
    opacity: 1;
  }
.box_head:hover .picture{
    opacity: 0.3;
  }
.popular{
      margin-left:-1rem;
 }
.popular_title{
    margin-left:-4rem;
}

.news_type{
  margin-left:3rem;
}

.body_information{
    margin-left:-3rem;
    margin-top:-1rem;
}

.normal_box{
  margin-left:3rem;
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
        News
    </div>
</div>


<div class="posts_content_view_body popular_famous">

    <div class="popular_famous_info">
    
        <div class="title">Most Recent</div>
         
    
          <div class="box-container poupular_famous">
              <div class="box_head">
                <img src="../images/save/exam.jpg" alt="" class="picture">
              
                <div class="middle popular_famous_middel">
                     <div class="right_side arrow"><img src="../images/Right.svg" alt="" srcset=""></div>
                     <div class="view_btn" onclick="window.open('./Moderator_Read_News.php', '_self')">View</div>
                     <div class="left_side arrow"><img src="../images/Left.svg" alt="" srcset=""></div>
                    
                </div>

              </div>
              <div class="box_body">
                <h3>Exam Results</h3>
                <p>2021-10-25</p>
                <p>Samith Dilshan</p>
              </div>

              <div class="more">
                <img src="../images/More.svg" alt="" srcset="" class="pop_more">
                <ul class ="more_post">
                  
                      <li><a href="#">Save</a></li>
                      <li><a href="#">Hidden</a></li>
                      <li onclick="set_time_to_publish_Popup()"><a href="#">Reminder</a></li>
          
              </ul>
              </div>
          </div>

          <div class="title popular_title">Most Popular</div>
          <div class="box-container poupular_famous popular">
              <div class="box_head">
                <img src="../images/save/exam.jpg" alt="" class="picture">
              
                <div class="middle popular_famous_middel">
                     <div class="right_side arrow"><img src="../images/Right.svg" alt="" srcset=""></div>
                     <div class="view_btn" onclick="window.open('./Moderator_Read_News.php', '_self')">View</div>
                     <div class="left_side arrow"><img src="../images/Left.svg" alt="" srcset=""></div>
                    
                </div>

              </div>
              <div class="box_body">
                <h3>Exam Results</h3>
                <p>2021-10-25</p>
                <p>Samith Dilshan</p>
              </div>

              <div class="more">
                <img src="../images/More.svg" alt="" srcset="" class="pop_more">
                <ul class ="more_post">
                  
                      <li><a href="#">Save</a></li>
                      <li><a href="#">Hidden</a></li>
                      <li onclick="set_time_to_publish_Popup()"><a href="#">Reminder</a></li>
                
              </ul>
              </div>

              

          </div>















<div class="main" style="margin-left:-2rem;">

<!-- (B) PERIOD SELECTOR -->
<div id="calPeriod">
  
  <?php
  // (B1) MONTH SELECTOR
  // NOTE: DEFAULT TO CURRENT SERVER MONTH YEAR
  $months = [
    1 => "January", 2 => "Febuary", 3 => "March", 4 => "April",
    5 => "May", 6 => "June", 7 => "July", 8 => "August",
    9 => "September", 10 => "October", 11 => "November", 12 => "December"
  ];
  $monthNow = date("m");
  echo "<select id='calmonth'>";
  foreach ($months as $m=>$mth) {
    printf("<option value='%s'%s>%s</option>",
      $m, $m==$monthNow?" selected":"", $mth
    );
  }
  echo "</select>";

  // (B2) YEAR SELECTOR
  echo "<input type='number' id='calyear' value='".date("Y")."'/>";
?>

</div>

<!-- (C) CALENDAR WRAPPER -->
<div id="calwrap">
</div>



</div>
















































    </div>

</div>



<br>
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


      <div class="post_sort news_type">
        <div class="post_sort_bar">
          <button onclick="show_news_sort()" class="drop_area_sort">Select News Type<img src="../images/sort.svg" alt="" srcset=""></button>
          <div class="drop_area_sort_cont" id="sort_news_drop">
            <img src="../images/search.svg" alt="" srcset="">
            <input type="text" id="myInput" onkeyup="filterFunction()" placeholder="Search...">
            <a href="#">Political</a>
            <a href="#">Crime</a>
            <a href="#">Investigative</a>
            <a href="#">Arts</a>
            <a href="#">Entertainment</a>
            <a href="#">Education</a>
            <a href="#">Sports</a>
            <a href="#">Environment</a>
            <a href="#">Other</a>
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
                <img src="../images/save/exam.jpg" alt="" class="picture">
              
                <div class="middle">
                <div class="view_btn" onclick="window.open('./Moderator_Read_News.php', '_self')">View</div>
                </div>

              </div>
              <div class="box_body">
                <h3>Exam Results</h3>
                <p>2021-10-25</p>
                <p>Samith Dilshan</p>
              </div>

              <div class="more">
                <img src="../images/More.svg" alt="" srcset="">
                <ul class ="more_post">
                  
                      <li><a href="#">Save</a></li>
                      <li><a href="#">Hidden</a></li>
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
                    <div class="publish_btn" onclick="window.open('Moderator_View_News.php','_self')">Set</div>
              
                   </form>
               </div>

          </div>
      </div>
      
</div>



<script>

    function set_time_to_publish_Popup(){
      document.getElementById("popup-8").classList.toggle("active");
    } 

    function showsort() {
      document.getElementById("sortdrop").classList.toggle("show");
    }

    function show_news_sort() {
      document.getElementById("sort_news_drop").classList.toggle("show");
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

<script src="../js/calendar.js"></script>
    
</body>
</html>