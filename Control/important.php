<?php
session_start();
include '../Model/connect.php';

if(isset($_POST['insert_i_c_n'])){

    $_SESSION['System_Actor_ID'] 
    
    $stmt = $conn->prepare("INSERT INTO `important_number` VALUES(?,?,?,?)");
    $stmt->execute([$_FILES["upload"]["name"],$_POST['ic_title'], file_get_contents($_FILES['upload']['tmp_name'])]);
    echo "ok";

}


