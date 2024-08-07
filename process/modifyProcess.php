<?php 
  include 'login_verify.php';
?>
<?php

    $_POST['id'] = $_SESSION['userId'];
    $number = $_POST['upload_number'];

    $db_host = "localhost"; 
    $db_user = "rainmiro"; 
    $db_passwd = "zoqtmxhs0617!";
    $db_name = "rainmiro";
    $conn = mysqli_connect($db_host,$db_user,$db_passwd,$db_name);

    $sql = "SELECT * FROM uploads WHERE upload_number = '{$number}'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    if($_FILES["file"]["name"] == "")
    {
        $sql1 = "UPDATE uploads SET season = '{$_POST['season']}', city = '{$_POST['city']}', title = '{$_POST['title']}', text = '{$_POST['text']}', 
        img_name = '{$row['img_name']}', img_url = '{$row['img_url']}', date = NOW() WHERE upload_number = '{$number}'";
        $result1 = mysqli_query($conn,$sql1);

        $sql4 = "DELETE FROM {$row['season']} WHERE {$row['city']} = '{$number}'";
        $result4 = mysqli_query($conn,$sql4);

        $sql2 = "SELECT * FROM uploads WHERE upload_number = '{$number}'";
        $result2 = mysqli_query($conn,$sql2);
        $data = mysqli_fetch_array($result2);   

        $sql3 = "INSERT INTO {$_POST['season']} ({$_POST['city']}, id) values ('{$data['upload_number']}', '{$_POST['id']}')";
        $result3 = mysqli_query($conn,$sql3);

        if ($result1 === true) 
        {
?>          <script>
                alert("수정이 완료되었습니다!");
                location.href = "index.php";
            </script>
<?php 
        } 
    }
    else
    {
        $uploadUrl = "./uploads/";
        $today_time = strtotime(date('Ymdhis'));
        $fileName = $today_time."_".$_FILES["file"]["name"];
        $uploadFile = uploadedFile($uploadUrl, $fileName);
    
        $imageFileType = strtolower(pathinfo($uploadFile,PATHINFO_EXTENSION));

        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") 
        {
?> 
            <script>
                alert("파일 형식이 jpg, png, jpeg 형식이 아닙니다. 다시 선택해주세요.");
                history.back(-1);
            </script>
<?php 
        } 
        else 
        {
            move_uploaded_file($_FILES["file"]["tmp_name"], "$uploadFile");
            $filename = $fileName;
            $imgurl = "./uploads/". $fileName;
    
            $sql1 = "UPDATE uploads SET season = '{$_POST['season']}', city = '{$_POST['city']}', title = '{$_POST['title']}', text = '{$_POST['text']}',
            img_name = '{$filename}', img_url = '{$imgurl}', date = NOW() WHERE upload_number = '{$number}'";
            $result1 = mysqli_query($conn,$sql1);

            $sql4 = "DELETE FROM {$row['season']} WHERE {$row['city']} = '{$number}'";
            $result4 = mysqli_query($conn,$sql4);

            $sql2 = "SELECT * FROM uploads WHERE img_name = '{$filename}'";
            $result2 = mysqli_query($conn,$sql2);
            $data = mysqli_fetch_array($result2); 

            $sql3 = "INSERT INTO {$_POST['season']} ({$_POST['city']}, id) values ('{$data['upload_number']}', '{$_POST['id']}')";
            $result3 = mysqli_query($conn,$sql3);
            
            mysqli_close($conn);
    
            if ($result1 === true) 
            {
?>              <script>
                    alert("수정이 완료되었습니다!");
                    location.href = "index.php";
                </script>
<?php 
            } 
?>   
<?php
        }
    }
?>
    
<?php
        function uploadedFile($uploadUrl, $fileName)
        {
            return iconv("utf-8", "CP949", $uploadUrl.basename2($fileName));
        }
        function basename2($filename) 
        {
            return preg_replace( '/^.+[\\\\\\/]/', '', $filename);
        }
?>