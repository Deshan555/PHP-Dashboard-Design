<?php

session_start();

$admin_password = $_SESSION['password'];

echo $admin_password;