<?php 
    include 'login_verify.php';
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>여행지를 찾아주는 남자들</title>

    <link rel="apple-touch-icon" sizes="57x57" href="/images/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/images/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/images/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/images/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/images/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/images/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/images/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/images/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/images/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/images/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/images/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="/images/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/images/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jua&display=swap" rel="stylesheet">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js" integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD" crossorigin="anonymous"></script>
        
<style>
    a{ text-decoration: none; } /* 링크텍스트에 밑줄없앰 */
    
    img
    {
        cursor: pointer;
    }

    h3, h4
    {   
        font-family: 'Roboto';
        text-align: left;
    }

    h5
    { 
        font-family: 'Roboto';
    }

    h6
    {
        padding: 5px 1em 0 1em;
        font-family: 'Roboto';
        cursor: pointer;
    }
        
    body 
    {
        min-height: 100vh;
        background: -webkit-linear-gradient(bottom left, #D3C1F6 30%,rgba(241, 222, 245, 0.25));
        background: -moz-linear-gradient(bottom left, #D3C1F6 30%, rgba(241, 222, 245, 0.25));
        background: -o-linear-gradient(bottom left, #D3C1F6 30%,rgba(241, 222, 245, 0.25));
        background: linear-gradient(to top right, #D3C1F6 30%, rgba(241, 222, 245, 0.25));  
    }
        
    .input-form 
    {
        position: absolute;
        width: 700px;
        height: 700px;
        left: 33%;
        top: 123px;
        background: #FFFFFF;
        border: 1px solid rgba(0, 0, 0, 0.4);
        box-shadow: 0px 4px 9px rgba(0, 0, 0, 0.25);
        border-radius: 34px;
    }
    
    .bar
    {
        position: absolute;
        width: 699px;
        top:250px;
        height: 0px;
        border: 3px solid #ADA1C5;
    }

</style>
</head>
<body>
    
<?php 
    if ($jb_login) 
    {
?>
<div class="input-form"> 
    <div style="position: absolute; width: 296px; height: 174px;  "><img  src="images/icon/illl3.svg"></div>
        <div style="position: absolute; top:180px; left: 530px;"> <img src="images/icon/Group60.svg" onclick = "location.href = 'index.php'"> </div>
            <div class="bar"> </div>
                <div style="position: absolute; width: 500px; height: 114.13px; top: 290px;"> <img src="images/icon/Group117.svg" onclick = "mywritepage()"> </div>
                <div style="position: absolute; width: 500px; height: 114.13px; top: 408px;"> <img src="images/icon/Group118.svg" onclick = "mypwdchange()"> </div>
                <div style="position: absolute; width: 500px; height: 114.13px; top: 532px;"> <img src="images/icon/Group119.svg" onclick = "mydatadel()"> </div>
</div>
 
<script>

    function mywritepage()
    {
        location.href = "mypage_1.php";
    }
    function mypwdchange()
    {
        location.href = "mypage_2.php";
    }     
    function mydatadel()
    { 
        location.href = "mypage_3.php";
    }
</script>

<?php 
    } 
    else
    {   
?>

<script>
    alert("로그인이 되어있지 않습니다. 로그인을 해 주세요. ");
    location.href = "login.php";
</script>

<?php
    }
?>     

</body>
</html>