<?php
include("db.php");
$user_name = '';
$user_password= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM users WHERE id_user=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result); 
    $user_name = $row['user_name'];
    $user_password = $row['user_password'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $user_name= $_POST['user_name'];
  $user_password = $_POST['user_password'];

  $query = "UPDATE users set user_name = '$user_name', user_password = '$user_password' WHERE id_user=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Task Updated Successfully';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php?paginaAdmin=usersAdmin');
}

?>

