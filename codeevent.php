<?php

include('security.php');

// $connection = mysqli_connect("localhost","root","","eventswave");


if (isset($_POST['updatebtn'])) {
    $eid = $_POST['new_event_id'];
    $password = md5($_POST['edit_password']);
    $cpassword = $_SESSION['password'];
    $invitelink = $_POST['edit_invitelink'];
    $eventdate = $_POST['edit_eventdate'];
    $eventtime = $_POST['edit_eventtime'];


    if ($password === $cpassword) {

        $query = "UPDATE special_events SET Event_Time = '$eventtime' , Event_Date = '$eventdate' ,Invite_Link = '$invitelink' WHERE Event_ID = '$eid'";
        $query_run = mysqli_query($connection, $query);

        if ($query_run) {
            echo "Record Saved";
            $_SESSION['status'] = "Event Details Successfully!!!";
            header('Location: events.php');
        } else {
            echo "Not Saved";
            $_SESSION['status'] = "Attempt Unsuccessful";
            header('Location: events.php');
        }

    } else {
        echo "pass doesn't match";
        $_SESSION['status'] = "Password and Confirm Password Does not Match!!!";
        header('Location: events.php');
    }

}

if (isset($_POST['deletebtn'])) {
    $id = $_POST['new_event_id'];
    $password = md5($_POST['delete_password']);
    $cpassword = $_SESSION['password'];



    if ($password === $cpassword) {

        $query = "DELETE FROM special_events WHERE Event_ID='$id'";
        $query_run = mysqli_query($connection, $query);

        if ($query_run) {
            echo "Record Saved";
            $_SESSION['status'] = "Event Removed Successfully!!!";
            header('Location: events.php');
        } else {
            echo "Not Saved";
            $_SESSION['status'] = "Attempt Unsuccessful";
            header('Location: events.php');
        }

    } else {
        echo "pass doesn't match";
        $_SESSION['status'] = "Password and Confirm Password Does not Match!!!";
        header('Location: events.php');
    }

}




?>