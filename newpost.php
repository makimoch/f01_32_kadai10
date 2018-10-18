<?php
session_start();
//0.外部ファイル読み込み
include('functions.php');
chk_ssid();

// var_dump ($_SESSION);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>ひそコミ</title>
<!-- Bootstrap CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
    <nav class="navbar navbar-expand-md navbar-dark bg-primary mb-4">
      <a class="navbar-brand" href="#">みんなのひそコミ</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="mypage.php">My page</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="newpost.php">Newpost</a>
          </li> 
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
          <li class="nav-item"> 
            <a class="nav-link disabled" href="home_admin.php">管理者メニュー</a>
          </li>                    
          
        </ul>
      </div>
    </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="insert.php" enctype="multipart/form-data">
  <div class="container jumbotron text-center">
   <fieldset>
    <legend>ひそコミ登録</legend>
    
      <label for="inputName" class="sr-only">Shop</label>
      <input class="form-control" type="text" name="shop" placeholder="お店の名前" autofocus>
      <label class="sr-only">Url</label>
      <input type="text" name="url" placeholder="URL" class="form-control">
      <div class="input-group">
        <textarea class="form-control" name="comment" aria-label="コメント" placeholder="お店の「好きポイント」を教えてください"></textarea>
      </div>
<!-- $_SESSIONで持っている値をdbに送信する -->
        <input type="hidden" name="icon" value="<?=$_SESSION['icon']?>">
        <input type="hidden" name="u_name" value="<?=$_SESSION['u_name']?>">
     <button type="submit" class="btn btn-primary btn-lg">  登録する  </button>
    </fieldset>
  </div>
</form>

<!-- Main[End] -->


</body>
</html>
