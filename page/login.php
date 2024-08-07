<?php
    include 'login_verify.php';
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>여행지를 찾아주는 남자들</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jua&display=swap" rel="stylesheet">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js" integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD" crossorigin="anonymous"></script>

<style>

    button{ cursor: pointer; } /* 모든 버튼에 마우스손모양 처리 */

    h3, h4
    {   
        font-family: 'Jua';
        text-align: center;
    }
    
    body 
    {
        font-family: 'Jua';
        min-height: 100vh;
        background: #F5F5F5;
    }
    
    #login_button
    {
        position: absolute;
        width: 126px;
        height: 40px;
        left: 725px;
        top: 706px; 
        font-family: 'Roboto';
        font-style: normal;
        font-size: 20px;
        z-index:2;
    }
            
    #signup_button
    {
        position: absolute;
        width: 126px;
        height: 40px;
        left: 725px;
        top: 761px;
        font-family: 'Roboto';
        font-style: normal;
        font-size: 20px;
        z-index:2;
    }

    #current_date2
    {
        position: absolute;
        left:158px;
        top:880px;
        z-index:2;
    }
    
    #clock
    {
        position: absolute;
        left:730px;
        top:865px;
        z-index:2;
    }

</style>
</head>
<body style="overflow-y: hidden">
    
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
              
    <img style="cursor: pointer;" src="images/icon/Group60.svg" onclick = "location.href = 'index.php'" >
    <img style="position: absolute; width:600px; height:470px; left:642px; top:10px;" src="images/icon/intro2.svg" >
            <form method="POST" action="loginProcess.php" name = "loginform"> 
                <div style="box-sizing: border-box; border-radius: 10%; position: absolute; width: 450px; height: 42px; left: 722px; top: 481px; background: #FFFFFF; border: 2px solid #ADA1C5;">
                    <img style="position: absolute; width:52.51px; height:37px; right:5px; " src="images/icon/Union.svg" >
                        <input name="id" type="id" class="form-control" id="login_id" placeholder="Season to Photo Spot Login">
                </div>
                <div style="box-sizing: border-box; border-radius: 10%; position: absolute; width: 450px; height: 42px; left: 722px; top: 539px; background: #FFFFFF; border: 2px solid #ADA1C5;">
                    <img style="position: absolute; width:52.51px; height:37px; right:5px; " src="images/icon/Union2.svg" >
                        <input name="password" type="password" class="form-control" id="login_password" placeholder="Season to Photo Spot Password">
                </div>
                <button type="button" id="login_button" class="btn btn-dark mb-2" onclick ="loginCheck()">로그인</button>
            </form>
            <form method="POST" name = "signupform" action="signup.php">
                <button type="submit" id="signup_button" class="btn btn-dark mb-3">회원가입</button>
            </form>
    <img style="position: absolute; width:1100px; height:400px; left:-10px; top:590px;" src="images/icon/Group97.svg" >
    <div id="clock"></div>
    <div id="current_date2"></div>

<script>
    date = new Date();
    year = date.getFullYear();
    month = date.getMonth() + 1;
    day = date.getDate();
    document.getElementById("current_date2").innerHTML = month + "/" + day + "/" + year;
</script>

<script>
    var Target = document.getElementById("clock");
    function clock() 
    {
        var time = new Date();
        var hours = time.getHours();
        var minutes = time.getMinutes();
        var seconds = time.getSeconds();
        Target.innerText = `${hours < 10 ? `0${hours}` : hours}:${minutes < 10 ? `0${minutes}` : minutes}:${seconds < 10 ? `0${seconds}` : seconds}`;
                
    }
    clock();
    setInterval(clock, 1000); // 1초마다 실행
</script>

 <script>

    function loginCheck()
    {
        const loginForm = document.loginform;
    	const login_id = document.getElementById('login_id').value;
    	const login_password = document.getElementById('login_password').value;
    	
		if(login_id === "")
        {
			alert("아이디를 입력해주세요.");
            login_id.focus();
            return false;			 
		} 
        else if (login_password === "")
        {
			alert("비밀번호를 입력해주세요.");
            login_password.focus();
            return false;			 		 
	 	}
        else
        { 
            loginForm.submit();
        }
	}
</script>

<?php
    }
?>
    
</body>
</html>