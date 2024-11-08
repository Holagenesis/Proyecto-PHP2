<?php

include 'config.php';

session_start();

if(isset($_POST['submit'])){

    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,md5($_POST['password']));
   

    $select_users = mysqli_query($conn,"SELECT * FROM users WHERE email = '$email' AND password='$password'") or die
     ('query failed');

    if(mysqli_num_rows($select_users) > 0){

        $row = mysqli_fetch_assoc($select_users);

        if($row['user_type'] == 'admin'){
           $_SESSION['admin_name'] = $row['name'];
           $_SESSION['admin_email'] = $row['email'];
           $_SESSION['admin_id'] = $row['id'];
           header('location:admin_page.php');

        }else if($row['user_type'] == 'user') {
           $_SESSION['user_name'] = $row['name'];
           $_SESSION['user_email'] = $row['email'];
           $_SESSION['user_id'] = $row['id'];
           
           header('location:home.php');
        }
      
    }else{
       
            $message[] = 'incorrecto'; 
         
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <link rel="stylesheet" href="css/est.css">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    
<div class="form-container">
    
    <form action="" method="POST">
        <h3>LOGIN</h3>
      
        <input type="email" name="email" placeholder="introduce tu email" required class="box">
        <input type="password" name="password" placeholder="introduce tu contraseña" required class="box">

       
        <input type="submit" name="submit" value="Ingresar" class="btn">
        <p>¿No tienes una cuenta?<a href="register.php">Registrar</a></p>

    </form>
</div>

</body>
</html>