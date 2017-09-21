<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Home page</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body id="target">
    <header>
      <h1><a href="index.php">Web Application</a></h1>
    </header>
    <nav>
      <ol>
        <?php
          // list.txt 파일을 읽어서 출력한다.
          echo file_get_contents('list.txt');
         ?>
      </ol>
    </nav>
    <div id="control">
      <input type="button" value="black" onclick="
        document.getElementById('target').className = 'black';
      ">
      <input type="button" value="white" onclick="
        document.getElementById('target').className = 'white';
      ">
    </div>
    <article>
      <?php
        // 만약 id 파라미터의 값이 있다면
        if (isset($_GET['id'])) {
          // id 파라미터를 이용해서 파일명을 만든다.
          $filename = $_GET['id'].'.txt';
          // 파일명의 파일을 읽어서 출력한다.
          echo file_get_contents($filename);
        } else {
       ?>
          <h2>Welcom</h2>
          Happy coding!!
      <?php
        }
       ?>
    </article>
  </body>
</html>
