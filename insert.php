<?php

include('functions.php');

//入力チェック(受信確認処理追加)
if(
  !isset($_POST['shop']) || $_POST['shop']=="" ||
  !isset($_POST['url']) || $_POST['url']=="" ||
  !isset($_POST['comment']) || $_POST['comment']==""
){
  exit('ParamError');
}

//1. POSTデータ取得
$shop   = $_POST['shop'];
$url  = $_POST['url'];
$comment = $_POST['comment'];
$icon = $_POST['icon'];
$name = $_POST['u_name'];


//2. DB接続します(エラー処理追加)
$pdo = db_conn();

//３．データ登録SQL作成
$sql = 'INSERT INTO '. $data_table .'(id, shop, url, comment, indate, icon, name)
VALUES(NULL, :a1, :a2, :a3, sysdate(), :a4, :a5)';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':a1', $shop, PDO::PARAM_STR);
$stmt->bindValue(':a2', $url, PDO::PARAM_STR);
$stmt->bindValue(':a3', $comment, PDO::PARAM_STR);
$stmt->bindValue(':a4', $icon, PDO::PARAM_STR);
$stmt->bindValue(':a5', $name, PDO::PARAM_STR);
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  errorMsg($stmt);
}else{
  //５．index.phpへリダイレクト
  header('Location: mypage.php');
  exit;
}

?>
