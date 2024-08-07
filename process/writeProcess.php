<?php 
  include 'login_verify.php';
?>

<?php

    $_POST['id'] = $_SESSION['userId'];

    $db_host = "localhost"; 
    $db_user = "rainmiro"; 
    $db_passwd = "zoqtmxhs0617!";
    $db_name = "rainmiro";
    $conn = mysqli_connect($db_host,$db_user,$db_passwd,$db_name);
    
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

		$sql = "INSERT INTO uploads (id, season, city, title, text, img_name, img_url, date) values ('{$_POST['id']}', '{$_POST['season']}','{$_POST['city']}', '{$_POST['title']}', '{$_POST['text']}', '$filename','$imgurl', NOW())";
		$result = mysqli_query($conn,$sql);

        $sql1 = "SELECT * FROM uploads WHERE img_name = '{$filename}'";
        $result1 = mysqli_query($conn,$sql1);
        $data = mysqli_fetch_array($result1);   

        $sql2 = "INSERT INTO {$_POST['season']} ({$_POST['city']}, id) values ('{$data['upload_number']}', '{$_POST['id']}')";
        $result2 = mysqli_query($conn,$sql2);

		mysqli_close($conn);

        if ($result === true) 
        {
?>          <script>
                alert("업로드가 완료되었습니다!");
                location.href = "index.php";
            </script>
<?php 
        } 
?>

<?php
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
