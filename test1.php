<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="<?= URL ?>public/js/jquery-3.4.1.min.js"></script>
    <title>Ajax</title>
</head>
<body>

<button>Send Request With Ajax</button>

<script>
    $('button').click(function(){
        let url = 'test.php';
        let data = {'number':3};
       $.post(url, data, function(msg,status){
           alert(status);
       });
    });

    $('button').click(function(){
        $('button').css('width', '400px');
    })

</script>

</body>
</html>