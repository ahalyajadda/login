<?php
if(isset($_POST['login-submit'])){
    require 'dbh.inc.php';
    $mailuid=$_POST['mailuid'];
    $password=$_POST['pswd'];
    if(empty($mailuid) || empty($password)){
        header("location:index.php?error=emptyfields");
        exit();
    }
    else{
        $sql="select * from usersdata where uidusers=? OR emailusers=?;";
        $stmt=mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("location:index.php?error=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt,"ss",$mailuid,$mailuid);
            mysqli_stmt_execute($stmt);
            $result=mysqli_stmt_get_result($stmt);
            if($row=mysqli_fetch_assoc($result)){
                $pwdcheck=password_verify($password,$row['pwdusers']);
                if($pwdcheck==false){
                    header("location:index.php?error=wrongpwd");
                    exit();
                }
                else if($pwdcheck==true){
                    session_start();
                    $_SESSION['userid']=$row['idusers'];
                    $_SESSION['useruid']=$row['uidusers'];
                    header("location:index.php?login=success");
                    exit();

                }
                else{
                    header("location:index.php?error=wrongpwd");
                    exit();
                }
            }
        }
    }
}
else{
    
    header("location:signup.php");
            exit();
}