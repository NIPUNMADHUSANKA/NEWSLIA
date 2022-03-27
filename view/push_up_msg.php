<?php
  session_start();

  include '../Model/connect.php';


  $array=array(); 
  $rows=array(); 

  $push_up = array();

  $i = 0;
  $Have = FALSE;

  $system_actor_id = $_SESSION['System_Actor_ID'];

  $reading_area_sql = "SELECT * FROM read_area WHERE (System_Actor_Id = '$system_actor_id') ";
                          
  $reading_area_statement = $conn -> query($reading_area_sql);
  $reading_area_results = $reading_area_statement->fetchAll(PDO::FETCH_ASSOC);

  if($reading_area_results){
        foreach($reading_area_results as $reading_area_result){

            $noti_area = $reading_area_result['Area'];

            $push_message_sql = $conn->query("SELECT * FROM notif WHERE area = '$noti_area' AND notif_loop > 0 AND notif_time <= CURRENT_TIMESTAMP()");

            $push_message_results = $push_message_sql->fetchAll(PDO::FETCH_ASSOC);

            if($push_message_results){
                foreach($push_message_results as $push_message_result){

                    $NID = $push_message_result['ID'];

                    $check_already_send_sql = "SELECT * FROM send_push_up WHERE System_Actor_Id = '$system_actor_id' AND push_up_id = '$NID'";

                    $check_already_send_statement = $conn -> query($check_already_send_sql);
                    $check_already_send_results = $check_already_send_statement->fetchAll(PDO::FETCH_ASSOC);


                    if(!$check_already_send_results){
                        $i = $i +1;
                        $Have = TRUE;
                        $data['title'] = 'Newslia';
                        $data['msg'] = $push_message_result['notif_msg'];
                        $data['icon'] = '../images/logo.svg';
                        $rows[] = $data;

                        $send_push_up_message_sql = $conn->prepare("INSERT INTO `send_push_up` VALUES(?,?)");
                        $send_push_up_message_sql->execute([$system_actor_id,$NID]);
                    }         
                }
            }

        }
    }


$array['notif'] = $rows;
$array['count'] = $i;
$array['result'] = $Have;
echo json_encode($array);

?>