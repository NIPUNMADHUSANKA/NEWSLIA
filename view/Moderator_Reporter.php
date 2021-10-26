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
    <link rel="stylesheet" href="../css/insight.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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

  .card{
    transition:0.5s ease;
  }
  .card:hover{
    transform:scale(1.2);
  }

  .imgBx{
    border:1px solid #333;
  }

  .imgBx img{
    
  }


</style>

<body>


<!--navigation-->

<?php $page = 'insights';
  include 'nav.php'; ?>

<!--End of Navigation-Bar-->


<!-- Moderator Notices View -->
<div class="content_posts_view">
    <div class="posts_content_view_head">
        Reporters' Insights
    </div>

      
     
    <form action="" class="search-bar">
	     <input type="search" name="search" pattern=".*\S.*" required>
	     <button class="search-btn" type="submit">
		       <span>Search</span>
	     </button>
    </form>
    
</div>

<div class="reporter_insight">


      

           <div class="card" onclick="window.open('Moderator_Reporter_insights.php','_self')">
                <div class="content">
                  <div class="imgBx">
                    <img src="../images/Profile.svg" alt="" srcset="" style="transform:scale(0.93); width:50px; margin-left:15px;">
                  </div>
                  <h2>Nimal Kumara</h2>
                </div>
            </div>


            <div class="card">
                <div class="content">
                  <div class="imgBx">
                      <img src="../images/Profile.svg" alt="" srcset="" style="transform:scale(0.93); width:50px; margin-left:15px;">
                  </div>
                  <h2>Kalana Pathum</h2>
                </div>
            </div>


            <div class="card">
                <div class="content">
                  <div class="imgBx">
                       <img src="../images/Profile.svg" alt="" srcset="" style="transform:scale(0.93); width:50px; margin-left:15px;">
                  </div>
                  <h2>Tashmila Kumara</h2>
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