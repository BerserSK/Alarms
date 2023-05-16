<?php

include('db.php');

if (isset($_POST['save_user'])) {
  $user_name = $_POST['user_name'];
  $user_pass = $_POST['user_pass'];
  $selec_rol = $_POST['selec_rol'];
  $query = "INSERT INTO users(user_name, user_password, id_rol_FK ) VALUES ('$user_name', '$user_pass', '$selec_rol')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Task Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php?paginaAdmin=usersAdmin');


}

?>
