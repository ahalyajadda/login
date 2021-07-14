<?php
if(isset($_POST['signup-submit'])){
    require "dbh.inc.php";
    $username=$_POST['uid'];
    $email=$_POST['mail'];
    $password=$_POST['pwd'];
    $repasswordrepeat=$_POST['repwd'];
    // echo $username;
    // echo $email;
    // echo $password;
    if(empty($username)|| empty($email)|| empty($password)|| empty($repasswordrepeat) ){
        header("location:signup.php?error=emptyfields&uid=".$username."&mail=".$email);
        exit();

    }
    else if(!filter_var($email,FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/",$username)){
        header("location:signup.php?error=invalidmail");
        exit();

    }
    else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        header("location:signup.php?error=invalidmail&uid=".$username);
        exit();
        
    }
    else if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
        header("location:signup.php?error=invaliduid&mail=".$email);
        exit();
        
    } 
    else if($password!=$repasswordrepeat){
        header("location:signup.php?error=passwordcheck&uid=".$username."&mail=".$email);
        exit();
        
    }
    else{
        $sql="select uidusers from usersdata where uidusers=?";
        $stmt=mysqli_stmt_init($conn); 
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("location:signup.php?error=sqlerror");
            exit();

        }
        else{
            mysqli_stmt_bind_param($stmt,"s",$username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultcheck=mysqli_stmt_num_rows($stmt);
            if($resultcheck>0){
                header("location:signup.php?error=usertaken&mail=".$email);

                exit();
            }
            else{
               $sql="insert into usersdata (uidusers,emailusers,pwdusers) values(?,?,?)";
               $stmt=mysqli_stmt_init($conn); 
               if(!mysqli_stmt_prepare($stmt,$sql)){
                   header("location:signup.php?error=sqlerror");
                   exit();
               }
               else{
                $hashedpwd=password_hash($password,PASSWORD_DEFAULT);
                mysqli_stmt_bind_param($stmt,"sss",$username,$email,$hashedpwd);
                mysqli_stmt_execute($stmt);
                header("location:signup.php?signup=success");
                   exit();
                // mysqli_stmt_store_result($stmt);
               }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);


}
else{
    header("location:signup.php");
                   exit();
    // echo "hii"; 
}
