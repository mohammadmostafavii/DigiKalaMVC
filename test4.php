<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<div class="content">

</div>

<script>

    function ClickTag(TagId){
        let url = '';
        let data = {'tagId':TagId};
        $.post(url, data, function(msg){
                let modal = '<div><span>UserName:<span><input type="text" value='+msg['inputValue']+'><span>Your Image:</span><img src="'+msg['imageAddress']+'"></div>';
                $('.content').append(tableTag);
            }, 'json');
</script>
</body>
</html>