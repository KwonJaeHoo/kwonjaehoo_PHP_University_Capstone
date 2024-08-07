<?php
	include 'login_verify.php';
	
	if (isset($_GET["page"]))
		$page = $_GET["page"]; //1,2,3,4,5
	else
		$page = 1;

	$category = $_GET['category'];
	$search = $_GET['search'];

	if($category == 'title')
	{
		$keyword = '제목';
	} 
	else if($category == 'id')
	{
		$keyword = '작성자';
	}
	else
	{
		$keyword = '내용';
	}

	$db_host = "localhost"; 
	$db_user = "rainmiro"; 
	$db_passwd = "zoqtmxhs0617!";
	$db_name = "rainmiro"; 
    $conn = mysqli_connect($db_host,$db_user,$db_passwd,$db_name);

	$query = "SELECT * FROM uploads WHERE $category like '%{$search}%' order by upload_number desc";
	$result = mysqli_query($conn, $query);
   	$total_record = mysqli_num_rows($result); // 검색된 게시판 총 레코드 수
 
    $query1 = "SELECT count(*) from 봄" ;
    $season1 = mysqli_query($conn, $query1);
    $data1 = mysqli_fetch_array($season1);

    $query2 = "SELECT count(*) from 여름" ;
    $season2 = mysqli_query($conn, $query2);
    $data2 = mysqli_fetch_array($season2);
  
    $query3 = "SELECT count(*) from 가을" ;
    $season3 = mysqli_query($conn, $query3);
    $data3 = mysqli_fetch_array($season3);

    $query4 = "SELECT count(*) from 겨울" ;
    $season4 = mysqli_query($conn, $query4);
    $data4 = mysqli_fetch_array($season4);
   
    $cityQuery1 = "SELECT SUM(cnt1) FROM ( 
        SELECT COUNT(서울특별시) as CNT1 FROM 봄 UNION ALL 
        SELECT COUNT(서울특별시) as CNT1 FROM 여름 UNION ALL 
        SELECT COUNT(서울특별시) as CNT1 FROM 가을 UNION ALL 
        SELECT COUNT(서울특별시) as CNT1 FROM 겨울 
    ) as s1";
    $city1 = mysqli_query($conn, $cityQuery1);
    $citydata1 = mysqli_fetch_array($city1);

    $cityQuery2 = "SELECT SUM(cnt2) FROM ( 
        SELECT COUNT(경기도) as CNT2 FROM 봄 UNION ALL 
        SELECT COUNT(경기도) as CNT2 FROM 여름 UNION ALL 
        SELECT COUNT(경기도) as CNT2 FROM 가을 UNION ALL 
        SELECT COUNT(경기도) as CNT2 FROM 겨울 
    ) as s2";
    $city2 = mysqli_query($conn, $cityQuery2);
    $citydata2 = mysqli_fetch_array($city2);

    $cityQuery3 = "SELECT SUM(cnt3) FROM ( 
        SELECT COUNT(강원도) as CNT3 FROM 봄 UNION ALL 
        SELECT COUNT(강원도) as CNT3 FROM 여름 UNION ALL 
        SELECT COUNT(강원도) as CNT3 FROM 가을 UNION ALL 
        SELECT COUNT(강원도) as CNT3 FROM 겨울 
    ) as s3";
    $city3 = mysqli_query($conn, $cityQuery3);
    $citydata3 = mysqli_fetch_array($city3);

    $cityQuery4 = "SELECT SUM(cnt4) FROM ( 
        SELECT COUNT(부산광역시) as CNT4 FROM 봄 UNION ALL 
        SELECT COUNT(부산광역시) as CNT4 FROM 여름 UNION ALL 
        SELECT COUNT(부산광역시) as CNT4 FROM 가을 UNION ALL 
        SELECT COUNT(부산광역시) as CNT4 FROM 겨울 
    ) as s4";
    $city4 = mysqli_query($conn, $cityQuery4);
    $citydata4 = mysqli_fetch_array($city4);

	//전체 게시글 수
	$query6 = "SELECT count(upload_number) FROM uploads";
	$result6 = mysqli_query($conn, $query6);
	$data6 = mysqli_fetch_array($result6);

	//전체 유저 수 
	$query7 = "SELECT count(id_number) FROM member";
	$result7 = mysqli_query($conn, $query7);
	$data7 = mysqli_fetch_array($result7);

	$list = 12; // 한 페이지에 보여줄 개수
	$block_cnt = 5; // 블록당 보여줄 페이지 개수
	$block_num = ceil($page / $block_cnt); // 현재 페이지 블록 구하기
	$block_start = (($block_num - 1) * $block_cnt) + 1; // 블록의 시작 번호  ex) 1,6,11 ...
	$block_end = $block_start + $block_cnt - 1; // 블록의 마지막 번호 ex) 5,10,15 ...   	
	$total_page = ceil($total_record / $list); // 페이징한 페이지 수
	
	if($block_end > $total_page) // 블록의 마지막 번호가 페이지 수 보다 많다면
	{ 
		$block_end = $total_page; // 마지막 번호는 페이지 수
	}
	$total_block = ceil($total_page / $block_cnt); // 블럭 총 개수
	$page_start = ($page - 1) * $list; // 페이지 시작
?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
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
	
    <link href="https://fonts.googleapis.com/css?family=Nanum+Pen+Script&display=swap" rel ="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.1.1/ekko-lightbox.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Jua&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">
	<link href="css/section1.css" rel="stylesheet" type="text/css">
   
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js" integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script> 
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.4/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

