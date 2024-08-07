<?php 
  include 'login_verify.php';

$db_host = "localhost"; 
$db_user = "rainmiro"; 
$db_passwd = "zoqtmxhs0617!";
$db_name = "rainmiro"; 

$conn = mysqli_connect($db_host,$db_user,$db_passwd,$db_name);

$id = $_SESSION['userId'];
$nowpassword = $_POST['mp_password'];
$passwordch = password_hash($_POST['mp_password_ch'], PASSWORD_DEFAULT );

// DB 정보 가져오기 
$sql = "SELECT * FROM member WHERE id ='{$id}'";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_array($result);
$hashedPassword = $row['password'];

$passwordResult = password_verify($nowpassword, $hashedPassword);
if ($passwordResult === true) 
{
    $password_sql = "UPDATE member SET password = '$passwordch' WHERE id = '{$id}'";
    mysqli_query($conn, $password_sql);
    $_SESSION['password'] = $passwordch;
    session_destroy();
?>
    <script>
        alert('변경이 완료되었습니다.');
        location.href='index.php';
    </script>

<?php
} 
else{
?>
    <script>
        alert('현재 패스워드가 일치하지 않습니다.');
        history.back(-1);
    </script>
<?php
}
?>
