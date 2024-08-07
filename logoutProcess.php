<?php
    include 'login_verify.php';

    if ( $jb_login ) 
    {
        session_destroy();
    }
?>
<script>
    location.href = "index.php";
</script>