<?php include 'admin_page.php' ?>

<?php

/*
include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
}  */

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `users` WHERE id = '$delete_id'") or die('query failed');
   header('location:admin_users.php');
}

?>


<section class="main users">

   <h1 class="tittle"> Cuentas de Usuarios </h1>

   <div class="box-container">
      <?php
         $select_users = mysqli_query($conn, "SELECT * FROM `users`") or die('query failed');
         while($fetch_users = mysqli_fetch_assoc($select_users)){
      ?>
      <div class="box">
         <p> ID : <span><?php echo $fetch_users['id']; ?></span> </p>
         <p> Nombre : <span><?php echo $fetch_users['name']; ?></span> </p>
         <p> Email : <span><?php echo $fetch_users['email']; ?></span> </p>
         <p> Tipo : <span style="color:<?php if($fetch_users['user_type'] == 'admin'){ echo 'var(--color6)'; } ?>"><?php echo $fetch_users['user_type']; ?></span> </p>
         <a href="admin_users.php?delete=<?php echo $fetch_users['id']; ?>" onclick="return confirm('Borrar este usuario?');" class="delete-btn">Borrar</a>
      </div>
      <?php
         };
      ?>
   </div>

</section>









<!-- custom admin js file link  -->
<script src="js/admin_script.js"></script>