<style>
    body
    {
        background-color: #F0F0F0;
    }
    th, td 
    {
      display:none;
    }

    text
    {
        font-family: 'Jua';
    }

	button
    {
        font-family: 'Jua'; 
        cursor: pointer;
    }

	input
	{
        font-family: 'Jua'; 
        cursor: pointer; 
    }

    ul,ol
    { 
        list-style:none 
    }

    a 
    {
        text-decoration:none;
        color: black; 
        font-size:15px
    }

    nav
    {
        width:80%;
        overflow:hidden;
        height:80px;
        background-color:#1b2035; 
        margin:auto;
    }

    #nav1
    {
        text-align:center; 
    }

    #nav1>ul
    {
        display:inline-block
    }

    #nav1>ul li
    {
        float:left;
        padding:0 30px;
        line-height:80px;
    }

    #nav5
    {
        width: 1050px;
        height: 815px;
        left:400px;
        position: absolute;
    }

    #nav7
    {
        width: 200px;
        height: 300px;
        left: 0%;
        position: absolute;
    }

    #nav6
    {
        width: 200px;
        height: 300px;
        left: 25%;
        position: absolute;
    }

    #section1
    {
        position: absolute;
        width: 950px;
        height: 647px;
        padding: 10px;
        font-family: 'Jua';
        background-color:#D3C1F6;
        top: 474px;
        right: 0;
    }

    .input-form1 
    {
        max-width: 790px;
        max-height: 688px;
        padding: 15px 10px 0 10px;
        background: #fff;
        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
        border-radius: 10px;
        -webkit-box-shadow: 0 8px 20px 0 rgba(0, 0, 0, 0.15);
        -moz-box-shadow: 0 8px 20px 0 rgba(0, 0, 0, 0.15);
        box-shadow: 0 8px 20px 0 rgba(0, 0, 0, 0.15)
    }
    .input-form2 
    {
        width: 100px;
        height: 80px;
        padding: 10px 0 0 0;
        text-align: center;
        font-family:'jua';
        background: #fff;
        border-radius: 10px;
      
        box-shadow: 0 8px 20px 0 rgba(0, 0, 0, 0.15)
    }

   /* 도움말 css */  
    .cd1tip 
    {
        position: absolute;
        display: inline-block;
        z-index:5;
        left:20px;
        top:120px;   
    }

    .cd1tip .tip 
    {
        visibility: hidden;
        width: 900px;
        background: #8471AD;
        color: #fff;
        font-weight: 400px;
        text-align: center;
        padding: 5px;
        border-radius: 7px;
    
      /* 풍선 위치 잡기*/
        position: absolute;
        z-index: 1;
        top:110px;
        left: 50px;
    
      /* 투명도 */
        opacity: 0;
    }

    .cd1tip:hover .tip ,.cd1tip1:hover .tip1 , .cd1tip2:hover .tip2 , .cd1tip3:hover .tip3, .cd1tip4:hover .tip4, .cd1tip5:hover .tip5
    , .cd1tip6:hover .tip6, .cd1tip7:hover .tip7, .cd1tip8:hover .tip8, .cd1tip9:hover .tip9
    {
        visibility: visible;
        opacity: 1;
        transition: opacity 0.7s;
    }

    .goupbtn 
	{
	    bottom: 90%;
	  	left: 96.5%;
		top: 0.2%;
	  	width: 60px;
	  	height: 60px;
	  	border-radius: 40%;
  		background-color:rgba(52, 58, 64, 0.75);
  		font-size: large;
  		border: rgba(204, 204, 238, 0.89) 3px solid;
  		position: fixed;
  	    z-index: 2;
	}

    div.select
    {
        position:absolute;
        left:700px;
        top:50px;
    }

    body, html 
    {
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
       
    }

    #menu 
    {
        height: 647px;
        position: absolute;
        background-color: #F0F0F0;
        width: 755px;
        transition: 1500ms all cubic-bezier(0.19, 1, 0.22, 1);
        transform: translateX(-100%);
        left: 27px;
        z-index: 3;
        top: 289px;
        background: rgba(0, 0, 0, 0);
    }

    #menu.expanded 
    {
        transform: translateX(0%);
        left: 0px;
    }

    .menu-inner 
    {
        width: 100%;
        height: 100%;
        position: relative;
        background-image: url("images/icon/Group970.svg");
        
    }

    #blob 
    {
        top: 0;
        z-index: -1;
        right: 60px;
        transform: translateX(100%);
        height: 100%;
        position: absolute;
        
    }

    #blob-path 
    {
        height: 100%;
        fill:  #F0F0F0;    
    }


    .menu-inner .ul 
    {
      padding: 0;
      list-style: none;
      width: 80%;
      margin-left: 10%;
      position: absolute;
      top: 10px;
    }

    .menu > li:hover 
    {
        background-color: #D3C1F6;
        border-radius: 0px 0px 20px 20px;
        transition-duration: 0.5s;
    }
  
    .menu
    {
        width:2000px;
        overflow: hidden;
    }
  
    .menu > li
    {
        width: 470px; 
        
        text-align: center;
        line-height: 115px;
        background-color: #ADA1C5;
    }
  
    .menu a
    {
        color: #fff;
    }
  
    .submenu 
    {
        height: 0;
        overflow: hidden;
    }
  
    .menu > li:hover .submenu 
    {
        height: 20px;
        transition-duration: 0.5s;
    }

    .mainbar
    {
        position: absolute;
        width: 1919px;
        height: 59px;
        left: 0px;
        top: 230px;
        z-index:1;
        background: #6E54A3;
    }

    #category
    {
        font-size:25px;
        color: #ffffff;
        width: 101px;
        height: 49px;
        margin-bottom: 20px;
        border:0px;
        background: #D3C1F6;
        border-radius: 5px;
        
    }

    .search
    {
        position:relative;
        background-color: #6E54A3;
        border:none;
    }
    .container
    {
        text-align:center;
    }
    input:focus 
    {
        outline: none;
    }
    .modal-content
    {
        font-size: 15px;
        font-family: 'Jua';
    }
    .modal-title{
        font-size: 20px;
        float:left;
    }
    .modal-header{
        float:center;
    }
    .btn.btntwo
    {

        background: #B8A7DA;
        border-radius: 20px;
        border: 1px;
        border-color:white;
    }
    .btn.btnthree
    {

        background: #B8A7DA;
        border-radius: 20px;
        border: 1px;
        border-color:white;
    }
    .close
    {
        color: #B8A7DA;
        border-color: #fff;
        border:0;
        background-image: url("images/icon/Before.png");
        padding: 41px 0 0 41px;
        font-size: 0;
    }
   

    #WID
    {
        position: relative;
        float: left;
        top:150px;
        left:50px;
    }

    #WID2
    {
        position: relative;
        float: left;
        top:350px;
        left:50px;
    }
    #loginbtn{
        background: #6E54A3;
        font-weight: 5px;
        border-color:#6E54A3;
        border-radius: 0px;
    }
    #search{
        background: #6E54A3;
        border:0px;
        background-size: cover;
        
        top: 50px;
    }
    
    
    .back
    {
        bottom: 500px;
        position: relative;
        
    }
    .area 
    {
        color: rgb(0, 0, 0);
  margin-bottom: 20px;
  font-family: 'Jua';
  position: absolute;
  width: 250px;
  height: 150px;
  left: 66px;
  top: 299px;
    }
    .btn.open.popup
    {
        border-color: #6E54A3;
    }
    .cd1tip1 
    {
        position: absolute;
        display: inline-block;
        z-index:0;
        left:0px;
        top:-10px;   
    }

    .cd1tip1 .tip1 
    {
        visibility: hidden;
        width: 300px;
        background: #8471AD;
        color: #fff;
        font-weight: 400px;
        text-align: center;
        padding: 5px;
        border-radius: 7px;
    
      /* 풍선 위치 잡기*/
        position: absolute;
        z-index: 0;
        top: 730px;
        left: 650px;
    
      /* 투명도 */
        opacity: 0;
    }


    .cd1tip2 
    {
        position: absolute;
        display: inline-block;
        z-index:0;
        left:-10px;
        top:-10px;   
    }

    .cd1tip2 .tip2 
    {
        visibility: hidden;
        width: 300px;
        background: #8471AD;
        color: #fff;
        font-weight: 400px;
        text-align: center;
        padding: 5px;
        border-radius: 7px;
    
      /* 풍선 위치 잡기*/
        position: absolute;
        z-index: 0;
        top: 730px;
        left: 650px;
    
      /* 투명도 */
        opacity: 0;
    }
    .cd1tip3 
    {
        position: absolute;
        display: inline-block;
        z-index:0;
        left:-20px;
        top: 40px;   
    }

    .cd1tip3 .tip3
    {
        visibility: hidden;
        width: 300px;
        background: #8471AD;
        color: #fff;
        font-weight: 400px;
        text-align: center;
        padding: 5px;
        border-radius: 7px;
    
      /* 풍선 위치 잡기*/
        position: absolute;
        z-index: 0;
        top: 680px;
        left: 650px;
    
      /* 투명도 */
        opacity: 0;
    }
    .cd1tip4
    {
        position: absolute;
        display: inline-block;
        z-index:0;
        left:-10px;
        top:10px;   
    }

    .cd1tip4 .tip4
    {
        visibility: hidden;
        width: 300px;
        background: #8471AD;
        color: #fff;
        font-weight: 400px;
        text-align: center;
        padding: 5px;
        border-radius: 7px;
    
      /* 풍선 위치 잡기*/
        position: absolute;
        z-index: 0;
        top: 720px;
        left: 650px;
    
      /* 투명도 */
        opacity: 0;
    }
    .cd1tip5
    {
        position: absolute;
        display: inline-block;
        z-index:0;
        left:-20px;
        top:10px;   
    }

    .cd1tip5 .tip5
    {
        visibility: hidden;
        width: 300px;
        background: #8471AD;
        color: #fff;
        font-weight: 400px;
        text-align: center;
        padding: 5px;
        border-radius: 7px;
    
      /* 풍선 위치 잡기*/
        position: absolute;
        z-index: 0;
        top: 720px;
        left: 650px;
    
      /* 투명도 */
        opacity: 0;
    }
    .cd1tip6 
    {
        position: absolute;
        display: inline-block;
        z-index:0;
        left:10px;
        top:0px;   
    }

    .cd1tip6 .tip6 
    {
        visibility: hidden;
        width: 300px;
        background: #8471AD;
        color: #fff;
        font-weight: 400px;
        text-align: center;
        padding: 5px;
        border-radius: 7px;
    
      /* 풍선 위치 잡기*/
        position: absolute;
        z-index: 0;
        top: 680px;
        left: 650px;
    
      /* 투명도 */
        opacity: 0;
    }
    .cd1tip7 
    {
        position: absolute;
        display: inline-block;
        z-index:0;
        left:-10px;
        top:30px;   
    }

    .cd1tip7 .tip7
    {
        visibility: hidden;
        width: 300px;
        background: #8471AD;
        color: #fff;
        font-weight: 400px;
        text-align: center;
        padding: 5px;
        border-radius: 7px;
    
      /* 풍선 위치 잡기*/
        position: absolute;
        z-index: 0;
        top: 690px;
        left: 650px;
    
      /* 투명도 */
        opacity: 0;
    }
    .cd1tip8
    {
        position: absolute;
        display: inline-block;
        z-index:0;
        left:10px;
        top:30px;   
    }

    .cd1tip8 .tip8
    {
        visibility: hidden;
        width: 300px;
        background: #8471AD;
        color: #fff;
        font-weight: 400px;
        text-align: center;
        padding: 5px;
        border-radius: 7px;
    
      /* 풍선 위치 잡기*/
        position: absolute;
        z-index: 0;
        top: 680px;
        left: 650px;
    
      /* 투명도 */
        opacity: 0;
    }
    .cd1tip9
    {
        position: absolute;
        display: inline-block;
        z-index:0;
        left:-10px;
        top:50px;   
    }

    .cd1tip9 .tip9
    {
        visibility: hidden;
        width: 300px;
        background: #8471AD;
        color: #fff;
        font-weight: 400px;
        text-align: center;
        padding: 5px;
        border-radius: 7px;
    
      /* 풍선 위치 잡기*/
        position: absolute;
        z-index: 0;
        top: 680px;
        left: 650px;
    
      /* 투명도 */
        opacity: 0;
    }

