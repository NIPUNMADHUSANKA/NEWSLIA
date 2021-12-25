<?php

session_start();
    
include '../Model/connect.php'; 
    if(isset($_POST['deactivate'])){
        
        $confirm_deactivate = $_POST['confirm_deactivate'];
        $System_Actor_ID = $_SESSION['System_Actor_ID'];

        $pwd_check_sql = "SELECT * FROM login WHERE (System_Actor_ID = '$System_Actor_ID') ";
        $pwd_check_statement = $conn -> query($pwd_check_sql);
        $pwd_check_results = $pwd_check_statement->fetchAll(PDO::FETCH_ASSOC);

        if ($pwd_check_results){
            foreach($pwd_check_results as $pwd_check_result){
                
            }
        }

    }