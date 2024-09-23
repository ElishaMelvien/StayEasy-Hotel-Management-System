<?php
$plainPassword = "Password@12";
$hashedPassword = password_hash($plainPassword, PASSWORD_BCRYPT);
echo $hashedPassword;
?>
