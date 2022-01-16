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


    if(isset($_POST['REMOVE_HIDDEN_ID'])){

        $ID = $_POST['REMOVE_HIDDEN_ID'];
        $System_Actor_ID = $_SESSION['System_Actor_ID'];

        $query = "DELETE FROM hidden WHERE Post_ID = :ID AND System_Actor_ID = :SA_ID";
        $query_statement = $conn->prepare($query);
        $query_statement->bindParam(':ID',$ID,PDO::PARAM_STR);
        $query_statement->bindParam(':SA_ID',$System_Actor_ID,PDO::PARAM_STR);
        if ($query_statement->execute()) {
            echo "<script>window.open('../view/Moderator_Hidden.php','_self');</script>";
        }                              
    }


    if(isset($_POST['REPORTER_Insight_ID'])){
        $_SESSION['INSIGHT_REPORTER_ID'] = $_POST['REPORTER_Insight_ID'];
        $_SESSION['INSIGHT_REPORTER_FIRST'] = $_POST['FIRST'];
        $_SESSION['INSIGHT_REPORTER_LAST'] = $_POST['LAST'];
    }


    if(isset($_POST['Reminder_Post_ID'])){
        $Reminder_Post_ID = $_POST['Reminder_Post_ID'];
        
        $query = "SELECT * FROM reminder WHERE Post_ID = '$Reminder_Post_ID'";
        $query_statement = $conn->query($query);
        $query_results = $query_statement->fetchAll(PDO::FETCH_ASSOC);
        
        if($query_results){
            foreach($query_results as $query_result){
                echo json_encode(array($query_result['Reminder_Date']));
            }
        }

    }

    if(isset($_POST['Reminder_Post_Delete_ID'])){

        $ID = $_POST['Reminder_Post_Delete_ID'];
        $System_Actor_ID = $_SESSION['System_Actor_ID'];

        $query = "DELETE FROM reminder WHERE Post_ID = :ID AND System_Actor_ID = :SA_ID";
        $query_statement = $conn->prepare($query);
        $query_statement->bindParam(':ID',$ID,PDO::PARAM_STR);
        $query_statement->bindParam(':SA_ID',$System_Actor_ID,PDO::PARAM_STR);
        if ($query_statement->execute()) {
            echo "<script>window.open('../view/Moderator_Reminder.php','_self');</script>";
        }                              
    }


    if(isset($_POST['Update_Reminder'])){
        $ID = $_POST['reminder_id'];
        $Date = $_POST['reminder_date'];

        $Reminder = [
            'Post_ID' => $ID,
            'Reminder_Date' => $Date
        ];
        
        $sql = 'UPDATE reminder
                SET Reminder_Date = :Reminder_Date
                WHERE Post_ID = :Post_ID';
        
        $statement = $conn->prepare($sql);

        // bind params
        $statement->bindParam(':Reminder_Date', $Reminder['Reminder_Date']);
        $statement->bindParam(':Post_ID', $Reminder['Post_ID']);

        // execute the UPDATE statment
        if ($statement->execute()) {
            echo "<script>window.open('../view/Moderator_Reminder.php','_self');</script>";
        }

    }


    if(isset($_POST['Add_Reminder'])){
        
        $ID = $_POST['add_reminder_id'];
        $Type = $_POST['add_reminder_type'];
        $Date = $_POST['add_reminder_date'];
        $USERID = $_SESSION['System_Actor_ID'];

        $reminder_post_sql = $conn->prepare("INSERT INTO `reminder` VALUES(?,?,?,?)");
        $reminder_post_sql->execute([$ID,$USERID,$Date,$Type]);
        echo "<script>window.open('../view/Moderator_Reminder.php','_self');</script>";
    }

    
?>