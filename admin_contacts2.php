<?php include 'admin_page.php' ?>

<?php


if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `message` WHERE id = '$delete_id'") or die('query failed');
   header('location:admin_contacts.php');
}

?>



<section class="main messages">

   <h1 class="tittle"> Mensajes </h1>

   <div class="box-container">
   <?php
      $select_message = mysqli_query($conn, "SELECT * FROM `message`") or die('query failed');
      if(mysqli_num_rows($select_message) > 0){
         while($fetch_message = mysqli_fetch_assoc($select_message)){
      
   ?>
   <div class="box">
      <p> ID : <span><?php echo $fetch_message['user_id']; ?></span> </p>
      <p> Nombre : <span><?php echo $fetch_message['name']; ?></span> </p>
      <p> Numero : <span><?php echo $fetch_message['number']; ?></span> </p>
      <p> Email : <span><?php echo $fetch_message['email']; ?></span> </p>
      <p> Mensaje : <span><?php echo $fetch_message['message']; ?></span> </p>
      <a href="admin_contacts.php?delete=<?php echo $fetch_message['id']; ?>" onclick="return confirm('Borrar este mensaje?');" class="delete-btn">Borrar Mensaje</a>
   </div>
   <?php
      };
   }else{
      echo '<p class="empty">no tienes mensajes!</p>';
   }
   ?>
   </div>

</section>









<!-- custom admin js file link  -->
<script src="js/admin_script.js"></script>