</style>
</head>
<body style="overflow-x: hidden; background-color:#F0F0F0;" class="modal-open">	

<?php
	if ($jb_login) 
    {
?>
    <button id="loginbtn"  class="btn btn-dark mb-3" type="button" style="font-family: 'Roboto'; font-weight: 400; right:0em; margin: 0; padding: 0 10 0 10; height:35px;   position:absolute;" onclick ="logout()">로그아웃</button>
    <button id="loginbtn"  class="btn btn-dark mb-3" type="button" style="font-family: 'Roboto'; font-weight: 400; right:0em; margin: 0; padding: 0 10 0 10; height:35px; right:80px; position:absolute;" onclick ="mypage()">마이페이지</button>
    
<?php
    } 
	else 
	{
?>
    <button id="loginbtn" class="btn btn-dark mb-3" type="button" style="font-family: 'Roboto'; font-weight: 400; right:0em; margin: 0;top:0px; height:35px;   position:absolute;" onclick ="login()">로그인</button>

<?php
    }
?>
    <button id="loginbtn" class="btn btn-dark mb-3" type="button" style="font-family: 'Roboto'; font-weight: 400; left:0em; margin: 0;top:0px; height:35px;   position:absolute;" onclick ="location.href='sightmap.php'">사이트 맵</button>
