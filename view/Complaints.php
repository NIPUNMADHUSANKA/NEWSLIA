<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin_Home</title>
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/complaint_tables.css">
    <link rel="shortcut icon" type = "image/x-icon" href = "../images/logo.ico">


</head>

<style>
 
  .complaint_list{
      margin-top:3rem;
  }

  .content{
    margin-top:1rem;
  }
</style>



<body>

<!--navigation-->

<?php $page = 'complaints';
  include 'nav.php'; ?>

<!--End of Navigation-Bar-->



<!--Admin Page Content -->
<form action="./Complaints.php" method="POST" class = "complaint_list">


<div class="title"><center><h3>COMPLAINTS</h3></center></div>
  <div class="content">
  <table>
 <tr><th>Complaint ID</th><th>Date</th><th>Complainer_ID</th><th>News_ID</th><th>Details</th><th></th><th></th></tr>

 <?php
include '../Model/connect.php';

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $sql = 'select * from complaint';

    $q = $pdo->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}
?>

<?php while ($row = $q->fetch()): ?>           

 <tr>
     <td><?php echo $row['Complaint_ID']; ?></td>
     <td><?php echo $row['Date']; ?></td>
     <td> <?php echo $row['Complainer_ID'] ?></td>
     
     <td><textarea rows="4" cols="80" disabled class="input1" id="description" name="Details" ><?php echo $row['Details']; ?></textarea></td>
     
     <td>
       <form action='./Complaints.php' method='POST'>
         <input type="hidden" name="Complaint_ID" value="<?php echo $row['Complaint_ID']?>" > 
         <input type="submit" name="Accept_Complaint" value="Accept" class="accept">
       </form>
    </td>
    
    <td>

      <form action='./Complaints.php' method='POST'>

         <input type="hidden" name="Complaint_ID" value="<?php echo $row['Complaint_ID']?>" >
         <input type="hidden" name="Complainer_ID" value="<?php echo $row['Complainer_ID']?>" >
         <input type="hidden" name="News_ID" value="<?php echo $row['News_ID']?>" >
         <input type="hidden" name="Date" value="<?php echo $row['Date']?>" >
         <input type="hidden" name="Details" value="<?php echo $row['Details']?>" >

         <input type="submit" name="Reject_Complaint" value="Reject" class="reject">

      </form>
      
    </td>


 </tr>

<?php endwhile; ?>
</table>
</form>


<?php
  
  if(isset($_POST['Reject_Complaint'])){
      
      $CID = $_POST['Complaint_ID'];
      $UID = $_POST['Complainer_ID'];
      $NID = $_POST['News_ID'];
      $Date = $_POST['Date'];
      $Details = $_POST['Details'];

      $reject_sql = $conn->prepare("INSERT INTO `reject_complaint` VALUES(?,?,?,?,?)");
      $result = $reject_sql->execute([$CID,$UID,$NID,$Date,$Details]);

      if($result){
        $query = "DELETE FROM complaint WHERE Complaint_ID  = :CID";
        $query_statement = $conn->prepare($query);
        $query_statement->bindParam(':CID',$CID);
        $query_statement->execute();
      }
      
      echo "<script>window.open('./Rejected Complaints.php','_self')</script>";

  }

?>

</body>
</html>

