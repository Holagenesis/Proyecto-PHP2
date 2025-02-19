<?php

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
}

if(isset($_POST['update_order'])){

   $order_update_id = $_POST['order_id'];
   $update_payment = $_POST['update_payment'];
   mysqli_query($conn, "UPDATE `orders` SET payment_status = '$update_payment' WHERE id = '$order_update_id'") or die('query failed');
   $message_orders = 'ha sido actualizado';

}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `orders` WHERE id = '$delete_id'") or die('query failed');
   $message_orders_d= 'ha sido actualizado';
   header('location:admin_orders.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>orders</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/aa.css">

</head>
<body>
   
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>


     
<?php 
if(isset($message_orders)){ ?>
     
        ?>
      <script> 
      Swal.fire('Mensaje De Confirmacion',"Edicion Exitosa","success");
      </script>
<?php } ?>

<?php 
if(isset($message_orders_d)){ ?>
     
        ?>
      <script> 
      Swal.fire('Mensaje De Confirmacion',"Borrado Exitoso","success");
      </script>
<?php } ?>

<?php include 'admin_header2.php'; ?>

<section class="orders">

   <h1 class="tittle">Pedidos</h1>

   <div class="box-container">
      <?php
      $select_orders = mysqli_query($conn, "SELECT * FROM `orders`") or die('query failed');
      if(mysqli_num_rows($select_orders) > 0){
         while($fetch_orders = mysqli_fetch_assoc($select_orders)){
      ?>
      <div class="box">
         <p> ID : <span><?php echo $fetch_orders['user_id']; ?></span> </p>
         <p> placed on : <span><?php echo $fetch_orders['placed_on']; ?></span> </p>
         <p> Nombre : <span><?php echo $fetch_orders['name']; ?></span> </p>
         <p> Numero : <span><?php echo $fetch_orders['number']; ?></span> </p>
         <p> Email : <span><?php echo $fetch_orders['email']; ?></span> </p>
         <p> Direccion : <span><?php echo $fetch_orders['address']; ?></span> </p>
         <p> Total Productos : <span><?php echo $fetch_orders['total_products']; ?></span> </p>
         <p> Precio Total : <span>$<?php echo $fetch_orders['total_price']; ?>/-</span> </p>
         <p> Metodo de Pago : <span><?php echo $fetch_orders['method']; ?></span> </p>
         <form action="" method="post">
            <input type="hidden" name="order_id" value="<?php echo $fetch_orders['id']; ?>">
            <select name="update_payment">
               <option value="" selected disabled><?php echo $fetch_orders['payment_status']; ?></option>
               <option value="pending">pendiente</option>
               <option value="completed">completado</option>
            </select>
            <input type="submit" value="Editar" name="update_order" class="option-btn">
            <a href="admin_orders.php?delete=<?php echo $fetch_orders['id']; ?>" onclick="return confirm('borrar este pedido?');" class="delete-btn">Borrar</a>
         </form>
      </div>
      <?php
         }
      }else{
         echo '<p class="empty">no hay pedidos!</p>';
      }
      ?>
   </div>

</section>