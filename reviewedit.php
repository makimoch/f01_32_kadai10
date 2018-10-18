<?php
session_start();
include('functions.php');
chk_ssid();

//1.GETでidを取得
if(!isset($_GET['id'])){
  exit("Error");
}
$id = $_GET['id'];

//2.DB接続など
$pdo = db_conn();

//２．データ登録SQL作成，指定したidのみ表示する
$stmt = $pdo->prepare('SELECT * FROM '. $data_table .' WHERE id=:id');
$stmt->bindValue(':id',$id, PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
if($status==false){
  // エラーのとき
  errorMsg($stmt);
}else{
  // エラーでないとき
  $rs = $stmt->fetch();
  // fetch()で1レコードを取得して$rsに入れる
  // $rsは配列で返ってくる．$rs["id"], $rs["name"]などで値をとれる
  // var_dump()で見てみよう
}


?>
<!-- htmlは「index.php」とほぼ同じです -->
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
          <li class="nav-item">
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
<form method="post" action="update.php">
  <div class="container jumbotron">
   <fieldset>
    <legend>更新ページ</legend>
      <label for="inputName" class="sr-only">Shop</label>
      <input class="form-control" type="text" name="shop" value="<?=$rs['shop']?>" placeholder="お店の名前">
      <label class="sr-only">Url</label>
      <input type="text" name="url" value="<?=$rs['url']?>" class="form-control" placeholder="URL">
      <label><a href="<?=$rs['url']?>" target="_blank"><?=$rs['url']?></a></label><br>
      <div class="input-group">
        <textarea class="form-control" name="comment" aria-label="コメント" placeholder="お店の「好きポイント」を教えてください"><?=$rs['comment']?></textarea>
      </div>
           <!-- 値を保持しておくもの-->
      <input type="hidden" name="id" value="<?=$rs['id']?>">
      <!-- <input type="hidden" name="icon" value="<?=$_SESSION['icon']?>">
      <input type="hidden" name="lid" value="<?=$_SESSION['lid']?>"> -->

      <div class="text-center">
        <button type="submit" class="btn btn-primary btn-lg">  更新する  </button>
      </div>
    <div class="container text-center">
        <a class="btn btn-primary" data-toggle="collapse" href="reviewlist_admin.php" role="button" aria-expanded="false" aria-controls="collapseExample">
          >>もどる</a>        
        <a class="btn btn-primary" data-toggle="collapse" href="review_delete.php?id=<?=$rs['id']?>" role="button" aria-expanded="false" aria-controls="collapseExample">
          削除する</a>
    </div>


    </fieldset>
  </div>
</form>
<!-- Main[End] -->

</body>
</html>
