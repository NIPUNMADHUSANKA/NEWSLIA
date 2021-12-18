<?php
    session_start();
    
    include '../Model/connect.php'; 
    if(isset($_POST['SAVE_ID'])){

        $ID = $_POST['SAVE_ID'];
        $System_Actor_ID = $_SESSION['System_Actor_ID'];

        $query = "DELETE FROM save WHERE Post_ID = :ID AND System_Actor_ID = :SA_ID";
        $query_statement = $conn->prepare($query);
        $query_statement->bindParam(':ID',$ID,PDO::PARAM_STR);
        $query_statement->bindParam(':SA_ID',$System_Actor_ID,PDO::PARAM_STR);
        if ($query_statement->execute()) {
            echo "<script>window.open('../view/Moderator_save.php','_self');</script>";
        }    
                              
    }


    if(isset($_POST['HIDDEN_ID']) and isset($_POST['TYPE'])){

        $ID = $_POST['HIDDEN_ID'];
        $TYPE = $_POST['TYPE'];
        $System_Actor_ID = $_SESSION['System_Actor_ID'];

        $stmt_num = $conn->prepare("INSERT INTO `hidden` VALUES(?,?,?)");
        $stmt_num->execute([$ID,$System_Actor_ID,$TYPE]);
                                    
    }


    if(isset($_POST['VIEW_ID']) and isset($_POST['TYPE'])){

        $_SESSION['SAVE_READ_Post_ID'] = $_POST['VIEW_ID'];
        $_SESSION['SAVE_READ_TYPE'] = $_POST['TYPE'];
                                   
    }


   

?>