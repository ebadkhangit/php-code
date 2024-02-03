<?php
session_start();
unset($_SESSION['login_userid']);
unset($_SESSION['login_display_name']);
unset($_SESSION['login_user_name']);

//session_destroy();
echo "<script>window.location.href='index.php'</script>";
exit;
?>