<img style="position:absolute; width:100%; height:230px; z-index:-1;" src="images/icon/1234.png">
<div style="text-align:center;height:200px; ">
<img style="width:350px; height: 290px; cursor:pointer;" src="images/icon/Image21.svg" onclick ="location.href='index.php'"></div> 
    
        <div class="cd1tip" >
        <div id="icon"> <img src="images/icon/Group159.png"  style=" position:absolute; top:15px; width: 115px; height: 85px;"> </div>
            <span class="tip" style = "font-family: 'Jua'; ">
            페이지 소개<br>
            여행을 떠나기 위해서 여러 장의 사진을 보고, 여행지의 계획을 작성하려면 블로그 등의 사이트 들을 하나하나 찾아봐야 하는 단점이 있습니다. <br>
            이 사이트는 이러한 단점을 해결할 수 있는 페이지를 만들기로 하여 만들어보았습니다. <br><br> 지금 접속해 있는 페이지의 장점을 말씀드리자면 여행지 내의 사진을 보기 위해서는
            그 지역의 도, 시청 페이지 또는 블로그를 일일이 찾아봐야 하는데 <br>
            복잡한 과정을 단순화하여,보다 빠르게 원하고자 하는 정보를 눈으로 보며 확인할 수 있도록 하기 위해서 제작하였습니다.<br><br>
            또한 통계 페이지로 넘어가면 사용자가 쓴 글들의 통계가 실시간으로 최신 화가 되고 있는 그래프를 확인할 수 있습니다.<br>
            만약 검색이 필요하시면 똑같이 계절 페이지 접속 후에 검색 기능을 사용하시면 장소 검색도 보다 쉽게 하실 수 있습니다. <br>
            이러한 기능으로 하나하나 찾아봐야 하는 번거로움을 덜어드리고자 합니다!<br><br>
            이 페이지가 마음에 마음에 드시고 정보 잘 찾으셨다면 ‘여행지를 찾아주는 남자들’ 페이지를 알려주세요!!! <br>사용자가 많아질수록 더 좋은 정보들이 많아집니다! 🙂
            </span>
        </div>
        <div class="mainbar">
            <img style="position:relative; top:30px; width:350px; left:1515px; " src="images/icon/Line.svg">
        </div>

        <div id="search_box" style="font-family: 'Roboto';position:relative; z-index:2; text-align: right; right:80px; top:35px; margin-right: 335px;">
	        <form style="z-index:2;"action="search.php" method="GET">
		        <select id="category" name="category" style="text-align:center;">
			        <option value="title">제목</option>
			        <option value="id">작성자</option>
			        <option value="text">내용</option>
		        </select>
        </div>
            <div id="search_box" style="text-align: right; top: -36px; position: relative; z-index: 1; ">
		        <input class="search" style="right:20px; top:5px; font-family:'Roboto'"type="text" name="search" size="40" required="required">
		        <button id="search" onclick="add()" class="btn btn-primary" style="padding: 0 0 0 0; "><img style=" width:30px; height:30px" src="images/icon/Group142.svg" alt=""></button>
                </div>
            </form>
        
  

<div id="menu">  <!-- 왼쪽 메뉴 나오는거 -->
    <div class="menu-inner">

        <ul>                 
        <br><br><br><br><br><br><br><br>
        <div style="position:absolute; left:20px; bottom:250px; width: 350px; float: left;"> <!-- 종호 형 그래프 -->
	            <canvas id="myChart1"></canvas>
        </div>
        
        
        <div style=" font-family:'Jua'; position:absolute; bottom:380px; left:520px; height:40px;">
        <p>전체 게시글  <?= $data6['count(upload_number)'] ?></p>
        
        </div>
        
        <div   style="font-family:'Jua'; position:absolute; bottom:180px; left:510px; ">
        <p>전체 유저 수  <?= $data7['count(id_number)'] ?></p>
        

        </div>
    
       
        <div style="position:absolute; left:20px; bottom:450px; width: 350px; float: left; "> <!-- 종호 형 그래프 -->
	            <canvas id="myChart2" ></canvas>
                
        </div>
       
        </ul>
    </div> 

