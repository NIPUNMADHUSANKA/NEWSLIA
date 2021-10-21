<?php

function login($email,$pwd){

    include '../Model/connect.php';
    

    $login_sql = "SELECT * FROM login WHERE (Email = '$email' AND Password = '$pwd' AND Staff_State = 1 AND Blacklist = 0) ";


    $login_statement = $conn -> query($login_sql);

    $login_results = $login_statement->fetchAll(PDO::FETCH_ASSOC);

    if ($login_results){
        foreach($login_results as $login_result){
            $_SESSION['System_Actor_ID'] = $login_result['System_Actor_ID'];

            if($login_result['Deactivate'] == 1){

                $systemuser =[
                    'id' => $_SESSION['System_Actor_ID'],
                    'active' => 1
                ];

                $sql = 'UPDATE login
                        SET Deactivate = :active
                        WHERE System_Actor_ID = :id';
                
                $statement = $conn->prepare($sql);
                $statement->bindParam(':id', $systemuser['id']);
                $statement->bindParam(':active', $publisher['active']);

                if ($statement->execute()) {
                    echo 'The deactivation has been updated successfully!';
                }

            }   

            $USERID = $_SESSION['System_Actor_ID'];

            $login_correct = "SELECT * FROM system_actor WHERE System_Actor_ID ='$USERID'";
            $login_correct_statement = $conn -> query($login_correct);
            $login_correct_results = $login_correct_statement->fetchAll(PDO::FETCH_ASSOC);
            if($login_correct_results){
                foreach($login_correct_results as $login_correct_result){
                    $_SESSION['FName'] = $login_correct_result['FirstName'];
                    $_SESSION['LName'] = $login_correct_result['LastName'];
                    return $login_correct_result['Position'];
                }
            }

        }
    }
    else{
        return 'false';
    }


}




function signup($first,$last,$email,$mobile,$nic,$job,$dsa,$username_new,$pwd){

    include '../Model/connect.php';
    
    $last_value_sql = "SELECT System_Actor_Id FROM system_actor ORDER BY System_Actor_Id DESC LIMIT 1";
    $last_value_statement = $conn -> query($last_value_sql);
    $last_value_results = $last_value_statement->fetchAll(PDO::FETCH_ASSOC);
        
    if($last_value_results){
        foreach($last_value_results as $last_value_result){
            $connect = substr($last_value_result['System_Actor_Id'],5)+1;
            $ID = "NL-M-".$connect;
            //echo '<script>alert("'.$ID.'")</script>'; 
        }
    }

    $TYPE = strtoupper($job);
    $stmt = $conn->prepare("INSERT INTO `system_actor` VALUES(?,?,?,?,?,?,?,?)");
    $stmt->execute([$ID,$first,$last,$username_new,$nic,$mobile,$dsa,$TYPE]);

    
    $read_stmt = $conn->prepare("INSERT INTO `read_area` VALUES(?,?)");
    $read_stmt->execute([$ID,$dsa]);

    $post_stmt = $conn->prepare("INSERT INTO `post_type` VALUES(?,?,?,?,?,?)");
    $post_stmt->execute([$ID,1,1,1,1,1]);

    $new_type_stmt = $conn->prepare("INSERT INTO `news_type` VALUES(?,?,?,?,?,?,?,?,?)");
    $new_type_stmt->execute([$ID,1,1,1,1,1,1,1,1]);


    echo '<script>alert("'.$TYPE.'")</script>';


    if($TYPE == 'MODERATOR'){
        $moderate_stmt = $conn->prepare("INSERT INTO `moderate_area` VALUES(?,?)");
        $moderate_stmt->execute([$ID,$dsa]);
    }
    elseif($TYPE == 'REPORTER'){
        $report_stmt = $conn->prepare("INSERT INTO `report_area` VALUES(?,?)");
        $report_stmt->execute([$ID,$dsa]);
    }


    $login_stmt = $conn->prepare("INSERT INTO `login` VALUES(?,?,?,?,?,?)");

    if( $TYPE == "MODERATOR" || $TYPE == "ADMIN"){
        $login_stmt->execute([$email,$ID,$pwd,0,0,0]); // system staff
        return "Staff";
    }
    else{
        $login_stmt->execute([$email,$ID,$pwd,0,0,1]); // system user
        return "User";
    }

    



}








?> 