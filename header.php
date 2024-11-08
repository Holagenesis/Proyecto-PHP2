<?php
if(isset($message)){
     
     ?>
   <script> 
   Swal.fire('Mensaje De Confirmacion',"Mensaje Nuevo","success");
   </script>

<?php }  ?>

<header class="header">

   <div class="header-2">
      <div class="flex">
         <a href="home.php" class="logo">Libros.</a>

         <nav class="navbar">
            <a href="home.php">INICIO</a>
            <a href="about.php">ACERCA DE</a>
            <a href="shop.php">TIENDA</a>
            <a href="contact.php">CONTACTO</a>
            <a href="orders.php">PEDIDOS</a>
         </nav>

         <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <a href="search_page.php" class="fas fa-search"></a>
            <div id="user-btn" class="fas fa-user"></div>
            <?php
               $select_cart_number = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
               $cart_rows_number = mysqli_num_rows($select_cart_number); 
            ?>
            <a href="cart.php"> <i class="fas fa-shopping-cart"></i> <span>(<?php echo $cart_rows_number; ?>)</span> </a>
         </div>

         <div class="user-box">
            <p>username : <span><?php echo $_SESSION['user_name']; ?></span></p>
            <p>email : <span><?php echo $_SESSION['user_email']; ?></span></p>
            <a href="logout.php" class="delete-btn">Salir</a>
         </div>
      </div>
   </div>

</header>