<script type="text/javascript">
    var context = document
        .getElementById('myChart1')
        .getContext('2d');
    var myChart = new Chart(context, 
    {
        type: 'bar',// 차트의 형태
        data: { // 차트에 들어갈 데이터
            labels: [
                //x 축  
            ],
            datasets: [
                { //데이터
                    label: '봄', //차트 제목
                    fill: false, // line 형태일 때, 선 안쪽을 채우는지 안채우는지
                    data: [
                        <?= $data1['count(*)'] ?>//x축 label에 대응되는 데이터 값
                    ],
                    backgroundColor: [
                        //색상
                        'rgba(255, 99, 132, 0.2)'

                    ],
                    borderColor: [
                        //경계선 색상
                        'rgba(255, 99, 132, 1)'

                    ],
                    borderWidth: 3 //경계선 굵기
                },
                {
                    label: '여름',
                    fill: false,
                    data: [
                        <?= $data2['count(*)'] ?>
                    ],
                    backgroundColor: [
                        //색상
                        'rgba(185, 241, 253, 0.2)',
                    ],
                    borderColor: [
                        //경계선 색상
                        'rgba(33, 210, 248, 1)'
                    ],
                    borderWidth: 3 //경계선 굵기
                },
                {
                    label: '가을',
                    fill: false,
                    data: [
                        <?= $data3['count(*)'] ?>
                    ],
                    backgroundColor: [
                        //색상
                        'rgba(254, 201, 169, 0.2)'
                    ],
                    borderColor: [
                        //경계선 색상
                        'rgba(252, 114, 31, 1)'
                    ],
                    borderWidth: 3 //경계선 굵기
                },
                {
                    label: '겨울',
                    fill: false,
                    data: [
                        <?= $data4['count(*)'] ?>
                    ],
                    backgroundColor: [
                        //색상
                        'rgba(200, 205, 208, 0.2)'
                    ],
                    borderColor: [
                        //경계선 색상
                        'rgba(98, 111, 117, 1)'
                    ],
                    borderWidth: 3 //경계선 굵기
                }
            ]
        },
        options: {
            scales: {
                yAxes: [
                    {
                        ticks: {
                            beginAtZero: true
                        }
                    }
                ]
            }
        }
   });
</script>
<script type="text/javascript">
    var context = document
        .getElementById('myChart2')
        .getContext('2d');
    var myChart = new Chart(context, 
    {
        type: 'bar',// 차트의 형태
        data: { // 차트에 들어갈 데이터
            labels: [
                //x 축
            ],
            datasets: [
                { //데이터
                    label: '서울', //차트 제목
                    fill: false, // line 형태일 때, 선 안쪽을 채우는지 안채우는지
                    data: [
                        <?= $citydata1['SUM(cnt1)'] ?>//x축 label에 대응되는 데이터 값
                    ],
                    backgroundColor: [
                        //색상
                        'rgba(244, 242, 174, 0.2)'

                    ],
                    borderColor: [
                        //경계선 색상
                        'rgba(253, 248, 43, 1)'
                    ],
                    borderWidth: 3 //경계선 굵기
                },
                {
                    label: '경기',
                    fill: false,
                    data: [
                        <?= $citydata2['SUM(cnt2)'] ?>
                    ],
                    backgroundColor: [
                        //색상
                        'rgba(187, 253, 190, 0.2)',
                    ],
                    borderColor: [
                        //경계선 색상
                        'rgba(67, 250, 52, 1)'
                    ],
                    borderWidth: 3 //경계선 굵기
                },
                {
                    label: '강원',
                    fill: false,
                    data: [
                        <?= $citydata3['SUM(cnt3)'] ?>
                    ],
                    backgroundColor: [
                        //색상
                        'rgba(198, 192, 248, 0.2)',
                    ],
                    borderColor: [
                        //경계선 색상
                        'rgba(82, 65, 233, 1)'
                    ],
                    borderWidth: 3 //경계선 굵기
                },
                {
                    label: '부산',
                    fill: false,
                    data: [
                        <?= $citydata4['SUM(cnt4)'] ?>
                    ],
                    backgroundColor: [
                        //색상
                        'rgba(236, 185, 253, 0.2)',
                    ],
                    borderColor: [
                        //경계선 색상
                        'rgba(201, 55, 249, 1)'
                    ],
                    borderWidth: 3 //경계선 굵기
                }
            ]
        },
        options: {
            scales: {
                yAxes: [
                    {
                        ticks: {
                            beginAtZero: true
                        }
                    }
                ]
            }
        }
   });
</script>
  
    <svg version="1.1" id="blob"xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="max-width:30px;">
        <path id="blob-path" d="M60,500H0V0h60c0,0,20,172,20,250S60,900,60,500z"/>
    </svg>
