<?php
$db_host = "localhost"; 
$db_user = "rainmiro"; 
$db_passwd = "zoqtmxhs0617!";
$db_name = "rainmiro"; 

$conn = mysqli_connect($db_host,$db_user,$db_passwd,$db_name);
$hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

$sql = "INSERT INTO member(id, password, date)    
VALUES('{$_POST['id']}', '{$hashedPassword}', NOW())";

$result = mysqli_query($conn, $sql);

if ($result === false) {

    ?> 
    <script>
        alert("아이디가 중복됩니다.");
        location.href = "signup.php";

    </script>

<?php 
} else {
?>
    <script>
        alert("회원가입이 완료되었습니다");
        location.href = "login.php";
    </script>
<?php
}
?>