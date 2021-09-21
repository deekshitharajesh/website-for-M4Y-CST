<?php
  $name = htmlspecialchars($_POST['name']);
  $email = htmlspecialchars($_POST['email']);
  $phone = htmlspecialchars($_POST['phone']);
  $website = htmlspecialchars($_POST['website']);
  $message = htmlspecialchars($_POST['message']);

  $conn = new mysqli('localhost','root','','contact');
  if($conn->connect_error){
      die('Connection Failed : '.$conn->connect_error);
  }else{
      $stmt = $conn->prepare("insert into contactus(name,email,phone,website,message)
      values(?,?,?,?,?)");
      $stmt->bind_param("ssiss",$name,$email,$phone,$website,$message);
      $stmt->execute();
      $stmt->close();
      $conn->close();
  }
?>