</div>	
<div class="area">
<img style="position: absolute; width:1900px; height:689px; left:-300px; top:-52px; " src="images/icon/1235.svg" >
    <h1>지역별&nbsp;<span>Area</span></h1>
    </div>

    <div class="back">
        <div class="cd1tip1">
            <img src="images/icon/120.svg" alt="강원도" usemap="#korea" style="opacity:0.8;position: absolute;width: 237.59px;height: 197.99px;left: 349.98px;top: 487px;">
            <span class="tip1" style = "font-family: 'Jua';">
                강원도
                <br>
                강원도는 빼어난 자연경관으로 유명합니다.
                래프팅, 패러글라이딩, 라이딩, 스키 등 
                계절마다 자연을 누리며 각종 레저스포츠를 즐길 수 있습니다.
                그뿐만 아니라, 연말연시가 되면 가장 먼저 
                떠오르는 정동진은 해돋이 명소로 손꼽히며,
                배를 타고 들어가야 하는 남이섬 곳곳에는 운치 있는 메타세콰이어길이 있어 데이트 코스로도 유명합니다.
                </span>
        </div>
        <div class="cd1tip2">
        <img src="images/icon/121.svg" alt="경기도" usemap="#korea" style="opacity:0.8;position: absolute;width: 129.1px;height: 171.45px;left: 301px;top: 530.92px;">
        <span class="tip2" style = "font-family: 'Jua';">
            경기도
            <br>
            경기도는 문화· 예술· 레저 등 
            다양한 컨텐츠들을 가지고 있습니다.
            서울 근교에 위치해 접근성이 좋고 다양한 문화생활을 즐길 수 있어서 주말을 이용한 나들이가 가능합니다.
            아울렛이 위치한 파주와 여주는 문화 복합 도시로 풍부한 볼거리를 제공하고 있습니다.
            양평이나 가평은 자연과 함께 여유로운 하루를 만끽하고 싶은 이들에게 제격입니다.
            </span>
        </div>
        <div class="cd1tip3">
        <img src="images/icon/122.svg" alt="제주도" usemap="#korea" style="opacity:0.8;position: absolute;width: 83.53px;height: 51.53px;left: 216px;top: 1030.72px;">
        <span class="tip3" style = "font-family: 'Jua';">
            제주도
            <br>
            제주도는 섬 전체가 하나의 거대한 관광자원입니다. 에메랄드빛 물빛이 인상적인 협재 해수욕장은 제주 대표 여행지며, 파도가 넘보는 주상절리와 바다 위 산책로인 용머리 해안은 제주에서만 볼 수 있는 천혜의 자연경관으로 손꼽힙니다. 드라마 촬영지로 알려진 섭지코스는 꾸준한 사랑을 받고 있으며 한라봉과 흑돼지, 은갈치 등은 제주를 대표하는 음식이니 드셔보길 추천합니다.
            </span>
        </div>
        <div class="cd1tip4">
        <img src="images/icon/Group_154.svg" alt="충청남도" usemap="#korea" style="opacity:0.8;position: absolute;width: 126.93px;height: 155.14px;left: 385.78px;top: 653.41px;">
        <span class="tip4" style = "font-family: 'Jua';">
        충청북도
            <br>
            충청북도는 자연을 만끽할 수 있습니다. 충북 대표 여행지 단양은 드라이브 코스로 좋은 충주호에서 하늘을 나는 패러글라이딩이 인기이며, 도담삼봉은 해 질 녘 풍경이 아름답습니다. 가장 오래된 저수지 의림지가 있는 제천은 출사지로 알려졌으며, 전국 최고의 둘레길이 있는 괴산군의 산막이 옛길을 걸어보는 것도 추천합니다.
            </span>
        </div>
        <div class="cd1tip5">
        <img src="images/icon/124.svg" alt="경상남도" usemap="#korea" style="opacity:0.8;position: absolute;width: 146.46px;height: 132.35px;left: 272.79px;top: 677.36px;">
        <span class="tip5" style = "font-family: 'Jua';">
        충청남도
            <br>
            충청남도는 백제의 발자취를 고스란히 안고 있습니다. 백제의 수도였던 공주와 부여가 위치해 있어 역사적인 사찰과 문화재를 곳곳에서 만날 수 있습니다. 또한 당진 왜목마을에서는 서해의 일출을 볼 수 있고, 보령에서는 세계 각지에서 온 여행객들과 온몸에 진흙을 묻히며 마음껏 놀 수 있는 머드축제를 즐기는 색다른 경험을 할 수 있습니다.
            </span>
        </div>
        <div class="cd1tip6">
        <img src="images/icon/125.svg" alt="전라남도" usemap="#korea" style="opacity:0.8;position: absolute;width: 213.32px;height: 204.5px;left: 430.69px;top: 658.66px;">
        <span class="tip6" style = "font-family: 'Jua';">
        경상북도
            <br>
            경상북도는 민족문화 창달의 대표입니다. 신라 천년 고도의 숨결을 간직한 경주를 시작으로 유네스코 세계문화유산에 등재된 안동 하회마을까지 우리나라의 오랜 전통과 역사의 때가 묻은 지역을 방문하고 싶다면 경상북도만한 곳이 없습니다. 기상이변으로 방문 자체가 쉽지 않은 울릉도와 독도는 기회가 된다면 천혜 절경의 우리 땅을 밟아볼 수 있습니다.
            </span>
        </div>
        <div class="cd1tip7">
        <img src="images/icon/126.svg" alt="충청북도" usemap="#korea" style="opacity:0.8;position: absolute;width: 139.41px;height: 92.21px;left: 300.99px;top: 792.53px;">
        <span class="tip7" style = "font-family: 'Jua';">
        전라북도
            <br>
            전라북도는 한국 문화의 원형이 가장 잘 보존되어 있습니다. 도심 중심에 한옥마을을 품고 있는 전주는 전라북도의 대표 관광지입니다. 전주의 전통음식 비빔밥을 맛보는 건 필수이며, 한복 체험과 함께 한옥 마을을 걸어보는 것도 하나의 재미 춘향과 몽룡의 사랑이 시작된 광한루가 있는 남원과 일제 시대의 근대 건축 기행이 가능한 군산과 익산을 함께 여행해보는 것도 추천합니다.
            </span>
        </div>
        <div class="cd1tip8">
        <img src="images/icon/127.svg" alt="전라북도" usemap="#korea" style="opacity:0.8;position: absolute;width: 182.26px;height: 137.78px;left: 412.99px;top: 813.68px;">
        <span class="tip8" style = "font-family: 'Jua';">
        경상남도
            <br>
            경상남도는 산악과 해상관광을 함께 누릴 수 있습니다. 통영과 남해를 중심으로 위치한 해상공원은 섬과 바다의 두 가지의 매력을 모두 느낄 수 있어 경상남도 대표 여행지로 손꼽힙니다. 봄에는 하얀 눈꽃이 흩날리는 하동벚꽃축제와 순매원 매화축제가, 겨울에는 거제도를 빨갛게 물들이는 동백축제가 열립니다. 이외에도 온천여행과 도자기 체험, 딸기 체험 등 다양한 경험이 가능합니다.
            </span>
        </div>
        <div class="cd1tip9">
        <img src="images/icon/128.svg" alt="경상북도" usemap="#korea" style="opacity:0.8;position: absolute;width: 151.88px;height: 154.59px;left: 284.72px;top: 864.84px;">
        <span class="tip9" style = "font-family: 'Jua';"> 
        전라남도
            <br>
            전라남도는 기개 높은 대나무숲을 가진 담양, 푸른 녹차밭의 보성, 이름만으로도 좋은 여수 밤바다까지 각 지역의 전통과 고유색이 잘 살아있습니다. 순천만의 지평선 끝까지 황금빛으로 물든 갈대밭을 구경하고 싶다면 11월 초에 열리는 순천만갈대축제를 방문해보는 것을 추천합니다. 해상관광부터 산악관광까지 두루 갖춘 전라남도에서 색다른 자연의 매력에 흠뻑 빠져보길 바랍니다.
            </span>
      </div>
    
