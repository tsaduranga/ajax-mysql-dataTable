<?php 
 $conn = mysqli_connect("localhost", "root", "", "ajaxdata"); 
  $id = $_POST["id"]; 

  $full_name= $_POST["full_name"]; 
  $email = $_POST["email"];
  $address= $_POST["address"]; 
  $phone = $_POST["phone"]; 


    

 $sql = "UPDATE students SET full_name = '".$full_name."', email = '".$email."', address = '".$address."', phone = '".$phone."' WHERE id = '".$id."'"; 
 if(mysqli_query($conn, $sql)) 
 { 
 echo 'Data Updated'; 
 } 
 ?> 