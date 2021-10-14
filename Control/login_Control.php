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










?> 