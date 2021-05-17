<html>

<head>
    <title>AJAX Calculator Task</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body style="margin-left: 50px;">
    <form>
        <h2>Perform Calculations</h2>
        <label for="first">Input one : </label>
        <input type="number" value="First" name="parameter_1" id="parameter_1">
        <br>
        <br>
        <label for="second">Input two: </label>
        <input type="number" name="parameter_2" id="parameter_2">
        <input type="text" value="" id="operation" name="operation" hidden>
        <br>
        <br>
        <input id="plus" type="button" class="btn-submit" value="plus">
        <input id="minus" type="button" class="btn-submit" value="minus">
        <input id="multiply" type="button" class="btn-submit" value="multiply">
        <input id="divide" type="button" class="btn-submit" value="divide">
        <br>
        <br>
        <label for="result">Result : </label>
        <h2 id="result">
        </h2>
    </form>
</body>
<script>
$(document).ready(function() {
    //checking button click
    $('#plus, #minus, #multiply, #divide').click(function() {
        var parameter_1 = $('#parameter_1').val();
        var parameter_2 = $('#parameter_2').val();
        $('#operation').val($(this).val()); //getting operation value
        var operation = $('#operation').val();
        if (parameter_1.length < 1 || parameter_2.length < 1) {
            alert('Text-Fields cannot be empty.');
            return false;
        }

        //AJAX Call
        $.ajax({
            type: "POST",
            url: "calculation.php",
            data: {
                parameter_1: parameter_1,
                parameter_2: parameter_2,
                operation: operation
            },
            cache: false,
            success: function(data) {
                $('#result').html(data);
            },
            error: function(xhr, status, error) {
                $('#result').html(xhr);
            }
        });
    })
});
</script>

</html>