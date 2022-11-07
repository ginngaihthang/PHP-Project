<?php 

  if(isset($_POST['submit']) && isset($_FILES['fileToUpload'])) {
    echo "<pre>";
    print_r($_FILES['fileToUpload']);
    echo "<pre>";

    $img_name = $_FILES['fileToUpload']['name'];
    $img_size = $_FILES['fileToUpload']['size'];
    $tmp_name = $_FILES['fileToUpload']['tmp_name'];
    $error = $_FILES['fileToUpload']['error'];

    if($error === 0) {
      if($img_size > 125000) {
        $em = "Sorry, your file is to large.";
        header("Location: index.php?error=$em");
      }else {
        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);

        $allowed_exs =array("jpg", "jpeg", "png");

        if(in_array($img_ex_lc, $allowed_exs)) {
          $new_img_name = uniqid("IMG-", true).".".$img_ex_lc;
          $img_upload_path = 'uploads/'.$new_img_name;
          move_uploaded_file($tmp_name, $img_upload_path);
        }else {
          $em = "You can't uploa files of this type";
          header("Location: index.php?error=$em");
        }
      }
    }else{
      $em = "unkoown error occurred";
      header("Location: index.php?error=$em");
    }

  }else {
    header("Location: index.php");
  }

?>