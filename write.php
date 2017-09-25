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
      <form action="process.php" method="post">
        <p>제목 : <input type="text" name="title"></p>
        <p>작성자 : <input type="text" name="author"></p>
        <p>본문 : <textarea name="description"></textarea></p>
        <input type="submit" name="제출">
      </form>
    </article>
    <!-- Bootstrap -->
    <script src="jquery-3.2.1.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
