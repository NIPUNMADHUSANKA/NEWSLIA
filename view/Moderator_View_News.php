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
    height: 300px;
  }

  .posts_content_view_head{
    font-size:xx-large;
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
    margin-left:7.5rem;
  }
  .right_side{
    margin-right:7rem;
  }
  
.drop_area_sort_cont{
  margin-left:-2rem;
}

.pop_more{
  margin-top: 1rem;
}

.popular_famous{
    margin-left:-15rem;
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

</style>

<body>

  
<div class="heder">
      
      <div class="left">
          <img src="../images/logo.svg" alt="" srcset="">
      </div>

      <div class="center">
          <img src="../images/Name.svg" alt="" srcset="">
      </div>

      <div class="right">
          <img src="../images/Profile.svg" alt="" srcset="">
          <p>A.A.N.Madhusanka <img src="../images/Drop-down.svg" alt="" srcset="" class="down"> </p>
          <ul class="profile_menu">
              <li><a href="#"> <img src="../images/other/profile.png" alt="" srcset=""> My Profile</a></li>
              <li><a href="#"><img src="../images/other/location.png" alt="" srcset="">Select Area</a></li>
              <li><a href="#"><img src="../images/other/type.png" alt="" srcset="">Select Type</a></li>
              <li><a href="Moderator_Insight.php"><img src="../images/other/insights.png" alt="" srcset="">Insights</a></li>
              <li><a href="#"><img src="../images/other/deactivate.png" alt="" srcset="">Deactivate</a></li>
              <li><a href="#"><img src="../images/other/logout.png" alt="" srcset="">Log Out</a></li>
          </ul>
      </div>

</div>

<ul class="menu">
    <li><a href="Moderator_Home.php">Home</a></li>
    <li class="view dropdown">
      <a href="javascript:void(0)" class="dropbtn">View</a>
      <div class="view-content dropdown-content">
          <a href="#">News</a>
          <a href="Moderator_View_Articles .php">Articles</a>
          <a href="Moderator_View_Notices.php">Notices</a>
          <a href="Moderator_View_Jobs.php">job vacancies</a>
          <a href="Moderator_View_Ads.php">Commercial Ads</a>
      </div>
    </li>

    <li class="publish dropdown">
      <a href="javascript:void(0)" class="dropbtn">Publish</a>
      <div class="publish-content dropdown-content">
          <a href="Moderator_Pending.php">Pending</a>
          <a href="Moderator_Set_Time.php">Set Time</a>
      </div>
    </li>

    <li class="imporatnt dropdown">
      <a href="javascript:void(0)" class="dropbtn">Important Contacts</a>
      <div class="important-content dropdown-content">
          <a href="Moderator_Important_View.php">View Contact Numbers</a>
          <a href="Moderator_Manage_ICN.php">Edit Contact Numbers</a>
      </div>
    </li>

    <li><a href="Moderator_Reporter.php">Insights</a></li>
    <li class="more_menu dropdown">
      <a href="javascript:void(0)" class="dropbtn">More</a>
      <div class="more_menu-content dropdown-content">
          <a href="#">Save</a>
          <a href="#">Hidden</a>
          <a href="#">Reminder</a>
      </div>
    </li>  
</ul>


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
                <img src="../images/sethma.jpeg" alt="" class="picture">
              
                <div class="middle popular_famous_middel">
                     <div class="right_side arrow"><img src="../images/Right.svg" alt="" srcset=""></div>
                     <div class="view_btn">View</div>
                     <div class="left_side arrow"><img src="../images/Left.svg" alt="" srcset=""></div>
                    
                </div>

              </div>
              <div class="box_body">
                <h3>News</h3>
                <p>Publish Date</p>
                <p>Create By</p>
              </div>

              <div class="more">
                <img src="../images/More.svg" alt="" srcset="" class="pop_more">
                <ul class ="more_post">
                  
                      <li><a href="#">Save</a></li>
                      <li><a href="#">Hidden</a></li>
                      <li><a href="#">Reminder</a></li>
          
              </ul>
              </div>
          </div>

          <div class="title popular_title">Most Popular</div>
          <div class="box-container poupular_famous popular">
              <div class="box_head">
                <img src="../images/sethma.jpeg" alt="" class="picture">
              
                <div class="middle popular_famous_middel">
                     <div class="right_side arrow"><img src="../images/Right.svg" alt="" srcset=""></div>
                     <div class="view_btn">View</div>
                     <div class="left_side arrow"><img src="../images/Left.svg" alt="" srcset=""></div>
                    
                </div>

              </div>
              <div class="box_body">
                <h3>News</h3>
                <p>Publish Date</p>
                <p>Create By</p>
              </div>

              <div class="more">
                <img src="../images/More.svg" alt="" srcset="" class="pop_more">
                <ul class ="more_post">
                  
                      <li><a href="#">Save</a></li>
                      <li><a href="#">Hidden</a></li>
                      <li><a href="#">Reminder</a></li>
                
              </ul>
              </div>

              

          </div>

    </div>












    <div class="wrapper">

    <div class="container-calendar">
        <h3 id="monthAndYear"></h3>
        
        <div class="button-container-calendar">
         <div class="footer-container-calendar">
          
             <label for="month">Jump To: </label>
             <select id="month" onchange="jump()">
                 <option value=0>Jan</option>
                 <option value=1>Feb</option>
                 <option value=2>Mar</option>
                 <option value=3>Apr</option>
                 <option value=4>May</option>
                 <option value=5>Jun</option>
                 <option value=6>Jul</option>
                 <option value=7>Aug</option>
                 <option value=8>Sep</option>
                 <option value=9>Oct</option>
                 <option value=10>Nov</option>
                 <option value=11>Dec</option>
             </select>
             <select id="year" onchange="jump()"></select>       
       
            
        </div>
         </div>
        <table class="table-calendar" id="calendar" data-lang="en">
            <thead id="thead-month"></thead>
            <tbody id="calendar-body"></tbody>
        </table>
        
       

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
                <img src="../images/sethma.jpeg" alt="" class="picture">
              
                <div class="middle">
                     <div class="view_btn">View</div>
                </div>

              </div>
              <div class="box_body">
                <h3>News</h3>
                <p>Publish Date</p>
                <p>Create By</p>
              </div>

              <div class="more">
                <img src="../images/More.svg" alt="" srcset="">
                <ul class ="more_post">
                  
                      <li><a href="#">Save</a></li>
                      <li><a href="#">Hidden</a></li>
                      <li><a href="#">Reminder</a></li>

          
              </ul>
              </div>
          </div>

          <div class="box-container">
              <div class="box_head">
                <img src="../images/sethma.jpeg" alt="" class="picture">
              
                <div class="middle">
                     <div class="view_btn">View</div>
                </div>

              </div>
              <div class="box_body">
                <h3>News</h3>
                <p>Publish Date</p>
                <p>Create By</p>
              </div>

              <div class="more">
                <img src="../images/More.svg" alt="" srcset="">
                <ul class ="more_post">
                  
                      <li><a href="#">Save</a></li>
                      <li><a href="#">Hidden</a></li>
                      <li><a href="#">Reminder</a></li>
          
              </ul>
              </div>
          </div>


          <div class="box-container">
              <div class="box_head">
                <img src="../images/sethma.jpeg" alt="" class="picture">
              
                <div class="middle">
                     <div class="view_btn">View</div>
                </div>

              </div>
              <div class="box_body">
                <h3>News</h3>
                <p>Publish Date</p>
                <p>Create By</p>
              </div>

              <div class="more">
                <img src="../images/More.svg" alt="" srcset="">
                <ul class ="more_post">
                  
                      <li><a href="#">Save</a></li>
                      <li><a href="#">Hidden</a></li>
                      <li><a href="#">Reminder</a></li>
                
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

<script src="../js/calendar.js"></script>
    
</body>
</html>