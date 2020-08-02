
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Table Data Edit</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
 
<body>
    <div class="container">
        <h1 align="center">Ajax Data Table using MySQL and PHP</h1>
        <br />
        <div id="disp_data"></div>
    </div>
</body>
 
</html>
<script>
    $(document).ready(function() {
        function fetch_data() {
            $.ajax({
                url: "select.php",
                method: "POST",
                success: function(data) {
                    $('#disp_data').html(data);
                }
            });
        }
        fetch_data();



        $(document).on('click', '#add', function() {
            var full_name = $('#full_name').text();
            var email = $('#email').text();
            var phone = $('#phone').text();
            var address = $('#address').text();

            if (full_name == '') {
                alert("Enter Full Name");
                return false;
            }
            if (email == '') {
                alert("Enter email ..");
                return false;
            }
            if (phone == '') {
                alert("Enter phone ..");
                return false;
            }
            if (address == '') {
                alert("Enter address ..");
                return false;
            } 

            $.ajax({
                url: "insert.php",
                method: "POST",
                data: {
                    full_name: full_name,
                    email: email,
                    phone: phone,
                    address: address
                },
                dataType: "text",
                success: function(data) {
                    alert(data);
                    fetch_data();
                }
            })
        }); 


        $(document).on('click', '#delete', function() {
            var id = $(this).data("id3");
            if (confirm("Are you sure you want to delete this?")) {
                $.ajax({
                    url: "delete.php",
                    method: "POST",
                    data: {
                        id: id
                    },
                    dataType: "text",
                    success: function(data) {
                        alert(data);
                        fetch_data();
                    }
                });
            }
        });


        $(document).on('click', '#edit', function() {

            var id = $(this).data("id4");

            var full_name = $(this).closest("tr")   // Finds the closest row <tr> 
                    .find(".full_name")     // Gets a descendent with class="nr"
                    .text(); 

            var email = $(this).closest("tr")   
                    .find(".email")     
                    .text(); 

            var phone = $(this).closest("tr")   
                    .find(".phone")     
                    .text(); 

            var address = $(this).closest("tr")   
                    .find(".address")     
                    .text(); 

                
            edit_data(id, full_name, email, phone, address);

         });


    function edit_data(id, full_name, email, phone, address) {


            $.ajax({
                url: "edit.php",
                method: "POST",
                data: {
                    id: id,
                    full_name: full_name,
                    email: email,
                    phone: phone,
                    address: address
                },
                dataType: "text",
                success: function(data) {
                    alert(data);
                }
            }); 
        }


        $(document).on('click', '#new_row', function(){

            var html= '<tr><td><button type="button" id="remove_row" class="btn btn-secondary" > - </button><td></td></td><td id="full_name" contenteditable></td><td id="email" contenteditable></td><td id="address" contenteditable></td><td id="phone" contenteditable></td> <td><button type="button" class="btn btn-primary" name="add" id="add">Add</button></td</tr>';
            $("table").append(html);
        });
           
        
        $(document).on('click', '#remove_row', function(){

            $(this).closest('tr').remove();
        });


            
      
 
   
    });
</script> 