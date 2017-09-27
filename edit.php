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
    <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
  </head>
  <body id="target">
    <div class="container">
      <header class="hero-unit text-center">
        <h1><a href="index.php">Web Application</a></h1>
      </header>
      <div class="row">
        <nav class="span3">
          <ol class="nav nav-tabs nav-stacked">
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
        <div class="span9">
          <article>
            <?php
              $sql = 'SELECT * FROM topic WHERE id = '.$_GET['id'];
              $result = mysqli_query($conn, $sql);
              $row = mysqli_fetch_assoc($result);
             ?>
            <form action="process.php" method="post">
              <div class="form-group">
                <label for="form-title">제목</label>
                <input type="text" class="form-control span9" name="title" id="form-title" placeholder="제목을 적어주세요." value="<?php echo $row['title'];?>">
              </div>
              <div class="form-group">
                <label for="form-author">작성자</label>
                <input type="text" class="form-control span9" name="author" id="form-author" placeholder="작성자를 적어주세요." value="<?php echo $row['author'];?>">
              </div>
              <div class="form-group">
                <label for="form-description">본문</label>
                <textarea type="text" rows="10" class="form-control span9" name="description" id="form-description" placeholder="본문을 적어주세요."><?php echo $row['description'];?></textarea>
              </div>
              <input type="submit" name="제출" class="btn btn-default btn-large">
            </form>
          </article>
          <hr>
          <div id="control">
            <div class="btn-group">
              <input type="button" value="black" onclick="
                $('#target').attr('class', 'black');
              " class="btn btn-default btn-large">
              <!-- javascript를 jquery로 변경 -->
              <!-- document.getElementById('target').className = 'black'; -->
              <!-- $('#target').attr('class', 'black'); -->
              <input type="button" value="white" onclick="
                $('#target').attr('class', 'white');
              " class="btn btn-default btn-large">
              <!-- javascript를 jquery로 변경 -->
              <!-- document.getElementById('target').className = 'white'; -->
              <!-- $('#target').attr('class', 'white'); -->
            </div>
            <a href="write.php" class="btn btn-success btn-large">쓰기</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap -->
    <script src="jquery-3.2.1.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
