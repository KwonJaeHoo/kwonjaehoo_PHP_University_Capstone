<?php 
    include 'login_verify.php';

    $seid = $_SESSION['userId'];
    
    if (isset($_GET["page"]))
        $page = $_GET["page"]; //1,2,3,4,5
    else
        $page = 1;

    $db_host = "localhost"; 
    $db_user = "rainmiro"; 
    $db_passwd = "zoqtmxhs0617!";
    $db_name = "rainmiro"; 
    $conn = mysqli_connect($db_host,$db_user,$db_passwd,$db_name);

    $query = "SELECT * FROM uploads WHERE id = '{$seid}'order by upload_number desc";
    $result = mysqli_query($conn, $query);
    $total_record = mysqli_num_rows($result);

    $list = 8; 
	$block_cnt = 5; 
	$block_num = ceil($page / $block_cnt); 
	$block_start = (($block_num - 1) * $block_cnt) + 1; // 블록의 시작 번호  ex) 1,6,11 ...
	$block_end = $block_start + $block_cnt - 1; // 블록의 마지막 번호 ex) 5,10,15 ...    	   	
	$total_page = ceil($total_record / $list);

	if($block_end > $total_page)
	{ 
		$block_end = $total_page; 
	}
	$total_block = ceil($total_page / $block_cnt);
	$page_start = ($page - 1) * $list;
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
    
    h3, h4, h5, h6 
    {   
        font-family: 'Roboto';
        text-align: left;
    }
    
    td
    { 
        font-family: 'Jua';
        text-align: center; 
        font-size: 14px;
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

    .input-form1
    {
        max-width: 750px;
        margin-top: 30px;
        padding: 1em 2em 2em;
        background: #fff;
        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
        border-radius: 10px;
        -webkit-box-shadow: 0 8px 20px 0 rgba(0, 0, 0, 0.15);
        -moz-box-shadow: 0 8px 20px 0 rgba(0, 0, 0, 0.15);
        box-shadow: 0 8px 20px 0 rgba(0, 0, 0, 0.15);
    }   

    ul li 
    {
        list-style-type: none; 
        float: left;
        margin-left: 10px;
        font-family: 'Roboto';
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

    #mypage_delbutton
    {
        background: #B8A7DA;
        border-radius: 20px;
        border: 1px;
        border-color:white;   
    }
   a 
    {
        font-family:'Jua';
        text-decoration:none;
        color: black; 
        font-size:15px
    }
    .containerr{
        text-align:center;
    }
    .number{
        color:#B8A7DA;
    }
</style>
</head>
<body>
<?php 
    if ($jb_login) 
    {
?>
    <br></br><br></br>
    <div class="container">
    <div class="input-form-backgroud row"> 
        <div class="input-form col-md-12 mx-auto">
        <img style="float:left; width:25px; height:25px; left:10px; top:10px; position:relative; z-index:2;" src="images/icon/Before.png" onclick = "location.href = 'mypage.php'">
        <div style="position: absolute; top:-3px; left: 530px;"> <img src="images/icon/Group60.svg" onclick = "location.href = 'index.php'"> </div>        
            <br></br><h3><strong>여행지를 찾아주는 남자들</strong></h3><h6>&nbsp;&nbsp;Travel Map Memory My Write</h6>
            <div class="bar"></div>
                <br><br>
                <div class="containerr">
                <table style="position:relative; left:48px; ">
                    <thead>    
                        <td width= "80">ID</td>
                        <td width= "180">Title</td>
                        <td width= "180">Season & city</td>  
                        <td width= "85">Date</td>       
                    </thead> 
                </table>   

<?php
	    if($total_record == 0)
	    {
?>
		        <h4 style="text-align:center;"><br>작성한 게시글이 없습니다.</h4>
                            
<?php
        }
        else
        {
                        
            $query1 = "SELECT * FROM uploads WHERE id = '{$seid}'order by upload_number desc LIMIT $page_start, $list";
            $result1 = mysqli_query($conn, $query1);
            $arr = array();
            $cot = 0;

            while($data = mysqli_fetch_array($result1))
            {                                   
                if($data['id'] === $seid)
                {
                    $arr[$cot] = "{$data['upload_number']}";                                     
?>                
            <form method="POST" action="mypageWritedelProcess.php" name="mywritedelForm">       
                <table style="position:relative; left:48px; bottom:-5px; ">
                    <thead>                
                        <td width= "80" align="center"> <?= "{$data['id']}" ?></td>
                        <td width= "180" align="center"> <?= "{$data['title']}" ?></td>
                        <td width= "180" align="center"> <?= $data['season']?> & <?= $data['city']?> </td>  
                        <td width= "90" align="center"> <?= "{$data['date']}" ?></td>
                        <td width= "80" > <button id="mypage_delbutton"class="btn btn-dark mb-3" type = "input"  name = "upload_number" value = "<?= "{$arr[$cot]}"?>" onclick = "mwedel()" > 삭제  </button> </td>
                    </thead> 
                </table>      
            </form>
<?php                          
                    $cot++;
                }
            }

            if ($page <= 1)
            {
                // 빈 값
            } 
            else 
            {
                  echo "<a href='mypage_1.php?page=1'>처음&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>";
            }
                    
            if ($page <= 1)
            {
                // 빈 값
            } 
            else 
            {
                $pre = $page - 1;
                echo "<a href='mypage_1.php?page=$pre'>◀ 이전 &nbsp;&nbsp;&nbsp; </a>";				
            }
            for($i = $block_start; $i <= $block_end; $i++)
            {
                if($page == $i)
                { 
                    echo "<b> $i&nbsp;&nbsp;&nbsp; </b>";
                } 
                else 
                {
                    echo "<a href='mypage_1.php?page=$i'> $i&nbsp;&nbsp;&nbsp; </a>";
                }
            }
            if($page >= $total_page)
            {  
                // 빈 값
            }
            else 
            {
                $next = $page + 1;
                echo "<a href='mypage_1.php?page=$next'> 다음 ▶&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>";
            }
            if($page >= $total_page)
            {
                // 빈 값
            }
            else 
            {
                echo "<a href='mypage_1.php?page=$total_page'>마지막</a>";
            }   
        }
    }
    else
    {   
?> 
</div>

<script>
    alert("잘못된 접근입니다. ");
    location.href = "index.php";
</script>

<?php
    }
?> 

<script>
    
    function mwedel()
    {
        const mywritedelForm = document.mywritedelForm;
        const mydel = confirm("정말 게시글을 삭제하시겠습니까?");
        if(mydel) 
        {
            mywritedelForm.submit();
        }
        else
        {
            return false;
        }   
	}
</script>
                    </div>
                </div>
            </div>
</body>
</html>