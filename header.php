<?php
 session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav>
            <a href="#" class="logo img">
                <img src="av.jpg" width="100px",height="100px"/>
                <div style="clear:both;"></div>
            </a>
            <!-- <div style="clear:both;"></div> -->
            <ul class="list">
                <li><a href="index.php" class="links">Home</a></li>
                <li><a href="index.php" class="links">Portfollo</a></li>
                <li><a href="index.php" class="links">About me</a></li>
                <li><a href="index.php" class="links">Contact</a></li>
                <div style="clear:both;"></div>
            </ul>
            <div style="clear:both;"></div>
            <div class="log">
                <?php
                    if(isset($_SESSION['userid'])){
                        echo '<form action="logout.inc.php" method="post">
                        <button type="submit" class="logout" name="logout-submit">Logout</button>
                        <div style="clear:both;"></div>
                    </form>
                    <div style="clear:both;">';
                    }
                    else{
                        echo ' <form action="login.inc.php" method="post" class="login">
                        <input type="text" name="mailuid" class="login input uid" placeholder="Username/E-mail...">
                        <input type="password" name="pswd" class="login input" placeholder="Password...">
                        <button type="suubmit" name="login-submit" class="input login">Login</button>
                        <a href="signup.php" class="login sign">signup</a>
                        <div style="clear:both;"></div>
                        </form>
                        <div style="clear:both;">';
                    }
                ?>
              
                    
                <!-- <div style="clear:both;"></div> -->
            </div>
        </nav>
    </header>
</body>
</html>