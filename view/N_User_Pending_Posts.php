<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>NEWSLIA</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/navigation.css">
  <link rel="stylesheet" href="../css/moderator.css">
  <link rel="stylesheet" href="../css/search.css">
  <link rel="shortcut icon" type="image/x-icon" href="../images/logo.ico">
  <script src="https://kit.fontawesome.com/c119b7fc61.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<style>
  body {
    font-family: 'Sora', sans-serif;
  }

  .profile-menu-container {
    margin-right: 160px;
  }

  .down {
    margin-left: 2px;
  }

  .fa-customize {
    font-size: 22px;
    color: black;
  }

  .box_head:hover img {
    opacity: 1;
  }
</style>

<body>
  <!--navigation-->
  <?php $page = 'more';
  include 'nav.php'; ?>
  <!--End of Navigation-Bar-->




  <?php











  //ARTICLE

  // Insert Article to pending

  if (isset($_POST['P_A_submit'])) {

    include '../Model/connect.php';

    $USERID = $_SESSION['System_Actor_ID'];

    $last_value_sql = "SELECT Post_ID FROM articles_pending ORDER BY Post_ID DESC LIMIT 1";
    $last_value_statement = $conn->query($last_value_sql);
    $last_value_results = $last_value_statement->fetchAll(PDO::FETCH_ASSOC);

    if ($last_value_results) {
      foreach ($last_value_results as $last_value_result) {
        $connect = substr($last_value_result['Post_ID'], 5) + 1;
        $ID = "NL-A-" . $connect;
      }

      $date = date('Y-m-d H:i:s');
      $content = $_POST['Content'];

      //echo "<h2>" . $date . "</h2>";

      $stmt = $conn->prepare("INSERT INTO `articles_pending`(`Post_ID`, `Title`, `Create Date`, `Image`, `Details`, `Creator_ID`, `NormalUser_Can_Edit`) VALUES (?,?,?,?,?,?,?)");
      $stmt->execute([$ID, $_POST['Title'], $date, file_get_contents($_FILES['Image']['tmp_name']), $content, $USERID, '1']);

      echo '<script type="text/javascript">window.open("../view/N_User_Pending_Posts.php", "_self");</script>';
    }
  }


  //Update pending Article

  if (isset($_POST['P_A_EDIT_submit'])) {

    include '../Model/connect.php';

    $USERID = $_SESSION['System_Actor_ID'];
    $post_Id = $_SESSION['G_PENDING_POST_ID'];

    $date = date('Y-m-d H:i:s');
    $content = $_POST['Content'];
    $title = $_POST['Title'];
    $Image = file_get_contents($_FILES['Image']['tmp_name']);

    $sql = 'UPDATE articles_pending SET Title=:Title, Details=:Content, Image=:Image WHERE Post_ID = :G_PENDING_POST_ID';
    $statement = $conn->prepare($sql);
    $statement->execute([':Title' => $title, ':Content' => $content, ':Image' => $Image, ':G_PENDING_POST_ID' => $post_Id]);
  }


  // insert Drafted Article

  if (isset($_POST['D_A_Submit'])) {

    $last_value_sql = "SELECT Post_Id  FROM articles_drafted ORDER BY Post_ID DESC LIMIT 1";
    $last_value_statement = $conn->query($last_value_sql);
    $last_value_results = $last_value_statement->fetchAll(PDO::FETCH_ASSOC);

    if ($last_value_results) {
      foreach ($last_value_results as $last_value_result) {
        $connect = substr($last_value_result['Post_Id'], 7) + 1;
        $ID = "NL-A-D-" . $connect;
      }
      $date = date('Y-m-d H:i:s');
      $stmt = $conn->prepare("INSERT INTO `articles_drafted`(`Post_Id`, `Title`, `Create_Date`, `Image`, `Details`, `Creator_Id`) VALUES (?,?,?,?,?,?)");
      $stmt->execute([$ID, $_POST['Title'], $date, file_get_contents($_FILES['Image']['tmp_name']), $_POST['Content'], $USERID]);

      echo '<script type="text/javascript">window.open("../view/N_User_Drafted_Post.php", "_self");</script>';
    }
  }


  //update drafted article

  if (isset($_POST['Draft_Drafted_Article'])) {

    include '../Model/connect.php';

    $USERID = $_SESSION['System_Actor_ID'];
    $post_Id = $_SESSION['G_PENDING_POST_ID'];

    $date = date('Y-m-d H:i:s');
    $content = $_POST['Content'];
    $title = $_POST['Title'];
    $Image = file_get_contents($_FILES['Image']['tmp_name']);

    $sql = 'UPDATE articles_drafted SET Title=:Title, Details=:Content, Image=:Image WHERE Post_Id = :G_PENDING_POST_ID';
    $statement = $conn->prepare($sql);
    $statement->execute([':Title' => $title, ':Content' => $content, ':Image' => $Image, ':G_PENDING_POST_ID' => $post_Id]);

    echo '<script type="text/javascript">window.open("../view/N_User_Drafted_Post.php", "_self");</script>';
  }

  //insert drafted article to pending

  if (isset($_POST['Pend_Drafted_Article'])) {
    include '../Model/connect.php';

    $USERID = $_SESSION['System_Actor_ID'];
    $post_Id = $_SESSION['G_PENDING_POST_ID'];

    $last_value_sql = "SELECT Post_ID FROM articles_pending ORDER BY Post_ID DESC LIMIT 1";
    $last_value_statement = $conn->query($last_value_sql);
    $last_value_results = $last_value_statement->fetchAll(PDO::FETCH_ASSOC);

    if ($last_value_results) {
      foreach ($last_value_results as $last_value_result) {
        $connect = substr($last_value_result['Post_ID'], 5) + 1;
        $ID = "NL-A-" . $connect;
      }

      $date = date('Y-m-d H:i:s');
      $content = $_POST['Content'];

      //echo "<h2>" . $date . "</h2>";

      $stmt = $conn->prepare("INSERT INTO `articles_pending`(`Post_ID`, `Title`, `Create Date`, `Image`, `Details`, `Creator_ID`, `NormalUser_Can_Edit`) VALUES (?,?,?,?,?,?,?)");
      $stmt->execute([$ID, $_POST['Title'], $date, file_get_contents($_FILES['Image']['tmp_name']), $content, $USERID, '1']);

      //delete data
      $sql = 'DELETE FROM articles_drafted WHERE Post_Id = :G_DELETE_POST_ID';
      $statement = $conn->prepare($sql);
      $statement->execute([':G_DELETE_POST_ID' => $post_Id]);

      echo '<script type="text/javascript">window.open("../view/N_User_Pending_Posts.php", "_self");</script>';
    }
  }


  //insert pending article to draft

  if (isset($_POST['Draft_Pending_Article'])) {

    $USERID = $_SESSION['System_Actor_ID'];
    $post_Id = $_SESSION['G_PENDING_POST_ID'];

    $last_value_sql = "SELECT Post_Id  FROM articles_drafted ORDER BY Post_ID DESC LIMIT 1";
    $last_value_statement = $conn->query($last_value_sql);
    $last_value_results = $last_value_statement->fetchAll(PDO::FETCH_ASSOC);

    if ($last_value_results) {
      foreach ($last_value_results as $last_value_result) {
        $connect = substr($last_value_result['Post_Id'], 7) + 1;
        $ID = "NL-A-D-" . $connect;
      }
      $date = date('Y-m-d H:i:s');
      $stmt = $conn->prepare("INSERT INTO `articles_drafted`(`Post_Id`, `Title`, `Create_Date`, `Image`, `Details`, `Creator_Id`) VALUES (?,?,?,?,?,?)");
      $stmt->execute([$ID, $_POST['Title'], $date, file_get_contents($_FILES['Image']['tmp_name']), $_POST['Content'], $USERID]);


      //delete from pending
      $sql = 'DELETE FROM articles_pending WHERE Post_ID = :G_DELETE_POST_ID';
      $statement = $conn->prepare($sql);
      $statement->execute([':G_DELETE_POST_ID' => $post_Id]);

      
      echo '<script type="text/javascript">window.open("../view/N_User_Drafted_Post.php", "_self");</script>';
    }
  }





  //COMMERCIAL ADVERTISEMENT

  //Insert Commercial Advertisement to pending with Date

  if (isset($_POST['Pending_CA_With_Time_Submit'])) {

    include '../Model/connect.php';

    $USERID = $_SESSION['System_Actor_ID'];

    $last_value_sql = "SELECT Post_ID FROM com_ads_pending ORDER BY Post_ID DESC LIMIT 1";
    $last_value_statement = $conn->query($last_value_sql);
    $last_value_results = $last_value_statement->fetchAll(PDO::FETCH_ASSOC);

    if ($last_value_results) {
      foreach ($last_value_results as $last_value_result) {
        $connect = substr($last_value_result['Post_ID'], 6) + 1;
        $ID = "NL-CA-" . $connect;
      }


      $date = date('Y-m-d H:i:s');

      $type = "C.ADS";

      $stmt = $conn->prepare("INSERT INTO `com_ads_pending`(`Post_ID`, `Title`, `Create_Date`, `Image`, `Details`, `Creator_ID`, `Set_Date`, `Set_Time`, `System_User_Can_Edit`) VALUES (?,?,?,?,?,?,?,?,?)");
      $stmt->execute([$ID, $_POST['Title'], $date, file_get_contents($_FILES['Image']['tmp_name']), $_POST['content'], $USERID, $_POST['Set_Date'],  $_POST['Set_Time'], '1']);

      //Insert Area

      $stmt = $conn->prepare("INSERT INTO `pending_post_area`(`Post_ID`, `Area`, `Post Type`) VALUES (?,?,?)");
      $stmt->execute([$ID, $_POST['Area'], $type]);

      if($_SESSION['Actor_Type'] == "REPORTER"){
        echo '<script type="text/javascript">window.open("../view/Repoter_Pending_Post.php", "_self");</script>';
      }

      echo '<script type="text/javascript">window.open("../view/N_User_Pending_Posts.php", "_self");</script>';
    }
  }





  //Insert Commercial Advertisement to pending without Date

  if (isset($_POST['Pending_CA_Without_Time_Submit'])) {

    include '../Model/connect.php';

    $USERID = $_SESSION['System_Actor_ID'];

    $last_value_sql = "SELECT Post_ID FROM com_ads_pending ORDER BY Post_ID DESC LIMIT 1";
    $last_value_statement = $conn->query($last_value_sql);
    $last_value_results = $last_value_statement->fetchAll(PDO::FETCH_ASSOC);

    if ($last_value_results) {
      foreach ($last_value_results as $last_value_result) {
        $connect = substr($last_value_result['Post_ID'], 6) + 1;
        $ID = "NL-CA-" . $connect;
      }


      $date = date('Y-m-d H:i:s');

      $type = "C.ADS";

      $stmt = $conn->prepare("INSERT INTO `com_ads_pending`(`Post_ID`, `Title`, `Create_Date`, `Image`, `Details`, `Creator_ID`, `Set_Date`, `Set_Time`, `System_User_Can_Edit`) VALUES (?,?,?,?,?,?,?,?,?)");
      $stmt->execute([$ID, $_POST['Title'], $date, file_get_contents($_FILES['Image']['tmp_name']), $_POST['content'], $USERID, NULL,  NULL, '1']);

      //Insert Area
      $stmt = $conn->prepare("INSERT INTO `pending_post_area`(`Post_ID`, `Area`, `Post Type`) VALUES (?,?,?)");
      $stmt->execute([$ID, $_POST['Area'], $type]);

      if($_SESSION['Actor_Type'] == "REPORTER"){
        echo '<script type="text/javascript">window.open("../view/Repoter_Pending_Post.php", "_self");</script>';
      }

      echo '<script type="text/javascript">window.open("../view/N_User_Pending_Posts.php", "_self");</script>';
    }
  }


  //Update pending Commercial Advertisement without date

  if (isset($_POST['Pending_CA_Without_Time_Edit'])) {

    include '../Model/connect.php';

    $USERID = $_SESSION['System_Actor_ID'];
    $post_Id = $_SESSION['G_PENDING_POST_ID'];

    $date = date('Y-m-d H:i:s');
    $content = $_POST['content'];
    $title = $_POST['Title'];
    $Image = file_get_contents($_FILES['Image']['tmp_name']);
    $P_date = Null;
    $P_time = Null;
    $area = $_POST['Area'];

    $sql = 'UPDATE com_ads_pending SET Title=:Title, Details=:Details,Create_Date=:Create_Date, Image=:Image, Set_Date=:Set_Date, Set_Time=:Set_Time  WHERE Post_ID = :Post_ID';
    $statement = $conn->prepare($sql);
    $statement->execute([':Title' => $title, ':Details' => $content, ':Create_Date' => $date, ':Image' => $Image, ':Set_Date' => $P_date, ':Set_Time' => $P_time, ':Post_ID' => $post_Id]);

    $sql_2 = 'UPDATE pending_post_area SET Area=:Area  WHERE Post_ID = :Post_ID';
    $statement_2 = $conn->prepare($sql_2);
    $statement_2->execute([':Area' => $area, ':Post_ID' => $post_Id]);
  }





  //Update pending Commercial Advertisement with date

  if (isset($_POST['Pending_CA_With_Time_Edit'])) {

    include '../Model/connect.php';

    $USERID = $_SESSION['System_Actor_ID'];
    $post_Id = $_SESSION['G_PENDING_POST_ID'];

    $date = date('Y-m-d H:i:s');
    $content = $_POST['content'];
    $title = $_POST['Title'];
    $Image = file_get_contents($_FILES['Image']['tmp_name']);
    $P_date = $_POST['Set_Date'];
    $P_time = $_POST['Set_Time'];
    $area = $_POST['Area'];

    $sql = 'UPDATE com_ads_pending SET Title=:Title, Details=:Details, Create_Date=:Create_Date, Image=:Image, Set_Date=:Set_Date, Set_Time=:Set_Time  WHERE Post_ID = :Post_ID';
    $statement = $conn->prepare($sql);
    $statement->execute([':Title' => $title, ':Details' => $content, ':Create_Date' => $date, ':Image' => $Image, ':Set_Date' => $P_date, ':Set_Time' => $P_time, ':Post_ID' => $post_Id]);


    $sql_2 = 'UPDATE pending_post_area SET Area=:Area  WHERE Post_ID = :Post_ID';
    $statement_2 = $conn->prepare($sql_2);
    $statement_2->execute([':Area' => $area, ':Post_ID' => $post_Id]);
  }



  // insert Drafted Commercial Ad

  if (isset($_POST['D_CA_Submit'])) {

    $last_value_sql = "SELECT Post_Id  FROM com_ads_drafted ORDER BY Post_ID DESC LIMIT 1";
    $last_value_statement = $conn->query($last_value_sql);
    $last_value_results = $last_value_statement->fetchAll(PDO::FETCH_ASSOC);

    if ($last_value_results) {
      foreach ($last_value_results as $last_value_result) {
        $connect = substr($last_value_result['Post_Id'], 8) + 1;
        $ID = "NL-CA-D-" . $connect;
      }
      $date = date('Y-m-d H:i:s');
      $stmt = $conn->prepare("INSERT INTO `com_ads_drafted`(`Post_Id`, `Title`, `Create_Date`, `Image`, `Details`, `Creator_Id`) VALUES (?,?,?,?,?,?)");
      $stmt->execute([$ID, $_POST['Title'], $date, file_get_contents($_FILES['Image']['tmp_name']), $_POST['content'], $USERID]);

      $stmt_2 = $conn->prepare("INSERT INTO `drafted_post_area`(`Post_Id`, `Area`) VALUES (?,?)");
      $stmt_2->execute([$ID, $_POST['Area']]);

      if($_SESSION['Actor_Type'] == "REPORTER"){
        echo '<script type="text/javascript">window.open("../view/Repoter_Drafted_Post.php", "_self");</script>';
      }
      echo '<script type="text/javascript">window.open("../view/N_User_Drafted_Post.php", "_self");</script>';
    }
  }

  //update Drafted Commercial Ad

  if (isset($_POST['Draft_Drafted_CA'])) {

    include '../Model/connect.php';

    $USERID = $_SESSION['System_Actor_ID'];
    $post_Id = $_SESSION['G_PENDING_POST_ID'];

    $date = date('Y-m-d H:i:s');
    $content = $_POST['content'];
    $title = $_POST['Title'];
    $Image = file_get_contents($_FILES['Image']['tmp_name']);

    $area = $_POST['Area'];

    $sql = 'UPDATE com_ads_drafted SET Title=:Title, Details=:Details,Create_Date=:Create_Date, Image=:Image  WHERE Post_Id = :Post_Id';
    $statement = $conn->prepare($sql);
    $statement->execute([':Title' => $title, ':Details' => $content, ':Create_Date' => $date, ':Image' => $Image, ':Post_Id' => $post_Id]);

    $sql_2 = 'UPDATE drafted_post_area SET Area=:Area  WHERE Post_Id = :Post_Id';
    $statement_2 = $conn->prepare($sql_2);
    $statement_2->execute([':Area' => $area, ':Post_Id' => $post_Id]);
    
    if($_SESSION['Actor_Type'] == "REPORTER"){
      echo '<script type="text/javascript">window.open("../view/Repoter_Drafted_Post.php", "_self");</script>';
    }
    echo '<script type="text/javascript">window.open("../view/N_User_Drafted_Post.php", "_self");</script>';
  }



  //insert drafted commercial ad to pending with date

  if (isset($_POST['Pend_Drafted_CA_With_Date'])) {

    include '../Model/connect.php';

    $USERID = $_SESSION['System_Actor_ID'];
    $post_Id = $_SESSION['G_PENDING_POST_ID'];

    $last_value_sql = "SELECT Post_ID FROM com_ads_pending ORDER BY Post_ID DESC LIMIT 1";
    $last_value_statement = $conn->query($last_value_sql);
    $last_value_results = $last_value_statement->fetchAll(PDO::FETCH_ASSOC);

    if ($last_value_results) {
      foreach ($last_value_results as $last_value_result) {
        $connect = substr($last_value_result['Post_ID'], 6) + 1;
        $ID = "NL-CA-" . $connect;
      }


      $date = date('Y-m-d H:i:s');

      $type = "C.ADS";

      $stmt = $conn->prepare("INSERT INTO `com_ads_pending`(`Post_ID`, `Title`, `Create_Date`, `Image`, `Details`, `Creator_ID`, `Set_Date`, `Set_Time`, `System_User_Can_Edit`) VALUES (?,?,?,?,?,?,?,?,?)");
      $stmt->execute([$ID, $_POST['Title'], $date, file_get_contents($_FILES['Image']['tmp_name']), $_POST['content'], $USERID, $_POST['Set_Date'],  $_POST['Set_Time'], '1']);

      //Insert Area

      $stmt = $conn->prepare("INSERT INTO `pending_post_area`(`Post_ID`, `Area`, `Post Type`) VALUES (?,?,?)");
      $stmt->execute([$ID, $_POST['Area'], $type]);


      //delete from drafts

      $sql = 'DELETE FROM com_ads_drafted WHERE Post_Id = :G_DELETE_POST_ID';
      $statement = $conn->prepare($sql);
      $statement->execute([':G_DELETE_POST_ID' => $post_Id]);

      $sql_2 = 'DELETE FROM drafted_post_area WHERE Post_Id = :G_DELETE_POST_ID';
      $statement_2 = $conn->prepare($sql_2);
      $statement_2->execute([':G_DELETE_POST_ID' => $post_Id]);


      echo '<script type="text/javascript">window.open("../view/N_User_Pending_Posts.php", "_self");</script>';
    }
  }




  //Insert drafted Commercial Advertisement to pending without Date

  if (isset($_POST['Pend_Drafted_CA_Without_Date'])) {

    include '../Model/connect.php';

    $USERID = $_SESSION['System_Actor_ID'];
    $post_Id = $_SESSION['G_PENDING_POST_ID'];

    $last_value_sql = "SELECT Post_ID FROM com_ads_pending ORDER BY Post_ID DESC LIMIT 1";
    $last_value_statement = $conn->query($last_value_sql);
    $last_value_results = $last_value_statement->fetchAll(PDO::FETCH_ASSOC);

    if ($last_value_results) {
      foreach ($last_value_results as $last_value_result) {
        $connect = substr($last_value_result['Post_ID'], 6) + 1;
        $ID = "NL-CA-" . $connect;
      }

      $date = date('Y-m-d H:i:s');

      $type = "C.ADS";

      $stmt = $conn->prepare("INSERT INTO `com_ads_pending`(`Post_ID`, `Title`, `Create_Date`, `Image`, `Details`, `Creator_ID`, `Set_Date`, `Set_Time`, `System_User_Can_Edit`) VALUES (?,?,?,?,?,?,?,?,?)");
      $stmt->execute([$ID, $_POST['Title'], $date, file_get_contents($_FILES['Image']['tmp_name']), $_POST['content'], $USERID, NULL,  NULL, '1']);

      //Insert Area
      $stmt = $conn->prepare("INSERT INTO `pending_post_area`(`Post_ID`, `Area`, `Post Type`) VALUES (?,?,?)");
      $stmt->execute([$ID, $_POST['Area'], $type]);


      //delete from drafts

      $sql = 'DELETE FROM com_ads_drafted WHERE Post_Id = :G_DELETE_POST_ID';
      $statement = $conn->prepare($sql);
      $statement->execute([':G_DELETE_POST_ID' => $post_Id]);

      $sql_2 = 'DELETE FROM drafted_post_area WHERE Post_Id = :G_DELETE_POST_ID';
      $statement_2 = $conn->prepare($sql_2);
      $statement_2->execute([':G_DELETE_POST_ID' => $post_Id]);

      echo '<script type="text/javascript">window.open("../view/N_User_Pending_Posts.php", "_self");</script>';
    }
  }

  //insert Pending Commercial Ad to Draft 

  if (isset($_POST['Draft_Pending_CA'])) {

    $USERID = $_SESSION['System_Actor_ID'];
    $post_Id = $_SESSION['G_PENDING_POST_ID'];

    $last_value_sql = "SELECT Post_Id  FROM com_ads_drafted ORDER BY Post_ID DESC LIMIT 1";
    $last_value_statement = $conn->query($last_value_sql);
    $last_value_results = $last_value_statement->fetchAll(PDO::FETCH_ASSOC);

    if ($last_value_results) {
      foreach ($last_value_results as $last_value_result) {
        $connect = substr($last_value_result['Post_Id'], 8) + 1;
        $ID = "NL-CA-D-" . $connect;
      }
      $date = date('Y-m-d H:i:s');
      $stmt = $conn->prepare("INSERT INTO `com_ads_drafted`(`Post_Id`, `Title`, `Create_Date`, `Image`, `Details`, `Creator_Id`) VALUES (?,?,?,?,?,?)");
      $stmt->execute([$ID, $_POST['Title'], $date, file_get_contents($_FILES['Image']['tmp_name']), $_POST['content'], $USERID]);

      $stmt_2 = $conn->prepare("INSERT INTO `drafted_post_area`(`Post_Id`, `Area`) VALUES (?,?)");
      $stmt_2->execute([$ID, $_POST['Area']]);

      //delete from pending
      $sql = 'DELETE FROM com_ads_pending WHERE Post_ID = :G_DELETE_POST_ID';
      $statement = $conn->prepare($sql);
      $statement->execute([':G_DELETE_POST_ID' => $post_Id]);

      $sql_2 = 'DELETE FROM pending_post_area WHERE Post_ID = :G_DELETE_POST_ID';
      $statement_2 = $conn->prepare($sql_2);
      $statement_2->execute([':G_DELETE_POST_ID' => $post_Id]);

      if($_SESSION['Actor_Type'] == "REPORTER"){
        echo '<script type="text/javascript">window.open("../view/Repoter_Drafted_Post.php", "_self");</script>';
      }

      echo '<script type="text/javascript">window.open("../view/N_User_Drafted_Post.php", "_self");</script>';
    }
  }




  //JOB VACANCY



  //Insert Job Vacancy to pending with Date

  if (isset($_POST['Pending_JV_With_Time_Submit'])) {

    include '../Model/connect.php';

    $USERID = $_SESSION['System_Actor_ID'];

    $last_value_sql = "SELECT Post_ID FROM job_vacancies_pending ORDER BY Post_ID DESC LIMIT 1";
    $last_value_statement = $conn->query($last_value_sql);
    $last_value_results = $last_value_statement->fetchAll(PDO::FETCH_ASSOC);

    if ($last_value_results) {
      foreach ($last_value_results as $last_value_result) {
        $connect = substr($last_value_result['Post_ID'], 6) + 1;
        $ID = "NL-JV-" . $connect;
      }


      $date = date('Y-m-d H:i:s');

      $type = "VACANCIES";

      $stmt = $conn->prepare("INSERT INTO `job_vacancies_pending`(`Post_ID`, `Company`, `Position`, `Create_Date`, `Deadline_Date`, `Image`, `Details`, `Creator_ID`, `Set_Date`, `Set_Time`, `System_User_Can_Edit`) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
      $stmt->execute([$ID, $_POST['Company_Name'], $_POST['Position'], $date, $_POST['Deadline_Date'], file_get_contents($_FILES['Image']['tmp_name']), $_POST['content'], $USERID, $_POST['Set_Date'],  $_POST['Set_Time'], '1']);

      //Insert Area

      $stmt = $conn->prepare("INSERT INTO `pending_post_area`(`Post_ID`, `Area`, `Post Type`) VALUES (?,?,?)");
      $stmt->execute([$ID, $_POST['Area'], $type]);

      if($_SESSION['Actor_Type'] == "REPORTER"){
        echo '<script type="text/javascript">window.open("../view/Repoter_Pending_Post.php", "_self");</script>';
      }

      echo '<script type="text/javascript">window.open("../view/N_User_Pending_Posts.php", "_self");</script>';
    }
  }


  //Insert Job Vacancy to pending without Date

  if (isset($_POST['Pending_JV_Without_Time_Submit'])) {

    include '../Model/connect.php';

    $USERID = $_SESSION['System_Actor_ID'];

    $last_value_sql = "SELECT Post_ID FROM job_vacancies_pending ORDER BY Post_ID DESC LIMIT 1";
    $last_value_statement = $conn->query($last_value_sql);
    $last_value_results = $last_value_statement->fetchAll(PDO::FETCH_ASSOC);

    if ($last_value_results) {
      foreach ($last_value_results as $last_value_result) {
        $connect = substr($last_value_result['Post_ID'], 6) + 1;
        $ID = "NL-JV-" . $connect;
      }

      $area = $_POST['Area'];
      $date = date('Y-m-d H:i:s');
      $content = $_POST['content'];
      $title = $_POST['Title'];
      $publish_date = $_POST['Set_Date'];
      $publish_time = $_POST['Set_Time'];
      $type = "VACANCIES";

      $stmt = $conn->prepare("INSERT INTO `job_vacancies_pending`(`Post_ID`, `Company`, `Position`, `Create_Date`, `Deadline_Date`, `Image`, `Details`, `Creator_ID`, `Set_Date`, `Set_Time`, `System_User_Can_Edit`) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
      $stmt->execute([$ID, $_POST['Company_Name'], $_POST['Position'], $date, $_POST['Deadline_Date'], file_get_contents($_FILES['Image']['tmp_name']), $_POST['content'], $USERID, NULL,  NULL, '1']);

      //Insert Area

      $stmt = $conn->prepare("INSERT INTO `pending_post_area`(`Post_ID`, `Area`, `Post Type`) VALUES (?,?,?)");
      $stmt->execute([$ID, $_POST['Area'], $type]);

      if($_SESSION['Actor_Type'] == "REPORTER"){
        echo '<script type="text/javascript">window.open("../view/Repoter_Pending_Post.php", "_self");</script>';
      }
      echo '<script type="text/javascript">window.open("../view/N_User_Pending_Posts.php", "_self");</script>';
    }
  }



  //Update pending Job Vacancy without date

  if (isset($_POST['Pending_JV_Without_Time_Edit'])) {

    include '../Model/connect.php';

    $USERID = $_SESSION['System_Actor_ID'];
    $post_Id = $_SESSION['G_PENDING_POST_ID'];

    $date = date('Y-m-d H:i:s');
    $content = $_POST['content'];
    $Company = $_POST['Company_Name'];
    $Position = $_POST['Position'];
    $Deadline_Date = $_POST['Deadline_Date'];
    $Image = file_get_contents($_FILES['Image']['tmp_name']);
    $P_date = Null;
    $P_time = Null;
    $area = $_POST['Area'];

    $sql = 'UPDATE job_vacancies_pending SET Company=:Company, Position=:Position,Create_Date=:Create_Date, Deadline_Date=:Deadline_Date, Image=:Image, Details=:Details,  Set_Date=:Set_Date, Set_Time=:Set_Time  WHERE Post_ID = :Post_ID';
    $statement = $conn->prepare($sql);
    $statement->execute([':Company' => $Company, ':Position' => $Position, ':Create_Date' => $date, ':Deadline_Date' => $Deadline_Date, ':Image' => $Image, ':Details' => $content,   ':Set_Date' => $P_date, ':Set_Time' => $P_time, ':Post_ID' => $post_Id]);

    $sql_2 = 'UPDATE pending_post_area SET Area=:Area  WHERE Post_ID = :Post_ID';
    $statement_2 = $conn->prepare($sql_2);
    $statement_2->execute([':Area' => $area, ':Post_ID' => $post_Id]);
  }


  //Update pending Job Vacancy with date

  if (isset($_POST['Pending_JV_With_Time_Edit'])) {

    include '../Model/connect.php';

    $USERID = $_SESSION['System_Actor_ID'];
    $post_Id = $_SESSION['G_PENDING_POST_ID'];

    $date = date('Y-m-d H:i:s');
    $content = $_POST['content'];
    $Company = $_POST['Company_Name'];
    $Position = $_POST['Position'];
    $Deadline_Date = $_POST['Deadline_Date'];
    $Image = file_get_contents($_FILES['Image']['tmp_name']);
    $P_date = $_POST['Set_Date'];
    $P_time = $_POST['Set_Time'];
    $area = $_POST['Area'];

    $sql = 'UPDATE job_vacancies_pending SET Company=:Company, Position=:Position,Create_Date=:Create_Date, Deadline_Date=:Deadline_Date, Image=:Image, Details=:Details,  Set_Date=:Set_Date, Set_Time=:Set_Time  WHERE Post_ID = :Post_ID';
    $statement = $conn->prepare($sql);
    $statement->execute([':Company' => $Company, ':Position' => $Position, ':Create_Date' => $date, ':Deadline_Date' => $Deadline_Date, ':Image' => $Image, ':Details' => $content,   ':Set_Date' => $P_date, ':Set_Time' => $P_time, ':Post_ID' => $post_Id]);

    $sql_2 = 'UPDATE pending_post_area SET Area=:Area  WHERE Post_ID = :Post_ID';
    $statement_2 = $conn->prepare($sql_2);
    $statement_2->execute([':Area' => $area, ':Post_ID' => $post_Id]);
  }



  // insert Drafted Job Vacancy

  if (isset($_POST['D_JV_Submit'])) {

    $last_value_sql = "SELECT Post_Id  FROM job_vacancies_drafted ORDER BY Post_ID DESC LIMIT 1";
    $last_value_statement = $conn->query($last_value_sql);
    $last_value_results = $last_value_statement->fetchAll(PDO::FETCH_ASSOC);

    if ($last_value_results) {
      foreach ($last_value_results as $last_value_result) {
        $connect = substr($last_value_result['Post_Id'], 8) + 1;
        $ID = "NL-JV-D-" . $connect;
      }
      $date = date('Y-m-d H:i:s');
      $company = $_POST['Company_Name'];
      $position = $_POST['Position'];
      $deadline = $_POST['Deadline_Date'];
      $content = $_POST['content'];


      $stmt = $conn->prepare("INSERT INTO `job_vacancies_drafted`(`Post_Id`, `Company`, `Position`, `Create_Date`, `Deadline_Date`, `Image`, `Details`, `Creator_Id`) VALUES (?,?,?,?,?,?,?,?)");
      $stmt->execute([$ID, $company, $position, $date, $deadline, file_get_contents($_FILES['Image']['tmp_name']), $content, $USERID]);

      $stmt_2 = $conn->prepare("INSERT INTO `drafted_post_area`(`Post_Id`, `Area`) VALUES (?,?)");
      $stmt_2->execute([$ID, $_POST['Area']]);

      if($_SESSION['Actor_Type'] == "REPORTER"){
        echo '<script type="text/javascript">window.open("../view/Repoter_Drafted_Post.php", "_self");</script>';
      }

      echo '<script type="text/javascript">window.open("../view/N_User_Drafted_Post.php", "_self");</script>';
    }
  }


  // update drafted Job vacancy

  if (isset($_POST['Draft_Drafted_JV'])) {

    include '../Model/connect.php';

    $USERID = $_SESSION['System_Actor_ID'];
    $post_Id = $_SESSION['G_PENDING_POST_ID'];

    $date = date('Y-m-d H:i:s');
    $content = $_POST['content'];
    $title = $_POST['Company_Name'];
    $Image = file_get_contents($_FILES['Image']['tmp_name']);
    $position = $_POST['Position'];
    $deadline = $_POST['Deadline_Date'];

    $area = $_POST['Area'];

    $sql = 'UPDATE job_vacancies_drafted SET Company=:Company, Position=:Position, Create_Date=:Create_Date, Deadline_Date=:Deadline_Date, Details=:Details, Image=:Image    WHERE Post_Id = :Post_Id';
    $statement = $conn->prepare($sql);
    $statement->execute([':Company' => $title, ':Position' => $position, ':Create_Date' => $date, ':Deadline_Date' => $deadline, ':Details' => $content,  ':Image' => $Image, ':Post_Id' => $post_Id]);

    $sql_2 = 'UPDATE drafted_post_area SET Area=:Area  WHERE Post_Id = :Post_Id';
    $statement_2 = $conn->prepare($sql_2);
    $statement_2->execute([':Area' => $area, ':Post_Id' => $post_Id]);

    if($_SESSION['Actor_Type'] == "REPORTER"){
      echo '<script type="text/javascript">window.open("../view/Repoter_Drafted_Post.php", "_self");</script>';
    }

    echo '<script type="text/javascript">window.open("../view/N_User_Drafted_Post.php", "_self");</script>';
  }

  //insert drafted job vacancy to pending with date

  if (isset($_POST['Pend_Drafted_JV_With_Date'])) {

    include '../Model/connect.php';

    $USERID = $_SESSION['System_Actor_ID'];
    $post_Id = $_SESSION['G_PENDING_POST_ID'];

    $last_value_sql = "SELECT Post_ID FROM job_vacancies_pending ORDER BY Post_ID DESC LIMIT 1";
    $last_value_statement = $conn->query($last_value_sql);
    $last_value_results = $last_value_statement->fetchAll(PDO::FETCH_ASSOC);

    if ($last_value_results) {
      foreach ($last_value_results as $last_value_result) {
        $connect = substr($last_value_result['Post_ID'], 6) + 1;
        $ID = "NL-JV-" . $connect;
      }


      $date = date('Y-m-d H:i:s');

      $type = "VACANCIES";

      $stmt = $conn->prepare("INSERT INTO `job_vacancies_pending`(`Post_ID`, `Company`, `Position`, `Create_Date`, `Deadline_Date`, `Image`, `Details`, `Creator_ID`, `Set_Date`, `Set_Time`, `System_User_Can_Edit`) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
      $stmt->execute([$ID, $_POST['Company_Name'], $_POST['Position'], $date, $_POST['Deadline_Date'], file_get_contents($_FILES['Image']['tmp_name']), $_POST['content'], $USERID, $_POST['Set_Date'],  $_POST['Set_Time'], '1']);

      //Insert Area

      $stmt = $conn->prepare("INSERT INTO `pending_post_area`(`Post_ID`, `Area`, `Post Type`) VALUES (?,?,?)");
      $stmt->execute([$ID, $_POST['Area'], $type]);


      //delete from drafts
      $sql = 'DELETE FROM job_vacancies_drafted WHERE Post_ID = :G_DELETE_POST_ID';
      $statement = $conn->prepare($sql);
      $statement->execute([':G_DELETE_POST_ID' => $post_Id]);


      $sql_2 = 'DELETE FROM drafted_post_area WHERE Post_ID = :G_DELETE_POST_ID';
      $statement_2 = $conn->prepare($sql_2);
      $statement_2->execute([':G_DELETE_POST_ID' => $post_Id]);


      echo '<script type="text/javascript">window.open("../view/N_User_Pending_Posts.php", "_self");</script>';
    }
  }


  //Insert drafted Job Vacancy to pending without Date

  if (isset($_POST['Pend_Drafted_JV_Without_Date'])) {

    include '../Model/connect.php';

    $USERID = $_SESSION['System_Actor_ID'];
    $post_Id = $_SESSION['G_PENDING_POST_ID'];

    $last_value_sql = "SELECT Post_ID FROM job_vacancies_pending ORDER BY Post_ID DESC LIMIT 1";
    $last_value_statement = $conn->query($last_value_sql);
    $last_value_results = $last_value_statement->fetchAll(PDO::FETCH_ASSOC);

    if ($last_value_results) {
      foreach ($last_value_results as $last_value_result) {
        $connect = substr($last_value_result['Post_ID'], 6) + 1;
        $ID = "NL-JV-" . $connect;
      }

      $area = $_POST['Area'];
      $date = date('Y-m-d H:i:s');
      $content = $_POST['content'];
      $title = $_POST['Title'];
      $publish_date = $_POST['Set_Date'];
      $publish_time = $_POST['Set_Time'];
      $type = "VACANCIES";

      $stmt = $conn->prepare("INSERT INTO `job_vacancies_pending`(`Post_ID`, `Company`, `Position`, `Create_Date`, `Deadline_Date`, `Image`, `Details`, `Creator_ID`, `Set_Date`, `Set_Time`, `System_User_Can_Edit`) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
      $stmt->execute([$ID, $_POST['Company_Name'], $_POST['Position'], $date, $_POST['Deadline_Date'], file_get_contents($_FILES['Image']['tmp_name']), $_POST['content'], $USERID, NULL,  NULL, '1']);

      //Insert Area

      $stmt = $conn->prepare("INSERT INTO `pending_post_area`(`Post_ID`, `Area`, `Post Type`) VALUES (?,?,?)");
      $stmt->execute([$ID, $_POST['Area'], $type]);

      //delete from drafts
      $sql = 'DELETE FROM job_vacancies_drafted WHERE Post_ID = :G_DELETE_POST_ID';
      $statement = $conn->prepare($sql);
      $statement->execute([':G_DELETE_POST_ID' => $post_Id]);


      $sql_2 = 'DELETE FROM drafted_post_area WHERE Post_ID = :G_DELETE_POST_ID';
      $statement_2 = $conn->prepare($sql_2);
      $statement_2->execute([':G_DELETE_POST_ID' => $post_Id]);


      echo '<script type="text/javascript">window.open("../view/N_User_Pending_Posts.php", "_self");</script>';
    }
  }


  //insert pending job vacancy to draft

  if (isset($_POST['Draft_Pending_JV'])) {

    $USERID = $_SESSION['System_Actor_ID'];
    $post_Id = $_SESSION['G_PENDING_POST_ID'];

    $last_value_sql = "SELECT Post_Id  FROM job_vacancies_drafted ORDER BY Post_ID DESC LIMIT 1";
    $last_value_statement = $conn->query($last_value_sql);
    $last_value_results = $last_value_statement->fetchAll(PDO::FETCH_ASSOC);

    if ($last_value_results) {
      foreach ($last_value_results as $last_value_result) {
        $connect = substr($last_value_result['Post_Id'], 8) + 1;
        $ID = "NL-JV-D-" . $connect;
      }
      $date = date('Y-m-d H:i:s');
      $company = $_POST['Company_Name'];
      $position = $_POST['Position'];
      $deadline = $_POST['Deadline_Date'];
      $content = $_POST['content'];


      $stmt = $conn->prepare("INSERT INTO `job_vacancies_drafted`(`Post_Id`, `Company`, `Position`, `Create_Date`, `Deadline_Date`, `Image`, `Details`, `Creator_Id`) VALUES (?,?,?,?,?,?,?,?)");
      $stmt->execute([$ID, $company, $position, $date, $deadline, file_get_contents($_FILES['Image']['tmp_name']), $content, $USERID]);

      $stmt_2 = $conn->prepare("INSERT INTO `drafted_post_area`(`Post_Id`, `Area`) VALUES (?,?)");
      $stmt_2->execute([$ID, $_POST['Area']]);

      //delete from pending

      $sql = 'DELETE FROM job_vacancies_pending WHERE Post_ID = :G_DELETE_POST_ID';
      $statement = $conn->prepare($sql);
      $statement->execute([':G_DELETE_POST_ID' => $post_Id]);

      $sql_2 = 'DELETE FROM pending_post_area WHERE Post_ID = :G_DELETE_POST_ID';
      $statement_2 = $conn->prepare($sql_2);
      $statement_2->execute([':G_DELETE_POST_ID' => $post_Id]);

      if($_SESSION['Actor_Type'] == "REPORTER"){
        echo '<script type="text/javascript">window.open("../view/Repoter_Drafted_Post.php", "_self");</script>';
      }

      echo '<script type="text/javascript">window.open("../view/N_User_Drafted_Post.php", "_self");</script>';
    }
  }







  //NOTICE



  //Insert Notice to pending with Date

  if (isset($_POST['Pending_NO_With_Time_Submit'])) {

    include '../Model/connect.php';

    $USERID = $_SESSION['System_Actor_ID'];

    $last_value_sql = "SELECT Post_ID FROM notices_pending ORDER BY Post_ID DESC LIMIT 1";
    $last_value_statement = $conn->query($last_value_sql);
    $last_value_results = $last_value_statement->fetchAll(PDO::FETCH_ASSOC);

    if ($last_value_results) {
      foreach ($last_value_results as $last_value_result) {
        $connect = substr($last_value_result['Post_ID'], 6) + 1;
        $ID = "NL-NO-" . $connect;
      }


      $date = date('Y-m-d H:i:s');

      $type = "NOTICES";

      $stmt = $conn->prepare("INSERT INTO `notices_pending`(`Post_ID`, `Title`, `Create Date`, `Image`, `Details`, `Creator_ID`, `Publish Date`, `Publish Time`, `System_User_Can_Edit`) VALUES (?,?,?,?,?,?,?,?,?)");
      $stmt->execute([$ID, $_POST['Title'], $date, file_get_contents($_FILES['Image']['tmp_name']), $_POST['content'], $USERID, $_POST['Set_Date'],  $_POST['Set_Time'], '1']);

      //Insert Area

      $stmt = $conn->prepare("INSERT INTO `pending_post_area`(`Post_ID`, `Area`, `Post Type`) VALUES (?,?,?)");
      $stmt->execute([$ID, $_POST['Area'], $type]);

      if($_SESSION['Actor_Type'] == "REPORTER"){
        echo '<script type="text/javascript">window.open("../view/Repoter_Pending_Post.php", "_self");</script>';
      }

      echo '<script type="text/javascript">window.open("../view/N_User_Pending_Posts.php", "_self");</script>';
    }
  }




  //Insert Notice to pending without Date

  if (isset($_POST['Pending_NO_Without_Time_Submit'])) {

    include '../Model/connect.php';

    $USERID = $_SESSION['System_Actor_ID'];

    $last_value_sql = "SELECT Post_ID FROM notices_pending ORDER BY Post_ID DESC LIMIT 1";
    $last_value_statement = $conn->query($last_value_sql);
    $last_value_results = $last_value_statement->fetchAll(PDO::FETCH_ASSOC);

    if ($last_value_results) {
      foreach ($last_value_results as $last_value_result) {
        $connect = substr($last_value_result['Post_ID'], 6) + 1;
        $ID = "NL-NO-" . $connect;
      }


      $date = date('Y-m-d H:i:s');

      $type = "NOTICES";

      $stmt = $conn->prepare("INSERT INTO `notices_pending`(`Post_ID`, `Title`, `Create Date`, `Image`, `Details`, `Creator_ID`, `Publish Date`, `Publish Time`, `System_User_Can_Edit`) VALUES (?,?,?,?,?,?,?,?,?)");
      $stmt->execute([$ID, $_POST['Title'], $date, file_get_contents($_FILES['Image']['tmp_name']), $_POST['content'], $USERID, NULL,  NULL, '1']);

      //Insert Area

      $stmt = $conn->prepare("INSERT INTO `pending_post_area`(`Post_ID`, `Area`, `Post Type`) VALUES (?,?,?)");
      $stmt->execute([$ID, $_POST['Area'], $type]);

      if($_SESSION['Actor_Type'] == "REPORTER"){
        echo '<script type="text/javascript">window.open("../view/Repoter_Pending_Post.php", "_self");</script>';
      }

      echo '<script type="text/javascript">window.open("../view/N_User_Pending_Posts.php", "_self");</script>';
    }
  }



  //Update pending Notice without date

  if (isset($_POST['Pending_NO_Without_Time_Edit'])) {

    include '../Model/connect.php';

    $USERID = $_SESSION['System_Actor_ID'];
    $post_Id = $_SESSION['G_PENDING_POST_ID'];

    $date = date('Y-m-d');
    $content = $_POST['content'];
    $title = $_POST['Title'];
    $Image = file_get_contents($_FILES['Image']['tmp_name']);
    $P_date = Null;
    $P_time = Null;
    $area = $_POST['Area'];

    //  $sql = 'UPDATE notices_pending SET Title=:Title, `Create Date`=:Create Date, Image=:Image, Details=:Details, `Publish Date`=:Publish Date, `Publish Time`=:Publish_Time  WHERE Post_ID = :Post_ID';
    //  $statement = $conn->prepare($sql);
    //  $statement->execute([':Title' => $title, ':Create Date'=>$date, ':Image' => $Image, ':Details' => $content,  ':Publish Date' => $P_date, ':Publish Time' => $P_time, ':Post_ID' => $post_Id]);


    $sql = 'UPDATE `notices_pending` SET `Title`=:Title, `Create Date`=:Create_Date,`Image`=:Image,`Details`=:Details,`Publish Date`=:Publish_Date,`Publish Time`=:Publish_Time WHERE `Post_ID`=:Post_ID';
    $statement = $conn->prepare($sql);
    $statement->execute([':Title' => $title,  ':Image' => $Image, ':Details' => $content, ':Create_Date' => $date, ':Publish_Date' => $P_date, ':Publish_Time' => $P_time, ':Post_ID' => $post_Id]);


    $sql_2 = 'UPDATE pending_post_area SET Area=:Area  WHERE Post_ID = :Post_ID';
    $statement_2 = $conn->prepare($sql_2);
    $statement_2->execute([':Area' => $area, ':Post_ID' => $post_Id]);
  }


  //Update pending Notice with date

  if (isset($_POST['Pending_NO_With_Time_Edit'])) {

    include '../Model/connect.php';

    $USERID = $_SESSION['System_Actor_ID'];
    $post_Id = $_SESSION['G_PENDING_POST_ID'];

    $date = date('Y-m-d H:i:s');
    $content = $_POST['content'];
    $title = $_POST['Title'];
    $Image = file_get_contents($_FILES['Image']['tmp_name']);
    $P_date = $_POST['Set_Date'];
    $P_time = $_POST['Set_Time'];
    $area = $_POST['Area'];

    //  $sql = 'UPDATE notices_pending SET Title=:Title, Create Date=:Create Date, Image=:Image, Details=:Details, Publish Date=:Publish Date, Publish_Time=:Publish_Time  WHERE Post_ID = :Post_ID';
    //  $statement = $conn->prepare($sql);
    //  $statement->execute([':Title' => $title, ':Create Date'=>$date, ':Image' => $Image, ':Details' => $content,  ':Publish Date' => $P_date, ':Publish Time' => $P_time, ':Post_ID' => $post_Id]);

    $sql = 'UPDATE `notices_pending` SET `Title`=:Title, `Create Date`=:Create_Date,`Image`=:Image,`Details`=:Details,`Publish Date`=:Publish_Date,`Publish Time`=:Publish_Time WHERE `Post_ID`=:Post_ID';
    $statement = $conn->prepare($sql);
    $statement->execute([':Title' => $title,  ':Image' => $Image, ':Details' => $content, ':Create_Date' => $date, ':Publish_Date' => $P_date, ':Publish_Time' => $P_time, ':Post_ID' => $post_Id]);



    $sql_2 = 'UPDATE pending_post_area SET Area=:Area  WHERE Post_ID = :Post_ID';
    $statement_2 = $conn->prepare($sql_2);
    $statement_2->execute([':Area' => $area, ':Post_ID' => $post_Id]);
  }





  // insert Drafted Notice

  if (isset($_POST['D_NO_Submit'])) {

    $last_value_sql = "SELECT Post_Id  FROM notices_drafted ORDER BY Post_ID DESC LIMIT 1";
    $last_value_statement = $conn->query($last_value_sql);
    $last_value_results = $last_value_statement->fetchAll(PDO::FETCH_ASSOC);

    if ($last_value_results) {
      foreach ($last_value_results as $last_value_result) {
        $connect = substr($last_value_result['Post_Id'], 8) + 1;
        $ID = "NL-NO-D-" . $connect;
      }
      $date = date('Y-m-d H:i:s');


      $stmt = $conn->prepare("INSERT INTO `notices_drafted`(`Post_Id`, `Title`, `Create_Date`, `Image`, `Details`, `Creator_Id`) VALUES (?,?,?,?,?,?)");
      $stmt->execute([$ID, $_POST['Title'], $date, file_get_contents($_FILES['Image']['tmp_name']), $_POST['content'], $USERID]);

      $stmt_2 = $conn->prepare("INSERT INTO `drafted_post_area`(`Post_Id`, `Area`) VALUES (?,?)");
      $stmt_2->execute([$ID, $_POST['Area']]);

      if($_SESSION['Actor_Type'] == "REPORTER"){
        echo '<script type="text/javascript">window.open("../view/Repoter_Drafted_Post.php", "_self");</script>';
      }
      echo '<script type="text/javascript">window.open("../view/N_User_Drafted_Post.php", "_self");</script>';
    }
  }


  //update Drafted Notice

  if (isset($_POST['Draft_Drafted_NO'])) {

    include '../Model/connect.php';

    $USERID = $_SESSION['System_Actor_ID'];
    $post_Id = $_SESSION['G_PENDING_POST_ID'];

    $date = date('Y-m-d H:i:s');
    $content = $_POST['content'];
    $title = $_POST['Title'];
    $Image = file_get_contents($_FILES['Image']['tmp_name']);

    $area = $_POST['Area'];

    $sql = 'UPDATE notices_drafted SET Title=:Title, Create_Date=:Create_Date, Image=:Image, Details=:Details  WHERE Post_Id = :Post_Id';
    $statement = $conn->prepare($sql);
    $statement->execute([':Title' => $title, ':Create_Date' => $date, ':Image' => $Image,  ':Details' => $content, ':Post_Id' => $post_Id]);

    $sql_2 = 'UPDATE drafted_post_area SET Area=:Area  WHERE Post_Id = :Post_Id';
    $statement_2 = $conn->prepare($sql_2);
    $statement_2->execute([':Area' => $area, ':Post_Id' => $post_Id]);

    if($_SESSION['Actor_Type'] == "REPORTER"){
      echo '<script type="text/javascript">window.open("../view/Repoter_Drafted_Post.php", "_self");</script>';
    }

    echo '<script type="text/javascript">window.open("../view/N_User_Drafted_Post.php", "_self");</script>';
  }


  //Insert drafted Notice to pending with Date

  if (isset($_POST['Pend_Drafted_NO_With_Date'])) {

    include '../Model/connect.php';

    $USERID = $_SESSION['System_Actor_ID'];
    $post_Id = $_SESSION['G_PENDING_POST_ID'];

    $last_value_sql = "SELECT Post_ID FROM notices_pending ORDER BY Post_ID DESC LIMIT 1";
    $last_value_statement = $conn->query($last_value_sql);
    $last_value_results = $last_value_statement->fetchAll(PDO::FETCH_ASSOC);

    if ($last_value_results) {
      foreach ($last_value_results as $last_value_result) {
        $connect = substr($last_value_result['Post_ID'], 6) + 1;
        $ID = "NL-NO-" . $connect;
      }


      $date = date('Y-m-d H:i:s');

      $type = "NOTICES";

      $stmt = $conn->prepare("INSERT INTO `notices_pending`(`Post_ID`, `Title`, `Create Date`, `Image`, `Details`, `Creator_ID`, `Publish Date`, `Publish Time`, `System_User_Can_Edit`) VALUES (?,?,?,?,?,?,?,?,?)");
      $stmt->execute([$ID, $_POST['Title'], $date, file_get_contents($_FILES['Image']['tmp_name']), $_POST['content'], $USERID, $_POST['Set_Date'],  $_POST['Set_Time'], '1']);

      //Insert Area

      $stmt = $conn->prepare("INSERT INTO `pending_post_area`(`Post_ID`, `Area`, `Post Type`) VALUES (?,?,?)");
      $stmt->execute([$ID, $_POST['Area'], $type]);

      //delete from drafts
      $sql = 'DELETE FROM notices_drafted WHERE Post_ID = :G_DELETE_POST_ID';
      $statement = $conn->prepare($sql);
      $statement->execute([':G_DELETE_POST_ID' => $post_Id]);

      $sql_2 = 'DELETE FROM drafted_post_area WHERE Post_ID = :G_DELETE_POST_ID';
      $statement_2 = $conn->prepare($sql_2);
      $statement_2->execute([':G_DELETE_POST_ID' => $post_Id]);


      echo '<script type="text/javascript">window.open("../view/N_User_Pending_Posts.php", "_self");</script>';
    }
  }




  //Insert drafted Notice to pending without Date

  if (isset($_POST['Pend_Drafted_NO_Without_Date'])) {

    include '../Model/connect.php';

    $USERID = $_SESSION['System_Actor_ID'];
    $post_Id = $_SESSION['G_PENDING_POST_ID'];

    $last_value_sql = "SELECT Post_ID FROM notices_pending ORDER BY Post_ID DESC LIMIT 1";
    $last_value_statement = $conn->query($last_value_sql);
    $last_value_results = $last_value_statement->fetchAll(PDO::FETCH_ASSOC);

    if ($last_value_results) {
      foreach ($last_value_results as $last_value_result) {
        $connect = substr($last_value_result['Post_ID'], 6) + 1;
        $ID = "NL-NO-" . $connect;
      }


      $date = date('Y-m-d H:i:s');

      $type = "NOTICES";

      $stmt = $conn->prepare("INSERT INTO `notices_pending`(`Post_ID`, `Title`, `Create Date`, `Image`, `Details`, `Creator_ID`, `Publish Date`, `Publish Time`, `System_User_Can_Edit`) VALUES (?,?,?,?,?,?,?,?,?)");
      $stmt->execute([$ID, $_POST['Title'], $date, file_get_contents($_FILES['Image']['tmp_name']), $_POST['content'], $USERID, NULL,  NULL, '1']);

      //Insert Area

      $stmt = $conn->prepare("INSERT INTO `pending_post_area`(`Post_ID`, `Area`, `Post Type`) VALUES (?,?,?)");
      $stmt->execute([$ID, $_POST['Area'], $type]);


      //delete from drafts
      $sql = 'DELETE FROM notices_drafted WHERE Post_ID = :G_DELETE_POST_ID';
      $statement = $conn->prepare($sql);
      $statement->execute([':G_DELETE_POST_ID' => $post_Id]);

      $sql_2 = 'DELETE FROM drafted_post_area WHERE Post_ID = :G_DELETE_POST_ID';
      $statement_2 = $conn->prepare($sql_2);
      $statement_2->execute([':G_DELETE_POST_ID' => $post_Id]);


      echo '<script type="text/javascript">window.open("../view/N_User_Pending_Posts.php", "_self");</script>';
    }
  }



  // insert pending notice to draft

  if (isset($_POST['Draft_Pending_NO'])) {

    $USERID = $_SESSION['System_Actor_ID'];
    $post_Id = $_SESSION['G_PENDING_POST_ID'];

    $last_value_sql = "SELECT Post_Id  FROM notices_drafted ORDER BY Post_ID DESC LIMIT 1";
    $last_value_statement = $conn->query($last_value_sql);
    $last_value_results = $last_value_statement->fetchAll(PDO::FETCH_ASSOC);

    if ($last_value_results) {
      foreach ($last_value_results as $last_value_result) {
        $connect = substr($last_value_result['Post_Id'], 8) + 1;
        $ID = "NL-NO-D-" . $connect;
      }
      $date = date('Y-m-d H:i:s');


      $stmt = $conn->prepare("INSERT INTO `notices_drafted`(`Post_Id`, `Title`, `Create_Date`, `Image`, `Details`, `Creator_Id`) VALUES (?,?,?,?,?,?)");
      $stmt->execute([$ID, $_POST['Title'], $date, file_get_contents($_FILES['Image']['tmp_name']), $_POST['content'], $USERID]);

      $stmt_2 = $conn->prepare("INSERT INTO `drafted_post_area`(`Post_Id`, `Area`) VALUES (?,?)");
      $stmt_2->execute([$ID, $_POST['Area']]);

      //delete rom pending
      $sql = 'DELETE FROM notices_pending WHERE Post_ID = :G_DELETE_POST_ID';
      $statement = $conn->prepare($sql);
      $statement->execute([':G_DELETE_POST_ID' => $post_Id]);

      $sql_2 = 'DELETE FROM pending_post_area WHERE Post_ID = :G_DELETE_POST_ID';
      $statement_2 = $conn->prepare($sql_2);
      $statement_2->execute([':G_DELETE_POST_ID' => $post_Id]);

      if($_SESSION['Actor_Type'] == "REPORTER"){
        echo '<script type="text/javascript">window.open("../view/Repoter_Drafted_Post.php", "_self");</script>';
      }
      echo '<script type="text/javascript">window.open("../view/N_User_Drafted_Post.php", "_self");</script>';
    }
  }







  ?>

  <!--   NEWS Part Udani-->
  <?php

      //NEWS

        //Insert NEWS to pending with Date

        if (isset($_POST['Pending_NE_With_Time_Submit'])) {

          include '../Model/connect.php';

          $USERID = $_SESSION['System_Actor_ID'];

          $last_value_sql = "SELECT Post_ID FROM news_pending ORDER BY Post_ID DESC LIMIT 1";
          $last_value_statement = $conn->query($last_value_sql);
          $last_value_results = $last_value_statement->fetchAll(PDO::FETCH_ASSOC);

          if ($last_value_results) {
            foreach ($last_value_results as $last_value_result) {
              $connect = substr($last_value_result['Post_ID'], 5) + 1;
              $ID = "NL-N-" . $connect;
            }


            $date = date('Y-m-d H:i:s');

            $type = "NEWS";

            $stmt = $conn->prepare("INSERT INTO `news_pending`(`Post_ID`, `Title`, `Create_Date`, `Image`, `Details`, `Creator_ID`, `Calendar_Date`, `News_Category`, `Reporter_Can_Edit`) VALUES (?,?,?,?,?,?,?,?,?)");
            $stmt->execute([$ID, $_POST['Title'], $date, file_get_contents($_FILES['Image']['tmp_name']), $_POST['content'], $USERID, $_POST['Set_Date'],  $_POST['Type'], '1']);

            //Insert Area

            $stmt = $conn->prepare("INSERT INTO `pending_post_area`(`Post_ID`, `Area`, `Post Type`) VALUES (?,?,?)");
            $stmt->execute([$ID, $_POST['Area'], $type]);


            echo '<script type="text/javascript">window.open("../view/Repoter_Pending_Post.php", "_self");</script>';
          }
        }




        //Insert news to pending without Date

        if (isset($_POST['Pending_NE_Without_Time_Submit'])) {

          include '../Model/connect.php';

          $USERID = $_SESSION['System_Actor_ID'];

          $last_value_sql = "SELECT Post_ID FROM news_pending ORDER BY Post_ID DESC LIMIT 1";
          $last_value_statement = $conn->query($last_value_sql);
          $last_value_results = $last_value_statement->fetchAll(PDO::FETCH_ASSOC);

          if ($last_value_results) {
            foreach ($last_value_results as $last_value_result) {
              $connect = substr($last_value_result['Post_ID'], 5) + 1;
              $ID = "NL-N-" . $connect;
            }


            $date = date('Y-m-d H:i:s');

            $type = "NEWS";

            $stmt = $conn->prepare("INSERT INTO `news_pending`(`Post_ID`, `Title`, `Create_Date`, `Image`, `Details`, `Creator_ID`, `Calendar_Date`, `News_Category`, `Reporter_Can_Edit`) VALUES (?,?,?,?,?,?,?,?,?)");
            $stmt->execute([$ID, $_POST['Title'], $date, file_get_contents($_FILES['Image']['tmp_name']), $_POST['content'], $USERID, Null,  $_POST['Type'], '1']);

            //Insert Area

            $stmt = $conn->prepare("INSERT INTO `pending_post_area`(`Post_ID`, `Area`, `Post Type`) VALUES (?,?,?)");
            $stmt->execute([$ID, $_POST['Area'], $type]);


            echo '<script type="text/javascript">window.open("../view/Repoter_Pending_Post.php", "_self");</script>';
          }
        }



        //Update pending news without date

        if (isset($_POST['Pending_NE_Without_Time_Edit'])) {

          include '../Model/connect.php';

          $USERID = $_SESSION['System_Actor_ID'];
          $post_Id = $_SESSION['G_PENDING_POST_ID'];

          $date = date('Y-m-d');
          $content = $_POST['content'];
          $title = $_POST['Title'];
          $Image = file_get_contents($_FILES['Image']['tmp_name']);
          $P_date = Null;
          $area = $_POST['Area'];
          $category = $_POST['Type'];

          //  $sql = 'UPDATE notices_pending SET Title=:Title, `Create Date`=:Create Date, Image=:Image, Details=:Details, `Publish Date`=:Publish Date, `Publish Time`=:Publish_Time  WHERE Post_ID = :Post_ID';
          //  $statement = $conn->prepare($sql);
          //  $statement->execute([':Title' => $title, ':Create Date'=>$date, ':Image' => $Image, ':Details' => $content,  ':Publish Date' => $P_date, ':Publish Time' => $P_time, ':Post_ID' => $post_Id]);


          $sql = 'UPDATE `news_pending` SET `Title`=:Title, `Create_Date`=:Create_Date,`Image`=:Image,`Details`=:Details,`Calendar_Date`=:Publish_Date,`News_Category`=:News_Category WHERE `Post_ID`=:Post_ID';
          $statement = $conn->prepare($sql);
          $statement->execute([':Title' => $title,  ':Image' => $Image, ':Details' => $content, ':Create_Date' => $date, ':Publish_Date' => $P_date, ':News_Category' => $category, ':Post_ID' => $post_Id]);


          $sql_2 = 'UPDATE pending_post_area SET Area=:Area  WHERE Post_ID = :Post_ID';
          $statement_2 = $conn->prepare($sql_2);
          $statement_2->execute([':Area' => $area, ':Post_ID' => $post_Id]);
        }


        //Update pending news with date

        if (isset($_POST['Pending_NE_With_Time_Edit'])) {

          include '../Model/connect.php';

          $USERID = $_SESSION['System_Actor_ID'];
          $post_Id = $_SESSION['G_PENDING_POST_ID'];

          $date = date('Y-m-d H:i:s');
          $content = $_POST['content'];
          $title = $_POST['Title'];
          $Image = file_get_contents($_FILES['Image']['tmp_name']);
          $P_date = $_POST['Set_Date'];
          $area = $_POST['Area'];
          $category = $_POST['Type'];


          //  $sql = 'UPDATE notices_pending SET Title=:Title, Create Date=:Create Date, Image=:Image, Details=:Details, Publish Date=:Publish Date, Publish_Time=:Publish_Time  WHERE Post_ID = :Post_ID';
          //  $statement = $conn->prepare($sql);
          //  $statement->execute([':Title' => $title, ':Create Date'=>$date, ':Image' => $Image, ':Details' => $content,  ':Publish Date' => $P_date, ':Publish Time' => $P_time, ':Post_ID' => $post_Id]);

          $sql = 'UPDATE `news_pending` SET `Title`=:Title, `Create_Date`=:Create_Date,`Image`=:Image,`Details`=:Details,`Calendar_Date`=:Publish_Date,`News_Category`=:News_Category WHERE `Post_ID`=:Post_ID';
          $statement = $conn->prepare($sql);
          $statement->execute([':Title' => $title,  ':Image' => $Image, ':Details' => $content, ':Create_Date' => $date, ':Publish_Date' => $P_date, ':News_Category' => $category, ':Post_ID' => $post_Id]);



          $sql_2 = 'UPDATE pending_post_area SET Area=:Area  WHERE Post_ID = :Post_ID';
          $statement_2 = $conn->prepare($sql_2);
          $statement_2->execute([':Area' => $area, ':Post_ID' => $post_Id]);
        }





        // insert Drafted news

        if (isset($_POST['D_NE_Submit'])) {

          $last_value_sql = "SELECT Post_Id  FROM news_drafted ORDER BY Post_ID DESC LIMIT 1";
          $last_value_statement = $conn->query($last_value_sql);
          $last_value_results = $last_value_statement->fetchAll(PDO::FETCH_ASSOC);

          if ($last_value_results) {
            foreach ($last_value_results as $last_value_result) {
              $connect = substr($last_value_result['Post_Id'], 7) + 1;
              $ID = "NL-N-D-" . $connect;
            }
            $date = date('Y-m-d H:i:s');


            $stmt = $conn->prepare("INSERT INTO `news_drafted`(`Post_Id`, `Title`, `Create_Date`, `Image`, `Details`, `Creator_Id`, `News_Category`) VALUES (?,?,?,?,?,?,?)");
            $stmt->execute([$ID, $_POST['Title'], $date, file_get_contents($_FILES['Image']['tmp_name']), $_POST['content'], $USERID, $_POST['Type']]);

            $stmt_2 = $conn->prepare("INSERT INTO `drafted_post_area`(`Post_Id`, `Area`) VALUES (?,?)");
            $stmt_2->execute([$ID, $_POST['Area']]);


            echo '<script type="text/javascript">window.open("../view/Repoter_Drafted_Post.php", "_self");</script>';
          }
        }
        


        //update Drafted news

        if (isset($_POST['Draft_Drafted_NE'])) {

          include '../Model/connect.php';

          $USERID = $_SESSION['System_Actor_ID'];
          $post_Id = $_SESSION['G_PENDING_POST_ID'];

          $date = date('Y-m-d H:i:s');
          $content = $_POST['content'];
          $title = $_POST['Title'];
          $Image = file_get_contents($_FILES['Image']['tmp_name']);
          $category = $_POST['Type'];
          $area = $_POST['Area'];

          $sql = 'UPDATE news_drafted SET Title=:Title, Create_Date=:Create_Date, Image=:Image, Details=:Details, News_Category=:News_Category  WHERE Post_Id = :Post_Id';
          $statement = $conn->prepare($sql);
          $statement->execute([':Title' => $title, ':Create_Date' => $date, ':Image' => $Image,  ':Details' => $content, ':News_Category' => $category, ':Post_Id' => $post_Id]);

          $sql_2 = 'UPDATE drafted_post_area SET Area=:Area  WHERE Post_Id = :Post_Id';
          $statement_2 = $conn->prepare($sql_2);
          $statement_2->execute([':Area' => $area, ':Post_Id' => $post_Id]);

         echo '<script type="text/javascript">window.open("../view/Repoter_Drafted_Post.php", "_self");</script>';
        }


        //Insert drafted news to pending with Date

        if (isset($_POST['Pend_Drafted_NE_With_Date'])) {

          include '../Model/connect.php';

          $USERID = $_SESSION['System_Actor_ID'];
          $post_Id = $_SESSION['G_PENDING_POST_ID'];

          $last_value_sql = "SELECT Post_ID FROM news_pending ORDER BY Post_ID DESC LIMIT 1";
          $last_value_statement = $conn->query($last_value_sql);
          $last_value_results = $last_value_statement->fetchAll(PDO::FETCH_ASSOC);

          if ($last_value_results) {
            foreach ($last_value_results as $last_value_result) {
              $connect = substr($last_value_result['Post_ID'], 5) + 1;
              $ID = "NL-N-" . $connect;
            }


            $date = date('Y-m-d H:i:s');

            $type = "NEWS";

            $stmt = $conn->prepare("INSERT INTO `news_pending`(`Post_ID`, `Title`, `Create_Date`, `Image`, `Details`, `Creator_ID`, `Calendar_Date`, `News_Category`, `Reporter_Can_Edit`) VALUES (?,?,?,?,?,?,?,?,?)");
            $stmt->execute([$ID, $_POST['Title'], $date, file_get_contents($_FILES['Image']['tmp_name']), $_POST['content'], $USERID, $_POST['Set_Date'],  $_POST['Type'], '1']);

            //Insert Area

            $stmt = $conn->prepare("INSERT INTO `pending_post_area`(`Post_ID`, `Area`, `Post Type`) VALUES (?,?,?)");
            $stmt->execute([$ID, $_POST['Area'], $type]);


            //delete from drafts
            $sql = 'DELETE FROM news_drafted WHERE Post_ID = :G_DELETE_POST_ID';
            $statement = $conn->prepare($sql);
            $statement->execute([':G_DELETE_POST_ID' => $post_Id]);

            $sql_2 = 'DELETE FROM drafted_post_area WHERE Post_ID = :G_DELETE_POST_ID';
            $statement_2 = $conn->prepare($sql_2);
            $statement_2->execute([':G_DELETE_POST_ID' => $post_Id]);


            echo '<script type="text/javascript">window.open("../view/Repoter_Pending_Post.php", "_self");</script>';
          }
        }




        //Insert drafted news to pending without Date

        if (isset($_POST['Pend_Drafted_NE_Without_Date'])) {

          include '../Model/connect.php';

          $USERID = $_SESSION['System_Actor_ID'];
          $post_Id = $_SESSION['G_PENDING_POST_ID'];

          $last_value_sql = "SELECT Post_ID FROM news_pending ORDER BY Post_ID DESC LIMIT 1";
          $last_value_statement = $conn->query($last_value_sql);
          $last_value_results = $last_value_statement->fetchAll(PDO::FETCH_ASSOC);

          if ($last_value_results) {
            foreach ($last_value_results as $last_value_result) {
              $connect = substr($last_value_result['Post_ID'], 5) + 1;
              $ID = "NL-N-" . $connect;
            }


            $date = date('Y-m-d H:i:s');

            $type = "NEWS";

            $stmt = $conn->prepare("INSERT INTO `news_pending`(`Post_ID`, `Title`, `Create_Date`, `Image`, `Details`, `Creator_ID`, `Calendar_Date`, `News_Category`, `Reporter_Can_Edit`) VALUES (?,?,?,?,?,?,?,?,?)");
            $stmt->execute([$ID, $_POST['Title'], $date, file_get_contents($_FILES['Image']['tmp_name']), $_POST['content'], $USERID, Null,  $_POST['Type'], '1']);

            //Insert Area

            $stmt = $conn->prepare("INSERT INTO `pending_post_area`(`Post_ID`, `Area`, `Post Type`) VALUES (?,?,?)");
            $stmt->execute([$ID, $_POST['Area'], $type]);


            //delete from drafts
            $sql = 'DELETE FROM news_drafted WHERE Post_ID = :G_DELETE_POST_ID';
            $statement = $conn->prepare($sql);
            $statement->execute([':G_DELETE_POST_ID' => $post_Id]);

            $sql_2 = 'DELETE FROM drafted_post_area WHERE Post_ID = :G_DELETE_POST_ID';
            $statement_2 = $conn->prepare($sql_2);
            $statement_2->execute([':G_DELETE_POST_ID' => $post_Id]);


            echo '<script type="text/javascript">window.open("../view/Repoter_Pending_Post.php", "_self");</script>';
          }
        }



        // insert pending news to draft

        if (isset($_POST['Draft_Pending_NE'])) {

          include '../Model/connect.php';

          $USERID = $_SESSION['System_Actor_ID'];
          $post_Id = $_SESSION['G_PENDING_POST_ID'];

          $last_value_sql = "SELECT Post_Id  FROM news_drafted ORDER BY Post_ID DESC LIMIT 1";
          $last_value_statement = $conn->query($last_value_sql);
          $last_value_results = $last_value_statement->fetchAll(PDO::FETCH_ASSOC);

          if ($last_value_results) {
            foreach ($last_value_results as $last_value_result) {
              $connect = substr($last_value_result['Post_Id'], 7) + 1;
              $ID = "NL-N-D-" . $connect;
            }
            $date = date('Y-m-d H:i:s');


            $stmt = $conn->prepare("INSERT INTO `news_drafted`(`Post_Id`, `Title`, `Create_Date`, `Image`, `Details`, `Creator_Id`, `News_Category`) VALUES (?,?,?,?,?,?,?)");
            $stmt->execute([$ID, $_POST['Title'], $date, file_get_contents($_FILES['Image']['tmp_name']), $_POST['content'] , $USERID, $_POST['Type']]);

            $stmt_2 = $conn->prepare("INSERT INTO `drafted_post_area`(`Post_Id`, `Area`) VALUES (?,?)");
            $stmt_2->execute([$ID, $_POST['Area']]);

            //delete rom pending
            $sql = 'DELETE FROM news_pending WHERE Post_ID = :G_DELETE_POST_ID';
            $statement = $conn->prepare($sql);
            $statement->execute([':G_DELETE_POST_ID' => $post_Id]);

            $sql_2 = 'DELETE FROM pending_post_area WHERE Post_ID = :G_DELETE_POST_ID';
            $statement_2 = $conn->prepare($sql_2);
            $statement_2->execute([':G_DELETE_POST_ID' => $post_Id]);


            echo '<script type="text/javascript">window.open("../view/Repoter_Drafted_Post.php", "_self");</script>';
          }
        }







  ?>






  <!---->


  <div class="content_posts_view">
    <div class="posts_content_view_head" style="font-size: x-large;">
      Pending Posts
    </div>

    
  </div>

  <div class="posts_content_view_body">
    <div class="body_information">

      <?php


      include '../Model/connect.php';

      $USERID = $_SESSION['System_Actor_ID'];
      
      $Type = $_SESSION['Actor_Type'];


      //Print NEWS OR Articles
      
      if($Type == "REPORTER"){
      $variable_1 = "SELECT *FROM news_pending WHERE Creator_ID = '$USERID' AND Reporter_Can_Edit = '1' ORDER BY Post_ID DESC";
      $variable_2 = $conn->query($variable_1);
      $variable_3 = $variable_2->fetchAll(PDO::FETCH_ASSOC);

      if ($variable_3) {
        foreach ($variable_3 as $variable_4) {

          $Post_ID = $variable_4['Post_ID'];
          $img = $variable_4['Image'];
          $img = base64_encode($img);
          $text = pathinfo($variable_4['Post_ID'], PATHINFO_EXTENSION);
          $Type = 'News';

          echo  "
            <div class='box-container' style='margin-bottom: 50px; margin-right: 40px; height: auto;'>
                <div class='box_head' >
                  <img src='data:image/" . $text . ";base64," . $img . "' style='height: 170px;/>                  
                </div>
  
              <div class='box_body' style='display: flex; justify-content: space-between;'>
                <div style='display: flex; flex-direction: column; justify-content: space-around;''>
                <h3> " . $Type . " </h3>  
                <h4>" . $variable_4['Title'] . " </h4>
                  <p>" . $variable_4['Create_Date'] . "</p>

                </div>
  
                <div class='more' style='display: flex; margin-bottom: 10px; flex-direction: column;'>
                  <img src='../images/pen.svg'   onclick=toggle_edit('$Post_ID'); style=' padding-right: 5px; cursor: pointer; margin-top: 10px; height: 37px;'>
                    <i class='far fa-window-close fa-2x' style='color: red; cursor:pointer;'  onclick=togglePopup_Delete_Post_ID_Article('$Post_ID','$Type');></i> 
                </div>
              </div>
            </div> 
            
            
            
      <!--confirm delete popup-->

            

          <div class='navigation-popup  navigation-popup_set_time' id='confirm_delete_article'>
            <div class='navigation-overlay'></div>
              <div class='navigation-content  navigation-popup_set_time' style='width: 300px; height: 280px;'>
                <div class='navigation-content_body  navigation-popup_set_time_body'>
                  <div class='navigation-popup_logo'>
                  <img src='../images/Name.svg'>
                  </div>
                  
                  <hr>

                  <div class='navigation-popup_form'>
                    <h3 class='navigation-popup_title' style='text-align: center;'>Sure to Delete</h3>
                    <div class='navigation-btn_set_option'>

                      <input id='store_delete_post_id' style = 'display:none;'> 
                      <input id='store_delete_post_type' style = 'display:none;'> 

                      <div class='navigation-select_option' onclick=toggle_delete(); style='text-align: center; font-weight: bold; background-color: #FF4444EB;'>Yes</div>
                      <div class='navigation-select_option' onclick=window.open('./N_User_Pending_Posts.php','_self'); style='text-align: center; font-weight: bold;'>No</div>

                    </div>
                  </div>
                </div>
              </div>
          </div>            
            ";
        }
      }
    }


    else{
      $variable_1 = "SELECT *FROM articles_pending WHERE Creator_ID = '$USERID' AND NormalUser_Can_Edit = '1' ORDER BY Post_ID DESC";
      $variable_2 = $conn->query($variable_1);
      $variable_3 = $variable_2->fetchAll(PDO::FETCH_ASSOC);

      if ($variable_3) {
        foreach ($variable_3 as $variable_4) {

          $Post_ID = $variable_4['Post_ID'];
          $img = $variable_4['Image'];
          $img = base64_encode($img);
          $text = pathinfo($variable_4['Post_ID'], PATHINFO_EXTENSION);
          $Type = 'Article';

          echo  "
            <div class='box-container' style='margin-bottom: 50px; margin-right: 40px; height: auto;'>
                <div class='box_head' >
                  <img src='data:image/" . $text . ";base64," . $img . "' style='height: 170px;/>                  
                </div>
  
              <div class='box_body' style='display: flex; justify-content: space-between;'>
                <div style='display: flex; flex-direction: column; justify-content: space-around;''>
                <h3> " . $Type . " </h3>  
                <h4>" . $variable_4['Title'] . " </h4>
                  <p>" . $variable_4['Create Date'] . "</p>

                </div>
  
                <div class='more' style='display: flex; margin-bottom: 10px; flex-direction: column;'>
                  <img src='../images/pen.svg'   onclick=toggle_edit('$Post_ID'); style=' padding-right: 5px; cursor: pointer; margin-top: 10px; height: 37px;'>
                    <i class='far fa-window-close fa-2x' style='color: red; cursor:pointer;'  onclick=togglePopup_Delete_Post_ID_Article('$Post_ID','$Type');></i> 
                </div>
              </div>
            </div> 
            
            
            
      <!--confirm delete popup-->

            

          <div class='navigation-popup  navigation-popup_set_time' id='confirm_delete_article'>
            <div class='navigation-overlay'></div>
              <div class='navigation-content  navigation-popup_set_time' style='width: 300px; height: 280px;'>
                <div class='navigation-content_body  navigation-popup_set_time_body'>
                  <div class='navigation-popup_logo'>
                  <img src='../images/Name.svg'>
                  </div>
                  
                  <hr>

                  <div class='navigation-popup_form'>
                    <h3 class='navigation-popup_title' style='text-align: center;'>Sure to Delete</h3>
                    <div class='navigation-btn_set_option'>

                      <input id='store_delete_post_id' style = 'display:none;'> 
                      <input id='store_delete_post_type' style = 'display:none;'> 

                      <div class='navigation-select_option' onclick=toggle_delete(); style='text-align: center; font-weight: bold; background-color: #FF4444EB;'>Yes</div>
                      <div class='navigation-select_option' onclick=window.open('./N_User_Pending_Posts.php','_self'); style='text-align: center; font-weight: bold;'>No</div>

                    </div>
                  </div>
                </div>
              </div>
          </div>            
            ";
        }
      }
    }





      //Print commercial advertisements


      $variable_1 = "SELECT *FROM com_ads_pending WHERE Creator_ID = '$USERID' AND System_User_Can_Edit = '1' ORDER BY Post_ID DESC";
      $variable_2 = $conn->query($variable_1);
      $variable_3 = $variable_2->fetchAll(PDO::FETCH_ASSOC);

      if ($variable_3) {
        foreach ($variable_3 as $variable_4) {

          $Post_ID = $variable_4['Post_ID'];
          $img = $variable_4['Image'];
          $img = base64_encode($img);
          $text = pathinfo($variable_4['Post_ID'], PATHINFO_EXTENSION);
          $Type = 'Commercial_Advertisement';

          echo  "
            <div class='box-container' style='margin-bottom: 50px; margin-right: 40px; height: auto;'>
                <div class='box_head' >
                  <img src='data:image/" . $text . ";base64," . $img . "' style='height: 170px;/>                  
                </div>
  
              <div class='box_body' style='display: flex; justify-content: space-between;'>
                <div style='display: flex; flex-direction: column; justify-content: space-around;''>
                <h3> " . $Type . " </h3>  
                <h4>" . $variable_4['Title'] . " </h4>
                  <p>" . $variable_4['Create_Date'] . "</p>

                </div>
  
                <div class='more' style='display: flex; margin-bottom: 10px; flex-direction: column;'>
                  <img src='../images/pen.svg'   onclick=toggle_edit_CA('$Post_ID'); style=' padding-right: 5px; cursor: pointer; margin-top: 10px; height: 37px;'>
                    <i class='far fa-window-close fa-2x' style='color: red; cursor:pointer;'  onclick=togglePopup_Delete_Post_ID_CA('$Post_ID','$Type');></i> 
                </div>
              </div>
            </div> 
            
            
            

<!--confirm delete popup-->
            

          <div class='navigation-popup  navigation-popup_set_time' id='confirm_delete_CA'>
            <div class='navigation-overlay'></div>
              <div class='navigation-content  navigation-popup_set_time' style='width: 300px; height: 280px;'>
                <div class='navigation-content_body  navigation-popup_set_time_body'>
                  <div class='navigation-popup_logo'>
                  <img src='../images/Name.svg'>
                  </div>
                  
                  <hr>

                  <div class='navigation-popup_form'>
                    <h3 class='navigation-popup_title' style='text-align: center;'>Sure to Delete</h3>
                    <div class='navigation-btn_set_option'>

                      <input id='store_delete_post_id' style = 'display:none;'> 
                      <input id='store_delete_post_type' style = 'display:none;'> 

                      <div class='navigation-select_option' onclick=toggle_delete(); style='text-align: center; font-weight: bold; background-color: #FF4444EB;'>Yes</div>
                      <div class='navigation-select_option' onclick=window.open('./N_User_Pending_Posts.php','_self'); style='text-align: center; font-weight: bold;'>No</div>

                    </div>
                  </div>
                </div>
              </div>
          </div>            
            ";
        }
      }






      //Print job vacancy


      $variable_1 = "SELECT *FROM job_vacancies_pending WHERE Creator_ID = '$USERID' AND System_User_Can_Edit = '1' ORDER BY Post_ID DESC";
      $variable_2 = $conn->query($variable_1);
      $variable_3 = $variable_2->fetchAll(PDO::FETCH_ASSOC);

      if ($variable_3) {
        foreach ($variable_3 as $variable_4) {

          $Post_ID = $variable_4['Post_ID'];
          $img = $variable_4['Image'];
          $img = base64_encode($img);
          $text = pathinfo($variable_4['Post_ID'], PATHINFO_EXTENSION);
          $Type = 'Job_Vacancy';

          echo  "
                  <div class='box-container' style='margin-bottom: 50px; margin-right: 40px; height: auto;'>
                      <div class='box_head' >
                        <img src='data:image/" . $text . ";base64," . $img . "' style='height: 170px;/>                  
                      </div>
        
                    <div class='box_body' style='display: flex; justify-content: space-between;'>
                      <div style='display: flex; flex-direction: column; justify-content: space-around;''>
                      <h3> " . $Type . " </h3>  
                      <h4>" . $variable_4['Company'] . " </h4>
                        <p>Create Date : " . $variable_4['Create_Date'] . "</p>
                        
                        <p>Position : " . $variable_4['Position'] . "</p>
      
                      </div>
        
                      <div class='more' style='display: flex; margin-bottom: 10px; flex-direction: column;'>
                        <img src='../images/pen.svg'   onclick=toggle_edit_JV('$Post_ID'); style=' padding-right: 5px; cursor: pointer; margin-top: 10px; height: 37px;'>
                          <i class='far fa-window-close fa-2x' style='color: red; cursor:pointer;'  onclick=togglePopup_Delete_Post_ID_JV('$Post_ID','$Type');></i> 
                      </div>
                    </div>
                  </div> 
                  
                  
                  
<!--confirm delete popup-->      
      
                  
      
        <div class='navigation-popup  navigation-popup_set_time' id='confirm_delete_JV'>
          <div class='navigation-overlay'></div>
            <div class='navigation-content  navigation-popup_set_time' style='width: 300px; height: 280px;'>
              <div class='navigation-content_body  navigation-popup_set_time_body'>
                <div class='navigation-popup_logo'>
                <img src='../images/Name.svg'>
                </div>
                
                <hr>
      
                <div class='navigation-popup_form'>
                  <h3 class='navigation-popup_title' style='text-align: center;'>Sure to Delete</h3>
                  <div class='navigation-btn_set_option'>

                  <input id='store_delete_post_id' style = 'display:none;'> 
                      <input id='store_delete_post_type' style = 'display:none;'> 
      
                    <div class='navigation-select_option' onclick=toggle_delete(); style='text-align: center; font-weight: bold; background-color: #FF4444EB;'>Yes</div>
                    <div class='navigation-select_option' onclick=window.open('./N_User_Pending_Posts.php','_self'); style='text-align: center; font-weight: bold;'>No</div>
      
                  </div>
                </div>
              </div>
            </div>
        </div>            
                  ";
        }
      }






      //Print notice


      $variable_1 = "SELECT *FROM notices_pending WHERE Creator_ID = '$USERID' AND System_User_Can_Edit = '1' ORDER BY Post_ID DESC";
      $variable_2 = $conn->query($variable_1);
      $variable_3 = $variable_2->fetchAll(PDO::FETCH_ASSOC);

      if ($variable_3) {
        foreach ($variable_3 as $variable_4) {

          $Post_ID = $variable_4['Post_ID'];
          $img = $variable_4['Image'];
          $img = base64_encode($img);
          $text = pathinfo($variable_4['Post_ID'], PATHINFO_EXTENSION);
          $Type = 'Notice';

          echo  "
                  <div class='box-container' style='margin-bottom: 50px; margin-right: 40px; height: auto;'>
                      <div class='box_head' >
                        <img src='data:image/" . $text . ";base64," . $img . "' style='height: 170px;/>                  
                      </div>
        
                    <div class='box_body' style='display: flex; justify-content: space-between;'>
                      <div style='display: flex; flex-direction: column; justify-content: space-around;''>
                      <h3> " . $Type . " </h3>  
                      <h4>" . $variable_4['Title'] . " </h4>
                        <p>Create Date : " . $variable_4['Create Date'] . "</p>
                      </div>
        
                      <div class='more' style='display: flex; margin-bottom: 10px; flex-direction: column;'>
                        <img src='../images/pen.svg'   onclick=toggle_edit_NO('$Post_ID'); style=' padding-right: 5px; cursor: pointer; margin-top: 10px; height: 37px;'>
                          <i class='far fa-window-close fa-2x' style='color: red; cursor:pointer;'  onclick=togglePopup_Delete_Post_ID_NO('$Post_ID','$Type');></i> 
                      </div>
                    </div>
                  </div> 
                  
                  
                  
      
<!--confirm delete popup-->      
                  
      
        <div class='navigation-popup  navigation-popup_set_time' id='confirm_delete_NO'>
          <div class='navigation-overlay'></div>
            <div class='navigation-content  navigation-popup_set_time' style='width: 300px; height: 280px;'>
              <div class='navigation-content_body  navigation-popup_set_time_body'>
                <div class='navigation-popup_logo'>
                <img src='../images/Name.svg'>
                </div>
                
                <hr>
      
                <div class='navigation-popup_form'>
                  <h3 class='navigation-popup_title' style='text-align: center;'>Sure to Delete</h3>
                  <div class='navigation-btn_set_option'>

                  <input id='store_delete_post_id' style = 'display:none;'> 
                      <input id='store_delete_post_type' style = 'display:none;'> 
      
                    <div class='navigation-select_option' onclick=toggle_delete(); style='text-align: center; font-weight: bold; background-color: #FF4444EB;'>Yes</div>
                    <div class='navigation-select_option' onclick=window.open('./N_User_Pending_Posts.php','_self'); style='text-align: center; font-weight: bold;'>No</div>
      
                  </div>
                </div>
              </div>
            </div>
        </div>            
                  ";
        }
      }





      ?>

    </div>
  </div>

</body>

<script>
  function showsort() {
    document.getElementById("sortdrop").classList.toggle("show");
  }

  function filterFunction() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    div = document.getElementById("sortdrop");
    a = div.getElementsByTagName("a");
    for (i = 0; i < a.length; i++) {
      txtValue = a[i].textContent || a[i].innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        a[i].style.display = "";
      } else {
        a[i].style.display = "none";
      }
    }
  }

  function toggle_edit(PENDING_POST_ID) {
    $.ajax({
      url: "../Control/N_User_Post_Handle.php",
      type: "POST",
      data: {
        PENDING_POST_ID: PENDING_POST_ID,
      },
      success: function(data) {
        window.open('./N_User_Edit_Article.php', '_self');
      }
    });
  }

  function toggle_edit_CA(PENDING_POST_ID) {
    $.ajax({
      url: "../Control/N_User_Post_Handle.php",
      type: "POST",
      data: {
        PENDING_POST_ID: PENDING_POST_ID,
      },
      success: function(data) {
        window.open('./N_User_Edit_Commercial_Ad.php', '_self');
      }
    });
  }

  function toggle_edit_JV(PENDING_POST_ID) {
    $.ajax({
      url: "../Control/N_User_Post_Handle.php",
      type: "POST",
      data: {
        PENDING_POST_ID: PENDING_POST_ID,
      },
      success: function(data) {
        window.open('./N_User_Edit_Job_Vacancy.php', '_self');
      }
    });
  }

  function toggle_edit_NO(PENDING_POST_ID) {
    $.ajax({
      url: "../Control/N_User_Post_Handle.php",
      type: "POST",
      data: {
        PENDING_POST_ID: PENDING_POST_ID,
      },
      success: function(data) {
        window.open('./N_User_Edit_Notice.php', '_self');
      }
    });
  }

  // delete post

  function toggle_delete() {
  var DELETE_POST_ID = document.getElementById("store_delete_post_id").value;
  var DELETE_POST_TYPE  = document.getElementById("store_delete_post_type").value;
    $.ajax({
      url: "../Control/N_User_Post_Handle.php",
      type: "POST",
      data: {
        DELETE_POST_ID: DELETE_POST_ID,
        DELETE_POST_TYPE: DELETE_POST_TYPE,
      },
      success: function(data) {
        window.open('./N_User_Delete_Post.php', '_self');
      }
    });
  }

  function togglePopup_Delete_Post_ID_Article(Post_Id, Post_Type){
    const xhttp = new XMLHttpRequest(); 
      xhttp.onload = function() {
          document.getElementById("store_delete_post_id").value = Post_Id;
          document.getElementById("store_delete_post_type").value = Post_Type;
      }
      xhttp.open("GET", Post_Id, Post_Type);
      xhttp.send(); 

      document.getElementById('confirm_delete_article').classList.toggle("active");
  }


  function togglePopup_Delete_Post_ID_CA(Post_Id, Post_Type){
    const xhttp = new XMLHttpRequest(); 
      xhttp.onload = function() {
          document.getElementById("store_delete_post_id").value = Post_Id;
          document.getElementById("store_delete_post_type").value = Post_Type;
      }
      xhttp.open("GET", Post_Id, Post_Type);
      xhttp.send(); 

      document.getElementById('confirm_delete_CA').classList.toggle("active");
  }


  function togglePopup_Delete_Post_ID_JV(Post_Id, Post_Type){
    const xhttp = new XMLHttpRequest(); 
      xhttp.onload = function() {
          document.getElementById("store_delete_post_id").value = Post_Id;
          document.getElementById("store_delete_post_type").value = Post_Type;
      }
      xhttp.open("GET", Post_Id, Post_Type);
      xhttp.send(); 

      document.getElementById('confirm_delete_JV').classList.toggle("active");
  }

  function togglePopup_Delete_Post_ID_NO(Post_Id, Post_Type){
    const xhttp = new XMLHttpRequest(); 
      xhttp.onload = function() {
          document.getElementById("store_delete_post_id").value = Post_Id;
          document.getElementById("store_delete_post_type").value = Post_Type;
      }
      xhttp.open("GET", Post_Id, Post_Type);
      xhttp.send(); 

      document.getElementById('confirm_delete_NO').classList.toggle("active");
  }





</script>


</html>