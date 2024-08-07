<?php 
    include 'login_verify.php';

    $db_host = "localhost"; 
    $db_user = "rainmiro"; 
    $db_passwd = "zoqtmxhs0617!";
    $db_name = "rainmiro"; 
    $conn = mysqli_connect($db_host,$db_user,$db_passwd,$db_name);

    $number = $_POST['upload_number'];

    $sql = "SELECT * FROM uploads WHERE upload_number = '{$number}'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>
    <script src="https://code.jquery.com/jquery-latest.min.js" type="application/javascript"></script>
    <script type="application/javascript" src="https://zelkun.tistory.com/attachment/cfile8.uf@99BB7A3D5D45C065343307.js"></script>

<style>
    img
    {
        cursor: pointer;
    }

    a, h5
    {
        font-family: 'Jua';
    }

    li
    {
        list-style:none;
    }
    h3
    {   
        font-family: 'Roboto';
        text-align: left;
    }
      
    h6
    {
        padding: 5px 1em 0 1em;
        font-family: 'Jua';
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
        background: #ffffff;
        border: 1px solid rgba(0, 0, 0, 0.4);
        box-shadow: 0px 4px 9px rgba(0, 0, 0, 0.25);
        border-radius: 34px;
    } 
    .bar
    {
        position: absolute;
        left:-1px;
        width: 699px;
        height: 0px;
        top:140px;
        border: 3px solid #ADA1C5;
    }
    .form-control
    {
        box-sizing: border-box;
        background: #FFFFFF;
        border: 3px solid #ADA1C5;
    } 
    #modifybtn
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

<div class="container"> 
        <div class="input-form-backgroud row"> 
            <div class="input-form col-md-12 mx-auto">
                <div style="width:545px; float:left; margin-right:20px;"> 
                <img style="width:25px; height:25px; left:7px; top:9px; position:relative; z-index:2;" src="images/icon/Before.png" onclick = "location.href = 'index.php'"> </div>
                <div style="position: absolute; top:-3px; left: 530px;"> 
                <img src="images/icon/MyPage.svg" onclick = "location.href = 'mypage.php'"> </div>       
                <br></br><h3><strong>글 수정</strong></h3><h7>&nbsp;Travel Map Memory Modify Page</h7>
                    <div class="bar"></div>
                            <br><br><br>
                            <form action="modifyProcess.php" method="POST" name = "modifychangeform" enctype="multipart/form-data">
                            <input type = "hidden" value = <?= "{$number}"?> name = "upload_number">
                            <div class="mb-5" style="width:670px; height:50px; text-align:center; ">
                                    <tr> <td> <a> 계절과 지역을 선택해주세요.</a><br>
                                    <select  style = "text-align:center; width: 120px; font-family: 'Jua'; background: #FFFFFF; border: 3px solid #ADA1C5; " name = "season" id="modify_season"> 
                                        <option name  = "" value=""> 계절선택 </option> 
                                        <option name  = "봄" value="봄"> 봄 </option>
                                        <option name  = "여름" value="여름"> 여름 </option>
                                        <option name  = "가을" value="가을"> 가을 </option>
                                        <option name  = "겨울" value="겨울"> 겨울 </option>
                                    </select>
                                    <select  style = "text-align:center; width: 150px; font-family: 'Jua'; background: #FFFFFF; border: 3px solid #ADA1C5; " name = "city" id="modify_city">
                                        <option id = "" name  = "" value=""> 시, 도 선택 </option>
                                        <option name  = "서울특별시" value="서울특별시"> 서울특별시 </option>
                                        <option name  = "부산광역시" value="부산광역시"> 부산광역시 </option>
                                        <option name  = "울산광역시" value="울산광역시"> 울산광역시 </option>
                                        <option name  = "대구광역시" value="대구광역시"> 대구광역시 </option>
                                        <option name  = "대전광역시" value="대전광역시"> 대전광역시 </option>
                                        <option name  = "광주광역시" value="광주광역시"> 광주광역시 </option>
                                        <option name  = "인천광역시" value="인천광역시"> 인천광역시 </option>
                                        <option name  = "세종특별자치시" value="세종특별자치시"> 세종특별자치시 </option>
                                        <option name  = "경기도" value="경기도"> 경기도 </option>
                                        <option name  = "강원도" value="강원도"> 강원도 </option>
                                        <option name  = "충청북도" value="충청북도"> 충청북도 </option>
                                        <option name  = "충청남도" value="충청남도"> 충청남도 </option>
                                        <option name  = "경상북도" value="경상북도"> 경상북도 </option>
                                        <option name  = "경상남도" value="경상남도"> 경상남도 </option>
                                        <option name  = "전라북도" value="전라북도"> 전라북도 </option>
                                        <option name  = "전라남도" value="전라남도"> 전라남도 </option>
                                        <option name  = "제주특별자치도" value="제주특별자치도"> 제주특별자치도 </option>
                                    </select>
                                    </td> </tr></div>
                                    <div style="height:50px;">
                                <tr> <td> <input style = "background: #E6E6FA; font-family: 'Jua' " type="text" class="form-control" placeholder="글 제목" name="title" id="modify_title" value = "<?= "{$row['title']}"?>"> </td> </tr></div>
                                <tr> <td> <textarea style = "background: #E6E6FA; font-family: 'Jua'; height:260px " type = "text" class="form-control" placeholder="세부적인 시, 군, 구와 내용을 입력해주세요  :" name="text" id="modify_text" style="height: 350px"><?= "{$row['text']}"?></textarea> </td> </tr>
                                <div style="height:50px;">
                                    <input style = "margin:0.5em; font-family: 'Jua' " type="file" name="file" id="file"></div>
                                <button style = "font-family: 'Jua'; float: right; " type="button" id = "modifybtn" class="btn btn-dark mb-3" onclick ="modifyCheck()">수정하기</button>  
                            </form>
                        </div>
                    </div>             
                </div>

<script>
    document.getElementById("modify_season").value = "<?=$row['season']?>";
    document.getElementById("modify_city").value = "<?=$row['city']?>";

    function modifyCheck()
    {
        const modifychangeForm = document.modifychangeform;
    	const modifytitle = document.getElementById('modify_title').value;
    	const modifytext = document.getElementById('modify_text').value;
        const modifyfile = document.getElementById('file').value;
        const modifyseason = document.getElementById('modify_season').value;
        const modifycity = document.getElementById('modify_city').value;

        if(modifyseason  === "")
        {
			alert("계절을 선택해주세요.");
            return false;			 
		} 
        else if(modifycity === "")
        {
			alert("지역을 선택해주세요.");
            return false;			 		 
	 	}
		if(modifytitle  === "")
        {
			alert("제목을 입력해주세요.");
            modifytitle.focus();
            return false;			 
		} 
        else if(modifytext === "")
        {
			alert("내용을 입력해주세요.");
            modifytext.focus();
            return false;			 		 
	 	}
        else
        { 
            modifychangeForm.submit();
        }
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
