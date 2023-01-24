<?php

include('security.php');

// $connection = mysqli_connect("localhost","root","","eventswave");

// if(isset($_POST['registerbtn']))
// {
//     function password_generate($chars) 
//         {
//             $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
//             return substr(str_shuffle($data), 0, $chars);
//         }
//     $generatedpass=password_generate(6);
//     $clubname = $_POST['clubname'];
//     $username = $_POST['username'];
//     $password = md5($generatedpass);
//     $clubmail = $_POST['email'];
//     $facebook = $_POST['facebook'];
//     $whatsapp = $_POST['whatsapp'];
//     // $image = 'default.png';
//     // $bio = 'BIO here';
//     // $followers = '';
//     // $following = '';
//     // $posts = '';



//     if(!empty($fullname) && !empty($username)  && !empty($password) && !empty($clubmail) && !empty($fb) && !empty($whatsapp) && !empty($image) )
// 		{

// 			//save to database
// 			$usertype = 0;
// 			$query = "INSERT INTO users (FULL_NAME,USER_NAME,USER_TYPE,PASSWORD_S,EMAIL,FACEBOOK,WHATSAPP) VALUES ('$clubname','$username','$usertype','$password','$clubmail','$image','$facebook','$whatsapp)";
            
// 			mysqli_query($connection, $query);
//             $_SESSION['status']="successfully added";
// 			header("Location: club.php");
// 			die;
// 		}else
// 		{
// 			 $_SESSION['status']="Somethig wrong Please try again!";
// 			 header("Location: club.php");
// 			 die;
// 		}

// }

// if(isset($_POST['updatebtn']))
// {
//     $id = $_POST['new_admin_id'];
//     $password = md5($_POST['edit_password']);
//     $cpassword = md5($_POST['edit_confirmpassword']);
//     $npassword = md5($_POST['edit_newpassword']);


//         if($password === $cpassword) 
//         {

//             $query = "UPDATE admin SET Password = '$npassword' WHERE Admin_ID='$id'";
//             $query_run = mysqli_query($connection, $query);

//             if($query_run)
//             {
//                 echo "Record Saved";
//                 $_SESSION['status'] =  "Password Changed Successfully!!!";
//                 header('Location: register.php');
//             }
//             else
//             {
//                 echo "Not Saved";
//                 $_SESSION['status'] =  "Attempt Unsuccessful";
//                 header('Location: register.php');
//             }

//         }
//         else 
//         {
//             echo "pass doesn't match";
//             $_SESSION['status'] =  "Password and Confirm Password Does not Match!!!";
//             header('Location: register.php');
//         }

// }

if(isset($_POST['deletebtn']))
{
    $uid =$_POST['new_user_id'];
    $id = $_POST['new_admin_id'];
    $password = md5($_POST['delete_password']);
    $cpassword = $_SESSION['password'];
    


        if($password === $cpassword) 
        {

            $query = "DELETE FROM users WHERE User_ID='$uid'";
            $query_run = mysqli_query($connection, $query);

            if($query_run)
            {
                echo "Record Saved";
                $_SESSION['status'] =  "User Removed Successfully!!!";
                header('Location: user.php');
            }
            else
            {
                echo "Not Saved";
                $_SESSION['status'] =  "Attempt Unsuccessful";
                header('Location: user.php');
            }

        }
        else 
        {
            echo "pass doesn't match";
            $_SESSION['status'] =  "Password and Confirm Password Does not Match!!!";
            header('Location: club.php');
        }

}




?>