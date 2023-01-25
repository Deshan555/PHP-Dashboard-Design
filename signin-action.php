<?php

session_start();

include('dbconfig.php');

if(isset($_POST['button']))
{
    $name_admin = $_POST['email'];

    $password = md5($_POST['password']);

    $sql_query = "SELECT * from Admin WHERE User_name = '$name_admin' AND password = '$password' limit 1";
    
    $stmt = $connection->prepare($sql_query);

    $stmt->execute();

    $stmt->store_result();

    if($stmt->num_rows() > 0)
    {
        $stmt->bind_result($Admin_ID, $User_name, $password);
        
        $stmt->fetch();

        $_SESSION['admin_id'] = $Admin_ID;

        $_SESSION['admin_registerName'] = $User_name;

        $_SESSION['password'] = $password;

        $_SESSION['user_type'] = $password;

        header("location: index.php");
    }
    else{

        header('location: signin.php?error_message=Email/Password Incorrect');

        exit;
    }
}
else{

    header('location: signin.php?error_message=Some Error Happend');

    exit;
}

?>