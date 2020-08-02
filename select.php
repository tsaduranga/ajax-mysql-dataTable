<?php 
    $conn = mysqli_connect("localhost", "root", "", "ajaxdata"); 
    $output = ''; 
    $sql = "SELECT * FROM students ORDER BY id DESC"; 
    $result = mysqli_query($conn, $sql); 
    $output .= ' 
        <div align="center"> 
        <table class="table" border="1" bordercolor="#00CCCC"> 
        <tr> 
        <th width="10%">Id</th> 
        <th width="30%">Name</th> 
        <th width="20%">Email</th> 
        <th width="40%">Address</th>
        <th width="10%">Contact No</th>
        <th width="10%">Edit</th> 
        <th width="10%">Delete</th>
            </tr>'; 
    if(mysqli_num_rows($result) > 0) 
    { 
    while($row = mysqli_fetch_array($result)) 
    { 
    $output .= ' 
        <tr> 
        <td>'.$row["id"].'</td> 
        <td class="full_name"  data-id1="'.$row["id"].'" contenteditable>'.$row["full_name"].'</td> 
        <td class="email"  data-id2="'.$row["id"].'" contenteditable>'.$row["email"].'</td> 
        <td class="address"  data-id3="'.$row["id"].'" contenteditable>'.$row["address"].'</td> 
        <td class="phone"  data-id4="'.$row["id"].'" contenteditable>'.$row["phone"].'</td> 
        <td><button class="btn btn-warning" type="button" name="edit_btn" data-id4="'.$row["id"].'" id="edit">Edit</button></td>  
        <td><button type="button" class="btn btn-danger" name="delete_btn" data-id3="'.$row["id"].'" id="delete">Delete</button></td> 
        </tr> 
        '; 
        } 
 $output .= ' 
        <tr> 
        <td></td> 
        <td id="full_name" contenteditable></td> 
        <td id="email" contenteditable></td>
        <td id="address" contenteditable></td> 
        <td id="phone" contenteditable></td> 
        <td><button type="button" class="btn btn-primary" name="add" id="add">Add</button></td> 
        </tr> 
 '; 
 } 
 else 
 { 
        $output .= '
        <tr> 
        <td><button type="button" class="btn btn-primary" name="add" id="add">Add</button></td> 
        <td id="full_name" contenteditable></td> 
        <td id="email" contenteditable></td>
        <td id="address" contenteditable></td> 
        <td id="phone" contenteditable></td> 
        </tr> 
        '; 
 } 
        $output .= '</table> 
        </div>'; 
 echo $output; 
 ?>