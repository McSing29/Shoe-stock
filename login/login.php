<?php
        session_start();
        if(isset($_SESSION['user_type']) == 'admin'){
            header('location: ../dashboard/dashboard.php');
        }
        
        $accounts = array(
            "user1" => array(
                "firstname" => 'Ejay',
                "lastname" => 'McSing',
                "type" => 'admin',
                "username" => 'ejay',
                "password" => 'ejay'
            ),
            "user2" => array(
                "firstname" => 'Joshua',
                "lastname" => 'Yasil',
                "type" => 'admin',
                "username" => 'josh',
                "password" => 'josh'
            ),
            "user3" => array(
                "firstname" => 'Monkey D.',
                "lastname" => 'Luffy',
                "type" => 'staff',
                "username" => 'luffy',
                "password" => 'luffy'
            ),
            "user4" => array(
                "firstname" => 'Erza',
                "lastname" => 'Scarlet',
                "type" => 'staff',
                "username" => 'erza',
                "password" => 'erza'
            ),
            "user5" => array(
                "firstname" => 'Mark',
                "lastname" => 'Vladimir',
                "type" => 'staff',
                "username" => 'mark',
                "password" => 'mark'
            
            )
        );
        if(isset($_POST['username']) && isset($_POST['password'])){
            
            $username = htmlentities($_POST['username']);
            $password = htmlentities($_POST['password']);
            foreach($accounts as $keys => $value){
                
                if($username == $value['username'] && $password == $value['password']){
                    
                    $_SESSION['logged-in'] = $value['username'];
                    $_SESSION['fullname'] = $value['firstname'] . ' ' . $value['lastname'];
                    $_SESSION['user_type'] = $value['type'];
                    
                    if($value['type'] == 'admin'){
                        header('location: ../dashboard/dashboard.php');
                    }else{
                        header('location: ../dashboard/dashboard.php');
                    }
                }
            }
            
            $error = 'Invalid username/password. Try again.';
        }
    
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=p, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <title>Login</title>
</head>
<body>
    
    <div class="login-container">
        <form class="login-form" action="login.php" method="post">
            <div class="logo-details">
                <i class='bx bxl-stripe'></i>
                <span class="logo-name">Shoe Stock System</span>
            </div>
            <hr class="divider">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter username" required tabindex="1">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter password" required tabindex="2">
            <input class="button" type="submit" value="Login" name="login" tabindex="3">
            <?php
              
                if(isset($error)){
                    echo '<div><p class="error">'.$error.'</p></div>';
                }
                
            ?>
        </form>
    </div>
</body>
</html>