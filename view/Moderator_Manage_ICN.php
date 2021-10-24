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
    <link rel="stylesheet" href="../css/popup.css">
    <link rel="stylesheet" href="../css/addinput.css">
    <link rel="stylesheet" href="../css/error.css">
   <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="shortcut icon" type = "image/x-icon" href = "../images/logo.ico">

</head>

<style>
  body {
    overflow-x: hidden; /* Hide scrollbars */
  }
  .box_head:hover img{
    opacity: 1;
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

  .popup_add_new .content_add_new{
      height:450px;
      width: 400px;
  }

  .popup_add_new_size .content_add_new_size{
    height:580px;
  }
  
  .form-container input{
    margin-right:2rem;
    width:200px;
    float:right;
    
  }
  
.form-container label{
  margin-left:1rem;
  
}

.update_btn{
  margin-left:7.2rem;
}
.insert_btn{
  margin-top:-1rem;
  border:none;
  transition: 0.25s ease;
  box-shadow: none;
}

.update_btn:hover{
   box-shadow: 1px 1px 5px 1px rgba(0, 0, 0, 0.25);
   transform:scale(1.08);
 }

.popup_add_num .content_add_num{
  height:480px;
}

input{
  padding-left:5px;
}


.box-container{
    height: 250px;
  }

  .box_head img{
    height:50%;
  }

  .add_btn{
    transition:0.5s ease;
  }
  
  .add_btn:hover{
    transform:scale(1.2);
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
            <p><?php   echo $_SESSION['FName']." ".$_SESSION['LName']; ?> <img src="../images/Drop-down.svg" alt="" srcset="" class="down"> </p>
            <ul class="profile_menu">
                <li><a href="#"> <img src="../images/other/profile.png" alt="" srcset=""> My Profile</a></li>
                <li><a href="Moderate_Area.php"><img src="../images/other/location.png" alt="" srcset="">Select Area</a></li>
                <li><a href="Moderate_Post_Type.php"><img src="../images/other/type.png" alt="" srcset="">Select Type</a></li>
                <li><a href="Moderator_Insight.php"><img src="../images/other/insights.png" alt="" srcset="">Insights</a></li>
                <li><a href="#"><img src="../images/other/deactivate.png" alt="" srcset="">Deactivate</a></li>
                <li><a href="logout.php"><img src="../images/other/logout.png" alt="" srcset="">Log Out</a></li>
            </ul>
        </div>

</div>

<ul class="menu">
    <li><a href="Moderator_Home.php">Home</a></li>
    <li class="view dropdown">
      <a href="javascript:void(0)" class="dropbtn">View</a>
      <div class="view-content dropdown-content">
          <a href="Moderator_View_News.php">News</a>
          <a href="Moderator_View_Articles.php">Articles</a>
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


<!-- Moderator Important Number View -->
<div class="content_posts_view">
    <div class="posts_content_view_head">
        Edit Important Contact Numbers
    </div>

    <div class="post_sort" style="display:none;">
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
        
    </div>

  
  <div class="add_btn" onclick="togglePop_newadd()">Add New</div>
      
</div>

<div class="posts_content_view_body">

    <div class="body_information">
         
        <?php

        include '../Model/connect.php';
        $moderate_area = $_SESSION['moderate_area'];

        $import_sql = "SELECT * FROM important_number WHERE (Area = '$moderate_area')";

        $import_state = $conn->query($import_sql);
        $import_results = $import_state->fetchAll(PDO::FETCH_ASSOC);

        if($import_results){
          foreach($import_results as $import_result){
            $img = $import_result['Image'];
            $img = base64_encode($img);
            $ext = pathinfo($import_result['Contact_ID'], PATHINFO_EXTENSION);
            
            
            echo "<div class='box-container'>";
            echo "<div class='box_head'>";
            echo "<img src='data:image/".$ext.";base64,".$img."'/>"; 
            echo "</div>";
            echo "<div class='box_body'>";
            echo "<h3>".$import_result['Title']."</h3>"; 

            $CID = $import_result['Contact_ID'];
            $importnum_sql = "SELECT * FROM important_number_list WHERE (Contact_ID = '$CID')";
            $importnum_state = $conn->query($importnum_sql);
            $importnum_results = $importnum_state->fetchAll(PDO::FETCH_ASSOC);

            if($importnum_results){
                foreach($importnum_results as $importnum_result){
                  echo "<p>".$importnum_result['Number']."</p>";
                }}

            echo "</div>";
            echo "<div class='setting_close'>";
            echo "<img src='../images/pen.svg' alt='' srcset='' onclick='togglePopup()'>";
            echo "<img src='../images/close_large.svg' alt='' srcset=''>";
            
            echo "</div>";
            echo "</div>";

          }
        }


       
       


            
        ?>






          
    </div>

    
</div>



<div class="popup popup_add_new" id="popup-2">

      <div class="overlay"></div>

      <div class="content content_add_new" id="popup-2-content">
          <div class="close-btn" onclick="togglePop_newadd()">&times;</div>


          <div class="content_body">
              <div class="popup_logo">
                   <img src="../images/Name.svg" alt="" srcset="">
              </div>
              <hr>

              <div class="popup_form">
                  <h3 class="popup_title">Insert New Important Number</h3>
                  <form action="./Moderator_Manage_ICN.php" method="post" enctype="multipart/form-data">
                    
                        <div class="center_img">
                            <div class="form-input_img">
                              <label for="file-ip-1">Upload Image</label>
                              <input type="file" name="upload" id="file-ip-1" accept="image/*" onchange="showPreview(event);" required>
                              <div class="preview_img">
                              <img id="file-ip-1-preview">
                            </div>
                       </div>

              </div>
                    
                     <br>
                     <br>

                     <div class="form-container">

                          <label for="add-name" class="lbl">Name</label>
                          
                          <input type="text" name="ic_title" id="add-name" class="inp" required>
                          <br>
                          <br>

                          <label for="add-number" class="lbl">Number</label>

                          <div id="survey_options" class="number">
                          <input type="text" name="num1[]" id="add-number" class="inp" required>
                          </div>
                          
                          
                          <div class="controls">
                                 <a href="#" id="add_more_fields" class="mark add_num"><i class="fa fa-plus"></i>Add More</a>
                                 <a href="#" id="remove_fields" class="mark remove_num"><i class="fa fa-minus"></i>Remove Field</a>
                          </div>
                        
                          
                          <br>
                          
                     </div>
                     
                     <button class="update_btn insert_btn" name="insert_i_c_n">Insert</button>
              
                   </form>
               </div>

          </div>
      </div>
      
</div>





<div class="popup popup_add_new" id="popup-1">

      <div class="overlay"></div>

      <div class="content content_add_new" id="popup-1-content">
          <div class="close-btn" onclick="togglePopup()">&times;</div>


          <div class="content_body">
              <div class="popup_logo">
                   <img src="../images/Name.svg" alt="" srcset="">
              </div>
              <hr>

              <div class="popup_form">
                  <h3 class="popup_title">Update New Important Number</h3>
                  <form action="" method="post">
                    
                        <div class="center_img">
                            <div class="form-input_img">
                              <label for="file-ip-2">Upload Image</label>
                              <input type="file" id="file-ip-2" accept="image/*" onchange="showPreview_2(event);">
                              <div class="preview_img">
                              <img id="file-ip-2-preview">
                            </div>
                       </div>

              </div>
                    
              <br>
                     <br>

                     <div class="form-container">

                          <label for="add-name" class="lbl">Name</label>
                          
                          <input type="text" name="ic_title" id="add-name" class="inp" required value="Keells Minuwangoda">
                          <br>
                          <br>

                          <label for="add-number" class="lbl">Number</label>

                          <div id="survey_options" class="number">
                          <input type="text" name="num1[]" id="add-number" class="inp" required value="0112303500">
                          </div>
                          
                          
                          <div class="controls">
                                 <a href="#" class="mark add_num"><i class="fa fa-plus"></i>Add More</a>
                                 <a href="#" class="mark remove_num"><i class="fa fa-minus"></i>Remove Field</a>
                          </div>
                        
                          
                          <br>
                          
                     </div>
                     
                     <button class="update_btn insert_btn" name="insert_i_c_n">Update</button>
              
                   </form>
               </div>

          </div>
      </div>
      
</div>


<div class="errorbox" id="error2">
  <div class="content_erro">
       <div class="error_head">NEWSLIA says</div>
       <div class="error_body">Incorrect Contact Number Format</div>
       <div class="error_foot" onclick="error_msg()">OK</div>

  </div>



<script>

    function error_msg(error2){
      document.getElementById("error2").classList.toggle("active");
      document.getElementById("popup-2").classList.remove("active");
    } 

    function showsort() {
      document.getElementById("sortdrop").classList.toggle("show");
    }

    function togglePopup(){
      document.getElementById("popup-1").classList.toggle("active");
    }

    function togglePop_newadd(){
      document.getElementById("popup-2").classList.toggle("active");
    }


    function showPreview(event){
         if(event.target.files.length > 0){
             var src = URL.createObjectURL(event.target.files[0]);
             var preview = document.getElementById("file-ip-1-preview");
             preview.src = src;
             preview.style.display = "block";
             document.getElementById("popup-2").classList.add("popup_add_new_size");
             document.getElementById("popup-2-content").classList.add("content_add_new_size");
             
         }
    }



    function showPreview_2(event){
         if(event.target.files.length > 0){
             var src = URL.createObjectURL(event.target.files[0]);
             var preview = document.getElementById("file-ip-2-preview");
             preview.src = src;
             preview.style.display = "block";
             document.getElementById("popup-1").classList.add("popup_add_new_size");
             document.getElementById("popup-1-content").classList.add("content_add_new_size");
      
         }
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


    var survey_options = document.getElementById('survey_options');
    var add_more_fields = document.getElementById('add_more_fields');
    var remove_fields = document.getElementById('remove_fields');

    add_more_fields.onclick = function(){
      var input_tags = survey_options.getElementsByTagName('input');
      if(input_tags.length < 2){
        var newField = document.createElement('input');
	      newField.setAttribute('type','text');
	      newField.setAttribute('class','inp');
        newField.setAttribute('name','num1[]');
        newField.setAttribute('id','add-number')
       
        survey_options.appendChild(newField);
      }
	    
    }

    remove_fields.onclick = function(){
	    var input_tags = survey_options.getElementsByTagName('input');
      if(input_tags.length > 1) {
		    survey_options.removeChild(input_tags[(input_tags.length) - 1]);
        
	    }
    }


</script>


<?php

  if(isset($_POST['insert_i_c_n'])){

    include '../Model/connect.php';

    $number = count($_POST["num1"]); 
    $flag = 0;
        
    $regex = '/^(?:0|94|\+94)?(?:(?P<area>11|21|23|24|25|26|27|31|32|33|34|35|36|37|38|41|45|47|51|52|54|55|57|63|65|66|67|81|912)(?P<land_carrier>0|2|3|4|5|7|9)|7(?P<mobile_carrier>0|1|2|4|5|6|7|8)\d)\d{6}$/';  
    
    if($number >0){
      for($i=0; $i<$number; $i++){
        if(preg_match_all($regex, $_POST['num1'][$i], $matches, PREG_SET_ORDER, 0)==false){
          $flag=1;

        }
    }
    }



    if($flag==0){
      $_moderate_area = $_SESSION['moderate_area'];

        $last_value_sql = "SELECT Contact_ID FROM important_number ORDER BY Contact_ID DESC LIMIT 1";
        $last_value_statement = $conn -> query($last_value_sql);
        $last_value_results = $last_value_statement->fetchAll(PDO::FETCH_ASSOC);
        
        if($last_value_results){
            foreach($last_value_results as $last_value_result){
               $connect = substr($last_value_result['Contact_ID'],7)+1;
               $ID = "NL-ICN-".$connect;
               
            }
       }    
    
        
       
        $stmt = $conn->prepare("INSERT INTO `important_number` VALUES(?,?,?,?)");
        $stmt->execute([$ID,$_POST['ic_title'],$_moderate_area, file_get_contents($_FILES['upload']['tmp_name'])]);
        
        if ($number > 0){
            for($i=0; $i<$number; $i++){
                $stmt = $conn->prepare("INSERT INTO `important_number_list` VALUES(?,?)");
                $stmt->execute([$ID,$_POST['num1'][$i]]);
            }
        }
        echo '<script type="text/javascript">window.open("../view/Moderator_Manage_ICN.php", "_self");</script>';
        

    }
    
    else{
        echo '<script type="text/javascript">error_msg();</script>';        
    }

  }
?>
    
</body>
</html>