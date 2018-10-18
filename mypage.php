<?php
session_start();
include('functions.php');
chk_ssid();

//1.  DB接続します
$pdo = db_conn();
$user = $_SESSION['u_name'];
//２．データ登録SQL作成

$stmt = $pdo->prepare('SELECT * FROM ' .$data_table. ' WHERE name = :name');
$stmt->bindValue(':name',$user, PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
$view='';


if($status==false){
  errorMsg($stmt);
}else{
  //Selectデータの数だけ自動でループしてくれる
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= '<hr><h5>'.$result['shop'].' ';
    $view .= '<small><a href="reviewedit.php?id='.$result['id'].'">編集'.'</a></small>'.'</h5>';
    $view .= '<a href="'.$result['url'].'" target="_blank">'.$result['url'].'</a><br>'; 
    $view .= $result['comment'].'<br><small>'.$result['indate'].'</small></hr>';
  }
}
//  var_dump ($_SESSION);
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
      crossorigin="anonymous">
<title>ひそコミ</title>
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
            <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="mypage.php">My page</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="newpost.php">Newpost</a>
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
<div>
  <div class="container jumbotron">
    <div class="container text-center">
      <legend class="text-center"><?=$user?></legend>
      <img class="mx-auto d-block" src="<?=$_SESSION['icon']?>" alt="user_icon" width="60px">
      <a class="btn btn-primary" data-toggle="collapse" href="newpost.php" role="button" aria-expanded="false" aria-controls="collapseExample">
      ＋ ひそコミを投稿する  </a>
     </div>
    <div class="container">
      <h5><?=$user?> さんのひそコミ</h5>
    
      <?=$view?>
     </div>
  </div>

</div>
<!-- Main[End] -->

</body>
</html>
