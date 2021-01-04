<?php include '../user/connection.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Login - php inventory management system</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css"/>
    <link rel="stylesheet" href="css/matrix-login.css"/>
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet"/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

</head>
<body>
<div id="loginbox">
    <form name="form" class="form-vertical" action="" method="post">
        <div class="control-group normal_text"><h3>Admin Login Page</h3></div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="text" name ="username" placeholder="Username"/>
                </div>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" name ="password" placeholder="Password"/>
                </div>
            </div>
        </div>
        <div class="form-actions">
            <center>
                <input type="submit" class="btn btn-success" name="submit" value="Login">
            </center>
            

        </div>
    </form>

    <?php
        if(isset($_POST['submit'])){
            $username = $conn->real_escape_string($_POST['username']);
            $password = $conn->real_escape_string($_POST['password']);
            $count = 0;
            $result = $conn->query("SELECT * FROM users WHERE username = '$username' AND password = '$password' AND status = 'active' AND role = 'admin'") or die($conn->error());

            $count = mysqli_num_rows($result);
            if($count > 0){
                header("Location: demo.php");
            }else{
                ?>
                <div id="alert" class="alert alert-danger alert-dismissible">
                    <a class="close" id="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Error!</strong> Invalid Password/Username
                </div>

                <script>
                    let alert = document.getElementById("alert");
                    let close = document.getElementById("close");
                    
                    close.addEventListener('click', () => {
                        alert.style.display = "none";
                    });
                </script>

                <?php

            }

            
        }
    ?>

</div>

<script src="js/jquery.min.js"></script>
<script src="js/matrix.login.js"></script>
</body>

</html>
