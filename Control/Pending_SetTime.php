<?php
    session_start();
    
    include '../Model/connect.php'; 

    if(isset($_POST['View_News_ID'])){

        $_SESSION['SAVE_READ_Post_News_ID'] = $_POST['View_News_ID'];
                                   
    }

    if(isset($_POST['View_Article_ID'])){

        $_SESSION['SAVE_READ_Post_Article_ID'] = $_POST['View_Article_ID'];
                                   
    }

    if(isset($_POST['View_Ads_ID'])){

        $_SESSION['SAVE_READ_Post_Ads_ID'] = $_POST['View_Ads_ID'];
        $_SESSION['Ads_Type'] = $_POST['Type'];
        
                                   
    }



?>