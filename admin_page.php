<?php

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
  header('location:index.php');
}

?>

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
   
    <a href="home.php" class="logo">Admin<span>Panel</span></a>


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

<div class="container">
  <div class="navigation">
      <ul>
        <li>
          <a href="#">
              <span class="icon"></span>
              <span class="title">MENU</span>
          </a>
        </li>
        <li>
          <a href="admin_page_items.php">
              <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
              <span class="title">INICIO</span>
          </a>
        </li>
        <li>
          <a href="admin_products.php">
              <span class="icon"><ion-icon name="add-outline"></ion-icon></span>
              <span class="title">PRODUCTOS</span>
          </a>
        </li>
        <li>
          <a href="admin_orders.php">
              <span class="icon"><ion-icon name="send-outline"></ion-icon></span>
              <span class="title">PEDIDOS</span>
          </a>
        </li>
        <li>
          <a href="admin_users2.php">
              <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
              <span class="title">USUARIOS</span>
          </a>
        </li>
        <li>
          <a href="admin_contacts2.php">
              
              <span class="icon"><ion-icon name="book-outline"></ion-icon></span>
              <span class="title">MENSAJES</span>
          </a>
        </li>
      </ul>
  </div>





</div>
</div>



<script src="js/admin_script.js"></script>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>



</body>
</html>