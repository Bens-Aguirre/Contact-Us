<?php
// including the database connection file
include "config.php";

    

if(isset($_POST['update']))
{ 
$id = mysqli_real_escape_string($conn, $_POST['id']);

 $name = mysqli_real_escape_string($conn, $_POST['name']);
 $email = mysqli_real_escape_string($conn, $_POST['email']);
 $message = mysqli_real_escape_string($conn, $_POST['message']);
 

 //updating the table
 $sql = "UPDATE contact_message SET name='$name', email='$email', message='$message' WHERE id=$id";
 
 $result = mysqli_query($conn, $sql);

 if($result){ 
    echo "<script>alert('Updated Successfully!')</script>";
  echo "<script>window.open('table.php','_self')</script>";
}
else{
    echo "Error:".mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Aguirre's App | Contact Form</title>
    <link rel="stylesheet" href="edit.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <div class="content">
      <div class="left-side">
        <div class="address details">
          <i class="fas fa-map-marker-alt"></i>
          <div class="topic">Address</div>
          <div class="text-one">Calamba, Mamatid</div>
          <div class="text-two">Blk 8 Lot 19</div>
        </div>
        <div class="phone details">
          <i class="fas fa-phone-alt"></i>
          <div class="topic">Phone</div>
          <div class="text-one">+6392 7558 1749</div>
          <div class="text-two">+6392 1716 8980</div>
        </div>
        <div class="email details">
          <i class="fas fa-envelope"></i>
          <div class="topic">Email</div>
          <div class="text-one">bensaguirre1@gmail.com</div>
          <div class="text-two">bensaguirre5b@gmail.com</div>
        </div>
      </div>
      <div class="right-side">
        <div class="topic-text">Update a message</div>
        <p>If you have something to edit in your message this is your chance to edit it.</p>
        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            //selecting data associated with this particular id
            $sql = "SELECT * FROM contact_message WHERE id=$id";
            $result = mysqli_query($conn, $sql);
            $res = mysqli_fetch_array($result);

            ?>
      <form action="" method="post">
        <div class="input-box">
          <input type="text" placeholder="Enter your name" name="name" id="name" value="<?php echo $res ['name'] ?>" required>
        </div>
        <div class="input-box">
          <input type="email" placeholder="Enter your email" name="email" id="email" value="<?php echo $res ['email'] ?>" required>
        </div>
        <div class="input-box message-box">
          <textarea placeholder="Enter your message" name="message" id="message" required><?php echo $res ['message'] ?></textarea>
        </div>
        <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
        <div class="submit">
          <input type="submit" name="update" value="Update Now" >
        </div>
      </form>
      <?php
        }
        ?>
    </div>
    </div>
  </div>
</body>
</html>