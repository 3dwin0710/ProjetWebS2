<?php

session_start(); 

$priority = $_POST['Priority'];
$name = $_POST['Name'];
$describe = $_POST['Description'];
$status = $_POST['Status'];
$session = $_SESSION['Username'];
$sepwd = $_SESSION['loginCode'];


 $con = mysqli_connect("localhost","root","");
 $db = mysqli_select_db($con,'ProjetWebS2');

 if(isset($_POST['btnch1'])){

 	$query = "SELECT u_userkey FROM Utilisateur WHERE u_username = '$session' AND u_password = '$sepwd' ";
  $result = $con->query($query);
  if ($ligne = $result->fetch_assoc()) {
			$id= $ligne['u_userkey'];
			echo $id;

			$query2 = "INSERT INTO `Tache` (t_priority,t_userkey,t_name,t_description,t_status) VALUES ('$priority','$id','$name','$describe','$status');"; 
    		
    	$res = $con->query($query2);
     if($res){
    echo "<script>alert('Sugoi!!,Add success')</script>";
     echo '<script type = "text/javascript"> window.location.href = "Todolist.php"; </script>';

     }
     else{
     
     echo "<script>alert('Ach Nein, register failed')</script>";
     	echo '<script type = "text/javascript"> window.location.href = "Todolist.php"; </script>';
     }
 }


 }
 $con->close();


?>