<div class="all">
    <div id="section1">
        <div class="input-form-backgroud row"> <h1><?=$keyword?>에서 <b> <?=$search?> </b> 검색 결과 ㅣ 총 게시글 수 (<?= $total_record ?>)</h1> </div>
            <div class="container">  
                <div class="row justify-content-center">
                    <div class="input-form1">
                        <div id="전체" style="display:block;  text-decoration: none;">
                            <button style=" right:0; position: absolute; border-radius: 20px; top: 548px; padding: 0; background-color: #D3C1F6;
                                border: none;" type="button" 
                                id = "write_button"  onclick ="location.href='write.php'">
                            <img src="images/icon/Write1.svg" alt=""></button>              

<script>
	function add() 
	{
    	$.ajax({
		url: "search.php",
      	type: "get", 
		data: $('form').serialize()
    	}).done(function(data) {
        $('#result').text(data);
        });
    } 
</script>

<?php
	if($total_record == 0)
	{
?>
		<h4> 검색결과가 없습니다.</h4>
<?php		
	}
	else
	{
	    	
		/* 검색된 게시글 정보 가져오기  limit : (시작번호, 보여질 수) */
		$query5  = "SELECT * FROM uploads WHERE $category like '%{$search}%' ORDER BY upload_number DESC LIMIT $page_start, $list";
		$result1 = mysqli_query($conn, $query5);
        $rd = array();
        $rdcot = 0;
		
		while($data = mysqli_fetch_array($result1))
    	{	
            if($data['id'] === $_SESSION['userId'])
            {
                $rd[$rdcot] = "{$data['upload_number']}";
?>

                <a href= "<?= $data['img_url'] ?>" data-toggle="lightbox"   data-title = " <?= "아이디 : {$data['id']} ";?> <br> <?= "제목 : {$data['title']} ";?> <br> 
                <form action= 'modify.php' method='POST' name = 'modifyform'>
                    <button type = 'input' name = 'upload_number' value = '<?= "{$rd[$rdcot]}"?>' class='btn btntwo' onclick = 'readModify()'> 수정 </button>
                </form>
                <form action= 'myReaddelProcess.php' method='POST' name = 'mrdelform'> 
                    <button type = 'input' name = 'upload_number' value = '<?= "{$rd[$rdcot]}"?>' class='btn btnthree' onclick = 'readDelete()'> 삭제 </button>
                </form>"
                    data-footer = "<?= "계절 : {$data['season']}"?> <br> <?= "지역 : {$data['city']}"?><br> <?= "설명 : {$data['text']}"?> " data-gallery="example-gallery" class="col-sm-6">
                <button class="btn-open-popup">
                    <img  id="myImg" src = '<?= $data['img_url'] ?>' style="height:120px; width:102px; object-fit: cover; " class="img-fluid ">
                </button>
                </a>
		
<?php 
		    }
        
            else
            {
?>
                <a href= "<?= $data['img_url'] ?>" data-toggle="lightbox" data-title = " <?= "아이디 : {$data['id']} ";?> <br> <?= "제목 : {$data['title']} ";?>"
                data-footer = "<?= "계절 : {$data['season']}"?> <br> <?= "지역 : {$data['city']}"?><br> <?= "설명 : {$data['text']}"?> <?= "{$data['upload_number']}" ?>" 
                data-gallery="example-gallery" class="col-sm-6">
                <button class="btn-open-popup">
                    <img  id="myImg" src = '<?= $data['img_url'] ?>' style="height:120px; width:102px; object-fit: cover; " class="img-fluid rounded">
                </button>
                </a>
<?php
            
            }
        }
	}
	

	if ($page <= 1)
	{
		// 빈 값
	} else 
	{
		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='search.php?category=$category&search=$search&page=1'>처음&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>";
	}
	if ($page <= 1)
	{
		// 빈 값
	} else 
	{
		$pre = $page - 1;
		echo "<a href='search.php?category=$category&search=$search&page=$pre'>◀ 이전 &nbsp;&nbsp;&nbsp; </a>";
	}
	
	for($i = $block_start; $i <= $block_end; $i++)
	{
		if($page == $i)
		{
			echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b> $i </b>&nbsp;&nbsp;&nbsp;&nbsp;";
		}
		else 
		{
			echo  "<a href='search.php?category=$category&search=$search&page=$i'> $i </a>";
		}
	}
	
	if($page >= $total_page)
	{
		// 빈 값
	}
	else
	{
		$next = $page + 1;
		echo "<a href='search.php?category=$category&search=$search&page=$next'> 다음 ▶&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>";
	}
	if($page >= $total_page)
	{
		// 빈 값
	}
	else
	{
		echo "<a href='search.php?category=$category&search=$search&page=$total_page'>마지막</a>";
	}
