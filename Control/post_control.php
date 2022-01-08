<?php

session_start();
date_default_timezone_set("Asia/Calcutta");

include '../Model/connect.php'; 


if(isset($_POST['save_post_id'])){
    $USERID = $_SESSION['System_Actor_ID'];
    $POSTID = $_POST['save_post_id'];
    $save_post_sql = $conn->prepare("INSERT INTO `save` VALUES(?,?,?)");
    $save_post_sql->execute([$POSTID,$USERID,$_POST['Type']]);
    
}

if(isset($_POST['hidden_post_id'])){
    $USERID = $_SESSION['System_Actor_ID'];
    $POSTID = $_POST['hidden_post_id'];
    $hidden_post_sql = $conn->prepare("INSERT INTO `hidden` VALUES(?,?,?)");
    $hidden_post_sql->execute([$POSTID,$USERID,$_POST['Type']]);
    
}

if(isset($_POST['view_post_id'])){
    $_SESSION['READ_VIEW_Post_ID'] = $_POST['view_post_id'];
    $_SESSION['READ_VIEW_TYPE'] = $_POST['Type'];
             
}


?>