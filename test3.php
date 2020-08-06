<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="public/js/jquery-3.4.1.min.js"></script>
    <script src="city.js"></script>
    <script src="ostan.js"></script>
    <title>Document</title>
</head>
<body>

<select name="province" id="province">

</select>

<select name="city" id="city">

</select>


<script>
    loadOstan('province');
    $('#province').change(function(){
        let i = $(this).find('option:selected').val();
        ldMenu(i, 'city');
    });
</script>

</body>
</html>