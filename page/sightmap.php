<?php 
    include 'login_verify.php';
?>
<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<title>여행지를 찾아주는 남자들</title>

    <link rel="stylesheet" href="css/default.css">
    <link rel="stylesheet" href="css/style.css">

<style>
    @charset "utf-8";
    @import url(http://fonts.googleapis.com/earlyaccess/notosanskr.css);

body,div,dl,dt,dd,ul,ol,li,h1,form,fieldset,p,button,table,th,td,pre{margin:0;padding:0;}
body,div,dl,dt,dd,h1,form,fieldset,p,th,td,input,textarea,select,button,pre,a{font-family:'Noto Sans KR', sans-serif; font-size:24px; color:#222;}

a{cursor: pointer;}
 
body { background-color: black; padding: 100px;}
.sitemap * { transition: color 0.5s;}
.sitemap h2 { padding: 0 10 1px; color:#c2c1bf; font-size: 30px; line-height: 100%;}
.sitemap a { font-size:18px; color:#55524d; }
.sitemap > div { float: left; padding: 0 30px 0 0; width: 200px;}
.sitemap > div:hover * { color:#c2c1bf;}
.sitemap > div:hover h2 {color:#ff5400;}
.sitemap > div > ul > li > a { display: block; margin: 20px 0 35px;}
.sitemap > div > ul > li:hover > a { color:#ff5400;}
.sitemap > div > ul > li >:hover:before { opacity: 1;}
.sitemap > div > ul > li > :hover > a { color:#ff5400;}
.sitemap > div > ul > li > ul > { padding: 15px 0 0;}
.sitemap > div > ul > li > ul > a { display: block; padding: 4px 0; font-size: 11px;}
.sitemap > div > ul > li > { position: relative; z-index: ; padding: 0 0 0 18px; border-left:1px solid #3c3933; line-height: 15px;}
.sitemap > div > ul > li >:before { content: ""; position: absolute; left: -1px; top: 0; width: 1px; height: 100%; background: #ff5400; opacity: 0; transition: opacity 0.5s;}
.sitemap > div > ul > li >:hover:before { opacity: 1;}
.sitemap > div > ul > li >:hover a { color:#ff5400;}
.sitemap 
{
    position: relative;
    left: 400px;
    text-align:center;
    top: -30px; 
}

</style>
</head>
<body>
    
<?php
	if ($jb_login) 
    {
?>
        <div class="sitemap">
        <div>
            <h2>로그인</h2>
                <ul>
                    <li> <a onclick ="logout()">로그아웃 </a> </li>
                </ul>
        </div>
        <div>
            <h2>마이페이지</h2>
                <ul>
                    <li> <a href="http://rainmiro.dothome.co.kr/mypage_1.php">내가 쓴 글 </a> </li>
                    <li> <a href="http://rainmiro.dothome.co.kr/mypage_2.php">비밀번호 변경 </a> </li>
                    <li> <a href="http://rainmiro.dothome.co.kr/mypage_3.php">회원탈퇴 </a> </li>
                </ul>
        </div>
        
        <div>
            <h2>게시판</h2>
                <ul>
                    <li> <a href="http://rainmiro.dothome.co.kr/index.php">HOME</a></li>
                    <li> <a href="http://rainmiro.dothome.co.kr/write.php">글쓰기</a> </li>
                </ul>
        </div>
    </div>

<?php
    } 
	else 
	{
?>
        <div class="sitemap">
        <div>
            <h2>로그인</h2>
                <ul>
                    <li> <a href="http://rainmiro.dothome.co.kr/login.php">로그인 </a> </li>
                    <li> <a href="http://rainmiro.dothome.co.kr/signup.php">회원가입 </a> </li>              
                </ul>
        </div>
        <div>
            <h2>마이페이지</h2>
                <ul>
                    <li> <a href="http://rainmiro.dothome.co.kr/mypage_1.php">내가 쓴 글 </a> </li>
                    <li> <a href="http://rainmiro.dothome.co.kr/mypage_2.php">비밀번호 변경 </a> </li>
                    <li> <a href="http://rainmiro.dothome.co.kr/mypage_3.php">회원탈퇴 </a> </li>
                </ul>
        </div>
        
        <div>
            <h2>게시판</h2>
                <ul>
                    <li> <a href="http://rainmiro.dothome.co.kr/index.php">HOME</a></li>
                    <li> <a href="http://rainmiro.dothome.co.kr/write.php">글쓰기</a> </li>
                </ul>
        </div>
    </div>
<?php
    }
?>

<script> 
function logout() //로그아웃
    {
        const data = confirm("로그아웃 하시겠습니까?");
        if(data) 
        {
           	location.href = "logoutProcess.php";
        }
    }
</script> 
</body>
</html>
