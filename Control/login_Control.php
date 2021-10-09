<?php

include "../Model/connect.php";



try {

    $stmt = $conn->prepare("SELECT * FROM login");

    $user = $stmt->fetch();

    echo "<br>work<br>";

    echo $user;

    //while ($row = $stmt->fetch()) {
      //  echo $row['System_Actor_ID'];
    //}

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}


?>



