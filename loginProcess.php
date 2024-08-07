<?php
$db_host = "localhost"; 
$db_user = "rainmiro"; 
$db_passwd = "zoqtmxhs0617!";
$db_name = "rainmiro"; 

$conn = mysqli_connect($db_host,$db_user,$db_passwd,$db_name);
//아이디 비교와 비밀번호 비교가 필요한 시점 // 1차로 DB에서 비밀번호를 가져옴
// 평문의 비밀번호와 암호화된 비밀번호를 비교해서 검증
$id = $_POST['id'];
$password = $_POST['password'];

// DB 정보 가져오기 
$sql = "SELECT * FROM member WHERE id ='{$id}'";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_array($result);
$hashedPassword = $row['password'];

// echo $row['id'];
// DB 정보를 가져왔으니 
// 비밀번호 검증 로직을 실행하면 된다.

$passwordResult = password_verify($password, $hashedPassword);
if ($passwordResult === true) 
{
    // 로그인 성공
    // 세션에 id 저장
    session_start();
    $_SESSION['userId'] = $row['id'];    
    
?>
    <script>
        location.href = "index.php";
    </script>
<?php
} else {
    // 로그인 실패 
?>
    <script>
        alert("아이디 또는 비밀번호가 틀렸습니다.");
        location.href = "login.php";
    </script>
<?php
}
?>