<?php
    include "header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <title>Document</title>
     <style>
         p{
             text-align:center;
             font-size:25px;
             background-color:grey;
             margin-left:400px;
             margin-right:600px;
             height:30px;
             margin-top:20px;
         }
     </style>
</head>
<body>
    <main>
         <?php
            if(isset($_SESSION['userid'])){
                echo '<p>you are logged in!</p>';
            }
            else{
                echo '<p>you are logged out!</p>';
            }
        ?>
       
        
    </main>
</body>
</html>

  
<?php
 require "footer.php";
 ?> 