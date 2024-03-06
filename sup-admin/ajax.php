<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <form id="myForm">
        <label for="name">Name:</label>
            <input type="text" id="name" name="name">

        <label for="email">Email:</label>
            <input type="email" id="email" name="email">

        <label for="city">City</label>
            <select id="city" name="city">
                <option value="select">select</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
            </select>

        <button type="button" id="submitBtn">Submit</button>
    </form>
    <div id="response"></div>  
</body>
</html>

<!-- index.html -->

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function () {
        $("#submitBtn").click(function () {
            var name = $("#name").val();
            var email = $("#email").val();
            var city = $("#city").val();

            if(name === '' || email === '' || city === 'select'){
                $('#response').removeClass('success-msg').addClass('error-msg').html('All fields are required.'); 
            }
            else{
                $.ajax({
                    type: "POST",
                    url: "save-ajax.php",
                    data: {
                        name: name,
                        email: email,
                        city :city
                    },
                    success: function (response) {
                        $('#response').html(response);
                    }
                });
            }
        });
    });
</script>
