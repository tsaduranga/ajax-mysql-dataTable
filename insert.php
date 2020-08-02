<?php 
 $conn = mysqli_connect("localhost", "root", "", "ajaxdata"); 
 $sql = "INSERT INTO students (full_name, email, phone,address) VALUES('".$_POST["full_name"]."', '".$_POST["email"]."','".$_POST["phone"]."', '".$_POST["address"]."')"; 
 if(mysqli_query($conn, $sql)) 
 { 
 echo 'Record Inserted Successfully!'; 
 } 
 ?> 