?>
                        </div>
                    </div>        
                </div>      
            </div>
    </div>
</div>
</body>
</html>


    <script> 
        function login() //로그인
        {
	      location.href = "login.php";
        }  
        function logout() //로그아웃
        {
            const data = confirm("로그아웃 하시겠습니까?");
            if (data) 
            {
           	    location.href = "logoutProcess.php";
            }
        }
        function mypage() //마이페이지
        {
	        location.href = "mypage.php";
        }  
        
        const modifyForm = document.modifyform;
        const mrdelForm = document.mrdelform;

        function readModify() //글수정
        {
            modifyForm.submit();
        }
        function readDelete() //글삭제
        {  
            var myreaddel = confirm("정말 게시글을 삭제하시겠습니까?");
            if(myreaddel == true)
            {
                mrdelForm.submit();
            }
            else 
            {
                return false;
            }
        }
    </script>

<script> <!-- 왼쪽 튀어나오는거 -->
      $(window).load(function(){
  var height = window.innerHeight,
  x= 0, y= height/2,
  curveX = 10,
  curveY = 0,
  targetX = 0,
  xitteration = 0,
  yitteration = 0,
  menuExpanded = false;
  
  blob = $('#blob'),
  blobPath = $('#blob-path'),

  hamburger = $('.hamburger');

  $(this).on('mousemove', function(e){
    x = e.pageX;
    
    y = e.pageY;
  });

  $('.hamburger, .menu-inner').on('mouseenter', function(){
    $(this).parent().addClass('expanded');
    menuExpanded = true;
  });

  $('.menu-inner').on('mouseleave', function(){
    menuExpanded = false;
    $(this).parent().removeClass('expanded');
  });

  function easeOutExpo(currentIteration, startValue, changeInValue, totalIterations) {
    return changeInValue * (-Math.pow(2, -10 * currentIteration / totalIterations) + 1) + startValue;
  }

  var hoverZone = 150;
  var expandAmount = 20;
  
  function svgCurve() {
    if ((curveX > x-1) && (curveX < x+1)) {
      xitteration = 0;
    } else {
      if (menuExpanded) {
        targetX = 0;
      } else {
        xitteration = 0;
        if (x > hoverZone) {
          targetX = 0;
        } else {
          targetX = -(((60+expandAmount)/100)*(x-hoverZone));
        }     
      }
      xitteration++;
    }

    if ((curveY > y-1) && (curveY < y+1)) {
      yitteration = 0;
    } else {
      yitteration = 0;
      yitteration++;  
    }

    curveX = easeOutExpo(xitteration, curveX, targetX-curveX, 100);
    curveY = easeOutExpo(yitteration, curveY, y-curveY, 1);

    var anchorDistance = 200;
    var curviness = anchorDistance - 40;

    var newCurve2 = "M60,"+height+"H0V0h60v"+(curveY-anchorDistance)+"c0,"+curviness+","+curveX+","+curviness+","+curveX+","+anchorDistance+"S60,"+(curveY)+",60,"+(curveY+(anchorDistance*2))+"V"+height+"z";

    blobPath.attr('d', newCurve2);

    blob.width(curveX+60);

    hamburger.css('transform');
    
    $('').css('transform', 'translateY('+curveY+'px)');
    window.requestAnimationFrame(svgCurve);
  }

  window.requestAnimationFrame(svgCurve);
  
});</script>
    <script>    //막대그래프
      $(document).ready(function($) 
      {
         $(".scroll_move").click(function(event)
         {         
            event.preventDefault();
         $('html,body').animate({scrollTop:$(this.hash).offset().top}, 500);
         });

      });
   </script>
   <script>
         $(document).on('click', '[data-toggle="lightbox"]', function(event) 
         {
            event.preventDefault();
            $(this).ekkoLightbox();
         });
   </script>

   <script language = "JavaScript">
         $(document).ready(function() 
         {
            var data = 
            {
               table: 'datatable'
            };
            var chart =
            {
               type: 'column'
            };
            var title = 
            {
               text: '계절별 게시글 사용자 그래프(실시간 최신화)'   
            };      
            var yAxis = 
            {
               allowDecimals: false,
               title: 
               {
                  text: '분표도'
               }
            };
            var tooltip = 
            {
               formatter: function () 
               {
                  return '<b>' + this.series.name + '</b><br/>' + this.point.y + ' ' + this.point.name.toLowerCase();
               }
            };
            var credits = 
            {
               enabled: false
            };
            var json = {};   
            json.chart = chart; 
            json.title = title; 
            json.data = data;
            json.yAxis = yAxis;
            json.credits = credits;  
            json.tooltip = tooltip;  
            $('#container').highcharts(json);
         });
      </script>
      <script>
      const body = document.querySelector('body');

     modal.addEventListener('click', (event) => {
        if (event.target === modal) {
         modal.classList.toggle('show');

        if (!modal.classList.contains('show')) {
            body.style.overflow = 'auto';
    }
  }
});
</script>
<script>
      const modal = document.querySelector('.modal');
      const btnOpenPopup = document.querySelector('.btn-open-popup');

      btnOpenPopup.addEventListener('click', () => {
        modal.style.display = 'block';
      });
    </script>