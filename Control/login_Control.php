<?php

include "../Model/connect.php";

$NAME = 'NL-M-00001';



function min_number(){
    return 5;
}



function add(){
    $login_sql = "SELECT * FROM login WHERE System_Actor_ID = '$NAME'";


    $login_statement = $conn->query($login_sql);

    $login_result = $login_statement->fetchAll(PDO::FETCH_ASSOC);

    if ($login_result){
        echo "work";
    }
    else{
        echo "Not work";
    }


}

?> 