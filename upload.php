<?php
include "db_connect.php";
if( isset($_POST['submit']) && isset($_FILES['my_image']) ) {
  
  echo "<pre>";
    print_r($_FILES['my_image']);

    $image_name = $_FILES['my_image']['name'];
    $image_size = $_FILES['my_image']['size'];
    $tmp_name = $_FILES['my_image']['tmp_name'];
    $error = $_FILES['my_image']['error'];

    if($error === 0) {
      if($image_size > 125000) {
        $em = "Sorry, your file is too large.";
        header("Location: index.php?error=$em"); 
      } else {
        $img_ex = pathinfo($image_name, PATHINFO_EXTENSION);
        $img_ex_1c = strtolower($img_ex);

        $allowed_ex = array("jpg", "jpeg", "png"); 

        if(in_array($img_ex_1c, $allowed_ex)) {
          $new_img_name = uniqid("IMG-", true).'.'.$img_ex_1c;
          $img_upload_path = 'uploads/'.$new_img_name;
          move_uploaded_file($tmp_name, $img_upload_path);

          //insert into database
          $sql = "INSERT INTO images(image_url) 
                  VALUES('$new_img_name')";
                  // print_r($sql); exit();
          mysqli_query($conn, $sql);
          header("Location: view.php");

        } else {
          $em = "You cannot upload files of this type.";
          header("Location: index.php?error=$em");
        }
      }
    } else {
      $em = "An unknown error occurred";
      header("Location: index.php?error=$em");
    }

  echo "</pre>";

} else {
  header("Location: index.php");
}



?>