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

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jua&display=swap" rel="stylesheet">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js" integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD" crossorigin="anonymous"></script>

<style>

a{ text-decoration: none; } /* 링크텍스트에 밑줄없앰 */
        
        button{ cursor: pointer; }
            
        img{ cursor: pointer; }

    h6,h3, h4
    {   
        font-family: 'Roboto';
        text-align: left;
    }
    
    body 
    {
        font-family: 'Jua';
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
    .bar{
        position: absolute;
        left:-1px;
        width: 699px;
        height: 0px;
        top:140px;
        border: 3px solid #ADA1C5;
        }

    #signup-button
    {
        background: #B8A7DA;
        border-radius: 20px;
        border: 1px;
        border-color:white;   
    }
    #signup_id, #signup_password, #signup_passwordCheck
    {
        box-sizing: border-box;
        background: #FFFFFF;
        border: 4px solid #ADA1C5;  
    }
    #signupbtn
    {
        background: #B8A7DA;
        border-radius: 20px;
        border: 1px;
        border-color:white;
    }  

</style>
</head>
<body>
    
<?php
    if ($jb_login)
    {
?>

<script>
    alert("이미 로그인중입니다.");
    location.href = "index.php";
</script>

<?php
    } 
    else 
    {
        setcookie("PHPSESSID");
?>

<br></br>
    <div class="container"> 
        <div class="input-form-backgroud row"> 
            <div class="input-form col-md-12 mx-auto">
            <img style="width:25px; height:25px; left:10px; top:10px; position:relative; z-index:2;" src="images/icon/Before.png" onclick = "location.href = 'login.php'">
                <div style="position: absolute;  top:-3px; left: 530px;"> <img src="images/icon/Group60.svg" onclick = "location.href = 'index.php'"> </div>        
                <br></br><h3><strong>&nbsp;여행지를 찾아주는 남자들</strong></h3><h6>&nbsp;&nbsp;&nbsp;Travel Map Memory Sign Up</h6>
            <div class="bar"> </div>
                <form method="POST" action="signupProcess.php" name="signup_Form">
                    <div class="w-50 ml-auto mr-auto mt-5">
                        <div class="mb-5 ">
                            <label for = "signup_id" class="form-label">아이디</label>
                            <input name ="id" type = "id" class = "form-control" id="signup_id" placeholder="아이디를 입력해주세요.">
                            <small id="HelpInline" class="text-muted"> 아이디는 4~16자를 입력해주세요. </small>
                        </div>
                        <div class="mb-5 ">
                            <label for = "signup_password" class="form-label">비밀번호</label>
                            <input name = "password" type = "password" class = "form-control" id = "signup_password" placeholder="비밀번호를 입력해주세요.">
                            <small id="HelpInline" class="text-muted"> 비밀번호는 8~16자를 사용해주세요. </small>
                        </div>
                        <div class="mb-5 ">
                            <label for = "signup_passwordCheck" class="form-label">비밀번호 재확인</label>
                            <input   type = "password" class = "form-control" id="signup_passwordCheck" placeholder="비밀번호를 입력해주세요.">
                            <small id="HelpInline" class="text-muted"> 비밀번호를 다시한번 입력해주세요. </small>
                        </div>
                        <div class="mb-3 ">
                            <button type="button" id="signupbtn" class="btn btn-dark mb-3" onclick ="SignupCheck()">회원가입</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
<script>

    function SignupCheck()
    {
        const sign_Form = document.signup_Form;
        const signup_id = document.getElementById('signup_id').value;
        const signup_password = document.getElementById('signup_password').value;
        const signup_passwordCheck = document.getElementById('signup_passwordCheck').value;

        if(signup_id === "")
        {
            alert("아이디를 입력하세요");
            signup_id.focus();
            return false;
                             
        }
        if(signup_id.length < 4 || signup_id.length > 16)
        {
            alert("아이디를 4~16자로 입력해주세요. ");
            signup_id.focus();
            return false;
        }
        if(signup_password === "")
        {
            alert("비밀번호를 입력하세요");
            signup_password.focus();
            return false;
                            
        }
        if(signup_password.length < 8 || signup_password.length > 16)
        {
            alert("비밀번호를 8~16자로 입력해주세요. ");
            signup_password.focus();
            return false;
        }
        if(signup_passwordCheck === "")
        {
            alert("비밀번호 확인칸을 입력하세요");
            signup_passwordCheck.focus();
            return false;
                            
        }
        if(signup_password && signup_password !== signup_passwordCheck)
        {
            alert("비밀번호가 서로 일치하지 않습니다");    
        }
        if(signup_id && signup_id !== "" && signup_password && signup_password === signup_passwordCheck)
        { 
            sign_Form.submit();
        }
	}

</script>

<?php
    }
?>

</body>
</html>