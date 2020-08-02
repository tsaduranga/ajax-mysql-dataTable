
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
            //console.log("name"+full_name);
            //console.log("email"+email);
           // console.log("phone"+phone);
           // console.log("address"+address);
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
      
 
   
    });
</script> 