<?php 
  include 'login_verify.php';

    $db_host = "localhost"; 
    $db_user = "rainmiro"; 
    $db_passwd = "zoqtmxhs0617!";
    $db_name = "rainmiro"; 
    $conn = mysqli_connect($db_host,$db_user,$db_passwd,$db_name);

    $id = $_SESSION['userId'];
    $nowpassword = $_POST['md_password'];

    $sql = "SELECT * FROM member WHERE id ='{$id}'";
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_array($result);
    $hashedPassword = $row['password'];

    $passwordResult = password_verify($nowpassword, $hashedPassword);
    if ($passwordResult === true) 
    {
        $sql = "DELETE FROM member WHERE id = '$id'";
        mysqli_query($conn, $sql);
        $sql = "DELETE FROM uploads WHERE id = '$id'";
        mysqli_query($conn, $sql);

        $sql = "DELETE FROM 봄 WHERE id = '$id'";
        mysqli_query($conn, $sql);
        $sql = "DELETE FROM 여름 WHERE id = '$id'";
        mysqli_query($conn, $sql);
        $sql = "DELETE FROM 가을 WHERE id = '$id'";
        mysqli_query($conn, $sql);
        $sql = "DELETE FROM 겨울 WHERE id = '$id'";
        mysqli_query($conn, $sql);
        
        session_destroy();
    ?>
    <script>
        alert('회원탈퇴가 완료되었습니다.');
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
