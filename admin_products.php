

<?php

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
}

if(isset($_POST['add_product'])){
   $name= mysqli_real_escape_string($conn,$_POST['name']);
   $price = $_POST['price'];
   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder =  'upload/'.$image;

    $select_product_name = mysqli_query($conn,"SELECT name FROM products WHERE name='$name'") or die('query failed');

    if(mysqli_num_rows($select_product_name) > 0){
        $num_product= 1;


    }else{
        $add_product_query = mysqli_query($conn,"INSERT INTO products (name,price,image) VALUES ('$name','$price','$image')");

        if($add_product_query){
            if($image_size > 2000000){
                
                $message1_p[] = 'imagen muy pesada';
               
                
            }else{
                
                move_uploaded_file($image_tmp_name,$image_folder);
                $message_p[] = 'registro exitoso';
               
                
            }

        }else{
            $message2_p[] = 'No se pudo agregar el producto';
          
        
        }
    }
}

if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    $delete_image_query = mysqli_query($conn, "SELECT image FROM products WHERE id = '$delete_id'") or die('query failed');
    $fetch_delete_image = mysqli_fetch_assoc($delete_image_query);
    unlink('upload/'.$fetch_delete_image['image']);
    mysqli_query($conn,"DELETE FROM products WHERE id='$delete_id'") or die ('query failed');
    header('location:admin_products.php');
}

if(isset($_POST['update_product'])){

    $update_p_id = $_POST['update_p_id'];
    $update_name = $_POST['update_name'];
    $update_price = $_POST['update_price'];
 
    mysqli_query($conn, "UPDATE products SET name = '$update_name', price = '$update_price' WHERE id = '$update_p_id'") or die('query failed');
 
    $update_image = $_FILES['update_image']['name'];
    $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
    $update_image_size = $_FILES['update_image']['size'];
    $update_folder = 'upload/'.$update_image;
    $update_old_image = $_POST['update_old_image'];

    if(!empty($update_image)){
        if($update_image_size > 2000000){
           $message_e[] = 'image muy grande';
        }else{
           mysqli_query($conn, "UPDATE products SET image = '$update_image' WHERE id = '$update_p_id'") or die('query failed');
           move_uploaded_file($update_image_tmp_name, $update_folder);
           unlink('upload/'.$update_old_image);
        }
     }
 
    
 
    header('location:admin_products.php');
 
 }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>

     <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<!-- custom admin css file link  -->
<link rel="stylesheet" href="css/aa.css">

</head>
<body>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>


     
<?php 
if(isset($message_p)){
     
        ?>
      <script> 
      Swal.fire('Mensaje De Confirmacion',"Registro Exitoso","success");
      </script>
<?php

}else if(isset($message1_p)){
   
    ?>
    <script> Swal.fire('Mensaje De Advertencia',"imagen muy pesada","warning");</script>
    
<?php


}else if(isset($message2_p)){
    ?>
    <script> Swal.fire('Mensaje De Advertencia',"No se pudo agregar el producto","warning");</script>
<?php
}

?>

<?php

if(isset($num_product)){
    ?>
   <script> Swal.fire('Mensaje De Advertencia',"Este nombre ya existe","warning");</script>
<?php
}
?>
<?php

 if(isset($message_e)){
   
    ?>
    <script> Swal.fire('Mensaje De Advertencia',"imagen muy pesada","warning");</script>
    
<?php
 }
?>
   

    
    <?php  include 'admin_header2.php'  ?>

    <!-- CRUD PRODUCTOS -->

    <h1 class="tittle">PRODUCTOS</h1>

    <section class="add-products">

    <form action="" method="POST" enctype="multipart/form-data">

        <h3>Añadir Productos</h3>

        <input type="text" name="name" class="box" placeholder="Nombre de Producto" required>

        <input type="number" name="price" class="box" placeholder="Precio de Producto" required>

        <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box" required>

        <input type="Submit" value="Añadir Producto" name="add_product" class="btn">


    </form>

    </section>

    <section class="show-products">
        <div class="box-container">

            <?php
                $select_products = mysqli_query($conn,"SELECT * FROM products") or die ('query failed');
                if(mysqli_num_rows($select_products) > 0){
                    while($fetch_products = mysqli_fetch_assoc($select_products)){
            ?>
               <div class="box">
                  <img src="upload/<?php echo $fetch_products['image']; ?>" alt="">
                  <div class="name"><?php  echo $fetch_products['name']; ?></div>
                  <div  class="price">$<?php  echo $fetch_products['price']; ?></div>
                  <a href="admin_products.php?update=<?php echo $fetch_products['id']; ?>" class="option-btn">EDITAR</a>
                  <a href="admin_products.php?delete=<?php echo $fetch_products['id']; ?>" class="delete-btn" 
                  onclick="return confirm('Borrar este producto?');">BORRAR</a>
                    
               </div>
               <?php
                    }
                }else{
                    echo '<p class="empty">No Hay Productos</p>';
                }
                
               ?>
        </div>
    </section>

    <section class="edit-product-form">
    <?php
      if(isset($_GET['update'])){
         $update_id = $_GET['update'];
         $update_query = mysqli_query($conn, "SELECT * FROM `products` WHERE id = '$update_id'") or die('query failed');
         if(mysqli_num_rows($update_query) > 0){
            while($fetch_update = mysqli_fetch_assoc($update_query)){
   ?>
   <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="update_p_id" value="<?php echo $fetch_update['id']; ?>">
      <input type="hidden" name="update_old_image" value="<?php echo $fetch_update['image']; ?>">
      <img src="upload/<?php echo $fetch_update['image']; ?>" alt="">
      <input type="text" name="update_name" value="<?php echo $fetch_update['name']; ?>" class="box" required placeholder="enter product name">
      <input type="number" name="update_price" value="<?php echo $fetch_update['price']; ?>" min="0" class="box" required placeholder="enter product price">
      <input type="file" class="box" name="update_image" accept="image/jpg, image/jpeg, image/png">
      <input type="submit" value="editar" name="update_product" class="btn">
      <input type="reset" value="cancelar" id="close-update" class="btn">
   </form>
   <?php
         }
      }
      }else{
        echo '<script>document.querySelector(".edit-product-form").style.display = "none";</script>';
      }
   ?>

    </section>


</body>
</html>