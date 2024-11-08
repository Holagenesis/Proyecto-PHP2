<?php include 'admin_page.php' ?>

<div class="main">

  <div class="cardBox">
    <div class="card">
    <div>
      <div class="cardContent">
        <?php
        $total_pendings = 0;
        $select_pending = mysqli_query($conn,"SELECT total_price FROM orders WHERE payment_status='pending'") 
        or die('query failed');

        if(mysqli_num_rows($select_pending) > 0){ 
        while($fetch_pendings= mysqli_fetch_assoc($select_pending)){
          $total_price = $fetch_pendings['total_price'];
          $total_pendings += $total_price; 

         };
        };
       ?>
         <h3><?php echo $total_pendings; ?></h3>
         <p>Total</p>
      </div>

   </div>
      <div class="iconBx">
      <ion-icon name="cube-outline"></ion-icon>
      </div>
    </div>


 
    <div class="card">
    <div>
      <div class="cardContent">
      <?php
        $total_completed = 0;
        $select_completed = mysqli_query($conn,"SELECT total_price FROM orders WHERE payment_status='completed'") 
        or die('query failed');

        if(mysqli_num_rows($select_completed) > 0){ 
        while($fetch_completed= mysqli_fetch_assoc($select_completed)){
          $total_price = $fetch_completed['total_price'];
          $total_completed += $total_price; 

        };
      };
      ?>

      <h3><?php echo $total_completed; ?></h3>
      <p>Pagos Completados</p>
    </div>

   </div>
      <div class="iconBx">
      <ion-icon name="logo-paypal"></ion-icon>
      </div>
    </div>

 


    <div class="card">
    <div>
      <div class="cardContent">
      <?php
           $select_orders = mysqli_query($conn,"SELECT * FROM orders") or die ('query failed');
           $number_or_orders = mysqli_num_rows($select_orders);
        ?>
        <h3><?php  echo $number_or_orders;  ?></h3>
        <p>Orden</p>
      </div>

   </div>
      <div class="iconBx">
      <ion-icon name="cart-outline"></ion-icon>
      </div>
    </div>




    <div class="card">
    <div>
      <div class="cardContent">
      <?php
           $select_products = mysqli_query($conn,"SELECT * FROM products") or die ('query failed');
           $number_or_products = mysqli_num_rows($select_products);
        ?>
        <h3><?php  echo $number_or_products;  ?></h3>
        <p>Productos</p>
      </div>

   </div>
      <div class="iconBx">
      <ion-icon name="bag-outline"></ion-icon>
      </div>
    </div>




    <div class="card">
    <div>
      <div class="cardContent">
      <?php
           $select_users = mysqli_query($conn,"SELECT * FROM users WHERE user_type='user'") or die ('query failed');
           $number_of_users = mysqli_num_rows($select_users);
        ?>
        <h3><?php  echo $number_of_users;  ?></h3>
        <p>Usuarios comunes</p>
      </div>

   </div>
      <div class="iconBx">
      <ion-icon name="happy-outline"></ion-icon>
      </div>
    </div>





    <div class="card">
    <div>
      <div class="cardContent">
      <?php
           $select_admins = mysqli_query($conn,"SELECT * FROM users WHERE user_type='admin'") or die ('query failed');
           $number_of_admins = mysqli_num_rows($select_admins);
        ?>
        <h3><?php  echo $number_of_admins;  ?></h3>
        <p>Usuarios Admin</p>

      </div>

   </div>
      <div class="iconBx">
      <ion-icon name="person-circle-outline"></ion-icon>
      </div>
    </div>




    <div class="card">
    <div>
      <div class="cardContent">
      <?php
           $select_account = mysqli_query($conn,"SELECT * FROM users ") or die ('query failed');
           $number_of_account = mysqli_num_rows($select_account);
        ?>
        <h3><?php  echo $number_of_account;  ?></h3>
        <p>Total de usuarios</p>
      
      </div>

   </div>
      <div class="iconBx">
      <ion-icon name="people-outline"></ion-icon>
      </div>
    </div>





  <div class="card">
    <div>
      <div class="cardContent">
      <?php
           $select_messages = mysqli_query($conn,"SELECT * FROM message ") or die ('query failed');
           $number_of_messages = mysqli_num_rows($select_messages);
        ?>
        <h3><?php  echo $number_of_messages;  ?></h3>
        <p>Total de mensajes</p>
      </div>

    </div>
      <div class="iconBx">
      <ion-icon name="paper-plane-outline"></ion-icon>
      </div>
  </div>

</div>
