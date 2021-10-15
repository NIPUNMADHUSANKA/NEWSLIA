<?php
session_start();
include '../Model/connect.php';

if(isset($_POST['insert_i_c_n'])){

    $_moderate_area = $_SESSION['moderate_area'];

    $moderating_area_sql = "SELECT * FROM  ORDER BY  DESC LIMIT 1";
    $moderating_area_statement = $conn -> query($moderating_area_sql);
    $moderating_area_results = $moderating_area_statement->fetchAll(PDO::FETCH_ASSOC);
    
    if($moderating_area_results){
        foreach($moderating_area_results as $moderating_area_result){
            $_SESSION['moderate_area'] = $moderating_area_result['Area'];
            echo "<button class='data'>".$moderating_area_result['Area']."</button>";
        }
   }    

    /*$number = count($_POST["num1"]); 
    
    $stmt = $conn->prepare("INSERT INTO `important_number` VALUES(?,?,?,?)");
    $stmt->execute([$_FILES["upload"]["name"],$_POST['ic_title'],$_moderate_area, file_get_contents($_FILES['upload']['tmp_name'])]);
    
    if ($number > 0){
        for($i=0; $i<$number; $i++){
            $stmt = $conn->prepare("INSERT INTO `important_number_list` VALUES(?,?)");
            $stmt->execute([$_FILES["upload"]["name"],$s_POST['num1'][$i]]);
        }
    }
    echo '<script type="text/javascript">window.open("../view/Moderator_Manage_ICN.php", "_self");</script>';
    */
}






