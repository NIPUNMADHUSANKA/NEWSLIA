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
  .box_head:hover img{
    opacity: 1;
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

  .box-container:hover{
    transform: scale(1.6);
  }

  .box-container{
    transform: scale(1.6);
    margin-top: 6rem;
    margin-left: 1.8rem;
  }

  .box_body h3{
      font-size:0.9rem;
  }

  .box_body p{
      font-size:0.65rem;
  }

  .box-read{
    width:800px;
    height:400px;
    margin-top:0.2rem;
    padding:1rem;
    overflow: hidden;
    overflow-y:scroll;
  }

  .box-read h2{
    font-size:1.8rem;
    font-weight:normal;
    color:#222;
  }

  .box-read p{
    font-weight:normal;
    font-size:1rem;
    padding:1rem;
    text-align:justify;
    color:#555;
    letter-spacing:1.8px;
    line-height:30px;
  }

  .button-set{
    margin-top:-12rem;
    margin-left:3rem;
    display:flex;
    flex-direction:row;
  }

  .view_btn{
    width:100px;
    margin-top:20%;
    margin-left:40rem;
    box-shadow: 1px 1px 5px 1px rgba(0, 0, 0, 0.4);
  }

  .update_btn{
    background-color: #ADD8E6;
    color:#222;
  }

  .remove_btn{
   margin-top:15.2rem;
   background-color:#FF4444;
   margin-left:3rem;
   color:#222;
  }

  .close_btn{
    position: absolute;
    margin-left:90%;
    margin-top:1%;
  }


  .popup .content{
    width:330px;
  }

  .inp1{
    margin-left:-0.5rem;
  }

  .update_btn{
    text-align:center;
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

<div class="close_btn">
    <img src="../images/close_btn.svg" alt="" srcset="">
</div>


<div class="posts_content_view_body">

    <div class="body_information">
         
          <div class="box-container">
              <div class="box_head">
                <img src="../images/sethma.jpeg" alt="">
              </div>
              <div class="box_body">
                <h3>Sethma Hospital</h3>
                <p>Publish Date</p>
                <p>Create By</p>
              </div>
          </div>



          <div class="box-read">
             <h2>Lorem Ipsum</h2>
             <p>
             Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.

             Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.


            
             </p>
          </div>
    </div>

    <div class="button-set">
        <div class="view_btn update_btn" onclick="togglePopup()">Update</div>
        <div class="view_btn remove_btn">Remove</div>
    </div>
</div>






<!--create popup window-->


<div class="popup" id="popup-3">

      <div class="overlay"></div>

      <div class="content">
          <div class="close-btn" onclick="togglePopup()">&times;</div>


          <div class="content_body">
              <div class="popup_logo">
                   <img src="../images/Name.svg" alt="" srcset="">
              </div>
              <hr>

              <div class="popup_form">
                  <h3 class="popup_title">Update Smart Calendar</h3>
                  <form action="" method="post">

                     <label for="update-date" class="lbl">Old Date</label>
                  
                     <input type="date" name="" id="update-date" class="inp">
                     <br>
                     <br>

                     <label for="new-date" class="lbl">New Date</label>
                  
                     <input type="date" name="" id="new-date" class="inp inp1">
                     <br>

                     <div class="update_btn">Update</div>
              
                   </form>
               </div>

          </div>
      </div>
      
</div>







<script>


    function togglePopup(){
      document.getElementById("popup-3").classList.toggle("active");
    }


   

</script>
    
</body>
</html>