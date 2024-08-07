<?php 
  include 'login_verify.php';

    $db_host = "localhost"; 
    $db_user = "rainmiro"; 
    $db_passwd = "zoqtmxhs0617!";
    $db_name = "rainmiro"; 
    $conn = mysqli_connect($db_host,$db_user,$db_passwd,$db_name);

    $number = $_POST['upload_number'];

    $sql = "SELECT * FROM uploads WHERE upload_number = '{$number}'";
    $result = mysqli_query($conn,$sql);
    $data = mysqli_fetch_array($result); 

    $sql1 = "DELETE FROM {$data['season']} WHERE {$data['city']} = '{$number}'";
    $result1 = mysqli_query($conn,$sql1);

    $sql2 = "DELETE FROM uploads WHERE upload_number = '{$number}'";
    $result2 = mysqli_query($conn,$sql2);
    mysqli_close($conn);

?>
    <script>
        alert('게시글이 삭제되었습니다!');
        location.href='mypage_1.php';
    </script>
