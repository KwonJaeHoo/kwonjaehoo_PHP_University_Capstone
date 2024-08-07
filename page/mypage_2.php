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
    
    h3, h4
    {   
        font-family: 'Roboto';
        text-align: left;
    }

    body 
    {
        font-family: 'Roboto';
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
        
    #mypage_verifybutton
    {
        background: #B8A7DA;
        border-radius: 20px;
        border: 1px;
        border-color:white;
    }  
        
    .bar
    {
        position: absolute;
        width: 699px;
        height: 0px;
        left:-1px;
        top:140px;
        border: 3px solid #ADA1C5;
    }
    .form-control
    {
        box-sizing: border-box;
        background: #FFFFFF;
        border: 4px solid #ADA1C5;
    } 
</style>
</head>
<body>
    
<?php 
    if ($jb_login) 
    {
?>
    <br></br>
    <div class="container"> 
        <div class="input-form-backgroud row"> 
            <div class="input-form col-md-12 mx-auto">
                <div style="width:545px; float:left; margin-right:20px;"> 
                <img style="width:25px; height:25px; left:10px; top:10px; position:relative; z-index:2;" src="images/icon/Before.png" onclick = "location.href = 'mypage.php'"> </div>
                <div style="position: absolute; top:-3px; left: 530px;"> 
                <img src="images/icon/Group60.svg" onclick = "location.href = 'index.php'"> </div>     
            <br></br><h3><strong> 여행지를 찾아주는 남자들 </strong></h3><h7>&nbsp;Travel Map Memory Change Password</h7>
            <div class="bar"> </div>
                <form method="POST" action="mypagePWCHProcess.php" name="mpForm">
                    <div class="w-50 ml-auto mr-auto mt-5">
                        <div class="mb-5 ">
                            <label for = "mp_password" class="form-label"><strong>현재 비밀번호</strong></label>
                            <input name = "mp_password" type = "password" class = "form-control" id = "mp_password" placeholder="비밀번호를 입력해주세요.">
                            <small id="HelpInline" class="text-muted"> 현재 비밀번호를 입력해주세요. </small>
                        </div>
                        <div class="mb-5 ">
                            <label for = "mp_password_ch" class="form-label"><strong>새 비밀번호</strong></label>
                            <input name = "mp_password_ch" type = "password" class = "form-control" id = "mp_password_ch" placeholder="비밀번호를 입력해주세요.">
                            <small id="HelpInline" class="text-muted"> 비밀번호는 8~16자를 사용해주세요. </small>
                        </div>
                        <div class="mb-5 ">
                            <label for = "mp_password_ck" class="form-label"><strong>새 비밀번호 확인</strong></label>
                            <input name = "mp_password_ck" type = "password" class = "form-control" id = "mp_password_ck" placeholder="비밀번호를 입력해주세요.">
                            <small id="HelpInline" class="text-muted"> 비밀번호를 다시한번 입력해주세요. </small>
                        </div>
                        <div class="mb-3 ">
                            <button type="button" id = "mypage_verifybutton" class="btn btn-dark mb-2" onclick ="mpCheck()">변경하기</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<script>
    
    function mpCheck()
    {
        const mpForm = document.mpForm;
        const mp_password = document.getElementById('mp_password').value;
        const mp_password_ch = document.getElementById('mp_password_ch').value;
        const mp_password_ck = document.getElementById('mp_password_ck').value;
        const nextsession = confirm("비밀번호를 변경 하시겠습니까?");
        
        if (mp_password === "")
        {
            alert("비밀번호를 입력해주세요.");
            mp_password.focus();
            return false;			 		 
        }
        else if (mp_password_ch === "")
        {
            alert("새 비밀번호를 입력해주세요.");
            mp_password_ch.focus();
            return false;			 		 
        }
        else if (mp_password_ck === "")
        {
            alert("새 비밀번호 확인을 입력하세요.");
            mp_password_ck.focus();
            return false;			 		 
        }
        else if(mp_password_ch.length < 8 || mp_password_ch.length > 16)
        {
            alert("새 비밀번호를 8~16자로 입력해주세요. ");
            mp_password_ch.focus();
            return false;
        }
        else if(mp_password === mp_password_ch)
        {
            alert("현재 비밀번호와 변경 비밀번호가 같습니다."); 
            return false;   
        }
        else if(mp_password_ch !== mp_password_ck)
        {
            alert("새 비밀번호와 새 비밀번호 확인값이 일치하지 않습니다."); 
            return false;   
        }
        else if (nextsession == true)
        {
            mpForm.submit();
        }
        else (nextsession == false)
        {
            return false;
        }     
    }    
</script> 
    
<?php 
    } 
    else
    {   
?>

<script>
    alert("잘못된 접근입니다. ");
    location.href = "index.php";
</script>

<?php
    }
?> 

</body>
</html>