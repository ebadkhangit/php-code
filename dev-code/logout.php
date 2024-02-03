<?php
session_start();
unset($_SESSION['user_id']);
unset($_SESSION['username']);
unset($_SESSION['display_name']);
unset($_SESSION['login_user_id']);
unset($_SESSION['login_user_displauname']);
session_destroy();

echo "<script>window.location.href='index.php'</script>";
exit;
?>