<?php
  $conn = mysqli_connect("localhost", "root", "111111");
  mysqli_select_db($conn, "opentutorials");
  $result = mysqli_query($conn, "SELECT * FROM topic");
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
  </head>
  <body id="target">
    <header>
      <h1><a href="index.php">Web Application</a></h1>
    </header>
    <nav>
      <ol>
        <?php
          // // list.txt 파일을 읽어서 출력한다.
          // echo file_get_contents('list.txt');
          // 텍스트파일 → MySQL로 변경
          while ($row = mysqli_fetch_assoc($result)) {
            echo '<li><a href="index.php?id='.$row['id'].'">'.$row['title'].'</a></li>'."\n";
          }
         ?>
      </ol>
    </nav>
    <div id="control">
      <input type="button" value="black" onclick="
        $('#target').attr('class', 'black');
      ">
      <!-- javascript를 jquery로 변경 -->
      <!-- document.getElementById('target').className = 'black'; -->
      <!-- $('#target').attr('class', 'black'); -->
      <input type="button" value="white" onclick="
        $('#target').attr('class', 'white');
      ">
      <!-- javascript를 jquery로 변경 -->
      <!-- document.getElementById('target').className = 'white'; -->
      <!-- $('#target').attr('class', 'white'); -->
      <a href="write.php">쓰기</a>
    </div>
    <article>
      <?php
        // // 만약 id 파라미터의 값이 있다면
        // if (isset($_GET['id'])) {
        //   // id 파라미터를 이용해서 파일명을 만든다.
        //   $filename = $_GET['id'].'.txt';
        //   // 파일명의 파일을 읽어서 출력한다.
        //   echo file_get_contents($filename);
        // } else {
        // 텍스트파일 → MySQL로 변경
        if (empty($_GET['id']) === false) {
          $sql = 'SELECT * FROM topic WHERE id = '.$_GET['id'];
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          echo '<h2>'.$row['title'].'</h2>';
          echo $row['description'];
        } else {
       ?>
          <h2>Welcom</h2>
          Happy coding!!
      <?php
        }
       ?>
    </article>
    <!-- Bootstrap -->
    <script src="jquery-3.2.1.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
