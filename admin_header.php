<?php
if(isset($message)){
     
     ?>
   <script> 
   Swal.fire('Mensaje De Confirmacion',"Mensaje Nuevo","success");
   </script>

<?php }  ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <link rel="stylesheet" href="css/aa.css">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<header class="header">

<div class="flex">
     <div class="toggle">
       <ion-icon name="menu-outline"></ion-icon>
     </div>
    <a href="admin_page.php" class="logo">Admin<span>Panel</span></a>

    <nav class="navbar">
        <a href="admin_page.php">INICIO</a>
        <a href="admin_products.php">PRODUCTOS</a>
        <a href="admin_orders.php">PEDIDOS</a>
        <a href="admin_users.php">USUARIOS</a>
        <a href="admin_contacts.php">MENSAJES</a>

    </nav>

    <div class="icons">
        <div id="menu-btn" class="fas fa-bars"></div>
        <div id="user-btn" class="fas fa-user"></div>
    </div>

    <div class="account-box">
        <p>Username:<span><?php  echo $_SESSION['admin_name']; ?></span></p>
        <p>Email:<span><?php  echo $_SESSION['admin_email']; ?></span></p>
        <a href="logout.php" class="delete-btn">Salir</a>
    </div>

</div>

</header>

<script src="js/admin_script.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>