<?php

include 'config.php';

if(isset($_POST['submit'])){

    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,md5($_POST['password']));
    $pass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
    $user_type = $_POST['user_type'];

    $select_users = mysqli_query($conn,"SELECT * FROM users WHERE email = '$email' AND password='$password'") or die
     ('query failed');

    if(mysqli_num_rows($select_users) > 0){
        $message1[] = 'usuario ya existe';
    }else{

        if($password != $pass){
            $message2[] = 'la contraseña no coincide';

        }else{
            mysqli_query($conn,"INSERT INTO users (name, email, password,user_type) VALUES
            ('$name','$email','$password','$user_type')") or die ('query failed');
            $message[] = 'registro exitoso'; 
            header('location:index.php');
        }
         
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

    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<?php

if(isset($message)){
     
        ?>
      <script> 
      Swal.fire('Mensaje De Confirmacion',"Registro Exitoso","success");
      </script>
<?php

}else if(isset($message1)){
   
    ?>
    <script> Swal.fire('Mensaje De Advertencia',"usuario ya existe","warning");</script>
    
<?php
}else if(isset($message2)){
    ?>
    <script> Swal.fire('Mensaje De Advertencia',"la contraseña no coincide","warning");</script>
<?php
}

?>
    
<div class="form-container">
    <form action="" method="POST">
        <h3>Registrate</h3>
        <input type="text" name="name" placeholder="introduce tu nombre" required class="box">
        <input type="email" name="email" placeholder="introduce tu email" required class="box">
        <input type="password" name="password" placeholder="introduce tu contraseña" required class="box">
        <input type="password" name="cpassword" placeholder="confirma tu contraseña" required class="box">
        <select name="user_type" class="box">
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select>
        <input type="submit" name="submit" value="registrate" class="btn">
        <p>¿ya tienes una cuenta?<a href="index.php">Entrar</a></p>

    </form>
</div>

</body>
</html>
