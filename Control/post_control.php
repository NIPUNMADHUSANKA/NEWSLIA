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

    $Post_ID = $_POST['view_post_id'];
    $System_Time = date("H:i:s");
    $System_Date = date("Y-m-d");
    $Opening_Time = 0;
   
    $_SESSION['READ_VIEW_Post_ID'] = $_POST['view_post_id'];
    $_SESSION['READ_VIEW_TYPE'] = $_POST['Type'];

    $read_post_sql = "SELECT * FROM read_time WHERE Post_ID = '$Post_ID'";
    $read_post_statement = $conn->query($read_post_sql);
    $read_post_results = $read_post_statement->fetchAll(PDO::FETCH_ASSOC);

    if($read_post_results){
        foreach($read_post_results as $read_post_result){
            $Opening_Time = $read_post_result['Opening_Time'] + 1;      
        }
    }

    $LAST_READ = [
        'Post_ID' => $Post_ID,
        'Opening_Time' => $Opening_Time,
        'Last_Read_Date' => $System_Date,
        'Last_Read_Time' => $System_Time
    ];

    $sql_update_read_time = "UPDATE read_time
                             SET Opening_Time = :Opening_Time,
                             Last_Read_Date = :Last_Read_Date,
                             Last_Read_Time = :Last_Read_Time
                             WHERE Post_ID = :Post_ID";
    
    $statement_update_read_time = $conn->prepare($sql_update_read_time);
    
    $statement_update_read_time->bindParam(':Post_ID',$LAST_READ['Post_ID']);
    $statement_update_read_time->bindParam(':Opening_Time',$LAST_READ['Opening_Time']);
    $statement_update_read_time->bindParam(':Last_Read_Date',$LAST_READ['Last_Read_Date']);
    $statement_update_read_time->bindParam(':Last_Read_Time',$LAST_READ['Last_Read_Time']);

    $statement_update_read_time->execute();

}


if(isset($_POST['Voter_ID'])){

    $Post_ID = $_POST['Post_ID'];
    $Voter = $_POST['Voter_ID'];
    $Vote = $_POST['Vote'];

    $sql = "DELETE FROM vote WHERE Post_ID = :Post_ID AND System_Actor_ID = :System_Actor_ID";

    // prepare the statement for execution
    $statement = $conn->prepare($sql);
    $statement->bindParam(':Post_ID', $Post_ID);
    $statement->bindParam(':System_Actor_ID', $Voter);

    // execute the statement
    $statement->execute();

    $Add_Vote = $conn->prepare("INSERT INTO `vote` VALUES(?,?,?)");
    $Add_Vote->execute([$Post_ID,$Voter,$Vote]);
}
?>