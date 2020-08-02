<?php 
 $conn = mysqli_connect("localhost", "root", "", "ajaxdata"); 
 $sql = "DELETE FROM students WHERE id = '".$_POST["id"]."'"; 
 if(mysqli_query($conn, $sql)) 
 { 
 echo 'Data Deleted Successufully!'; 
 } 
 ?> 