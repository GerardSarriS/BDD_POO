<?php 
require 'database.php';
    class User extends Database{

        public function getUser($email, $password){

            $sql = "SELECT * FROM php_login_database WHERE email = '$email' AND password ='$password'";


            $result = $this->connect()->query($sql);

            $numRows = $result->num_rows;
            if($numRows == 1){
                return true;
            }

            return false;

        }
        
    }

    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
    
            if(empty($email)|| empty($password)){
                echo '<div class="alert alert-danger">Email o contrasenya buit </div>';

            }else{
                $email = new User;
                if($email->getUser ($email,$password)){
                    session_start();
                    $_SESSION['email'] = $email;
                    header('Location :/BDD_POO');
                }else{
                    echo '<div class="alert alert-danger">Usuari no existen </div>';
                }
            }
    }




?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/style.css">





    </head>
    <body>
       <?php require 'partials/header.php' ?>
        <h1>Login</h1>
        <span>or <a href="signup.php">Signup</a></span>

        <?php if (!empty($message)): ?>
            <p> <?= $message ?></p>
        <?php endif;?>
        
        <form action="login.php" method="post">
            <input type="text" name="email" placeholder="Correu">
            <input type="password" name="password" placeholder="Contrasenya">
            <button class="btn" href="login.php">ENVIAR</button>
        </form>
    </body>
</html>