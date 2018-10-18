<?php
include('functions.php');

//1.  DB接続します
$pdo = db_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare('SELECT * FROM gs_reviews_table ORDER BY indate DESC LIMIT 3');
$status = $stmt->execute();

//３．データ表示
$view='';
if($status==false){
  errorMsg($stmt);
}else{
  //Selectデータの数だけ自動でループしてくれる
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= '<div class="d-flex bd-highlight">';
    $view .= '<div class="p-2 bd-highlight"><img src="'.$result['icon'].'" width="40px"></div>';
    $view .= '<div class="p-2 flex-grow-1 bd-highlight"><h5>';
    $view .= $result['shop'].'</h5>';
    $view .= '<a href="'.$result['url'].'" target="_blank">'.$result['url'].'</a><br>'; 
    $view .= $result['comment'].'<p class="text-muted "><small>投稿者 - '.$result['name'].'   ['.$result['indate'].']</small></p></div></div>';
  }
}


?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
      crossorigin="anonymous">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
<link rel="stylesheet" href="css/master.css">
<title>ひそコミ</title>
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
          <li class="nav-item active">
            <a class="nav-link" href="home_nologin.php">Home</a>
          </li>
          <li class="nav-item"> 
            <a class="nav-link" href="login.php">ログインページへ</a>
          </li>                    
        </ul>
      </div>
    </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron">
        <div class="container text-center">
            <legend class="text-center">こんにちは、 ゲスト　さん</legend>
            <img class="mx-auto d-block" src="ninja.png" alt="user_icon" width="60px">
        </div>
        <div class="container">
            <h5>みんなのひそコミ</h5>
            <?=$view?>
        </div>
        <div class="container text-center">
            <a class="btn btn-primary" data-toggle="collapse" href="login.php" role="button" aria-expanded="false" aria-controls="collapseExample">
                以前の投稿を見るにはログインしてください   </a>
        </div>
    </div>
</div>
<!-- Main[End] -->
</body>
</html>
