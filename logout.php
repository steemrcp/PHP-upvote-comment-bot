<?php
setcookie("voter", "", time() - 3600);
setcookie("post_key", "", time() - 3600);
header('Location: login.php');
?>