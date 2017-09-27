<?php
  $conn = mysqli_connect("localhost", "root", "111111");
  mysqli_select_db($conn, "opentutorials");
  if (empty($_GET['remove']) === false) {
    $sql = "DELETE FROM topic WHERE id = ".$_GET['remove'];
  }
  elseif (empty($_POST['id']) === false) {
    $sql = "UPDATE topic SET title = '".$_POST['title']."', description = '".$_POST['description']."', author = '".$_POST['author']."' WHERE id = ".$_POST['id'];
  }
  else {
    $sql = "INSERT INTO topic (title,description,author,created) VALUES('".$_POST['title']."', '".$_POST['description']."', ".$_POST['author'].", now())";
  }
  $result = mysqli_query($conn, $sql);
  header('Location: index.php');
 ?>
