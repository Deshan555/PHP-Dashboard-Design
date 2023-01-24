<?php

include('security.php');

// $connection = mysqli_connect("localhost","root","","eventswave");

if (isset($_POST['registerbtn'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['confirmpassword']);

    if ($password === $cpassword) {

        $query = "INSERT INTO admin (User_Name,Password) VALUES ('$username','$password')";
        $query_run = mysqli_query($connection, $query);

        if ($query_run) {
            echo "Record Saved";
            $_SESSION['status'] = "Admin Added Successfully!!!";
            header('Location: register.php');
        } else {
            echo "Not Saved";
            $_SESSION['status'] = "Attempt Unsuccessful";
            header('Location: register.php');
        }

    } else {
        echo "pass doesn't match";
        $_SESSION['status'] = "Password and Confirm Password Does not Match!!!";
        header('Location: register.php');
    }

}

if (isset($_POST['updatebtn'])) {
    $id = $_POST['new_admin_id'];
    $password = md5($_POST['edit_password']);
    $cpassword = $_SESSION['password'];
    $npassword = md5($_POST['edit_newpassword']);


    if ($password === $cpassword) {

        $query = "UPDATE admin SET Password = '$npassword' WHERE Admin_ID='$id'";
        $query_run = mysqli_query($connection, $query);

        if ($query_run) {
            echo "Record Saved";
            $_SESSION['status'] = "Password Changed Successfully!!!";
            header('Location: register.php');
        } else {
            echo "Not Saved";
            $_SESSION['status'] = "Attempt Unsuccessful";
            header('Location: register.php');
        }

    } else {
        echo "pass doesn't match";
        $_SESSION['status'] = "Password and Confirm Password Does not Match!!!";
        header('Location: register.php');
    }

}

if (isset($_POST['deletebtn'])) {
    $id = $_POST['new_admin_id'];
    $password = md5($_POST['delete_password']);
    $cpassword = $_SESSION['password'];



    if ($password === $cpassword) {

        $query = "DELETE FROM admin WHERE Admin_ID='$id'";
        $query_run = mysqli_query($connection, $query);

        if ($query_run) {
            echo "Record Saved";
            $_SESSION['status'] = "Admin Removed Successfully!!!";
            header('Location: register.php');
        } else {
            echo "Not Saved";
            $_SESSION['status'] = "Attempt Unsuccessful";
            header('Location: register.php');
        }

    } else {
        echo "pass doesn't match";
        $_SESSION['status'] = "Password and Confirm Password Does not Match!!!";
        header('Location: register.php');
    }

}




?>