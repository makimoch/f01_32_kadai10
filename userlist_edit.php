<?php
session_start();
include('functions.php');
chk_ssid();

// getで送信されたidを取得
$id = $_GET['id'];

//1.  DB接続します
$pdo = db_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare('SELECT * FROM gs_user_table WHERE id = :id');
$stmt->bindValue(':id',$id, PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
if($status==false){
  // エラーのとき
  errorMsg($stmt);
}else{
  // エラーでないとき
  $rs = $stmt->fetch();
}

// チェックボックスの値を反映させる
$kanri_check0 = null;
$kanri_check1 = null;
$life_check0 = null;
$life_check1 = null;
if($rs['kanri_flg']==1){
  $kanri_check1 = 'checked';
}else{
  $kanri_check0 = 'checked';
}
if($rs['life_flg']==1){
  $life_check1 = 'checked';
}else{
  $life_check0 = 'checked';
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>User更新ページ</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

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
            <a class="nav-link" href="logout.php">Logout</a>
          </li>          
          <li class="nav-item active"> 
            <a class="nav-link" href="home_admin.php">管理者メニュー > ユーザー管理</a>
          </li>                    
        </ul>
      </div>
    </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="user_update.php">
  <div class="container jumbotron">
   <fieldset>
    <legend>User更新ページ</legend>
      <div class="d-flex justify-content-center bd-highlight">
        <div class="p-2 bd-highlight align-self-center">
          <label><img src="<?=$rs['icon']?>" width="60px"></label><br>
        </div>
        <div class="p-2 bd-highlight"> 
          <label>名前：　<input type="text" name="name" value="<?=$rs['name']?>"></label><br>
          <label>LoginID：　<input type="text" name="lid" value="<?=$rs['lid']?>"></label><br>
          <label>Password：<input type="text" name="lpw" value="<?=$rs['lpw']?>"></label><br>
          <label>管理フラグ：
            <input type="radio" name="kanri_flg" value="0" <?=$kanri_check0?> >一般
            <input type="radio" name="kanri_flg" value="1" <?=$kanri_check1?> >管理者
          </label><br>
          <label>ステータス：
            <input type="radio" name="life_flg" value="0" <?=$life_check0?>>利用中
            <input type="radio" name="life_flg" value="1" <?=$life_check1?>>退会
          </label>
        </div>
      </div>
      <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-primary btn-lg">更新</button>
        <input type="hidden" name="id" value="<?=$rs['id']?>">
     </div>
    </fieldset>
    <div class="container text-center">
        <a class="btn btn-primary" data-toggle="collapse" href="userlist.php" role="button" aria-expanded="false" aria-controls="collapseExample">
          >>もどる</a>
        <a class="btn btn-primary" data-toggle="collapse" href="user_delete.php?id=<?=$rs['id']?>" role="button" aria-expanded="false" aria-controls="collapseExample">
          削除する</a>
    </div>


  </div>
</form>
<!-- Main[End] -->


</body>
</html>
