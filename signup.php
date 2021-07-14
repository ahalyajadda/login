<?php
    require "header.php";
?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <style>
         .signupbtn{
            background-color: lightgrey;
            width:400px;
            text-align:center;
            margin-left:400px;
            margin-top:20px;
            font-size:20px;
            }
        .signhead{
            font-size:40px;
        }
        .inputt{
            padding:5px;
            margin-top:10px;
        }
        .signupbut{
            padding:8px 30px;
            border-radius:10px;
            background-color: black;
            color:white;
        }
     </style>
     <title>Document</title>
 </head>
 <body>
 <section class="signupbtn">
    <h1 class="signhead">Signup</h1>
    <?php
        if(isset($_GET['error'])){
            if($_GET['error']=='emptyfields'){
                echo '<p class="signuperror">fill in the fields</p>';
            }
            else if($_GET['error']=='invaliduidmail'){
                echo '<p class="signuperror">invalid username and email!</p>';
            }
            else if($_GET['error']=='invaliduid'){
                echo '<p class="signuperror">invalid username</p>';
            }
            else if($_GET['error']=='invalidmail'){
                echo '<p class="signuperror">invalid email</p>';
            }
            else if($_GET['error']=='passwordcheck'){
                echo '<p class="signuperror">your passwords do not match</p>';
            }
            else if($_GET['error']=='usertaken'){
                echo '<p class="signuperror">username is already taken!</p>';
            }
           
        }
        else if(isset($_GET['signup'])){
           if($_GET["signup"]=="success"){
                echo '<p class="signupsuccess">signup success</p>';
         } 
        }
        
    ?>
    <form action="signup.inc.php" method="post">
        <input type="text" name="uid" class="inputt" placeholder="Username"><br>
        <input type="text" name="mail" class="inputt" placeholder="E-mail"><br>
        <input type="password" name="pwd" class="inputt" placeholder="password"><br>
        <input type="password" name="repwd" class="inputt" placeholder="Reset password..."><br>
        <button type="submit" name="signup-submit" class="signupbut inputt">signup</button>


    </form>
   </section>
 </body>
 </html>

  
<?php
 require "footer.php";
 ?> 