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
                <li><a href="#"> <img src="../images/other/profile.svg" alt="" srcset=""> My Profile</a></li>
                <li><a href="#"><img src="../images/other/location.svg" alt="" srcset="">Select Area</a></li>
                <li><a href="#"><img src="../images/other/type.svg" alt="" srcset="">Select Type</a></li>
                <li><a href="#"><img src="../images/other/insights.svg" alt="" srcset="">Insights</a></li>
                <li><a href="#"><img src="../images/other/deactivate.svg" alt="" srcset="">Deactivate</a></li>
                <li><a href="#"><img src="../images/other/logout.svg" alt="" srcset="">Log Out</a></li>
            </ul>
        </div>

  </div>
  
  <ul class="menu">
      <li><a href="#">Home</a></li>
      <li class="view dropdown">
        <a href="javascript:void(0)" class="dropbtn">View</a>
        <div class="view-content dropdown-content">
            <a href="#">News</a>
            <a href="#">Articles</a>
            <a href="#">Notices</a>
            <a href="#">job vacancies</a>
            <a href="#">Commercial Ads</a>
        </div>
      </li>

      <li class="publish dropdown">
        <a href="javascript:void(0)" class="dropbtn">Publish</a>
        <div class="publish-content dropdown-content">
            <a href="#">Pending</a>
            <a href="#">Set Time</a>
        </div>
      </li>

      <li class="imporatnt dropdown">
        <a href="javascript:void(0)" class="dropbtn">Important Contacts</a>
        <div class="important-content dropdown-content">
            <a href="#">View Contact Numbers</a>
            <a href="#">Edit Contact Numbers</a>
        </div>
      </li>

      <li><a href="#">Insights</a></li>
      <li class="more dropdown">
        <a href="javascript:void(0)" class="dropbtn">More</a>
        <div class="more-content dropdown-content">
            <a href="#">Save</a>
            <a href="#">Hidden</a>
            <a href="#">Reminder</a>
        </div>
      </li>
  </ul>

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
                <img src="../images/sethma.jpeg" alt="">
              
                <div class="middle">
                     <div class="view_btn">View</div>
                </div>

              </div>
              <div class="box_body">
                <h3>New Year</h3>
                <p>Create By</p>
              </div>

              <div class="more">
                  <p>2022:01:17</p>
                  <p>14:24</p>
              </div>

              <div class="setting_close">
              <img src="../images/Setting.svg" alt="" srcset="" onclick="togglePopup()">
                  <img src="../images/Close.svg" alt="" srcset="">
              
              </div>

          </div>

          <div class="box-container">
              <div class="box_head">
                <img src="../images/sethma.jpeg" alt="">
              
                <div class="middle">
                     <div class="view_btn">View</div>
                </div>

              </div>
              <div class="box_body">
                <h3>Childrens' Day</h3>
                <p>Create By</p>
              </div>

              <div class="more">
                  <p>2022:01:17</p>
                  <p>14:24</p>
              </div>

              <div class="setting_close">
              <img src="../images/Setting.svg" alt="" srcset="" onclick="togglePopup()">
                  <img src="../images/Close.svg" alt="" srcset="">
              
              </div>

          </div>


          <div class="box-container">
              <div class="box_head">
                <img src="../images/sethma.jpeg" alt="">
              
                <div class="middle">
                     <div class="view_btn">View</div>
                </div>

              </div>
              <div class="box_body">
                <h3>Mothers' Day</h3>
                <p>Create By</p>
              </div>  

              <div class="more">
                  <p>2022:01:17</p>
                  <p>14:24</p>
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
                  
                     <input type="date" name="" id="update-date" class="inp">
                     <br>
                     <br>

                     <label for="update-time" class="lbl">Time</label>
                     
                     <input type="time" name="" id="update-time" class="inp">
                     <br>

                     <div class="update_btn">Update</div>
              
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